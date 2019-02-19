-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 05:50 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_profissional`
--

CREATE TABLE `categoria_profissional` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria_profissional`
--

INSERT INTO `categoria_profissional` (`id_categoria`, `descricao_categoria`) VALUES
(5, 'Mecanico');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `nif_empresa` varchar(100) NOT NULL,
  `morada_empresa` varchar(100) NOT NULL,
  `contacto_empresa` varchar(100) NOT NULL,
  `email_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `func_nome` varchar(100) NOT NULL,
  `func_bi` varchar(100) NOT NULL,
  `func_nif` varchar(100) NOT NULL,
  `func_niss` varchar(100) NOT NULL,
  `func_nib` varchar(100) NOT NULL,
  `func_datan` varchar(100) NOT NULL,
  `func_salario` double NOT NULL,
  `func_tipodepart` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `func_nome`, `func_bi`, `func_nif`, `func_niss`, `func_nib`, `func_datan`, `func_salario`, `func_tipodepart`, `id_categoria`) VALUES
(2, 'Miguel Martins', '7897464', '79453134', '1202154510', '523453245', '2018-07-17', 1100.5, 2, 5),
(4, 'Minima totam velit ipsa consectetur aliquam dolorem est laborum', 'Doloribus earum a debitis tenetur pariatur Beatae mollitia tempora quae', 'Minima ut et officiis culpa illo reiciendis omnis dolore vel aliquam illo', 'Corporis explicabo Aut nostrum quos voluptas nihil quisquam quia', 'Aut voluptatem cillum sit id', '1994-05-15', 4512, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `id_irs` int(11) NOT NULL,
  `escalao` double NOT NULL,
  `funcionario_desconto` double NOT NULL,
  `empresa_desconto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`id_irs`, `escalao`, `funcionario_desconto`, `empresa_desconto`) VALUES
(10, 550, 8, 8),
(11, 999, 9, 9),
(12, 1499, 10, 10),
(13, 10000000, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `tipo`, `id_funcionario`) VALUES
(2, 'miguel', '123', 0, 2),
(3, 'admin', '123', 1, 0),
(4, 'vilares', '123', 0, 3),
(5, 'leracej', 'Pa$$w0rd!', 0, 4),
(6, 'girasu', 'Pa$$w0rd!', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` int(11) NOT NULL,
  `msg` varchar(400) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `data_mensagem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `estado` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `nome`, `assunto`, `msg`, `data`, `estado`, `id_funcionario`) VALUES
(1, 'Administrador', 'Alteração de NIB', 'Poderia alterar o meu nib', '2018-08-13', 1, 1),
(2, 'Administrador', 'Alterção de Morada', 'Poderia alterar a minha morada', '2018-08-22', 0, 1),
(3, 'Administrador', 'Alterção de Nome', 'Poderia alterar o meu nome', '2018-08-22', 1, 2),
(10, 'Joao Mirante', 'gdfgfd', 'werwerxfvg\r\n\r\n                                                       ', '2018-08-22', 1, 0),
(11, 'Administrador', 'asdfsg', 'sfsdf\r\nsdagsdgfs\r\n                                                       ', '2018-08-22', 0, 1),
(12, 'Joao Mirante', 'zxc', 'zxc\r\n\r\n                                                       ', '2018-08-22', 1, 0),
(13, 'Joao Vilares', 'COMO QUE E', 'qwrwqefsdf\r\n\r\n                                                       ', '2018-08-23', 1, 0),
(14, 'Administrador', '123', '123\r\n\r\n                                                       ', '2018-09-19', 1, 2),
(15, 'Miguel Martins', 'NIB', 'Quero mudar o meu nib 45894894949\r\n\r\n                                                       ', '2018-09-19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `nib_funcionario` varchar(50) NOT NULL,
  `nif_funcionario` varchar(50) NOT NULL,
  `niss_funcionario` varchar(50) NOT NULL,
  `salario_base` double NOT NULL,
  `turno_mensal` double NOT NULL,
  `desconto_ss` double NOT NULL,
  `desconto_irc` double NOT NULL,
  `valor_liquido` double NOT NULL,
  `valor_bruto` double NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `subsidio_turno` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recibos`
--

INSERT INTO `recibos` (`id_recibo`, `ano`, `mes`, `nome_funcionario`, `nib_funcionario`, `nif_funcionario`, `niss_funcionario`, `salario_base`, `turno_mensal`, `desconto_ss`, `desconto_irc`, `valor_liquido`, `valor_bruto`, `id_funcionario`, `subsidio_turno`) VALUES
(4, 2018, 9, 'Joao Vilares', '123', '123', '123', 500, 1, 55.55, 40.4, 409.05, 505, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ss`
--

CREATE TABLE `ss` (
  `id_ss` int(11) NOT NULL,
  `escalao` double NOT NULL,
  `funcionario_desconto` double NOT NULL,
  `empresa_desconto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ss`
--

INSERT INTO `ss` (`id_ss`, `escalao`, `funcionario_desconto`, `empresa_desconto`) VALUES
(12, 550, 11, 11),
(13, 1099, 11, 12),
(14, 1000000, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `descricao_turno` varchar(100) NOT NULL,
  `valor_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_profissional`
--
ALTER TABLE `categoria_profissional`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id_irs`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Indexes for table `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`id_ss`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_profissional`
--
ALTER TABLE `categoria_profissional`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `irs`
--
ALTER TABLE `irs`
  MODIFY `id_irs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ss`
--
ALTER TABLE `ss`
  MODIFY `id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
