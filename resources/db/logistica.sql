-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2017 a las 16:46:19
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `cuit` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `razon` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dom_numero` int(11) DEFAULT NULL,
  `dom_calle` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dom_cp` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dom_piso` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cuit`, `razon`, `dom_numero`, `dom_calle`, `dom_cp`, `dom_piso`, `telefono`) VALUES
(1, '20311111110', 'Julio Garcia', 1212, 'Esmeralda', '1706', 'piso 4', '1163654361'),
(2, '25311111112', 'Julio Rios', 6750, 'Rivadavia', '1706', 'piso 2', '1147436789'),
(3, '10331111114', 'Hugo Perez', 1200, 'Paco', '1708', 'piso 1', '1153964073'),
(4, '21381111121', 'Luis Blanco', 1212, 'Esmeralda', '1706', 'piso 3', '1148755133');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `idMantenimiento` int(11) NOT NULL,
  `idVehiculo` int(11) DEFAULT NULL,
  `idMecanico` int(11) DEFAULT NULL,
  `tipo_vehiculo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date NOT NULL,
  `km_unidad` int(11) DEFAULT NULL,
  `costo` decimal(12,2) DEFAULT NULL,
  `externo` enum('si','no') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `repuestos` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`idMantenimiento`, `idVehiculo`, `idMecanico`, `tipo_vehiculo`, `fecha_entrada`, `fecha_salida`, `km_unidad`, `costo`, `externo`, `repuestos`) VALUES
(1, 1, 9, 'camion', '2017-01-15', '2017-07-15', 2900, '8000.00', 'no', 'Faro Giro, paragolpes'),
(2, 1, 9, 'camion', '2017-08-11', '2017-08-15', 3080, '1000.00', 'no', 'Cubiertas, Electroinyector'),
(3, 4, 11, 'camion', '2017-07-10', '2017-07-15', 18000, '8000.00', 'no', 'Juego Espejos, burro de arranque.'),
(4, 6, 11, 'camion', '2016-04-15', '2016-07-15', 20050, '16000.00', 'si', 'Embrague Ventilador'),
(5, 2, 9, 'acoplado-B', '2016-04-15', '2016-07-16', 24000, '80000.00', 'si', 'Eje Acople, corona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `idPresupuesto` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idSupervisor` int(11) DEFAULT NULL,
  `tiempo_estimado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `km_previstos` int(11) DEFAULT NULL,
  `combustible_previsto` int(11) DEFAULT NULL,
  `costo_real` decimal(12,2) DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL,
  `estado` enum('en curso','finalizado','cancelado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'en curso'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`idPresupuesto`, `idCliente`, `idSupervisor`, `tiempo_estimado`, `km_previstos`, `combustible_previsto`, `costo_real`, `aceptado`, `estado`) VALUES
(1, 1, 3, '6 horas', 435, 40, '5000.00', 1, 'en curso'),
(2, 1, 13, '5 horas', 300, 30, '4000.00', 1, 'finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_mantenimiento`
--

CREATE TABLE `reporte_mantenimiento` (
  `idReporteMantenimiento` int(11) NOT NULL,
  `idMantenimiento` int(11) DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
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
  `idViaje` int(11) DEFAULT NULL,
  `idVehiculo` int(11) DEFAULT NULL,
  `idChofer` int(11) DEFAULT NULL,
  `desvios` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `tiempo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL,
  `paradas` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `latitud` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `longitud` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `tipo_doc` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `num_doc` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rol` enum('chofer','admin','supervisor','mecanico') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'chofer',
  `password` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_licencia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nro_licencia` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipo_doc`, `num_doc`, `nombre`, `fecha_nacimiento`, `rol`, `password`, `tipo_licencia`, `nro_licencia`) VALUES
(1, 'dni', 2, 'Juan Gonzalez', '1991-10-02', 'supervisor', '81dc9bdb52d04dc20036dbd8313ed055', 'c', NULL),
(2, 'dni', 1234, 'Pepe Lopez', '1992-06-06', 'chofer', '81dc9bdb52d04dc20036dbd8313ed055', 'c', NULL),
(3, 'dni', 358087832, 'Paula Ramirez', '1990-10-01', 'supervisor', '84eb13cfed01764d9c401219faa56d53', NULL, NULL),
(9, 'libreta', 26094040, 'Lucas Silva', '1885-10-01', 'mecanico', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL),
(8, 'libreta', 123, 'Martin Diaz', '1995-10-03', 'admin', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(6, 'dni', 44139463, 'Luis Ruiz', '1994-08-01', 'admin', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(7, 'dni', 1, 'Roberto Navarro', '1992-02-01', 'chofer', 'c4ca4238a0b923820dcc509a6f75849b', 'c', NULL),
(10, 'dni', 34609195, 'Alberto López', '2000-07-07', 'chofer', '81dc9bdb52d04dc20036dbd8313ed055', 'c', NULL),
(11, 'dni', 25173964, 'Jorge Gómez', '1980-07-07', 'mecanico', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(13, 'dni', 36707564, 'Marcela Rodríguez ', '1998-02-02', 'supervisor', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(4, 'dni', 4, 'Daniel Solis', '1990-03-02', 'admin', 'a87ff679a2f3e71d9181a67b7542122c', NULL, NULL),
(5, 'dni', 3, 'Javier Beltrán', '1989-07-22', 'mecanico', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `tipo_vehiculo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `patente` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nro_chasis` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nro_motor` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `anio` year(4) DEFAULT NULL
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
  `idChofer` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `idPresupuesto` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `origen` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `destino` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_carga` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL,
  `km_totales` int(11) DEFAULT NULL,
  `latitud` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `longitud` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  ADD KEY `fk_presupuesto_idSupervisor` (`idSupervisor`);

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
  ADD PRIMARY KEY (`idChofer`,`idViaje`,`idVehiculo`),
  ADD KEY `fk_ternaria_viaje` (`idViaje`),
  ADD KEY `fk_ternaria_Vehiculo` (`idVehiculo`);

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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reporte_mantenimiento`
--
ALTER TABLE `reporte_mantenimiento`
  MODIFY `idReporteMantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reporte_viaje`
--
ALTER TABLE `reporte_viaje`
  MODIFY `idReporteViaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
