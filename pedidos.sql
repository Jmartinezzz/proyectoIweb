-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2019 a las 17:47:22
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Description` text COLLATE utf8_spanish_ci,
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`, `eliminado`) VALUES
(1, 'seafood', 'algas marinas y pescado mareño', b'0'),
(2, 'condimentos', 'Salsas dulces y saladas, condimentos, untables y condimentos.', b'1'),
(3, 'Detergentes', 'productos para lavado de prendas de vestir', b'1'),
(7, 'sss', 'ssss', b'1'),
(8, 'otra', 'ssss', b'1'),
(9, 'lacteos', 'leche, crema, quesos y mas de lo que le gusta', b'1'),
(10, 'juguetes', 'mercaderia hechadeplastico o metal para jugar', b'1'),
(11, 'embutidos', 'chorizo, salchichatodo lo que tenga que ver con el cerdo', b'0'),
(12, 'mascotas', 'productos para perros, gatos y aves', b'1'),
(13, 'me borraasder', 'borremeasder', b'1'),
(14, 'condimentos', 'ingredientes para sasonar comida', b'0'),
(15, 'detergentes', 'articulos de limpieza en general', b'0'),
(16, 'plastico', 'utileria de plastico etc', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CompanyName` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ContactName` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Address` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Phone` varchar(24) COLLATE utf8_spanish_ci DEFAULT NULL,
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`CustomerID`, `CompanyName`, `ContactName`, `Address`, `Phone`, `eliminado`) VALUES
(1, 'Crustaceo cascarudos', 'mariano lopez p.', 'col. san benito s.ss', '74527017', b'0'),
(2, 'Mc Cormics', 'marthir luther king', 'col. flor blanca', '76891234', b'0'),
(3, 'molsa', 'roberto dawison', 'bulevar del ejercito nacional sentido a oriente', '78787878', b'0'),
(4, 'calpi', 'antonio moreno', 'calle al mirador, km12 entre santa ana y el tupal', '22345656', b'0'),
(5, 'cangry', 'caser', 'asder', '78675656', b'1'),
(8, 'rancho navarra2', 'dennis eliseo2', 'la tiendona2', '78777878', b'0'),
(9, 'la tiendona', 'ruth concoha', 'residelcial concoha', '79797878', b'0'),
(11, 'hotel el doral', 'fernando lopez', 'calle alpuerto de la libertad, km 45 santa tecla', '76661212', b'1'),
(12, 'ubbers3', 'samuel jackson', 'cerca de metro centro', '78122323', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FirstName` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `Address` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`EmployeeID`, `LastName`, `FirstName`, `BirthDate`, `Address`, `phone`, `eliminado`) VALUES
(1, 'corado', 'francisco', '2000-05-15 00:00:00', 'cimas de san federico III', '7689-1212', b'1'),
(2, 'chavez2', 'jose2', '1973-05-13 00:00:00', 'san marcos calle 88, primera avenida', '78786767', b'1'),
(6, 'ddd', 'dd', '2019-05-03 00:00:00', 'fff', '78777878', b'1'),
(7, 'chumel', 'edwar', '2019-05-02 00:00:00', 'desconocida de', '76676767', b'0'),
(8, 'chumelo', 'pavicios', '2016-05-01 00:00:00', 'nada', '78787970', b'1'),
(9, 'alarcon', 'francisco', '2001-06-05 00:00:00', 'colonia flor negra', '78988989', b'0'),
(10, 'lopez', 'fernando', '2019-05-03 00:00:00', 'estadio cuscatlan', '78787878', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `idEntrada` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`idEntrada`, `ProductID`, `cantidad`) VALUES
(1, 1, 3),
(2, 1, 200),
(3, 4, 200),
(4, 14, 100),
(5, 4, 55),
(6, 16, 44),
(7, 8, 122),
(8, 14, 44),
(9, 8, 100),
(10, 17, 200),
(11, 14, 200),
(12, 14, 33),
(13, 1, 100),
(14, 21, 25);

--
-- Disparadores `entradas`
--
DELIMITER $$
CREATE TRIGGER `tg_entradas` BEFORE INSERT ON `entradas` FOR EACH ROW update products set UnitsInStock = ((SELECT products.UnitsInStock  WHERE ProductID = new.ProductID) + new.cantidad) where ProductID = new.ProductID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `Quantity`, `Discount`) VALUES
(2, 3, 24, NULL),
(1, 1, 30, NULL),
(2, 4, 12, NULL),
(9, 3, 12, NULL),
(9, 4, 12, NULL),
(10, 17, 3, NULL),
(11, 3, 5, NULL),
(11, 1, 5, NULL),
(12, 16, 2, NULL),
(12, 4, 3, NULL),
(13, 17, 2, NULL),
(14, 8, 3, NULL),
(15, 1, 2, NULL),
(16, 14, 4, NULL),
(17, 1, 50, NULL),
(17, 3, 2, NULL),
(18, 21, 2, NULL),
(18, 20, 1, NULL),
(18, 19, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ShipAddress` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `EmployeeID`, `OrderDate`, `ShipAddress`, `total`, `created_at`) VALUES
(1, 1, 1, '2019-05-05 00:00:00', 'residencial galicia', '46.80', NULL),
(2, 2, 2, '2019-05-06 00:00:00', 'colonia la floresta soyapango', '176.40', '2019-05-23 06:09:00'),
(9, NULL, NULL, '2019-05-23 23:58:31', NULL, '121.80', '2019-05-24 05:58:31'),
(10, NULL, NULL, '2019-05-24 00:18:41', NULL, '6.99', '2019-05-24 06:18:41'),
(11, NULL, NULL, '2019-05-24 00:20:02', NULL, '30.55', '2019-05-24 06:20:02'),
(12, NULL, NULL, '2019-05-24 19:53:14', NULL, '25.92', '2019-05-25 01:53:14'),
(13, NULL, NULL, '2019-05-24 19:57:27', NULL, '4.66', '2019-05-25 01:57:27'),
(14, 2, NULL, '2019-05-24 21:06:36', NULL, '1.65', '2019-05-25 03:06:36'),
(15, NULL, NULL, '2019-05-24 21:07:54', NULL, '3.12', '2019-05-25 03:07:54'),
(16, 9, NULL, '2019-05-24 21:08:44', NULL, '132.00', '2019-05-25 03:08:44'),
(17, NULL, NULL, '2019-05-25 10:14:46', NULL, '87.10', '2019-05-25 16:14:46'),
(18, 4, NULL, '2019-11-19 13:01:19', NULL, '17.22', '2019-11-19 19:01:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `UnitPrice` decimal(8,2) DEFAULT NULL,
  `UnitsInStock` int(11) DEFAULT NULL,
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `SupplierID`, `CategoryID`, `UnitPrice`, `UnitsInStock`, `eliminado`) VALUES
(1, 'Pescado enlatado', 2, 1, '1.56', 243, b'0'),
(3, 'pulpo en lata', 1, 1, '4.55', 293, b'0'),
(4, 'camarones congelados', 2, 1, '5.60', 452, b'0'),
(6, 'chocolatina', 2, 9, '0.50', 100, b'1'),
(7, 'rinso', 1, 3, '2.45', 222, b'1'),
(8, 'pimienta negra', 5, 11, '0.55', 2219, b'0'),
(14, 'conchas sucias', 1, 1, '33.00', 406, b'0'),
(15, 'prueba', 1, 2, '13.00', 12, b'1'),
(16, 'papas congeladas', 3, 1, '4.56', 242, b'0'),
(17, 'chuleta de cerdo', 1, 11, '2.33', 228, b'0'),
(18, 'rinso de 19g', 5, 15, '0.34', 200, b'0'),
(19, 'frijoles en miel', 2, 14, '2.56', 508, b'0'),
(20, 'balancin de botella', 6, 15, '5.00', 399, b'0'),
(21, 'botellas de plastico', 6, 16, '3.55', 373, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `CompanyName` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ContactName` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Address` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Phone` varchar(24) COLLATE utf8_spanish_ci DEFAULT NULL,
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `CompanyName`, `ContactName`, `Address`, `Phone`, `eliminado`) VALUES
(1, 'Ostras fritas', 'eleodoro portillo', 'col miralvalle', '77777777', b'0'),
(2, 'Ostras sa de cv', 'leonor paz', 'cojutepeque cabañas', '76766767', b'0'),
(3, 'atari', 'albertosky', 'casa de salah', '78122777', b'0'),
(4, 'borrame', 'borrame', 'borrame', '12312322', b'1'),
(5, 'bodega de la cerdita', 'alan stars', 'calle de oro', '78891223', b'0'),
(6, 'siman', 'julio berme', 'calle del poliedro', '78122323', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `eliminado` bit(1) NOT NULL DEFAULT b'0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo`, `eliminado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jm', 'hola@yahoo.es', '$2y$10$zQaDT8hXM4pLmBdwN0xEseda/oKJAQKMKMzUrV8jbs6Epz28BXzBS', 1, b'0', 'B5LEjzsqYlMGrWfB80nw6Di1eJOm9aASIvCYGUNvkAH0HXPooeGTeV6Xf24I', '2019-05-30 06:00:00', '2019-05-25 16:15:36'),
(2, 'ponki', 'm.jorgr1slv@gmail.com', '$2y$10$tP0ZkQjvR/zPpBI.nl2t5OKqLfZCmnK30lBfs0hFlD40LEAw/siEu', 2, b'0', 'NsoSc55xsdlqkvlDhVig4iVxzko7d6pQOpyaRxeMS9MHvC2MHRkBBeNWz7tS', '2019-05-21 22:54:04', '2019-05-22 06:05:56'),
(3, 'vendedor', 'm.jorge1slv@yahoo.es', '$2y$10$Fg/N5h.Stn0t.q5Wg/yr1OzKiX4FRmiT28vfCgKCFrU9wxO3zkX6e', 2, b'0', 'XMQjYD9Tr5lbzqRPH8i7Kz5BKzqbkKAhCvSMPCpgDQ0V3t9sTQqk5S2a1Q15', '2019-05-21 22:55:18', '2019-05-25 16:17:47'),
(4, 'admin', 'admin@yahoo.es', '$2y$10$7Og6ZLPYDC8Uc2p2cD5YquTijtVVr2cdd.qZyMa3vqg/Lc/AE9uLa', 1, b'0', NULL, '2019-05-21 23:00:40', '2019-05-21 23:00:40'),
(5, 'pk2jm26', 'admin123@yahoo.es', '$2y$10$0Z5g.2KEJ.EVJ/lP2FJkxuFBliHwpcLxk1TItl3F3mBJ3eVB/JDva', 2, b'0', 'jzLfNzqvqUtJAMSg9L6CQ9wc2FfmRUPQcCSTYPWFEWZSB5kS1lPc15RUEP2Z', '2019-05-21 23:03:10', '2019-11-20 00:55:43'),
(6, 'qwew', 'm.qwe@yahoo.es', '$2y$10$cQaMSKvtS/nz9Fz9x0yn..RP9kY57oFaWJSJw1e87NrWFedAYaGAS', 1, b'1', NULL, '2019-05-21 23:04:53', '2019-05-22 00:15:05'),
(7, 'roso', 'rosololo@yahoo.es', '$2y$10$1qRPNjq30ru6PSevhYVMl.WSXmMNE0jyQYUTLMrPuHVvi/c/VokmO', 2, b'0', NULL, '2019-05-21 23:18:55', '2019-05-22 06:06:34'),
(8, 'borrame', 'borrame@yahppes.es', '$2y$10$3zqB2uGV8OnVDaTpaO1FC.F2FKq1Tqrja6pvLu9BP/lavBRJUa9Au', 1, b'1', NULL, '2019-05-22 00:16:02', '2019-05-22 00:16:23'),
(9, 'jorge', 'as@yahoo.es', '$2y$10$JVQIcpMZKSBotx5e5fElT.Bn2eifdseofLOGSsbfco64akqLtZ7Am', 1, b'0', '3goC4B1Y0RsWkuLpGr7gYmrXfrQwsV0Z5RJsS9rVzqf8pelh1ph5qbzpYL7W', '2019-11-19 03:32:37', '2019-12-06 22:04:30'),
(10, 'carlitos jr', 'carlos@yahoo.es', '$2y$10$yib93AAV7uY3yqPwiT5z3uKWOgYzRQFMQPlhjPw0EVb/4iaFwvpZi', 2, b'0', NULL, '2019-11-19 09:44:41', '2019-11-19 09:44:41'),
(11, 'supervisor1', 'sp@yahoo.es', '$2y$10$i1dLxm9sGSUKEjb7ShEh3edDqs/BTSHXzKbvNyH1AmOmxA64ijZgK', 2, b'0', NULL, '2019-12-06 09:22:43', '2019-12-06 09:22:43'),
(12, 'jorge12', 'c12arlos@yahoo.es', '$2y$10$vo1b8KKuOjedtyKF.9U3Au2orDAaBPS7tsWC.5/ftYWo6otcGqLtm', 2, b'0', 'xdsPY6ks8NiHpdloVbNLPlYXfUSpjlTmIX2Kwojo6tXgcZZ4cs8Vnw9Bh0GA', '2019-12-07 02:25:04', '2019-12-06 20:28:02'),
(13, 'borrar', 'borrar@yahoo.es', '$2y$10$86WovJdncgQccvSJFASWaOa3Nd4SMtCqJ23VJFNboE1cC7IIWJd6i', 1, b'1', NULL, '2019-12-06 22:01:01', '2019-12-06 22:01:54'),
(14, 'borra2', 'brq@yahoo.es', '$2y$10$1lxhQDxeKGqdYRRPgjsHHu6MZGMjYDPY9mAAdNePiSjaHtyPBomcy', 1, b'0', NULL, '2019-12-06 22:02:21', '2019-12-06 22:02:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `idEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Filtros para la tabla `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_od_p` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
