-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2017 a las 00:36:52
-- Versión del servidor: 5.5.54-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sallacard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
`id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` tinyint(1) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nro_tarjeta` bigint(20) unsigned NOT NULL,
  `credito` float NOT NULL,
  `tope_credito` smallint(6) NOT NULL,
  `tipo_tope` tinyint(4) NOT NULL,
  `tope` smallint(6) NOT NULL,
  `piso` smallint(6) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `alta`, `activo`, `foto`, `nro_tarjeta`, `credito`, `tope_credito`, `tipo_tope`, `tope`, `piso`, `mail`) VALUES
(1, 'Oscar Ignacio', 'Jove Biarnau', '2017-03-19 00:29:08', 1, '', 0, 464, 0, 0, 0, 0, 'oscar_jove@hotmail.com'),
(2, 'Ignacio', 'Mansilla Derqui', '2017-03-19 00:31:47', 1, '', 123, 705, 200, 1, 0, 0, 'imansilladerqui@gmail.com'),
(3, 'Martin', 'Pandolfelli', '2017-10-31 20:13:29', 1, '', 11, 825.5, 0, 0, 0, 0, 'martin@codicilabs.com'),
(4, 'Gustavo David', 'Zabaleta', '2017-10-31 20:13:33', 1, '', 11, 1000, 0, 0, 0, 0, 'gustavo@codicilabs.com'),
(5, 'Walther', 'Graciano', '2017-11-08 21:44:37', 1, '', 0, 1000, 0, 0, 0, 0, 'walther@codicilabs.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ventas`
--

CREATE TABLE IF NOT EXISTS `detalles_ventas` (
`id` bigint(20) unsigned NOT NULL,
  `id_venta` bigint(20) unsigned NOT NULL,
  `id_producto` bigint(20) unsigned NOT NULL,
  `valor` float unsigned NOT NULL,
  `cantidad` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalles_ventas`
--

INSERT INTO `detalles_ventas` (`id`, `id_venta`, `id_producto`, `valor`, `cantidad`) VALUES
(1, 21, 2, 10, 1),
(2, 22, 2, 10, 3),
(3, 22, 3, 12.5, 2),
(4, 23, 2, 10, 3),
(5, 23, 3, 12.5, 2),
(6, 24, 4, 16, 2),
(7, 24, 2, 10, 1),
(8, 25, 4, 16, 1),
(9, 26, 4, 16, 2),
(10, 27, 2, 10, 2),
(11, 29, 4, 16, 1),
(12, 30, 4, 16, 4),
(13, 31, 3, 12.5, 1),
(14, 32, 3, 12.5, 1),
(15, 33, 4, 16, 1),
(16, 34, 2, 10, 1),
(17, 36, 2, 10, 1),
(18, 36, 3, 12.5, 1),
(19, 36, 4, 16, 1),
(20, 37, 3, 12.5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `codigo` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `stock` smallint(5) unsigned NOT NULL,
  `costo` float unsigned NOT NULL,
  `precio_compra` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `stock`, `costo`, `precio_compra`) VALUES
(1, 7790520013194, 'Sandwich Jamon y Queso', 10, 21, 15),
(2, 7791875006091, 'Alfajor chocolate', 89, 10, 6),
(3, 7792710000182, 'Agua Mineral 500cc', 90, 12.5, 10),
(4, 7794122005250, 'Coca Cola 600cc', 283, 16, 12),
(5, 31323432463, 'Frasco con abeja', 2, 20, 15),
(6, 1234567890123, 'prueba', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
`id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `alumno` bigint(20) unsigned NOT NULL,
  `alta` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `codigo`, `alumno`, `alta`, `comentario`) VALUES
(1, '04020312ff3885', 1, 1, ''),
(2, '950d9710', 2, 1, ''),
(3, '83a700db', 3, 1, ''),
(4, '52cb742b', 4, 1, ''),
(5, '8ace4e59', 5, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id` bigint(20) unsigned NOT NULL,
  `id_alumno` bigint(20) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_alumno`, `fecha`) VALUES
(18, 3, '2017-11-07 00:19:05'),
(19, 3, '2017-11-07 00:28:09'),
(20, 3, '2017-11-07 00:41:26'),
(21, 3, '2017-11-07 01:06:14'),
(22, 3, '2017-11-07 01:07:54'),
(23, 3, '2017-11-07 01:11:30'),
(24, 2, '2017-11-07 21:41:57'),
(25, 2, '2017-11-07 21:43:28'),
(26, 2, '2017-11-07 21:49:06'),
(27, 2, '2017-11-07 21:50:00'),
(28, 2, '2017-11-07 23:44:02'),
(29, 2, '2017-11-07 23:53:48'),
(30, 2, '2017-11-07 23:56:02'),
(31, 2, '2017-11-07 23:58:28'),
(32, 2, '2017-11-08 00:00:33'),
(33, 3, '2017-11-08 00:02:03'),
(34, 3, '2017-11-08 19:38:08'),
(35, 2, '2017-11-08 20:53:43'),
(36, 3, '2017-11-08 22:11:44'),
(37, 1, '2017-11-08 23:19:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_alumno` (`id`), ADD UNIQUE KEY `id_alumno_2` (`id`);

--
-- Indices de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_compra` (`id_venta`,`id_producto`), ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo_2` (`codigo`), ADD KEY `codigo` (`codigo`), ADD KEY `codigo_3` (`codigo`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`codigo`), ADD KEY `alumno` (`alumno`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
