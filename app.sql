-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2022 às 08:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_address` varchar(180) NOT NULL,
  `client_phone` varchar(14) NOT NULL,
  `client_cpf` varchar(11) NOT NULL,
  `client_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fleet`
--

CREATE TABLE `fleet` (
  `id_fleet` int(11) NOT NULL,
  `fleet_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fleet_address` varchar(180) CHARACTER SET latin1 NOT NULL,
  `fleet_active` int(11) NOT NULL,
  `fleet_phone` varchar(14) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logistic_order`
--

CREATE TABLE `logistic_order` (
  `logistic_order_id` int(11) NOT NULL,
  `logistic_order_client` int(11) NOT NULL,
  `logistic_order_number` int(11) NOT NULL,
  `logistic_order_origin_address` varchar(180) CHARACTER SET latin1 NOT NULL,
  `logistic_order_destiny_address` varchar(180) CHARACTER SET latin1 NOT NULL,
  `logistic_order_fleet` int(11) NOT NULL,
  `logistic_order_createdTime` datetime NOT NULL DEFAULT current_timestamp(),
  `logistic_client_name` varchar(100) NOT NULL,
  `logistic_fleet_name` varchar(100) NOT NULL,
  `logistic_order_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logistic_order`
--

INSERT INTO `logistic_order` (`logistic_order_id`, `logistic_order_client`, `logistic_order_number`, `logistic_order_origin_address`, `logistic_order_destiny_address`, `logistic_order_fleet`, `logistic_order_createdTime`, `logistic_client_name`, `logistic_fleet_name`, `logistic_order_status`) VALUES
(3, 15, 2510, 'cavalhada', 'hipica', 13, '2022-09-06 19:11:43', 'fulano', 'Carlos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `user_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_email`, `user_password`, `user_active`) VALUES
(9, 'Carlos', 'cadudps@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(10, 'Carlos', 'cadudps@gmail.com', '821a588f4faec997530027ee0b713484', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Índices para tabela `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`id_fleet`);

--
-- Índices para tabela `logistic_order`
--
ALTER TABLE `logistic_order`
  ADD PRIMARY KEY (`logistic_order_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id_fleet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `logistic_order`
--
ALTER TABLE `logistic_order`
  MODIFY `logistic_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
