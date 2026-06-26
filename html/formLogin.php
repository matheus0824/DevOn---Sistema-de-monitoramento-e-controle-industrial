<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DevOn</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php require_once 'header.php'?>

    <div class="container">
        <form action="../partials/insert.php" method="POST" class="login-box">
            <h1 style="color: #3a5a40; margin-bottom: 20px; font-family: 'Gilroy-Bold', sans-serif;">Login</h1>
            
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            
            <input type="submit" value="Login" name="login" style="width: 106.5%; background-color: #3a5a40; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">

            <a href="formCadastro.php" style="margin-top: 15px; color: #555;">Não tem uma conta? Cadastre-se</a>
        </form>
    </div>

    <?php require_once 'footer.php'?>
</body>
</html>