-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 09:49:09
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbbtiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `id` int(11) NOT NULL,
  `idTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `descripcion`, `fecha`, `id`, `idTienda`) VALUES
(23, 'Que paso con los comentarios', '2017-06-13', 4, 7),
(32, 'holaaa', '2017-06-13', 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `tipo`, `cantidad`, `precio`, `id`) VALUES
('152sa', 'Vitaminas', 'Salud', '456', '3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcomentario`
--

CREATE TABLE `subcomentario` (
  `idSubComent` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcomentario`
--

INSERT INTO `subcomentario` (`idSubComent`, `descripcion`, `idComentario`, `fecha`, `idTienda`) VALUES
(4, 'Queras decir los productos\r\n                        ', 23, '2017-06-13', 8),
(5, 'Queras decir productos\r\n                        ', 23, '2017-06-13', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id` int(11) NOT NULL,
  `nombreTienda` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombreTienda`, `usuario`, `clave`) VALUES
(2, 'La hueca', 'Dario', '12356'),
(4, 'M&G', 'Maria', '202cb962ac59075b964b07152d234b70'),
(5, 'El rincon', 'Damaris', '202cb962ac59075b964b07152d234b70'),
(6, 'Tu a la moda', 'lisa45', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'La pasada', 'DianaR', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'Tienda R', 'Luisa', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'La nueva Ola', 'Patricia96', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `id` (`id`),
  ADD KEY `idTienda` (`idTienda`),
  ADD KEY `idTienda_2` (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `subcomentario`
--
ALTER TABLE `subcomentario`
  ADD PRIMARY KEY (`idSubComent`),
  ADD KEY `idComentario` (`idComentario`),
  ADD KEY `id` (`idTienda`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `nombreTienda` (`nombreTienda`,`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `subcomentario`
--
ALTER TABLE `subcomentario`
  MODIFY `idSubComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tienda` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id`) REFERENCES `tienda` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id`) REFERENCES `tienda` (`id`);

--
-- Filtros para la tabla `subcomentario`
--
ALTER TABLE `subcomentario`
  ADD CONSTRAINT `subcomentario_ibfk_1` FOREIGN KEY (`idComentario`) REFERENCES `comentario` (`idComentario`),
  ADD CONSTRAINT `subcomentario_ibfk_2` FOREIGN KEY (`idTienda`) REFERENCES `tienda` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
