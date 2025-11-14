


-- Criar o banco de dados
CREATE DATABASE Suporte_Senai;
USE Suporte_Senai;

-- Tabela de usuários
CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(100) NOT NULL,
    email_usuario VARCHAR(150) UNIQUE NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL,
    cargo_usuario ENUM('administrador', 'professor') NOT NULL,
    FOREIGN KEY (id_setor) REFERENCES setores(id_setor),
    data_criacao_usuario TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de salas
CREATE TABLE salas (
    id_sala INT PRIMARY KEY AUTO_INCREMENT,
    nome_sala VARCHAR(100) NOT NULL,
    descricao_sala TEXT,
    localizacao_sala VARCHAR(100)
);

-- Tabela de tarefas
o id do professor e da sala foi mais para lincar pois os dados do professor so vai entra pelo 
formuario
CREATE TABLE tarefa (
    id_tarefa INT PRIMARY KEY AUTO_INCREMENT,
    id_professor INT NOT NULL,
    id_sala INT NOT NULL,
    nome_professor_tarefa VARCHAR(100) NOT NULL,
    cargo_solicitante ENUM('professor', 'funcionario', 'tecnico', 'outros') NOT NULL,
    sala_tarefa VARCHAR(150) NOT NULL,
    descricao_tarefa TEXT NOT NULL,
    categoria_tarefa ENUM('TI', 'Manutenção', 'Estrutural', 'outros') NOT NULL,
    status_tarefa ENUM('aberta', 'em andamento', 'concluida', 'cancelada') NOT NULL DEFAULT 'aberta',
    prioridade_tarefa ENUM('alta', 'media', 'baixa') NOT NULL,
    foto_tarefa VARCHAR(255),
    data_abertura_tarefa TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_ultima_atualizacao_tarefa TIMESTAMP NULL,
    data_conclusao_tarefa TIMESTAMP NULL,   
    
    -- Chaves estrangeiras
    FOREIGN KEY (id_professor) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_sala) REFERENCES salas(id_sala),
    FOREIGN KEY (id_setor) REFERENCES setores(id_setor),
);


-- Tabela de setores (NOVA)
CREATE TABLE setores(
    id_setor INT PRIMARY KEY AUTO_INCREMENT,
    nome_setor VARCHAR(100) NOT NULL,
    descricao_setor TEXT,
    responsavel_setor VARCHAR(100),
);


