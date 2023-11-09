-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2023 às 13:22
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
-- Banco de dados: `littlehost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cod` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod`, `nome`, `email`, `senha`) VALUES
(1, 'hostinho', 'adm@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anfitriao`
--

CREATE TABLE `anfitriao` (
  `cod` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` bigint(13) UNSIGNED NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `num_casa` varchar(20) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cep` bigint(8) UNSIGNED NOT NULL,
  `cpf` bigint(11) UNSIGNED NOT NULL,
  `genero` enum('Feminino','Masculino','Outro') NOT NULL,
  `dt_nasc` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `imagem_perfil` varchar(50) NOT NULL,
  `valor_hora` double NOT NULL,
  `preferencias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anfitriao`
--

INSERT INTO `anfitriao` (`cod`, `nome`, `telefone`, `endereco`, `cidade`, `bairro`, `num_casa`, `complemento`, `cep`, `cpf`, `genero`, `dt_nasc`, `email`, `senha`, `imagem_perfil`, `valor_hora`, `preferencias`) VALUES
(3, 'joao pedro', 123123, 'dawd', 'dawda', 'dawdaw', '1323', 'eae', 2132, 123123, 'Feminino', '2023-11-09', 'dawd@gasda', '123123', '', 23.23, 'nenhuma ainda.'),
(4, 'Ana', 11959955896, 'Rua Dois', 'São Paulo', 'Bairro Dois', '12', 'Casa 3', 8485201, 12312312357, 'Feminino', '1990-01-15', 'ana@gmail.com', 'senha123', '', 15.99, 'todas possiveis'),
(5, 'Pedro', 11959955897, 'Rua Três', 'São Paulo', 'Bairro Três', '24', 'Apartamento 2', 8485202, 12312312358, 'Masculino', '1985-05-20', 'pedro@gmail.com', 'senha456', 'img/anfitriao2.jpg', 12.49, ''),
(6, 'Mariana', 11959955898, 'Rua Quatro', 'São Paulo', 'Bairro Quatro', '36', 'Casa 7', 8485203, 12312312359, 'Feminino', '1988-10-10', 'mariana@gmail.com', 'senha789', 'img/anfitriao3.jpg', 16.75, ''),
(7, 'João', 11959955899, 'Rua Cinco', 'São Paulo', 'Bairro Cinco', '48', 'Apartamento 1', 8485204, 12312312360, 'Masculino', '1992-03-25', 'joao@gmail.com', 'senha321', 'img/anfitriao4.jpg', 14, ''),
(8, 'Isabela', 11959955900, 'Rua Seis', 'São Paulo', 'Bairro Seis', '50', 'Casa 2', 8485205, 12312312361, 'Feminino', '1995-08-05', 'isabela@gmail.com', 'senha654', 'img/anfitriao5.jpg', 17.25, ''),
(9, 'Luiz', 11959955901, 'Rua Sete', 'São Paulo', 'Bairro Sete', '72', 'Casa 8', 8485206, 12312312362, 'Masculino', '1980-12-12', 'luiz@gmail.com', 'senha987', 'img/anfitriao6.jpg', 18.5, ''),
(10, 'Camila', 11959955902, 'Rua Oito', 'São Paulo', 'Bairro Oito', '84', 'Apartamento 3', 8485207, 12312312363, 'Feminino', '1998-06-30', 'camila@gmail.com', 'senha135', 'img/anfitriao7.jpg', 13.75, ''),
(11, 'Rafael', 11959955903, 'Rua Nove', 'São Paulo', 'Bairro Nove', '96', 'Casa 4', 8485208, 12312312364, 'Masculino', '1987-02-17', 'rafael@gmail.com', 'senha789', 'img/anfitriao8.jpg', 19, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_animal`
--

CREATE TABLE `ficha_animal` (
  `cod_animal` int(10) UNSIGNED NOT NULL,
  `cod_tutor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `especie` enum('Gato','Cachorro') NOT NULL,
  `raca` varchar(100) NOT NULL,
  `sexo` enum('Fêmea','Macho') NOT NULL,
  `idade` int(10) UNSIGNED NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `tamanho` decimal(10,2) NOT NULL,
  `caracteristicas` varchar(255) NOT NULL,
  `comportamento` text NOT NULL,
  `historico_medico` text NOT NULL,
  `instrucoes_especiais` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ficha_animal`
--

INSERT INTO `ficha_animal` (`cod_animal`, `cod_tutor`, `nome`, `especie`, `raca`, `sexo`, `idade`, `peso`, `tamanho`, `caracteristicas`, `comportamento`, `historico_medico`, `instrucoes_especiais`, `img`) VALUES
(9, 10, 'Fonseca', 'Cachorro', 'Vira Lata', 'Macho', 14, '7.00', '1.00', 'ele é meio cego', 'carente', 'nenhum', 'dar afeto', ''),
(10, 11, 'Princesa', 'Cachorro', 'awd', 'Macho', 0, '0.00', '0.00', 'awd', 'adw', 'awd', 'awd', ''),
(11, 12, 'Demolidor', 'Cachorro', 'awd', 'Macho', 0, '0.00', '0.00', 'awd', 'daw', 'awd', 'daw', ''),
(13, 13, 'Thor', 'Gato', 'sphyxn', 'Macho', 15, '69.00', '1.79', 'lindo', 'espirra', 'dor de cabeca', 'auuuu', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedagem`
--

CREATE TABLE `hospedagem` (
  `cod` int(10) UNSIGNED NOT NULL,
  `cod_tutor` int(10) UNSIGNED NOT NULL,
  `cod_anfitriao` int(10) UNSIGNED NOT NULL,
  `data_hosp` datetime NOT NULL,
  `data_busca` datetime NOT NULL,
  `cod_animal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hospedagem`
--

INSERT INTO `hospedagem` (`cod`, `cod_tutor`, `cod_anfitriao`, `data_hosp`, `data_busca`, `cod_animal`) VALUES
(30, 10, 3, '2023-11-10 23:39:00', '2023-11-22 00:40:00', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutor`
--

CREATE TABLE `tutor` (
  `cod` int(10) UNSIGNED NOT NULL,
  `nome` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tutor`
--

INSERT INTO `tutor` (`cod`, `nome`, `email`, `senha`) VALUES
(10, 'juan ', 'juan@gmail.com', '123123'),
(11, 'Fernanda', 'Fernanda@gmail', '123123'),
(12, 'Benedito', 'Benedito@gmail.com', '123123'),
(13, 'Alfa', 'Alfredo@gmail.com', '123123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `anfitriao`
--
ALTER TABLE `anfitriao`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `ficha_animal`
--
ALTER TABLE `ficha_animal`
  ADD PRIMARY KEY (`cod_animal`),
  ADD KEY `animal_tutor` (`cod_tutor`);

--
-- Índices para tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_tutor` (`cod_tutor`),
  ADD KEY `cod_anf` (`cod_anfitriao`),
  ADD KEY `hosp_animal` (`cod_animal`);

--
-- Índices para tabela `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `anfitriao`
--
ALTER TABLE `anfitriao`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `ficha_animal`
--
ALTER TABLE `ficha_animal`
  MODIFY `cod_animal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tutor`
--
ALTER TABLE `tutor`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ficha_animal`
--
ALTER TABLE `ficha_animal`
  ADD CONSTRAINT `animal_tutor` FOREIGN KEY (`cod_tutor`) REFERENCES `tutor` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hospedagem`
--
ALTER TABLE `hospedagem`
  ADD CONSTRAINT `hosp_anfitriao` FOREIGN KEY (`cod_anfitriao`) REFERENCES `anfitriao` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hosp_animal` FOREIGN KEY (`cod_animal`) REFERENCES `ficha_animal` (`cod_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hosp_tutor` FOREIGN KEY (`cod_tutor`) REFERENCES `tutor` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;