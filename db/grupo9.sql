-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2021 a las 10:55:49
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo9`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `owner` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `location` text COLLATE latin1_general_ci NOT NULL,
  `m2` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `field`
--

INSERT INTO `field` (`id`, `owner`, `location`, `m2`) VALUES
(1, 'user', '[{\"lat\":\"38.969692\",\"lng\":\"-0.165704\"},{\"lat\":\"38.970636\",\"lng\":\"-0.163448\"},{\"lat\":\"38.969723\",\"lng\":\"-0.162777\"},{\"lat\":\"38.968808\",\"lng\":\"-0.164984\"}]', 0),
(2, 'AdriTur', '[{\"lat\":\"38.985719\",\"lng\":\"-0.190415\"},\r\n{\"lat\":\"38.986814\",\"lng\":\"-0.188155\"},\r\n{\"lat\":\"38.986344\",\"lng\":\"-0.187105\"},\r\n{\"lat\":\"38.985418\",\"lng\":\"-0.186767\"},\r\n{\"lat\":\"38.984776\",\"lng\":\"-0.188521\"},\r\n{\"lat\":\"38.984363\",\"lng\":\"-0.188333\"},\r\n{\"lat\":\"38.983972\",\"lng\":\"-0.189368\"}]', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `surname`, `email`, `message`, `date`) VALUES
(1, 'asdadasd', 'adasdad', 'asdasdad', 'adsdasdasd', '2021-05-14 08:41:30'),
(2, 'csadasds', 'sadasdasdasda', 'asdasdsad', 'asdasdsad', '2021-05-14 08:43:51'),
(3, 'asdasdasd', 'adasdsad', 'asdadasd', 'asdasdasd', '2021-05-14 08:43:57'),
(4, 'csadasds', 'sdad', 'sadas', 'adsdada', '2021-05-14 08:44:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plot`
--

CREATE TABLE `plot` (
  `id` int(11) NOT NULL,
  `fieldID` int(11) NOT NULL,
  `location` text COLLATE latin1_general_ci NOT NULL,
  `qty_probes` int(11) NOT NULL DEFAULT 0,
  `m2` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `plot`
--

INSERT INTO `plot` (`id`, `fieldID`, `location`, `qty_probes`, `m2`) VALUES
(1, 1, '[\r\n{\"lat\":\"38.970107\",\"lng\":\"-0.164718\"},\r\n{\"lat\":\"38.970013\",\"lng\":\"-0.164927\"},\r\n{\"lat\":\"38.969429\",\"lng\":\"-0.164479\"},\r\n{\"lat\":\"38.969546\",\"lng\":\"-0.164248\"}\r\n]\r\n\r\n', 0, 0),
(2, 1, '[\r\n{\"lat\":\"38.970113\",\"lng\":\"-0.164708\"},\r\n{\"lat\":\"38.970646\",\"lng\":\"-0.163450 \"},\r\n{\"lat\":\"38.970048\",\"lng\":\"-0.162997 \"},\r\n{\"lat\":\"38.969543\",\"lng\":\"-0.164233\"}\r\n]', 0, 0),
(3, 1, '[\r\n{\"lat\":\"38.969424\",\"lng\":\"-0.164493\"},\r\n{\"lat\":\"38.970048\",\"lng\":\"-0.162996\"},\r\n{\"lat\":\"38.969723\",\"lng\":\"-0.162781\"},\r\n{\"lat\":\"38.969087\",\"lng\":\"-0.164264\"}\r\n]', 0, 0),
(4, 1, '[\r\n{\"lat\":\"38.969704\",\"lng\":\"-0.165696\"},\r\n{\"lat\":\"38.969888\",\"lng\":\"-0.165267\"},\r\n{\"lat\":\"38.969617\",\"lng\":\"-0.165074\"},\r\n{\"lat\":\"38.969440\",\"lng\":\"-0.165484\"}\r\n]', 0, 0),
(5, 1, '[\r\n{\"lat\":\"38.969440\",\"lng\":\"-0.165484\"},\r\n{\"lat\":\"38.969617\",\"lng\":\"-0.165074\"},\r\n{\"lat\":\"38.969325\",\"lng\":\"-0.164864\"},\r\n{\"lat\":\"38.969162\",\"lng\":\"-0.165272\"}\r\n]', 0, 0),
(6, 1, '[\r\n{\"lat\":\"38.969888\",\"lng\":\"-0.165267\"},\r\n{\"lat\":\"38.970011\",\"lng\":\"-0.164923\"},\r\n{\"lat\":\"38.969081\",\"lng\":\"-0.164274\"},\r\n{\"lat\":\"38.968802\",\"lng\":\"-0.164996\"},\r\n{\"lat\":\"38.969117\",\"lng\":\"-0.165232\"},\r\n{\"lat\":\"38.969296\",\"lng\":\"-0.164832\"}\r\n]', 0, 0),
(7, 2, '[{\"lat\":\"38.985719\",\"lng\":\"-0.190415\"},\r\n{\"lat\":\"38.986256\",\"lng\":\"-0.189408\"},\r\n{\"lat\":\"38.984367\",\"lng\":\"-0.188339\"},\r\n{\"lat\":\"38.983987\",\"lng\":\"-0.189388\"}\r\n]', 0, 0),
(8, 2, '[{\"lat\":\"38.985444\",\"lng\":\"-0.188926\"},\r\n{\"lat\":\"38.98576\",\"lng\":\"-0.187955\"},\r\n{\"lat\":\"38.985113\",\"lng\":\"-0.187624\"},\r\n{\"lat\":\"38.984785\",\"lng\":\"-0.188545\"}\r\n]', 0, 0),
(9, 2, '[{\"lat\":\"38.985932\",\"lng\":\"-0.188014\"},\r\n{\"lat\":\"38.986157\",\"lng\":\"-0.187043\"},\r\n{\"lat\":\"38.985440\",\"lng\":\"-0.186775\"},\r\n{\"lat\":\"38.985111\",\"lng\":\"-0.187633\"}\r\n]', 0, 0),
(10, 2, '[{\"lat\":\"38.986547\",\"lng\":\"-0.188804\"},\r\n{\"lat\":\"38.986711\",\"lng\":\"-0.188109\"},\r\n{\"lat\":\"38.986315\",\"lng\":\"-0.187540\"},\r\n{\"lat\":\"38.986182\",\"lng\":\"-0.188001\"},\r\n{\"lat\":\"38.986474\",\"lng\":\"-0.188264\"},\r\n{\"lat\":\"38.986374\",\"lng\":\"-0.188725\"}\r\n]', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `probe`
--

CREATE TABLE `probe` (
  `id` int(11) NOT NULL,
  `plotID` int(11) NOT NULL,
  `location` text COLLATE latin1_general_ci NOT NULL,
  `humidity` int(11) NOT NULL DEFAULT 0,
  `temperature` float NOT NULL DEFAULT 0,
  `salinity` float NOT NULL DEFAULT 0,
  `luminity` float NOT NULL DEFAULT 0,
  `lastUpdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `probe`
--

INSERT INTO `probe` (`id`, `plotID`, `location`, `humidity`, `temperature`, `salinity`, `luminity`, `lastUpdate`) VALUES
(1, 1, '[{\"lat\":\"38.969969\",\"lng\":\"-0.164740\"}]', 50, 29, 70, 0, '2021-05-14 08:46:20'),
(2, 1, '[{\"lat\":\"38.969793\",\"lng\":\"-0.164604\"}]', 57, 29, 71, 0, '2021-05-14 08:46:38'),
(3, 1, '[{\"lat\":\"38.969607\",\"lng\":\"-0.164462\"}]', 53, 28, 68, 0, '2021-05-14 08:46:57'),
(4, 2, '[{\"lat\":\"38.970107\",\"lng\":\"-0.164199\"}]', 55, 30, 72, 0, '2021-05-14 08:47:15'),
(5, 2, '[{\"lat\":\"38.970293\",\"lng\":\"-0.163754\"}]', 52, 29, 71, 0, '2021-05-14 08:47:29'),
(6, 2, '[{\"lat\":\"38.969815\",\"lng\":\"-0.164014\"}]', 70, 29, 72, 0, '2021-05-14 08:47:50'),
(7, 2, '[{\"lat\":\"38.970032\",\"lng\":\"-0.163443\"}]', 53, 26, 76, 0, '2021-05-14 08:48:07'),
(8, 3, '[{\"lat\":\"38.969413\",\"lng\":\"-0.164012\"}]', 49, 31, 74, 0, '2021-05-14 08:48:27'),
(9, 3, '[{\"lat\":\"38.969576\",\"lng\":\"-0.163645\"}]', 48, 27, 71, 0, '2021-05-14 08:48:42'),
(11, 3, '[{\"lat\":\"38.969709\",\"lng\":\"-0.163296\"}]', 53, 29, 70, 0, '2021-05-14 08:48:59'),
(12, 4, '[{\"lat\":\"38.969668\",\"lng\":\"-0.165376\"}]', 47, 34, 79, 0, '2021-05-14 08:50:15'),
(13, 5, '[{\"lat\":\"38.969376\",\"lng\":\"-0.165175\"}]', 56, 29, 74, 0, '2021-05-14 08:50:39'),
(14, 6, '[{\"lat\":\"38.969762\",\"lng\":\"-0.164950\"}]', 42, 34, 78, 0, '2021-05-14 08:50:57'),
(16, 6, '[{\"lat\":\"38.969428\",\"lng\":\"-0.164684\"}]', 34, 29, 70, 0, '2021-05-14 08:51:11'),
(17, 6, '[{\"lat\":\"38.969094\",\"lng\":\"-0.164711\"}]', 51, 32, 75, 0, '2021-05-14 08:51:32'),
(18, 7, '[{\"lat\":\"38.985650\",\"lng\":\"-0.189713\"}]', 49, 29, 69, 0, '2021-05-14 08:52:01'),
(19, 7, '[{\"lat\":\"38.985066\",\"lng\":\"-0.189354\"}]', 81, 34, 74, 0, '2021-05-14 08:52:31'),
(20, 7, '[{\"lat\":\"38.984649\",\"lng\":\"-0.189079\"}]', 55, 28, 67, 0, '2021-05-14 08:52:51'),
(21, 8, '[{\"lat\":\"38.985341\",\"lng\":\"-0.188575\"}]', 48, 29, 67, 0, '2021-05-14 08:53:06'),
(22, 8, '[{\"lat\":\"38.985486\",\"lng\":\"-0.188111\"}]', 54, 29, 72, 0, '2021-05-14 08:53:19'),
(23, 8, '[{\"lat\":\"38.985137\",\"lng\":\"-0.188436\"}]', 51, 26, 65, 0, '2021-05-14 08:53:37'),
(24, 8, '[{\"lat\":\"38.985208\",\"lng\":\"-0.187964\"}]', 45, 28, 72, 0, '2021-05-14 08:53:51'),
(25, 9, '[{\"lat\":\"38.985858\",\"lng\":\"-0.187411\"}]', 56, 32, 69, 0, '2021-05-14 08:54:06'),
(26, 9, '[{\"lat\":\"38.985483\",\"lng\":\"-0.187288\"}]', 54, 31, 70, 0, '2021-05-14 08:54:16'),
(27, 10, '[{\"lat\":\"38.986571\",\"lng\":\"-0.188441\"}]', 53, 29, 70, 0, '2021-05-14 08:54:27'),
(28, 10, '[{\"lat\":\"38.986413\",\"lng\":\"-0.187910\"}]', 51, 29, 70, 0, '2021-05-14 08:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `role` enum('USER','ADMIN') CHARACTER SET latin1 NOT NULL DEFAULT 'USER',
  `type` enum('USER','COMPANY') NOT NULL DEFAULT 'USER',
  `lastLogin` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `type`, `lastLogin`) VALUES
(1, 'user', '$2y$10$jJzjh6E1f1LDsqzH6dzzyOX5yBDOjQdk3axSoBdsDoQxkS9oUmpDy', 'user@user.es', 'USER', 'USER', '2021-05-03 07:35:24'),
(2, 'admin', '$2y$10$jJzjh6E1f1LDsqzH6dzzyOX5yBDOjQdk3axSoBdsDoQxkS9oUmpDy', 'admin@admin.es', 'ADMIN', 'USER', '2021-05-03 07:37:41'),
(3, 'AdriTur', '$2y$10$ee5XpAo.tPeAe1jBKL1EwuxSQkmkkzwLU44fwoUkC7eO33udoUUOC', 'adri@tur.es', 'USER', 'USER', '2021-05-13 16:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE `user_info` (
  `userID` int(11) NOT NULL,
  `dni` varchar(9) CHARACTER SET latin1 NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USERFIELD` (`owner`);

--
-- Indices de la tabla `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FIELDPLOT` (`fieldID`);

--
-- Indices de la tabla `probe`
--
ALTER TABLE `probe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PLOTPROBE` (`plotID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plot`
--
ALTER TABLE `plot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `probe`
--
ALTER TABLE `probe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `FK_USERFIELD` FOREIGN KEY (`owner`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plot`
--
ALTER TABLE `plot`
  ADD CONSTRAINT `FK_FIELDPLOT` FOREIGN KEY (`fieldID`) REFERENCES `field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `probe`
--
ALTER TABLE `probe`
  ADD CONSTRAINT `FK_PLOTPROBE` FOREIGN KEY (`plotID`) REFERENCES `plot` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `FK_USERDATA` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
