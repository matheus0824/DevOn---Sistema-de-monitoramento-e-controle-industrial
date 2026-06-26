<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro - Estilo Exemplo</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once 'header.php'?>

<div class="pagina-cadastro">
    <div class="container-central">
        <div class="caixa-cadastro">
            <h1 class="titulo-pagina">Cadastro</h1>
            
            <main>
                <form method="post" action="../partials/insert.php">
                    
                    <input type="text" id="username" name="nome" placeholder="Nome completo" required>

                    <input type="password" id="senha" name="senha" placeholder="Senha" required>

                    <input type="email" id="email" name="email" placeholder="E-mail" required>

                    <input type="submit" value="Cadastrar" name="cadastro" class="btn-login">
                    
                    <div class="link-rodape">
                        <a href="formLogin.php">Já possui uma conta? Entre</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
<?php require_once 'footer.php'?>
</body>
</html>
    