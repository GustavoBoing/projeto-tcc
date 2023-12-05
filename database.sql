-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 01:44
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `CNPJ`, `Nome`) VALUES
(1, '85398254921567', 'Auto center marcondes'),
(2, '65789435678098', 'Auto center'),
(3, '45789986544467', 'Auto center vg'),
(4, '89753337697080', 'Auto center jlj'),
(5, '23458776478899', 'Auto center ijoi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `TelContato` varchar(11) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `Nome`, `TelContato`, `CPF`) VALUES
(1, 'Olete Smith\r\n', '15997539823', '86465715298');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id_mov`, `Data`, `QntdModificada`, `Produto_id`, `Usuario_id`, `Funcionario_id`) VALUES
(1, '2023-11-28 00:00:00', 2, 1, 1, NULL),
(2, '2023-11-28 00:00:00', 4, 2, 1, NULL),
(3, '2023-11-28 00:00:00', 9, 3, 2, NULL),
(4, '2023-11-28 00:00:00', 1, 4, 2, NULL),
(5, '2023-11-28 00:00:00', 10, 5, 3, NULL),
(6, '2023-11-28 15:38:04', 3, 1, 1, NULL),
(7, '2023-11-28 15:42:50', -1, 1, 1, 1),
(8, '2023-12-04 21:02:31', 12, 1, NULL, NULL),
(9, '2023-12-04 21:05:36', -10, 3, NULL, NULL),
(10, '2023-12-04 21:05:54', -10, 3, NULL, NULL),
(11, '2023-12-04 21:13:08', 10, 3, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `Quantidade`, `Valor`, `Modelo`, `Descricao`, `Tipo`, `Fornecedor_id`) VALUES
(1, 21361, 8.00, 'Teste', 'Mascara', 1, 2),
(2, 12, 8.00, 'Teste', 'Oculas', 1, 2),
(3, 131, 8.00, 'Teste', 'Lixa', 2, 3),
(4, 6, 8.00, 'Teste', 'Lâmina', 2, 3),
(5, 9, 8.00, 'Teste', 'Mascara', 1, 2),
(6, NULL, 12.00, 'lente transparente para solda', 'Lente', 1, NULL),
(7, NULL, 5.00, 'disco', 'disco de corte 4\" 1/2', 2, NULL),
(8, NULL, 2.00, 'lente transparente para solda', 'Lente2', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `Login` varchar(100) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `isAdmin` varchar(20) DEFAULT NULL,
  `palavraPasse` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Login`, `Senha`, `isAdmin`, `palavraPasse`) VALUES
(1, 'Silvio0321', '8442579', 'Não', NULL),
(2, 'CarlaSanches', 'vdt65', 'Não', NULL),
(3, 'CarlosEdu87', '09smkx', 'Não', NULL),
(4, 'Bea019', '1234', 'Não', NULL),
(5, 'Filipinho1V9', 'istrcvsu', 'Não', NULL),
(6, 'admin', 'admin123', 'Sim', 'admin'),
(10, 'gustavo boing', '2803', 'Não', '2803');

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
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
