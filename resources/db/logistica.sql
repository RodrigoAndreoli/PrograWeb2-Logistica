-- Funciones
DROP DATABASE IF EXISTS logistica;
CREATE DATABASE IF NOT EXISTS logistica;
USE logistica;

-- Tablas
CREATE TABLE Cliente(
	idCliente int(11) NOT NULL AUTO_INCREMENT,
    cuit int(11) NOT NULL,
    razon varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    telefono varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    dom_cp int(11) NOT NULL,
    dom_calle varchar(45) COLLATE utf8_spanish_ci NOT NULL, 
    dom_numero int(11) NOT NULL,
    dom_piso int(11) NOT NULL,
    PRIMARY KEY (idCliente)
);

CREATE TABLE Usuario(
	idUsuario int(11) NOT NULL AUTO_INCREMENT,
    num_doc int(11) NOT NULL,
    pass varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    rol enum('Supervisor', 'Administrador', 'Chofer', 'Mecanico') NOT NULL DEFAULT 'Supervisor',
    nombre varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    fecha_nacimiento date NOT NULL,
    tipo_licencia varchar(45) COLLATE utf8_spanish_ci,
    PRIMARY KEY (idUsuario)
);

CREATE TABLE Vehiculo(
	idVehiculo int(11) NOT NULL AUTO_INCREMENT,
    tipo_vehiculo enum('Camion', 'Acoplado') NOT NULL DEFAULT 'Camion',
    patente varchar(45) COLLATE utf8_spanish_ci NOT NULL,
	marca varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    modelo varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    anio year(4) NOT NULL,
    nro_chasis varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    nro_motor int(11),
    km int(11) NOT NULL,
    PRIMARY KEY (idVehiculo)
);

CREATE TABLE Mantenimiento(
	idMantenimiento int(11) NOT NULL AUTO_INCREMENT,
    fkVehiculoM int(11) NOT NULL,
    fkMecanicoM int(11) NOT NULL,
    fecha_entrada date NOT NULL,
    fecha_salida date NOT NULL,
    costo decimal(11,2) NOT NULL,
    externo enum('Si', 'No') NOT NULL DEFAULT 'No',
    cambio_aceite enum('Si', 'No') NOT NULL DEFAULT 'No',
    filtro_aire enum('Si', 'No') NOT NULL DEFAULT 'No',
    direccion enum('Si', 'No') NOT NULL DEFAULT 'No',
    repuestos varchar(90) COLLATE utf8_spanish_ci NOT NULL,
    PRIMARY KEY (idMantenimiento),
    CONSTRAINT fk_vehm FOREIGN KEY (fkVehiculoM)
		REFERENCES Vehiculo (idVehiculo),
	CONSTRAINT fk_mecm FOREIGN KEY (fkMecanicoM)
		REFERENCES Usuario (idUsuario)
);

CREATE TABLE Presupuesto(
	idPresupuesto int(11) NOT NULL AUTO_INCREMENT,
    fkClienteP int(11) NOT NULL,
    fkAdministradorP int(11) NOT NULL,
    tiempo_estimado time NOT NULL,
    km_estimado int(11) NOT NULL,
    combustible_estimado decimal(11,2) NOT NULL,
    costo_real decimal(11,2) NOT NULL,
    aceptado enum('Si', 'No') NOT NULL DEFAULT 'No',
    PRIMARY KEY (idPresupuesto),
    CONSTRAINT fk_clip FOREIGN KEY (fkClienteP)
		REFERENCES Cliente (idCliente),
	CONSTRAINT fk_admp FOREIGN KEY (fkAdministradorP)
		REFERENCES Usuario (idUsuario)
);

CREATE TABLE Viaje(
	idViaje int(11) NOT NULL AUTO_INCREMENT,
    fkPresupuestoV int(11) NOT NULL,
    fecha datetime NOT NULL,
    origen varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    destino varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    tipo_carga varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    tiempo_total time,
    combustible_total decimal(11,2),
    km_total int(11),
    PRIMARY KEY (idViaje),
    CONSTRAINT fk_prev FOREIGN KEY (fkPresupuestoV)
		REFERENCES Presupuesto (idPresupuesto)
);

CREATE TABLE Vehiculo_chofer_viaje(
	fkViajeT int(11) NOT NULL,
    fkChoferT int(11) NOT NULL,
    fkAcompanianteT int(11),
    fkCamionT int(11) NOT NULL,
    fkAcopladoT int(11),
    PRIMARY KEY (fkViajeT),
    CONSTRAINT fk_viat FOREIGN KEY (fkViajeT)
		REFERENCES Viaje (idViaje),
	CONSTRAINT fk_chot FOREIGN KEY (fkChoferT)
		REFERENCES Usuario (idUsuario),
	CONSTRAINT fk_acomt FOREIGN KEY (fkAcompanianteT)
		REFERENCES Usuario (idUsuario),
	CONSTRAINT fk_camt FOREIGN KEY (fkCamionT)
		REFERENCES Vehiculo (idVehiculo),
	CONSTRAINT fk_acopt FOREIGN KEY (fkAcopladoT)
		REFERENCES Vehiculo (idVehiculo)
); 

CREATE TABLE Reporte(
	idReporte int(11) NOT NULL AUTO_INCREMENT,
    fkViajeR int(11) NOT NULL,
    fkChoferR int(11) NOT NULL,
    tiempo datetime NOT NULL,
    latitud varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    longitud varchar(45) COLLATE utf8_spanish_ci NOT NULL,
    motivo enum('Parada Tecnica', 'Desvio', 'Accidente') NOT NULL DEFAULT 'Parada Tecnica',
    km int(11) NOT NULL,
    combustible decimal(11,2),
    descripcion varchar(90) COLLATE utf8_spanish_ci NOT NULL,
    PRIMARY KEY (idReporte),
    CONSTRAINT fk_viar FOREIGN KEY (fkViajeR)
		REFERENCES Viaje (idViaje),
	CONSTRAINT fk_chor FOREIGN KEY (fkChoferR)
		REFERENCES Usuario (idUsuario)
);

-- Inserts
INSERT INTO Cliente (cuit, razon, telefono, dom_cp, dom_calle, dom_numero, dom_piso) VALUES
(20712944235, 'Julio García', '46237709', 1714, 'Esmeralda', 1212, 0),
(20337174709, 'Julián Ríos', '46236006', 1712, 'Rivadavia', 6750, 5),
(20558172314, 'Hugo Perez', '46231445', 1804, 'Martin Fierro', 1200, 0),
(27549804571, 'Mariela Franco', '46235700', 7160, 'Avellaneda', 1589, 1),
(27893492482, 'Mirna Miranda', '46231243', 8150, 'Francia', 7980, 3),
(30855702826, 'Chocolates San Alberto', '46233431', 6230, 'Rusia', 4776, 0);

INSERT INTO Usuario (num_doc, pass, rol, nombre, fecha_nacimiento, tipo_licencia) VALUES
(1,'c4ca4238a0b923820dcc509a6f75849b', 'Chofer', 'Roberto Navarro', '1992-02-01', 'E1'),
(2, '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', 'Juan Gonzalez', '1991-10-02', NULL),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Mecanico', 'Javier Beltrán', '1989-07-22', NULL),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Administrador', 'Daniel Solis', '1990-03-02', NULL),
(5, '81dc9bdb52d04dc20036dbd8313ed055', 'Chofer', 'Mauricio Choñol', '1986-02-08', 'E1'),
(1234, '81dc9bdb52d04dc20036dbd8313ed055', 'Chofer', 'Pepe Lopez', '1992-06-06', 'E1'),
(358087832, '84eb13cfed01764d9c401219faa56d53', 'Supervisor', 'Paula Ramirez', '1990-10-01', NULL),
(26094040, 'c4ca4238a0b923820dcc509a6f75849b', 'Mecanico', 'Lucas Silva', '1885-10-01', NULL),
(123, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Martin Diaz', '1995-10-03', NULL),
(44139463, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Luis Ruiz', '1994-08-01', NULL),
(34609195, '81dc9bdb52d04dc20036dbd8313ed055', 'Chofer', 'Alberto López', '2000-07-07', 'E1'),
(25173964, '81dc9bdb52d04dc20036dbd8313ed055', 'Mecanico', 'Jorge Gómez', '1980-07-07', NULL),
(36707564, '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', 'Marcela Rodríguez ', '1998-02-02', NULL);

INSERT INTO Vehiculo (tipo_vehiculo, patente, marca, modelo, anio, nro_chasis, nro_motor, km) VALUES
('Camion', 'MXX123', 'Scania', '1634', 2012, '81dc9bdb52d04dc', 670062, 79851),
('Acoplado', 'ABM372', 'Astivia', 'Roller', 2015, '81dcM372', NULL, 20272),
('Camion', 'LAB372', 'Mercedes-Benz', '1710', 2000, '1HD1BRY195Y0808', 268268, 98788),
('Acoplado', 'AB372CD', 'Nortrucks', '2508', 2017, '21BRz195Y0808', NULL, 6977),
('Camion', 'BA273DC', 'Iveco', 'Daily', 2017, '8AD3CN6AP4G0032', 378478, 900),
('Camion', 'AR747AK', 'Iveco', 'Daily', 2016, '8AD3CN6AP4G0032', 578596, 7892);

INSERT INTO Mantenimiento (fkVehiculoM, fkMecanicoM, fecha_entrada, fecha_salida, costo, externo, cambio_aceite, filtro_aire, direccion, repuestos) VALUES
(1, 3, '2017-01-15', '2017-06-15', '80000.00', 'No', 'Si', 'Si', 'Si', 'Faro de Giro, paragolpes, amortiguador'),
(1, 3, '2017-08-11', '2017-08-15', '1000.00', 'No', 'Si', 'Si', 'no', 'Cubiertas, electroinyector'),
(4, 8, '2017-07-10', '2017-07-15', '8000.00', 'Si', 'No', 'No', 'No', 'Juego de Espejos, burro de arranque.'),
(6, 8, '2016-04-15', '2016-07-15', '16000.00', 'Si', 'Si', 'No', 'No', 'Embrague ventilador'),
(2, 12, '2016-04-15', '2016-07-16', '80000.00', 'No', 'No', 'No', 'No', 'Eje Acople, corona');

INSERT INTO Presupuesto (fkClienteP, fkAdministradorP, tiempo_estimado, km_estimado, combustible_estimado, costo_real, aceptado) VALUES
(1, 3, '02:00:00', 135, 230.00, '1300.00', 'Si'),
(2, 1, '05:00:00', 435, 900.00, '2700.00', 'Si'),
(6, 1, '23:00:00', 1600, 2700.00, '4000.00', 'Si'),
(6, 1, '23:00:00', 1600, 2700.00, '4000.00', 'Si'),
(6, 1, '23:00:00', 1600, 2700.00, '4000.00', 'Si'),
(3, 1, '06:00:00', 560, 400.00, '1000.00', 'Si'),
(4, 1, '06:00:00', 560, 400.00, '1000.00', 'Si'),
(5, 1, '00:30:00', 82, 20.00, '500.00', 'No'),
(2, 2, '44:00:00', 2900, 5000.00, '6900.00', 'Si');

INSERT INTO Viaje (fkPresupuestoV, fecha, origen, destino, tipo_carga, tiempo_total, combustible_total, km_total) VALUES
(1, '2017-11-22 10:00:00', 'Logistica S.A.', 'Lujan Bs As', 'Sustancias y objetos peligrosos varios', '01:45:30', 230.00, 135),
(2, '2017-10-24 09:00:00', 'Logistica S.A.', 'Cordoba', 'Mudanza', '05:35:00', 900.00, 900),
(3, '2017-10-07 05:00:00', 'Logistica S.A.', 'Bariloche', 'Chocolates', '25:00:00', 2700.00, 1600),
(4, '2017-11-07 05:00:00', 'Logistica S.A.', 'Bariloche', 'Chocolates', '23:55:00', 2700.00, 1600),
(5, '2017-12-09 05:00:00', 'Logistica S.A.', 'Bariloche', 'Chocolates', '29:50:50', 2900.00, 1600),
(6, '2017-11-10 08:00:00', 'Cordoba', 'Logistica S.A.', 'Refrigerados y congelados', '05:55:50', 400.00, 560),
(7, '2018-01-08 14:00:00', 'Cordoba', 'Logistica S.A.', 'Refrigerados y congelados', '07:45:30', 460.00, 560),
(9, '2017-12-20 21:00:00', 'Logistica S.A.', 'Rio Grande', 'Material radiactivo', '47:00:00', 5300.00, 5100);

INSERT INTO Vehiculo_chofer_viaje (fkViajeT, fkChoferT, fkAcompanianteT, fkCamionT, fkAcopladoT) VALUES
(2, 11, NULL, 5, NULL),
(3, 1, 6, 1, 2),
(4, 1, 6, 3, 4),
(6, 2, 6, 6, NULL);

INSERT INTO Reporte (fkViajeR, fkChoferR, tiempo, latitud, longitud, motivo, km, combustible, descripcion) VALUES
(2, 11, '2017-10-24 09:00:00', '-58.6581128', '-34.6380318', 'Parada Tecnica', 0, 0.00, 'Saliendo de la Central'),
(2, 11, '2017-10-24 14:35:00', '-59.111061', '-34.570730', 'Parada Tecnica', 435, 0.00, 'Realizando la entrega'),
(2, 11, '2017-10-24 20:00:00', '-58.6581128', '-34.6380318', 'Parada Tecnica', 900, 0.00, 'Llegando a la Central'),
(3, 1, '2017-10-07 05:00:00', '-58.6581128', '-34.6380318', 'Parada Tecnica', 79306, 0.00, 'Saliendo de la Central'),
(3, 6, '2017-10-07 12:00:00', '-64.287881', '-36.608621', 'Parada Tecnica', 79851, 900.00, 'Carga de combustible'),
(4, 6, '2017-11-07 05:00:00', '-58.6581128', '-34.6380318','Parada Tecnica', 98788, 0.00, 'Saliendo de la Central');