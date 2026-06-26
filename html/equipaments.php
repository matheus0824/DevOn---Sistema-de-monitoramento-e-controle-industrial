<?php
require_once '../partials/auth.php';
require_once '../partials/crud.php';

exigirAdmin();
$equipamentos = readAll($pdo, 'equipamentos');

$idFiltro = 0;
if (isset($_GET['cliente']) && (int) $_GET['cliente'] > 0) {
    $idFiltro = (int) $_GET['cliente'];
} elseif (!empty($_GET['empresa'])) {
    $empresaFiltro = trim((string) $_GET['empresa']);
    $clientesLista = readAll($pdo, 'clientes');
    foreach ($clientesLista as $c) {
        if (strcasecmp(trim((string) ($c['nome_empresa'] ?? '')), $empresaFiltro) === 0) {
            $idFiltro = (int) $c['id'];
            break;
        }
    }
}

if ($idFiltro > 0) {
    $equipamentos = array_values(array_filter($equipamentos, static function ($eq) use ($idFiltro) {
        return (int) ($eq['id_cliente'] ?? 0) === $idFiltro;
    }));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOn - Equipamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/equipamento.css" rel="stylesheet">
</head>
<body class="pagina-equipamentos">
<div class="container-principal">

    <header class="topo-pagina">
        <h2 class="titulo-pagina">Gerenciamento de Equipamentos</h2>
        <div class="acoes-topo">
            <a href="administrador.php<?= $idFiltro > 0 ? '?cliente=' . $idFiltro : ''; ?>" class="btn-dashboard">Dashboard</a>
            <a href="cadastro.php" class="btn-cadastrar">+ Cadastrar</a>
        </div>
    </header>
    
    <div class="caixa-tabela">
        <div class="table-responsive">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Variável</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($equipamentos) > 0): ?>
                        <?php foreach ($equipamentos as $eq): ?>
                        <tr>
                            <td><strong>#<?= $eq['id']; ?></strong></td>
                            <td>
                                <?php 
                                $caminho_foto = "../uploads/" . $eq['id'] . ".jpg";
                                if (file_exists($caminho_foto)): ?>
                                    <img src="<?= $caminho_foto; ?>?t=<?= time(); ?>" alt="Foto" class="foto-equipamento">
                                <?php else: ?>
                                    <span class="texto-sem-foto">Sem foto</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($eq['nome_maquina']); ?></td>
                            <td>
                                <span class="badge-variavel">
                                    <?= $eq['tipo_variavel']; ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                $cor = 'warning';
                                if ($eq['status_funcionamento'] == 'Ativo') $cor = 'success';
                                if ($eq['status_funcionamento'] == 'Em falha') $cor = 'danger';
                                ?>
                                <span class="badge-<?= $cor; ?>"><?= $eq['status_funcionamento']; ?></span>
                            </td>
                            <td>
                                <a href="editar.php?id=<?= $eq['id']; ?>" class="btn-editar">Editar</a>
                                <a href="../partials/equipamentos_delete.php?id=<?= $eq['id']; ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este equipamento?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="sem-dados">Nenhum equipamento cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>