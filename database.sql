-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2023 às 16:08
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
(8, '12222223333333', 'ANFER'),
(9, '44447777777788', 'Lapefer');

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
(10, 'José Ricardo', '15999999998', '22222222222'),
(11, 'Gilberto', '15988754454', '44777775555'),
(12, 'Gustavo Boing', '15965574522', '44477777555'),
(13, 'Vinicius', '15988888877', '55555454444'),
(14, 'Ediclei', '15988548484', '78878484545'),
(15, 'Fernando', '15965665848', '28488454848');

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
(24, '2023-12-08 11:39:06', -10, 33, 38, NULL),
(25, '2023-12-08 11:47:14', -5, 27, 38, 12),
(26, '2023-12-08 11:47:35', 10, 15, 38, NULL),
(27, '2023-12-08 11:48:24', 10, 23, 38, NULL),
(28, '2023-12-08 11:48:34', 5, 24, 38, 10),
(29, '2023-12-08 11:48:43', 15, 25, 38, NULL),
(30, '2023-12-08 11:48:50', 10, 21, 38, NULL),
(31, '2023-12-08 11:48:58', 10, 22, 38, NULL),
(32, '2023-12-08 11:50:30', -10, 27, 38, 14);

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
(15, 12, '50.00', 'mascara', 'mascara de solda', 1, NULL),
(16, 150, '3.00', 'lente', 'lente transp.', 1, NULL),
(17, 200, '2.00', 'mascara', 'mascara resp.', 1, NULL),
(18, 50, '6.00', 'Óculos', 'Óculos', 1, NULL),
(19, 15, '8.00', 'Óculos', 'Óculos Escuro', 1, NULL),
(20, 10, '20.00', 'Capacete', 'Capacete', 1, NULL),
(21, 12, '26.00', 'Bota', 'Bota nº 39', 1, NULL),
(22, 12, '26.00', 'Bota', 'Bota nº 40 ', 1, NULL),
(23, 13, '27.00', 'Bota', 'Bota Nº 41', 1, NULL),
(24, 8, '27.00', 'Bota', 'Bota Nº 42', 1, NULL),
(25, 17, '27.00', 'Bota', 'Bota Nº 43', 1, NULL),
(27, 135, '5.40', 'disco', 'disco de corte 4&#34; 1/2', 2, NULL),
(28, 50, '10.42', 'disco', 'Disco de Corte 7&#34;', 2, NULL),
(29, 150, '5.00', 'disco', 'Disco Flap 4&#34; 1/2', 2, NULL),
(30, 80, '5.00', 'disco', 'Disco Desbaste 4&#34; 1/2', 2, NULL),
(31, 40, '10.00', 'disco', 'Disco Flap 7&#34;', 2, NULL),
(32, 40, '10.00', 'disco', 'Disco Desbaste 7&#34;', 2, NULL),
(33, 90, '2.00', 'lixa', 'Lixa', 2, NULL),
(34, 20, '20.00', 'Eletrodo', 'Eletrodo', 2, NULL),
(35, 10, '150.00', 'arame', 'Arame de solda', 2, NULL),
(36, 20, '15.00', 'Trena', 'Trena', 2, NULL),
(37, 10, '200.00', 'Arame', 'Arame Cobreado', 2, NULL),
(39, 10, '14.00', 'bico', 'bico de corte', 2, 8);

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
(38, 'admin', '$2y$10$ikpEGju78roNeaHWkLdfgu8oYX6z5viHLlh/OJnBob5RL0p2dy3GG', 'Sim', '$2y$10$INeGAzJrRXr9uuMyYt.5ueHLKaRGqhyjgB/bBHdgRtebTE9VP5ko.'),
(40, 'GustavoBoing', '$2y$10$1.aMWiDgNF50IHIQYGcvPeFDjqoRJLwZLpJvZHu1.p1JMmFQoaOuO', 'Não', '$2y$10$FmRKs4SuoZbIYPEjlWpxp.MMafEDHCfN60wuNDaZFze6EKbkZGC86'),
(41, 'Josiane', '$2y$10$Moi3FP0jXgkVYdjmZhmpKexvalrbyCxqB/KlphMDg1GDD1CHp6Sb2', 'Não', '$2y$10$cO2eodKKFQYASpksE0Uy0uKQBwkRZyD5txkc4ygKZQXDA3YPR6T.q'),
(42, 'Vinicius', '$2y$10$Fc18if2.FSWzJXlAYafPD.fVQoFDbAaaiblc0gR/QxLBRUjlOkdPC', 'Sim', '$2y$10$qQrfs5DVT0uGcJMEGaUj4uqcYyd1vrYwp0bE5b9Kys3rjfhvFo942'),
(43, 'Monique', '$2y$10$4BOPJYTOOweJlj9u4wkEQuIkaF63RqdpFUg9oWo8pVSKQj3EbUltK', 'Sim', '$2y$10$Ea5houLnHKG2svGGy6pfnOo62WQnoyl1KWcJCBWBWwgtsmdTPSQta'),
(44, 'Jose', '$2y$10$sNTi2C1EiQtmEa2V1TltCu/wqeeH3ffhJSs.vYSD7.CDDvMFWD7I6', 'Não', '$2y$10$Wt2zWTgqh35vNGv29i3ZC.5fA.T5Ke/XQ0uDLdDUSq6cEsA02crIm');

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
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
