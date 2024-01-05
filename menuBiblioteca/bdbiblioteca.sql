-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 03:28
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdbiblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadlivros`
--

CREATE TABLE `cadlivros` (
  `codlivro` int(11) NOT NULL,
  `livro` varchar(30) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `autor` varchar(30) DEFAULT NULL,
  `editora` varchar(30) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadlivros`
--

INSERT INTO `cadlivros` (`codlivro`, `livro`, `genero`, `autor`, `editora`, `paginas`, `data`) VALUES
(1, 'turma da monica', 'drama', 'mauricio de souza', 'panini', 120, '2003-05-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimolivro`
--

CREATE TABLE `emprestimolivro` (
  `codemprestimo` int(11) NOT NULL,
  `codcliente` int(11) NOT NULL,
  `codlivro` int(11) DEFAULT NULL,
  `datasaida` date DEFAULT NULL,
  `dataentrada` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimolivro`
--

INSERT INTO `emprestimolivro` (`codemprestimo`, `codcliente`, `codlivro`, `datasaida`, `dataentrada`, `status`) VALUES
(1, 1, 1, '2023-12-07', '2023-12-07', 'Emprestado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoquelivro`
--

CREATE TABLE `estoquelivro` (
  `codestoque` int(11) NOT NULL,
  `qtde_atual` int(11) DEFAULT NULL,
  `codlivro_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoquelivro`
--

INSERT INTO `estoquelivro` (`codestoque`, `qtde_atual`, `codlivro_fk`) VALUES
(1, 220, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registrocliente`
--

CREATE TABLE `registrocliente` (
  `codregistro` int(11) NOT NULL,
  `codcliente_fk` int(11) NOT NULL,
  `multa` tinyint(1) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registrocliente`
--

INSERT INTO `registrocliente` (`codregistro`, `codcliente_fk`, `multa`, `descricao`, `valor`) VALUES
(1, 1, 1, 'Não devolveu o livro', '11.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usercliente`
--

CREATE TABLE `usercliente` (
  `codcliente` int(11) NOT NULL,
  `cliente` varchar(30) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usercliente`
--

INSERT INTO `usercliente` (`codcliente`, `cliente`, `endereco`, `email`, `telefone`) VALUES
(1, 'Alex', 'alek', 'alek@gmail.com', 119),
(2, 'Gean', 'Rua da asfalto', 'gean@gean', 8222222);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersistema`
--

CREATE TABLE `usersistema` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `perfil` varchar(30) DEFAULT NULL,
  `nivel` enum('func','adm') NOT NULL DEFAULT 'func'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usersistema`
--

INSERT INTO `usersistema` (`codigo`, `nome`, `telefone`, `email`, `senha`, `perfil`, `nivel`) VALUES
(1, 'Otavio', '11950072713', 'tavin@gmail.com', 'tavin1234', 'Tavinho', 'adm'),
(2, 'Alequix', '11950072713', 'alek@gmail.com', '1234', 'alek', 'func');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadlivros`
--
ALTER TABLE `cadlivros`
  ADD PRIMARY KEY (`codlivro`);

--
-- Índices para tabela `emprestimolivro`
--
ALTER TABLE `emprestimolivro`
  ADD PRIMARY KEY (`codemprestimo`),
  ADD KEY `fk_codcliente` (`codcliente`),
  ADD KEY `fk_codlivro` (`codlivro`);

--
-- Índices para tabela `estoquelivro`
--
ALTER TABLE `estoquelivro`
  ADD PRIMARY KEY (`codestoque`),
  ADD KEY `codlivro_fk` (`codlivro_fk`);

--
-- Índices para tabela `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD PRIMARY KEY (`codregistro`),
  ADD UNIQUE KEY `codcliente_fk` (`codcliente_fk`);

--
-- Índices para tabela `usercliente`
--
ALTER TABLE `usercliente`
  ADD PRIMARY KEY (`codcliente`);

--
-- Índices para tabela `usersistema`
--
ALTER TABLE `usersistema`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadlivros`
--
ALTER TABLE `cadlivros`
  MODIFY `codlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `emprestimolivro`
--
ALTER TABLE `emprestimolivro`
  MODIFY `codemprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estoquelivro`
--
ALTER TABLE `estoquelivro`
  MODIFY `codestoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `registrocliente`
--
ALTER TABLE `registrocliente`
  MODIFY `codregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usercliente`
--
ALTER TABLE `usercliente`
  MODIFY `codcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usersistema`
--
ALTER TABLE `usersistema`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimolivro`
--
ALTER TABLE `emprestimolivro`
  ADD CONSTRAINT `fk_codcliente` FOREIGN KEY (`codcliente`) REFERENCES `usercliente` (`codcliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_codlivro` FOREIGN KEY (`codlivro`) REFERENCES `cadlivros` (`codlivro`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `estoquelivro`
--
ALTER TABLE `estoquelivro`
  ADD CONSTRAINT `estoquelivro_ibfk_1` FOREIGN KEY (`codlivro_fk`) REFERENCES `cadlivros` (`codlivro`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD CONSTRAINT `registrocliente_ibfk_1` FOREIGN KEY (`codcliente_fk`) REFERENCES `usercliente` (`codcliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
