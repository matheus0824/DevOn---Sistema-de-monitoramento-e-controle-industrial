<div class="container-form">
    <link rel="stylesheet" href="../css/css.css">
        
        <form class="boxCadastro" method="POST" action="../partials/insert.php">
    
    <img src="Imagens/logocadastro.png" alt="">
    <h1>Cadastre-se já!</h1>
    
    <div class="inputInfo">
        <input type="text" name="nome" placeholder="Nome completo" required>
    </div>
    
    <div class="inputInfo">
        <input type="email" name="email" placeholder="E-mail" required>
    </div>
    
    <div class="inputInfo">
        <input type="password" name="senha" placeholder="Senha" required>
    </div>
    
    <div class="inputInfo">
        <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
    </div>
    
    <button type="submit" name="cadastro" class="cadastroButton">Cadastre-se</button>
</form>
    </div>