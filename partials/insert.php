<?php

require_once '/crud.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['cadastro'])) {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
    
            try {
                if ($username === '' || $email === '' || $password === '') {
                    $msg = 'Preencha todos os campos.';
                } else {
                    $dados = [
                        'username' => $username,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ];
    
                    create($pdo, 'devon', $dados);
                    $msg = 'Usuário cadastrado com sucesso.';
                }
            } catch (Throwable $e) {
                $msg = "Erro: " . $e->getMessage();
            }
    }

    if (isset($_POST['login'])) {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        try {
            if ($username === '' || $password === '') {
                $msg = 'Preencha todos os campos.';
            } else {
                $user = read($pdo, 'devon', 'username = "' . $username . '"');
                if ($user && password_verify($password, $user['password'])) {
                    $msg = 'Login bem-sucedido. Bem-vindo, ' . htmlspecialchars($user['username']) . '!';
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