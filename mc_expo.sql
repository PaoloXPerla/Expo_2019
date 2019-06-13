-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2019 a las 15:31:12
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mc_expo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_categoria` int(11) NOT NULL,
  `Categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_categoria`, `Categoria`) VALUES
(1, 'Pantalones'),
(2, 'Camisas'),
(5, 'Vestidos'),
(6, 'Zapatos'),
(7, 'Blusas'),
(8, 'Camisetas'),
(9, 'Sacos'),
(10, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `Id_detalle_venta` int(11) NOT NULL,
  `Id_venta` int(11) NOT NULL,
  `Id_productoSu` int(11) NOT NULL,
  `Cantidad_detalle` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`Id_detalle_venta`, `Id_venta`, `Id_productoSu`, `Cantidad_detalle`) VALUES
(7, 1, 7, '2'),
(8, 1, 8, '5'),
(9, 2, 9, '8'),
(10, 3, 8, '9'),
(11, 4, 11, '20'),
(12, 2, 10, '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_planillas`
--

CREATE TABLE `estado_planillas` (
  `Id_estado` int(11) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_planillas`
--

INSERT INTO `estado_planillas` (`Id_estado`, `Estado`) VALUES
(1, 'Pagado'),
(2, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `Id_genero` int(11) NOT NULL,
  `Genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`Id_genero`, `Genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `Id_lote` int(11) NOT NULL,
  `NumeroLote` varchar(20) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Fecha_ingreso` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`Id_lote`, `NumeroLote`, `Id_producto`, `Fecha_ingreso`) VALUES
(1, '986324', 8, '25/01/2018'),
(2, '668471', 7, '26/01/2018'),
(3, '9214015', 10, '29/01/2019'),
(4, '124785', 9, '30/05/2018'),
(5, '166985', 11, '02/11/2018'),
(6, '821040', 12, '16/09/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `Id_marca` int(11) NOT NULL,
  `Marca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`Id_marca`, `Marca`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Underarmor'),
(4, 'Polo'),
(5, 'American Eagle'),
(6, 'Hollister'),
(7, 'Calvin Klein'),
(8, 'Tommy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planillas`
--

CREATE TABLE `planillas` (
  `Id_planilla` int(11) NOT NULL,
  `Fecha_pago` varchar(15) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Producto` varchar(20) NOT NULL,
  `Id_talla` int(11) DEFAULT NULL,
  `Id_genero` int(11) NOT NULL,
  `Id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Id_categoria`, `Producto`, `Id_talla`, `Id_genero`, `Id_marca`) VALUES
(7, 2, 'Polo', 11, 2, 1),
(8, 9, 'Saco Floreado ', 12, 2, 8),
(9, 1, 'Blue Jeans', 4, 2, 6),
(10, 10, 'Collar verde', NULL, 1, 7),
(11, 5, 'Vestido corto rosado', 6, 1, 5),
(12, 8, 'Camiseta floreada', 10, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_sucursal`
--

CREATE TABLE `productos_sucursal` (
  `Id_productoSu` int(11) NOT NULL,
  `Id_lote` int(11) NOT NULL,
  `Cantidad` varchar(20) NOT NULL,
  `Id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_sucursal`
--

INSERT INTO `productos_sucursal` (`Id_productoSu`, `Id_lote`, `Cantidad`, `Id_sucursal`) VALUES
(7, 1, '50', 3),
(8, 1, '50', 4),
(9, 2, '25', 3),
(10, 2, '25', 4),
(11, 3, '75', 3),
(12, 3, '75', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `Id_sucursal` int(11) NOT NULL,
  `Sucursal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`Id_sucursal`, `Sucursal`) VALUES
(3, 'Metrocentro Lourdes'),
(4, 'Metrocentro San Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `Id_talla` int(11) NOT NULL,
  `Talla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`Id_talla`, `Talla`) VALUES
(4, '32'),
(5, '34'),
(6, '36'),
(7, '38'),
(8, '40'),
(9, 'XS'),
(10, 'S'),
(11, 'M'),
(12, 'L'),
(13, 'XL'),
(14, 'XXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `Id_tipo_usuario` int(11) NOT NULL,
  `Tipo_usuario` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`Id_tipo_usuario`, `Tipo_usuario`) VALUES
(1, 'Gerente'),
(2, 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Contraseña` varchar(60) NOT NULL,
  `Dui` varchar(9) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Id_tipo_usuario` int(11) NOT NULL,
  `Apellido` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Usuario`, `Nombre`, `Contraseña`, `Dui`, `Correo`, `Id_tipo_usuario`, `Apellido`) VALUES
(1, 'Gud', 'Paolo Enrique Perla Amaya', '123', '061248352', '72853613', 2, ''),
(2, 'Fragmentado', 'Geovanny Josue Godoy Sibrian', '123', '201456321', '63011466', 2, ''),
(3, 'Father', 'Hector Alejandro Martinez Flores', '123', '124875963', '71528474', 2, ''),
(4, 'Lil Nuel', 'Emmanuel Antonio Escobar Luna', '123', '784125963', '71352489', 1, ''),
(5, 'root', 'Emmanuel', '$2y$10$0', '123456789', 'emmanuelluna420@outlook.com', 1, 'Antonio'),
(6, 'root', 'Emmanuel', '$2y$10$d', '123456789', 'geo@gmail.com', 1, 'Antonio'),
(7, 'root', 'Emmanuel', '$2y$10$G', '123456789', 'emmanuelluna420@outlook.com', 1, 'Antonio'),
(8, 'root', 'Emmanuel', '$2y$10$g', '123456789', 'emmanuelluna420@outlook.com', 1, 'Escobar'),
(9, 'root', 'Emmanuel', '$2y$10$k', '123456789', 'emmanuelluna420@outlook.com', 1, 'Escobar'),
(10, 'root', 'emmanuel', '$2y$10$kfPxupiCVZxQfjSti4Tix.OUvx6xJaX5scVE1mhBUKbYghuaeQGAS', '123456789', 'emmanuel@gmail.com', 1, 'antonio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_venta` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Fecha_venta` varchar(15) NOT NULL,
  `Precio` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_venta`, `Id_usuario`, `Fecha_venta`, `Precio`) VALUES
(1, 2, '01/12/2017', '21'),
(2, 1, '05/05/2018', '36'),
(3, 2, '20/11/2018', '48'),
(4, 3, '11/05/2017', '12'),
(11, 1, '11/05/2017', '3'),
(12, 4, '11/05/2017', '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`Id_detalle_venta`),
  ADD KEY `Id_productoSu` (`Id_productoSu`),
  ADD KEY `Id_venta` (`Id_venta`);

--
-- Indices de la tabla `estado_planillas`
--
ALTER TABLE `estado_planillas`
  ADD PRIMARY KEY (`Id_estado`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`Id_genero`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`Id_lote`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`Id_marca`);

--
-- Indices de la tabla `planillas`
--
ALTER TABLE `planillas`
  ADD PRIMARY KEY (`Id_planilla`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_estado` (`Id_estado`),
  ADD KEY `Id_usuario_2` (`Id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `Id_categoria` (`Id_categoria`),
  ADD KEY `Id_talla` (`Id_talla`),
  ADD KEY `Id_genero` (`Id_genero`),
  ADD KEY `Id_marca` (`Id_marca`);

--
-- Indices de la tabla `productos_sucursal`
--
ALTER TABLE `productos_sucursal`
  ADD PRIMARY KEY (`Id_productoSu`),
  ADD KEY `Id_sucursal` (`Id_sucursal`),
  ADD KEY `Id_lote` (`Id_lote`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`Id_sucursal`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`Id_talla`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`Id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_tipo_usuario` (`Id_tipo_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_venta`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `Id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estado_planillas`
--
ALTER TABLE `estado_planillas`
  MODIFY `Id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `Id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `Id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `Id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `planillas`
--
ALTER TABLE `planillas`
  MODIFY `Id_planilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos_sucursal`
--
ALTER TABLE `productos_sucursal`
  MODIFY `Id_productoSu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `Id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `Id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`Id_productoSu`) REFERENCES `productos_sucursal` (`Id_productoSu`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`Id_venta`) REFERENCES `ventas` (`Id_venta`);

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`Id_producto`);

--
-- Filtros para la tabla `planillas`
--
ALTER TABLE `planillas`
  ADD CONSTRAINT `planillas_ibfk_2` FOREIGN KEY (`Id_estado`) REFERENCES `estado_planillas` (`Id_estado`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `categorias` (`Id_categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`Id_talla`) REFERENCES `tallas` (`Id_talla`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`Id_genero`) REFERENCES `generos` (`Id_genero`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`Id_marca`) REFERENCES `marcas` (`Id_marca`);

--
-- Filtros para la tabla `productos_sucursal`
--
ALTER TABLE `productos_sucursal`
  ADD CONSTRAINT `productos_sucursal_ibfk_1` FOREIGN KEY (`Id_sucursal`) REFERENCES `sucursales` (`Id_sucursal`),
  ADD CONSTRAINT `productos_sucursal_ibfk_2` FOREIGN KEY (`Id_lote`) REFERENCES `lotes` (`Id_lote`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `tipo_usuarios` (`Id_tipo_usuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuarios` (`Id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
