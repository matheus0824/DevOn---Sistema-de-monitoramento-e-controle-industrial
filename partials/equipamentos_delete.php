<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

if (!isset($_GET['id'])) {
    redirecionarPara(urlHtml('equipaments.php'));
}

$id = (int) $_GET['id'];
$maquina = read($pdo, 'equipamentos', "id = $id");
$uploadsDir = dirname(__DIR__) . '/uploads';

if ($maquina) {
    $fotoPorId = $uploadsDir . '/' . $id . '.jpg';
    if (file_exists($fotoPorId)) {
        unlink($fotoPorId);
    }
    if (!empty($maquina['imagem'])) {
        $fotoBanco = $uploadsDir . '/' . $maquina['imagem'];
        if (file_exists($fotoBanco)) {
            unlink($fotoBanco);
        }
    }
    delete($pdo, 'equipamentos', "id = $id");
}

redirecionarPara(urlHtml('equipaments.php'));
