<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="../css/pacotes.css" rel="stylesheet">
</head>

<body>
    <?php require_once 'header.php'?>
    <main>
        <div class="container-produtos">

            <div class="box-produto">
                <h1>Prata</h1>

                <h3>Para quem está começando a crescer e busca gestão simples</h3>

                <h2>R$ 249,90</h2>

                <hr>

                <h4>Benefícios:</h4>

                <ul class="beneficios">
                    <li class="green">Gestão de equipamentos</li>
                    <li class="green">Controle de processos</li>
                    <li class="green">Manutenção mensal</li>
                    <li class="red">Monitoramento personalizado</li>
                    <li class="red">Visitas à qualquer momento</li>
                </ul>

                <a href="pagamentoPrata.php" class="contratar">Contrate Já</a>
            </div>

            <div class="box-produto">
                <h1>Ouro</h1>

                <h3>Para empresas que buscam crescer e automatizar processos</h3>

                <h2>R$ 299,90</h2>

                <hr>

                <h4>Benefícios:</h4>

                <ul class="beneficios">
                    <li class="green">Gestão de equipamentos</li>
                    <li class="green">Controle de processos</li>
                    <li class="green">Manutenção mensal</li>
                    <li class="green">Monitoramento personalizado</li>
                    <li class="red">Visitas à qualquer momento</li>
                </ul>

                <a href="pagamentoOuro.php" class="contratar">Contrate Já</a>
            </div>

            <div class="box-produto">
                <h1>Platina</h1>

                <h3>Para quem busca eficiência operacional e gestão avançada</h3>

                <h2>R$ 379,90</h2>

                <hr>

                <h4>Benefícios:</h4>

                <ul class="beneficios">
                    <li class="green">Gestão de equipamentos</li>
                    <li class="green">Controle de processos</li>
                    <li class="green">Manutenção mensal</li>
                    <li class="green">Monitoramento personalizado</li>
                    <li class="green">Visitas à qualquer momento</li>
                </ul>

                <a href="pagamentoPlatina.php" class="contratar">Contrate Já</a>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'?>

    <!-- Ajustar detalhes de alinhamento dos cards -->
</body>

</html>