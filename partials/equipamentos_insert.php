<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

$mensagem = '';
$clientes = readAll($pdo, 'clientes');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$nome_maquina = trim($_POST['nome_maquina'] ?? '');
$tipo_variavel = $_POST['tipo_variavel'] ?? '';
$status_funcionamento = $_POST['status_funcionamento'] ?? '';
$id_cliente = (int) ($_POST['id_cliente'] ?? 0);

if ($nome_maquina === '' || $id_cliente < 1) {
    $mensagem = 'Preencha todos os campos obrigatórios.';
    return;
}

$uploadsDir = dirname(__DIR__) . '/uploads';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}

$cliente = read($pdo, 'clientes', "id = $id_cliente");
if (!$cliente) {
    $mensagem = 'Cliente não encontrado.';
    return;
}

$maquinas_atuais = readAll($pdo, 'equipamentos', "id_cliente = $id_cliente");
$limite = (int) ($cliente['limite_maquinas'] ?? 0);

if ($limite > 0 && count($maquinas_atuais) >= $limite) {
    $mensagem = 'ERRO: O cliente já atingiu o limite de máquinas permitido.';
    return;
}

$dados = [
    'nome_maquina' => $nome_maquina,
    'tipo_variavel' => $tipo_variavel,
    'status_funcionamento' => $status_funcionamento,
    'id_cliente' => $id_cliente,
];

$novoId = create($pdo, 'equipamentos', $dados);

if ($novoId && isset($_FILES['foto_equipamento']) && $_FILES['foto_equipamento']['error'] === UPLOAD_ERR_OK) {
    $extensao = strtolower(pathinfo($_FILES['foto_equipamento']['name'], PATHINFO_EXTENSION));
    if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'], true)) {
        $destino = $uploadsDir . '/' . $novoId . '.jpg';
        move_uploaded_file($_FILES['foto_equipamento']['tmp_name'], $destino);
    }
}

redirecionarPara(urlHtml('equipaments.php'));
