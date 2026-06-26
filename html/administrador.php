<?php require_once '../partials/admin_dashboard.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - DevOn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="../css/admin.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'header.php'?>
    
    <main>
        <div class="container-all">
            <div class="sub-container">
                <div class="titulo">
                    <h1>Dashboard Admin
                    <?php if (!empty($empresa_nome) && $empresa_nome !== 'Todas as empresas'): ?>
                        <span class="empresa"> | <?= htmlspecialchars($empresa_nome); ?></span>
                    <?php endif; ?></h1>
                </div>

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
                        <?php if (count($lista) > 0): ?>
                            <?php foreach ($lista as $eq): ?>
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
                                <td colspan="3">Nenhum equipamento para exibir.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

            <a href="equipaments.php<?= !empty($empresa_atual) ? '?empresa=' . urlencode($empresa_atual) : ''; ?>" class="atualizar"><i class="bi bi-gear"></i> Gerenciar equipamentos</a>
        </div>

        <div class="sideBar-btn">
            <a href="funcionarios.php"><i class="bi bi-people-fill"></i></a>
            <button type="button" onclick="document.querySelector('.modal').style.display='flex'"><i class="bi bi-person-circle"></i></button>
        </div>

        <div class="modal">
            <div class="sideBar">
                <div class="topo-sideBar">
                    <h1>Administrador</h1>
                    <button type="button" onclick="document.querySelector('.modal').style.display='none'"><i class="bi bi-arrow-return-left"></i></button>
                </div>

                <div class="sub-titulo">
                    <h1>Empresas Cliente</h1> <hr>
                </div>
                
                <input type="text" placeholder="Pesquisar" id="busca-empresa">

                <ul id="lista-empresas">
                    <li><a href="administrador.php">Todas</a></li>
                    <?php foreach ($clientes as $c): ?>
                    <li><a href="administrador.php?empresa=<?= urlencode($c['nome_empresa']); ?>"><?= htmlspecialchars($c['nome_empresa']); ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <div class="log-out"><a href="../partials/logout.php">Sair</a></div>
            </div>
            <div class="fundo"></div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
</body>
</html>
