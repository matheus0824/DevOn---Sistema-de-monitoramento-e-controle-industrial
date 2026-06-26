<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - DevOn</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>

    <div class="container-form">
        <form method="post" action="../partials/insert.php" class="boxCadastro">
            <img src="Imagens/logocadastro.png" alt="Logo">
            <h1>Cadastre-se já!</h1>
            
            <div class="inputInfo">
                <input type="text" id="username" name="nome" placeholder="Nome completo" required>
            </div>
            
            <div class="inputInfo">
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            
            <div class="inputInfo">
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            
            <input type="submit" class="cadastroButton" value="Cadastre-se" name="cadastro">
            
            <a href="formLogin.php" style="margin-top: 10px; text-decoration: none; color: #3a5a40;">Já tem conta? Entrar</a>
        </form>
    </div>

</body>
</html>