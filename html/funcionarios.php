<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_perfil'] !== 'admin') {
    header("Location: formLogin.php");
    exit;
}

require_once '../partials/crud.php';

try {
    $funcionarios = readAll($pdo, 'funcionarios');
} catch (PDOException $e) {
    die("Erro ao carregar os funcionários: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOn - Profissionais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="pagina-profissionais">
<div class="container-principal">

    <header class="topo-pagina">
        <h2 class="titulo-pagina">Equipe de Funcionários</h2>
        <div>
            <a href="index.php" class="btn-dashboard">Dashboard</a>
        </div>
    </header>
    
    <div class="caixa-tabela">
        <div class="table-responsive">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Técnico</th>
                        <th>Especialidade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($funcionarios) > 0): ?>
                        <?php foreach ($funcionarios as $worker): ?>
                        <tr>
                            <td><strong>#<?= $worker['id']; ?></strong></td>
                            <td><?= htmlspecialchars($worker['nome']); ?></td>
                            <td>
                                <span class="badge-info">
                                    <?= isset($worker['especialidade']) ? htmlspecialchars($worker['especialidade']) : 'Técnico de Campo'; ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                $status = isset($worker['status']) ? $worker['status'] : 'Disponível';
                                $cor = ($status == 'Disponível' || $status == 'Ativo') ? 'success' : 'secondary';
                                ?>
                                <span class="badge-<?= $cor; ?>"><?= $status; ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Nenhum funcionário alocado no momento.</td>
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