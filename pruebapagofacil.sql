-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 10:49:20
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
(62, 'Banco de Venezuela'),
(63, 'Banesco'),
(64, 'Banco Provincial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas`
--

CREATE TABLE `tasas` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tasa` decimal(10,0) NOT NULL,
  `tipo_transacc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tasas`
--

INSERT INTO `tasas` (`id`, `created_at`, `tasa`, `tipo_transacc`) VALUES
(1, '2019-01-16 09:34:19', '12', 0);

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
  `banco` int(11) NOT NULL,
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

INSERT INTO `transacciones` (`id`, `banco`, `numero_cuenta`, `tipo_cuenta`, `numero_documento`, `tipo_documento`, `nombre_titular_cuenta`, `cantidad_pesos`, `tipo_transaccion`, `comentario`, `created_at`, `id_usuario`) VALUES
(1, 1, 1570023425445654578, 1, 15677656, 1, 'Pedro Perez', '1000', 1, 'Transaccion Prueba', '2019-01-12 14:54:10', 1),
(2, 64, 5514522525562554, 2, 0, 1, 'Sergio Hernandez', '3434', 0, '34efsadf', '2019-01-16 08:21:13', 0),
(3, 0, 0, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:31:49', 0),
(4, 0, 0, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:35:19', 0),
(5, 0, 0, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:36:44', 0),
(6, 0, 0, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:39:16', 0),
(7, 0, 0, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:44:06', 0),
(8, 63, 551452252556255444, 2, 0, 0, 'Sergio Hernandez', '3434', 0, '34efsadf', '2019-01-16 08:45:44', 0),
(9, 63, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:54:53', 0),
(10, 63, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:55:02', 0),
(11, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:55:17', 0),
(12, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:56:30', 0),
(13, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:56:37', 0),
(14, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:58:08', 0),
(15, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:58:40', 0),
(16, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 08:59:51', 0),
(17, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:02:58', 0),
(18, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:03:22', 0),
(19, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:03:40', 0),
(20, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:03:55', 0),
(21, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:04:20', 0),
(22, 0, 5514522525567, 0, 0, 0, '', '0', 0, '', '2019-01-16 09:04:38', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `tasas`
--
ALTER TABLE `tasas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
