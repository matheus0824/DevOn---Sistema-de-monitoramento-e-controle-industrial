<?php require_once '../partials/cliente_dashboard.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente - DevOn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="../css/cliente.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'header.php'?>
    <main>
        <div class="container-all">
            <div class="sub-container">
                <div class="titulo"><h1>Dashboard<?= $empresa_nome !== '' ? ' — ' . htmlspecialchars($empresa_nome) : ''; ?></h1></div>

                <div class="container-cards">
                    <div class="card">
                        <div class="card-esq"><i class="bi bi-box-fill"></i></div>
                        <div class="card-dir"><h1><?= $total; ?></h1> <h2>Qtd. Equipamentos</h2></div>
                    </div>

                    <div class="card">
                        <div class="card-esq"><i class="bi bi-exclamation-circle-fill"></i></div>
                        <div class="card-dir"><h1><?= $em_falha; ?></h1> <h2>Equipamentos em falha</h2></div>
                    </div>

                    <div class="card">
                        <div class="card-esq"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="card-dir"><h1><?= $funcionando; ?>/<?= $total; ?></h1> <h2>Equipamentos Funcionando</h2></div>
                    </div>
                </div>

                <div class="dashboard">
                    <table>
                        <tr>
                            <th class="table-titulo">Equipamento</th>
                            <th class="table-titulo">Monitoramento</th>
                            <th class="table-titulo">Status</th>
                        </tr>
                        <?php if (count($equipamentos) > 0): ?>
                            <?php foreach ($equipamentos as $eq): ?>
                            <?php
                            $classe = 'status-inativo';
                            $st = $eq['status_funcionamento'] ?? '';
                            if ($st === 'Ativo') {
                                $classe = 'status-ativo';
                            } elseif ($st === 'Em falha') {
                                $classe = 'status-falha';
                            } elseif ($st === 'Atencao') {
                                $classe = 'status-atencao';
                            }
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($eq['nome_maquina']); ?></td>
                                <td><?= htmlspecialchars($eq['tipo_variavel']); ?></td>
                                <td class="<?= $classe; ?>"><?= htmlspecialchars($st); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Nenhum equipamento cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
</body>
</html>
