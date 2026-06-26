<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <footer>
        <div class="footer-esquerda">
            <h1>DevOn</h1>
            <h2>Conectando dados, otimizando resultados</h2>

            <ul>
                <li><a href="https://wa.link/1p5029"><i class="bi bi-whatsapp"></i></a></li>
                <li><a href=""><i class="bi bi-instagram"></i></a></li>
                <li><a href=""><i class="bi bi-twitter-x"></i></a></li>
                <li><a href=""><i class="bi bi-facebook"></i></a></li>
            </ul>
        </div>

        <div class="footer-direita">
            <div class="footer-list">
                <h1>DevOn</h1>
                <ul>
                    <a href="sobrenos.php"><li>Conheça a DevOn</li></a>
                    <a href="pacotes.php"><li>Preços e Planos</li></a>
                    <a href="termosdeUso.php"><li>Termos de Uso</li></a>
                    <a href="contato.php"><li>Contate o Suporte</li></a>
                    <a target="_blank" href="https://maps.app.goo.gl/JW4zX5gjQiQ1x6hcA"><li>Endereço</li></a>
                </ul>
            </div>

            <div class="footer-list">
                <h1>Serviços</h1>
                <ul>
                    <li>Supervisão Industrial</li>
                    <li>Controle de Processos</li>
                    <li>Monitoramento de Temperatura</li>
                    <li>Monitoramento de Pressão</li>
                    <li>Alarmes Industriais</li>
                </ul>
            </div>
        </div>
    </footer>

    <style>
        @import url('https://fonts.cdnfonts.com/css/gilroy-bold');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Gilroy-Regular', sans-serif;
        }

        main {
            /* background-color: #dad7cd; */
        }

        footer {
            background-color: white;
            min-height: 300px;
            height: 100%;
            width: 100%;
            display: flex;  
            align-items: center;
            justify-content: center;
            gap: 10rem;
            z-index: 1000;
        }

        .footer-esquerda{
            /* width: 50%; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
            gap: 12px;
            /* padding-left: 25%; */
            /* background-color: aqua; */
        }

        .footer-esquerda h1{
            font-family: 'Gilroy-Bold', sans-serif;
            color: #3a5a40;
            font-size: 2.2rem;
        }

        .footer-esquerda h2{
            color: #3a5a40;
            font-size: 1.2rem;
        }

        .footer-esquerda ul {
            display: flex;
            margin-top: 5%;
        }

        .footer-esquerda ul{
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .footer-esquerda li a{
            color: black;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .footer-direita{
            /* padding-right: 25%; */
            gap: 5rem;
            /* width: 50%; */
            display: flex;
            justify-content: right;
            align-items: center;
        }

        .footer-direita h1{
            font-family: 'Gilroy-Bold', sans-serif;
            font-size: 1.6rem;
            color: #3a5a40;
        }

        .footer-direita ul{
            margin-top: 0.8rem;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 3px;
            font-size: 1.1rem;
            
        }

        .footer-direita li{
            font-weight: 600;
            cursor: pointer;
            transition: ease 0.3s;
            font-family: 'Gilroy-Light', sans-serif;
        }

        .footer-direita a{
            color: black;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: ease 0.3s;
            font-family: 'Gilroy-Light', sans-serif;
        }

        .footer-direita a:hover{
            color: #3a5a40;
            text-shadow: 0 0 10px rgba(58, 90, 64, 0.1);
        }

        .footer-direita li:hover{
            color: #3a5a40;
            text-shadow: 0 0 10px rgba(58, 90, 64, 0.1);
        }
    </style>
</body>
</html>