<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

$mensagem = '';
$clientes = readAll($pdo, 'clientes');
$equipamento = null;

if (!isset($_GET['id'])) {
    redirecionarPara(urlHtml('administrador.php'));
}

$id = (int) $_GET['id'];
$equipamento = read($pdo, 'equipamentos', "id = $id");

if (!$equipamento) {
    die('Equipamento não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$nome_maquina = trim($_POST['nome_maquina'] ?? '');
$tipo_variavel = $_POST['tipo_variavel'] ?? '';
$status_funcionamento = $_POST['status_funcionamento'] ?? '';
$id_cliente = (int) ($_POST['id_cliente'] ?? 0);

$uploadsDir = dirname(__DIR__) . '/uploads';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}

if (isset($_FILES['foto_equipamento']) && $_FILES['foto_equipamento']['error'] === UPLOAD_ERR_OK) {
    $arquivo = $_FILES['foto_equipamento'];
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

    if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'], true)) {
        $destino = $uploadsDir . '/' . $id . '.jpg';
        move_uploaded_file($arquivo['tmp_name'], $destino);
    }
}

if ($nome_maquina === '' || $id_cliente < 1) {
    $mensagem = 'Preencha todos os campos obrigatórios.';
    return;
}

$dados = [
    'nome_maquina' => $nome_maquina,
    'tipo_variavel' => $tipo_variavel,
    'status_funcionamento' => $status_funcionamento,
    'id_cliente' => $id_cliente,
];

update($pdo, 'equipamentos', $dados, "id = $id");
redirecionarPara(urlHtml('equipaments.php'));
