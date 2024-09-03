-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 03-09-2024 a las 03:11:25
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `justicia_para_todos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

DROP TABLE IF EXISTS `casos`;
CREATE TABLE IF NOT EXISTS `casos` (
  `id_caso` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `numero_caso` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion_caso` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `estado_caso` enum('activo','en_proceso','cerrado') COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion_sentencia` text COLLATE utf8mb4_general_ci,
  `fecha_cierre` date DEFAULT NULL,
  PRIMARY KEY (`id_caso`),
  KEY `id_cliente` (`id_cliente`)
) ;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id_caso`, `id_cliente`, `numero_caso`, `descripcion_caso`, `fecha_inicio`, `estado_caso`, `descripcion_sentencia`, `fecha_cierre`) VALUES
(1, 2, '1', 'caso de prueba numero 2', '2024-09-01', 'activo', NULL, NULL),
(2, 2, '2', 'caso de prueba numero 2', '2024-09-01', 'en_proceso', NULL, NULL),
(3, 2, '3', 'caso de prueba numero 3', '2024-09-01', 'cerrado', 'condenado', '2024-09-13'),
(4, 2, '1', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(5, 2, '2', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(6, 2, '2', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(7, 2, '4', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(8, 2, '4', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(9, 2, '4', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(10, 2, '7', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(11, 2, '7', 'primera causa', '2024-09-01', 'activo', NULL, NULL),
(12, 3, '1', 'absuelta', '2024-09-01', 'cerrado', '', '2024-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `rut` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `correo_electronico` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `rut` (`rut`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `rut`, `nombre`, `apellido`, `direccion`, `correo_electronico`, `telefono`) VALUES
(2, '17839620-K', 'Juan', 'Orellana', 'San Martin 142 Linares', 'jcorellanamolina@gmail.com', '992286548'),
(3, '17171124-K', 'cindy', 'da silva', 'chile, guadantun, 135, linares', 'cindy.dasilva06@gmail.com', '+56992286549');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
