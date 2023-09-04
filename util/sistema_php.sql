--
-- Banco de dados: `teste_aula`
--
CREATE DATABASE IF NOT EXISTS `sistema_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_php`;
--
-- Estrutura para tabela `produtos`
--
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) NOT NULL,
  `descricao` text DEFAULT NULL,
  `origem` char(1) NOT NULL,
  `validade` date DEFAULT NULL,
  `estoque_minimo` decimal(12,4) DEFAULT NULL,
  `estoque_atual` decimal(12,4) DEFAULT NULL,
  `valor_unitario` decimal(12,2) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `excluido_em` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;