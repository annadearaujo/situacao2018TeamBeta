-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jul-2018 às 16:23
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
-- Estrutura da tabela `postagens`
--

DROP TABLE IF EXISTS `postagens`;
CREATE TABLE `postagens` (
  `id_postagens` int(8) NOT NULL,
  `id_tipo_postagem` int(5) NOT NULL,
  `data_hora` datetime NOT NULL,
  `img_postagem` varchar(100) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `texto` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id_postagens`, `id_tipo_postagem`, `data_hora`, `img_postagem`, `titulo`, `texto`) VALUES
(1, 1, '2018-07-28 08:39:14', '8b0419bd704da0f00463bff4d372e745.png', 'dfgsdfg', 'dsfgdfg'),
(2, 1, '2018-07-28 08:41:43', '4a55ecba6f2c21b1c7d141ae6d245194.png', 'dfgsdfg', 'dsfgdfg'),
(3, 1, '2018-07-28 10:27:09', '4ffe5b38808ab6eb13881a09de230644.png', '', ''),
(4, 2, '2018-07-28 10:33:18', '6a3be65e0a22dadf0be78eec7610f13e.png', '', ''),
(5, 1, '2018-07-28 11:15:02', 'cc3daebaa7c10df7e68b24cecc06f429.jpg', '', ''),
(6, 2, '2018-07-28 11:15:59', '45e5c82b0953a75102404917879c1587.png', '', ''),
(7, 3, '2018-07-28 11:19:20', '86fb71928b87408a0ebe121b76c176f2.png', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_postagem`
--

DROP TABLE IF EXISTS `tipo_postagem`;
CREATE TABLE `tipo_postagem` (
  `id_tipo_postagem` int(5) NOT NULL,
  `tipo_postagem` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_postagem`
--

INSERT INTO `tipo_postagem` (`id_tipo_postagem`, `tipo_postagem`) VALUES
(1, 'Animes'),
(2, 'Mangas'),
(3, 'HQs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(4) NOT NULL,
  `tipo_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Normal'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(8) NOT NULL,
  `id_tipo_usuario` int(4) NOT NULL,
  `CPF` int(11) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome_usuario` varchar(35) NOT NULL,
  `img_fundo` varchar(100) DEFAULT NULL,
  `img_perfil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `CPF`, `email`, `nome_completo`, `data_nascimento`, `senha`, `nome_usuario`, `img_fundo`, `img_perfil`) VALUES
(3, 2, NULL, 'admin@gmail.com', NULL, NULL, '202cb962ac59075b964b07152d234b70', 'admin', NULL, NULL),
(19, 1, NULL, 'annapaulalima@hotmail.com', NULL, NULL, '202cb962ac59075b964b07152d234b70', 'anna paula', NULL, NULL),
(20, 1, NULL, 'acre.org@acre.com', NULL, NULL, '202cb962ac59075b964b07152d234b70', 'anna', NULL, NULL),
(21, 2, NULL, 'admin.@gmail.com', NULL, NULL, '202cb962ac59075b964b07152d234b70', 'admin.admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_postagens`),
  ADD KEY `id_tipo_postagem` (`id_tipo_postagem`);

--
-- Indexes for table `tipo_postagem`
--
ALTER TABLE `tipo_postagem`
  ADD PRIMARY KEY (`id_tipo_postagem`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_postagens` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipo_postagem`
--
ALTER TABLE `tipo_postagem`
  MODIFY `id_tipo_postagem` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`id_tipo_postagem`) REFERENCES `tipo_postagem` (`id_tipo_postagem`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
