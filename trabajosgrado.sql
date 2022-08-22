-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2022 a las 20:11:00
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
-- Base de datos: `trabajosgrado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Cedula` int(100) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `CodigoAdministrador` varchar(60) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` varchar(60) NOT NULL,
  `Cargo` varchar(25) NOT NULL,
  `Direccion` varchar(25) NOT NULL,
  `Ciudad` varchar(25) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `cedula` int(30) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `CodigoDocente` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` varchar(60) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Especializacion` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Cedula` int(25) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `CodigoEstudiante` varchar(30) NOT NULL,
  `Correo` varchar(25) NOT NULL,
  `Telefono` varchar(60) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Ciudad` varchar(25) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `idTrabajo` int(20) NOT NULL,
  `CodigoAdministrador` varchar(30) NOT NULL,
  `CodigoEstudiante` varchar(30) NOT NULL,
  `CodigoAsesor` varchar(30) NOT NULL,
  `CodigoJurado` varchar(30) NOT NULL,
  `Archivo` varchar(60) NOT NULL,
  `Calificacion` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CodigoAdministrador`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`CodigoDocente`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`CodigoEstudiante`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`idTrabajo`),
  ADD KEY `CodigoEstudiante` (`CodigoEstudiante`),
  ADD KEY `CodigoAsesor` (`CodigoAsesor`),
  ADD KEY `CodigoJurado` (`CodigoJurado`),
  ADD KEY `CodigoAdministrador` (`CodigoAdministrador`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`CodigoEstudiante`) REFERENCES `estudiante` (`CodigoEstudiante`),
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`CodigoAsesor`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `trabajos_ibfk_3` FOREIGN KEY (`CodigoJurado`) REFERENCES `docente` (`CodigoDocente`),
  ADD CONSTRAINT `trabajos_ibfk_4` FOREIGN KEY (`CodigoAdministrador`) REFERENCES `administrador` (`CodigoAdministrador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
