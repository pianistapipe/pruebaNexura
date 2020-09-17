-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 00:55:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

  
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaempleado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL COMMENT 'identificador del area ',
  `descripcion` varchar(255) NOT NULL COMMENT 'nombre del area de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `descripcion`) VALUES
(1, 'Administracion'),
(2, 'calidad'),
(3, 'Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL COMMENT 'nombre completo del empleado campo text solo debe permitir letras con o sin tilde y espacios: no se admiten caracteres especiales mni números obligatorio ',
  `email` varchar(255) NOT NULL COMMENT 'correo electronico del empleado campo tipo text| email solo permite una  estructura de correo obligatorio',
  `sexo` char(1) NOT NULL COMMENT 'campo tipo radio Button M para masculino F para femenino Obligatorio',
  `area_id` int(11) NOT NULL COMMENT 'area de la empresa  a la que pertenece   el empleado  campo e tipo select ',
  `boletin` int(11) NOT NULL COMMENT '1 para recibir boletin 0 para no recibir  boletin campo de tipo chekbox opcional ',
  `descripcion` text NOT NULL COMMENT 'se describe la experiencia del empleado campo de tipo text area  obligatorio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(4, 'carrp', 'avefenix@hotmail.com', '2', 2, 1, 'hhtyererte'),
(10, 'fellosqui', 'feliangu14@hotmail.com', '2', 2, 0, 'greeee'),
(15, 'fellosqui', 'feliangu14@hotmail.com', '2', 2, 1, 'greeee'),
(16, 'carrp', 'avefenix@hotmail.com', '2', 2, 1, 'hhtyererte'),
(17, 'Fernando', 'feliangu14@hotmail.com', '1', 2, 1, 'jujsddj'),
(18, 'marinela ', 'Feliangu14@hotmail.com', '2', 3, 1, 'ninguna ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int(11) NOT NULL COMMENT 'identificador del empleado',
  `rol_id` int(11) NOT NULL COMMENT 'identificador del  rol'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'identificador del rol',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del rol '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(15) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `descripcion`) VALUES
(1, 'masculino'),
(2, 'femenino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_ibfk_1` (`area_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
