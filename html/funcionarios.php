<?php
require_once '../partials/auth.php';
require_once '../partials/crud.php';

exigirAdmin();

try {
    $funcionarios = readAll($pdo, 'profissionais');
} catch (PDOException $e) {
    die('Erro ao carregar os funcionários: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOn - Profissionais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/funcio.css" rel="stylesheet">
</head>
<body class="pagina-profissionais">
<div class="container-principal">

    <header class="topo-pagina">
        <h2 class="titulo-pagina">Equipe de Funcionários</h2>
        <div>
            <a href="administrador.php" class="btn-dashboard">Dashboard</a>
        </div>
    </header>

    <div class="caixa-cadastro" style="margin-bottom: 1.5rem;">
        <h3 class="titulo-cadastro">Adicionar funcionário</h3>
        <form action="../partials/funcionarios_insert.php" method="POST" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nome" class="campo-input" placeholder="Nome" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="especialidade" class="campo-input" placeholder="Especialidade" value="Técnico de Campo">
            </div>
            <div class="col-md-3">
                <select name="status" class="campo-select">
                    <option value="Disponível">Disponível</option>
                    <option value="Indisponível">Indisponível</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn-salvar w-100">+</button>
            </div>
        </form>
    </div>
    
    <div class="caixa-tabela">
        <div class="table-responsive">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Técnico</th>
                        <th>Especialidade</th>
                        <th>Status</th>
                        <th>Ações</th>
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
                                    <?= htmlspecialchars($worker['especialidade'] ?? 'Técnico de Campo'); ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                $statusDb = $worker['status_disponibilidade'] ?? 'Disponivel';
                                $status = ($statusDb === 'Afastado') ? 'Indisponível' : 'Disponível';
                                $cor = ($statusDb === 'Afastado') ? 'secondary' : 'success';
                                ?>
                                <span class="badge-<?= $cor; ?>"><?= htmlspecialchars($status); ?></span>
                            </td>
                            <td>
                                <a href="editar_funcionario.php?id=<?= $worker['id']; ?>" class="btn-editar">Editar</a>
                                <a href="../partials/funcionarios_delete.php?id=<?= $worker['id']; ?>" class="btn-excluir" onclick="return confirm('Excluir este funcionário?');">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="texto-semfuncionario">Nenhum funcionário alocado no momento.</td>
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
