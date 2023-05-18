--
-- Volcado de datos para la tabla `meal_dishes`
--

INSERT INTO `meal_dishes` (`id_meal`, `name_meal`) VALUES
(1, 'Esmorçar'),
(2, 'Dinar'),
(3, 'Berenar'),
(4, 'Sopar'),
(5, 'Mig Dia');


--
-- Volcado de datos para la tabla `unit_mesure`
--

INSERT INTO `unit_mesure` (`id_unit`, `abreviation`, `unit_name`) VALUES
(1, 'g', 'grams'),
(2, 'ml', 'mililitres'),
(3, 'u', 'unitats'),
(4, 'cal', 'calories'),
(5, 'kcal', 'kilocalories');


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
-- Volcado de datos para la tabla `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `name`, `calories`, `calories_unit`) VALUES
(1, 'Café amb Llet Desnatada', 47.00, 4),
(2, 'Té Verd', 2.00, 4),
(3, 'Kiwi', 61.00, 4),
(4, 'Nous', 654.00, 4),
(5, 'Daurada', 77.00, 4),
(6, 'Enciam', 77.00, 4),
(7, 'Escarola', 17.00, 4),
(8, 'Tomàquet', 18.00, 4),
(9, 'Oli de Oliva Verge Extra', 884.00, 4),
(10, 'Llimona', 29.00, 4),
(11, 'Llesca de Pa Integral', 92.00, 4),
(12, 'Formatge Cottage', 98.00, 4),
(13, 'Alvocat', 224.00, 4),
(14, 'Espàrrecs de marge', 18.00, 4),
(15, 'Sal', 0.00, 4),
(16, 'Calamar', 175.00, 4),
(17, 'All', 42.00, 4),
(18, 'Poma amb Canyella i Nous', 132.00, 4),
(19, 'Llombarda', 31.00, 4),
(20, 'Pastanaga', 41.00, 4),
(21, 'Cuixa amb Gall Dindi', 201.00, 4),
(22, 'Pera', 57.00, 4),
(23, 'Salsa de Soja', 53.00, 4),
(24, 'Hummus', 166.00, 4),
(25, 'Ou Cuit', 155.00, 4),
(26, 'Coliflor', 25.00, 4),
(27, 'Bròquil', 34.00, 4),
(28, 'Llagostí', 17.00, 5),
(29, 'Yogur Natural sense Sucre', 93.00, 4),
(30, 'Fruits Vermells', 57.00, 4),
(31, 'Civada', 354.00, 4),
(32, 'Carbassó', 17.00, 4),
(33, 'Albergínia', 25.00, 4),
(34, 'Mongetes Verdes', 31.00, 4),
(35, 'Ou', 155.00, 4),
(36, 'Xampinyons', 22.00, 4),
(37, 'Julivert', 36.00, 4),
(38, 'Tonyina', 130.00, 4),
(39, 'Pèsols', 81.00, 4),
(40, 'Salmó Fresc', 146.00, 4),
(41, 'Formatge de Burgos', 180.00, 5),
(42, 'Mató', 97.00, 4),
(43, 'Llom de Lluç', 152.00, 4),
(44, 'Pebrot Vermell', 26.00, 4),
(45, 'Pebrot Verd', 20.00, 4),
(46, 'Ceba', 40.00, 4),
(47, 'Vinagre', 18.00, 4),
(48, 'Bonítol', 132.00, 4),
(49, 'Espàrrecs Verds', 24.00, 4),
(50, 'Pèsols Cuits', 86.00, 4),
(51, 'Pebrot Verd Italià', 20.00, 4),
(52, 'Ceba lila', 25.00, 5),
(53, 'Quinoa', 370.00, 4),
(54, 'Piña', 50.00, 4),
(55, 'Cigrons', 81.00, 4),
(56, 'Espinacs', 23.00, 4),
(57, 'Tomàquet Cherry', 18.00, 4),
(58, 'Formatge Fresc', 310.00, 4),
(59, 'Cogombre', 15.00, 4),
(60, 'Vinagre de Jerez', 24.00, 4),
(61, 'Llom de Vedella', 127.00, 4),
(62, 'Tàperes', 26.00, 5),
(63, 'Poma', 52.00, 4),
(64, 'Aigua ', 0.00, 4);


--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id_dishes`, `name_dish`, `calories`,`image_dish`) VALUES
(1, 'Café amb Llet Desnatada', 0,null),
(2, 'Té Verd', 2.00,null),
(3, 'Kiwi', 51.00,null),
(4, 'Nous', 654.00,null),
(5, 'Yogur Natural amb Pera ', 0,null),
(6, 'Daurada al Forn amb Amanida', 0,null),
(7, 'Llesca al Pa Integral amb Formatge Cottage i Alvocat', 0,null),
(8, 'Espàrrecs de Marge', 0,null),
(9, 'Calamar', 0,null),
(10, 'Llesca de Pa Integral amb Tomàquet i Alvocat', 0,null),
(11, 'Poma Canyella i Nous', 0,null),
(12, 'Amanida de Enciam, LLombarda i Pastanaga', 0,null),
(13, 'Cuixa de Gall Dindi amb Pera', 0,null),
(14, 'LLesca de Pa Integral amb Hummus i 1/2 ou cuit', 0,null),
(15, 'Wok de Verdures amb Llagostins ', 0,null),
(16, 'Yogur Natural amb Fruits Vermells i Civada', 0,null),
(17, 'Macedonia de Kiwi, Poma i Pera', 0,null),
(18, 'Verdures a la Plancha', 0,null),
(19, 'Truita Francesa de Xampinyons i Espècies', 0,null),
(20, 'Llesca de Pa Integral amb Tonyina Natural i Tomàquet', 0,null),
(21, 'Cigrons amb Salmó, Enciam i Pera', 0,null),
(22, 'Llesca de Pa Integral amb Formatge de Burgos i mitja Poma ', 0,null),
(23, 'Pera i Nous', 0,null),
(24, 'Carbassó amb Mató', 0,null),
(25, 'Llom de Lluç amb Vinagreta de Pebrots', 0,null),
(26, 'Amanida Nicoise', 0,null),
(27, 'Llesca de Pa Integral amb 2 rodanxes de Alvocat i Tomàquet', 0,null),
(28, 'Piña i Yogur Natural sense Sucre', 0,null),
(29, 'Amaninda de Quinoa amb Cigrons', 0,null),
(30, 'Formatge Fresc i Nous', 0,null),
(31, 'Gaspatxo Andalús', 0,null),
(32, 'Llom de Vedella a la Plancha', 0,null);



--
-- Volcado de datos para la tabla `dishes_ingredients`
--

INSERT INTO `dishes_ingredients` (`dish_id_dish`, `ingredient_id_ingredient`, `quantity`, `mesure`) VALUES
(1, 1, 1.00, 3),
(2, 2, 1.00, 3),
(3, 3, 1.00, 3),
(4, 4, 5.00, 3),
(5, 22, 1.00, 3),
(5, 29, 1.00, 3),
(6, 5, 300.00, 1),
(6, 6, 30.00, 1),
(6, 7, 30.00, 1),
(6, 8, 1.00, 3),
(6, 9, 10.00, 2),
(6, 10, 1.00, 3),
(7, 11, 1.00, 3),
(7, 12, NULL, NULL),
(7, 13, NULL, NULL),
(8, 9, 10.00, 2),
(8, 14, 200.00, 1),
(8, 15, NULL, NULL),
(9, 9, 10.00, 2),
(9, 10, 1.00, 3),
(9, 16, 200.00, 1),
(9, 17, 1.00, 3),
(10, 8, 1.00, 3),
(10, 11, 1.00, 3),
(11, 18, 1.00, 3),
(12, 6, 50.00, 1),
(12, 9, 10.00, 2),
(12, 10, 1.00, 3),
(12, 13, 1.00, 3),
(12, 15, 30.00, 1),
(12, 19, 50.00, 1),
(12, 20, 100.00, 1),
(13, 21, 1.00, 3),
(13, 22, 1.00, 3),
(13, 23, 15.00, 2),
(14, 11, 1.00, 3),
(14, 24, 20.00, 1),
(14, 25, 0.50, 3),
(15, 9, 10.00, 2),
(15, 20, 100.00, 1),
(15, 26, 150.00, 1),
(15, 27, 150.00, 1),
(15, 28, 200.00, 1),
(16, 29, 1.00, 3),
(16, 30, 20.00, 1),
(16, 31, 10.00, 1),
(17, 3, 1.00, 3),
(17, 22, 1.00, 3),
(17, 54, 1.00, 3),
(18, 8, 100.00, 1),
(18, 9, 10.00, 2),
(18, 15, 20.00, 1),
(18, 32, 100.00, 1),
(18, 33, 100.00, 1),
(18, 34, 50.00, 1),
(19, 9, 10.00, 2),
(19, 15, 10.00, 1),
(19, 35, 2.00, 3),
(19, 36, 80.00, 1),
(19, 37, 10.00, 1),
(20, 8, 1.00, 3),
(20, 11, 1.00, 3),
(20, 38, 85.00, 1),
(21, 6, 50.00, 1),
(21, 9, 10.00, 2),
(21, 22, 100.00, 1),
(21, 28, NULL, NULL),
(21, 39, 80.00, 1),
(21, 40, 100.00, 1),
(22, 11, 1.00, 3),
(22, 41, 50.00, 1),
(22, 63, 1.00, 3),
(23, 4, 4.00, 3),
(23, 22, 1.00, 3),
(24, 9, 10.00, 2),
(24, 15, 10.00, 1),
(24, 32, 300.00, 1),
(24, 33, 300.00, 1),
(24, 34, 300.00, 1),
(24, 42, 40.00, 1),
(25, 9, 10.00, 2),
(25, 15, 10.00, 1),
(25, 43, 120.00, 1),
(25, 44, 100.00, 1),
(25, 45, 100.00, 1),
(25, 46, 30.00, 1),
(25, 47, 10.00, 2),
(26, 6, 50.00, 1),
(26, 8, 100.00, 1),
(26, 9, 10.00, 2),
(26, 10, 1.00, 3),
(26, 15, 10.00, 1),
(26, 25, 1.00, 3),
(26, 48, 100.00, 1),
(26, 49, 100.00, 1),
(26, 51, 30.00, 1),
(26, 52, 25.00, 1),
(26, 55, 40.00, 1),
(26, 62, 7.00, 1),
(27, 8, 1.00, 3),
(27, 11, 1.00, 3),
(27, 13, 1.00, 3),
(28, 29, 1.00, 3),
(28, 54, 1.00, 3),
(29, 9, 10.00, 2),
(29, 10, 1.00, 3),
(29, 15, 10.00, 1),
(29, 47, 10.00, 2),
(29, 53, 50.00, 1),
(29, 55, 50.00, 1),
(29, 56, 100.00, 1),
(29, 57, 70.00, 1),
(30, 4, 4.00, 3),
(30, 58, 15.00, 1),
(31, 8, 160.00, 1),
(31, 9, 10.00, 2),
(31, 15, 10.00, 1),
(31, 17, 0.50, 3),
(31, 47, 10.00, 2),
(31, 51, 50.00, 1),
(31, 59, 30.00, 1),
(31, 64, 40.00, 2),
(32, 6, 100.00, 1),
(32, 8, 100.00, 1),
(32, 9, 10.00, 2),
(32, 15, 10.00, 1),
(32, 47, 10.00, 2),
(32, 61, 150.00, 1);



--
-- Volcado de datos para la tabla `type_diets`
--

INSERT INTO `type_diets` (`id_type`, `name_type`) VALUES
(1, 'Dieta Vegetariana'),
(2, 'Dieta Baixa en Greixos');





--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id_diet`, `name`, `calories`, `number_meals`, `description`, `type_diet`) VALUES
(1, 'Dieta Estàndard', 0, 5, 'Dieta Estàdard per Baixar el Nombre de kcal en la nostra alimentació', 2);




--
-- Volcado de datos para la tabla `diets_dishes`
--

INSERT INTO `diets_dishes` (`diet_id_diet`, `dish_id_dish`, `week_day`, `meal`) VALUES
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


--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name_user`, `lastname_user`, `nickname_user`, `password`, `type_user`,`image_user`) VALUES
(1, 'Gerard', 'César ', 'gcesar', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'P',null),
(2, 'Eric', 'Borràs', 'eborras', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'N',null),
(3, 'Laura', 'César', 'lcesar', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'N',null),
(4, 'Ivàn', 'Puga', 'ipuga', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'P',null),
(5, 'Yaiza', 'Castillo', 'ycastillo', '$2y$10$1C9jR6IhzxES9dvxs5Nu8e4hvop10IQZKvUqSLcGgF7z10Q5f3wQi', 'P',null),
(6, 'Nerea', 'Torregrosa', 'ntorregrosa', '$2y$10$20C3oeJzB7TaXV.2lucLX.Tv1iWmejl39/KGJeQdjwH33q3y6ODha', 'P',null);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `nutricionist`
--

INSERT INTO `nutricionists` (`id_nutricionist`) VALUES
(2),
(3);

--
-- Volcado de datos para la tabla `pacient`
--

INSERT INTO `patients` (`id_pacient`, `assigned_nutricionist`, `email_patient`, `phone_patient`, `address_patient`, `current_diet`) VALUES
(1, 2, 'gcesar@milaifontanals.com', '+656394050', 'Can Debot', 1),
(4, 3, 'ipuga@milaifontanals.org', '+656394051', NULL, 1),
(5, NULL, NULL, NULL, NULL, 1),
(6, 3, 'ntorregrosa@milaifontanals.org', NULL, NULL, NULL);


--
-- Volcado de datos para la tabla `historial_pacient`
--
INSERT INTO `historial_patient` (`start_date`, `id_patient`, `diet`, `weigth`, `heigth`, `chest`, `leg`, `arm`, `hip`, `control_date`, `status`) VALUES
('2023-04-20', 1, 1, 80.00, 1.76, 75.00, 93.00, 92.00, 93.00, '2023-04-13', 'I'),
('2023-04-20', 1, 1, 77.30, 1.76, 70.00, 88.00, 90.00, 80.00, '2023-04-20', 'I'),
('2023-04-20', 1, 1, 78.30, 1.76, 70.00, 90.00, 90.00, 93.00, '2023-04-27', 'I'),
('2023-04-20', 1, 1, 77.65, 1.76, 65.00, 87.00, 86.00, 90.00, '2023-05-04', 'F');