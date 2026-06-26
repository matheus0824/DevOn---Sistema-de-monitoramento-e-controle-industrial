<?php
require_once 'crud.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

$figurinha = read($pdo, 'figurinhas', "id = $id");

if (!$figurinha) {
    die("Figurinha não encontrada.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Figurinha</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<form action="update.php" method="post" enctype="multipart/form-data">

    <h2 style="text-align:center; color: white;">
        Editar Figurinha
    </h2>

    <input type="hidden" name="id" value="<?= $figurinha['id'] ?>">

    <label>Nome:</label>
    <input type="text" name="nome" 
           value="<?= $figurinha['nome'] ?>" required><br><br>

    <label>Seleção:</label>
    <input type="text" name="selecao" 
           value="<?= $figurinha['selecao'] ?>"><br><br>

    <label>Time:</label>
    <input type="text" name="time" 
           value="<?= $figurinha['time'] ?>"><br><br>

    <label>Idade:</label>
    <input type="number" name="idade" 
           value="<?= $figurinha['idade'] ?>"><br><br>

    <label>Posição:</label>

    <select name="posicao">

        <option <?= $figurinha['posicao'] == 'Atacante' ? 'selected' : '' ?>>
            Atacante
        </option>

        <option <?= $figurinha['posicao'] == 'Meio-campo' ? 'selected' : '' ?>>
            Meio-campo
        </option>

        <option <?= $figurinha['posicao'] == 'Zagueiro' ? 'selected' : '' ?>>
            Zagueiro
        </option>

        <option <?= $figurinha['posicao'] == 'Goleiro' ? 'selected' : '' ?>>
            Goleiro
        </option>

    </select><br><br>

    <label>Foto atual:</label>

<?php if (!empty($figurinha['foto'])): ?>
    <img src="<?= $figurinha['foto'] ?>" class="foto-preview-editar">
<?php else: ?>
    <p style="color:white;">Essa figurinha ainda não tem foto.</p>
<?php endif; ?>

<label>Alterar/Adicionar foto:</label>
<input type="file" name="arquivo"><br><br>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

</body>
</html>