<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'header.php' ?>
    <main>
        <div class="container">
            <h1>Escaneie o QR Code para pagar</h1>    

            <img src="../img/qrcodePix.png" alt="">

            <a class="confirm" onclick="alert('Pagamento Confirmado! Obrigado pela preferência')"><div class="pag-barra">Já Paguei</div></a>

            <div class="voltar"><a onclick="history.back()">Voltar</a></div>
        </div>
    </main>
    <?php require_once 'footer.php' ?>

    <style>
        @import url('https://fonts.cdnfonts.com/css/gilroy-bold');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Gilroy-Regular', sans-serif;
        }

        body{
            background-color: #dad7cd;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 85vh;
            min-width: 100%;
            gap: 1rem;
        }

        .container h1{
            background-color: #3a5403;
            color: white;
            padding: 0.8rem;
            font-size: 1.3rem;
            border-radius: 10px;
        }

        .container img {
            width: 400px;
            height: auto;
        }

        .confirm{
            text-decoration: none;
            color: white;
            font-weight: 900;
            font-size: 1.2rem;
        }

        .pag-barra{
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            width: 400px;
            height: 50px;
            background-color: #3a5403;
            transition: ease 0.3s;
            cursor: pointer;
        }

        .pag-barra:hover {
            background-color: rgba(58, 84, 3, 0.7);
        }

        .voltar{
            width: 400px;
            display: flex;
            justify-content: right;
            color: #3a5403;
            cursor: pointer;
            font-weight: 700;
        }
    </style>
</body>
</html>