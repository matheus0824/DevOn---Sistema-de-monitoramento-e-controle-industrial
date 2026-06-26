<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_perfil'] !== 'admin') {
    die("Acesso negado.");
}

require_once 'crud.php';

if (isset($_GET['id'])) {
    $id_excluir = (int)$_GET['id'];
    
    $maquina = read($pdo, 'equipamentos', "id = $id_excluir");
    if ($maquina && !empty($maquina['imagem'])) {
        $caminho_foto = "uploads/" . $maquina['imagem'];
        if (file_exists($caminho_foto)) {
            unlink($caminho_foto);
        }
    }

    delete($pdo, 'equipamentos', "id = $id_excluir");
}

header("Location: equipamentos.php");
exit;