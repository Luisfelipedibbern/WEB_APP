-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/08/2025 às 20:12
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
-- Banco de dados: `web_app`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sign_up`
--

CREATE TABLE `sign_up` (
  `email` varchar(256) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `numero` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sign_up`
--

INSERT INTO `sign_up` (`email`, `senha`, `nome`, `numero`) VALUES
('vinicius.souza110208@gmail.com', '1234', NULL, NULL),
('naosei@gmail.com', '5678', NULL, NULL),
('naosei@gmail.com', '5678', NULL, NULL),
('naosei@gmail.com', '7204', NULL, NULL),
('vinicius.souza110208@gmail.com', 'nao é eu', NULL, NULL),
('vinicius.souza110208@gmail.com', 'nao é eu', NULL, NULL),
('vinicius.souza110208@gmail.com', 'aa', NULL, NULL),
('vinicius.souza110208@gmail.com', '1', NULL, NULL),
('vinicius.souza110208@gmail.com', '1', NULL, NULL),
('vinicius.souza110208@gmail.com', '21', NULL, NULL),
('vinicius.souza110208@gmail.com', 'eunaoaguentomais', 'vinopavel', 12121212),
('', '', NULL, NULL),
('', '', NULL, NULL),
('vinicius.pcd@gmail.com', 'Pcd1234', 'Vinicius de Souza', 981879552),
('untitled@gmail.com', 'null', 'nulo', 1298181879),
('nameless@gmail.com', '1234qp', 'Sem Nome', 123),
('thierry.rib.sant@gmail.com', 'vaisefude', 'thierry', 36),
('jokerdop5r@gmail.com', 'persona5', 'joker do persona 5', 555555555);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
