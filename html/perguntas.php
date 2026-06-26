<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOn - Perguntas Frequentes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/perguntas.css">
</head>
<body>
    <?php require_once 'header.php'?>
    <main>
        <div class="container-all">
            <div class="container-info">
                <h1>Perguntas Frequentes</h1>

                <div class="content">
                    <details>
                        <summary>O sistema é compatível com as máquinas e sensores antigos (legados) que já tenho na fábrica?</summary>

                        <hr>

                        <p>Sim! Nossa plataforma foi desenvolvida para ser agnóstica. Nós nos integramos aos principais protocolos de comunicação industrial do mercado (como Modbus, OPC UA, MQTT e Profinet) e podemos utilizar gateways IoT para conectar até mesmo maquinários mais antigos que não possuem saída de dados nativa.</p>
                    </details>

                    <details>
                        <summary>Como é garantida a segurança dos dados da minha indústria contra ataques cibernéticos?</summary>

                        <hr>

                        <p>A segurança é nossa prioridade máxima. Utilizamos criptografia de ponta a ponta (AES-256) no tráfego de dados, autenticação em dois fatores (2FA), controle de acessos por níveis de usuário (RBAC) e seguimos rigorosamente as diretrizes da LGPD e normas internacionais de cibersegurança industrial, como a IEC 62443.</p>
                    </details>

                    <details>
                        <summary>Vou precisar parar a minha linha de produção para instalar o sistema?</summary>

                        <hr>

                        <p>Na grande maioria dos casos, não. A implementação é feita de forma não invasiva. A coleta de dados pode ser feita em paralelo aos sistemas de controle existentes (via espelhamento de rede ou sensores externos), garantindo que sua operação continue rodando normalmente durante o processo.</p>
                    </details>

                    <details>
                        <summary>O que acontece com os dados se a internet da fábrica cair?</summary>

                        <hr>

                        <p>Você não perde nenhuma informação. Nossos dispositivos de borda (Edge Computing) possuem armazenamento local temporário (store-and-forward). Se a conexão com a internet cair, os dados continuam sendo gravados localmente e são sincronizados automaticamente com o sistema assim que a rede voltar.</p>
                    </details>

                    <details>
                        <summary>O software funciona na nuvem (Cloud) ou localmente (On-Premise)? Consigo acessar pelo celular?</summary>

                        <hr>

                        <p>Oferecemos modelos híbridos. Você pode optar pelo formato 100% em nuvem (com acesso de qualquer lugar via navegador ou aplicativo mobile) ou On-Premise (instalado nos servidores locais da sua fábrica, caso sua política de TI exija).</p>
                    </details>

                    <details>
                        <summary>Como funcionam os alertas em caso de falhas ou anomalias nas máquinas?</summary>

                        <hr>

                        <p>Você pode configurar regras personalizadas de tolerância para cada ativo. Se um sensor detectar uma temperatura ou vibração acima do limite, o sistema dispara alertas em tempo real via WhatsApp, SMS, E-mail ou notificações Push diretamente para a equipe de manutenção responsável.</p>
                    </details>

                    <details>
                        <summary>A plataforma se integra com o nosso ERP (como SAP, Totvs) ou sistema MES?</summary>

                        <hr>

                        <p>Com certeza. Disponibilizamos APIs abertas e conectores nativos que permitem integrar os dados de chão de fábrica diretamente com o seu ERP ou MES. Isso ajuda a automatizar processos como a abertura de ordens de serviço de manutenção ou a atualização do inventário de produção.</p>
                    </details>

                    <details>
                        <summary>Que tipo de suporte técnico vocês oferecem caso o sistema apresente instabilidade?</summary>

                        <hr>

                        <p>Oferecemos suporte técnico especializado com diferentes níveis de SLA (Acordo de Nível de Serviço), dependendo do plano contratado. Nosso atendimento vai desde o suporte em horário comercial via chat e e-mail até suporte emergencial 24 horas por dia, 7 dias por semana, com engenheiros prontos para intervir remotamente.</p>
                    </details>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'?>
</body>
</html>