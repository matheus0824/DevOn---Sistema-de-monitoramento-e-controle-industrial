<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

$clientes = readAll($pdo, 'clientes');
$equipamentos = readAll($pdo, 'equipamentos');

$id_cliente_filtro = 0;
if (isset($_GET['cliente']) && (int) $_GET['cliente'] > 0) {
    $id_cliente_filtro = (int) $_GET['cliente'];
} elseif (!empty($_GET['empresa'])) {
    $empresa_busca = trim((string) $_GET['empresa']);
    foreach ($clientes as $c) {
        if (strcasecmp(trim((string) ($c['nome_empresa'] ?? '')), $empresa_busca) === 0) {
            $id_cliente_filtro = (int) $c['id'];
            break;
        }
    }
}

if ($id_cliente_filtro > 0) {
    $clienteEncontrado = false;
    foreach ($clientes as $c) {
        if ((int) $c['id'] === $id_cliente_filtro) {
            $clienteEncontrado = true;
            break;
        }
    }
    if (!$clienteEncontrado) {
        $id_cliente_filtro = 0;
    }
}

$lista = $equipamentos;
if ($id_cliente_filtro > 0) {
    $lista = array_values(array_filter($equipamentos, static function ($eq) use ($id_cliente_filtro) {
        return (int) ($eq['id_cliente'] ?? 0) === $id_cliente_filtro;
    }));
}

$total = count($lista);
$em_falha = 0;
$funcionando = 0;
$dias_contrato = 0;

foreach ($lista as $eq) {
    $status = $eq['status_funcionamento'] ?? '';
    if ($status === 'Em falha') {
        $em_falha++;
    } elseif ($status === 'Ativo') {
        $funcionando++;
    }
}

$empresa_nome = 'Todas as empresas';
if ($id_cliente_filtro > 0) {
    $cliente = read($pdo, 'clientes', "id = $id_cliente_filtro");
    if ($cliente) {
        $empresa_nome = $cliente['nome_empresa'] ?? 'Todas as empresas';
        if (!empty($cliente['data_fim_contrato'])) {
            $fim = new DateTime($cliente['data_fim_contrato']);
            $hoje = new DateTime('today');
            $dias_contrato = max(0, (int) $hoje->diff($fim)->format('%r%a'));
        }
    }
}
