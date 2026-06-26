<?php
require_once '../partials/equipamentos_insert.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>DevOn - Cadastrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/cadastroProdutos.css" rel="stylesheet">
</head>

<body class="pagina-cadastro">

<div class="caixa-cadastro">

    <h3 class="titulo-cadastro">Novo Equipamento</h3>
    
    <?php if (!empty($mensagem)): ?> 
        <div class="alerta-erro"><?= htmlspecialchars($mensagem); ?></div> 
    <?php endif; ?>
    
    <form action="cadastro.php" method="POST" enctype="multipart/form-data">
        
        <div class="campo-grupo">
            <label class="campo-legenda">Nome</label>
            <input type="text" name="nome_maquina" class="campo-input" required>
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Variável</label>
            <select name="tipo_variavel" class="campo-select">
                <option value="Temperatura">Temperatura</option>
                <option value="Pressao">Pressão</option>
            </select>
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Status</label>
            <select name="status_funcionamento" class="campo-select">
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
                <option value="Atencao">Atenção</option>
                <option value="Em falha">Em Falha</option>
            </select>
        </div>
        
        <div class="campo-grupo">
            <label class="campo-legenda">Cliente</label>
            <select name="id_cliente" class="campo-select" required>
                <option value="">Selecione...</option>
                <?php foreach ($clientes as $c): ?>
                    <option value="<?= $c['id']; ?>"><?= htmlspecialchars($c['nome_empresa']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="campo-grupo campo-separador">
            <label class="campo-legenda">Foto</label>
            <input type="file" name="foto_equipamento" class="campo-input">
        </div>
        
        <div class="acoes-formulario">
            <a href="equipaments.php" class="btn-voltar">Voltar</a>
            <button type="submit" class="btn-salvar">Salvar</button>
        </div>

    </form>
</div>
</body>
</html>
