<?php
//session_start();
//if ($_SESSION['usuario_perfil'] !== 'admin') {
  //  header("location: ../index.php");
   // exit;
//}

require_once 'crud.php';

$mensagem = "";
$clientes = readAll($pdo, 'clientes');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_maquina = trim($_POST['nome_maquina']);
    $tipo_variavel = ($_POST['tipo_variavel']);
    $status_funcionamento = ($_POST['status_funcionamento']);
    $id_cliente = (int)$_POST['id_cliente'];
    $nome_foto_banco = null;

    if (isset($_FILES['foto_equipamento']) && $_FILES['foto_equipamento']['error'] == 0 ) {
        $arquivo = $_FILES['foto_equipamento'];
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
            $novo_nome_arquivo = uniqid() . "." . $extensao;
            if (move_uploaded_file($arquivo['tmp_name'], "uploads/" . $novo_nome_arquivo)) {
                $nome_foto_banco = $novo_nome_arquivo;
            } else {
                $mensagem = "Erro ao fazer upload da foto.";
            }
        }
    }

    if (!empty($nome_maquina) && !empty($id_cliente)) {
        $cliente = read($pdo, 'clientes', "id = $id_cliente");
        $maquinas_atuais = readAll($pdo, 'equipamentos', "id_cliente = $id_cliente");

        if (count($maquinas_atuais) >= $cliente['limite_maquinas']) {
            $mensagem = "ERRO: O cliente já atingiu o limite de máquinas permitido.";
        } else {
            $dados = [
                'nome_maquina' => $nome_maquina,
                'tipo_variavel' => $tipo_variavel,
                'status_funcionamento' => $status_funcionamento,
                'id_cliente' => $id_cliente,
                'imagem' => $nome_foto_banco
            ];
            if (create($pdo, 'equipamentos', $dados)) {
                header("Location: ../html/equipaments.php");
            }
        }
    }
}
?>