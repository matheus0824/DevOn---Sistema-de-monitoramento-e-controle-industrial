<?php

require_once '/crud.php';

$t = 'devon';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['username'] ?? 0);
    try {
        if ($id < 1) {
            $msg = 'Informe um Usuário.';
        } else {
            $n = deleteRow($pdo, $t, 'username = ' . $username);
            $msg = $n > 0 ? 'Excluído.' : 'Não existe o Usuário.';
        }
    } catch (Throwable $e) {
        $msg = $e->getMessage();
    }
}

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
    <title>Excluir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="page">
    <h1>Excluir Usuário</h1>
    <?php if ($msg !== '') { ?>
        <p class="msg"><?= hs($msg) ?></p>
    <?php } ?>
    <section class="box">
        <form method="post" action="" onsubmit="return confirm('Excluir este usuário?');">
            <input name="username" type="username">
            <p><button type="submit" class="del">Excluir</button></p>
        </form>
    </section>
    <!-- <p class="muted"><a href="index.php">Painel principal</a></p> -->
</main>
</body>
</html>










cards do planos mensais

<?php
require_once 'crud.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $figurinha = read($pdo, 'figurinhas', "id = $id");

    if ($figurinha && !empty($figurinha['foto'])) {

        if (file_exists($figurinha['foto'])) {
            unlink($figurinha['foto']);
        }

        $pasta = dirname($figurinha['foto']);

        if (is_dir($pasta)) {
            rmdir($pasta);
        }
    }

    delete($pdo, 'figurinhas', "id = $id");

    header('Location: select.php');
    exit;
}

echo "Figurinha não encontrada.";
?>