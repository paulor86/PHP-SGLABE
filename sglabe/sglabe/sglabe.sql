-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/06/2018 às 00:29
-- Versão do servidor: 10.1.32-MariaDB
-- Versão do PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sglabe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `fk_matricula` int(11) NOT NULL,
  `data_agendamento` datetime NOT NULL,
  `tipo` enum('laboratorio','externa') DEFAULT NULL,
  `status` enum('negado','aprovado','aprovado_parcial','aguardando') NOT NULL DEFAULT 'aguardando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento_externa`
--

CREATE TABLE `agendamento_externa` (
  `fk_matricula` int(11) NOT NULL,
  `fk_data_agendamento` datetime NOT NULL,
  `data` date NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `fk_tombo` varchar(30) NOT NULL,
  `status` enum('aprovado','negado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento_laboratorios`
--

CREATE TABLE `agendamento_laboratorios` (
  `fk_matricula` int(11) NOT NULL,
  `fk_data_agendamento` datetime NOT NULL,
  `data_ag_lab` date NOT NULL,
  `fk_tempo` int(11) NOT NULL,
  `fk_turno` tinyint(4) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fk_codigo_lab` int(11) NOT NULL,
  `status` enum('aprovado','negado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `codigo_curso` varchar(8) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cursos`
--

INSERT INTO `cursos` (`codigo_curso`, `descricao`) VALUES
('0a0a0', 'Web'),
('3b4b3', 'IA'),
('CI', 'Ciência da Computação'),
('CM', 'Engenharia da Computação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `codigo_disciplina` varchar(8) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `disciplinas`
--

INSERT INTO `disciplinas` (`codigo_disciplina`, `descricao`) VALUES
('4D4D5545', 'Engenharia'),
('A34C066', 'Banco de Dados I'),
('CISN4451', 'Engenharia De Software'),
('J17C080', 'Desenvolvimento Web');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas_cursos`
--

CREATE TABLE `disciplinas_cursos` (
  `fk_codigo_curso` varchar(8) NOT NULL,
  `fk_matricula` int(11) NOT NULL,
  `fk_codigo_disciplina` varchar(8) NOT NULL,
  `periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `disciplinas_cursos`
--

INSERT INTO `disciplinas_cursos` (`fk_codigo_curso`, `fk_matricula`, `fk_codigo_disciplina`, `periodo`) VALUES
('CI', 15059324, 'A34C066', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `descricao` varchar(200) NOT NULL,
  `tombo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `equipamentos`
--

INSERT INTO `equipamentos` (`descricao`, `tombo`) VALUES
('TEK PIX', '15422s');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `tempo` int(11) NOT NULL,
  `turno` tinyint(4) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `horarios`
--

INSERT INTO `horarios` (`tempo`, `turno`, `inicio`, `fim`) VALUES
(1, 1, '07:00:00', '08:00:00'),
(1, 2, '13:00:00', '14:00:00'),
(2, 1, '08:00:00', '09:00:00'),
(2, 2, '14:00:00', '15:00:00'),
(3, 1, '07:00:00', '07:00:00'),
(3, 2, '15:00:00', '14:00:00'),
(4, 1, '10:00:00', '11:00:00'),
(4, 2, '16:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `laboratorios`
--

CREATE TABLE `laboratorios` (
  `codigo_lab` int(11) NOT NULL,
  `num_maquinas` int(11) DEFAULT '0',
  `area` enum('informatica','comunicacao') NOT NULL,
  `descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `laboratorios`
--

INSERT INTO `laboratorios` (`codigo_lab`, `num_maquinas`, `area`, `descricao`) VALUES
(4201, 35, 'informatica', 'teste 01'),
(4202, 45, 'informatica', 'teste 02'),
(4603, 44, 'informatica', NULL),
(4604, 43, 'informatica', NULL),
(12545, 0, 'comunicacao', 'teste2'),
(12546, 45, 'comunicacao', 'laboratorio de teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `maquinas`
--

CREATE TABLE `maquinas` (
  `tombo` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `fk_codigo_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `maquinas`
--

INSERT INTO `maquinas` (`tombo`, `descricao`, `fk_codigo_lab`) VALUES
('15424', 'Iphone 5s com iCloud bloqueado, ja sabe né', 4202),
('22222', 'Lenovo I3 4gb ram', 4202);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperar_senha`
--

CREATE TABLE `recuperar_senha` (
  `chave` varchar(40) NOT NULL,
  `fk_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`chave`, `fk_matricula`) VALUES
('3caea4285baa9e59d28b0bd279cf020c21170d58', 15059324);

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `fk_matricula` int(11) NOT NULL,
  `tipo` enum('software','reparo_maquina') DEFAULT NULL,
  `data_solicitacao` datetime NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `solicitacao`
--

INSERT INTO `solicitacao` (`fk_matricula`, `tipo`, `data_solicitacao`, `descricao`) VALUES
(15038327, 'software', '2018-06-10 20:07:25', 'bloco de notas'),
(15038327, 'software', '2018-06-10 20:10:40', 'bloco de notas'),
(15059324, 'reparo_maquina', '2018-06-10 00:37:29', 'quero acessar o xvideos'),
(15059324, 'software', '2018-06-10 00:47:39', 'crack do office'),
(15059324, 'software', '2018-06-10 22:07:46', 'Campo minado'),
(15059324, 'software', '2018-06-10 22:43:26', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_solicitacao`
--

CREATE TABLE `status_solicitacao` (
  `fk_matricula` int(11) NOT NULL,
  `status` enum('andamento','concluido','erro','cancelado') DEFAULT 'andamento',
  `fk_data_solicitacao` datetime NOT NULL,
  `data_atualizacao` datetime NOT NULL,
  `descricao` varchar(200) NOT NULL DEFAULT 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `status_solicitacao`
--

INSERT INTO `status_solicitacao` (`fk_matricula`, `status`, `fk_data_solicitacao`, `data_atualizacao`, `descricao`) VALUES
(15038327, 'andamento', '2018-06-10 20:07:25', '2018-06-10 20:07:25', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'),
(15038327, 'andamento', '2018-06-10 20:10:40', '2018-06-10 20:10:40', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'),
(15059324, 'andamento', '2018-06-10 00:37:29', '2018-06-10 00:37:29', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'),
(15059324, 'andamento', '2018-06-10 00:47:39', '2018-06-10 00:47:39', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'),
(15059324, 'andamento', '2018-06-10 22:07:46', '2018-06-10 22:07:46', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail'),
(15059324, 'andamento', '2018-06-10 22:43:26', '2018-06-10 22:43:26', 'Sua solicitação foi realizada com sucesso, aguarde notificação por e-mail');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_solicitacao`
--

CREATE TABLE `tipo_solicitacao` (
  `fk_matricula` int(11) NOT NULL,
  `fk_data_solicitacao` datetime NOT NULL,
  `fk_tombo` varchar(30) NOT NULL,
  `fk_codigo_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_solicitacao`
--

INSERT INTO `tipo_solicitacao` (`fk_matricula`, `fk_data_solicitacao`, `fk_tombo`, `fk_codigo_lab`) VALUES
(15038327, '2018-06-10 20:07:25', '15424', 4202),
(15038327, '2018-06-10 20:10:40', '15424', 4202),
(15059324, '2018-06-10 00:37:29', '15424', 4202),
(15059324, '2018-06-10 00:47:39', '15424', 4202),
(15059324, '2018-06-10 22:07:46', '15424', 4202),
(15059324, '2018-06-10 22:43:26', '15424', 4202),
(15059324, '2018-06-10 00:37:29', '22222', 4202),
(15059324, '2018-06-10 00:47:39', '22222', 4202),
(15059324, '2018-06-10 22:07:46', '22222', 4202),
(15059324, '2018-06-10 22:43:26', '22222', 4202);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `codigo_turma` varchar(8) NOT NULL,
  `fk_codigo_curso` varchar(8) NOT NULL,
  `periodo` int(11) NOT NULL,
  `turno` enum('m','t','n') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `turmas`
--

INSERT INTO `turmas` (`codigo_turma`, `fk_codigo_curso`, `periodo`, `turno`) VALUES
('CIN07S1', 'CI', 7, 'n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(70) NOT NULL,
  `matricula` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `perfil` enum('coordenador','prof_auxiliar','usuario','prof_responsavel') DEFAULT NULL,
  `status_conta` enum('ativado','desativado') NOT NULL,
  `area` enum('informatica','comunicacao') NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `sobrenome`, `matricula`, `cpf`, `email`, `senha`, `perfil`, `status_conta`, `area`, `telefone`) VALUES
('Paulo', 'Roberto', 15038327, '111.111.111-11', 'paulo86roberto@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'coordenador', 'ativado', 'informatica', '92992204996'),
('Daniel', 'De Sá', 15059324, '020.335.312-95', 'suporte@sglabe.tk', '2e6f9b0d5885b6010f9167787445617f553a735f', 'coordenador', 'ativado', 'informatica', '9232125001'),
('Marco', 'Mulinari', 15059326, '121.458.478-95', 'marcos@gmail.com', '2e6f9b0d5885b6010f9167787445617f553a735f', 'usuario', 'ativado', 'comunicacao', '92984167548'),
('Jack', 'Motors', 15059328, '020.339.552-22', 'jack@sglabe.teste.com', '2e6f9b0d5885b6010f9167787445617f553a735f', 'prof_responsavel', 'ativado', 'comunicacao', '9232125000'),
('Frank', 'Carrilho', 15101266, '22222222222', 'frankcarrilho@unn.edu.br', '23a6a3cf06cfd8b1a6cda468e5756a6a6a1d21e7', 'coordenador', 'ativado', 'informatica', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`fk_matricula`,`data_agendamento`),
  ADD KEY `data_agendamento` (`data_agendamento`);

--
-- Índices de tabela `agendamento_externa`
--
ALTER TABLE `agendamento_externa`
  ADD PRIMARY KEY (`data`,`fk_matricula`,`inicio`,`fim`,`fk_tombo`),
  ADD KEY `fk_matricula` (`fk_matricula`),
  ADD KEY `fk_data_agendamento` (`fk_data_agendamento`),
  ADD KEY `fk_tombo` (`fk_tombo`);

--
-- Índices de tabela `agendamento_laboratorios`
--
ALTER TABLE `agendamento_laboratorios`
  ADD PRIMARY KEY (`fk_codigo_lab`),
  ADD KEY `fk_matricula` (`fk_matricula`),
  ADD KEY `fk_data_agendamento` (`fk_data_agendamento`),
  ADD KEY `fk_tempo` (`fk_tempo`),
  ADD KEY `fk_turno` (`fk_turno`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigo_curso`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`codigo_disciplina`);

--
-- Índices de tabela `disciplinas_cursos`
--
ALTER TABLE `disciplinas_cursos`
  ADD PRIMARY KEY (`fk_codigo_curso`,`fk_matricula`,`fk_codigo_disciplina`),
  ADD KEY `fk_matricula` (`fk_matricula`),
  ADD KEY `fk_codigo_disciplina` (`fk_codigo_disciplina`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`tombo`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`tempo`,`turno`),
  ADD KEY `tempo` (`tempo`),
  ADD KEY `turno` (`turno`);

--
-- Índices de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`codigo_lab`);

--
-- Índices de tabela `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`fk_codigo_lab`,`tombo`);

--
-- Índices de tabela `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  ADD PRIMARY KEY (`fk_matricula`,`chave`);

--
-- Índices de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`fk_matricula`,`data_solicitacao`),
  ADD KEY `data_solicitacao` (`data_solicitacao`);

--
-- Índices de tabela `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
  ADD PRIMARY KEY (`fk_matricula`,`fk_data_solicitacao`,`data_atualizacao`),
  ADD KEY `fk_data_solicitacao` (`fk_data_solicitacao`);

--
-- Índices de tabela `tipo_solicitacao`
--
ALTER TABLE `tipo_solicitacao`
  ADD PRIMARY KEY (`fk_matricula`,`fk_tombo`,`fk_data_solicitacao`),
  ADD KEY `fk_solicitacao` (`fk_matricula`,`fk_data_solicitacao`),
  ADD KEY `fk_maquinas` (`fk_codigo_lab`,`fk_tombo`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`codigo_turma`,`fk_codigo_curso`),
  ADD KEY `fk_codigo_curso` (`fk_codigo_curso`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matricula`);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `usuarios` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `agendamento_externa`
--
ALTER TABLE `agendamento_externa`
  ADD CONSTRAINT `agendamento_externa_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `agendamentos` (`fk_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_externa_ibfk_2` FOREIGN KEY (`fk_data_agendamento`) REFERENCES `agendamentos` (`data_agendamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_externa_ibfk_3` FOREIGN KEY (`fk_tombo`) REFERENCES `equipamentos` (`tombo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `agendamento_laboratorios`
--
ALTER TABLE `agendamento_laboratorios`
  ADD CONSTRAINT `agendamento_laboratorios_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `agendamentos` (`fk_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_laboratorios_ibfk_2` FOREIGN KEY (`fk_data_agendamento`) REFERENCES `agendamentos` (`data_agendamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_laboratorios_ibfk_3` FOREIGN KEY (`fk_tempo`) REFERENCES `horarios` (`tempo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_laboratorios_ibfk_4` FOREIGN KEY (`fk_turno`) REFERENCES `horarios` (`turno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_laboratorios_ibfk_5` FOREIGN KEY (`fk_codigo_lab`) REFERENCES `laboratorios` (`codigo_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `disciplinas_cursos`
--
ALTER TABLE `disciplinas_cursos`
  ADD CONSTRAINT `disciplinas_cursos_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `usuarios` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplinas_cursos_ibfk_2` FOREIGN KEY (`fk_codigo_curso`) REFERENCES `cursos` (`codigo_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplinas_cursos_ibfk_3` FOREIGN KEY (`fk_codigo_disciplina`) REFERENCES `disciplinas` (`codigo_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`fk_codigo_lab`) REFERENCES `laboratorios` (`codigo_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  ADD CONSTRAINT `recuperar_senha_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `usuarios` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_matricula`) REFERENCES `usuarios` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
  ADD CONSTRAINT `status_solicitacao_ibfk_1` FOREIGN KEY (`fk_matricula`) REFERENCES `solicitacao` (`fk_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_solicitacao_ibfk_2` FOREIGN KEY (`fk_data_solicitacao`) REFERENCES `solicitacao` (`data_solicitacao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tipo_solicitacao`
--
ALTER TABLE `tipo_solicitacao`
  ADD CONSTRAINT `fk_maquinas` FOREIGN KEY (`fk_codigo_lab`,`fk_tombo`) REFERENCES `maquinas` (`fk_codigo_lab`, `tombo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitacao` FOREIGN KEY (`fk_matricula`,`fk_data_solicitacao`) REFERENCES `solicitacao` (`fk_matricula`, `data_solicitacao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`fk_codigo_curso`) REFERENCES `cursos` (`codigo_curso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
