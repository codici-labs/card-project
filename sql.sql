-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2017 a las 14:44:33
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
  `credito` int(11) NOT NULL,
  `tope_credito` smallint(6) NOT NULL,
  `tipo_tope` tinyint(4) NOT NULL,
  `tope` smallint(6) NOT NULL,
  `piso` smallint(6) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `alta`, `activo`, `foto`, `nro_tarjeta`, `credito`, `tope_credito`, `tipo_tope`, `tope`, `piso`, `mail`) VALUES
(1, 'Oscar Ignacio', 'Jove Biarnau', '2017-03-19 00:29:08', 1, '', 0, 0, 0, 0, 0, 0, 'oscar_jove@hotmail.com'),
(2, 'Ignacio', 'Mansilla Derqui', '2017-03-19 00:31:47', 1, '', 123, 1000, 200, 1, 0, 0, 'imansilladerqui@gmail.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `codigo` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `stock` smallint(5) unsigned NOT NULL,
  `costo` float unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `stock`, `costo`) VALUES
(1, 7790520013194, 'Sandwich Jamon y Queso', 10, 21),
(2, 7791875006091, 'Alfajor chocolate', 20, 10),
(3, 7792710000182, 'Agua Mineral 500cc', 20, 12.5),
(4, 7794122005250, 'Coca Cola 600cc', 10, 16);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `codigo`, `alumno`, `alta`, `comentario`) VALUES
(1, '149,13,151,16', 1, 1, ''),
(2, '197,31,153,16', 2, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id` bigint(20) unsigned NOT NULL,
  `id_alumno` bigint(20) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `alumno` (`alumno`), ADD UNIQUE KEY `codigo_2` (`codigo`), ADD UNIQUE KEY `codigo_3` (`codigo`), ADD KEY `id` (`codigo`), ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_venta` (`id`), ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
