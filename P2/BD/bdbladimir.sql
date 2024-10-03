-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 00:19:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbladimir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `codigo` int(11) NOT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `Xini` decimal(10,2) DEFAULT NULL,
  `Xfin` decimal(10,2) DEFAULT NULL,
  `Yini` decimal(10,2) DEFAULT NULL,
  `Yfin` decimal(10,2) DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`codigo`, `zona`, `Xini`, `Xfin`, `Yini`, `Yfin`, `superficie`, `distrito`, `ci`) VALUES
(1000, 'Sopocachi', -16.55, -16.57, -68.11, -68.13, 320.00, 'Distrito 2', 3456789),
(1001, 'Zona Sur', -16.50, -16.52, -68.12, -68.14, 200.50, 'Distrito 1', 1234567),
(1007, 'Villa Armonía', -16.61, -16.63, -68.21, -68.23, 290.35, 'Distrito 4', 6789012),
(1008, 'Obrajes', -16.55, -16.57, -68.18, -68.20, 420.55, 'Distrito 4', 6789012),
(1009, 'San Pedro', -16.48, -16.50, -68.15, -68.17, 270.65, 'Distrito 2', 2345678),
(2001, 'Sopocachi', -16.54, -16.56, -68.10, -68.12, 250.30, 'Distrito 2', 2345678),
(2002, 'Zona Sur', -16.51, -16.53, -68.13, -68.15, 300.75, 'Distrito 1', 1234567),
(2005, 'Cota Cota', -16.52, -16.54, -68.20, -68.22, 330.40, 'Distrito 1', 3456789),
(2006, 'Tembladerani', -16.49, -16.51, -68.23, -68.25, 160.95, 'Distrito 3', 5678901),
(3001, 'Miraflores', -16.50, -16.52, -68.09, -68.11, 150.45, 'Distrito 2', 3456789),
(3002, 'Calacoto', -16.49, -16.51, -68.14, -68.16, 500.20, 'Distrito 1', 4567890),
(3003, 'Villa Fátima', -16.60, -16.62, -68.17, -68.19, 350.00, 'Distrito 3', 5678901),
(3004, 'Achumani', -16.53, -16.55, -68.22, -68.24, 180.80, 'Distrito 1', 1234567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre_distrito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre_distrito`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5'),
(6, 'Distrito 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id`, `username`, `password`) VALUES
(1, 'Bladi', '123456'),
(2, 'Bladimir', '123'),
(3, 'Dyvid', '123450'),
(6, 'Joel', '654321'),
(7, 'Ivan', '789012'),
(8, 'bwilliams', '345678'),
(9, 'lili', '901234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`) VALUES
(1234567, 'Carlos', 'Perez'),
(2345678, 'Ana', 'Gomez'),
(3456789, 'Luis', 'Fernandez'),
(4567890, 'Maria', 'Rodriguez'),
(5678901, 'Jorge', 'Lopez'),
(6789012, 'Patricia', 'Sanchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL,
  `nombre_zona` varchar(100) NOT NULL,
  `id_distrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nombre_zona`, `id_distrito`) VALUES
(1, 'Zona Sur', 1),
(2, 'Sopocachi', 2),
(3, 'Miraflores', 2),
(4, 'Calacoto', 1),
(5, 'Villa Fátima', 3),
(6, 'Obrajes', 4),
(7, 'Achumani', 1),
(8, 'San Pedro', 2),
(9, 'Cota Cota', 1),
(10, 'Tembladerani', 3),
(11, 'Villa Armonía', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`),
  ADD KEY `id_distrito` (`id_distrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD CONSTRAINT `catastro_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
