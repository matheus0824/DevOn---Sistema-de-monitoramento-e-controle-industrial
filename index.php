<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOn - Monitoramento Industrial</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <?php 
    include 'html/header.php'; 
    ?>

    <div class="container">
        <form class="login-box" method="POST" action="partials/insert.php">
            <h2 style="color: #3a5a40; margin-bottom: 15px;">Devon</h2>
            
            <input type="text" name="nome" placeholder="E-mail ou Usuário" required>

            <div class="senha-box">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>

            <a href="#" style="display: block; margin-bottom: 15px; color: #666; font-size: 0.9rem;">Esqueci minha senha</a>

            <button type="submit" name="login">Entrar</button>
        </form>
    </div>

    <?php 
    include 'html/footer.php'; 
    ?>

</body>
</html>