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
(9, 'Oli d\'Oliva Verge Extra', 884.00, 4),
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
(62, 'Tàperes', 26.00, 5);


--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id_dishes`, `name_dishes`, `calories`) VALUES
(1, 'Café amb Llet Desnatada', 47.00),
(2, 'Té Verd', 2.00),
(3, 'Kiwi', 51.00),
(4, 'Nous', 654.00),
(5, 'Yogur Natural amb Pera ', 150.00),
(6, 'Daurada al Forn amb Amanida', 1040.00),
(7, 'Llesca al Pa Integral amb Formatge Cottage i Alvocat', 414.00),
(8, 'Espàrrecs de Marge', 902.00),
(9, 'Calamar', 1130.00),
(10, 'Llesca de Pa Integral amb Tomàquet i Alvocat', 334.00),
(11, 'Poma Canyella i Nous', 132.00),
(12, 'Amanida de Enciam, LLombarda i Pastanaga', 1000.00),
(13, 'Cuixa de Gall Dindi amb Pera', 313.00),
(14, 'LLesca de Pa Integral amb Hummus i 1/2 ou cuit', 413.00),
(15, 'Wok de Verdures amb Llagostins ', 17100.00),
(16, 'Yogur Natural amb Fruits Vermells i Civada', 185.00),
(17, 'Macedonia de Kiwi, Poma i Pera', 170.00),
(18, 'Verdures a la Plancha', 975.00),
(19, 'Truita Francesa de Xampinyons i Espècies', 1097.00),
(20, 'Llesca de Pa Integral amb Tonyina Natural i Tomàquet', 240.00),
(21, 'Cigrons amb Salmó, Enciam i Pera', 1168.00),
(22, 'Llesca de Pa Integral amb Formatge de Burgos i mitja Poma ', 18144.00),
(23, 'Pera i Nous', 711.00),
(24, 'Carbassó amb Mató', 998.00),
(25, 'Llom de Lluç amb Vinagreta de Pebrots', 1140.00),
(26, 'Amanida Nicoise', 52363.00),
(27, 'Llesca de Pa Integral amb 2 rodanxes de Alvocat i Tomàquet', 334.00),
(28, 'Piña i Yogur Natural sense Sucre', 143.00),
(29, 'Amaninda de Quinoa amb Cigrons', 1423.00),
(30, 'Formatge Fresc i Nous', 684.00),
(31, 'Gaspatxo Andalús', 1003.00),
(32, 'Llom de Vedella a la Plancha', 1062.00);



--
-- Volcado de datos para la tabla `dishes_ingredients`
--

INSERT INTO `dishes_ingredients` (`dishes_id_dishes`, `ingredients_id_ingredient`, `quantity`, `mesure`) VALUES
(1, 1, 1.00, 3),
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
(9, 17, 1.00, 3);




--
-- Volcado de datos para la tabla `diets`
--
INSERT INTO `diets` (`id_diet`, `name`, `calories`, `number_meals`, `type`) VALUES
(1, 'Dieta Estàndard', 105532.00, 5, 'Dieta Estàdard per Baixar el Nombre de kcal en la nostra alimentació');



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


--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `lastname_user`, `nickname_user`, `password_user`, `type_user`) VALUES
(1, 'Gerard', 'César ', 'gcesar', '2003', 'P'),
(2, 'Eric', 'Borràs', 'eborras', '2003', 'N'),
(3, 'Laura', 'César', 'lcesar', '1990', 'N'),
(4, 'Ivàn', 'Puga', 'ipuga', '1990', 'P'),
(5, 'Yaiza', 'Castillo', 'ycastillo', '1990', 'P'),
(6, 'Nerea', 'Torregrosa', 'ntorregrosa', '2003', 'P');


--
-- Volcado de datos para la tabla `nutricionist`
--

INSERT INTO `nutricionist` (`id_nutricionist`) VALUES
(2),
(3);

--
-- Volcado de datos para la tabla `pacient`
--

INSERT INTO `pacient` (`id_pacient`, `assigned_nutricionist`, `email_pacient`, `phone_pacient`, `address_pacient`, `current_diet`) VALUES
(1, 2, 'gcesar@milaifontanals.com', '656394050', 'Can Debot', 1),
(4, 3, 'ipuga@milaifontanals.org', '656394051', NULL, 1),
(5, NULL, NULL, NULL, NULL, 1),
(6, 3, 'ntorregrosa@milaifontanals.org', NULL, NULL, NULL);


--
-- Volcado de datos para la tabla `historial_pacient`
--

INSERT INTO `historial_pacient` (`id_historial`, `date`, `id_pacient`, `diet`, `weigth`, `heigth`, `chest`, `leg`, `arm`, `hip`) VALUES
(1, '2023-04-20', 1, 1, 78.30, 1.76, 70.00, 90.00, 90.00, 93.00);