<?php

require_once '/crud.php';

$t = 'devon';
$User = readAll($pdo, $t);
$userId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$userUm = ($userId > 0) ? read($pdo, $t, 'username = ' . $userId) : null;

function hs($v)
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="page">
    <h1>Listar Usuários</h1>
    <section class="box">
        <?php if ($userId > 0 && $userUm) { ?>
            <p class="msg"><?= hs($userUm['nome']) ?></p>
        <?php } elseif ($userId > 0) { ?>
            <p class="muted">Nenhum usuário com esse ID.</p>
        <?php } ?>
    </section>
    <section class="box">
        <?php if (!$User) { ?>
            <p class="muted">Vazio.</p>
        <?php } else { ?>
            <table>
                <tr><th>Nome</th><th>email</th><th>Senha</th></tr>
                <?php foreach ($musicas as $m) { ?>
                    <tr>
                        <td><?= hs($m['nome']) ?></td>
                        <td><?= hs($m['e-mail']) ?></td>
                        <td><?= hs($m['senha']) ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </section>
    <p class="muted"><a href="index.php">Painel principal</a></p>
</main>