-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2022 a las 00:02:09
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `CodigoAdministrador` varchar(60) NOT NULL,
  `Cedula` varchar(30) NOT NULL,
  `Credencial` varchar(30) NOT NULL,
  `Cargo` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`CodigoAdministrador`, `Cedula`, `Credencial`, `Cargo`, `Password`) VALUES
('000', '000', '111', 'secretario', '$2y$10$7z8g0MOOAV.WqSYziXebZuyy72ogtlP5wLc.HfxuNbChst5dzwI6.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaasesor`
--

CREATE TABLE `asignaasesor` (
  `idAsesor` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `idTrabajo` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaasesor`
--

INSERT INTO `asignaasesor` (`idAsesor`, `CodigoDocente`, `idTrabajo`) VALUES
(1, '201', 1),
(3, '202', 3),
(4, '203', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignajurado`
--

CREATE TABLE `asignajurado` (
  `idJurado` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `idTrabajo` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignajurado`
--

INSERT INTO `asignajurado` (`idJurado`, `CodigoDocente`, `idTrabajo`) VALUES
(4, '202', 1),
(2, '204', 3),
(1, '204', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `idTrabajo` int(200) NOT NULL,
  `Nota` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`idCalificacion`, `CodigoDocente`, `idTrabajo`, `Nota`, `Estado`) VALUES
(1, '202', 1, '35', 'Aprobado'),
(3, '204', 3, '44', 'Aprobado'),
(4, '204', 4, '22', 'Reprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `idTrabajo` int(200) NOT NULL,
  `Mensaje` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `CodigoDocente`, `idTrabajo`, `Mensaje`) VALUES
(3, '202', 3, 'bien hecho'),
(4, '202', 3, 'bien hecho'),
(5, '202', 3, 'bien hecho'),
(6, '202', 3, 'mal realizado'),
(7, '203', 4, 'excellente'),
(8, '203', 4, 'bien hecho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `CodigoDocente` varchar(60) NOT NULL,
  `Cedula` varchar(30) NOT NULL,
  `Especializacion` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`CodigoDocente`, `Cedula`, `Especializacion`, `Password`) VALUES
('201', '201', 'ingenierÃ­a de sistemas', '$2y$10$vkOaK1xJChD16bK83Z9d0O2m.quAMbemJvErh9NZBg1.tcipujb.m'),
('202', '202', 'administrador', '$2y$10$rGZBW2EAAws.AEcXhI.AXuGV7ib6UfIz3aouOjPqPbexB1A0UK3kq'),
('203', '203', 'ingeniero civil', '$2y$10$VGEJlOGEYzlz5afN2M8sv.I9h1LBOYq0H34pp/tI7X9aIzQB4XQRS'),
('204', '204', 'ingeniero civil', '$2y$10$klnjh.S7NnRa3b74/y6v9e0kVnqHiJYXR4Hj7dR/ODJX7MrF7hkR.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `CodigoEstudiante` varchar(60) NOT NULL,
  `Cedula` varchar(30) NOT NULL,
  `Programa` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`CodigoEstudiante`, `Cedula`, `Programa`, `Password`) VALUES
('100', '100', 'sistemas', '$2y$10$23DfcfEAycnl6o3H7hUJaesgB1c3PaPccgpaTaWvLBqYFGKzsAg9q'),
('101', '101', 'administracion', '$2y$10$Rcw08CTM/RRV1rX1549D1OP2fXw0IUh7eKH9TYbySCO.KRD.eLvBO'),
('102', '102', 'sistemas', '$2y$10$fB7blzovV1ib9.DTwgG5Lun1TMAOdezZwWgpUFxmkmUlZbJCeg1u6'),
('103', '103', 'IngenierÃ­a de Sistemas', '$2y$10$3aiy1pLOn0V6CDNVXYjcPOIr18wqIP/Zor7HpcUiTDkleducrW.D6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeroasesorias`
--

CREATE TABLE `numeroasesorias` (
  `idNumero` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `Cantidad` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numeroasesorias`
--

INSERT INTO `numeroasesorias` (`idNumero`, `CodigoDocente`, `Cantidad`) VALUES
(1, '201', 1),
(2, '202', 1),
(3, '203', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerojurados`
--

CREATE TABLE `numerojurados` (
  `idNumeroJ` int(200) NOT NULL,
  `CodigoDocente` varchar(60) NOT NULL,
  `Cantidad` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numerojurados`
--

INSERT INTO `numerojurados` (`idNumeroJ`, `CodigoDocente`, `Cantidad`) VALUES
(1, '204', 2),
(2, '203', 0),
(3, '202', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Cedula` varchar(60) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Ciudad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Cedula`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Ciudad`) VALUES
('000', 'luis', 'lopez', 'lucho@gmail.com', '3165584505', 'mz G casa 10', 'ipiales'),
('100', 'eduardo', 'lopez', 'aux@gmail.com', '222', '4', 'ipiales'),
('101', 'eduardo', 'Pacheco', 'lucho@gmail.com', '999', 'mz G casa 10', 'ipiales'),
('102', 'miguel', 'Pacheco', 'lucho@gmail.com', '999', 'mz G casa 10', 'ipiales'),
('103', 'luis', 'aux', 'edu@gmail.com', '123', 'mz g casa 10', 'Carlosama'),
('201', 'eduardo', 'rosero', 'aux@gmail.com', '3165584505', 'sandona', 'Carlosama'),
('202', 'Luis Eduardo', 'Pacheco', 'aux@gmail.com', '111', '4', 'pasto'),
('203', 'luis', 'rosero', 'edu@gmail.com', '3165584505', '888', 'Carlosama'),
('204', 'luis', 'Insuasty Portillo', 'aux@gmail.com', '3165584505', '4', 'ipiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `idTrabajo` int(200) NOT NULL,
  `CodigoEstudiante` varchar(60) NOT NULL,
  `NombreTrabajo` varchar(30) NOT NULL,
  `Ubicacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`idTrabajo`, `CodigoEstudiante`, `NombreTrabajo`, `Ubicacion`) VALUES
(1, '100', 'trabajo1', 'archivo/trabajo1.pdf'),
(3, '102', 'trabajo3', 'archivo/trabajo3.pdf'),
(4, '103', 'trabajo4', 'archivo/trabajo4.pdf'),
(5, '101', 'trabajo2', 'archivo/trabajo2.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CodigoAdministrador`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `asignaasesor`
--
ALTER TABLE `asignaasesor`
  ADD PRIMARY KEY (`idAsesor`),
  ADD KEY `CodigoDocente` (`CodigoDocente`,`idTrabajo`),
  ADD KEY `idTrabajo` (`idTrabajo`);

--
-- Indices de la tabla `asignajurado`
--
ALTER TABLE `asignajurado`
  ADD PRIMARY KEY (`idJurado`),
  ADD KEY `CodigoDocente` (`CodigoDocente`,`idTrabajo`),
  ADD KEY `idTrabajo` (`idTrabajo`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `CodigoDocente` (`CodigoDocente`,`idTrabajo`),
  ADD KEY `idTrabajo` (`idTrabajo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `CodigoDocente` (`CodigoDocente`,`idTrabajo`),
  ADD KEY `idTrabajo` (`idTrabajo`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`CodigoDocente`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`CodigoEstudiante`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `numeroasesorias`
--
ALTER TABLE `numeroasesorias`
  ADD PRIMARY KEY (`idNumero`),
  ADD KEY `CodigoDocente` (`CodigoDocente`);

--
-- Indices de la tabla `numerojurados`
--
ALTER TABLE `numerojurados`
  ADD PRIMARY KEY (`idNumeroJ`),
  ADD KEY `CodigoDocente` (`CodigoDocente`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`idTrabajo`),
  ADD KEY `CodigoEstudiante` (`CodigoEstudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaasesor`
--
ALTER TABLE `asignaasesor`
  MODIFY `idAsesor` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asignajurado`
--
ALTER TABLE `asignajurado`
  MODIFY `idJurado` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `numeroasesorias`
--
ALTER TABLE `numeroasesorias`
  MODIFY `idNumero` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `numerojurados`
--
ALTER TABLE `numerojurados`
  MODIFY `idNumeroJ` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `idTrabajo` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `persona` (`Cedula`);

--
-- Filtros para la tabla `asignaasesor`
--
ALTER TABLE `asignaasesor`
  ADD CONSTRAINT `asignaasesor_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `asignaasesor_ibfk_2` FOREIGN KEY (`idTrabajo`) REFERENCES `trabajo` (`idTrabajo`);

--
-- Filtros para la tabla `asignajurado`
--
ALTER TABLE `asignajurado`
  ADD CONSTRAINT `asignajurado_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `asignajurado_ibfk_2` FOREIGN KEY (`idTrabajo`) REFERENCES `trabajo` (`idTrabajo`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idTrabajo`) REFERENCES `trabajo` (`idTrabajo`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idTrabajo`) REFERENCES `trabajo` (`idTrabajo`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `persona` (`Cedula`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `persona` (`Cedula`);

--
-- Filtros para la tabla `numeroasesorias`
--
ALTER TABLE `numeroasesorias`
  ADD CONSTRAINT `numeroasesorias_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`);

--
-- Filtros para la tabla `numerojurados`
--
ALTER TABLE `numerojurados`
  ADD CONSTRAINT `numerojurados_ibfk_1` FOREIGN KEY (`CodigoDocente`) REFERENCES `docente` (`CodigoDocente`);

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`CodigoEstudiante`) REFERENCES `estudiante` (`CodigoEstudiante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
