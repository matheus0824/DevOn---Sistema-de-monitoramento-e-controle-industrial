<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirLogin();

$id_cliente = (int) ($_SESSION['id_cliente'] ?? 0);
$empresa_nome = '';
$equipamentos = [];
$total = 0;
$em_falha = 0;
$funcionando = 0;
$dias_contrato = 0;

if ($id_cliente > 0) {
    $cliente = read($pdo, 'clientes', "id = $id_cliente");
    if ($cliente) {
        $empresa_nome = $cliente['nome_empresa'] ?? '';
        if (!empty($cliente['data_fim_contrato'])) {
            $fim = new DateTime($cliente['data_fim_contrato']);
            $hoje = new DateTime('today');
            $dias_contrato = max(0, (int) $hoje->diff($fim)->format('%r%a'));
        }
    }
    $equipamentos = readAll($pdo, 'equipamentos', "id_cliente = $id_cliente");
} else {
    $equipamentos = readAll($pdo, 'equipamentos');
}

$total = count($equipamentos);
foreach ($equipamentos as $eq) {
    $status = $eq['status_funcionamento'] ?? '';
    if ($status === 'Em falha') {
        $em_falha++;
    } elseif ($status === 'Ativo') {
        $funcionando++;
    }
}
