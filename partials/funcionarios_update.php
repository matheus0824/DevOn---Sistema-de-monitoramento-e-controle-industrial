<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

$funcionario = null;
$mensagem = '';

if (!isset($_GET['id'])) {
    redirecionarPara(urlHtml('administrador.php'));
}

$id = (int) $_GET['id'];
$funcionario = read($pdo, 'profissionais', "id = $id");

if (!$funcionario) {
    die('Funcionário não encontrado.');
}

$funcionario['status'] = ($funcionario['status_disponibilidade'] ?? 'Disponivel') === 'Afastado'
    ? 'Afastado'
    : 'Disponivel';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$nome = trim($_POST['nome'] ?? '');
$especialidade = trim($_POST['especialidade'] ?? '');
$statusUi = trim($_POST['status'] ?? 'Disponivel');
$statusBanco = in_array($statusUi, ['Afastado', 'Indisponível', 'Indisponivel'], true) ? 'Afastado' : 'Disponivel';

if ($nome === '') {
    $mensagem = 'Informe o nome do funcionário.';
    return;
}

update($pdo, 'profissionais', [
    'nome' => $nome,
    'especialidade' => $especialidade,
    'status_disponibilidade' => $statusBanco,
], "id = $id");

redirecionarPara(urlHtml('funcionarios.php'));
