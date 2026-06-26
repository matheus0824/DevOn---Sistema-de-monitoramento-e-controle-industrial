<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['status'])) {
    redirecionarPara(urlHtml('administrador.php'));
}

$nome = trim($_POST['nome'] ?? '');
$especialidade = trim($_POST['especialidade'] ?? 'Técnico de Campo');
$statusUi = trim($_POST['status'] ?? 'Disponivel');
$statusBanco = in_array($statusUi, ['Afastado', 'Indisponível', 'Indisponivel'], true) ? 'Afastado' : 'Disponivel';

if ($nome === '') {
    redirecionarPara(urlHtml('funcionarios.php') . '?error=' . urlencode('Informe o nome do funcionário.'));
}

create($pdo, 'profissionais', [
    'nome' => $nome,
    'especialidade' => $especialidade,
    'status_disponibilidade' => $statusBanco,
]);

redirecionarPara(urlHtml('funcionarios.php'));
