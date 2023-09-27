-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2023 às 19:02
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aumoxarifado`
--
CREATE DATABASE IF NOT EXISTS `almoxarifado` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `almoxarifado`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `CNPJ`, `Nome`) VALUES
(1, '85398254921567', 'Auto center marcondes'),
(2, '65789435678098', 'Auto center'),
(3, '45789986544467', 'Auto center vg'),
(4, '89753337697080', 'Auto center jlj'),
(5, '23458776478899', 'Auto center ijoi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `TelContato` varchar(11) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `Nome`, `TelContato`, `CPF`) VALUES
(1, '15997539823', '86465715298', 'Olete Smith'),
(2, '15995386746', '84598534378', 'Carla Sanch'),
(3, '11984562387', '97651704568', 'Carlos Edua'),
(4, '11977560845', '92046738594', 'Bianca Pere'),
(5, '15994562435', '02956820574', 'Filipe Lope');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id_mov` int(11) NOT NULL,
  `Datas` date DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `QntdModificada` int(11) DEFAULT NULL,
  `Funcionario` varchar(50) DEFAULT NULL,
  `EntraSai` varchar(10) DEFAULT NULL,
  `Produto_id` int(11) DEFAULT NULL,
  `Usuario_id` int(11) DEFAULT NULL,
  `Funcionario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id_mov`, `Datas`, `Usuario`, `QntdModificada`, `Funcionario`, `EntraSai`, `Produto_id`, `Usuario_id`, `Funcionario_id`) VALUES
(1, '0000-00-00', 'Silvio0321', 2, 'Olete Smith', 'Entra', 1, 1, 4),
(2, '0000-00-00', 'Silvio0321', 4, 'Olete Smith', 'Entra', 2, 1, 4),
(3, '0000-00-00', 'Silvio0321', 9, 'Olete Smith', 'Entra', 3, 2, 2),
(4, '0000-00-00', 'Silvio0321', 1, 'Olete Smith', 'Entra', 4, 2, 2),
(5, '0000-00-00', 'Silvio0321', 10, 'Olete Smith', 'Entra', 5, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `Valor` varchar(50) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `Descricao` varchar(100) DEFAULT NULL,
  `Tipo` int(11) DEFAULT NULL,
  `Fornecedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `Quantidade`, `Valor`, `Modelo`, `Descricao`, `Tipo`, `Fornecedor_id`) VALUES
(1, 3, '8.00', 'Teste', 'Mascara', 1, 2),
(2, 2, '8.00', 'Teste', 'Oculas', 1, 2),
(3, 13, '8.00', 'Teste', 'Lixa', 2, 3),
(4, 6, '8.00', 'Teste', 'Lâmina', 2, 3),
(5, 9, '8.00', 'Teste', 'Mascara', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `Login` varchar(100) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Login`, `Senha`) VALUES
(1, 'Silvio0321', '8442579'),
(2, 'CarlaSanches', 'vdt65'),
(3, 'CarlosEdu87', '09smkx'),
(4, 'Bea019', '1234'),
(5, 'Filipinho1V9', 'istrcvsu'),
(6, 'admin', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `Fk_Produto_id` (`Produto_id`),
  ADD KEY `Fk_Usuario_id` (`Usuario_id`),
  ADD KEY `Fk_Funcionario_id` (`Funcionario_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `Fk_Fornecedor_id` (`Fornecedor_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `Fk_Funcionario_id` FOREIGN KEY (`Funcionario_id`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `Fk_Produto_id` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `Fk_Usuario_id` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `Fk_Fornecedor_id` FOREIGN KEY (`Fornecedor_id`) REFERENCES `fornecedor` (`id_fornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
