-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2023 a las 22:38:07
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id_diet`, `name`, `calories`, `number_meals`, `description`) VALUES
(1, 'Dieta Estàndard', '105532.00', 5, 'Dieta Estàdard per Baixar el Nombre de kcal en la nostra alimentació');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diets_dishes`
--

CREATE TABLE `diets_dishes` (
  `dietas_id_dieta` bigint(10) UNSIGNED NOT NULL,
  `dishes_id_dishes` bigint(10) UNSIGNED NOT NULL,
  `week_day` bigint(10) UNSIGNED DEFAULT NULL,
  `meal` bigint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diets_dishes`
--

INSERT INTO `diets_dishes` (`dietas_id_dieta`, `dishes_id_dishes`, `week_day`, `meal`) VALUES
(1, 1, 1, 1),
(1, 2, 2, 1),
(1, 4, 3, 1),
(1, 5, 1, 5),
(1, 6, 1, 2),
(1, 7, 1, 3),
(1, 8, 1, 4),
(1, 9, 1, 4),
(1, 10, 5, 1),
(1, 11, 2, 5),
(1, 12, 2, 2),
(1, 13, 2, 2),
(1, 14, 2, 3),
(1, 15, 2, 4),
(1, 17, 3, 5),
(1, 18, 3, 2),
(1, 19, 3, 2),
(1, 20, 3, 3),
(1, 21, 3, 4),
(1, 22, 4, 1),
(1, 23, 4, 5),
(1, 24, 4, 2),
(1, 25, 4, 2),
(1, 26, 4, 4),
(1, 28, 5, 5),
(1, 29, 5, 2),
(1, 30, 5, 3),
(1, 31, 5, 4),
(1, 32, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dishes`
--

CREATE TABLE `dishes` (
  `id_dishes` bigint(10) UNSIGNED NOT NULL,
  `name_dishes` varchar(100) NOT NULL,
  `calories` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id_dishes`, `name_dishes`, `calories`) VALUES
(1, 'Café amb Llet Desnatada', '47.00'),
(2, 'Té Verd', '2.00'),
(3, 'Kiwi', '51.00'),
(4, 'Nous', '654.00'),
(5, 'Yogur Natural amb Pera ', '150.00'),
(6, 'Daurada al Forn amb Amanida', '1040.00'),
(7, 'Llesca al Pa Integral amb Formatge Cottage i Alvocat', '414.00'),
(8, 'Espàrrecs de Marge', '902.00'),
(9, 'Calamar', '1130.00'),
(10, 'Llesca de Pa Integral amb Tomàquet i Alvocat', '334.00'),
(11, 'Poma Canyella i Nous', '132.00'),
(12, 'Amanida de Enciam, LLombarda i Pastanaga', '1000.00'),
(13, 'Cuixa de Gall Dindi amb Pera', '313.00'),
(14, 'LLesca de Pa Integral amb Hummus i 1/2 ou cuit', '413.00'),
(15, 'Wok de Verdures amb Llagostins ', '17100.00'),
(16, 'Yogur Natural amb Fruits Vermells i Civada', '185.00'),
(17, 'Macedonia de Kiwi, Poma i Pera', '170.00'),
(18, 'Verdures a la Plancha', '975.00'),
(19, 'Truita Francesa de Xampinyons i Espècies', '1097.00'),
(20, 'Llesca de Pa Integral amb Tonyina Natural i Tomàquet', '240.00'),
(21, 'Cigrons amb Salmó, Enciam i Pera', '1168.00'),
(22, 'Llesca de Pa Integral amb Formatge de Burgos i mitja Poma ', '18144.00'),
(23, 'Pera i Nous', '711.00'),
(24, 'Carbassó amb Mató', '998.00'),
(25, 'Llom de Lluç amb Vinagreta de Pebrots', '1140.00'),
(26, 'Amanida Nicoise', '52363.00'),
(27, 'Llesca de Pa Integral amb 2 rodanxes de Alvocat i Tomàquet', '334.00'),
(28, 'Piña i Yogur Natural sense Sucre', '143.00'),
(29, 'Amaninda de Quinoa amb Cigrons', '1423.00'),
(30, 'Formatge Fresc i Nous', '684.00'),
(31, 'Gaspatxo Andalús', '1003.00'),
(32, 'Llom de Vedella a la Plancha', '1062.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dishes_ingredients`
--

CREATE TABLE `dishes_ingredients` (
  `dishes_id_dishes` bigint(10) UNSIGNED NOT NULL,
  `ingredients_id_ingredient` bigint(10) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) UNSIGNED DEFAULT NULL,
  `mesure` bigint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dishes_ingredients`
--

INSERT INTO `dishes_ingredients` (`dishes_id_dishes`, `ingredients_id_ingredient`, `quantity`, `mesure`) VALUES
(1, 1, '1.00', 3),
(5, 22, '1.00', 3),
(5, 29, '1.00', 3),
(6, 5, '300.00', 1),
(6, 6, '30.00', 1),
(6, 7, '30.00', 1),
(6, 8, '1.00', 3),
(6, 9, '10.00', 2),
(6, 10, '1.00', 3),
(7, 11, '1.00', 3),
(7, 12, NULL, NULL),
(7, 13, NULL, NULL),
(8, 9, '10.00', 2),
(8, 14, '200.00', 1),
(8, 15, NULL, NULL),
(9, 9, '10.00', 2),
(9, 10, '1.00', 3),
(9, 16, '200.00', 1),
(9, 17, '1.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pacient`
--

CREATE TABLE `historial_pacient` (
  `id_historial` bigint(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_pacient` bigint(10) UNSIGNED NOT NULL,
  `diet` bigint(10) UNSIGNED DEFAULT NULL,
  `weigth` decimal(6,2) NOT NULL,
  `heigth` decimal(6,2) NOT NULL,
  `chest` decimal(6,2) DEFAULT NULL,
  `leg` decimal(6,2) DEFAULT NULL,
  `arm` decimal(6,2) DEFAULT NULL,
  `hip` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_pacient`
--

INSERT INTO `historial_pacient` (`id_historial`, `date`, `id_pacient`, `diet`, `weigth`, `heigth`, `chest`, `leg`, `arm`, `hip`) VALUES
(1, '2023-04-20', 1, 1, '78.30', '1.76', '70.00', '90.00', '90.00', '93.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `calories` decimal(10,2) NOT NULL,
  `calories_unit` bigint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `name`, `calories`, `calories_unit`) VALUES
(1, 'Café amb Llet Desnatada', '47.00', 4),
(2, 'Té Verd', '2.00', 4),
(3, 'Kiwi', '61.00', 4),
(4, 'Nous', '654.00', 4),
(5, 'Daurada', '77.00', 4),
(6, 'Enciam', '77.00', 4),
(7, 'Escarola', '17.00', 4),
(8, 'Tomàquet', '18.00', 4),
(9, 'Oli de Oliva Verge Extra', '884.00', 4),
(10, 'Llimona', '29.00', 4),
(11, 'Llesca de Pa Integral', '92.00', 4),
(12, 'Formatge Cottage', '98.00', 4),
(13, 'Alvocat', '224.00', 4),
(14, 'Espàrrecs de marge', '18.00', 4),
(15, 'Sal', '0.00', 4),
(16, 'Calamar', '175.00', 4),
(17, 'All', '42.00', 4),
(18, 'Poma amb Canyella i Nous', '132.00', 4),
(19, 'Llombarda', '31.00', 4),
(20, 'Pastanaga', '41.00', 4),
(21, 'Cuixa amb Gall Dindi', '201.00', 4),
(22, 'Pera', '57.00', 4),
(23, 'Salsa de Soja', '53.00', 4),
(24, 'Hummus', '166.00', 4),
(25, 'Ou Cuit', '155.00', 4),
(26, 'Coliflor', '25.00', 4),
(27, 'Bròquil', '34.00', 4),
(28, 'Llagostí', '17.00', 5),
(29, 'Yogur Natural sense Sucre', '93.00', 4),
(30, 'Fruits Vermells', '57.00', 4),
(31, 'Civada', '354.00', 4),
(32, 'Carbassó', '17.00', 4),
(33, 'Albergínia', '25.00', 4),
(34, 'Mongetes Verdes', '31.00', 4),
(35, 'Ou', '155.00', 4),
(36, 'Xampinyons', '22.00', 4),
(37, 'Julivert', '36.00', 4),
(38, 'Tonyina', '130.00', 4),
(39, 'Pèsols', '81.00', 4),
(40, 'Salmó Fresc', '146.00', 4),
(41, 'Formatge de Burgos', '180.00', 5),
(42, 'Mató', '97.00', 4),
(43, 'Llom de Lluç', '152.00', 4),
(44, 'Pebrot Vermell', '26.00', 4),
(45, 'Pebrot Verd', '20.00', 4),
(46, 'Ceba', '40.00', 4),
(47, 'Vinagre', '18.00', 4),
(48, 'Bonítol', '132.00', 4),
(49, 'Espàrrecs Verds', '24.00', 4),
(50, 'Pèsols Cuits', '86.00', 4),
(51, 'Pebrot Verd Italià', '20.00', 4),
(52, 'Ceba lila', '25.00', 5),
(53, 'Quinoa', '370.00', 4),
(54, 'Piña', '50.00', 4),
(55, 'Cigrons', '81.00', 4),
(56, 'Espinacs', '23.00', 4),
(57, 'Tomàquet Cherry', '18.00', 4),
(58, 'Formatge Fresc', '310.00', 4),
(59, 'Cogombre', '15.00', 4),
(60, 'Vinagre de Jerez', '24.00', 4),
(61, 'Llom de Vedella', '127.00', 4),
(62, 'Tàperes', '26.00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meal_dishes`
--

CREATE TABLE `meal_dishes` (
  `id_meal` bigint(10) UNSIGNED NOT NULL,
  `name_meal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `meal_dishes`
--

INSERT INTO `meal_dishes` (`id_meal`, `name_meal`) VALUES
(1, 'Esmorçar'),
(2, 'Dinar'),
(3, 'Berenar'),
(4, 'Sopar'),
(5, 'Mig Dia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutricionist`
--

CREATE TABLE `nutricionist` (
  `id_nutricionist` bigint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nutricionist`
--

INSERT INTO `nutricionist` (`id_nutricionist`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacient`
--

CREATE TABLE `pacient` (
  `id_pacient` bigint(10) UNSIGNED NOT NULL,
  `assigned_nutricionist` bigint(10) UNSIGNED DEFAULT NULL,
  `email_pacient` varchar(45) DEFAULT NULL CHECK (`email_pacient` like '%@%.%'),
  `phone_pacient` varchar(20) DEFAULT NULL CHECK (`phone_pacient` like '%+%'),
  `address_pacient` varchar(1000) DEFAULT NULL,
  `current_diet` bigint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacient`
--

INSERT INTO `pacient` (`id_pacient`, `assigned_nutricionist`, `email_pacient`, `phone_pacient`, `address_pacient`, `current_diet`) VALUES
(1, 2, 'gcesar@milaifontanals.com', '+656394050', 'Can Debot', 1),
(4, 3, 'ipuga@milaifontanals.org', '+656394051', NULL, 1),
(5, NULL, NULL, NULL, NULL, 1),
(6, 3, 'ntorregrosa@milaifontanals.org', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unit_mesure`
--

CREATE TABLE `unit_mesure` (
  `id_unit` bigint(10) UNSIGNED NOT NULL,
  `abreviation` varchar(45) NOT NULL,
  `unit_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unit_mesure`
--

INSERT INTO `unit_mesure` (`id_unit`, `abreviation`, `unit_name`) VALUES
(1, 'g', 'grams'),
(2, 'ml', 'mililitres'),
(3, 'u', 'unitats'),
(4, 'cal', 'calories'),
(5, 'kcal', 'kilocalories');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name_user` varchar(45) NOT NULL,
  `lastname_user` varchar(45) NOT NULL,
  `nickname_user` varchar(45) NOT NULL,
  `password` varchar(300) NOT NULL,
  `type_user` char(1) NOT NULL CHECK (`type_user` = 'P' or `type_user` = 'N')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name_user`, `lastname_user`, `nickname_user`, `password`, `type_user`) VALUES
(1, 'Gerard', 'César ', 'gcesar', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'P'),
(2, 'Eric', 'Borràs', 'eborras', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'N'),
(3, 'Laura', 'César', 'lcesar', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'N'),
(4, 'Ivàn', 'Puga', 'ipuga', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'P'),
(5, 'Yaiza', 'Castillo', 'ycastillo', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'P'),
(6, 'Nerea', 'Torregrosa', 'ntorregrosa', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `week_days`
--

CREATE TABLE `week_days` (
  `id_day` bigint(10) UNSIGNED NOT NULL,
  `name_day` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `week_days`
--

INSERT INTO `week_days` (`id_day`, `name_day`) VALUES
(1, 'Dillluns'),
(2, 'Dimarts'),
(3, 'Dimecres'),
(4, 'Dijous'),
(5, 'Divendres'),
(6, 'Dissabte'),
(7, 'Diumenge');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`id_diet`);

--
-- Indices de la tabla `diets_dishes`
--
ALTER TABLE `diets_dishes`
  ADD PRIMARY KEY (`dietas_id_dieta`,`dishes_id_dishes`),
  ADD KEY `fk_Dietas_has_Dishes_Dishes1_idx` (`dishes_id_dishes`),
  ADD KEY `fk_Dietas_has_Dishes_Dietas1_idx` (`dietas_id_dieta`),
  ADD KEY `FK_DIETSDISHES_MEAL_idx` (`meal`),
  ADD KEY `FK_DIETDISHES_WEEKDAYS_idx` (`week_day`);

--
-- Indices de la tabla `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id_dishes`);

--
-- Indices de la tabla `dishes_ingredients`
--
ALTER TABLE `dishes_ingredients`
  ADD PRIMARY KEY (`dishes_id_dishes`,`ingredients_id_ingredient`),
  ADD KEY `fk_Ingridients_has_Dishes_Dishes1_idx` (`dishes_id_dishes`),
  ADD KEY `fk_Ingridients_has_Dishes_Ingridients1_idx` (`ingredients_id_ingredient`),
  ADD KEY `fk_Dishes_Ingredients_Unit Mesure1_idx` (`mesure`);

--
-- Indices de la tabla `historial_pacient`
--
ALTER TABLE `historial_pacient`
  ADD PRIMARY KEY (`id_historial`,`date`),
  ADD KEY `FK_ID_PACIENT` (`id_pacient`),
  ADD KEY `FK_HISTORIAL_DIETA_idx` (`diet`);

--
-- Indices de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`),
  ADD KEY `FK_INGREDIENTS_MESURE_idx` (`calories_unit`);

--
-- Indices de la tabla `meal_dishes`
--
ALTER TABLE `meal_dishes`
  ADD PRIMARY KEY (`id_meal`,`name_meal`);

--
-- Indices de la tabla `nutricionist`
--
ALTER TABLE `nutricionist`
  ADD PRIMARY KEY (`id_nutricionist`);

--
-- Indices de la tabla `pacient`
--
ALTER TABLE `pacient`
  ADD PRIMARY KEY (`id_pacient`),
  ADD KEY `FK_PACIENT_DIETAS_idx` (`current_diet`),
  ADD KEY `FK_PACIENT_NUTRICIONISTA_idx` (`assigned_nutricionist`);

--
-- Indices de la tabla `unit_mesure`
--
ALTER TABLE `unit_mesure`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `week_days`
--
ALTER TABLE `week_days`
  ADD PRIMARY KEY (`id_day`,`name_day`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diets`
--
ALTER TABLE `diets`
  MODIFY `id_diet` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id_dishes` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `historial_pacient`
--
ALTER TABLE `historial_pacient`
  MODIFY `id_historial` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `meal_dishes`
--
ALTER TABLE `meal_dishes`
  MODIFY `id_meal` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `unit_mesure`
--
ALTER TABLE `unit_mesure`
  MODIFY `id_unit` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `week_days`
--
ALTER TABLE `week_days`
  MODIFY `id_day` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diets_dishes`
--
ALTER TABLE `diets_dishes`
  ADD CONSTRAINT `FK_DIETDISHES_WEEKDAYS` FOREIGN KEY (`week_day`) REFERENCES `week_days` (`id_day`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DIETSDISHES_MEAL` FOREIGN KEY (`meal`) REFERENCES `meal_dishes` (`id_meal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Dietas_has_Dishes_Dietas1` FOREIGN KEY (`dietas_id_dieta`) REFERENCES `diets` (`id_diet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Dietas_has_Dishes_Dishes1` FOREIGN KEY (`dishes_id_dishes`) REFERENCES `dishes` (`id_dishes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dishes_ingredients`
--
ALTER TABLE `dishes_ingredients`
  ADD CONSTRAINT `fk_Dishes_Ingredients_Unit Mesure1` FOREIGN KEY (`mesure`) REFERENCES `unit_mesure` (`id_unit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Ingridients_has_Dishes_Dishes1` FOREIGN KEY (`dishes_id_dishes`) REFERENCES `dishes` (`id_dishes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Ingridients_has_Dishes_Ingridients1` FOREIGN KEY (`ingredients_id_ingredient`) REFERENCES `ingredients` (`id_ingredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_pacient`
--
ALTER TABLE `historial_pacient`
  ADD CONSTRAINT `FK_HISTORIAL_DIETA` FOREIGN KEY (`diet`) REFERENCES `diets` (`id_diet`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PACIENT` FOREIGN KEY (`id_pacient`) REFERENCES `pacient` (`id_pacient`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_INGREDIENTS_MESURE` FOREIGN KEY (`calories_unit`) REFERENCES `unit_mesure` (`id_unit`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `nutricionist`
--
ALTER TABLE `nutricionist`
  ADD CONSTRAINT `FK_USERS_ID` FOREIGN KEY (`id_nutricionist`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacient`
--
ALTER TABLE `pacient`
  ADD CONSTRAINT `FK_PACIENT_DIETAS` FOREIGN KEY (`current_diet`) REFERENCES `diets` (`id_diet`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PACIENT_NUTRICIONISTA` FOREIGN KEY (`assigned_nutricionist`) REFERENCES `nutricionist` (`id_nutricionist`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PACIENT_USERS` FOREIGN KEY (`id_pacient`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
