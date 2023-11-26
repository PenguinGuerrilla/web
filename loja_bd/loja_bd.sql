-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 06:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `email`, `telefone`, `data_nasc`, `sexo`, `cep`, `cidade`, `estado`, `rua`, `bairro`, `numero`, `complemento`) VALUES
('111.111.111-11', 'Maria da Silva Sauro', 'maria@hotmail.com', '(22) 59593-6482', '1999-04-23', 'F', '39401-544', 'Montes Claros', 'MG', 'Rua Germiniano Veloso', 'Jardim Brasil', 39, 'Apartamento 505'),
('123.456.789-10', 'joao', 'joao@gmail.com', '(12) 99999-9999', '2009-11-11', 'M', '39401-123', 'Montes Claros', 'MG', 'Rua AntÃ´nio Figueiredo Alves', 'Vila Oliveira', 57, ''),
('999.999.999-99', 'JoÃ£o Samsumg', 'kljdfkls@qweq', '(11) 11111-1111', '1999-02-22', 'M', '39402-549', 'Montes Claros', 'MG', 'PraÃ§a Doutora Zilda Arns Neumann', 'Santo AntÃ´nio', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id_produto` varchar(4) NOT NULL,
  `quantidade` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`id_produto`, `quantidade`) VALUES
('1', 21),
('3122', 7),
('3333', 15),
('3434', 6),
('4321', 10),
('5654', 30);

--
-- Triggers `estoque`
--
DELIMITER $$
CREATE TRIGGER `trg_entradaProduto` AFTER UPDATE ON `estoque` FOR EACH ROW begin
declare p_valor Decimal(8,2);
declare prod_att Decimal(8,2);
set p_valor = (select valor from produto WHERE produto.id_produto = NEW.id_produto);
set prod_att = (p_valor * 0.6);
insert into historico values(null,new.id_produto,new.quantidade,now(), prod_att);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(4) NOT NULL,
  `id_produto` varchar(4) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `data` datetime NOT NULL,
  `valor` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historico`
--

INSERT INTO `historico` (`id_historico`, `id_produto`, `quantidade`, `data`, `valor`) VALUES
(1, '1', 4, '2023-11-22 00:00:00', 0.00),
(2, '1', 4, '2023-11-22 00:00:00', 0.00),
(3, '1', 10, '2023-11-22 00:00:00', 0.00),
(4, '3434', 5, '2023-11-25 00:00:00', 0.00),
(5, '3434', 10, '2023-11-25 00:00:00', 0.00),
(6, '3434', 15, '2023-11-25 00:00:00', 0.00),
(7, '1', 20, '2023-11-25 00:00:00', 0.00),
(8, '3122', -6, '2023-11-25 00:00:00', 0.00),
(9, '3434', -1, '2023-11-25 00:00:00', 0.00),
(10, '4321', 11, '2023-11-25 00:00:00', 0.00),
(11, '4321', -39, '2023-11-25 00:00:00', 0.00),
(12, '1', 15, '2023-11-25 00:00:00', 0.00),
(13, '1', -5, '2023-11-25 00:00:00', 0.00),
(14, '1', 20, '2023-11-25 00:00:00', 0.00),
(15, '1', -10, '2023-11-25 00:00:00', 0.00),
(16, '1', 20, '2023-11-25 00:00:00', 0.00),
(17, '1', -10, '2023-11-25 00:00:00', 0.00),
(18, '1', 20, '2023-11-25 00:00:00', 0.00),
(22, '3122', 10, '2023-11-25 00:00:00', 0.00),
(23, '3434', 10, '2023-11-25 00:00:00', 0.00),
(24, '1', 0, '2023-11-25 00:00:00', 0.00),
(25, '3122', 0, '2023-11-25 00:00:00', 0.00),
(26, '3434', 0, '2023-11-25 00:00:00', 0.00),
(27, '4321', 0, '2023-11-25 00:00:00', 0.00),
(28, '1', -10, '2023-11-25 00:00:00', 0.00),
(29, '3122', -1, '2023-11-25 00:00:00', 0.00),
(30, '3333', -1, '2023-11-25 00:00:00', 0.00),
(31, '3333', -2, '2023-11-25 00:00:00', 0.00),
(32, '1', 10, '2023-11-25 00:00:00', 0.00),
(33, '1', 11, '2023-11-25 00:00:00', 0.00),
(34, '3434', -2, '2023-11-25 00:00:00', 0.00),
(35, '4321', 2, '2023-11-25 00:00:00', 0.00),
(36, '3434', 2, '2023-11-25 00:00:00', 0.00),
(37, '3333', 5, '2023-11-25 00:00:00', 0.00),
(38, '3122', 3, '2023-11-25 00:00:00', 0.00),
(39, '3333', 15, '2023-11-25 00:00:00', 0.00),
(40, '1', 1, '2023-11-25 00:00:00', 0.00),
(41, '1', 10, '2023-11-25 00:00:00', 0.00),
(42, '1', -4, '2023-11-25 00:00:00', 0.00),
(43, '1', 5, '2023-11-25 00:00:00', 0.00),
(44, '1', 1, '2023-11-25 00:00:00', 0.00),
(45, '5654', -10, '2023-11-25 00:00:00', 0.00),
(46, '5654', 10, '2023-11-25 00:00:00', 0.00),
(47, '5654', 1, '2023-11-25 00:00:00', 0.00),
(48, '1', 0, '2023-11-26 00:00:00', 0.00),
(49, '1', 1, '2023-11-26 00:00:00', 0.00),
(50, '1', 10, '2023-11-26 00:00:00', 0.00),
(51, '1', 16, '2023-11-26 00:00:00', 0.00),
(52, '1', 17, '2023-11-26 00:00:00', 0.00),
(53, '5654', 0, '2023-11-26 00:00:00', 0.00),
(54, '5654', 30, '2023-11-26 00:00:00', 0.00),
(55, '1', 16, '2023-11-26 00:00:00', 0.00),
(56, '1', 1, '2023-11-26 00:00:00', 0.00),
(57, '1', 15, '2023-11-26 00:00:00', 0.00),
(58, '1', 1, '2023-11-26 00:00:00', 0.00),
(59, '1', 14, '2023-11-26 00:00:00', 0.00),
(60, '1', 1, '2023-11-26 00:00:00', 0.00),
(61, '1', 25, '2023-11-26 00:00:00', 0.00),
(62, '4321', 12, '2023-11-26 00:00:00', 0.00),
(63, '4321', 11, '2023-11-26 00:00:00', 0.00),
(64, '4321', 1, '2023-11-26 00:00:00', 0.00),
(65, '4321', 10, '2023-11-26 00:00:00', 0.00),
(66, '4321', 1, '2023-11-26 00:00:00', 0.00),
(67, '4321', 1, '2023-11-26 00:00:00', 90.00),
(68, '1', 16, '2023-11-26 00:00:00', 7.21),
(69, '4321', 10, '2023-11-26 00:00:00', 90.00),
(70, '1', 22, '2023-11-26 00:00:00', 7.21),
(71, '1', 21, '2023-11-26 00:00:00', 7.21),
(72, '3122', 7, '2023-11-26 00:00:00', 4.66),
(73, '3434', 6, '2023-11-26 13:14:08', 4.66);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(4) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `id_produto` varchar(4) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `data` datetime NOT NULL,
  `valor_total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `cpf`, `id_produto`, `quantidade`, `data`, `valor_total`) VALUES
(14, '111.111.111-11', '1', 5, '2023-11-26 13:10:45', 60.05),
(15, '111.111.111-11', '1', 1, '2023-11-26 15:25:44', 11.00),
(16, '111.111.111-11', '1', 1, '2023-11-26 15:26:11', 11.00),
(17, '999.999.999-99', '4321', 1, '2023-11-26 16:17:45', 150.00),
(18, '123.456.789-10', '4321', 1, '2023-11-26 13:09:11', 150.00);

--
-- Triggers `pedido`
--
DELIMITER $$
CREATE TRIGGER `trg_alteraPedido` BEFORE UPDATE ON `pedido` FOR EACH ROW BEGIN
    DECLARE quantidade_att INT;
    SET quantidade_att = OLD.quantidade - NEW.quantidade;
    UPDATE estoque SET quantidade = quantidade + quantidade_att WHERE id_produto = NEW.id_produto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_verificaEstoque` BEFORE INSERT ON `pedido` FOR EACH ROW begin
declare q int;
set q = (select quantidade from estoque where estoque.id_produto = new.id_produto);
if q - new.quantidade < 0 then 
signal sqlstate '45000'
set message_text = 'nao ha estoque suficiente';
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_verificaEstoqueUpdate` BEFORE UPDATE ON `pedido` FOR EACH ROW begin
declare q int;
set q = (select quantidade from estoque where estoque.id_produto = new.id_produto);
if q - new.quantidade < 0 then 
signal sqlstate '45000'
set message_text = 'nao ha estoque suficiente';
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id_produto` varchar(4) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `valor`, `categoria`) VALUES
('1', 'Rejunte', 12.01, 'Argamassas e Rejuntes'),
('3122', 'Luva de Pedreiroede', 7.77, 'EPIs'),
('3333', 'a', 111.00, 'asddsa'),
('3434', 'Luva de Pedreiro', 7.77, 'EPIs'),
('4321', 'massa corrida', 150.00, 'massa corrida'),
('5654', 'Cola', 5.95, 'Cola');

--
-- Triggers `produto`
--
DELIMITER $$
CREATE TRIGGER `trg_produtoCriado` AFTER INSERT ON `produto` FOR EACH ROW begin
insert into estoque values(new.id_produto,0);
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf` (`cpf`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Constraints for table `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
