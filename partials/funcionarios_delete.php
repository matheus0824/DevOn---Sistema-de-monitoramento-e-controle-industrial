<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/crud.php';

exigirAdmin();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    delete($pdo, 'profissionais', "id = $id");
}

redirecionarPara(urlHtml('funcionarios.php'));
