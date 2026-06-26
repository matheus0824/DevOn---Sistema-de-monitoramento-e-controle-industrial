<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>DevOn | Home</title>
</head>
<body>

    <?php include 'html/header.php'; ?>

    <main> 
        <div class="container-slogan">
            <div class="slogan-content">
                <h1 class="slogan-h1">Controle total de processos e supervisão industrial em tempo real</h1>
                <p class="slogan-p"><b>O monitoramento essencial <br>para quem não admite falhas.</b></p>
            </div>

            <div class="botoes-container">
                <a href="#planos"><button class="botton-planos"><b>Planos</b></button></a>
            </div>
        </div>

        <img src="img/ChatGPT Image 14 de mai. de 2026, 15_27_57.png" alt="logo" class="imagem-logo">
    
        <div class="carrossel-fundo">
            <div class="carrossel">
                <div class="group">
                    <div class="carrossel-card">°C</div>
                    <div class="carrossel-card">RPM</div>
                    <div class="carrossel-card">Bar</div>
                    <div class="carrossel-card">m³/h</div>
                    <div class="carrossel-card">kW</div>
                    <div class="carrossel-card">Hz</div>
                    <div class="carrossel-card">pH</div>
                    <div class="carrossel-card">A</div>
                    <div class="carrossel-card">V</div>
                    <div class="carrossel-card">PSI</div>
                    <div class="carrossel-card">m/s</div>
                    <div class="carrossel-card">%UR</div>
                </div>

                <div class="group" aria-hidden="true">
                    <div class="carrossel-card">°C</div>
                    <div class="carrossel-card">RPM</div>
                    <div class="carrossel-card">Bar</div>
                    <div class="carrossel-card">m³/h</div>
                    <div class="carrossel-card">kW</div>
                    <div class="carrossel-card">Hz</div>
                    <div class="carrossel-card">pH</div>
                    <div class="carrossel-card">A</div>
                    <div class="carrossel-card">V</div>
                    <div class="carrossel-card">PSI</div>
                    <div class="carrossel-card">m/s</div>
                    <div class="carrossel-card">%UR</div>
                </div>
            </div>
        </div>
    </main>
        
    <section class="sobre-empresa" id="sobre" >
        <div class="texto-sobre">
            <h3><b>A DevOn nasceu para transformar dados industriais em decisões estratégicas. Conectamos o chão de fábrica à gestão, garantindo que suas máquinas operem na máxima eficiência, mitigando riscos de parada e otimizando a alocação de equipes técnicas.</b></h3>
        </div>

        <div class="imagem-sobre">
            <div>
                <img src="img/Design sem nome (1).png" alt="logo" class="imagem-logo-sobre">
                <p>Supervisão Centralizada: Acompanhe telemetrias de temperatura, pressão e rotação em um único dashboard intuitivo e integrado.</p>
            </div>

            <div>
                <img src="img/tabela-removebg-preview.png" alt="logo" class="imagem-logo-sobre">
                <p>Gestão de Ordens de Serviço: Crie, edite e despache manutenções preventivas e corretivas de forma automatizada pelo sistema.</p>
            </div>
                
            <div>
                <img src="img/avatar-removebg-preview.png" alt="logo" class="imagem-logo-sobre">
                <p>Alocação de Técnicos: Vincule os profissionais certos às ocorrências com base em disponibilidade e nível de especialidade.</p>
            </div>
        </div>
    </section>

    <section class="secao-servicos">


        <div class="container-servicos">

                <img src="img/D_NQ_NP_615671-MLB109772962950_042026-O-removebg-preview.png" class="painel-controle">

                <img src="img/medidor-vibracao-removebg-preview.png" class="medidor-vibracao">

                <img src="img/pressão-removebg-preview.png" class="medidor-pressao">
                <a href="#planos"><button class="botton-planos-servicos" id="planos">Planos</button></a>

            <div class="servicos-lista">
                <div class="servico-item">
                    <div class="circulo-indicador"></div>
                    <p>Alertas automáticos em tempo real para prevenção de falhas críticas.</p>
                </div>
                <div class="servico-item">
                    <div class="circulo-indicador"></div>
                    <p>Relatórios detalhados de desempenho (OEE) e histórico de sensores.</p>
                </div>
                <div class="servico-item">
                    <div class="circulo-indicador"></div>
                    <p>Rastreabilidade total das atividades e do tempo de resposta dos técnicos.</p>
                </div>
                
                </div>
           
        </div>
    </section>

    <section class="secao-empresa-slideshow">
        <div class="container-empresa-slides">
            <div class="slides-fotos">
                <div class="foto-slide foto1"></div>
                <div class="foto-slide foto2"></div>
            </div>

            <div class="texto-empresa-box">
                <h2>Conheça nossa infraestrutura digital</h2>
                <p>Nossa plataforma é construída sobre servidores de alta disponibilidade e banco de dados otimizado para lidar com requisições contínuas de telemetria. Unimos segurança de dados industriais com a flexibilidade do ambiente web.</p>
            </div>
        </div>
    </section>



    <section class="secao-planos" id="planos">
        <h2 class="titulo-planos">Escolha o plano ideal para sua indústria</h2>
        
        <div class="container-planos">
            <div class="card-plano">
                <h3 class="nome-plano">Básico</h3>
                <div class="preco-plano">R$ 249,90<span>/mês</span></div>
                <ul class="recursos-plano">
                    <li>Gestão de equipamentos</li>
                    <li>Controle de processor</li>
                    <li>Manutenção mensal</li>
                </ul>
            </div>

            <div class="card-plano destaque">
                <h3 class="nome-plano">Intermediário</h3>
                <div class="preco-plano">R$ 399,90<span>/mês</span></div>
                <ul class="recursos-plano">
                    <li>Gestão de equipamentos</li>
                    <li>Controle de processor</li>
                    <li>Manutenção mensal</li>
                    <li>Monitoramento personalizado</li>
                </ul>
                                
            </div>

            <div class="card-plano">
                <h3 class="nome-plano">Elite</h3>
                <div class="preco-plano">R$ 599,90<span>/mês</span></div>
                <ul class="recursos-plano">
                    <li>Gestão de equipamentos</li>
                    <li>Controle de processor</li>
                    <li>Manutenção mensal</li>
                    <li>Monitoramento personalizado</li>
                    <li>visitas a qualquer momento</li>
                </ul>
            </div>
                <a href="html/teste.php"><button class="botao-plano">Assinar Agora</button></a>

        </div>
    </section>

    <footer class="footer-container">
        <?php include 'html/footer.php'; ?>
    </footer>

</body>
</html>