-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-07-2022 a las 23:05:13
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `orden` varchar(3) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `menu_id`, `nombre`, `url`, `orden`, `icono`) VALUES
(1, 0, 'Lista de pedidos', '/home', '1', 'icon-home'),
(2, 0, 'Usuarios', '/usuario', '2', 'icon-user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_rol`
--

DROP TABLE IF EXISTS `menu_rol`;
CREATE TABLE IF NOT EXISTS `menu_rol` (
  `menu_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  KEY `menu_id` (`menu_id`) USING BTREE,
  KEY `rol_id` (`rol_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `menu_rol`
--

INSERT INTO `menu_rol` (`menu_id`, `rol_id`) VALUES
(1, 1),
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numOrden` varchar(100) DEFAULT NULL,
  `numFactura` varchar(100) DEFAULT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `fecha_orden` date DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `lab` varchar(255) DEFAULT NULL,
  `cantidad` decimal(25,2) DEFAULT NULL,
  `mific` char(10) DEFAULT NULL,
  `precio_farm` decimal(25,2) DEFAULT NULL,
  `precio_publ` decimal(25,2) DEFAULT NULL,
  `precio_inst` decimal(25,2) DEFAULT NULL,
  `permiso_necesario` char(10) DEFAULT NULL,
  `consignado` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `comentarios` varchar(500) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `empresa` int(9) DEFAULT NULL,
  `nuevo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `numOrden`, `numFactura`, `fecha_despacho`, `fecha_orden`, `codigo`, `descripcion`, `lab`, `cantidad`, `mific`, `precio_farm`, `precio_publ`, `precio_inst`, `permiso_necesario`, `consignado`, `tipo`, `comentarios`, `estado`, `activo`, `empresa`, `nuevo`) VALUES
(166, '1036', '0', '2022-01-03', '2020-06-18', '11715051', 'CLOPZON® (Clopidogrel) Tablets 75 mg 30 Tabs/Box (Unison)', 'Unison Pharmaceutical', '733.00', 'SI', '739.03', '960.74', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(167, '1036', '0', '2022-01-03', '2020-06-18', '11715051', 'CLOPZON® (Clopidogrel) Tablets 75 mg 30 Tabs/Box (Unison)', 'Unison Pharmaceutical', '2122.00', 'SI', '739.03', '960.74', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(168, '1036', '0', '2022-01-03', '2020-06-18', '11716011', 'COLETIN® (Rosuvastatin) Tablets 10 mg 30 Tabs/Box (Unison)', 'Unison Pharmaceutical', '383.00', 'SI', '478.51', '622.07', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(169, '1036', '0', '2022-01-03', '2020-06-18', '11716012', 'COLETIN® (Rosuvastatin) Tablets 10 mg 2 Tabs/Box (Unison)', 'Unison Pharmaceutical', '185.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(170, '1036', '0', '2022-01-03', '2020-06-18', '11716021', 'COLETIN® (Rosuvastatina) 20 mg Tabletas Recubiertas USP 30/Caja (GUMA PHARMA)', 'Unison Pharmaceutical', '400.00', 'SI', '787.47', '1023.71', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(171, '1036', '0', '2022-01-03', '2020-06-18', '11716022', 'COLETIN® (Rosuvastatin) Tablets 20 mg 2 Tabs/Box (Unison)', 'Unison Pharmaceutical', '69.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(172, '1036', '0', '2022-01-03', '2020-06-18', '11716031', 'COLETIN® (Rosuvastatin) Tablets 40 mg 30 Tabs/Box (Unison)', 'Unison Pharmaceutical', '320.00', 'SI', '1174.04', '1526.25', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(173, '1036', '0', '2022-01-03', '2020-06-18', '11725021', 'DURIL® (Sildenafil Citrate) Tablets USP 100 mg 4 Tab/Box (Unison)', 'Unison Pharmaceutical', '1076.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(174, '1036', '0', '2022-01-03', '2020-06-18', '11725011', 'DURIL® (Sildenafil Citrate) Tablets USP 50 mg 4 Tabs/Box (Unison)', 'Unison Pharmaceutical', '1037.00', 'SI', '121.12', '157.46', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(175, '1036', '0', '2022-01-03', '2020-06-18', '11707011', 'NONGO® (Fluconazole) Tablets USP 200 mg 1 Tab/Box (Unison)', 'Unison Pharmaceutical', '2120.00', 'SI', '65.22', '84.78', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(176, '1036', '0', '2022-01-03', '2020-06-18', '11704031', 'ZINALER® (Cetirizina) 10 mg Tabletas Recubiertas USP 10/Caja (GUMA PHARMA)', 'Unison Pharmaceutical', '2460.00', 'SI', '39.46', '51.30', '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(177, '1036', '0', '2022-01-03', '2020-06-18', '11704032', 'ZINALER® (Cetirizine Hydrochloride)  Tablets USP 10 mg 2 Tabs/Box (Unison)', 'Unison Pharmaceutical', '459.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(178, '1623', '0', '2022-01-03', '2020-09-12', '10118231', 'Etoposido 100 mg/5 ml Solucion inyectable 5 ml/Vial 1/Caja (Naprod)', 'NAPROD', '137.00', 'SI', '405.73', '535.57', '0.00', 'NO', '3', 'MINSA', 'CS-20-10-2020. ', 2, 'S', 1, 'S'),
(179, '1623', '0', '2022-01-03', '2020-09-12', '10118231', 'Etoposido 100 mg/5 ml Solucion inyectable 5 ml/Vial 1/Caja (Naprod)', 'NAPROD', '1443.00', 'SI', '405.73', '535.57', '0.00', 'NO', '3', 'MINSA', 'LP-25-08-2020. ', 2, 'S', 1, 'S'),
(180, '1039', '0', '2022-01-03', '2020-12-25', '11724021', 'GUMAZEPAM® 2 MG 100 Tabs LORAZEPAM 2\nMG TABLETA 100TABS/CAJA', 'Hiral Labs', '5003.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'MINSA', 'LP-25-08-2020', 2, 'S', 1, 'S'),
(181, 'Inv 1095', '0', '2022-11-20', '2020-12-25', '11724021', 'GUMAZEPAM® 2 MG 100 Tabs LORAZEPAM 2\nMG TABLETA 100TABS/CAJA', 'Hiral Labs', '13325.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(182, '1041', '1102', '2021-12-01', '2020-12-25', '11724031', 'FentanIl citrato 0,05 mg/ml Solucion Inyectable 100 Amps 2ml/caja', 'Bharat', '821.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'MINSA', 'LP-25-08-2020//FACTURA AUTORIZADA', 0, 'S', 1, 'S'),
(183, '1041', '1100', '2021-12-01', '2020-12-25', '11724031', 'FentanIl citrato 0,05 mg/ml Solucion Inyectable 100 Amps 2ml/caja', 'Bharat', '1179.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(184, '1042', '0', '2022-01-03', '2020-12-25', '11724031', 'FentanIl citrato 0,05 mg/ml Solucion Inyectable 100 Amps 2ml/caja', 'Bharat', '679.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(185, '1041', '0', '2022-01-03', '2020-12-25', '11710031', 'Hidralacina 20mg/Ml Polvo Liofilizado para Inyectable 1-2 Ml I.M. I.V. Amp/caja', 'Bharat', '200.00', 'SOLICITADO', NULL, NULL, '0.00', 'NO', '1', 'MINSA', 'LP-25-08-2020', 2, 'S', 1, 'S'),
(186, '1042', '0', '2022-01-03', '2020-12-25', '11710031', 'Hidralacina 20mg/Ml Polvo Liofilizado para Inyectable 1-2 Ml I.M. I.V. Amp/caja', 'Bharat', '3300.00', 'SOLICITADO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(187, '1041', '0', '2022-01-03', '2020-12-25', '11723021', 'Sulfato Ferroso 60 Mg + Acido Folico 400 Mcg  Tableta Oral 1000tabs/caja', 'Bharat', '5000.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'MINSA', 'LP-25-08-2020', 2, 'S', 1, 'S'),
(188, '1633', '0', '2022-01-03', '2021-03-29', '15016023', 'Gemfibroxilo 600mg                    Caja x 100 (J. Pengyao)', 'J. Pengyao', '1230.00', 'SI', '721.33', '952.16', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(189, '1633', '0', '2022-01-03', '2021-03-29', '15005021', 'Levofloxacina 500 mg Tabletas 50/Caja (J. Pengyao)', 'J. Pengyao', '7400.00', 'SI', '540.41', '713.35', '0.00', 'NO', '5', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(190, '1086', '2150', '2021-12-04', '2021-09-27', '17402012', 'Propofol 10 mg/ml emulsion inyectable amp 5/Caja (Xian Libang)', 'Xian Libang', '5000.00', 'SI', '605.26', '798.94', '0.00', 'NO', '5', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(191, '1086', '0', '2022-01-03', '2021-09-27', '19231011', 'Dexametasona 4 mg/1 ml Solucion inyectable 50 ampollas/Caja (Cisen Pharma)', 'Cisen Pharma', '10000.00', 'NO', NULL, NULL, '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(192, '1086', '2150', '2021-12-04', '2021-09-27', '19205022', 'Clindamicina 900 ml/6ml 5amp/caja. Clindamicina 150 mg/ml Solucion Inyectable 6ml/Ampolla 5 Ampollas/Caja (Cisen Pharma)', 'Cisen Pharma', '15000.00', 'SI', '1468.51', '1938.43', '0.00', 'NO', '4', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(193, '1086', '2150', '2021-12-04', '2021-09-27', '19205011', 'Levofloxacina 500mg/100ml solucion inyectable 1 vial 100ml (Cisen pharma)', 'Cisen Pharma', '30000.00', 'SI', '1249.99', '1649.99', '0.00', 'NO', '4', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(194, '1086', '2150', '2021-12-04', '2021-09-27', '17303031', 'Beclometasona 250 mcg/Dosis Suspension para Inhalacion 200 Dosis/Frasco 1/Caja (Heilongjiang)', 'Heilongjiang', '30000.00', 'SI', '293.70', '387.69', '0.00', 'NO', '4', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(195, '1086', '2150', '2021-12-04', '2021-09-27', '15001013', 'Diclofenac 75mg/3ml Solucion inyectable 100 ampollas/Caja (J. Pengyao)', 'J. Pengyao', '15000.00', 'SI', '358.55', '473.29', '0.00', 'NO', '4', 'PRIVADO', 'Factura Autorizada', 2, 'S', 1, 'S'),
(196, '1086', '0', '2022-01-03', '2021-09-27', '15010101', ' Espironolactona 25 mg Tabletas 30/Caja (J.Pengyao)', 'J. Pengyao', '10000.00', 'SI', '267.85', '353.57', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(197, '1086', '0', '2022-01-03', '2021-09-27', '15016012', 'Simvastatina 10mg Tabletas Recubierta,  100 tabs/Caja (J.Pengyao)', 'J. Pengyao', '10000.00', 'SI', '418.23', '552.07', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(198, '1086', '0', '2022-01-03', '2021-09-27', '13619013', 'Tetraciclina clorhidrato ungüento oftalmico al 1% , 50tubes 5g/caja (Nanjing Baijingyu)', 'Nanjing B.', '1200.00', 'NO', NULL, NULL, '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(199, '1086', '0', '2022-01-03', '2021-09-27', '13705012', 'amoxicilina 500mg Capsula 100/Caja (Reyoung)', 'Reyoung', '45000.00', 'SI', '173.89', '230.58', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(200, '1086', '0', '2022-01-03', '2021-09-27', '13705061', 'amoxicilina 875 mg + acido Clavulanico 125 mg Tabletas Recubiertas 14/Caja (Reyoung)', 'Reyoung', '30000.00', 'SI', '442.02', '583.47', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(201, '1086', '0', '2022-01-03', '2021-09-27', '13705103', 'Ceftriaxona 1g Polvo para Sol. iny. Vial 50/Caja (Reyoung)', 'Reyoung', '10000.00', 'SI', '1762.21', '2326.12', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(202, '1086', '0', '2022-01-03', '2021-09-27', '13705125', 'Meropenem 500 mg Polvo Para Sol. iny i.V Vial 10/Caja (Reyoung)', 'Reyoung', '10000.00', 'SI', '2232.13', '2946.41', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(203, '1086', '0', '2022-01-03', '2021-09-27', '13713013', 'omeprazol 40 mg Polvo para Sol. iny. Vial 50/Caja (Reyoung)', 'Reyoung', '15000.00', 'NO', NULL, NULL, '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(204, '1086', '0', '2022-01-03', '2021-09-27', '11401023', 'acetaminofen 500 mg Tabletas 100/Caja (Huazhong', 'Huazhong', '60000.00', 'NO', NULL, NULL, '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(205, '1086', '0', '2022-01-03', '2021-09-27', '13705161', 'Imipenem 500 mg + Cilastatina 500 mg Polvo para Sol. Iny. Vial 10/Caja (Reyoung)', 'Reyoung', '3500.00', 'NO', '4666.34', '6159.56', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(206, '1086', '0', '2022-01-03', '2021-09-27', '13705171', 'Piperacilina 4 g + Tazobactam 0.5 g Polvo Sol. Iny. Vial 10/Caja (Reyoung)', 'Reyoung', '1000.00', 'SI', '4628.74', '6109.94', '0.00', 'NO', '4', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(207, '1087', '0', '2022-01-03', '2021-09-27', '18810011', 'Nifedipina 10 mg Tabletas Recubiertas de Liberación Sostenida 100/Caja (UNIMARK-India)', 'UNIMARK-India', '30000.00', 'SI', '252.35', '333.10', '0.00', 'NO', '6', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(208, '1087', '0', '2022-01-03', '2021-09-27', '18805061', 'Amoxicilina + Acido Clavulanico 250 Mg X 62.5 Mg/5ml Ppso 60 Ml/Frasco 1/Caja (Unimark-India)', 'UNIMARK-India', '30000.00', 'SI', '203.47', '268.59', '0.00', 'NO', '6', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(209, '1087', '0', '2022-01-03', '2021-09-27', '18824031', 'Trihexifenidilo 5mg tabletas 100 Tabs/caja (Unimark-India)', 'UNIMARK-India', '8000.00', 'NO', NULL, NULL, '0.00', 'SI', '6', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(210, '1087', '0', '2022-01-03', '2021-09-27', '18801012', 'MIGRER ( Ergotamina Tartrato 1mg + Cafeina 100mg Tabletas) Recubiertas 100/Caja (UNIMARK-India)', 'UNIMARK-India', '5000.00', 'SI', '814.66', '1059.05', '0.00', 'NO', '6', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(211, '1087', '0', '2022-01-03', '2021-09-27', '18801041', 'Dipirona 500 mg Tabletas 100/Caja (UNIMARK-India)', 'UNIMARK-India', '10000.00', 'SI', '316.37', '417.61', '0.00', 'NO', '6', 'PRIVADO', NULL, 2, 'S', 1, 'S'),
(212, '1039', '0', '2022-01-03', '2020-12-25', '11724011', 'GUMAVAL® 250 MG TABLETA CON RECUBRIMIENTO ENTERICO 100/CAJA   (Valproato de Sodio)', 'Hiral Labs', '2142.00', 'SI', '273.04', '354.94', '0.00', 'SI', '1', 'MINSA', 'LP-25-08-2020. ', 2, 'S', 1, 'S'),
(213, 'Inv 1087', '0', '2021-11-20', '2020-12-25', NULL, 'NIPARZOX® (Nitazoxanida) 500 Mg 6 Tabs/caja\n', 'Hiral Labs', '15060.00', 'NO', '271.27', '352.65', '0.00', 'NO', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(214, 'Inv 1087', '0', '2021-11-20', '2020-12-25', NULL, 'NIPARZOX® (Nitazoxanida) 100 mg/5 ml. 30 ml/frasco', 'Hiral Labs', '20115.00', 'SI', '173.09', '225.03', '0.00', 'NO', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(215, 'Inv 1087', '0', '2021-11-20', '2020-12-25', NULL, 'NIPARZOX® (Nitazoxanida) 100 mg/5 ml. 60 ml/frasco', 'Hiral Labs', '10010.00', 'SI', '245.43', '319.07', '0.00', 'NO', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(216, 'Inv 1087-B', '0', '2021-11-20', '2020-12-25', '11717111', 'GUMAFENIT® 100 BP 100 Tabs\nFenitoina sodica 100 BP Tabletas 100/caja', 'Hiral Labs', '3000.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'MINSA', 'LP-25-08-2020//FACTURA AUTORIZADA', 0, 'S', 1, 'S'),
(217, 'Inv 1087-B', '0', '2021-11-20', '2020-12-25', '11717111', 'GUMAFENIT® 100 BP 100 Tabs\nFenitoina sodica 100 BP Tabletas 100/caja', 'Hiral Labs', '5000.00', 'NO', NULL, NULL, '0.00', 'SI', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(218, 'Inv 1087-B', '0', '2021-11-20', '2020-12-25', '11724011', 'GUMAVAL® 250 MG TABLETA CON RECUBRIMIENTO ENTERICO 100/CAJA   (Valproato de Sodio)', 'Hiral Labs', '5003.00', 'SI', '273.04', '354.94', '0.00', 'SI', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(219, 'Inv 1087-B', '0', '2021-11-20', '2020-12-25', '11724011', 'GUMAVAL® 250 MG TABLETA CON RECUBRIMIENTO ENTERICO 100/CAJA   (Valproato de Sodio)', 'Hiral Labs', '5006.00', 'SI', '273.04', '354.94', '0.00', 'SI', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(220, 'Inv 1087-B', '0', '2021-11-20', '2020-12-25', '11724013', 'GUMAVAL® 250 MG TABLETA CON RECUBRIMIENTO ENTERICO 50/CAJA  (Valproato de Sodio)', 'Hiral Labs', '6449.00', 'SI', '220.88', '287.15', '0.00', 'SI', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(221, 'Inv 1087', '0', '2021-11-20', '2020-12-25', '11713051', 'PANZIDE®(Pantoprazol)40 mg Tabletas con Recubrimiento Enterico 30/Caja (GUMA PHARMA)', 'Hiral Labs', '2950.00', 'SI', '1721.83', '2238.37', '0.00', 'NO', '1', 'PRIVADO', 'Factura Autorizada', 0, 'S', 1, 'S'),
(222, '1103', '0', '2016-01-20', '2021-02-12', '11717021', 'GUMAXETIN® (Duloxetina) 30mg Capsulas de Liberacion Retardada 30/Caja (GUMA PHARMA)', 'Titan ', '1440.00', 'SI', '1694.28', '2202.56', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(223, '1103', '0', '2021-11-26', '2021-02-12', '11713041', 'GUMAZOL® (Esomeprazol) 40mg Capsulas de Liberacion Retardada 30/Caja (GUMA PHARMA)', 'Titan ', '3240.00', 'SI', '1364.18', '1773.43', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(224, '1103', '0', '2021-11-26', '2021-02-12', '11717061', 'POSILAM® (Lamotrigina) 100mg Tabletas Masticables 30/Caja (GUMA PHARMA)', 'Titan ', '1620.00', 'SI', '1088.31', '1415.93', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(225, '1103', '0', '2021-11-26', '2021-02-12', '11717051', 'POSILAM® (Lamotrigina) 50mg Tabletas Masticables 30/Caja (GUMA PHARMA)', 'Titan ', '1080.00', 'SI', '939.14', '1220.87', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(226, '1103', '0', '2021-11-26', '2021-02-12', '11717081', 'ALENTIN® (Memantina) 10mg Tabletas Recubiertas 30/Caja (GUMA PHARMA)', 'Titan ', '1584.00', 'SI', '713.33', '927.32', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(227, '1103', '0', '2021-11-26', '2021-02-12', '11704011', 'ALERNON® (Desloratadina) 5mg Tabletas Recubiertas 100/Caja (GUMA PHARMA)', 'Titan ', '1620.00', 'SI', '1574.24', '2046.52', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(228, '1103', '0', '2021-11-26', '2021-02-12', '11722011', 'BUTIVE® (Oxibutinina) 5mg Tabletas 30/Caja (GUMA PHARMA)', 'Titan ', '7020.00', 'SI', '489.00', '635.70', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(229, '1103', '0', '2021-11-26', '2021-02-12', '11703021', 'GUMALUK® (Montelukast) 4 mg Tabletas Masticables USP 30/Caja (GUMA PHARMA)', 'Titan ', '3072.00', 'SI', '770.39', '1001.52', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(230, '1103', '0', '2021-11-26', '2021-02-12', '11703031', 'GUMALUK® (Montelukast) 10 mg Tabletas Recubiertas USP 30/Caja (GUMA PHARMA)', 'Titan ', '3840.00', 'SI', '834.34', '1084.66', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(231, '1103', '0', '2021-11-26', '2021-02-12', '11713031', 'LEPIREL® (Levosulpirida) 25mg Tabletas 30/Caja (GUMA PHARMA)', 'Titan ', '3072.00', 'SI', '509.17', '661.92', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(232, '1103', '0', '2021-11-26', '2021-02-12', '11717071', 'TERUTAM® (Levetiracetam) 1,000mg Tabletas Recubiertas 30/Caja (GUMA PHARMA)', 'Titan ', '840.00', 'SI', '1414.36', '1838.67', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(233, '1103', '0', '2021-11-26', '2021-02-12', '11717091', 'CUREPIN® (Quetiapina) 100mg Tabletas Recubiertas 30/Caja (GUMA PHARMA)', 'Titan ', '1650.00', 'SI', '1641.15', '2133.49', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(234, '1115', '0', '2022-02-10', '2021-06-18', '11710011', ' \nOLARTEN® (Olmesartan) 20 mg Tabletas Recubiertas 30tabs/caja (GUMA PHARMA)\n', 'Titan ', '1170.00', 'SI', '771.87', '1003.40', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(235, '1115', '0', '2022-02-10', '2021-06-18', '11710021', ' \nOLARTEN® (Olmesartan) 40 mg Tabletas Recubiertas 30tabs/caja (GUMA PHARMA)\n', 'Titan ', '660.00', 'SI', '1424.19', '1851.46', '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(236, '1115', '0', '2022-02-10', '2021-06-18', '11718011', ' \nLIMUPRES® (Everolimus) 0.75 mg Tabletas Recubiertas 30tabs/caja (GUMA PHARMA)\n', 'Titan ', '200.00', 'NO', NULL, NULL, '0.00', 'NO', '1', 'PRIVADO', NULL, 0, 'S', 1, 'S'),
(237, '1089', '0', '2015-03-20', '2021-10-15', '13401062', 'Tramadol 50 mg Capsula 100/Caja (VaRDHMaN)', 'Vardham', '35000.00', 'SI', '422.93', '558.27', '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(238, '1089', '0', '2015-03-20', '2021-10-15', '13401075', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 100/Caja (Vardhman)', 'Vardham', '20000.00', 'SI', '587.40', '775.37', '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(239, '1089', '0', '2015-03-20', '2021-10-15', '13413013', 'Metoclopramida 10 mg Tableta 100/Caja (VaRDHMaN)', 'Vardham', '10000.00', 'SI', '368.89', '486.93', '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(240, '1089', '0', '2015-03-20', '2021-10-15', '18824014', 'LECARBI (Levodopa 250 mg + Carbidopa 25 mg Tabletas Recubiertas 30/Caja (UNIMARK-India)', 'Vardham', '3000.00', 'SI', '354.32', '467.71', '0.00', 'SI', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(241, '1089', '0', '2015-03-20', '2021-10-15', '13412013', 'Metformina 500 mg Tab 100/Caja (VaRDHMaN)', 'Vardham', '10000.00', 'SI', '185.62', '245.02', '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(242, '1089', '0', '2015-03-20', '2021-10-15', '13401083', 'Hidramide(amilorida 5 mg/Hidroclotiazida 50 mg) Tableta 100/Caja (Vardhman)', 'Vardham', '15000.00', 'NO', NULL, NULL, '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(243, '1089', '0', '2015-03-20', '2021-10-15', '13410023', 'atenolol 100 mg Tabletas 100/Caja (VaRDHMaN)', 'Vardham', '10000.00', 'SI', '211.47', '279.13', '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(244, '1089', '0', '2015-03-20', '2021-10-15', '13408015', 'LOMBRIKILL (Albendazol) 400 mg Tabletas Masticables 25/Caja (Vardhman)', 'Vardham', '7000.00', 'NO', NULL, NULL, '0.00', 'NO', '7', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(245, '1090', '0', '2015-03-20', '2022-01-03', '18805061', 'Amoxicilina + Acido Clavulanico 250 Mg X 62.5 Mg/5ml Ppso 60 Ml/Frasco 1/Caja (Unimark-India)', 'UNIMARK-India', '10100.00', 'SI', '203.47', '268.59', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(246, '1090', '0', '2022-01-03', '2022-01-03', '18805061', 'Amoxicilina + Acido Clavulanico 250 Mg X 62.5 Mg/5ml Ppso 60 Ml/Frasco 1/Caja (Unimark-India)', 'UNIMARK-India', '44900.00', 'SI', '203.47', '268.59', '0.00', 'NO', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(247, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Digoxina 0.25mg  Tableta BP 100 tabs/Caja (Intermed-India)', 'Intermed-India', '780.00', 'SI', '118.89', '156.93', '0.00', 'NO', '2', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(248, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Digoxina 0.25mg Tableta BP 100 tabs/Caja (Intermed-India)', 'Intermed-India', '4220.00', 'SI', '118.89', '156.93', '0.00', 'NO', '2', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(249, '1090', '0', '2015-03-20', '2022-01-03', NULL, 'Dipirona 500mg Tabletas  100 tabs/Caja (Unimark-India)', 'Intermed-India', '5000.00', 'SI', '316.37', '417.61', '0.00', 'NO', '2', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(250, '1090', '0', '2015-03-20', '2022-01-03', '18810041', ' Espironolactona 100 mg Tabletas Recubiertas 30/Caja (UNIMARK-India)', 'UNIMARK-India', '2000.00', 'SI', '568.13', '749.94', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(251, '1090', '0', '2015-03-20', '2022-01-03', NULL, 'Finasterida 5mg Tableta Recubierta 30Tabs/Caja (Unimark-India)', 'UNIMARK-India', '6000.00', 'SI', '399.43', '527.25', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(252, '1090', '0', '2015-03-20', '2022-01-03', NULL, 'Gabapentina 600mg Tabletas Recubiertas USP 20 Tabs/Caja (Intermed-India)', 'Intermed-India', '5000.00', 'SI', '422.93', '558.27', '0.00', 'NO', '2', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(253, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Gabapentina 600mg Tabletas Recubiertas USP 20 Tabs/Caja (Intermed-India)', 'Intermed-India', '9000.00', 'SI', '422.93', '558.27', '0.00', 'NO', '2', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(254, '1090', '0', '2015-03-20', '2022-01-03', NULL, 'Nifedipina 20 mg Tabletas Recubiertas de Liberación Sostenida 100/Caja (UNIMARK-India)', 'UNIMARK-India', '17000.00', 'SI', '862.78', '1138.87', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(255, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Nifedipina 20 mg Tabletas Recubiertas de Liberación Sostenida 100/Caja (UNIMARK-India)', 'UNIMARK-India', '18000.00', 'SI', '862.78', '1138.87', '0.00', 'NO', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(256, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'omeprazol 20 mg Capsula 100 Caps/Caja (Intermed-india)', 'Intermed-India', '30000.00', 'SI', '260.81', '344.27', '0.00', 'NO', '2', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(257, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Risperidona 2mg Tabletas USP 30 Tabs/Caja (UNIMARK-India)', 'UNIMARK-India', '4350.00', 'SI', '373.11', '492.51', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(258, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Risperidona 2mg Tabletas USP 30 Tabs/Caja (UNIMARK-India)', 'UNIMARK-India', '30650.00', 'SI', '373.11', '492.51', '0.00', 'NO', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(259, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Tacrolimus 1mg Capsula  30 caps/Caja (UNIMARK-India)', 'UNIMARK-India', '1300.00', 'SI', '2817.65', '3719.31', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(260, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Tacrolimus 1mg Capsula  30 caps/Caja (UNIMARK-India)', 'UNIMARK-India', '1200.00', 'SI', '2817.65', '3719.31', '0.00', 'NO', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(261, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Terbinafina 250mg Tabletas Recubiertas USP  30 Tabs/Caja (UNIMARK-India)', 'UNIMARK-India', '5000.00', 'SI', '734.02', '968.91', '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(262, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Terbinafina 250mg Tabletas Recubiertas USP  30 Tabs/Caja (UNIMARK-India)', 'UNIMARK-India', '2940.00', 'SI', '734.02', '968.91', '0.00', 'NO', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(263, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Trihexifenidilo 5mg tabletas 100 Tabs/caja (Unimark-India)', 'UNIMARK-India', '2520.00', 'NO', NULL, NULL, '0.00', 'SI', '6', 'MINSA', 'ESTIMATE', 2, 'S', 1, 'S'),
(264, '1090', '0', '2022-01-03', '2022-01-03', NULL, 'Ondansetron 8mg Tableta Recubierta 10 Tabs/Box (Unimark-India )', 'UNIMARK-India', '10000.00', 'NO', NULL, NULL, '0.00', 'NO', '6', 'PRIVADO', 'ESTIMATE', 2, 'S', 1, 'S'),
(269, '789451', '78945', '2022-03-01', '2022-03-17', '-', '-----', 'Hiral Labs', '12345.00', 'SI', '1.00', '1.00', '1.00', 'NO', '2', 'MINSA', 'comentarios', 0, 'S', 1, 'S'),
(268, '754565', '564654', '2022-03-01', '2022-03-15', '10118073', 'Carboplatino 10mg/ml Solucion iny i.V 45 ml/Vial 1/Caja  (Naprod) - [10118073]', 'Hiral Labs', '1.00', 'SI', '1.00', '1.00', '1.00', 'SI', '3', 'PRIVADO', 'xd', 0, 'S', 1, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-02-22 16:47:52', NULL),
(2, 'user', '2022-02-23 16:57:58', NULL),
(3, 'Usuario', '2022-03-07 21:21:46', '2022-03-07 21:21:46'),
(4, 'compra', '2022-05-18 16:17:08', '2022-05-18 16:17:08'),
(5, 'produccion', '2022-05-18 16:17:16', '2022-05-18 16:17:16'),
(6, 'Materia Prima', '2022-05-18 16:17:27', '2022-05-18 16:17:27'),
(7, 'conversion', '2022-07-04 14:31:04', '2022-07-04 14:31:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id_comment` int(10) NOT NULL AUTO_INCREMENT,
  `id_solicitud` int(10) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `Activo` varchar(5) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `id_solicitud`, `comment`, `Activo`, `id_usuario`, `updated_at`, `created_at`) VALUES
(21, 329, 'comentario 1', 'S', 1, '2022-05-26 14:14:20', '2022-05-26 14:14:20'),
(22, 329, 'Comentario dos', 'N', 1, '2022-05-26 14:44:09', '2022-05-26 14:14:27'),
(23, 411, 'Aqui hay un comentario', 'S', 1, '2022-06-20 11:14:44', '2022-06-20 11:14:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_consignados`
--

DROP TABLE IF EXISTS `tbl_consignados`;
CREATE TABLE IF NOT EXISTS `tbl_consignados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_consignados`
--

INSERT INTO `tbl_consignados` (`id`, `Nombre`) VALUES
(1, 'Guma Pharma '),
(2, 'Produn / Intermed India'),
(3, 'Produn / MEDORBIS TRADE LLP'),
(4, 'Produn / SHANGHAI'),
(5, 'Produn / SINOCHEM '),
(6, 'Produn / Unimark India'),
(7, 'Vardham');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_estados_pagos`
--

DROP TABLE IF EXISTS `tbl_imp_estados_pagos`;
CREATE TABLE IF NOT EXISTS `tbl_imp_estados_pagos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_estados_pagos`
--

INSERT INTO `tbl_imp_estados_pagos` (`id`, `Descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Pagado', 'S', '2022-07-26 21:00:08', '2022-07-26 21:00:08'),
(2, 'Pendiente', 'S', '2022-07-26 21:00:08', '2022-07-26 21:00:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_estado_orden`
--

DROP TABLE IF EXISTS `tbl_imp_estado_orden`;
CREATE TABLE IF NOT EXISTS `tbl_imp_estado_orden` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_estado_orden`
--

INSERT INTO `tbl_imp_estado_orden` (`id`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'ESTADO 01', 'S', '2022-07-26 22:06:55', '2022-07-26 22:06:55'),
(2, 'ESTADO 02', 'S', '2022-07-26 22:06:55', '2022-07-26 22:06:55'),
(3, 'ESTADO 03', 'S', '2022-07-26 22:06:55', '2022-07-26 22:06:55'),
(4, 'ESTADO 04', 'S', '2022-07-26 22:06:55', '2022-07-26 22:06:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_importacion`
--

DROP TABLE IF EXISTS `tbl_imp_importacion`;
CREATE TABLE IF NOT EXISTS `tbl_imp_importacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num_po` varchar(20) DEFAULT NULL,
  `id_vendor` int(10) DEFAULT NULL,
  `id_shipto` int(10) DEFAULT NULL,
  `id_via` int(10) DEFAULT NULL,
  `id_estados_pagos` int(10) DEFAULT NULL,
  `tipo_carga` int(5) DEFAULT NULL,
  `factura` varchar(10) DEFAULT NULL,
  `recibo` varchar(10) DEFAULT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `fecha_orden_compra` date DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `fecha_estimada` date DEFAULT NULL,
  `id_estado_orden` int(5) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vendor` (`id_vendor`),
  KEY `id_shipto` (`id_shipto`),
  KEY `id_via` (`id_via`),
  KEY `id_estados_pagos` (`id_estados_pagos`),
  KEY `tipo_carga` (`tipo_carga`),
  KEY `id_estado_orden` (`id_estado_orden`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_importacion`
--

INSERT INTO `tbl_imp_importacion` (`id`, `num_po`, `id_vendor`, `id_shipto`, `id_via`, `id_estados_pagos`, `tipo_carga`, `factura`, `recibo`, `fecha_despacho`, `fecha_orden_compra`, `fecha_factura`, `fecha_estimada`, `id_estado_orden`, `activo`, `created_at`, `updated_at`) VALUES
(1, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 22:51:39', '2022-07-13 16:13:21'),
(2, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 22:58:40', '2022-07-13 16:13:16'),
(3, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 22:59:30', '2022-07-13 16:13:11'),
(4, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 23:00:05', '2022-07-13 16:13:05'),
(5, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 23:00:21', '2022-07-13 16:12:59'),
(6, '333', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'N', '2022-07-12 23:00:40', '2022-07-13 16:12:13'),
(7, '1670', 11, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'S', '2022-07-13 16:16:11', '2022-07-13 16:16:11'),
(8, '78912', 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'S', '2022-07-14 20:34:06', '2022-07-14 20:34:06'),
(9, '78451', 8, 2, 3, 2, 1, '4000', '66565', '2022-07-26', '2022-07-26', '2022-07-26', '2022-07-26', 1, 'S', '2022-07-25 14:40:02', '2022-07-26 22:21:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_importacion_detalle`
--

DROP TABLE IF EXISTS `tbl_imp_importacion_detalle`;
CREATE TABLE IF NOT EXISTS `tbl_imp_importacion_detalle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_importacion` int(10) DEFAULT NULL,
  `id_laboratorio` int(10) DEFAULT NULL,
  `id_product` int(10) DEFAULT NULL,
  `articulo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio_farmacia` decimal(10,2) DEFAULT NULL,
  `precio_publico` decimal(10,2) DEFAULT NULL,
  `precio_institucion` decimal(10,2) DEFAULT NULL,
  `mific` varchar(5) DEFAULT NULL,
  `regencia` varchar(5) DEFAULT NULL,
  `minsa` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_importacion` (`id_importacion`),
  KEY `id_laboratorio` (`id_laboratorio`),
  KEY `id_product` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_importacion_detalle`
--

INSERT INTO `tbl_imp_importacion_detalle` (`id`, `id_importacion`, `id_laboratorio`, `id_product`, `articulo`, `descripcion`, `cantidad`, `precio_farmacia`, `precio_publico`, `precio_institucion`, `mific`, `regencia`, `minsa`, `created_at`, `updated_at`) VALUES
(14, 9, NULL, 14, NULL, NULL, '1500.00', NULL, NULL, NULL, '0', '0', '0', '2022-07-25 22:37:50', '2022-07-25 22:37:50'),
(15, 9, NULL, 14, NULL, NULL, '1500.00', NULL, NULL, NULL, '0', '0', '0', '2022-07-25 22:52:32', '2022-07-25 22:52:32'),
(16, 9, NULL, 14, NULL, NULL, '1500.00', NULL, NULL, NULL, '0', '0', '0', '2022-07-25 22:52:36', '2022-07-25 22:52:36'),
(17, 9, NULL, 14, NULL, NULL, '1500.00', NULL, NULL, NULL, '0', '1', '0', '2022-07-25 22:52:41', '2022-07-25 22:52:41'),
(18, 9, NULL, 14, NULL, NULL, '1500.00', NULL, NULL, NULL, '1', '1', '0', '2022-07-25 22:52:46', '2022-07-25 22:52:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_laboratorio`
--

DROP TABLE IF EXISTS `tbl_imp_laboratorio`;
CREATE TABLE IF NOT EXISTS `tbl_imp_laboratorio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_product`
--

DROP TABLE IF EXISTS `tbl_imp_product`;
CREATE TABLE IF NOT EXISTS `tbl_imp_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_type_product` int(10) DEFAULT NULL,
  `Articulo_exactus` varchar(50) DEFAULT NULL,
  `descripcion_corta` varchar(250) DEFAULT NULL,
  `descripcion_larga` varchar(255) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_product` (`id_type_product`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_product`
--

INSERT INTO `tbl_imp_product` (`id`, `id_type_product`, `Articulo_exactus`, `descripcion_corta`, `descripcion_larga`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '10102011', 'f', 'f', 'N', '2022-07-14 17:38:46', '2022-07-14 18:28:46'),
(2, 1, '10523013', 's', 's', 'N', '2022-07-14 17:39:13', '2022-07-14 18:28:51'),
(3, 1, '10523013', 's', 's', 'N', '2022-07-14 17:40:59', '2022-07-14 18:29:10'),
(4, 1, '10523013', 's', 's', 'N', '2022-07-14 17:41:49', '2022-07-14 18:28:56'),
(5, 1, '10523013', 's', 's', 'N', '2022-07-14 17:41:57', '2022-07-14 18:29:05'),
(6, 1, '10523013', 's', 's', 'N', '2022-07-14 17:42:30', '2022-07-14 18:29:14'),
(7, 1, '10523013', 's', 's', 'N', '2022-07-14 17:43:03', '2022-07-14 18:29:18'),
(8, 1, NULL, 'nombre corto', 'nombre largo', 'N', '2022-07-14 17:43:41', '2022-07-14 18:29:00'),
(9, 1, NULL, 'BISOLOW® 5 mg Tablets', 'BISOLOW® 5 mg Tablets (Bisoprolol Hemifumarate) 42 Tabs/Pack. (Propiedad MINSA)', 's', '2022-07-14 18:36:02', '2022-07-14 20:16:42'),
(10, 1, NULL, 'GUMAVAL® S 250 mg/5 ml 120 ml/Bottle', 'GUMAVAL® S 250 mg/5 ml Syrup (Sodium Valproate) 120 ml/Bottle', 's', '2022-07-14 18:36:33', '2022-07-14 18:36:33'),
(11, 2, '10305173', 'PRO01', 'PRO01', 'N', '2022-07-14 20:18:27', '2022-07-14 20:18:44'),
(12, 1, '40951076', 'nombre corto', 'nombre largo', 's', '2022-07-14 20:32:28', '2022-07-14 20:32:28'),
(13, 1, NULL, 'Nuevo Producto', 'Nombre del nuevo producto largo', 'N', '2022-07-25 16:27:46', '2022-07-25 16:27:54'),
(14, 2, NULL, 'ARTICULOS DE PRUEBA', 'ARTICULO DE PRUEBA LARGO', 's', '2022-07-25 22:29:58', '2022-07-25 22:29:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_shipto`
--

DROP TABLE IF EXISTS `tbl_imp_shipto`;
CREATE TABLE IF NOT EXISTS `tbl_imp_shipto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_shipto` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_shipto`
--

INSERT INTO `tbl_imp_shipto` (`id`, `nombre_shipto`, `Descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'fDDDDDD', 's', 'N', '2022-07-12 22:12:03', '2022-07-12 22:17:52'),
(2, 'Guma Pharma, LLC Sucursal Nicaragua', 'Edificio Discover II, 5to Piso, Oficina 5-A.\nManagua, Nicaragua Phone: 505-2227-7200\nRUC: J0310000375640', 'S', '2022-07-12 22:19:56', '2022-07-12 22:19:56'),
(3, 'UNIMARK, S.A.', 'Del Club Terraza 150 mts al		\noeste.		\nManagua, Managua,		\nNicaragua		\nPhone: 505-2278-8787		\nRUC: J0310000121249', 'S', '2022-07-12 22:20:57', '2022-07-12 22:20:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_tipo_carga`
--

DROP TABLE IF EXISTS `tbl_imp_tipo_carga`;
CREATE TABLE IF NOT EXISTS `tbl_imp_tipo_carga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_tipo_carga`
--

INSERT INTO `tbl_imp_tipo_carga` (`id`, `Descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Consolidada', 'S', '2022-07-26 21:02:48', '2022-07-26 21:02:52'),
(2, 'Otros', 'S', '2022-07-26 21:02:50', '2022-07-26 21:02:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_type_product`
--

DROP TABLE IF EXISTS `tbl_imp_type_product`;
CREATE TABLE IF NOT EXISTS `tbl_imp_type_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_type_product`
--

INSERT INTO `tbl_imp_type_product` (`id`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'MED', 'S', '2022-07-14 15:37:39', '2022-07-14 15:37:39'),
(2, 'ONC', 'S', '2022-07-14 15:37:39', '2022-07-14 15:37:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_vendor`
--

DROP TABLE IF EXISTS `tbl_imp_vendor`;
CREATE TABLE IF NOT EXISTS `tbl_imp_vendor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_vendor` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `time_despacho` int(10) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_vendor`
--

INSERT INTO `tbl_imp_vendor` (`id`, `nombre_vendor`, `Descripcion`, `time_despacho`, `activo`, `created_at`, `updated_at`) VALUES
(2, 'OMBRE', 'DESCRIPCION', 0, 'N', '2022-07-12 20:30:53', '2022-07-12 20:55:36'),
(3, 'proveedor', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, ', 0, 'N', '2022-07-12 20:38:46', '2022-07-12 20:51:57'),
(4, 'PROVEEDOR', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 0, 'N', '2022-07-12 20:39:17', '2022-07-12 20:51:54'),
(5, 'nombre de proveedor', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.', 0, 'N', '2022-07-12 20:55:48', '2022-07-12 21:42:30'),
(6, 'PROVEEDOR', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 0, 'N', '2022-07-12 21:43:01', '2022-07-12 21:44:03'),
(7, 'PROVEEDOR', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 0, 'N', '2022-07-12 21:43:07', '2022-07-12 21:43:59'),
(8, 'Hiral Labs Limited', '265, SISONA, Nr. Bhagwanpur, Roorkee, Uttarakhand- 247661, India\nPhone number: +91\n9368235030\nTax ID: 05AAACH9991E1ZF\nIndia', 0, 'S', '2022-07-12 21:43:28', '2022-07-12 21:43:28'),
(9, 'Bharat Parenterals Limited', 'Village: Haripura, Ta.Savli, Dist. Vadodara, Gujarat 391520 India', 0, 'N', '2022-07-12 21:43:49', '2022-07-13 14:52:59'),
(10, 'Opsonin Pharma Limited', '30 New Eskaton Road Dhaka  1000 Bangladesh', 0, 'S', '2022-07-12 21:44:43', '2022-07-12 21:44:43'),
(11, 'Ajit Mehta', 'MEDORBIS TRADE LLP	\n304, Town Centre, 3rd Floor,	\nAndheri Kurla Road, Andheri	\nEast,  Mumbai City,	\nMaharashtra 400059 India	\nTax ID: ABIFM8473A', 0, 'S', '2022-07-12 21:45:01', '2022-07-12 21:45:01'),
(12, 'Andy Duan SINOCHEM PHARMACEUTICAL CO. LTD', 'Floor 21, JIN CHENG TOWER,	\nNO.216 MIDDLE LONGPAN	\nRD. NANJING CHINA	\nTax ID: 913200001347623777', 0, 'S', '2022-07-12 21:45:25', '2022-07-12 21:45:25'),
(13, 'c', 'c', 0, 'N', '2022-07-12 22:11:08', '2022-07-12 22:11:12'),
(14, 'nuevo', 'nuevo', 0, 'S', '2022-07-13 14:52:52', '2022-07-13 14:52:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imp_vias`
--

DROP TABLE IF EXISTS `tbl_imp_vias`;
CREATE TABLE IF NOT EXISTS `tbl_imp_vias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imp_vias`
--

INSERT INTO `tbl_imp_vias` (`id`, `Descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Tierra', 'S', '2022-07-26 20:47:44', '2022-07-26 20:47:44'),
(2, 'Mar', 'S', '2022-07-26 20:47:44', '2022-07-26 20:47:44'),
(3, 'Aire', 'S', '2022-07-26 20:47:44', '2022-07-26 20:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ingresos`
--

DROP TABLE IF EXISTS `tbl_ingresos`;
CREATE TABLE IF NOT EXISTS `tbl_ingresos` (
  `id_ingreso` int(10) NOT NULL AUTO_INCREMENT,
  `id_solicitud` int(10) DEFAULT NULL,
  `Cantidad` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Activo` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_laboratorios`
--

DROP TABLE IF EXISTS `tbl_laboratorios`;
CREATE TABLE IF NOT EXISTS `tbl_laboratorios` (
  `id_lab` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_lab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_laboratorios`
--

INSERT INTO `tbl_laboratorios` (`id_lab`, `nombre_lab`) VALUES
(2, 'Bharat'),
(3, 'Cisen Pharma'),
(4, 'Heilongjiang'),
(5, 'Hiral Labs'),
(6, 'Huazhong'),
(7, 'Intermed-India'),
(8, 'J. Pengyao'),
(9, 'Nanjing B.'),
(10, 'NAPROD'),
(11, 'Reyoung'),
(12, 'Titan '),
(13, 'UNIMARK-India'),
(14, 'Unison Pharmaceutical'),
(15, 'Vardham'),
(16, 'Xian Libang');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_metas`
--

DROP TABLE IF EXISTS `tbl_metas`;
CREATE TABLE IF NOT EXISTS `tbl_metas` (
  `id_metas` int(10) NOT NULL AUTO_INCREMENT,
  `nMes` int(10) DEFAULT NULL,
  `nAnnio` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_metas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_metas`
--

INSERT INTO `tbl_metas` (`id_metas`, `nMes`, `nAnnio`, `updated_at`, `created_at`) VALUES
(15, 7, 2022, '2022-07-14 17:14:39', '2022-07-14 17:14:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_metas_proyecciones`
--

DROP TABLE IF EXISTS `tbl_metas_proyecciones`;
CREATE TABLE IF NOT EXISTS `tbl_metas_proyecciones` (
  `id_metas` int(10) NOT NULL AUTO_INCREMENT,
  `nMes` int(10) DEFAULT NULL,
  `nAnnio` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_metas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_metas_proyecciones`
--

INSERT INTO `tbl_metas_proyecciones` (`id_metas`, `nMes`, `nAnnio`, `updated_at`, `created_at`) VALUES
(25, 7, 2022, '2022-07-01 14:21:57', '2022-07-01 14:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notificaciones`
--

DROP TABLE IF EXISTS `tbl_notificaciones`;
CREATE TABLE IF NOT EXISTS `tbl_notificaciones` (
  `id_notificacion` int(10) NOT NULL AUTO_INCREMENT,
  `Articulo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `Campo` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyecciones`
--

DROP TABLE IF EXISTS `tbl_proyecciones`;
CREATE TABLE IF NOT EXISTS `tbl_proyecciones` (
  `id_solicitud` int(10) NOT NULL AUTO_INCREMENT,
  `id_meta` int(10) DEFAULT NULL,
  `Articulos` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Cant_solicitada` varchar(255) DEFAULT NULL,
  `proyect_mensual` varchar(255) DEFAULT NULL,
  `Inventario_real` varchar(100) DEFAULT NULL,
  `Ingreso` varchar(255) DEFAULT NULL,
  `Tiempo_Entrega` varchar(10) DEFAULT NULL,
  `Transito` varchar(255) DEFAULT NULL,
  `Proveedor` varchar(255) DEFAULT NULL,
  `Estados` varchar(255) DEFAULT NULL,
  `Activo` varchar(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=MyISAM AUTO_INCREMENT=1200 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_proyecciones`
--

INSERT INTO `tbl_proyecciones` (`id_solicitud`, `id_meta`, `Articulos`, `Descripcion`, `Cant_solicitada`, `proyect_mensual`, `Inventario_real`, `Ingreso`, `Tiempo_Entrega`, `Transito`, `Proveedor`, `Estados`, `Activo`, `updated_at`, `created_at`) VALUES
(1163, 25, '1IN00076', 'SODA CAUSTICA 50%', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1164, 25, '1IN00015', 'PEROXIDO DE HIDROGENO 50%', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1165, 25, '1IN00018', 'PAM ANIONICA', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1166, 25, '1IN00115', 'POLIOBA', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1167, 25, '1IN00085', 'CMC', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1168, 25, '1IN00058', 'KYMENE', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1169, 25, '1IN00012', 'BUCKMAN', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1170, 25, '1IN00124', 'SOLUQUIM 7010', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1171, 25, '1IN00125', 'RHSOL 300', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1172, 25, '1IN00126', 'SOLUFOAM 2503', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1173, 25, '1IN00127', 'FINNFIX M40S', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1174, 25, '1IN00128', 'SOLUBE 200', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1175, 25, '1IN00143', 'SOLUTAC 2557', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1176, 25, '2IN00144', 'SOLUTAC 2558', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1177, 25, '1IN00144', 'Hydrotex Hidrosulfito', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1178, 25, '1IN00136', 'FLOCULANTE SWF-4000', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1179, 25, '1IN00137', 'COAGULANTE SWC-5000', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1180, 25, '1IN00017', 'PAC', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1181, 25, '1IN00139', 'KEMTREET 2613', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1182, 25, '1IN00138', 'KEMTREET 2411', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1183, 25, '1IN00140', 'E 5301', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1184, 25, '1IN00022', 'Sal Industrial', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1185, 25, '1IN00021', 'ACEITE VEGETAL', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1186, 25, '1IN00067', 'SE Cholin 800', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1187, 25, '1IN00027', 'EP Ecoplus', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1188, 25, '1IN00092', 'SE Ecoplus 48', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1189, 25, '1IN00026', 'EP 1200', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1190, 25, '1IN00052', 'EP Cholin', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1191, 25, '1IN00103', 'EP Cholin 6', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1192, 25, '1IN00114', 'EP Ecoplus', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1193, 25, '1IN00100', 'EP Ecoplus 4 Pack', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1194, 25, '1IN00141', 'EP Vueno', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1195, 25, '1IN00142', 'SE Generico Alta Densidad', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1196, 25, '1IN00057 e', 'PAPEL  KRAFT   64 MM X 230 GSM ecoplus', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1197, 25, '1IN00110', 'PAPEL  KRAFT   100 MM X 275 GSM', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1198, 25, '1IN00123', 'PEGAMENTO INDUSTRIAL', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57'),
(1199, 25, '1IN00123', 'PRODBLA', NULL, '1000.00', NULL, NULL, NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-01 14:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitudes`
--

DROP TABLE IF EXISTS `tbl_solicitudes`;
CREATE TABLE IF NOT EXISTS `tbl_solicitudes` (
  `id_solicitud` int(10) NOT NULL AUTO_INCREMENT,
  `id_meta` int(10) DEFAULT NULL,
  `Articulos` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Cant_solicitada` varchar(255) DEFAULT NULL,
  `proyect_mensual` varchar(255) DEFAULT NULL,
  `Inventario_real` varchar(100) DEFAULT NULL,
  `Ingreso` varchar(255) DEFAULT NULL,
  `Fecha_Solicitada` date DEFAULT NULL,
  `Tiempo_Entrega` varchar(10) DEFAULT NULL,
  `Transito` varchar(255) DEFAULT NULL,
  `Proveedor` varchar(255) DEFAULT NULL,
  `Estados` varchar(255) DEFAULT NULL,
  `Activo` varchar(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=MyISAM AUTO_INCREMENT=575 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_solicitudes`
--

INSERT INTO `tbl_solicitudes` (`id_solicitud`, `id_meta`, `Articulos`, `Descripcion`, `Cant_solicitada`, `proyect_mensual`, `Inventario_real`, `Ingreso`, `Fecha_Solicitada`, `Tiempo_Entrega`, `Transito`, `Proveedor`, `Estados`, `Activo`, `updated_at`, `created_at`) VALUES
(534, 15, '1IN00076', 'SODA CAUSTICA 50%', NULL, '1000.00', NULL, NULL, '2022-04-26', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(535, 15, '1IN00015', 'PEROXIDO DE HIDROGENO 50%', NULL, '1000.00', NULL, NULL, '2022-04-26', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(536, 15, '1IN00018', 'PAM ANIONICA', NULL, '1000.00', NULL, NULL, '2022-04-26', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(537, 15, '1IN00115', 'POLIOBA', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(538, 15, '1IN00085', 'CMC', NULL, '1000.00', NULL, NULL, '2022-04-30', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(539, 15, '1IN00058', 'KYMENE', NULL, '1000.00', NULL, NULL, '2022-04-24', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(540, 15, '1IN00012', 'BUCKMAN', NULL, '1000.00', NULL, NULL, '2022-04-26', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(541, 15, '1IN00124', 'SOLUQUIM 7010', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(542, 15, '1IN00125', 'RHSOL 300', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(543, 15, '1IN00126', 'SOLUFOAM 2503', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(544, 15, '1IN00127', 'FINNFIX M40S', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(545, 15, '1IN00128', 'SOLUBE 200', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(546, 15, '1IN00143', 'SOLUTAC 2557', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(547, 15, '2IN00144', 'SOLUTAC 2558', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(548, 15, '1IN00144', 'Hydrotex Hidrosulfito', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(549, 15, 'N/D', 'Bisulfito', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(550, 15, '1IN00136', 'FLOCULANTE SWF-4000', NULL, '1000.00', NULL, NULL, '2022-05-12', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(551, 15, '1IN00137', 'COAGULANTE SWC-5000', NULL, '1000.00', NULL, NULL, '2022-05-12', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(552, 15, '1IN00017', 'PAC', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(553, 15, '1IN00046', 'Strech Film', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(554, 15, 'N/D', 'Anti corrosivo', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(555, 15, 'N/D', 'Anti Incrustante', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(556, 15, 'N/D', 'x', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(557, 15, '1IN00139', 'KEMTREET 2613', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(558, 15, '1IN00138', 'KEMTREET 2411', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(559, 15, '1IN00140', 'E 5301', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(560, 15, '1IN00022', 'Sal Industrial', NULL, '1000.00', NULL, NULL, '2022-04-27', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(561, 15, '1IN00021', 'ACEITE VEGETAL', NULL, '1000.00', NULL, NULL, '2022-04-01', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(562, 15, '1IN00067', 'SE Cholin 800', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(563, 15, '1IN00027', 'EP Ecoplus', NULL, '1000.00', NULL, NULL, '2022-04-01', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(564, 15, '1IN00092', 'SE Ecoplus 48', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(565, 15, '1IN00026', 'EP 1200', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(566, 15, '1IN00052', 'EP Cholin', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(567, 15, '1IN00103', 'EP Cholin 6', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(568, 15, '1IN00114', 'EP Ecoplus', NULL, '1000.00', NULL, NULL, '2022-05-12', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(569, 15, '1IN00100', 'EP Ecoplus 4 Pack', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(570, 15, '1IN00141', 'EP Vueno', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(571, 15, '1IN00142', 'SE Generico Alta Densidad', NULL, '1000.00', NULL, NULL, '2022-05-12', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(572, 15, '1IN00057 e', 'PAPEL  KRAFT   64 MM X 230 GSM ecoplus', NULL, '1000.00', NULL, NULL, '2022-04-28', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(573, 15, '1IN00110', 'PAPEL  KRAFT   100 MM X 275 GSM', NULL, '1000.00', NULL, NULL, '2022-04-28', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39'),
(574, 15, '1IN00123', 'PEGAMENTO INDUSTRIAL', NULL, '1000.00', NULL, NULL, '0000-00-00', NULL, NULL, 'N/D', '0', 'S', NULL, '2022-07-14 17:14:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlb_ingresos_proyeccion`
--

DROP TABLE IF EXISTS `tlb_ingresos_proyeccion`;
CREATE TABLE IF NOT EXISTS `tlb_ingresos_proyeccion` (
  `id_produccion` int(255) NOT NULL AUTO_INCREMENT,
  `Articulos` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Cantidad` decimal(10,2) DEFAULT NULL,
  `Comentarios` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Activo` varchar(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produccion`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tlb_ingresos_proyeccion`
--

INSERT INTO `tlb_ingresos_proyeccion` (`id_produccion`, `Articulos`, `Descripcion`, `Cantidad`, `Comentarios`, `Fecha`, `Activo`, `updated_at`, `created_at`) VALUES
(85, '1163', '1IN00076 | SODA CAUSTICA 50%', '2500.00', NULL, '2022-07-14', 'S', '2022-07-14 17:13:59', '2022-07-14 17:13:59'),
(84, '1175', '1IN00143 | SOLUTAC 2557', '2500.00', '2500', '2022-07-04', 'S', '2022-07-14 17:13:22', '2022-07-14 17:13:22'),
(83, '1168', '1IN00058 | KYMENE', '1500.00', 'Ninguno', '2022-07-19', 'S', '2022-07-14 17:13:00', '2022-07-14 17:13:00'),
(82, '1168', '1IN00058 | KYMENE', '100.00', '100', '2022-07-28', 'N', '2022-07-14 17:13:49', '2022-07-04 08:58:01'),
(81, '1164', '1IN00015 | PEROXIDO DE HIDROGENO 50%', '10.00', '10', '2022-07-04', 'N', '2022-07-14 17:13:14', '2022-07-04 08:51:13'),
(80, '1173', '1IN00127 | FINNFIX M40S', '200.00', '200', '2022-07-01', 'N', '2022-07-04 08:39:56', '2022-07-01 15:14:15'),
(79, '1163', '1IN00076 | SODA CAUSTICA 50%', '10.00', '10', '2022-07-16', 'N', '2022-07-04 08:40:03', '2022-07-01 14:47:41'),
(78, '1165', '1IN00018 | PAM ANIONICA', '10.00', '10', '2022-07-15', 'N', '2022-07-04 08:40:00', '2022-07-01 14:47:01'),
(77, '1163', '1IN00076 | SODA CAUSTICA 50%', '7.00', '7', '2022-07-08', 'N', '2022-07-04 08:39:54', '2022-07-01 14:46:30'),
(76, '1163', '1IN00076 | SODA CAUSTICA 50%', '6.00', '6', '2022-07-06', 'N', '2022-07-04 08:39:51', '2022-07-01 14:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `username`, `password`, `estado`, `created_at`, `updated_at`, `image`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$EYvTJl76gqho3CXSUAyDXum.KcX1qOT4qO87.bhZrGSJDmdafdyge', 1, '2022-02-22 16:30:43', NULL, NULL),
(2, 'test', '01', 'user01', '$2y$10$SJySdjIGKtWsJ1BBxwgw6OQlDyVPBmc3x/lrpFqzjhSPZAQ1ALDMS', 1, '2022-02-23 17:02:14', '2022-02-23 17:02:14', 'none'),
(3, 'usuario', 'usuario', 'usuario', '$2y$10$EYvTJl76gqho3CXSUAyDXum.KcX1qOT4qO87.bhZrGSJDmdafdyge', 1, '2022-03-07 21:24:01', '2022-03-07 21:24:01', 'none'),
(4, 'Sebastian', '-', 'produccion', '$2y$10$jvQ.NxtF.Rwtbkxt0VrjF.tOXK83XyaQPh1bB0e/h0fT47HFdgpz2', 1, '2022-05-18 16:18:00', '2022-05-18 16:18:00', 'none'),
(5, 'compras', '-', 'compras', '$2y$10$GA7dlaegdz1x/WG9RugiYeegdvE3TS2AtlRSvVrcX5q5IvN6vOX8a', 1, '2022-05-18 16:18:13', '2022-05-18 16:18:13', 'none'),
(6, 'Materia', 'Prima', 'materia', '$2y$10$Yh8WP6VNyQYUNnsx.giSReACdbO1BL/USCANWgunFBR474TnZMJE2', 1, '2022-05-18 16:18:32', '2022-05-18 16:18:32', 'none'),
(7, 'Conversion', '-', 'conversion', '$2y$10$h44XNTux50Gko41awcA5Z.EeOtD965o87kJyDtr5Nh/CjtuAZCHY2', 1, '2022-07-04 14:31:45', '2022-07-04 14:31:45', 'none');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` bit(1) DEFAULT NULL,
  KEY `id` (`id`) USING BTREE,
  KEY `rol_id` (`rol_id`) USING BTREE,
  KEY `usuario_id` (`usuario_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id`, `rol_id`, `usuario_id`, `estado`) VALUES
(1, 1, 1, b'1'),
(9, 2, 2, NULL),
(10, 3, 3, NULL),
(11, 5, 4, NULL),
(12, 4, 5, NULL),
(13, 6, 6, NULL),
(14, 7, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_comment`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_comment`;
CREATE TABLE IF NOT EXISTS `view_comment` (
`id_comment` int(10)
,`id_solicitud` int(10)
,`comment` varchar(500)
,`Activo` varchar(5)
,`id_usuario` int(10)
,`updated_at` datetime
,`created_at` datetime
,`username` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_data_calendar`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_data_calendar`;
CREATE TABLE IF NOT EXISTS `view_data_calendar` (
`id_produccion` int(255)
,`Articulos` varchar(255)
,`Descripcion` varchar(255)
,`Cantidad` decimal(10,2)
,`Comentarios` varchar(255)
,`Fecha` date
,`updated_at` datetime
,`created_at` datetime
,`nMonth` int(2)
,`nYear` int(4)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_ingresos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_ingresos`;
CREATE TABLE IF NOT EXISTS `view_ingresos` (
`id_solicitud` int(10)
,`Ingreso` double
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_proyeccion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_proyeccion`;
CREATE TABLE IF NOT EXISTS `view_proyeccion` (
`id_metas` int(10)
,`nMes` int(10)
,`nAnnio` int(10)
,`Pendiente` double
,`id_solicitud` int(10)
,`Articulos` varchar(255)
,`Descripcion` varchar(255)
,`Cant_solicitada` varchar(255)
,`proyect_mensual` varchar(255)
,`Inventario_real` varchar(100)
,`Ingreso` decimal(32,2)
,`Tiempo_Entrega` varchar(10)
,`Transito` varchar(255)
,`Proveedor` varchar(255)
,`Estados` varchar(255)
,`Activo` varchar(5)
,`updated_at` datetime
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_proyeccion_ingresos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_proyeccion_ingresos`;
CREATE TABLE IF NOT EXISTS `view_proyeccion_ingresos` (
`id_solicitud` varchar(255)
,`Ingreso` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_solicitudes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_solicitudes`;
CREATE TABLE IF NOT EXISTS `view_solicitudes` (
`id_metas` int(10)
,`nMes` int(10)
,`nAnnio` int(10)
,`Dias_Transcurridos` int(7)
,`Pendiente` double
,`id_solicitud` int(10)
,`CountComment` bigint(21)
,`Articulos` varchar(255)
,`Descripcion` varchar(255)
,`Cant_solicitada` varchar(255)
,`proyect_mensual` varchar(255)
,`Inventario_real` varchar(100)
,`Ingreso` double
,`Fecha_Solicitada` date
,`Tiempo_Entrega` varchar(10)
,`Transito` varchar(255)
,`Proveedor` varchar(255)
,`Estados` varchar(255)
,`Activo` varchar(5)
,`updated_at` datetime
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_comment`
--
DROP TABLE IF EXISTS `view_comment`;

DROP VIEW IF EXISTS `view_comment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_comment`  AS SELECT `t0`.`id_comment` AS `id_comment`, `t0`.`id_solicitud` AS `id_solicitud`, `t0`.`comment` AS `comment`, `t0`.`Activo` AS `Activo`, `t0`.`id_usuario` AS `id_usuario`, `t0`.`updated_at` AS `updated_at`, `t0`.`created_at` AS `created_at`, `t1`.`username` AS `username` FROM (`tbl_comment` `t0` join `users` `t1` on((`t0`.`id_usuario` = `t1`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_data_calendar`
--
DROP TABLE IF EXISTS `view_data_calendar`;

DROP VIEW IF EXISTS `view_data_calendar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_calendar`  AS SELECT `t0`.`id_produccion` AS `id_produccion`, `t0`.`Articulos` AS `Articulos`, `t0`.`Descripcion` AS `Descripcion`, `t0`.`Cantidad` AS `Cantidad`, `t0`.`Comentarios` AS `Comentarios`, `t0`.`Fecha` AS `Fecha`, `t0`.`updated_at` AS `updated_at`, `t0`.`created_at` AS `created_at`, month(`t0`.`Fecha`) AS `nMonth`, year(`t0`.`Fecha`) AS `nYear` FROM `tlb_ingresos_proyeccion` AS `t0` WHERE (`t0`.`Activo` = 'S') ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_ingresos`
--
DROP TABLE IF EXISTS `view_ingresos`;

DROP VIEW IF EXISTS `view_ingresos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ingresos`  AS SELECT `t1`.`id_solicitud` AS `id_solicitud`, sum(`t1`.`Cantidad`) AS `Ingreso` FROM `tbl_ingresos` AS `t1` WHERE (`t1`.`Activo` = 'S') GROUP BY `t1`.`id_solicitud` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_proyeccion`
--
DROP TABLE IF EXISTS `view_proyeccion`;

DROP VIEW IF EXISTS `view_proyeccion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_proyeccion`  AS SELECT `t2`.`id_metas` AS `id_metas`, `t2`.`nMes` AS `nMes`, `t2`.`nAnnio` AS `nAnnio`, ifnull((`t0`.`Cant_solicitada` - `t1`.`Ingreso`),0) AS `Pendiente`, `t0`.`id_solicitud` AS `id_solicitud`, `t0`.`Articulos` AS `Articulos`, `t0`.`Descripcion` AS `Descripcion`, `t0`.`Cant_solicitada` AS `Cant_solicitada`, `t0`.`proyect_mensual` AS `proyect_mensual`, `t0`.`Inventario_real` AS `Inventario_real`, `t1`.`Ingreso` AS `Ingreso`, `t0`.`Tiempo_Entrega` AS `Tiempo_Entrega`, `t0`.`Transito` AS `Transito`, `t0`.`Proveedor` AS `Proveedor`, `t0`.`Estados` AS `Estados`, `t0`.`Activo` AS `Activo`, `t0`.`updated_at` AS `updated_at`, `t0`.`created_at` AS `created_at` FROM ((`tbl_proyecciones` `t0` left join `view_proyeccion_ingresos` `t1` on((`t0`.`id_solicitud` = `t1`.`id_solicitud`))) join `tbl_metas_proyecciones` `t2` on((`t2`.`id_metas` = `t0`.`id_meta`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_proyeccion_ingresos`
--
DROP TABLE IF EXISTS `view_proyeccion_ingresos`;

DROP VIEW IF EXISTS `view_proyeccion_ingresos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_proyeccion_ingresos`  AS SELECT `t1`.`Articulos` AS `id_solicitud`, sum(`t1`.`Cantidad`) AS `Ingreso` FROM `tlb_ingresos_proyeccion` AS `t1` WHERE (`t1`.`Activo` = 'S') GROUP BY `t1`.`Articulos` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_solicitudes`
--
DROP TABLE IF EXISTS `view_solicitudes`;

DROP VIEW IF EXISTS `view_solicitudes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_solicitudes`  AS SELECT `t2`.`id_metas` AS `id_metas`, `t2`.`nMes` AS `nMes`, `t2`.`nAnnio` AS `nAnnio`, (to_days(now()) - to_days(`t0`.`Fecha_Solicitada`)) AS `Dias_Transcurridos`, ifnull((`t0`.`Cant_solicitada` - `t1`.`Ingreso`),0) AS `Pendiente`, `t0`.`id_solicitud` AS `id_solicitud`, ifnull((select count(0) from `tbl_comment` `t3` where ((`t3`.`id_solicitud` = `t0`.`id_solicitud`) and (`t3`.`Activo` = 'S'))),0) AS `CountComment`, `t0`.`Articulos` AS `Articulos`, `t0`.`Descripcion` AS `Descripcion`, `t0`.`Cant_solicitada` AS `Cant_solicitada`, `t0`.`proyect_mensual` AS `proyect_mensual`, `t0`.`Inventario_real` AS `Inventario_real`, `t1`.`Ingreso` AS `Ingreso`, `t0`.`Fecha_Solicitada` AS `Fecha_Solicitada`, `t0`.`Tiempo_Entrega` AS `Tiempo_Entrega`, `t0`.`Transito` AS `Transito`, `t0`.`Proveedor` AS `Proveedor`, `t0`.`Estados` AS `Estados`, `t0`.`Activo` AS `Activo`, `t0`.`updated_at` AS `updated_at`, `t0`.`created_at` AS `created_at` FROM ((`tbl_solicitudes` `t0` left join `view_ingresos` `t1` on((`t0`.`id_solicitud` = `t1`.`id_solicitud`))) join `tbl_metas` `t2` on((`t2`.`id_metas` = `t0`.`id_meta`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
