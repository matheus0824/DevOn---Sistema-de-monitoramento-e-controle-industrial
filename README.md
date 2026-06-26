# 📊 DevOn - Versão 1.5
> *"O monitoramento essencial para quem não admite falhas"*

O **DevOn** é uma plataforma focada em **Industrial IoT (IIoT)** desenvolvida para transformar dados brutos de telemetria (como temperatura e pressão) em informações visuais intuitivas. O objetivo central do sistema é garantir a continuidade operacional e a segurança humana no ambiente industrial através do monitoramento preditivo de variáveis críticas, evitando acidentes e paradas inesperadas na produção.

---

## 👥 Integrantes do Grupo
* **Guilherme Ferreira**
* **Gustavo Gonçales**
* **Matheus Sousa**
* **Pedro Gouvea**
* **Rai Faccio**

---

## 🎯 Missão e Visão
* **Missão:** Garantir a continuidade operacional e a segurança humana no ambiente industrial através do monitoramento preditivo de variáveis críticas.
* **Visão:** Ser a plataforma de monitoramento industrial e gestão de estados mais intuitiva e confiável do mercado de automação.

---

## 💼 Regras de Negócio (RN)

* **RN01 – Gerenciamento e Transição de Estados (Status):** O sistema opera baseado em três estados fundamentais para cada equipamento, gerenciando o comportamento da interface:
  * **Ativo (Normal):** O equipamento está operando dentro dos limites seguros (ex: temperatura tolerável ou pressão nominal).
  * **Inativo (Desligado):** O equipamento foi desligado ou parou de operar para manutenção programada, calibração ou fim de turno.
  * **Em Falha (Com problema) / Atenção (Alerta):** O sensor detectou uma anomalia (ex: superaquecimento ou queda brusca de pressão) ou o sensor detectou que o equipamento não está funcionando corretamente.
* **RN02 – Retorno de Status e Registro de Falhas (Log):** O status *Em Falha* só pode retornar para *Ativo* após uma confirmação manual de "Manutenção Concluída" feita pelo perfil Administrador.
* **RN03 – Controle de Níveis de Acesso (Permissões):** O sistema separa rigorosamente o que cada tipo de usuário pode fazer:
  * **Perfil Administrador (DevOn / Gestor da Planta):** Possui controle total sobre os funcionários, pode gerenciar os planos contratados e tem permissão para alterar o status de qualquer máquina ou cliente em caso de emergência.
  * **Perfil Cliente (Operador da Fábrica):** Tem acesso exclusivo à sua própria Área do Cliente. Pode visualizar o Dashboard em tempo real e alterar o estado de suas máquinas apenas entre *Ativo* e *Inativo*. Não pode excluir equipamentos nem visualizar dados de outras empresas.
* **RN04 – Regra de Faturamento e Bloqueio de Planos:** O acesso à "Área do Cliente" e ao "Painel de Monitoramento" é condicionado ao status do plano adquirido na página de checkout. Caso o pagamento não seja validado ou expire, o status do cliente muda para "Inadimplente", bloqueando o acesso às telas visuais de telemetria.

---

## ⚙️ Requisitos Funcionais (RF)

* **RF01 – Autenticação e Controle de Sessão por Nível de Acesso:** O sistema deve permitir que usuários realizem login informando e-mail e senha. Após a validação, o sistema deve iniciar uma sessão e identificar se o nível de acesso é "Administrador" ou "Cliente", redirecionando o usuário para a sua respectiva interface e bloqueando acessos a páginas não autorizadas.
* **RF02 – Registro Automático de Log:** O sistema deve disparar um gatilho automático de gravação no banco de dados sempre que um equipamento mudar de status para "Em Falha". Esse registro deve salvar de forma obrigatória: a data e hora do evento, o ID do equipamento e o último valor lido pelo sensor.
* **RF03 – Filtro de Equipamentos por Cliente:** O sistema deve restringir a exibição dos cards de monitoramento na "Área do Cliente", aplicando um filtro para que um cliente autenticado visualize única e exclusivamente os equipamentos vinculados à sua própria conta.
* **RF04 – Filtro de Inconsistência de Telemetria:** O sistema deve validar continuamente as leituras enviadas pelos sensores em tempo real. Caso o dado recebido viole os limites físicos descritos na RN05, o sistema deve rejeitar a leitura, classificar o evento como "Erro de Leitura do Sensor" e acionar o RF02 (Log de Falha).
* **RF05 – Liberação Manual de Equipamento (Reset de Falha):** O sistema deve permitir que apenas usuários com o "Perfil Administrator" alterem o status de um equipamento entre as opções “Em Falha”, “Ativo”, “Atenção”, “Inativo”.
* **RF06 – Dashboard Visual Para o Cliente:** O sistema deve disponibilizar uma Área do Cliente uma interface simples informando os equipamentos em monitoramento, o tipo de monitoramento que está sendo feito e o status de funcionamento do equipamento.

---

## 🛠️ Requisitos Não Funcionais (RNF)

* **RNF01 – Restrição Tecnológica:** O back-end do sistema deve ser desenvolvido obrigatoriamente utilizando a linguagem PHP, e a persistência de dados deve ser feita utilizando o banco de dados relacional MySQL.
* **RNF02 – Padronização Visual e Identidade:** A interface do sistema deve seguir estritamente o guia de estilo proposto pela equipe de Front-end, utilizando obrigatoriamente a fonte *Space Sans* e/ou a fonte *Gilroy*.
* **RNF03 – Segurança de Pagamento:** Por motivos de segurança e privacidade, a página de formulário de pagamento deve realizar apenas validações visuais e lógicas locais. O sistema está proibido de armazenar dados sensíveis de cartões de crédito ou códigos PIX no banco de dados local da aplicação.

---

## 🗺️ Guia de Páginas e Funções da Equipe

### 4.1 - Home
* **Front-end (Matheus):** Desenvolver o design institucional focado na identidade da empresa. Utilizar a fonte *Space Sans* para títulos e *Gilroy* para o corpo do texto. Criar a seção com as marcas parceiras (VW e Boeing) e os cards visuais dos planos de contratação.
* **Back-end (Guilherme):** Configurar o redirecionamento dinâmico dos cards de planos. Ao clicar em um pacote, o sistema deve enviar os parâmetros e o valor do plano escolhido para a página de pagamento através da URL.

### 4.2 - Login/Cadastro
* **Front-end (Pedro e Rai):** Construir uma interface limpa com transição suave (via abas ou botões) entre o formulário de login e o de cadastro. Aplicar validações visuais nos campos (como e-mail válido e tamanho mínimo de senha).
* **Back-end (Gustavo e Matheus):** Fazer o processamento seguro dos formulários via método POST.

### 4.3 - Interface do Administrador
* **Front-end (Pedro e Rai):** Desenvolver o painel de controle (Dashboard) principal do administrador, contendo tabelas responsivas para listar os funcionários e os clientes cadastrados, além de criar janelas flutuantes para as ações de inserção e edição de dados.
* **Back-end (Gustavo e Matheus):** Implementar toda a lógica de manipulação de dados do painel, executando os comandos INSERT, DELETE e UPDATE para gerenciar os funcionários, pacotes de planos e permitir a alteração ou atualização forçada das máquinas dos clientes.

### 4.4 - Área do Cliente
* **Front-end (Guilherme e Rai):** Criar uma grade visual interativa (Grid) composta por cards informativos e uma linha para cada equipamento monitorado. Os cards devem mudar de cor dinamicamente para indicar o estado atual: Verde para *Ativo*, Vermelho para *Inativo* e Vermelho para *Em Falha* e Amarelo para *Atenção*.
* **Back-end (Gustavo e Matheus):** Desenvolver a consulta inteligente ao banco de dados. A lógica deve filtrar e trazer na tela apenas os equipamentos e status que estejam diretamente vinculados ao ID do cliente que iniciou a sessão.

### 4.5 - Pagamento e Aprovação
* **Front-end (Pedro e Guilherme):** Construir um formulário simulado de checkout (Cartão de Crédito e PIX) com máscaras de digitação para os números. Criar também a página de feedback visual de alta fidelidade para confirmar o sucesso e a aprovação da compra.
* **Back-end (Gustavo e Matheus):** Criar a camada de validação em PHP para conferir se todos os campos obrigatórios do formulário foram preenchidos corretamente (garantindo a segurança de não salvar dados sensíveis de cartão no banco) e realizar o redirecionamento automático para a página de sucesso.

### 4.6 - Página: Termos de Uso
* **Front-end (Matheus):** Estruturar uma página puramente textual, com foco total em uma tipografia limpa, organizada e legível, garantindo a transparência e segurança jurídica sobre como os dados de monitoramento industrial são tratados.

---

## Identidade Visual

### 🔤 Tipografia
* **Títulos:** Space Sans
* **Corpo de Texto:** Gilroy

### 🎨 Paleta de Cores
| Cor | Hexadecimal | Amostra |
| :--- | :--- | :--- |
| Branco Gelo | `#F5F5F5` |
| Cinza Claro | `#DADCCD` |
| Verde Oliva Claro | `#A3B18A` |
| Verde Médio | `#588157` |
| Verde Escuro Industrial | `#3A5A40` |