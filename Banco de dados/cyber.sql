-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/12/2023 às 09:45
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cyber065_cyber`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acompanhamento`
--

CREATE TABLE `acompanhamento` (
  `id_acompanhamento` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `acompanhamento`
--

INSERT INTO `acompanhamento` (`id_acompanhamento`, `nome`, `preco`, `status`, `img`) VALUES
(1, 'Nuggets', 20.00, 'ATIVO', 'imgbd/acompanhamento/nuggets.png'),
(2, 'Batata Frita com Cheddar e Bacon', 15.00, 'ATIVO', 'imgbd/acompanhamento/BatataFritacomCheddar.png'),
(3, 'Batata Frita', 10.00, 'ATIVO', 'imgbd/acompanhamento/Batata Frita.png'),
(4, 'Onion Rings', 10.00, 'ATIVO', 'imgbd/acompanhamento/Onion Rings.png'),
(5, 'Nachos com Guacamole', 20.00, 'ATIVO', 'imgbd/acompanhamento/Nachos com Guacamole.png'),
(404, 'CANCELADO', 0.00, 'ATIVO', 'imgbd/acompanhamento/.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bebida`
--

CREATE TABLE `bebida` (
  `id_bebida` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `bebida`
--

INSERT INTO `bebida` (`id_bebida`, `nome`, `preco`, `status`, `img`) VALUES
(1, 'Agua Natural', 2.00, 'ATIVO', 'imgbd/beb/Agua Natural.png'),
(2, 'Agua com Gãs', 2.00, 'ATIVO', 'imgbd/beb/Agua com Gãs.png'),
(3, 'Refrigerante Lata', 5.00, 'ATIVO', 'imgbd/beb/Refrigerante Lata.png'),
(4, 'Refrigerante Garrafa de Vidro', 5.00, 'ATIVO', 'imgbd/beb/Refrigerante Garrafa de Vidro.png'),
(5, 'Suco Natural de Laranja', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Laranja.png'),
(6, 'Suco Natural de Morango', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Morango.png'),
(7, 'Suco Natural de Uva', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Uva.png'),
(8, 'Suco Natural de Limão', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Limão.png'),
(9, 'Suco Natural de Maracuja', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Maracuja.png'),
(10, 'Suco Natural de Goiaba', 7.00, 'ATIVO', 'imgbd/beb/Suco Natural de Goiaba.png'),
(11, 'MilkShake Morango', 10.00, 'ATIVO', 'imgbd/beb/MilkShake Morango.png'),
(12, 'MilkShake Chocolate', 10.00, 'ATIVO', 'imgbd/beb/MilkShake Chocolate.png'),
(13, 'MilkShake Caramelo', 10.00, 'ATIVO', 'imgbd/beb/MilkShake Caramelo.jpg'),
(14, 'MilkShake Ovomaltine', 10.00, 'ATIVO', 'imgbd/beb/MilkShake Ovomaltine.png'),
(15, 'Coca - Cola', 5.00, 'ATIVO', 'imgbd/beb/Coca - Cola.png'),
(404, 'CANCELADO', 0.00, 'ATIVO', 'img/beb/.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `burguer`
--

CREATE TABLE `burguer` (
  `id_burguer` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `burguer`
--

INSERT INTO `burguer` (`id_burguer`, `nome`, `preco`, `status`, `img`) VALUES
(1, 'Dark Burguer', 25.00, 'ATIVO', 'imgbd/burguer/Dark Burguer.png'),
(2, 'BurguerCraft', 32.00, 'ATIVO', 'imgbd/burguer/BurguerCraft.png'),
(3, 'GarticBurguer', 27.00, 'ATIVO', 'imgbd/burguer/GarticBurguer.png'),
(4, 'SimsBurguer', 25.00, 'ATIVO', 'imgbd/burguer/SimsBurguer.jpg'),
(5, 'Super Mario Burguer 2', 27.00, 'ATIVO', 'imgbd/burguer/Super Mario Burguer 2.png'),
(404, 'CANCELADO', 0.00, 'ATIVO', 'imgbd/burguer/');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `cpf_cli` char(14) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tel` char(15) NOT NULL,
  `dta_nasc` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email_cli` varchar(100) NOT NULL DEFAULT 'example@example.com',
  `senha_cli` varchar(100) NOT NULL,
  `dta_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cli`, `cpf_cli`, `nome`, `sexo`, `tel`, `dta_nasc`, `endereco`, `email_cli`, `senha_cli`, `dta_cadastro`) VALUES
(1, '000.000.000-00', 'cliente nao cadastrado', 'NADA', '(00) 00000-0000', '2023-11-22', 'NADA', 'example@example.com', 'NADA', '2023-11-22'),
(1234, '206.301.148-62', 'Liz Lorena Marcia Porto', 'Feminino', '11 99584-9696', '2000-05-14', 'Rua dos Capitaes Generais, 123 - Mooca', 'liz_lorena_porto@plastic.com.br', 'FrhsiTtPL7', '2022-08-05'),
(1235, '119.148.818-77', 'Juliana Malu Alessandra Ramos', 'Feminino', '11 98917-1846', '1999-09-12', 'Rua da Matriz, 699 - Santo Amaro', 'julianamaluramos@buzatto.pro', '654#21F', '2020-02-15'),
(1236, '122.738.158-16', 'Renan Lopes', 'Masculino', '11 99847-2524', '1989-12-12', 'Rua dos Poostes, 12 - Vila Ponte Rasa', 'renan_lopes@gmail.com', 'renan12GE', '2020-03-03'),
(1239, '561.516.165-15', 'GABRIEL FELIX DE OLIVEIRA', 'Masculino', '(46)16505-1650', '2023-11-21', 'Rua JoÃ£o Fioravante, 52 - Jardim Copacabana , SÃ£o Paulo', 'gf202240@gmail.com', 'NTYxLjUxNi4xNjUtMTU=', '2023-10-22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `codigo_desconto` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor_descontado` float(10,2) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `codigos`
--

INSERT INTO `codigos` (`codigo_desconto`, `descricao`, `valor_descontado`, `estado`) VALUES
('CORTAFOFO', 'SORVETE DE CHOCOLATE POR 4,99', 0.01, 'ATIVO'),
('DESC76', 'BATATA-FRITA POR 8,99', 1.01, 'ATIVO'),
('FELIXFELIZ', 'MILKSHAKE DE CHOCOLATE POR 6,99', 3.01, 'ATIVO'),
('JENNIZIKA', 'GARTIC BURGUER POR 23,99', 3.01, 'ATIVO'),
('LAELBIKE', 'COCA-COLA POR 3,99', 1.01, 'ATIVO'),
('NENHUM', 'NENHUM', 0.00, 'ATIVO'),
('NENHUM CUPOM SELECIONADO', 'NENHUM CUPOM SELECIONADO', 0.00, 'ATIVO'),
('QUATI15', 'BURGUERCRAFT POR 28,99', 3.01, 'ATIVO'),
('SASDAN', 'TORTA HOLANDESA POR 9,99', 5.01, 'ATIVO'),
('TREINAFOFO', 'NACHOS POR 12,99', 7.01, 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comandas`
--

CREATE TABLE `comandas` (
  `comanda` int(11) NOT NULL,
  `mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `comandas`
--

INSERT INTO `comandas` (`comanda`, `mesa`) VALUES
(103, 2),
(104, 2),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 4),
(110, 4),
(111, 4),
(112, 4),
(113, 5),
(114, 5),
(115, 5),
(116, 5),
(117, 5),
(118, 5),
(119, 5),
(120, 5),
(121, 6),
(122, 6),
(123, 6),
(124, 6),
(125, 6),
(126, 6),
(127, 6),
(128, 6),
(129, 7),
(130, 7),
(131, 7),
(132, 7),
(133, 7),
(134, 7),
(135, 7),
(136, 7),
(137, 7),
(138, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpj` char(18) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tel` char(15) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cnpj`, `nome`, `tel`, `tipo`) VALUES
('00.930.825/0001-05', 'DISTRIBUIDORA DE PAES TRIGO DE OURO LTDA', '11 3354-7923', 'Pães'),
('00.930.825/0001-06', 'SLA LTDA', '(11) 93176-4547', 'Acompanhamentos'),
('10.436.594/0001-31', '	PORTAL DISTRIBUIDORA DE EPIS LTDA', '11 3623-4488', 'EPIs'),
('14.294.947/0001-67', '	MR SP ALIMENTOS LTDA', '11 4141-2127', 'Alimentos'),
('22.354.997/0001-10', 'DISTRIBUIDORA LEGUMES M R LTDA', '11 3395-1191', 'Legumes e Hortalicas'),
('24.932.079/0001-57', 'MULTI DISTRIBUICAO DE QUEIJOS LTDA', '11 3731-1854', 'Queijos'),
('30.133.217/0001-30', 'JL KITS DE TALHERES E EMBALAGENS DESCARTAVEIS LTDA', '11 2575-1800', 'Utensilhos'),
('43.881.242/0001-44', 'DISTRIBUIDORA DE BEBIDAS PIRITUBA LTDA', '11 3904-1011', 'Bebidas'),
('52.568.037/0001-14', 'COMERCIO DE MOLHOS LEGUVITA LTDA', '11 4727-5614', 'Acompanhamentos'),
('78.348.133/0001-40', 'ACOUGUE SAO PAULO LTDA', '11 98765-4321', 'Carnes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_func` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf_func` char(14) NOT NULL,
  `dta_nasc` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `dta_admissao` date NOT NULL,
  `dta_demissao` date DEFAULT NULL,
  `religiao` varchar(50) DEFAULT NULL,
  `tipo_sanguineo` varchar(3) NOT NULL,
  `tel` char(15) NOT NULL,
  `tel_emergencia` char(15) NOT NULL,
  `ctps` char(14) DEFAULT NULL,
  `pis` char(14) DEFAULT NULL,
  `tit_eleitor` char(16) NOT NULL,
  `reservista` char(3) DEFAULT NULL,
  `vr` float(10,2) DEFAULT NULL,
  `vt` float(10,2) DEFAULT NULL,
  `comissao` float(10,2) NOT NULL,
  `conta_bancaria` varchar(50) NOT NULL,
  `habilitado` varchar(10) DEFAULT NULL,
  `email_adm` varchar(100) NOT NULL,
  `senha_adm` varchar(100) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_func`, `id_tipo`, `nome`, `cpf_func`, `dta_nasc`, `sexo`, `dta_admissao`, `dta_demissao`, `religiao`, `tipo_sanguineo`, `tel`, `tel_emergencia`, `ctps`, `pis`, `tit_eleitor`, `reservista`, `vr`, `vt`, `comissao`, `conta_bancaria`, `habilitado`, `email_adm`, `senha_adm`, `avatar`) VALUES
(12321, 2, 'João Tomas Rochas', '123.456.789-98', '1983-08-05', 'Masculino', '2013-08-05', NULL, 'Catolico', 'A+', '(11) 11111-1157', '11 95498-7456', '12345678/01', '123.45678.90-1', '1234.5678.9012', 'SIM', 422.40, 150.08, 0.10, '123169', 'SIM', 'jao@gmail.com', 'MTIzNDU2', 'avatar/12321.jpg'),
(12322, 1, 'Amanda Flavia Araujo', '676.475.618-04', '1985-08-25', 'Feminino', '1999-08-05', NULL, 'Budista', 'AB+', '11 98945-6123', '11 90045-6123', '87654321/02', '987.65432.10-2', '9876.5432.1098', '', 496.79, 290.40, 0.00, '789456123-10', 'SIM', 'a.flavia@gmail.com', 'ZmJnRkVHNTQ=', 'avatar/12322.jpg'),
(12323, 5, 'Gabriel Franciso Neves', '311.111.118-15', '2000-08-05', 'Masculino', '2020-08-05', NULL, 'Judeu', 'O-', '11 96478-9450', '11 95647-8956', '54789632/04', '456.74585.55-3', '9895.5555.5874', 'SIM', 345.32, 172.93, 0.20, '456789416', 'SIM', 'gabriel.neves@outlook.com', 'QmthZWsyMQ==', 'avatar/12323.jpg'),
(12324, 6, 'Fransisca Soares da Silva', '211.998.444-87', '1998-08-05', 'Feminino', '2022-08-05', NULL, 'Protestante', 'AB-', '11 95678-9451', '11 97894-5641', '61600888/04', '888.74158.88-4', '4482.4569.7410', '', 412.11, 103.36, 0.10, '123897456-77', 'SIM', 'franc.ss@gmail.com', 'cGtwdDIxMw==', 'avatar/12324.jpg'),
(12325, 3, 'Luiza Nina Teixeira', '456.888.444-42', '1985-08-05', 'Feminino', '2021-04-05', NULL, 'Catolica', 'O+', '11 97897-4563', '11 99564-5643', '77777777/05', '774.45698.77-5', '6545.1254.7415', '', 309.98, 114.97, 0.20, '123456744-11', 'NÃO', 'luiza_teixeira@gmail.com', 'MzA5cHBw', 'avatar/12325.jpg'),
(12326, 4, 'Sarah Vitoria Tatiane', '418.164.778-18', '1985-04-15', 'Feminino', '2023-08-05', NULL, 'Ateia', 'O-', '11 99138-1426', '11 99227-9564', '52487963/95', '548.95175.85-5', '9874.1547.1234', NULL, 453.41, 290.41, 0.20, '365478521-53', 'SIM', 'sarah_tatiane@gmail.com', 'dGF0aTg5QjQ=', 'avatar/12326.jpg'),
(12327, 7, 'Caleb Danilo da Cunha', '791.355.378-25', '2004-05-08', 'Masculino', '2022-08-05', NULL, 'Protestante', 'B-', '11 99205-2568', '11 92775-3034', '64848741/77', '986.47586.11-1', '4444.8452.4758', 'NÃƒ', 298.99, 114.84, 0.20, '548789456-55', 'NÃO', 'caleb_omno@outlook.com', 'NDQ2NGpqcmkj', 'avatar/12327.jpg'),
(12328, 1, 'Cristiane Leticia Antonia Moraes', '456.115.848-04', '1989-04-15', 'Feminino', '1999-08-05', NULL, 'Testemunha de Jeova', 'A-', '11 98522-6773', '11 91328-8708', '74184321/02', '789.54112.10-2', '9877.5432.1098', '', 496.79, 290.40, 0.00, '789548422-10', 'SIM', 'cristiane_moraes@icloud.com', 'ODNKRzMyMQ==', 'avatar/12328.jpg'),
(12329, 2, 'Rafaela Heloisa Vieira', '319.313.248-91', '2003-06-22', 'Femino', '2023-02-08', NULL, 'Agnostico', 'A+', '11 98534-0471', '11 92716-0906', '18453678/01', '123.85200.90-1', '9874.5678.9012', '', 422.40, 150.08, 0.10, '128447589-14', 'SIM', 'vieira_rafa@gmail.com', 'NjUkI2ZzZkdH', 'avatar/12329.jpg'),
(12330, 3, 'Anderson Rodrigo Arthur Freitas', '592.142.528-15', '1995-08-04', 'Masculino', '2020-04-17', NULL, 'Catolico', 'A-', '11 99877-1716', '11 93683-9430', '98512647/05', '884.44598.77-5', '7744.5554.7415', 'SIM', 309.98, 114.97, 0.20, '887456744-11', 'NÃO', 'andersonrodrigofreitas@gmail.com', 'OTY1MVNFR0U=', 'avatar/12330.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mesas`
--

CREATE TABLE `mesas` (
  `mesa` int(11) NOT NULL,
  `qtdCadeiras` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Livre',
  `chamando` char(3) NOT NULL DEFAULT 'não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `mesas`
--

INSERT INTO `mesas` (`mesa`, `qtdCadeiras`, `estado`, `chamando`) VALUES
(1, 10, 'Livre', 'não'),
(2, 2, 'Livre', 'não'),
(3, 4, 'Ocupada', 'não'),
(4, 4, 'Livre', 'não'),
(5, 8, 'Livre', 'não'),
(6, 8, 'Livre', 'não'),
(7, 10, 'Livre', 'não'),
(10, 5, 'Livre', 'não');

-- --------------------------------------------------------

--
-- Estrutura para tabela `molho`
--

CREATE TABLE `molho` (
  `id_molho` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `molho`
--

INSERT INTO `molho` (`id_molho`, `nome`, `status`, `img`) VALUES
(1, 'Barbecue', 'ATIVO', 'molho/.jpg'),
(2, 'Rose', 'ATIVO', 'molho/.jpg'),
(3, 'Tomate Picante', 'ATIVO', 'molho/.jpg'),
(4, 'Tartaro', 'ATIVO', 'molho/.jpg'),
(5, 'Guacamole', 'ATIVO', 'molho/.jpg'),
(6, 'MSEGREDO', 'ATIVO', 'molho/.jpg'),
(7, 'Molho de Mostarda com Mel', 'ATIVO', 'molho/.jpg'),
(404, 'CANCELADO', 'ATIVO', 'molho/');

-- --------------------------------------------------------

--
-- Estrutura para tabela `objeto_fornecido`
--

CREATE TABLE `objeto_fornecido` (
  `lote` int(11) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `preco_unidade` float(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `nota_fiscal` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `objeto_fornecido`
--

INSERT INTO `objeto_fornecido` (`lote`, `cnpj`, `preco_unidade`, `qtd`, `nota_fiscal`, `data`) VALUES
(1, '43.881.242/0001-44', 6.89, 60, '024006', '2023-08-05'),
(2, '43.881.242/0001-44', 23.79, 20, '954786', '2023-08-08'),
(3, '14.294.947/0001-67', 45.65, 15, '684321', '2023-07-31'),
(4, '52.568.037/0001-14', 1.50, 80, '648265', '2023-07-05'),
(5, '30.133.217/0001-30', 45.64, 23, '784002', '2023-01-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `comanda` int(11) NOT NULL,
  `id_burguer` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `id_bebida` int(11) DEFAULT NULL,
  `qtdbeb` int(11) DEFAULT NULL,
  `id_acompanhamento` int(11) DEFAULT NULL,
  `qtdacomp` int(11) DEFAULT NULL,
  `id_molho` int(11) DEFAULT NULL,
  `qtdmolho` int(11) DEFAULT NULL,
  `id_sobremesa` int(11) DEFAULT NULL,
  `qtdsobremesa` int(11) DEFAULT NULL,
  `obs` varchar(150) DEFAULT NULL,
  `horaPedido` datetime NOT NULL,
  `situacao` varchar(50) NOT NULL DEFAULT 'PREPARANDO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `mesa`, `comanda`, `id_burguer`, `qtd`, `id_bebida`, `qtdbeb`, `id_acompanhamento`, `qtdacomp`, `id_molho`, `qtdmolho`, `id_sobremesa`, `qtdsobremesa`, `obs`, `horaPedido`, `situacao`) VALUES
(2, 1, 103, 3, 2, 4, 1, 4, 2, 7, 1, 1, 2, NULL, '2023-08-23 19:32:00', 'PRONTO'),
(3, 4, 103, 2, 2, 4, 2, 4, 3, 1, 4, 2, 4, 'SEM TOMATE', '2023-08-22 19:18:31', 'CANCELADO'),
(4, 7, 108, 4, 2, 4, 2, 4, 4, 1, 5, 4, 2, 'Normal', '2023-09-16 21:45:00', 'PRONTO'),
(5, 5, 106, 404, 3, 404, 3, 404, 3, 404, 3, 404, 3, 'Mais queijo', '2023-09-12 19:15:00', 'PRONTO'),
(6, 6, 107, 3, 1, 3, 1, 2, 1, 2, 4, 3, 5, 'Sem pepino', '2023-09-14 20:00:00', 'PRONTO'),
(7, 7, 108, 4, 2, 4, 2, 4, 4, 1, 5, 4, 2, 'Normal', '2023-09-16 21:45:00', 'PRONTO'),
(8, 3, 109, 3, 2, 7, 2, 2, 2, 5, 3, 6, 2, 'Sem cebola', '2023-09-10 18:30:00', 'PRONTO'),
(9, 6, 112, 404, 1, 10, 1, 3, 1, 2, 1, 4, 1, 'Mais alface', '2023-09-11 19:15:00', 'PRONTO'),
(10, 2, 120, 4, 3, 5, 3, 1, 2, 6, 4, 3, 3, '', '2023-09-11 20:45:00', 'CANCELADO'),
(11, 4, 110, 1, 1, 8, 2, 4, 1, 4, 2, 1, 2, 'Sem pepino', '2023-09-12 18:55:00', 'PRONTO'),
(12, 1, 115, 1, 1, 12, 2, 2, 4, 7, 4, 7, 2, 'Menos cebola', '2023-09-12 19:30:00', 'CANCELADO'),
(13, 7, 114, 3, 1, 9, 1, 4, 3, 3, 2, 6, 1, 'Mais queijo', '2023-09-13 20:00:00', 'PRONTO'),
(15, 10, 120, 3, 2, 3, 2, 2, 1, 6, 1, 1, 2, NULL, '2023-10-10 19:25:38', 'CANCELADO'),
(16, 3, 111, 2, 3, 6, 3, 2, 3, 1, 4, 7, 3, 'Mais bacon', '2023-09-17 19:45:00', 'PRONTO'),
(17, 7, 113, 1, 1, 7, 1, 2, 1, 2, 1, 1, 1, 'Sem cebola', '2023-09-17 20:30:00', 'PRONTO'),
(18, 3, 107, 3, 1, 3, 1, 404, 1, 404, 1, 404, 1, '', '2023-11-09 13:09:36', 'PREPARANDO'),
(19, 3, 107, 3, 1, 3, 1, 2, 1, 404, 404, 404, 404, '', '2023-11-09 13:12:32', 'PRONTO'),
(20, 5, 115, 1, 1, 404, 404, 404, 404, 404, 404, 404, 404, NULL, '2023-11-30 19:47:00', 'CANCELADO'),
(21, 4, 110, 1, 1, 404, 404, 404, 1, 404, 1, 404, 1, NULL, '2023-12-02 12:30:00', 'PREPARANDO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `prod` varchar(100) NOT NULL,
  `preco_compra` float(10,2) NOT NULL,
  `preco_venda` float(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `dta_compra` date NOT NULL,
  `dta_vencimento` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `lote`, `tipo`, `prod`, `preco_compra`, `preco_venda`, `qtd`, `dta_compra`, `dta_vencimento`, `status`, `img`) VALUES
(1, 1, 'Bebida', 'Agua Natural 250ml', 6.89, 8.80, 60, '2023-08-05', '2023-12-09', 'ATIVO', 'imgbd/prod/1.png'),
(2, 2, 'Bebida', 'Agua com Gas 500ml', 23.79, 25.68, 20, '2023-08-08', '2023-12-09', 'ATIVO', 'imgbd/prod/2.jpg'),
(3, 3, 'Carnes', 'Carne Moida 350g', 8.50, 9.00, 14, '2023-07-31', '2023-12-09', 'ATIVO', 'imgbd/prod/3.png'),
(4, 4, 'Acompanhamentos', 'Ketchup - sache ', 1.50, 1.75, 80, '2023-07-05', '2024-03-12', 'ATIVO', 'imgbd/prod/4.png'),
(5, 5, 'Utensilhos', 'Talher Kit 12uni', 45.64, 0.00, 23, '2023-01-05', '2027-12-12', 'ATIVO', 'imgbd/prod/5.png'),
(6, 3, 'Massas', 'Pão', 4.25, 4.50, 30, '2023-11-22', '2023-12-14', 'ATIVO', 'imgbd/prod/6.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobremesa`
--

CREATE TABLE `sobremesa` (
  `id_sobremesa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'ATIVO',
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `sobremesa`
--

INSERT INTO `sobremesa` (`id_sobremesa`, `nome`, `preco`, `status`, `img`) VALUES
(1, 'Torta de Limão', 15.00, 'ATIVO', 'imgbd/sobremesa/Torta de Limão.png'),
(2, 'Torta Holandesa', 15.00, 'ATIVO', 'imgbd/sobremesa/Torta Holandesa.png'),
(3, 'Torta de Morango', 15.00, 'ATIVO', 'imgbd/sobremesa/Torta de Morango.png'),
(4, 'Sorvete de Cookies Cream', 5.00, 'ATIVO', 'imgbd/sobremesa/Sorvete de Cookies Cream.png'),
(5, 'Sorvete de Baunilha', 5.00, 'ATIVO', 'imgbd/sobremesa/Sorvete de Baunilha.png'),
(6, 'Sorvete de Chocolate', 5.00, 'ATIVO', 'imgbd/sobremesa/Sorvete de Chocolate.png'),
(7, 'Sorvete Napolitano', 5.00, 'ATIVO', 'imgbd/sobremesa/Sorvete Napolitano.png'),
(404, 'CANCELADO', 0.00, 'ATIVO', 'imgbd/sobremesa/.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `sal_hora` float(10,2) NOT NULL,
  `carga_horaria` float(10,2) NOT NULL,
  `salario` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `cargo`, `sal_hora`, `carga_horaria`, `salario`) VALUES
(1, 'Gerente', 27.52, 220.00, 6054.40),
(2, 'Recepcionista', 11.37, 220.00, 2501.40),
(3, 'Garcom', 8.71, 220.00, 1916.20),
(4, 'Chef', 25.78, 220.00, 5671.60),
(5, 'Cozinheiro', 13.10, 220.00, 2882.00),
(6, 'Auxiliar de Cozinha', 7.83, 220.00, 1722.60),
(7, 'Auxiliar de Limpeza', 8.70, 220.00, 1914.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_func` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `data` date NOT NULL,
  `codigo_desconto` varchar(50) DEFAULT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `desconto` float(10,2) DEFAULT NULL,
  `taxa_servico` float(10,2) NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `valor_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id`, `id_func`, `id_cli`, `data`, `codigo_desconto`, `forma_pagamento`, `desconto`, `taxa_servico`, `situacao`, `valor_total`) VALUES
(2, 9, 12327, 1235, '2023-05-10', 'SASDAN', 'Credito', 0.00, 10.00, 'ENTREGUE', 38.00),
(3, 4, 12321, 1236, '2023-09-16', 'JENNIZIKA', 'Dinheiro', 3.00, 10.00, 'ENTREGUE', 43.00),
(4, 4, 12322, 1234, '2023-09-10', 'TREINAFOFO', 'Débito', 5.00, 10.00, 'entregue', 150.00),
(5, 7, 12323, 1236, '2023-09-12', 'JENNIZIKA', 'Dinheiro', 3.00, 10.00, 'entregue', 60.00),
(6, 8, 12324, 1235, '2023-09-14', 'SASDAN', 'Crédito', 0.00, 10.00, 'entregue', 95.00),
(7, 12, 12325, 1234, '2023-09-16', 'FELIXFELIZ', 'Pix', 0.00, 10.00, 'entregue', 120.00),
(8, 11, 12321, 1239, '2023-12-02', 'TREINAFOFO', 'Dinheiro', 7.01, 9.70, 'ENTREGUE', 96.99);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acompanhamento`
--
ALTER TABLE `acompanhamento`
  ADD PRIMARY KEY (`id_acompanhamento`);

--
-- Índices de tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Índices de tabela `burguer`
--
ALTER TABLE `burguer`
  ADD PRIMARY KEY (`id_burguer`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `cpf_cli` (`cpf_cli`),
  ADD UNIQUE KEY `email_cli` (`email_cli`);

--
-- Índices de tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`codigo_desconto`);

--
-- Índices de tabela `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`comanda`),
  ADD KEY `mesa` (`mesa`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_func`),
  ADD UNIQUE KEY `cpf_func` (`cpf_func`),
  ADD UNIQUE KEY `tit_eleitor` (`tit_eleitor`),
  ADD UNIQUE KEY `email_adm` (`email_adm`),
  ADD UNIQUE KEY `conta_bancaria` (`conta_bancaria`),
  ADD UNIQUE KEY `ctps` (`ctps`),
  ADD UNIQUE KEY `pis` (`pis`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Índices de tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`mesa`);

--
-- Índices de tabela `molho`
--
ALTER TABLE `molho`
  ADD PRIMARY KEY (`id_molho`);

--
-- Índices de tabela `objeto_fornecido`
--
ALTER TABLE `objeto_fornecido`
  ADD PRIMARY KEY (`lote`),
  ADD KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_burguer` (`id_burguer`),
  ADD KEY `id_bebida` (`id_bebida`),
  ADD KEY `id_acompanhamento` (`id_acompanhamento`),
  ADD KEY `id_molho` (`id_molho`),
  ADD KEY `mesa` (`mesa`),
  ADD KEY `comanda` (`comanda`),
  ADD KEY `id_sobremesa` (`id_sobremesa`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `lote` (`lote`);

--
-- Índices de tabela `sobremesa`
--
ALTER TABLE `sobremesa`
  ADD PRIMARY KEY (`id_sobremesa`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `comanda` (`id`) USING BTREE,
  ADD KEY `codigo_desconto` (`codigo_desconto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acompanhamento`
--
ALTER TABLE `acompanhamento`
  MODIFY `id_acompanhamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `burguer`
--
ALTER TABLE `burguer`
  MODIFY `id_burguer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12331;

--
-- AUTO_INCREMENT de tabela `mesas`
--
ALTER TABLE `mesas`
  MODIFY `mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `molho`
--
ALTER TABLE `molho`
  MODIFY `id_molho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `objeto_fornecido`
--
ALTER TABLE `objeto_fornecido`
  MODIFY `lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sobremesa`
--
ALTER TABLE `sobremesa`
  MODIFY `id_sobremesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comandas`
--
ALTER TABLE `comandas`
  ADD CONSTRAINT `FK__mesa` FOREIGN KEY (`mesa`) REFERENCES `mesas` (`mesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `objeto_fornecido`
--
ALTER TABLE `objeto_fornecido`
  ADD CONSTRAINT `FK_objeto_fornecido_fornecedor` FOREIGN KEY (`cnpj`) REFERENCES `fornecedor` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_burguer`) REFERENCES `burguer` (`id_burguer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id_bebida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_acompanhamento`) REFERENCES `acompanhamento` (`id_acompanhamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_molho`) REFERENCES `molho` (`id_molho`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_5` FOREIGN KEY (`mesa`) REFERENCES `mesas` (`mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_6` FOREIGN KEY (`comanda`) REFERENCES `comandas` (`comanda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_7` FOREIGN KEY (`id_sobremesa`) REFERENCES `sobremesa` (`id_sobremesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`lote`) REFERENCES `objeto_fornecido` (`lote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`codigo_desconto`) REFERENCES `codigos` (`codigo_desconto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
