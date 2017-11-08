-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2017 a las 00:50:10
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `razon` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `dom_numero` int(11) NOT NULL,
  `dom_calle` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `dom_cp` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `dom_piso` int(11) NOT NULL DEFAULT '0',
  `telefono` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cuit`, `razon`, `dom_numero`, `dom_calle`, `dom_cp`, `dom_piso`, `telefono`) VALUES
(1, 2147483647, 'Julio Garcia', 1212, 'Esmeralda', '1706', 0, '1163654361'),
(2, 2147483647, 'Julio Rios', 6750, 'Rivadavia', '1706', 0, '1147436789'),
(3, 2147483647, 'Hugo Perez', 1200, 'Paco', '1708', 0, '1153964073'),
(4, 2147483647, 'Luis Blanco', 1212, 'Esmeralda', '1706', 0, '1148755133');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `idMantenimiento` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idMecanico` int(11) NOT NULL,
  `tipo_vehiculo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `km_unidad` int(11) NOT NULL,
  `costo` decimal(12,2) DEFAULT NULL,
  `externo` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `cambio_aceite` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `filtro_aire` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `direccion` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `repuestos` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`idMantenimiento`, `idVehiculo`, `idMecanico`, `tipo_vehiculo`, `fecha_entrada`, `fecha_salida`, `km_unidad`, `costo`, `externo`, `cambio_aceite`, `filtro_aire`, `direccion`, `repuestos`) VALUES
(1, 1, 9, 'camion', '2017-01-15', '2017-07-15', 3080, '8000.00', 'no', 'si', 'si', 'no', 'Faro Giro, paragolpes'),
(2, 1, 9, 'camion', '2017-08-11', '2017-08-15', 3080, '1000.00', 'no', 'si', 'si', 'no', 'Cubiertas, Electroinyector'),
(3, 4, 11, 'camion', '2017-07-10', '2017-07-15', 18000, '8000.00', 'no', 'no', 'no', 'no', 'Juego Espejos, burro de arranque.'),
(4, 6, 11, 'camion', '2016-04-15', '2016-07-15', 20050, '16000.00', 'si', 'si', 'no', 'no', 'Embrague Ventilador'),
(5, 2, 9, 'acoplado-B', '2016-04-15', '2016-07-16', 24000, '80000.00', 'si', 'no', 'no', 'no', 'Eje Acople, corona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `idPresupuesto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `tiempo_estimado` time NOT NULL,
  `km_previstos` int(11) NOT NULL,
  `combustible_previsto` int(11) NOT NULL,
  `costo_real` decimal(12,2) NOT NULL,
  `aceptado` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `estado` enum('en curso','finalizado','cancelado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'en curso'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`idPresupuesto`, `idCliente`, `idUsuario`, `idViaje`, `tiempo_estimado`, `km_previstos`, `combustible_previsto`, `costo_real`, `aceptado`, `estado`) VALUES
(1, 1, 3, 1, '02:00:00', 435, 40, '5000.00', 'si', 'en curso'),
(2, 2, 1, 3, '05:00:00', 300, 30, '1000.00', 'si', 'finalizado'),
(5, 4, 1, 3, '01:00:00', 22, 2, '2000.00', 'si', 'en curso'),
(3, 2, 2, 4, '04:00:00', 80, 8, '5000.00', 'si', 'en curso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_mantenimiento`
--

CREATE TABLE `reporte_mantenimiento` (
  `idReporteMantenimiento` int(11) NOT NULL,
  `idMantenimiento` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `km_recorridos` int(11) DEFAULT NULL,
  `costo_mantenimiento` decimal(10,2) DEFAULT NULL,
  `costo_km_recorrido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_viaje`
--

CREATE TABLE `reporte_viaje` (
  `idReporteViaje` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idChofer` int(11) NOT NULL,
  `desvios` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `tiempo` time NOT NULL,
  `combustible` int(11) DEFAULT NULL,
  `paradas` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `latitud` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `longitud` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `tipo_doc` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `num_doc` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `rol` enum('chofer','admin','supervisor','mecanico') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'chofer',
  `password` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_licencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nro_licencia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipo_doc`, `num_doc`, `nombre`, `fecha_nacimiento`, `rol`, `password`, `tipo_licencia`, `nro_licencia`) VALUES
(1, 'dni', 2, 'Juan Gonzalez', '1991-10-02', 'supervisor', '81dc9bdb52d04dc20036dbd8313ed055', 'c', 0),
(2, 'dni', 1234, 'Pepe Lopez', '1992-06-06', 'chofer', '81dc9bdb52d04dc20036dbd8313ed055', 'c', 0),
(3, 'dni', 358087832, 'Paula Ramirez', '1990-10-01', 'supervisor', '84eb13cfed01764d9c401219faa56d53', '', 0),
(9, 'libreta', 26094040, 'Lucas Silva', '1885-10-01', 'mecanico', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(8, 'libreta', 123, 'Martin Diaz', '1995-10-03', 'admin', '202cb962ac59075b964b07152d234b70', '', 0),
(6, 'dni', 44139463, 'Luis Ruiz', '1994-08-01', 'admin', '202cb962ac59075b964b07152d234b70', '', 0),
(7, 'dni', 1, 'Roberto Navarro', '1992-02-01', 'chofer', 'c4ca4238a0b923820dcc509a6f75849b', 'c', 0),
(10, 'dni', 34609195, 'Alberto López', '2000-07-07', 'chofer', '81dc9bdb52d04dc20036dbd8313ed055', 'c', 0),
(11, 'dni', 25173964, 'Jorge Gómez', '1980-07-07', 'mecanico', '81dc9bdb52d04dc20036dbd8313ed055', '', 0),
(13, 'dni', 36707564, 'Marcela Rodríguez ', '1998-02-02', 'supervisor', '81dc9bdb52d04dc20036dbd8313ed055', '', 0),
(4, 'dni', 4, 'Daniel Solis', '1990-03-02', 'admin', 'a87ff679a2f3e71d9181a67b7542122c', '', 0),
(5, 'dni', 3, 'Javier Beltrán', '1989-07-22', 'mecanico', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `tipo_vehiculo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `patente` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nro_chasis` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nro_motor` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `anio` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idVehiculo`, `tipo_vehiculo`, `patente`, `nro_chasis`, `marca`, `modelo`, `nro_motor`, `km`, `anio`) VALUES
(1, 'camion', 'M123xxA', '81dc9bdb52d04dc', 'Scania', '1634', '113545', 2900, 2012),
(2, 'acoplado', 'ABM372', '81dcM372', 'Astivia', '1634', '113545', 24000, 2015),
(4, 'camion', 'AB372CD', '1HD1BRY195Y0808', 'Mercedes-Benz', '1710', '213545', 45000, 2000),
(5, 'acoplado', 'LAB0372', '21BRz195Y0808', 'NORTRUCKS', '2508', '333545', 4000, 2017),
(6, 'camion', 'A372BCD', '8AD3CN6AP4G0032', 'Iveco', 'Daily', '153545', 20050, 2016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_chofer_viaje`
--

CREATE TABLE `vehiculo_chofer_viaje` (
  `idViaje` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idUsuario2` int(11) DEFAULT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idVehiculo2` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo_chofer_viaje`
--

INSERT INTO `vehiculo_chofer_viaje` (`idViaje`, `idUsuario`, `idUsuario2`, `idVehiculo`, `idVehiculo2`) VALUES
(2, 2, 7, 2, 5),
(3, 7, 0, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `idPresupuesto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `origen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `destino` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_carga` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tiempo` time NOT NULL,
  `combustible` int(11) DEFAULT NULL,
  `km_totales` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idViaje`, `idPresupuesto`, `idCliente`, `fecha`, `origen`, `destino`, `tipo_carga`, `tiempo`, `combustible`, `km_totales`) VALUES
(1, 1, 1, '2017-11-22 10:00:00', 'Logistica S.A.', 'Lujan Bs As', 'Sustancias y objetos peligrosos varios', '02:00:02', 2, 120),
(2, 2, 1, '2017-10-24 09:00:00', 'Logistica S.A.', 'Cordoba', 'Material radiactivo', '07:00:07', 52, 740),
(3, 5, 2, '2017-10-27 10:00:00', 'Logistica S.A.', 'José de Urquiza 4537', 'refrigerados y congelados', '01:02:01', 2, 22),
(4, 3, 2, '2017-11-07 00:00:00', 'Logistica S.A.', 'Av. Vergara 6060, Hurlingham', 'frutas', '04:00:00', 8, 80);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`idMantenimiento`),
  ADD KEY `fk_mantenimiento_idVehiculo` (`idVehiculo`),
  ADD KEY `fk_mantenimiento_mecanico` (`idMecanico`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`idPresupuesto`),
  ADD KEY `fk_presupuesto_idCliente` (`idCliente`),
  ADD KEY `fk_presupuesto_idViaje` (`idViaje`),
  ADD KEY `fk_presupuesto_idUsuario` (`idUsuario`);

--
-- Indices de la tabla `reporte_mantenimiento`
--
ALTER TABLE `reporte_mantenimiento`
  ADD PRIMARY KEY (`idReporteMantenimiento`),
  ADD KEY `fk_reporte_mante_idMantenimiento` (`idMantenimiento`);

--
-- Indices de la tabla `reporte_viaje`
--
ALTER TABLE `reporte_viaje`
  ADD PRIMARY KEY (`idReporteViaje`),
  ADD KEY `fk_report_viaje_ternaria_idViaje` (`idViaje`),
  ADD KEY `fk_report_viaje_ternaria_idVehiculo` (`idVehiculo`),
  ADD KEY `fk_report_viaje_ternaria_idChofer` (`idChofer`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `patente` (`patente`);

--
-- Indices de la tabla `vehiculo_chofer_viaje`
--
ALTER TABLE `vehiculo_chofer_viaje`
  ADD PRIMARY KEY (`idViaje`) USING BTREE;

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idViaje`),
  ADD KEY `fk_viaje_idPresupuesto` (`idPresupuesto`),
  ADD KEY `fk_viaje_cliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `reporte_mantenimiento`
--
ALTER TABLE `reporte_mantenimiento`
  MODIFY `idReporteMantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reporte_viaje`
--
ALTER TABLE `reporte_viaje`
  MODIFY `idReporteViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
