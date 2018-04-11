-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2016 às 08:49
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `#magico`
--
CREATE DATABASE IF NOT EXISTS `#magico` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `#magico`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cabecalho_ticket`
--

DROP TABLE IF EXISTS `cabecalho_ticket`;
CREATE TABLE IF NOT EXISTS `cabecalho_ticket` (
  `IDTicket` int(11) NOT NULL AUTO_INCREMENT,
  `IDUser` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Descr` text COLLATE utf8_unicode_ci NOT NULL,
  `IDEstado` int(11) NOT NULL,
  `Data/Hora` datetime NOT NULL,
  `Data Limite` date NOT NULL,
  PRIMARY KEY (`IDTicket`,`IDUser`),
  KEY `IDUser` (`IDUser`),
  KEY `IDEstado` (`IDEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cabecalho_ticket`
--

INSERT INTO `cabecalho_ticket` (`IDTicket`, `IDUser`, `Descr`, `IDEstado`, `Data/Hora`, `Data Limite`) VALUES
(1, 'T001', 'Teste', 2, '2016-06-03 12:16:00', '2016-06-03'),
(2, 'U001', 'Teste', 1, '2016-06-03 16:12:00', '2016-06-03'),
(3, 'T001', 'Teste', 1, '2016-06-03 16:17:00', '2016-06-03'),
(4, 'T001', 'Teste', 1, '2016-06-03 16:18:00', '2016-06-03'),
(5, 'T001', 'NÃ£o me consigo ligar Ã  internet', 1, '2016-06-11 20:56:00', '2016-06-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `CodCliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CodCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`CodCliente`, `Nome`) VALUES
('#Magico', 'TÃ©cnico'),
('#NaoMagico', 'NÃ£o TÃ©cnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `IDEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`IDEstado`, `Estado`) VALUES
(1, 'Pendente'),
(2, 'Em resoluÃ§Ã£o'),
(3, 'ConcluÃdo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas_ticket`
--

DROP TABLE IF EXISTS `linhas_ticket`;
CREATE TABLE IF NOT EXISTS `linhas_ticket` (
  `IDTicket` int(11) NOT NULL AUTO_INCREMENT,
  `IDlinhaTicket` int(11) NOT NULL,
  `Descr` text COLLATE utf8_unicode_ci NOT NULL,
  `IDUser` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Data/Hora` datetime NOT NULL,
  `Tempo Gasto` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Tempo a cobrar` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` text COLLATE utf8_unicode_ci,
  `IDEstado` int(11) NOT NULL,
  `Visivel` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDTicket`,`IDlinhaTicket`),
  KEY `IDUser` (`IDUser`),
  KEY `IDEstado` (`IDEstado`),
  KEY `Visivel` (`Visivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `linhas_ticket`
--

INSERT INTO `linhas_ticket` (`IDTicket`, `IDlinhaTicket`, `Descr`, `IDUser`, `Data/Hora`, `Tempo Gasto`, `Tempo a cobrar`, `Comentario`, `IDEstado`, `Visivel`) VALUES
(1, 1, 'Teste', 'T001', '2016-06-03 16:13:00', '1', '1', '', 2, 1),
(2, 1, 'Teste', 'U001', '2016-06-03 16:12:00', '0', '0', '', 1, 1),
(2, 2, 'Dhsh', 'T001', '2016-06-03 16:14:00', '5', '4', 'Teste', 2, 1),
(2, 3, '.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds .ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds.ksdjh laskjc lksdfhlkjasdh lfkh sdlkfjh dsklfjh dskjlfh lkfjds', 'U001', '2016-06-03 17:08:00', '0', '0', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `IDUser` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `User` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CodCliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDUser`),
  KEY `CodCliente` (`CodCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`IDUser`, `User`, `Nome`, `Password`, `CodCliente`) VALUES
('T001', 'Tecnico1', 'Tecnico', 'Tec1', '#Magico'),
('U001', 'Utilizador1', 'Utilizador1', 'User1', '#NaoMagico'),
('U002', 'Utilizador2', 'Utilizador2', 'User1', '#NaoMagico');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cabecalho_ticket`
--
ALTER TABLE `cabecalho_ticket`
  ADD CONSTRAINT `cabecalho_ticket_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`),
  ADD CONSTRAINT `cabecalho_ticket_ibfk_2` FOREIGN KEY (`IDEstado`) REFERENCES `estado` (`IDEstado`);

--
-- Limitadores para a tabela `linhas_ticket`
--
ALTER TABLE `linhas_ticket`
  ADD CONSTRAINT `linhas_ticket_ibfk_1` FOREIGN KEY (`IDTicket`) REFERENCES `cabecalho_ticket` (`IDTicket`),
  ADD CONSTRAINT `linhas_ticket_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `users` (`IDUser`),
  ADD CONSTRAINT `linhas_ticket_ibfk_3` FOREIGN KEY (`IDEstado`) REFERENCES `estado` (`IDEstado`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`CodCliente`) REFERENCES `clientes` (`CodCliente`);
