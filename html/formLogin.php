<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DevOn</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="container">
        <form action="../partials/insert.php" method="POST" class="login-box">
            <h1 style="color: #3a5a40; margin-bottom: 20px; font-family: 'Gilroy-Bold', sans-serif;">Login</h1>
            
            <input type="email" id="nome" name="nome" placeholder="E-mail ou Usuário" required>
            
            <div class="senha-box">
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            
            <input type="submit" value="Login" name="login" style="width: 100%; padding: 12px; background-color: #3a5a40; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">

            <a href="formCadastro.php" style="margin-top: 15px; text-decoration: none; color: #555;">Não tem uma conta? Cadastre-se</a>
        </form>
    </div>

</body>
</html>