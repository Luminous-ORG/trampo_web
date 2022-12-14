-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Ago-2022 às 19:46
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtrampo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcontatoempresa`
--

CREATE TABLE `tbcontatoempresa` (
  `idContatoEmpresa` int(11) NOT NULL,
  `numeroTelefoneContatoEmpresa` varchar(10) NOT NULL,
  `numeroCelularContatoEmpresa` varchar(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcontatousuario`
--

CREATE TABLE `tbcontatousuario` (
  `idContatoUsuario` int(11) NOT NULL,
  `numeroTelefoneContatoUsuario` varchar(10) NOT NULL,
  `numeroCelularContatoUsuario` varchar(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurriculo`
--

CREATE TABLE `tbcurriculo` (
  `idCurriculo` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `profissao` varchar(250) DEFAULT NULL,
  `perfilPessoal` text DEFAULT NULL,
  `habilidades` text DEFAULT NULL,
  `contato` text DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `formacao` text DEFAULT NULL,
  `dataCurriculo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(250) DEFAULT NULL,
  `emailEmpresa` varchar(250) DEFAULT NULL,
  `senhaEmpresa` varchar(250) DEFAULT NULL,
  `cnpjEmpresa` bigint(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbenderecoempresa`
--

CREATE TABLE `tbenderecoempresa` (
  `idEnderecoEmpresa` int(11) NOT NULL,
  `logradouroEnderecoEmpresa` varchar(255) NOT NULL,
  `numeroEnderecoEmpresa` varchar(255) NOT NULL,
  `complementoEnderecoEmpresa` varchar(255) NOT NULL,
  `cepEnderecoEmpresa` varchar(8) NOT NULL,
  `estadoEnderecoEmpresa` varchar(255) NOT NULL,
  `bairroEnderecoEmpresa` varchar(255) NOT NULL,
  `cidadeEnderecoEmpresa` varchar(255) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbenderecousuario`
--

CREATE TABLE `tbenderecousuario` (
  `idEnderecoUsuario` int(11) NOT NULL,
  `logradouroEnderecoUsuario` varchar(255) NOT NULL,
  `numeroEnderecoUsuario` varchar(255) NOT NULL,
  `complementoEnderecoUsuario` varchar(255) NOT NULL,
  `cepEnderecoUsuario` varchar(255) NOT NULL,
  `bairroEnderecoUsuario` varchar(255) NOT NULL,
  `cidadeEnderecoUsuario` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagemperfilempresa`
--

CREATE TABLE `tbimagemperfilempresa` (
  `idImagemPerfilEmpresa` int(11) NOT NULL,
  `nomeImagemPerfilEmpresa` varchar(255) NOT NULL,
  `caminhoImagemPerfilEmpresa` varchar(255) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagemperfilusuario`
--

CREATE TABLE `tbimagemperfilusuario` (
  `idImagemPerfilUsuario` int(11) NOT NULL,
  `nomeImagemPerfilUsuario` varchar(255) NOT NULL,
  `caminhoImagemPerfilUsuario` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

CREATE TABLE `tbmensagem` (
  `idMensagem` int(11) NOT NULL,
  `textoMensagem` text DEFAULT NULL,
  `dataMensagem` date DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(250) DEFAULT NULL,
  `emailUsuario` varchar(250) DEFAULT NULL,
  `senhaUsuario` varchar(250) DEFAULT NULL,
  `cpfUsuario` int(11) DEFAULT NULL,
  `dataNascimentoUsuario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvaga`
--

CREATE TABLE `tbvaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(250) DEFAULT NULL,
  `descricaoVaga` text DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `dataVaga` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcontatoempresa`
--
ALTER TABLE `tbcontatoempresa`
  ADD PRIMARY KEY (`idContatoEmpresa`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbcontatousuario`
--
ALTER TABLE `tbcontatousuario`
  ADD PRIMARY KEY (`idContatoUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD PRIMARY KEY (`idCurriculo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tbenderecoempresa`
--
ALTER TABLE `tbenderecoempresa`
  ADD PRIMARY KEY (`idEnderecoEmpresa`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbenderecousuario`
--
ALTER TABLE `tbenderecousuario`
  ADD PRIMARY KEY (`idEnderecoUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbimagemperfilempresa`
--
ALTER TABLE `tbimagemperfilempresa`
  ADD PRIMARY KEY (`idImagemPerfilEmpresa`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbimagemperfilusuario`
--
ALTER TABLE `tbimagemperfilusuario`
  ADD PRIMARY KEY (`idImagemPerfilUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcontatoempresa`
--
ALTER TABLE `tbcontatoempresa`
  MODIFY `idContatoEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcontatousuario`
--
ALTER TABLE `tbcontatousuario`
  MODIFY `idContatoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  MODIFY `idCurriculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbenderecoempresa`
--
ALTER TABLE `tbenderecoempresa`
  MODIFY `idEnderecoEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbenderecousuario`
--
ALTER TABLE `tbenderecousuario`
  MODIFY `idEnderecoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemperfilempresa`
--
ALTER TABLE `tbimagemperfilempresa`
  MODIFY `idImagemPerfilEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemperfilusuario`
--
ALTER TABLE `tbimagemperfilusuario`
  MODIFY `idImagemPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcontatoempresa`
--
ALTER TABLE `tbcontatoempresa`
  ADD CONSTRAINT `tbcontatoempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbcontatousuario`
--
ALTER TABLE `tbcontatousuario`
  ADD CONSTRAINT `tbcontatousuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD CONSTRAINT `tbcurriculo_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbenderecoempresa`
--
ALTER TABLE `tbenderecoempresa`
  ADD CONSTRAINT `tbenderecoempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbenderecousuario`
--
ALTER TABLE `tbenderecousuario`
  ADD CONSTRAINT `tbenderecousuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbimagemperfilempresa`
--
ALTER TABLE `tbimagemperfilempresa`
  ADD CONSTRAINT `tbimagemperfilempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbimagemperfilempresa_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbimagemperfilusuario`
--
ALTER TABLE `tbimagemperfilusuario`
  ADD CONSTRAINT `tbimagemperfilusuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD CONSTRAINT `tbmensagem_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbmensagem_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD CONSTRAINT `tbvaga_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
