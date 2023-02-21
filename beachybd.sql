-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2022 a las 02:15:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beachybd`
--
CREATE DATABASE IF NOT EXISTS `beachybd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beachybd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcategorias`
--

CREATE TABLE `catcategorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(40) NOT NULL,
  `descripcionCategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catcategorias`
--

INSERT INTO `catcategorias` (`idCategoria`, `nombreCategoria`, `descripcionCategoria`) VALUES
(1, 'Accesorios', 'Accesorios como gorras, sombreros, etc.'),
(2, 'Camiseta Manga Larga', 'Mangas Largas'),
(3, 'Camiseta Manga Corta', 'Manga Corta'),
(4, 'Camisa Manga Larga', 'Camisa Manga Larga de vestir'),
(5, 'Camisa Manga Corta', 'Camisa Manga Corta de Vestir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcolores`
--

CREATE TABLE `catcolores` (
  `idColor` int(11) NOT NULL,
  `nombreColor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catcolores`
--

INSERT INTO `catcolores` (`idColor`, `nombreColor`) VALUES
(1, 'Rojo'),
(2, 'Navy'),
(3, 'Amarillo'),
(4, 'Verde Menta'),
(5, 'Rosado'),
(6, 'Blanco'),
(7, 'Naranja'),
(8, 'Verde'),
(9, 'Negro'),
(10, 'Celeste'),
(11, 'Gris');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catdepartamentos`
--

CREATE TABLE `catdepartamentos` (
  `idDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(100) NOT NULL,
  `precioEnvio` decimal(8,2) NOT NULL,
  `diasEntrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catdepartamentos`
--

INSERT INTO `catdepartamentos` (`idDepartamento`, `nombreDepartamento`, `precioEnvio`, `diasEntrega`) VALUES
(1, 'Rivas', '5.00', 2),
(2, 'Masaya', '3.00', 1),
(3, 'Granada', '0.00', 1),
(4, 'Carazo', '3.50', 1),
(5, 'Boaco', '10000.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombrecat` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catmetodospago`
--

CREATE TABLE `catmetodospago` (
  `idMetodoPago` int(11) NOT NULL,
  `nombreMetodoPago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catmetodospago`
--

INSERT INTO `catmetodospago` (`idMetodoPago`, `nombreMetodoPago`) VALUES
(1, 'Tarjeta Bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattallas`
--

CREATE TABLE `cattallas` (
  `idTalla` int(11) NOT NULL,
  `nombreTalla` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cattallas`
--

INSERT INTO `cattallas` (`idTalla`, `nombreTalla`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '18'),
(8, 'ONE SIZE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattela`
--

CREATE TABLE `cattela` (
  `idTela` int(11) NOT NULL,
  `nombreTela` varchar(40) NOT NULL,
  `descripcionTela` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cattela`
--

INSERT INTO `cattela` (`idTela`, `nombreTela`, `descripcionTela`) VALUES
(1, 'Standart Cotton', '100% algodon'),
(2, 'Performance', 'Tela performance Poliester Secado Rapido para playa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompras`
--

CREATE TABLE `tblcompras` (
  `idCompra` int(11) NOT NULL,
  `empleadoCompra` int(11) NOT NULL,
  `fechaCompra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `costosEntrega` decimal(8,2) DEFAULT NULL,
  `notaCompra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcompras`
--

INSERT INTO `tblcompras` (`idCompra`, `empleadoCompra`, `fechaCompra`, `costosEntrega`, `notaCompra`) VALUES
(3, 1, '2022-06-30 05:26:46', '1.00', 'Gorras compradas'),
(4, 1, '2022-06-30 05:28:30', '1.00', 'Compre denuevo'),
(5, 1, '2022-06-30 05:55:59', '2.00', 'Se compro por encargo'),
(6, 1, '2022-07-01 03:46:33', '2.00', 'Compre porque tengo reales'),
(7, 1, '2022-07-01 17:22:22', '1.00', 'Se compro'),
(8, 1, '2022-07-02 15:35:36', '2.00', 'Bought'),
(9, 1, '2022-07-02 15:37:15', '2.00', 'Encargo'),
(10, 1, '2022-07-02 15:38:14', '1.60', 'bpught'),
(11, 1, '2022-07-02 15:41:42', '1.00', 'Encargo'),
(12, 1, '2022-07-02 15:57:22', '1.00', 'Encargo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetcompras`
--

CREATE TABLE `tbldetcompras` (
  `idDetCompra` int(11) NOT NULL,
  `compra` int(11) NOT NULL,
  `detalleProducto` int(11) NOT NULL,
  `cantidadComprada` int(11) NOT NULL,
  `costoUnitario` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbldetcompras`
--

INSERT INTO `tbldetcompras` (`idDetCompra`, `compra`, `detalleProducto`, `cantidadComprada`, `costoUnitario`) VALUES
(2, 3, 4, 2, '20.00'),
(3, 4, 4, 1, '20.00'),
(4, 5, 5, 3, '22.00'),
(5, 6, 7, 5, '25.00'),
(6, 7, 8, 6, '30.00'),
(7, 8, 9, 4, '20.00'),
(8, 9, 10, 5, '20.00'),
(9, 10, 11, 2, '17.00'),
(10, 11, 12, 2, '20.00'),
(11, 12, 5, 4, '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetproducto`
--

CREATE TABLE `tbldetproducto` (
  `idDetProducto` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `tallaProducto` int(11) NOT NULL,
  `cantidadDisponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbldetproducto`
--

INSERT INTO `tbldetproducto` (`idDetProducto`, `producto`, `tallaProducto`, `cantidadDisponible`) VALUES
(1, 1, 2, 0),
(4, 2, 8, 3),
(5, 1, 3, 7),
(6, 1, 5, 1),
(7, 3, 1, 5),
(8, 1, 6, 6),
(9, 6, 3, 4),
(10, 5, 2, 5),
(11, 4, 2, 2),
(12, 7, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetventas`
--

CREATE TABLE `tbldetventas` (
  `idDetVenta` int(11) NOT NULL,
  `venta` int(11) NOT NULL,
  `detalleProducto` int(11) NOT NULL,
  `cantidadVendida` int(11) NOT NULL,
  `precioUnitario` decimal(8,2) NOT NULL,
  `rebajaUnitaria` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldireccionesusuario`
--

CREATE TABLE `tbldireccionesusuario` (
  `idDireccion` int(11) NOT NULL,
  `usuarioDireccion` int(11) NOT NULL,
  `direccionUsuario` varchar(255) NOT NULL,
  `departamentoDireccion` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleados`
--

CREATE TABLE `tblempleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombresEmpleado` varchar(100) NOT NULL,
  `apellidosEmpleado` varchar(100) NOT NULL,
  `emailEmpleado` varchar(100) NOT NULL,
  `contraEmpleado` varchar(255) NOT NULL,
  `fechaRegistroEmpleado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblempleados`
--

INSERT INTO `tblempleados` (`idEmpleado`, `nombresEmpleado`, `apellidosEmpleado`, `emailEmpleado`, `contraEmpleado`, `fechaRegistroEmpleado`) VALUES
(1, 'Enrique', 'Muñoz', 'admin@gmail.com', 'dVN5NXVGcXRtUTZHNDhXWGRlR21aZz09', '2022-06-25 22:40:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpagostarjeta`
--

CREATE TABLE `tblpagostarjeta` (
  `idPagoTarjeta` int(11) NOT NULL,
  `numeroTarjeta` varchar(20) NOT NULL,
  `nombreTarjeta` varchar(40) NOT NULL,
  `fechaExpiracion` varchar(4) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `ventaPagoTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE `tblproducto` (
  `idProducto` int(11) NOT NULL,
  `categoriaProducto` int(11) NOT NULL,
  `colorProducto` int(11) NOT NULL,
  `telaProducto` int(11) NOT NULL,
  `descripcionProducto` varchar(255) NOT NULL,
  `precioProducto` decimal(8,2) NOT NULL,
  `codigoEstilo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`idProducto`, `categoriaProducto`, `colorProducto`, `telaProducto`, `descripcionProducto`, `precioProducto`, `codigoEstilo`) VALUES
(1, 2, 6, 1, 'Vineyard Vines OG', '45.00', 'CamBlaStaVin1'),
(2, 1, 1, 1, 'Vineyard Vines Gorra trucker', '35.00', 'AccRojStaVin2'),
(3, 3, 5, 1, 'Vineyard Vines camiseta rosada', '40.00', 'CamRosStaVin3'),
(4, 2, 6, 1, 'Vineyard Vines White Palms', '45.00', 'CamBlaStaVin4'),
(5, 2, 4, 1, 'Vineyard Vines Light Green Tshirt', '45.00', 'CamVerStaVin5'),
(6, 3, 10, 1, 'Brooks Brothers TShirt Light Blue', '40.00', 'CamCelStaBro6'),
(7, 3, 1, 1, 'Brooks brother tshirt', '40.00', 'CamRojStaBro7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreceptorpaquete`
--

CREATE TABLE `tblreceptorpaquete` (
  `idReceptor` int(11) NOT NULL,
  `nombreReceptor` varchar(150) NOT NULL,
  `emailReceptor` varchar(100) DEFAULT NULL,
  `telefonoReceptor` varchar(100) DEFAULT NULL,
  `ventaReceptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `contra` varchar(255) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`idUsuario`, `nombres`, `apellidos`, `email`, `telefono`, `contra`, `fechaRegistro`) VALUES
(1, 'marc', 'amdkdjf', 'marc@gmail.com', '89774422', '1111111', '2022-06-30 18:19:14'),
(5, 'Enrique', 'Falc', 'falc@gmail.com', '78765123', 'dVN5NXVGcXRtUTZHNDhXWGRlR21aZz09', '2022-06-30 20:09:51'),
(6, 'Dwight', 'Genderson', 'gerson@gmail.com', '89887754', 'dVN5NXVGcXRtUTZHNDhXWGRlR21aZz09', '2022-07-01 17:19:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `idVenta` int(11) NOT NULL,
  `usuarioVenta` int(11) DEFAULT NULL,
  `direccionVenta` varchar(255) NOT NULL,
  `departamentoVenta` int(11) NOT NULL,
  `metodoPago` int(11) NOT NULL,
  `rebajaTotal` decimal(8,2) DEFAULT NULL,
  `fechaVenta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventasinusuario`
--

CREATE TABLE `tblventasinusuario` (
  `idVentaSU` int(11) NOT NULL,
  `nombresVSU` varchar(100) NOT NULL,
  `apellidosVSU` varchar(100) NOT NULL,
  `emailVSU` varchar(100) NOT NULL,
  `telefonoVSU` varchar(100) DEFAULT NULL,
  `ventaVSU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catcategorias`
--
ALTER TABLE `catcategorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `catcolores`
--
ALTER TABLE `catcolores`
  ADD PRIMARY KEY (`idColor`);

--
-- Indices de la tabla `catdepartamentos`
--
ALTER TABLE `catdepartamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `catmetodospago`
--
ALTER TABLE `catmetodospago`
  ADD PRIMARY KEY (`idMetodoPago`);

--
-- Indices de la tabla `cattallas`
--
ALTER TABLE `cattallas`
  ADD PRIMARY KEY (`idTalla`);

--
-- Indices de la tabla `cattela`
--
ALTER TABLE `cattela`
  ADD PRIMARY KEY (`idTela`);

--
-- Indices de la tabla `tblcompras`
--
ALTER TABLE `tblcompras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `empleadoCompra` (`empleadoCompra`);

--
-- Indices de la tabla `tbldetcompras`
--
ALTER TABLE `tbldetcompras`
  ADD PRIMARY KEY (`idDetCompra`),
  ADD KEY `compra` (`compra`),
  ADD KEY `detalleProducto` (`detalleProducto`);

--
-- Indices de la tabla `tbldetproducto`
--
ALTER TABLE `tbldetproducto`
  ADD PRIMARY KEY (`idDetProducto`),
  ADD KEY `producto` (`producto`),
  ADD KEY `tallaProducto` (`tallaProducto`);

--
-- Indices de la tabla `tbldetventas`
--
ALTER TABLE `tbldetventas`
  ADD PRIMARY KEY (`idDetVenta`),
  ADD KEY `venta` (`venta`),
  ADD KEY `detalleProducto` (`detalleProducto`);

--
-- Indices de la tabla `tbldireccionesusuario`
--
ALTER TABLE `tbldireccionesusuario`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `usuarioDireccion` (`usuarioDireccion`),
  ADD KEY `departamentoDireccion` (`departamentoDireccion`);

--
-- Indices de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD UNIQUE KEY `emailEmpleado` (`emailEmpleado`);

--
-- Indices de la tabla `tblpagostarjeta`
--
ALTER TABLE `tblpagostarjeta`
  ADD PRIMARY KEY (`idPagoTarjeta`),
  ADD KEY `ventaPagoTarjeta` (`ventaPagoTarjeta`);

--
-- Indices de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `categoriaProducto` (`categoriaProducto`),
  ADD KEY `colorProducto` (`colorProducto`),
  ADD KEY `telaProducto` (`telaProducto`);

--
-- Indices de la tabla `tblreceptorpaquete`
--
ALTER TABLE `tblreceptorpaquete`
  ADD PRIMARY KEY (`idReceptor`),
  ADD KEY `ventaReceptor` (`ventaReceptor`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `usuarioVenta` (`usuarioVenta`),
  ADD KEY `departamentoVenta` (`departamentoVenta`),
  ADD KEY `metodoPago` (`metodoPago`);

--
-- Indices de la tabla `tblventasinusuario`
--
ALTER TABLE `tblventasinusuario`
  ADD PRIMARY KEY (`idVentaSU`),
  ADD KEY `ventaVSU` (`ventaVSU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catcategorias`
--
ALTER TABLE `catcategorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `catcolores`
--
ALTER TABLE `catcolores`
  MODIFY `idColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `catdepartamentos`
--
ALTER TABLE `catdepartamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catmetodospago`
--
ALTER TABLE `catmetodospago`
  MODIFY `idMetodoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cattallas`
--
ALTER TABLE `cattallas`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cattela`
--
ALTER TABLE `cattela`
  MODIFY `idTela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblcompras`
--
ALTER TABLE `tblcompras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbldetcompras`
--
ALTER TABLE `tbldetcompras`
  MODIFY `idDetCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbldetproducto`
--
ALTER TABLE `tbldetproducto`
  MODIFY `idDetProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbldetventas`
--
ALTER TABLE `tbldetventas`
  MODIFY `idDetVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldireccionesusuario`
--
ALTER TABLE `tbldireccionesusuario`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblpagostarjeta`
--
ALTER TABLE `tblpagostarjeta`
  MODIFY `idPagoTarjeta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblreceptorpaquete`
--
ALTER TABLE `tblreceptorpaquete`
  MODIFY `idReceptor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblventasinusuario`
--
ALTER TABLE `tblventasinusuario`
  MODIFY `idVentaSU` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblcompras`
--
ALTER TABLE `tblcompras`
  ADD CONSTRAINT `tblcompras_ibfk_1` FOREIGN KEY (`empleadoCompra`) REFERENCES `tblempleados` (`idEmpleado`);

--
-- Filtros para la tabla `tbldetcompras`
--
ALTER TABLE `tbldetcompras`
  ADD CONSTRAINT `tbldetcompras_ibfk_1` FOREIGN KEY (`compra`) REFERENCES `tblcompras` (`idCompra`),
  ADD CONSTRAINT `tbldetcompras_ibfk_2` FOREIGN KEY (`detalleProducto`) REFERENCES `tbldetproducto` (`idDetProducto`);

--
-- Filtros para la tabla `tbldetproducto`
--
ALTER TABLE `tbldetproducto`
  ADD CONSTRAINT `tbldetproducto_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `tblproducto` (`idProducto`),
  ADD CONSTRAINT `tbldetproducto_ibfk_2` FOREIGN KEY (`tallaProducto`) REFERENCES `cattallas` (`idTalla`);

--
-- Filtros para la tabla `tbldetventas`
--
ALTER TABLE `tbldetventas`
  ADD CONSTRAINT `tbldetventas_ibfk_1` FOREIGN KEY (`venta`) REFERENCES `tblventas` (`idVenta`),
  ADD CONSTRAINT `tbldetventas_ibfk_2` FOREIGN KEY (`detalleProducto`) REFERENCES `tbldetproducto` (`idDetProducto`);

--
-- Filtros para la tabla `tbldireccionesusuario`
--
ALTER TABLE `tbldireccionesusuario`
  ADD CONSTRAINT `tbldireccionesusuario_ibfk_1` FOREIGN KEY (`usuarioDireccion`) REFERENCES `tblusuarios` (`idUsuario`),
  ADD CONSTRAINT `tbldireccionesusuario_ibfk_2` FOREIGN KEY (`departamentoDireccion`) REFERENCES `catdepartamentos` (`idDepartamento`);

--
-- Filtros para la tabla `tblpagostarjeta`
--
ALTER TABLE `tblpagostarjeta`
  ADD CONSTRAINT `tblpagostarjeta_ibfk_1` FOREIGN KEY (`ventaPagoTarjeta`) REFERENCES `tblventas` (`idVenta`);

--
-- Filtros para la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD CONSTRAINT `tblproducto_ibfk_1` FOREIGN KEY (`categoriaProducto`) REFERENCES `catcategorias` (`idCategoria`),
  ADD CONSTRAINT `tblproducto_ibfk_2` FOREIGN KEY (`colorProducto`) REFERENCES `catcolores` (`idColor`),
  ADD CONSTRAINT `tblproducto_ibfk_3` FOREIGN KEY (`telaProducto`) REFERENCES `cattela` (`idTela`);

--
-- Filtros para la tabla `tblreceptorpaquete`
--
ALTER TABLE `tblreceptorpaquete`
  ADD CONSTRAINT `tblreceptorpaquete_ibfk_1` FOREIGN KEY (`ventaReceptor`) REFERENCES `tblventas` (`idVenta`);

--
-- Filtros para la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD CONSTRAINT `tblventas_ibfk_1` FOREIGN KEY (`usuarioVenta`) REFERENCES `tblusuarios` (`idUsuario`),
  ADD CONSTRAINT `tblventas_ibfk_2` FOREIGN KEY (`departamentoVenta`) REFERENCES `catdepartamentos` (`idDepartamento`),
  ADD CONSTRAINT `tblventas_ibfk_3` FOREIGN KEY (`metodoPago`) REFERENCES `tblusuarios` (`idUsuario`);

--
-- Filtros para la tabla `tblventasinusuario`
--
ALTER TABLE `tblventasinusuario`
  ADD CONSTRAINT `tblventasinusuario_ibfk_1` FOREIGN KEY (`ventaVSU`) REFERENCES `tblventas` (`idVenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
