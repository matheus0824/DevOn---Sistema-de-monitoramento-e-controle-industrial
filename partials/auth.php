<?php

function iniciarSessao(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function diretorioProjetoWeb(): string
{
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/');
    $dir = rtrim(dirname($script), '/');
    $pastaAtual = basename($dir);

    if ($pastaAtual === 'partials' || $pastaAtual === 'html') {
        $dir = dirname($dir);
    }

    return $dir === '/' ? '' : $dir;
}

function urlHtml(string $arquivo): string
{
    return diretorioProjetoWeb() . '/html/' . ltrim($arquivo, '/');
}

function urlRaiz(string $arquivo = 'index.php'): string
{
    return diretorioProjetoWeb() . '/' . ltrim($arquivo, '/');
}

function redirecionarPara(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function usuarioEhAdmin(): bool
{
    $perfil = $_SESSION['usuario_perfil'] ?? $_SESSION['usuario_tipo'] ?? '';
    return $perfil === 'admin';
}

function usuarioEhCliente(): bool
{
    $perfil = $_SESSION['usuario_perfil'] ?? $_SESSION['usuario_tipo'] ?? '';
    return $perfil === 'cliente';
}

function exigirAdmin(): void
{
    iniciarSessao();
    if (!isset($_SESSION['usuario_id'])) {
        redirecionarPara(urlHtml('formLogin.php'));
    }
    if (!usuarioEhAdmin()) {
        redirecionarPara(urlHtml('cliente.php'));
    }
}

function exigirCliente(): void
{
    iniciarSessao();
    if (!isset($_SESSION['usuario_id'])) {
        redirecionarPara(urlHtml('formLogin.php'));
    }
    if (usuarioEhAdmin()) {
        redirecionarPara(urlHtml('administrador.php'));
    }
    if (!usuarioEhCliente()) {
        redirecionarPara(urlHtml('formLogin.php'));
    }
}

function exigirLogin(): void
{
    iniciarSessao();
    if (!isset($_SESSION['usuario_id'])) {
        redirecionarPara(urlHtml('formLogin.php'));
    }
}

function redirecionarPainelLogado(): void
{
    if (usuarioEhAdmin()) {
        redirecionarPara(urlHtml('administrador.php'));
    }
    redirecionarPara(urlHtml('cliente.php'));
}

function redirecionarSeLogado(): void
{
    iniciarSessao();
    if (!isset($_SESSION['usuario_id'])) {
        return;
    }
    redirecionarPainelLogado();
}

function ehRequisicaoLogin(): bool
{
    if (isset($_POST['login'])) {
        return true;
    }
    return isset($_POST['email'], $_POST['senha'])
        && !isset($_POST['cadastro'])
        && !isset($_POST['mensagem']);
}

function sincronizarSessaoUsuario(array $user): void
{
    $id = $user['id'] ?? $user['idUsuarios'] ?? null;
    $perfil = $user['perfil'] ?? $user['tipo'] ?? 'cliente';
    if (!in_array($perfil, ['admin', 'cliente'], true)) {
        $perfil = 'cliente';
    }
    $_SESSION['usuario_id'] = $id;
    $_SESSION['usuario_nome'] = $user['nome'] ?? '';
    $_SESSION['usuario_tipo'] = $perfil;
    $_SESSION['usuario_perfil'] = $perfil;
    if (array_key_exists('id_cliente', $user) && $user['id_cliente'] !== null && $user['id_cliente'] !== '') {
        $_SESSION['id_cliente'] = (int) $user['id_cliente'];
    } else {
        unset($_SESSION['id_cliente']);
    }
}

function senhaUsuarioValida(string $senhaInformada, string $senhaBanco): bool
{
    if ($senhaBanco === '') {
        return false;
    }
    if (password_verify($senhaInformada, $senhaBanco)) {
        return true;
    }
    return hash_equals($senhaBanco, $senhaInformada);
}
