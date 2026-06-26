CREATE DATABASE IF NOT EXISTS devon_monitoramento;
USE devon_monitoramento;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(100) NOT NULL,
    plano ENUM('Basico', 'Intermediario', 'Premium') NOT NULL DEFAULT 'Basico',
    limite_maquinas INT NOT NULL DEFAULT 3,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin', 'cliente') NOT NULL DEFAULT 'cliente',
    id_cliente INT NULL,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE SET NULL
);

CREATE TABLE equipamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_maquina VARCHAR(100) NOT NULL,
    tipo_variavel ENUM('Temperatura', 'Pressao') NOT NULL,
    status_funcionamento ENUM('Ativo', 'Inativo', 'Em falha', 'Atencao') NOT NULL DEFAULT 'Ativo',
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE
);

CREATE TABLE profissionais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    status_disponibilidade ENUM('Disponivel', 'Afastado') NOT NULL DEFAULT 'Disponivel'
);

CREATE TABLE servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao_servico VARCHAR(255) NOT NULL,
    id_profissional INT NOT NULL,
    id_cliente INT NOT NULL,
    id_equipamento INT NOT NULL,
    data_servico DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fim TIME NOT NULL,
    status_servico ENUM('Agendado', 'Em Andamento', 'Concluido', 'Cancelado') NOT NULL DEFAULT 'Agendado',
    FOREIGN KEY (id_profissional) REFERENCES profissionais(id) ON DELETE RESTRICT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_equipamento) REFERENCES equipamentos(id) ON DELETE CASCADE
);

INSERT INTO clientes (nome_empresa, plano, limite_maquinas) VALUES 
('Indústria de Vidros São Paulo', 'Basico', 3),
('Petroquímica ABC', 'Premium', 999);

INSERT INTO usuarios (nome, email, senha, perfil, id_cliente) VALUES 
('Matheus Admin', 'admin@devon.com', '123456', 'admin', NULL),
('Gerente Vidros', 'gerente@vidrossp.com', '123456', 'cliente', 1);

INSERT INTO equipamentos (nome_maquina, tipo_variavel, status_funcionamento, id_cliente) VALUES 
('Compressor Principal - Linha 1', 'Pressao', 'Ativo', 1),
('Forno de Fusão A', 'Temperatura', 'Atencao', 1),
('Resfriador Secundário', 'Temperatura', 'Em falha', 1);

INSERT INTO profissionais (nome, especialidade) VALUES 
('Técnico João Silva', 'Especialista em Sensores de Temperatura'),
('Técnico Marcos Souza', 'Mecânico de Pressão Hidráulica');