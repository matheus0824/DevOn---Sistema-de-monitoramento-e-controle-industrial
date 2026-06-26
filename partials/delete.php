<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

$entidade = $_GET['entidade'] ?? 'equipamento';
$id = (int) ($_GET['id'] ?? 0);

$mapa = [
    'equipamento' => ['tabela' => 'equipamentos', 'redirect' => 'equipaments.php'],
    'profissional' => ['tabela' => 'profissionais', 'redirect' => 'funcionarios.php'],
];

if ($id < 1 || !isset($mapa[$entidade])) {
    redirecionarPara(urlHtml('administrador.php'));
}

$config = $mapa[$entidade];
$registro = read($pdo, $config['tabela'], "id = $id");

if ($registro) {
    if ($entidade === 'equipamento') {
        $uploadsDir = dirname(__DIR__) . '/uploads';
        $fotoPorId = $uploadsDir . '/' . $id . '.jpg';
        if (file_exists($fotoPorId)) {
            unlink($fotoPorId);
        }
    }
    deleteById($pdo, $config['tabela'], $id);
}

redirecionarPara(urlHtml($config['redirect']));
