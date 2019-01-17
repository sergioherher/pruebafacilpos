-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2019 a las 06:36:33
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebapagofacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `desc_banco` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `desc_banco`) VALUES
(62, 'Banco Venezolano de Prestamos'),
(63, 'Banesco'),
(64, 'Banco Provincial'),
(65, 'Banco de Venezuela'),
(66, 'Banco Bicentenario'),
(67, 'Del Sur'),
(68, 'Del Sur Banco'),
(69, 'Banco de Venezuela'),
(70, 'Banco de Venezuela'),
(71, 'Banco de Venezuela'),
(72, 'Banco de Venezuela'),
(73, 'Banco de Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas`
--

CREATE TABLE `tasas` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tasa` decimal(10,0) NOT NULL,
  `tipo_transacc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tasas`
--

INSERT INTO `tasas` (`id`, `created_at`, `tasa`, `tipo_transacc`) VALUES
(5, '2019-01-16 23:57:10', '2323', 0),
(44, '2019-01-17 04:11:14', '4544', 0),
(48, '2019-01-17 04:13:24', '3434', 0),
(49, '2019-01-17 04:13:27', '3434', 0),
(50, '2019-01-17 04:13:30', '3434', 0),
(51, '2019-01-17 04:14:19', '3434', 0),
(52, '2019-01-17 04:14:30', '3434', 0),
(53, '2019-01-17 04:14:32', '3434', 0),
(54, '2019-01-17 04:14:34', '3434', 0),
(55, '2019-01-17 04:14:36', '3434', 0),
(56, '2019-01-17 04:17:28', '3434', 0),
(57, '2019-01-17 04:18:03', '3434', 1),
(58, '2019-01-17 04:19:44', '34', 1),
(59, '2019-01-17 04:21:39', '14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposcuenta`
--

CREATE TABLE `tiposcuenta` (
  `id` int(11) NOT NULL,
  `desc_tipo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposcuenta`
--

INSERT INTO `tiposcuenta` (`id`, `desc_tipo`) VALUES
(1, 'Corriente'),
(2, 'Ahorro'),
(3, 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `bancoID` int(11) NOT NULL,
  `numero_cuenta` bigint(20) NOT NULL,
  `tipo_cuenta` int(11) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nombre_titular_cuenta` text COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_pesos` decimal(10,0) NOT NULL,
  `tipo_transaccion` int(11) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `bancoID`, `numero_cuenta`, `tipo_cuenta`, `numero_documento`, `tipo_documento`, `nombre_titular_cuenta`, `cantidad_pesos`, `tipo_transaccion`, `comentario`, `created_at`, `id_usuario`) VALUES
(24, 62, 9223372036854775807, 1, 81124577, 0, 'Sergio Perez', '34', 0, 'Prueba', '2019-01-16 21:44:34', 0),
(25, 62, 9223372036854775807, 1, 81124577, 0, 'Sergio Perez', '34', 0, 'Prueba', '2019-01-16 21:47:14', 0),
(26, 62, 9223372036854775807, 1, 81124577, 0, 'Sergio Perez', '34', 0, 'Prueba', '2019-01-16 22:01:38', 0),
(27, 69, 5514522525564554, 2, 0, 0, '', '45544', 0, '', '2019-01-17 04:36:55', 0),
(28, 69, 5514522525564554, 2, 0, 0, '', '45544', 0, '', '2019-01-17 04:37:23', 0),
(29, 69, 5514522525564554, 2, 0, 0, '', '45544', 0, '', '2019-01-17 04:37:25', 0),
(30, 69, 5514522525564554, 2, 0, 0, '', '45544', 0, '', '2019-01-17 04:37:27', 0),
(31, 62, 4545, 1, 0, 0, 'Sergio Hernandez', '3434', 1, '34efsadf', '2019-01-17 04:38:31', 0),
(32, 63, 5514522525562554, 1, 16024796, 0, 'Sergio Hernandez', '3434', 1, '34efsadf', '2019-01-17 04:42:54', 0),
(33, 0, 5514522525562554, 1, 16024796, 0, 'Sergio Hernandez', '3434', 0, '34efsadf', '2019-01-17 05:24:49', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasas`
--
ALTER TABLE `tasas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposcuenta`
--
ALTER TABLE `tiposcuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banco` (`bancoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `tasas`
--
ALTER TABLE `tasas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
