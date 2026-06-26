<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagamento.css">
    <title>DevOn - Pacote Prata</title>
</head>

<body>
    <?php require_once 'header.php'?>

    <div class="box-pague">

        <img src="../img/carteira-removebg-preview.png" class="img">

        <p>Contrate o</p>

        <h1>Pacote Platina</h1>
        <div class="preco-box">
            <span class="preco">R$ 379,90</span>

            <span class="mes">por mês</span>

        </div>
    </div>

    <div class="container-pix">


        <div class="pix-box">

            <a href="qrcode.php" class="pagar-pix">
            <div id="pix">
                <img src="../img/pix-do-banco-central-removebg-preview.png" class="icone-pix">
               <i class="fa-brands fa-pix"></i>  Pague com Pix
            </div>
            </a>
            <p>---------------- &nbsp; ou &nbsp; -----------------</p>
            <select>
                <option>Cartao de Debito</option>
                <option>Cartao de Credito</option>
            </select><br><br>


            <input type="text" placeholder="Nome Do Titular"><br>
            <input type="number" placeholder="Numero Do Cartão"><br>

            <div class="linha">
                <input type="number" placeholder="CVV">
                <input type="number" placeholder="Data De Validade">
            </div>
            <button onclick="alert('Compra Finalizada')">Finalizar Compra</button>
        </div>
    </div>
    </div>

    <?php require_once 'footer.php'?>
</body>
</html>