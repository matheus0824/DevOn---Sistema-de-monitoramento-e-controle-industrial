<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - DevOn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/contato.css">
</head>
<body>
    <?php require_once 'header.php'?>

    <main>
        <div class="container-all">
            <div class="container-cima">
                <h1>Como deseja falar conosco?</h1>

                <div class="container-card">
                    <div class="card">
                        <i class="bi bi-question-circle-fill"></i>

                        <h1>Perguntas Frequentes</h1>

                        <h2>Acesse dúvidas comuns de outros clientes.</h2>

                        <a href="perguntas.php">Entre em contato</a>
                    </div>

                    <div class="card">
                        <i class="bi bi-chat-left-fill"></i>

                        <h1>Chat Ao Vivo</h1>

                        <h2>Precisando de algo no momento? contante-nos via Whatsapp.</h2>

                        <a target="_blank" href="https://wa.link/1p5029">Entre em contato</a>
                    </div>

                    <div class="card"> 
                        <i class="bi bi-send-fill"></i>

                        <h1>Mande-nos um Email</h1>

                        <h2>Contate-nos via email: DevOn@contato.com</h2>

                        <a target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZZQQBvCmxJxrkSKbzSqgVTnKWwxcshbNdQDbJPzZQJglppMRqJpkBzXHBLMtrpmRntjWL">Entre em contato</a>
                    </div>
                </div>
            </div>
            <div class="container-contato">
                <div class="contato-info">
                    <h1>Entre em contato com a <span>DevOn</span></h1>

                    <h2>Rua Santo André, 680 - Vila Assunção - Santo André - SP, 09020-230</h2>

                    <h3><i class="bi bi-c-circle"></i> 2026 - Todos os direitos reservados</h3>
                </div>

                <div class="container-form">
                    <Label>Fale Conosco</Label>

                    <form action="https://formsubmit.co/ferreiragui71@gmail.com" method="POST">
                        <input type="email" placeholder="Email" required>
                        <input type="text" placeholder="Razão Social(CNPJ)" required>
                        <input type="hidden" name="_next" value="sobrenos.php">

                        <textarea placeholder="Digite sua mensagem" name="mensagem" id="" requires></textarea>

                        <button>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php' ?>
</body>
</html>