<?php

require_once 'crud.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['cadastro'])) {
            $nome = trim($_POST['nome'] ?? 'nome');
            $email = trim($_POST['email'] ?? 'email');
            $senha = $_POST['senha'] ?? 'senha';
    
            try {
                if ($nome === 'nome' || $email === 'email' || $senha === 'senha') {
                    $msg = 'Preencha todos os campos.';
                } else {
                    $dados = [
                        'nome' => $nome,
                        'email' => $email,
                        'senha' =>  $senha
                    ];
    
                    create($pdo, 'usuarios', $dados);
                    $msg = 'Usuário cadastrado com sucesso.';
                }
            } catch (Throwable $e) {
                $msg = "Erro: " . $e->getMessage();
            }
    }

    if (isset($_POST['login'])) {
        $nome = trim($_POST['nome'] ?? 'nome');
        $senha = $_POST['senha'] ?? 'senha';

        try {
            if ($nome === 'nome' || $senha === 'senha') {
                $msg = 'Preencha todos os campos.';
            } else {
                $user = read($pdo, 'usuarios', 'nome = "' . $nome . '"');
                if ($user && password_verify($senha, $user['senha'])) {
                    $msg = 'Login bem-sucedido. Bem-vindo, ';
                } else {
                    $msg = 'Usuário ou senha incorretos.';
                }
            }
        } catch (Throwable $e) {
            $msg = "Erro: " . $e->getMessage();
        }
    }
}

?>