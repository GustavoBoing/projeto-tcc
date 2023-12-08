-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2023 às 03:06
-- Versão do servidor: 10.4.22-MariaDB
-- Versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `CNPJ`, `Nome`) VALUES
(1, '48488478787455', 'Auto center marcondes'),
(2, '65789435678097', 'Auto center'),
(3, '45789986544467', 'Auto center vg'),
(6, '48417514545145', 'ANFER'),
(7, '12222222222222', 'lapefer');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `TelContato` varchar(11) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `Nome`, `TelContato`, `CPF`) VALUES
(1, 'Olete Smith', '15997539821', '86465715298'),
(6, 'GIlberto', '15874968484', '762176216'),
(7, 'filipe', '15874965445', '12222222222'),
(8, 'Filipe Fogaça', '15447777878', '122222222'),
(9, 'Olete Smi', '12333333333', '11111111111');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id_mov` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `QntdModificada` int(11) DEFAULT NULL,
  `Produto_id` int(11) DEFAULT NULL,
  `Usuario_id` int(11) DEFAULT NULL,
  `Funcionario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id_mov`, `Data`, `QntdModificada`, `Produto_id`, `Usuario_id`, `Funcionario_id`) VALUES
(18, '2023-12-07 19:32:01', 10, 3, 38, 6),
(19, '2023-12-07 21:43:25', 10, 1, 38, 1),
(21, '2023-12-07 21:53:13', 2, 1, 38, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `Valor` decimal(6,2) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `Descricao` varchar(100) DEFAULT NULL,
  `Tipo` int(11) DEFAULT NULL,
  `Fornecedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `Quantidade`, `Valor`, `Modelo`, `Descricao`, `Tipo`, `Fornecedor_id`) VALUES
(1, 21373, '8.00', 'Teste', 'Mascaras', 1, 2),
(2, 22, '8.00', 'Teste', 'Oculas', 1, 2),
(3, 141, '8.00', 'Teste', 'Lixa', 2, 3),
(4, 6, '8.00', 'Teste', 'Lâmina', 2, 3),
(5, 9, '8.00', 'Teste', 'Mascara', 1, 2),
(6, 12, '0.00', 'lente transparente para solda', 'Lente', 1, NULL),
(7, 10, '5.00', 'disco', 'disco de corte 4\" 1/2', 2, NULL),
(8, 0, '2.00', 'lente transparente para solda', 'Lente2', 1, 2),
(11, 11, '10.00', 'ferro', 'durepox', 1, NULL),
(12, 50, '12.00', 'disco', 'disco flap 4\" 1/2', 2, NULL),
(13, 10, '150.00', 'disco', 'disco corte 7\"', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `Login` varchar(100) DEFAULT NULL,
  `Senha` varchar(80) DEFAULT NULL,
  `isAdmin` varchar(20) DEFAULT NULL,
  `palavraPasse` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Login`, `Senha`, `isAdmin`, `palavraPasse`) VALUES
(35, 'GustavoBoing', '$2y$10$E20Qst9oZzlptqXDIrpX7e6fIRho1jV5oTiQqpjgllwq39rlOWEQq', 'Não', '$2y$10$aqkNJQLoMjz0bG1Kcu1LpexcZYL3A1s2d8Z.QZs1TA8i72GDp3bzm'),
(36, 'vinicius', '$2y$10$yUenMtJf21G87q6CAix.POpism9oK83FkugULK2/si1wAHUiu6Mue', 'Não', '$2y$10$fPTDF0p4MZL9M92YVPIS5ebtFO1HBaAkJ1/WAXWBO4kGWHwoiq/IS'),
(37, 'MoniqueBoing', '$2y$10$LIoAhtVY1USC1r2a56uFgOh3NUKpcrWKc4QXVvFzCdgwhbDlhJU4m', 'Sim', '$2y$10$/UaAxmW28Vcnoa6RedqObuuJXGwcOxQ35HW2R/VafOoPqMds87Ze6'),
(38, 'admin', '$2y$10$ikpEGju78roNeaHWkLdfgu8oYX6z5viHLlh/OJnBob5RL0p2dy3GG', 'Sim', '$2y$10$INeGAzJrRXr9uuMyYt.5ueHLKaRGqhyjgB/bBHdgRtebTE9VP5ko.'),
(39, 'luas', '$2y$10$Yz.M3ueUjKM0akpbsX4MNOgXgEdAxuzvkSM0eijwLNXZaAKm1K422', 'Não', '$2y$10$JK7kF8NgwaACbswH/5XaF.4UtoCkj5NB8sRX01jlmFdwBslf5UGK.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `Fk_Produto_id` (`Produto_id`),
  ADD KEY `Fk_Usuario_id` (`Usuario_id`),
  ADD KEY `Fk_Funcionario_id` (`Funcionario_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `Fk_Fornecedor_id` (`Fornecedor_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `Fk_Funcionario_id` FOREIGN KEY (`Funcionario_id`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `Fk_Produto_id` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `Fk_Usuario_id` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `Fk_Fornecedor_id` FOREIGN KEY (`Fornecedor_id`) REFERENCES `fornecedor` (`id_fornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
