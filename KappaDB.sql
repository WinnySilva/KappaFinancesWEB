-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09-Jun-2016 às 16:55
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KappaDB`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Admin`
--

CREATE TABLE `Admin` (
  `usuario_cpf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `CategoriaDespesa`
--

CREATE TABLE `CategoriaDespesa` (
  `idCategoriaDespesa` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CategoriaDespesa`
--

INSERT INTO `CategoriaDespesa` (`idCategoriaDespesa`, `nome`) VALUES
(1, 'Vestuario'),
(2, 'Energia'),
(3, 'Agua'),
(4, 'Internet'),
(5, 'Aluguel'),
(6, 'Remedios'),
(7, 'Lazer'),
(8, 'Educacao'),
(9, 'Alimentos'),
(10, 'Produtos_Domesticos'),
(11, 'Transporte'),
(12, 'Combustivel'),
(13, 'Bens_Duraveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CategoriaReceita`
--

CREATE TABLE `CategoriaReceita` (
  `idCategoriaReceita` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CategoriaReceita`
--

INSERT INTO `CategoriaReceita` (`idCategoriaReceita`, `nome`) VALUES
(1, 'Salario'),
(2, 'Renda_Alternativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cidade`
--

CREATE TABLE `Cidade` (
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Cidade`
--

INSERT INTO `Cidade` (`id_cidade`, `nome`, `idEstado`) VALUES
(1, 'Pelotas', 21),
(2, 'Rio Grande', 21),
(3, 'Arroio Grande', 21),
(4, 'Pedro Osorio', 21),
(5, 'Porto Alegre', 21),
(6, 'Chui', 21),
(7, 'Morro Redondo', 21),
(8, 'Capao do Leao', 21),
(9, 'Uruguaiana', 21),
(10, 'Sao Paulo', 25),
(11, 'Rio de Janeiro', 19),
(12, 'Osasco', 25),
(13, 'Gramado', 21),
(14, 'Itu', 25),
(15, 'Florianopolis', 24),
(16, 'Curitiba', 16),
(17, 'Lajeado', 21),
(18, 'Cascavel', 16),
(19, 'Brasilia', 7),
(20, 'Santa Maria', 1),
(21, 'Cangucu', 1),
(22, 'Rio Branco', 1);


-- --------------------------------------------------------

--
-- Estrutura da tabela `Despesa`
--

CREATE TABLE `Despesa` (
  `valor` double DEFAULT NULL,
  `data` date DEFAULT NULL,
  `idDespesa` int(11) NOT NULL,
  `idCategoriaDespesa` int(11) NOT NULL,
  `usuario_cpf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `Estado`
--

CREATE TABLE `Estado` (
  `idestado` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Estado`
--

INSERT INTO `Estado` (`idestado`, `nome`, `idPais`) VALUES
(1, 'AC', 1),
(2, 'AL', 1),
(3, 'AP', 1),
(4, 'AM', 1),
(5, 'BA', 1),
(6, 'CE', 1),
(7, 'DF', 1),
(8, 'ES', 1),
(9, 'GO', 1),
(10, 'MA', 1),
(11, 'MT', 1),
(12, 'MS', 1),
(13, 'MG', 1),
(14, 'PA', 1),
(15, 'PB', 1),
(16, 'PR', 1),
(17, 'PE', 1),
(18, 'PI', 1),
(19, 'RJ', 1),			
(20, 'RN', 1),
(21, 'RS', 1),
(22, 'RO', 1),
(23, 'RR', 1),
(24, 'SC', 1),
(25, 'SP', 1),
(26, 'SE', 1),
(27, 'TO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pais`
--

CREATE TABLE `Pais` (
  `idPais` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Pais`
--

INSERT INTO `Pais` (`idPais`, `nome`) VALUES
(1, 'Brasil'),
(2, 'Argentina'),
(3, 'Uruguai'),
(4, 'Belize'),
(5, 'Uganda'),
(6, 'EUA'),
(7, 'Congo'),
(8, 'Espanha'),
(9, 'Chile'),
(10, 'Bolivia'),
(11, 'Chipre'),
(12, 'Canada'),
(13, 'Paraguai'),
(14, 'Venezuela'),
(15, 'Japao');


-- --------------------------------------------------------

--
-- Estrutura da tabela `Receita`
--

CREATE TABLE `Receita` (
  `valor` double DEFAULT NULL,
  `data` date DEFAULT NULL,
  `idReceita` int(11) NOT NULL,
  `idCategoriaReceita` int(11) NOT NULL,
  `usuario_cpf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Receita`
--

INSERT INTO `Receita` (`valor`, `data`, `idReceita`, `idCategoriaReceita`, `usuario_cpf`) VALUES
(1230.8, '2016-06-07', 1, 1, 2491785080);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `cpf` bigint(20) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ultimo_envio` datetime DEFAULT NULL,
  `idcidade` int(11) NOT NULL,
  `sexo` enum('F','M') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Usuario`
--

INSERT INTO `Usuario` (`cpf`, `nome`, `data_nasc`, `senha`, `ultimo_envio`, `idcidade`, `sexo`) VALUES
(2491785080, 'Simao Martin', '1992-12-12', 'kiko', '2016-06-15 00:00:00', 1, 'M'),
(12345678901, 'Teste da Silva', '2003-09-06', 'teste', '2016-06-15 00:00:00', 2, 'F');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`usuario_cpf`);

--
-- Indexes for table `CategoriaDespesa`
--
ALTER TABLE `CategoriaDespesa`
  ADD PRIMARY KEY (`idCategoriaDespesa`);

--
-- Indexes for table `CategoriaReceita`
--
ALTER TABLE `CategoriaReceita`
  ADD PRIMARY KEY (`idCategoriaReceita`);

--
-- Indexes for table `Cidade`
--
ALTER TABLE `Cidade`
  ADD PRIMARY KEY (`id_cidade`),
  ADD KEY `fk_Cidade_Estado_idx` (`idEstado`);

--
-- Indexes for table `Despesa`
--
ALTER TABLE `Despesa`
  ADD PRIMARY KEY (`idDespesa`,`usuario_cpf`),
  ADD KEY `fk_Despesa_CategoriaDespesa1_idx` (`idCategoriaDespesa`),
  ADD KEY `fk_Despesa_Usuario1_idx` (`usuario_cpf`);

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`idestado`),
  ADD KEY `fk_Estado_Pais1_idx` (`idPais`);

--
-- Indexes for table `Pais`
--
ALTER TABLE `Pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indexes for table `Receita`
--
ALTER TABLE `Receita`
  ADD PRIMARY KEY (`idReceita`,`usuario_cpf`),
  ADD KEY `fk_Receita_CategoriaReceita1_idx` (`idCategoriaReceita`),
  ADD KEY `fk_Receita_Usuario1_idx` (`usuario_cpf`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_Usuario_Cidade1_idx` (`idcidade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CategoriaDespesa`
--
ALTER TABLE `CategoriaDespesa`
  MODIFY `idCategoriaDespesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `CategoriaReceita`
--
ALTER TABLE `CategoriaReceita`
  MODIFY `idCategoriaReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Cidade`
--
ALTER TABLE `Cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Estado`
--
ALTER TABLE `Estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Pais`
--
ALTER TABLE `Pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `fk_Admin_Usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `Usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Cidade`
--
ALTER TABLE `Cidade`
  ADD CONSTRAINT `fk_Cidade_Estado` FOREIGN KEY (`idEstado`) REFERENCES `Estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Despesa`
--
ALTER TABLE `Despesa`
  ADD CONSTRAINT `fk_Despesa_CategoriaDespesa1` FOREIGN KEY (`idCategoriaDespesa`) REFERENCES `CategoriaDespesa` (`idCategoriaDespesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Despesa_Usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `Usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Estado`
--
ALTER TABLE `Estado`
  ADD CONSTRAINT `fk_Estado_Pais1` FOREIGN KEY (`idPais`) REFERENCES `Pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Receita`
--
ALTER TABLE `Receita`
  ADD CONSTRAINT `fk_Receita_CategoriaReceita1` FOREIGN KEY (`idCategoriaReceita`) REFERENCES `CategoriaReceita` (`idCategoriaReceita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Receita_Usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `Usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Cidade1` FOREIGN KEY (`idcidade`) REFERENCES `Cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
