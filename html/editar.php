<?php
require_once '../partials/equipamentos_update.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>DevOn - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/editar.css" rel="stylesheet">
</head>
<body class="pagina-cadastro">
<div class="caixa-cadastro">
    <h3 class="titulo-cadastro">Editar Equipamento #<?= (int) $equipamento['id']; ?></h3>

    <?php if (!empty($mensagem)): ?>
        <div class="alerta-erro"><?= htmlspecialchars($mensagem); ?></div>
    <?php endif; ?>
    
    <form action="editar.php?id=<?= (int) $equipamento['id']; ?>" method="POST" enctype="multipart/form-data">
        
        <div class="campo-grupo">
            <label class="campo-legenda">Nome</label>
            <input type="text" name="nome_maquina" class="campo-input" required value="<?= htmlspecialchars($equipamento['nome_maquina']); ?>">
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Variável</label>
            <select name="tipo_variavel" class="campo-select">
                <option value="Temperatura" <?= ($equipamento['tipo_variavel'] == 'Temperatura') ? 'selected' : ''; ?>>Temperatura</option>
                <option value="Pressao" <?= ($equipamento['tipo_variavel'] == 'Pressao') ? 'selected' : ''; ?>>Pressão</option>
            </select>
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Status</label>
            <select name="status_funcionamento" class="campo-select">
                <option value="Ativo" <?= ($equipamento['status_funcionamento'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                <option value="Inativo" <?= ($equipamento['status_funcionamento'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                <option value="Atencao" <?= ($equipamento['status_funcionamento'] == 'Atencao') ? 'selected' : ''; ?>>Atenção</option>
                <option value="Em falha" <?= ($equipamento['status_funcionamento'] == 'Em falha') ? 'selected' : ''; ?>>Em Falha</option>
            </select>
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Cliente</label>
            <select name="id_cliente" class="campo-select" required>
                <?php foreach ($clientes as $c): ?>
                    <option value="<?= $c['id']; ?>" <?= ($equipamento['id_cliente'] == $c['id']) ? 'selected' : ''; ?>><?= htmlspecialchars($c['nome_empresa']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="campo-grupo campo-separador">
            <label class="campo-legenda">Alterar Foto</label>
            <input type="file" name="foto_equipamento" class="campo-input">
        </div>
        
        <div class="acoes-formulario">
            <a href="equipaments.php" class="btn-voltar">Cancelar</a>
            <button type="submit" class="btn-atualizar">Atualizar</button>
        </div>
        
    </form>
</div>
</body>
</html>
