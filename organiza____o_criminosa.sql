-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10/07/2025 às 17:35
-- Versão do servidor: 8.0.42-0ubuntu0.24.04.1
-- Versão do PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `organização_criminosa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `faccionado`
--

CREATE TABLE `faccionado` (
  `id_faccionado` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `genero` enum('M','F','Outro','') NOT NULL,
  `data_nascimento` date NOT NULL,
  `CPF` char(11) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `pai` varchar(100) DEFAULT NULL,
  `mae` varchar(100) DEFAULT NULL,
  `conjuge` varchar(100) DEFAULT NULL,
  `faccao` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `faccionado`
--

INSERT INTO `faccionado` (`id_faccionado`, `nome`, `genero`, `data_nascimento`, `CPF`, `nacionalidade`, `estado`, `cidade`, `pai`, `mae`, `conjuge`, `faccao`, `foto`) VALUES
(1, 'Antonio Anerao', 'M', '2000-10-10', '54554144100', 'Brasileira', 'Acre', 'RIo Branco', '', '', '', 'Comando Vermelho', 'img/1752167178_20250707060748.jpeg'),
(3, 'Gabriel Henrique', 'F', '2000-08-10', '02761537238', 'Brasileira', 'Acre', 'RIo Branco', 'gilberto pereira nunes', 'elza lina batista ', '', 'Primeiro Comando da Capital ', 'img/1752167802_20250707060748.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `login`, `senha`) VALUES
(1, 'antonio anerao', 'antonio@anerao', '10203040');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `faccionado`
--
ALTER TABLE `faccionado`
  ADD PRIMARY KEY (`id_faccionado`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `faccionado`
--
ALTER TABLE `faccionado`
  MODIFY `id_faccionado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
