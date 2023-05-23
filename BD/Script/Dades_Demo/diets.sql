-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2023 a las 19:17:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diets`
--

CREATE TABLE `diets` (
  `id_diet` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `calories` decimal(10,2) NOT NULL,
  `number_meals` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type_diet` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id_diet`, `name`, `calories`, `number_meals`, `description`, `type_diet`) VALUES
(1, 'Dieta Estàndard', '21515.00', 5, 'Dieta Estàdard per Baixar el Nombre de kcal en la nostra alimentació', 2),
(5, 'Dieta Mediterrània', '16542.00', 5, 'Dieta Mediterrània', 2),
(6, 'Dieta Mediterrània CLON', '16542.00', 5, 'Dieta Mediterrània', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`id_diet`),
  ADD KEY `FK_TYPE_DIETS_idx` (`type_diet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diets`
--
ALTER TABLE `diets`
  MODIFY `id_diet` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diets`
--
ALTER TABLE `diets`
  ADD CONSTRAINT `FK_TYPE_DIETS` FOREIGN KEY (`type_diet`) REFERENCES `type_diets` (`id_type`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
