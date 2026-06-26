<?php

require_once '/crud.php';

$t = 'usuarios';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $username = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['senha'] ?? '';

    try {
        if ($id < 1 || $nome === '' || $email === '') {
            $msg = 'Informe um ID válido, nome e e-mail.';
        } else {
            $dados = [
                'nome'  => $nome,
                'email' => $email
            ];

            
            if (!empty($senha)) {
                $dados['senha'] = password_hash($senha, PASSWORD_DEFAULT);
            }

            $linhas = update($pdo, $t, $dados, 'id = ' . $id);
            $msg = $linhas > 0 ? 'Usuário atualizado com sucesso.' : 'Nenhuma alteração feita ou ID inexistente.';
        }
    } catch (Throwable $e) {
        $msg = "Erro: " . $e->getMessage();
    }
}

function hs($v) {
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Administração - Atualizar Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="page">
    <h1>Editar Usuário</h1>
    
    <?php if ($msg !== '') { ?>
        <p class="msg"><?= hs($msg) ?></p>
    <?php } ?>

    <section class="box">
        <form method="post" action="">
            <p>
                <label>ID do Usuário: 
                    <input name="id" type="number" min="1" required value="<?= hs($_POST['id'] ?? '') ?>">
                </label>
            </p>
            <p>
                <label>Nome: 
                    <input name="nome" required value="<?= hs($_POST['nome'] ?? '') ?>">
                </label>
            </p>
            <p>
                <label>E-mail: 
                    <input name="email" type="email" required value="<?= hs($_POST['email'] ?? '') ?>">
                </label>
            </p>
            <p>
                <label>Nova Senha (deixe em branco para manter a atual): 
                    <input name="senha" type="password">
                </label>
            </p>
            <p><button type="submit">Atualizar Cadastro</button></p>
        </form>
    </section>
    <p class="muted"><a href="index.php">Voltar ao Painel</a></p>
</main>
</body>
</html>