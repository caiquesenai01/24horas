-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 14/11/2025 às 18:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `suporte_senai`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `nome_sala` varchar(100) NOT NULL,
  `descricao_sala` text DEFAULT NULL,
  `localizacao_sala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `salas`
--

INSERT INTO `salas` (`id_sala`, `nome_sala`, `descricao_sala`, `localizacao_sala`) VALUES
(1, 'Sala01', '', NULL),
(2, 'Sala02', '', NULL),
(3, 'Sala03', '', NULL),
(4, 'Sala04', '', NULL),
(5, 'Sala05', '', NULL),
(6, 'Sala06', '', NULL),
(7, 'Sala07', '', NULL),
(8, 'Sala08', '', NULL),
(9, 'Sala09', '', NULL),
(10, 'Sala10', '', NULL),
(11, 'Sala11', '', NULL),
(12, 'Sala12', '', NULL),
(13, 'Sala13', '', NULL),
(14, 'Sala14', '', NULL),
(15, 'Sala15', '', NULL),
(16, 'LAB_DEV_SISTEMAS', '', NULL),
(17, 'LAB_INFORMATICA_I', '', NULL),
(18, 'LAB_INFORMATICA_II', '', NULL),
(19, 'LAB_ACIONAMENTOS', '', NULL),
(20, 'LAB_AUTOMACAO', '', NULL),
(21, 'LAB_MAKER', '', NULL),
(22, 'LAB_PNEUMATICA', '', NULL),
(23, 'LAB_QUIMICA_I', '', NULL),
(24, 'LAB_QUIMICA_II', '', NULL),
(25, 'LAB_LOGISTICA', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores`
--

CREATE TABLE `setores` (
  `id_setor` int(11) NOT NULL,
  `nome_setor` varchar(100) NOT NULL,
  `descricao_setor` text DEFAULT NULL,
  `responsavel_setor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setores`
--

INSERT INTO `setores` (`id_setor`, `nome_setor`, `descricao_setor`, `responsavel_setor`) VALUES
(1, 'Administração', 'Setor padrão para administradores', 'Sistema');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id_tarefa` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `nome_professor_tarefa` varchar(100) NOT NULL,
  `cargo_solicitante` enum('professor','funcionario','tecnico','outros') NOT NULL,
  `sala_tarefa` varchar(150) NOT NULL,
  `descricao_tarefa` text NOT NULL,
  `categoria_tarefa` enum('TI','Manutenção','Estrutural','outros') NOT NULL,
  `status_tarefa` enum('aberta','em andamento','concluida','cancelada') NOT NULL DEFAULT 'aberta',
  `prioridade_tarefa` enum('alta','media','baixa') NOT NULL,
  `foto_tarefa` varchar(255) DEFAULT NULL,
  `data_abertura_tarefa` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_ultima_atualizacao_tarefa` timestamp NULL DEFAULT NULL,
  `data_conclusao_tarefa` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefa`
--

INSERT INTO `tarefa` (`id_tarefa`, `id_professor`, `id_sala`, `id_setor`, `nome_professor_tarefa`, `cargo_solicitante`, `sala_tarefa`, `descricao_tarefa`, `categoria_tarefa`, `status_tarefa`, `prioridade_tarefa`, `foto_tarefa`, `data_abertura_tarefa`, `data_ultima_atualizacao_tarefa`, `data_conclusao_tarefa`) VALUES
(6, 2, 19, NULL, 'Marcos', '', '19', '132erq', 'Manutenção', 'aberta', 'baixa', 'uploads/20210327_173047.jpg', '2025-11-14 21:08:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `cargo_usuario` enum('administrador','professor') NOT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `data_criacao_usuario` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `cargo_usuario`, `id_setor`, `data_criacao_usuario`) VALUES
(2, 'Administrador', 'admin@senai.com', '12345', 'administrador', 1, '2025-11-14 15:22:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Índices de tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id_setor`);

--
-- Índices de tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `id_setor` (`id_setor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`),
  ADD KEY `id_setor` (`id_setor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `tarefa_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`),
  ADD CONSTRAINT `tarefa_ibfk_3` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id_setor`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id_setor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
