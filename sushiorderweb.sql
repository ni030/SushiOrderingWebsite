-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 08:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushiorderweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` varchar(40) NOT NULL DEFAULT uuid(),
  `addressName` varchar(100) DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `postcode` int(5) NOT NULL,
  `userID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `addressName`, `unit`, `address`, `city`, `state`, `postcode`, `userID`) VALUES
('123a01b6-26e2-11ef-a944-00ff93bfad24', 'school2', '11', 'Gg. Basudewo No. 344', 'Sabang', 'Sumatera Utara', 31271, 'd7742fe3-26e1-11ef-a944-00ff93bfad24'),
('784c1b72-255e-11ef-b8b2-00ff93bfad24', 'MRDIY', '11', 'Gg. Basudewo No. 344', 'Sabang', 'Sumatera Utara', 31271, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a'),
('8b66cd19-26de-11ef-a944-00ff93bfad24', 'school', '100', 'Gg. Basudewo No. 344', 'Sabang', 'Sumatera Utara', 31271, '0468372a-26de-11ef-a944-00ff93bfad24'),
('e0e8c960-255e-11ef-b8b2-00ff93bfad24', 'school', '12', 'n28', 'skudai', 'johor', 83100, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `mealID` varchar(40) NOT NULL,
  `mealName` varchar(30) NOT NULL,
  `mealPic` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`mealID`, `mealName`, `mealPic`, `category`, `description`, `price`) VALUES
('M001', 'Boston Roll', 'bostonRoll.png', 'Sushi', 'Colorful Fish Roe.', 3.99),
('M002', 'Tomago', 'tomago.png', 'Sushi', 'Elegant, Luxury Swiss Watches.\r\n\r\n', 2.99),
('M003', 'Kani', 'kani.png', 'Sushi', 'Crab Meat Made From Fish\r\n\r\n', 2.99),
('M004', 'Unagi', 'unagi.png', 'Sushi', 'Grilled freshwater eel.', 4.20),
('M005', 'Gunkan', 'gunkan.png', 'Sushi', 'Seaweed-wrapped sushi delight.', 3.50),
('M006', 'Uramaki', 'uramaki.png', 'Sushi', 'Inside-out sushi rolls', 4.80),
('M007', 'Tuna Onigiri', 'tunaOni.png', 'Sushi', 'Rice stuffed with tuna', 5.60),
('M008', 'Avocado maki', 'avocadoMaki.png', 'Sushi', 'Rolled avocado sushi.', 2.80),
('M009', 'Maki Inari Combo', 'miCombo.png', 'Sushi', 'Sushi roll, tofu pockets.', 6.80),
('M010', 'Maki Set', 'makiSet.png', 'Sushi', 'Sushi roll set.', 6.20),
('M011', 'Eel Maki', 'eelmaki.png', 'Sushi', 'Rolled freshwater eel', 4.30),
('M012', 'Kappa roll', 'kappaRoll.png', 'Sushi', 'Cucumber sushi roll.', 3.99),
('M013', 'Gunkan Maki', 'gunkanmaki.png', 'Sushi', 'Gunkan style sushi.', 2.99),
('M014', 'Salmon Onigiri', 'salmonOni.png', 'Sushi', 'Rice stuffed with salmon.', 6.60),
('M015', 'Fish Onigiri', 'fishOni.png', 'Sushi', 'Rice stuffed with fish.', 5.50),
('M016', 'Sashimi Temaki', 'sashimiTemaki.png', 'Sushi', 'Hand-rolled sashimi cone.', 5.80),
('M017', 'Vege Temaki', 'vegeTemaki.png', 'Sushi', 'Vegetable hand rolls.', 4.90),
('M018', 'Choco Taiyaki', 'chocoTaiyaki.png', 'Sides', 'Chocolate-filled fish cake.', 6.80),
('M019', 'Matcha Taiyaki', 'matcha.png', 'Sides', 'Matcha-filled fish cake.', 6.80),
('M020', 'Vanilla Taiyaki', 'vanilla.png', 'Sides', 'Vanilla-filled fish cake.', 6.80),
('M021', 'Uji-matcha Cake', 'matchaCake.png', 'Sides', 'Matcha-flavored cake delight.', 9.80),
('M022', 'RedBean Mochi', 'mochi.png', 'Sides', 'Sweet red bean mochi.', 5.80),
('M023', 'Daifuku', 'daifuku.png', 'Sides', 'Strawberry stuffed mochi.', 7.80),
('M024', 'Takoyaki', 'takoyaki.png', 'Sides', 'Octopus-filled savory balls.', 6.30),
('M025', 'Hot Matcha', 'hotmatcha.png', 'Drinks', 'Hot brewed green tea.', 2.00),
('M026', 'Hot Chocolate', 'hotchoco.png', 'Drinks', 'Warm chocolate drink.', 6.99),
('M027', 'Iced matcha Latte', 'matchalatte.png', 'Drinks', 'Cold matcha milk drink', 8.80),
('M028', 'Oren Cocktail', 'OrenCocktail.png', 'Drinks', 'Refreshing orange cocktail.', 12.90),
('M029', 'Watermelon Cocktail', 'wCocktail.png', 'Drinks', 'Refreshing watermelon drink.', 12.90),
('M030', 'Ebi', 'promo1.png', 'Promotion', '', 2.99),
('M031', 'Ikura', 'promo2.png', 'Promotion', '', 2.50),
('M032', 'Hamachi', 'promo3.png', 'Promotion', '', 2.20),
('M033', 'Futomaki', 'promo4.png', 'Promotion', '', 2.50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` varchar(40) NOT NULL DEFAULT uuid(),
  `ordertime` datetime(6) NOT NULL,
  `orderItems` varchar(150) NOT NULL,
  `totalAmount` int(10) NOT NULL,
  `orderUser` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` varchar(40) NOT NULL DEFAULT uuid(),
  `paymentTime` datetime(6) NOT NULL,
  `orderID` varchar(40) NOT NULL,
  `orderUser` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `guid` varchar(40) NOT NULL DEFAULT uuid(),
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobileNum` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`guid`, `firstName`, `lastName`, `mobileNum`, `email`, `password`, `birthday`) VALUES
('a2d9bb16-23e7-11ef-be07-9c2f9d6cb57a', 'LIM', 'NI', 1213, 'We@gmail.com', 'ECw=', '2012-12-12 00:00:00.000000'),
('c0c72494-23e6-11ef-be07-9c2f9d6cb57a', 'LIM', 'huan', 1212, 'WW@gmail.com', 'ECw=', '2012-12-12 00:00:00.000000'),
('cee322c7-248a-11ef-bc65-00ff93bfad24', 'LIM', 'NA', 12345, 'limsini000@gmail.com', 'EC8=', '2012-12-12 00:00:00.000000'),
('d7742fe3-26e1-11ef-a944-00ff93bfad24', 'cin', 'Cin', 1111111, 'cc@gmail.com', 'EC+Q', '2024-06-10 00:00:00.000000'),
('dab3185a-26d5-11ef-a944-00ff93bfad24', 'Mark', 'Otto', 122, 'ww1@gmail.com', 'EC+R', '2024-06-10 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`mealID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`guid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNum` (`mobileNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
