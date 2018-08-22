-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Ago-2018 às 13:43
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teambeta`
--
CREATE DATABASE IF NOT EXISTS `teambeta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teambeta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_postagem` int(8) DEFAULT NULL,
  `id_usuario` int(8) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frete`
--

DROP TABLE IF EXISTS `frete`;
CREATE TABLE `frete` (
  `id_frete` int(8) NOT NULL,
  `id_tipo_frete` int(4) DEFAULT NULL,
  `id_regiao_frete` int(4) DEFAULT NULL,
  `CEP` int(8) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logo_log_in_cadastro_saida`
--

DROP TABLE IF EXISTS `logo_log_in_cadastro_saida`;
CREATE TABLE `logo_log_in_cadastro_saida` (
  `id_log_registo_usuario` int(8) NOT NULL,
  `id_usuario` int(8) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_postagem`
--

DROP TABLE IF EXISTS `log_postagem`;
CREATE TABLE `log_postagem` (
  `id_log_postagem` int(5) NOT NULL,
  `id_usuario_adm` int(8) DEFAULT NULL,
  `id_postagem` int(8) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `id_log_tipo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_vende_produto`
--

DROP TABLE IF EXISTS `log_vende_produto`;
CREATE TABLE `log_vende_produto` (
  `id_log_venda_produto` int(8) NOT NULL,
  `id_venda` int(8) DEFAULT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE `mensagem` (
  `id_mensagem` int(10) NOT NULL,
  `id_remetente` int(8) DEFAULT NULL,
  `id_destinatario` int(8) DEFAULT NULL,
  `mensagem` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

DROP TABLE IF EXISTS `perfil_usuario`;
CREATE TABLE `perfil_usuario` (
  `id_perfil_usuario` int(8) NOT NULL,
  `img_fundo` varchar(100) DEFAULT NULL,
  `img_perfil` varchar(100) DEFAULT NULL,
  `data_hora` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE `postagem` (
  `id_postagem` int(8) NOT NULL,
  `id_tipo_postagem` int(5) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `img_postagem` varchar(100) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `texto` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id_produto` int(8) NOT NULL,
  `material` varchar(25) DEFAULT NULL,
  `composicao` varchar(25) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `cor` varchar(25) DEFAULT NULL,
  `medidas` varchar(100) DEFAULT NULL,
  `tipo_tecido` varchar(25) DEFAULT NULL,
  `img_produto` varchar(100) NOT NULL,
  `nome_produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao_frete`
--

DROP TABLE IF EXISTS `regiao_frete`;
CREATE TABLE `regiao_frete` (
  `id_regiao_frete` int(4) NOT NULL,
  `de_CEP` varchar(20) DEFAULT NULL,
  `ate_CEP` varchar(20) DEFAULT NULL,
  `valor` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_frete`
--

DROP TABLE IF EXISTS `tipo_frete`;
CREATE TABLE `tipo_frete` (
  `id_tipo_frete` int(4) NOT NULL,
  `tipo_frete` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_log`
--

DROP TABLE IF EXISTS `tipo_log`;
CREATE TABLE `tipo_log` (
  `id_tipo_log` int(5) NOT NULL,
  `tipo_log` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_postagem`
--

DROP TABLE IF EXISTS `tipo_postagem`;
CREATE TABLE `tipo_postagem` (
  `id_tipo_postagem` int(5) NOT NULL,
  `tipo_postagem` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(8) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `nome_usuario` varchar(35) DEFAULT NULL,
  `id_perfil_usuario` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `id_venda` int(8) NOT NULL,
  `id_produto` int(8) DEFAULT NULL,
  `id_usuario` int(8) DEFAULT NULL,
  `id_frete` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `comentario_ibfk_1` (`id_usuario`),
  ADD KEY `id_postagem` (`id_postagem`);

--
-- Indexes for table `frete`
--
ALTER TABLE `frete`
  ADD PRIMARY KEY (`id_frete`),
  ADD KEY `frete_ibfk_1` (`id_regiao_frete`),
  ADD KEY `id_tipo_frete` (`id_tipo_frete`);

--
-- Indexes for table `logo_log_in_cadastro_saida`
--
ALTER TABLE `logo_log_in_cadastro_saida`
  ADD PRIMARY KEY (`id_log_registo_usuario`),
  ADD KEY `logo_log_in_cadastro_saida_ibfk_1` (`id_usuario`);

--
-- Indexes for table `log_postagem`
--
ALTER TABLE `log_postagem`
  ADD PRIMARY KEY (`id_log_postagem`),
  ADD KEY `log_postagem_ibfk_1` (`id_usuario_adm`),
  ADD KEY `log_postagem_ibfk_2` (`id_postagem`),
  ADD KEY `id_log_tipo` (`id_log_tipo`);

--
-- Indexes for table `log_vende_produto`
--
ALTER TABLE `log_vende_produto`
  ADD PRIMARY KEY (`id_log_venda_produto`),
  ADD KEY `log_vende_produto_ibfk_2` (`id_venda`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `mensagem` (`id_remetente`),
  ADD KEY `mensagem_ibfk_1` (`id_destinatario`);

--
-- Indexes for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`id_perfil_usuario`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_postagem`),
  ADD KEY `postagem_ibfk_1` (`id_tipo_postagem`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `regiao_frete`
--
ALTER TABLE `regiao_frete`
  ADD PRIMARY KEY (`id_regiao_frete`);

--
-- Indexes for table `tipo_frete`
--
ALTER TABLE `tipo_frete`
  ADD PRIMARY KEY (`id_tipo_frete`);

--
-- Indexes for table `tipo_log`
--
ALTER TABLE `tipo_log`
  ADD PRIMARY KEY (`id_tipo_log`);

--
-- Indexes for table `tipo_postagem`
--
ALTER TABLE `tipo_postagem`
  ADD PRIMARY KEY (`id_tipo_postagem`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario` (`id_perfil_usuario`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `venda_ibfk_1` (`id_produto`),
  ADD KEY `id_frete` (`id_frete`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo_log`
--
ALTER TABLE `tipo_log`
  MODIFY `id_tipo_log` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id_postagem`);

--
-- Limitadores para a tabela `frete`
--
ALTER TABLE `frete`
  ADD CONSTRAINT `frete_ibfk_1` FOREIGN KEY (`id_regiao_frete`) REFERENCES `regiao_frete` (`id_regiao_frete`),
  ADD CONSTRAINT `frete_ibfk_2` FOREIGN KEY (`id_tipo_frete`) REFERENCES `tipo_frete` (`id_tipo_frete`);

--
-- Limitadores para a tabela `logo_log_in_cadastro_saida`
--
ALTER TABLE `logo_log_in_cadastro_saida`
  ADD CONSTRAINT `logo_log_in_cadastro_saida_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `log_postagem`
--
ALTER TABLE `log_postagem`
  ADD CONSTRAINT `log_postagem_ibfk_1` FOREIGN KEY (`id_usuario_adm`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `log_postagem_ibfk_2` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id_postagem`),
  ADD CONSTRAINT `log_postagem_ibfk_3` FOREIGN KEY (`id_log_tipo`) REFERENCES `tipo_log` (`id_tipo_log`);

--
-- Limitadores para a tabela `log_vende_produto`
--
ALTER TABLE `log_vende_produto`
  ADD CONSTRAINT `log_vende_produto_ibfk_2` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem` FOREIGN KEY (`id_remetente`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_destinatario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`id_tipo_postagem`) REFERENCES `tipo_postagem` (`id_tipo_postagem`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_perfil_usuario`) REFERENCES `perfil_usuario` (`id_perfil_usuario`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`id_frete`) REFERENCES `frete` (`id_frete`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
