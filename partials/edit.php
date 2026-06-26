<?php
session_start();
if (!isset($_SESSION['usurio_id']) || $_SESSION['usuario_perfil'] !== 'admin') {
    header("location: ../index.php");
    exit;
}

require_once '../partials/crud.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $equipamento = read($pdo, 'equipamentos', "id = $id");
    if (!$equipamento) {
        die("Equipamento não encontrado.");
    }
} else {
    die("Location: ../html/equipaments.");
    exit;
}

$clientes = readAll($pdo, 'clientes');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_maquina = trim($_POST['nome_maquina']);
    $tipo_variavel = ($_POST['tipo_variavel']);
    $status_funcionamento = ($_POST['status_funcionamento']);
    $id_cliente = (int)$_POST['id_cliente'];
    $nome_foto_banco = $equipamento['imagem'];

    if (isset($_FILES['foto_equipamento']) && $_FILES['foto_equipamento']['error'] == 0 ) {
        $arquivo = $_FILES['foto_equipamento'];
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        
        if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (!is_dir("uploads")) {
                mkdir("uploads", 0755, true);
            }
            $nome_final_foto = "../uploads/" . $id_maquina . ".jpg";

            move_uploaded_file($arquivo['tmp_name'], $nome_final_foto);

    }
}

    if (!empty($nome_maquina) && !empty($id_cliente)) {
        $dados = [
            'nome_maquina' => $nome_maquina,
            'tipo_variavel' => $tipo_variavel,
            'status_funcionamento' => $status_funcionamento,
            'id_cliente' => $id_cliente,
            'imagem' => $nome_foto_banco
        ];

    update($pdo, 'equipamentos', $dados, "id = $id_maquina");
    header("Location: ../html/equipaments.php");
    exit;
}
}
?>