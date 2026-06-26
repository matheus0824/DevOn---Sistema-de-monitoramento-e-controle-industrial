<?php
session_start();
require_once 'crud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['cadastro'])) {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $tipo = 'usuario';

        try {
            if (empty($nome) || empty($email) || empty($senha)) {
                $msg = 'Preencha todos os campos.';
            } else {
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $dados = [
                    'nome'  => $nome,
                    'email' => $email,
                    'senha' => $senhaHash,
                    'tipo'  => $tipo
                ];

                create($pdo, 'usuarios', $dados);
                
                header("Location: ../index.php?msg=" . urlencode("Cadastro realizado com sucesso!"));
                exit;
            }
        } catch (Throwable $e) {
            $msg = "Erro: " . $e->getMessage();
            header("Location: ../html/cadastro.php?error=" . urlencode($msg));
            exit;
        }
    }

    if (isset($_POST['login'])) {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        try {
            if (empty($email) || empty($senha)) {
                $msg = 'Preencha todos os campos.';
            } else {
                $user = read($pdo, 'usuarios', "email = '" . $email . "'");

                if ($user && password_verify($senha, $user['senha'])) {
                    
                    // Guarda os dados na sessão do navegador
                    $_SESSION['usuario_id']   = $user['idUsuarios'];
                    $_SESSION['usuario_nome'] = $user['nome'];
                    $_SESSION['usuario_tipo'] = $user['tipo']; 

                    if ($user['tipo'] === 'admin') {
                        header("Location: ../html/admin_dashboard.php");
                    } else {
                        header("Location: ../html/home.html");
                    }
                    exit;
                } else {
                    $msg = 'E-mail ou senha incorretos.';
                }
            }
        } catch (Throwable $e) {
            $msg = "Erro: " . $e->getMessage();
        }
        
        header("Location: ../index.php?error=" . urlencode($msg));
        exit;
    }
}
?>