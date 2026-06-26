<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

iniciarSessao();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirecionarPara(urlRaiz('index.php'));
}

// Login (prioridade — evita conflito com outros handlers)
if (ehRequisicaoLogin()) {
    $email = trim($_POST['email'] ?? $_POST['nome'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $msg = '';

    try {
        if ($email === '' || $senha === '') {
            $msg = 'Preencha todos os campos.';
        } else {
            $user = readWhere($pdo, 'usuarios', 'email = ?', [$email]);

            if ($user && senhaUsuarioValida($senha, (string) $user['senha'])) {
                sincronizarSessaoUsuario($user);
                redirecionarPainelLogado();
            }
            $msg = 'E-mail ou senha incorretos.';
        }
    } catch (Throwable $e) {
        $msg = 'Erro: ' . $e->getMessage();
    }

    $voltar = $_POST['redirect'] ?? urlHtml('formLogin.php');
    $voltarPermitidos = [urlHtml('formLogin.php'), urlRaiz('index.php')];
    if (!in_array($voltar, $voltarPermitidos, true)) {
        $voltar = urlHtml('formLogin.php');
    }
    redirecionarPara($voltar . '?error=' . urlencode($msg));
}

if (isset($_POST['cadastro'])) {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    try {
        if ($nome === '' || $email === '' || $senha === '') {
            $msg = 'Preencha todos os campos.';
        } else {
            $existente = readWhere($pdo, 'usuarios', 'email = ?', [$email]);
            if ($existente) {
                $msg = 'E-mail já cadastrado.';
            } else {
                $idCliente = create($pdo, 'clientes', [
                    'nome_empresa' => $nome,
                    'plano' => 'Basico',
                    'limite_maquinas' => 3,
                ]);

                create($pdo, 'usuarios', [
                    'nome' => $nome,
                    'email' => $email,
                    'senha' => password_hash($senha, PASSWORD_DEFAULT),
                    'perfil' => 'cliente',
                    'id_cliente' => (int) $idCliente,
                ]);

                redirecionarPara(urlHtml('formLogin.php') . '?msg=' . urlencode('Cadastro realizado! Faça login para acessar sua área.'));
            }
        }
    } catch (Throwable $e) {
        $msg = 'Erro ao cadastrar: ' . $e->getMessage();
    }

    redirecionarPara(urlHtml('formCadastro.php') . '?error=' . urlencode($msg));
}

// Mensagem de contato (público)
if (isset($_POST['nome'], $_POST['mensagem'])) {
    $nome = trim($_POST['nome']);
    $razao = trim($_POST['razao_social'] ?? '');
    $texto = trim($_POST['mensagem']);

    if ($nome !== '' && $texto !== '') {
        try {
            create($pdo, 'contatos', [
                'nome' => $nome,
                'razao_social' => $razao,
                'mensagem' => $texto,
            ]);
            redirecionarPara(urlHtml('contato.php') . '?msg=' . urlencode('Mensagem enviada com sucesso!'));
        } catch (Throwable $e) {
            redirecionarPara(urlHtml('contato.php') . '?error=' . urlencode('Não foi possível enviar a mensagem.'));
        }
    }
    redirecionarPara(urlHtml('contato.php') . '?error=' . urlencode('Preencha nome e mensagem.'));
}

redirecionarPara(urlRaiz('index.php'));
