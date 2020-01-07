-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Jan 07, 2020 at 07:52 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isad251_salrubaye`
--
CREATE DATABASE IF NOT EXISTS `isad251_salrubaye` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `isad251_salrubaye`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_sales`
-- (See below for the actual view)
--
CREATE TABLE `daily_sales` (
`inday` int(2)
,`inmonth` int(2)
,`inyear` int(4) unsigned
,`ProductName` varchar(300)
,`sales` decimal(17,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `ProductCost` decimal(7,2) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `desicription` varchar(300) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `ProductCost`, `ProductName`, `Type`, `desicription`, `image`, `stock`) VALUES
(22, '7.50', 'Belgian waffle', 'food', 'Vanilla flavored batter with malted flour 7.50', 'belgian-waffles1.jpg', 150),
(23, '7.50', 'scrambled egg', 'food', 'Scrambled eggs roasted red pepper and garlic, with green onions 7.50', 'Scrambled_eggs.jpg', 150),
(24, '8.50', 'Blue bery pancake', 'food', 'With syrup, butter and lots of berries 8.50', 'BlueberryPancakes.jpg', 150),
(25, '2.50', 'Cofee', 'Drink', 'Regular coffee 2.50', 'cofe.jpg', 150),
(26, '4.50', 'Chocolate', 'Drink', 'Chocolate espresso with milk 4.50', 'chocolato.jpg', 150),
(27, '5.00', 'Carretto', 'Drink', 'Whiskey and coffee 5.00', 'Corretto.jpg', 150),
(28, '3.00', 'iced tea', 'Drink', 'Hot tea, except not hot 3.00', 'Iced tea.jpg', 150),
(29, '2.50', 'Soda', 'Drink', 'Coke, Sprite, Fanta, etc. 2.50', 'Soda.jpg', 150),
(1234, '87.00', 'asddasdasd', '789', '789', 'mmmm', NULL),
(1238, '90.00', 'ccccc', 'foods', 'good to eat', 'image.pjp', NULL),
(1239, '99999.00', 'water', 'drinks', 'heathy', 'botol.pgp', NULL),
(1241, '18.00', 'hkjkj', 'drink', 'good to drink', 'ihkl.pgp', NULL);

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `TRCHECKSTOCK` BEFORE INSERT ON `items` FOR EACH ROW BEGIN
    IF (NEW.stock < 10) THEN 
        SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'the stock is low!';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Quantity` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Quantity`, `OrderID`, `ItemID`) VALUES
(1, 40, 19),
(3, 44, 20),
(4, 55, 22),
(2, 59, 19),
(2, 60, 19),
(4, 61, 19),
(1, 62, 19),
(1, 62, 20),
(3, 63, 19),
(1, 63, 20),
(1, 63, 24),
(2, 64, 19),
(1, 65, 19),
(1, 66, 20),
(1, 67, 27),
(3, 68, 19),
(2, 68, 22),
(1, 68, 24),
(2, 68, 29),
(1, 69, 19),
(2, 69, 29),
(1, 70, 19),
(1, 71, 19),
(4, 72, 19),
(2, 72, 20),
(1, 72, 29),
(6, 73, 19),
(1, 73, 20),
(5, 74, 19),
(2, 75, 19),
(2, 76, 22),
(1, 76, 27),
(1, 77, 27),
(1, 77, 29),
(1, 78, 23),
(2, 79, 23),
(1, 79, 27),
(1, 81, 26),
(101, 81, 27),
(1, 82, 23),
(1, 83, 23),
(1, 83, 24),
(1, 84, 28),
(1, 85, 24),
(1, 86, 24),
(1, 86, 29),
(1, 87, 28),
(1, 87, 29),
(1, 88, 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `TableNo` int(11) NOT NULL,
  `OrderTimeDate` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `TableNo`, `OrderTimeDate`, `userID`) VALUES
(40, 2, '2012-06-23 12:00:00', 3),
(44, 3, '2016-11-21 06:30:00', 2),
(55, 4, '2010-06-10 04:15:00', 3),
(56, 4, '2019-12-27 14:26:10', 3),
(57, 4, '2019-12-27 14:27:19', 3),
(58, 4, '2019-12-27 14:27:38', 3),
(59, 4, '2019-12-27 14:28:47', 3),
(60, 4, '2019-12-27 14:30:50', 3),
(61, 4, '2019-12-27 14:36:42', 3),
(62, 4, '2019-12-27 14:37:30', 3),
(63, 4, '2019-12-27 14:49:36', 3),
(64, 4, '2019-12-27 14:52:25', 3),
(65, 4, '2019-12-27 15:35:24', 3),
(66, 4, '2019-12-27 15:40:46', 3),
(67, 4, '2019-12-27 15:42:16', 3),
(68, 4, '2019-12-27 15:46:37', 3),
(69, 4, '2019-12-27 15:47:09', 3),
(70, 4, '2019-12-27 15:48:21', 3),
(71, 4, '2019-12-27 15:49:37', 3),
(72, 4, '2019-12-27 15:51:10', 3),
(73, 4, '2019-12-27 23:48:06', 3),
(74, 4, '2019-12-27 23:51:54', 3),
(75, 4, '2019-12-28 00:29:02', 3),
(76, 4, '2019-12-28 20:24:20', 3),
(77, 4, '2019-12-28 23:25:37', 3),
(78, 4, '2019-12-31 11:54:30', 3),
(79, 4, '2019-12-31 12:45:22', 3),
(80, 4, '2019-12-31 12:46:33', 3),
(81, 4, '2019-12-31 12:47:37', 3),
(82, 4, '2019-12-31 12:59:19', 3),
(83, 4, '2019-12-31 13:02:07', 3),
(84, 4, '2019-12-31 13:03:56', 3),
(85, 4, '2019-12-31 13:35:23', 3),
(86, 4, '2019-12-31 13:37:50', 3),
(87, 4, '2019-12-31 13:40:49', 3),
(88, 4, '2020-01-05 00:44:15', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sales`
-- (See below for the actual view)
--
CREATE TABLE `sales` (
`OrderID` int(11)
,`TotalCost` decimal(39,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserFirstName` varchar(30) NOT NULL,
  `UserLastName` varchar(30) NOT NULL,
  `UserEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserFirstName`, `UserLastName`, `UserEmail`) VALUES
(1, 'tom', 'hance', 'tomhance@yahoo.com'),
(2, 'zee', 'roj', 'zeeroj@gmail.com'),
(3, 'Dee', 'McGrath', 'deeMcgrath@gmail.com'),
(100, 'sara', 'luscombe', 'saraluscombe@admin.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdrink`
-- (See below for the actual view)
--
CREATE TABLE `vdrink` (
`desicription` varchar(300)
,`ItemID` int(11)
,`ProductCost` decimal(7,2)
,`ProductName` varchar(300)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vfood`
-- (See below for the actual view)
--
CREATE TABLE `vfood` (
`desicription` varchar(300)
,`ItemID` int(11)
,`ProductCost` decimal(7,2)
,`ProductName` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure for view `daily_sales`
--
DROP TABLE IF EXISTS `daily_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ISAD251_SAlRubaye`@`%` SQL SECURITY DEFINER VIEW `daily_sales`  AS  select year(`orders`.`OrderTimeDate`) AS `inyear`,month(`orders`.`OrderTimeDate`) AS `inmonth`,dayofmonth(`orders`.`OrderTimeDate`) AS `inday`,`items`.`ProductName` AS `ProductName`,(`orderdetails`.`Quantity` * `items`.`ProductCost`) AS `sales` from ((`orders` join `orderdetails` on((`orders`.`OrderID` = `orderdetails`.`OrderID`))) join `items` on((`items`.`ItemID` = `orderdetails`.`ItemID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `sales`
--
DROP TABLE IF EXISTS `sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ISAD251_SAlRubaye`@`%` SQL SECURITY DEFINER VIEW `sales`  AS  select sum((`orderdetails`.`Quantity` * `items`.`ProductCost`)) AS `TotalCost`,`orders`.`OrderID` AS `OrderID` from ((`orderdetails` join `items`) join `orders`) where ((`orders`.`OrderID` = `orderdetails`.`OrderID`) and (`orderdetails`.`ItemID` = `items`.`ItemID`)) group by `orders`.`OrderID` ;

-- --------------------------------------------------------

--
-- Structure for view `vdrink`
--
DROP TABLE IF EXISTS `vdrink`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ISAD251_SAlRubaye`@`%` SQL SECURITY DEFINER VIEW `vdrink`  AS  select `items`.`ItemID` AS `ItemID`,`items`.`ProductName` AS `ProductName`,`items`.`desicription` AS `desicription`,`items`.`ProductCost` AS `ProductCost` from `items` where (`items`.`Type` = 'Drink') ;

-- --------------------------------------------------------

--
-- Structure for view `vfood`
--
DROP TABLE IF EXISTS `vfood`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ISAD251_SAlRubaye`@`%` SQL SECURITY DEFINER VIEW `vfood`  AS  select `items`.`ItemID` AS `ItemID`,`items`.`ProductName` AS `ProductName`,`items`.`desicription` AS `desicription`,`items`.`ProductCost` AS `ProductCost` from `items` where (`items`.`Type` = 'food') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`),
  ADD UNIQUE KEY `ItemID` (`ItemID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`ItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1242;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
