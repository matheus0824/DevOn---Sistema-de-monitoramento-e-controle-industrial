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



cards dos planos mensais
<?php
require_once 'crud.php';

$figurinhas = readAll($pdo, 'figurinhas');
$totalFigurinhas = count($figurinhas);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Meu Álbum</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <header>
        <a href="index.php"><img src="./imagens/fifa 2026.png" alt="Gerenciamento de figurinhas"
                style="width: 250px; height: 120px;"></a>

        <div class="menu-direita">
            <nav>
                <ul class="menu-principal">
                    <li>
                        <a href="index.php">Cadastrar Figurinha</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <h1 class="titulo-album">Meu Álbum de Figurinhas</h1>
    <h2 class="contador-album">Total de figurinhas: <?= $totalFigurinhas ?></h2>


    <div class="album-container">

        <?php foreach ($figurinhas as $figurinha): ?>

            <div class="card-figurinha">

                <?php if (!empty($figurinha['foto'])): ?>
                    <img src="<?= $figurinha['foto'] ?>" alt="Foto do jogador" class="foto-jogador">
                <?php else: ?>
                    <img src="./imagens/semfoto.png" alt="Sem foto" class="foto-jogador">
                <?php endif; ?>

                <h3 class="nome-jogador"><?= $figurinha['nome'] ?></h3><br>

                <div class="info-grid">
                    <div class="info-item">
                        <span>Seleção</span>
                        <strong><?= $figurinha['selecao'] ?></strong>
                    </div>

                    <div class="info-item">
                        <span>Time</span>
                        <strong><?= $figurinha['time'] ?></strong>
                    </div>

                    <div class="info-item">
                        <span>Idade</span>
                        <strong><?= $figurinha['idade'] ?></strong>
                    </div>

                    <div class="info-item">
                        <span>Posição</span>
                        <strong><?= $figurinha['posicao'] ?></strong>
                    </div>
                </div>

                <a href="edit.php?id=<?= $figurinha['id'] ?>" class="btn-editar">
                    Editar Figurinha
                </a>
                <a href="delete.php?id=<?= $figurinha['id'] ?>" class="btn-excluir"
                    onclick="return confirm('Tem certeza que deseja excluir esta figurinha?')">
                    Excluir Figurinha
                </a>
            </div>

        <?php endforeach; ?>

    </div>

</body>

</html>