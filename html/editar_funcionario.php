<?php
require_once '../partials/funcionarios_update.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>DevOn - Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/edit-funcionario.css" rel="stylesheet">
</head>
<body class="pagina-cadastro">
<div class="caixa-cadastro">
    <h3 class="titulo-cadastro">Editar Funcionário #<?= (int) $funcionario['id']; ?></h3>

    <?php if (!empty($mensagem)): ?>
        <div class="alerta-erro"><?= htmlspecialchars($mensagem); ?></div>
    <?php endif; ?>

    <form action="editar_funcionario.php?id=<?= (int) $funcionario['id']; ?>" method="POST">
        <div class="campo-grupo">
            <label class="campo-legenda">Nome</label>
            <input type="text" name="nome" class="campo-input" required value="<?= htmlspecialchars($funcionario['nome']); ?>">
        </div>
        <div class="campo-grupo">
            <label class="campo-legenda">Especialidade</label>
            <input type="text" name="especialidade" class="campo-input" value="<?= htmlspecialchars($funcionario['especialidade'] ?? ''); ?>">
        </div>
        <div class="campo-grupo">
            <label class="campo-legenda">Status</label>
            <select name="status" class="campo-select">
                <?php foreach (['Disponível', 'Indisponível'] as $opt): ?>
                    <option value="<?= $opt; ?>" <?= ($funcionario['status'] ?? '') === $opt ? 'selected' : ''; ?>><?= $opt; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="acoes-formulario">
            <a href="funcionarios.php" class="btn-voltar">Cancelar</a>
            <button type="submit" class="btn-atualizar">Atualizar</button>
        </div>
    </form>
</div>
</body>
</html>
