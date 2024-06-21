-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 05:06 PM
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
('8b66cd19-26de-11ef-a944-00ff93bfad24', 'school', '100', 'Gg. Basudewo No. 344', 'Sabang', 'Sumatera Utara', 31271, '0468372a-26de-11ef-a944-00ff93bfad24'),
('905e8697-2d6c-11ef-b22b-00ff93bfad24', 'new home', '11', 'Gg. Basudewo No. 344', 'Sabang', 'Sumatera Utara', 31271, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a'),
('e0e8c960-255e-11ef-b8b2-00ff93bfad24', 'school', '12', 'n28', 'skudai', 'johor', 83100, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` varchar(40) NOT NULL DEFAULT uuid(),
  `meals` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `userID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `meals`, `quantity`, `userID`) VALUES
('64979c7b-2fdd-11ef-8cf4-00ff93bfad24', NULL, NULL, '6490c464-2fdd-11ef-8cf4-00ff93bfad24'),
('bee6df7c-2fdc-11ef-8cf4-00ff93bfad24', NULL, NULL, 'bee24a66-2fdc-11ef-8cf4-00ff93bfad24'),
('f5a49c7d-044c-4df3-9889-9b94f2a064d5', NULL, NULL, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a');

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
  `orderQuantity` varchar(100) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `orderUser` varchar(40) NOT NULL,
  `addressID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `ordertime`, `orderItems`, `orderQuantity`, `totalAmount`, `orderUser`, `addressID`) VALUES
('0f64ee7f-2d81-11ef-b22b-00ff93bfad24', '2024-06-18 16:42:57.000000', 'M028,M031', ' 2,6', 40.80, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', '905e8697-2d6c-11ef-b22b-00ff93bfad24'),
('21e9b865-2d7e-11ef-b22b-00ff93bfad24', '2024-06-18 16:21:59.000000', 'M033,M019', '5, 2', 26.10, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', '905e8697-2d6c-11ef-b22b-00ff93bfad24'),
('37215908-2d7a-11ef-b22b-00ff93bfad24', '2024-06-18 15:53:57.000000', 'M031,M003', '5, 2', 18.48, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', 'e0e8c960-255e-11ef-b8b2-00ff93bfad24'),
('b3fcd080-2e14-11ef-9a14-00ff93bfad24', '2024-06-19 10:19:51.000000', 'M032', ' 5', 11.00, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', '905e8697-2d6c-11ef-b22b-00ff93bfad24'),
('cf7aebf6-2d80-11ef-b22b-00ff93bfad24', '2024-06-18 16:41:09.000000', 'M030', '5', 14.95, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', 'e0e8c960-255e-11ef-b8b2-00ff93bfad24'),
('dc78657c-2d82-11ef-b22b-00ff93bfad24', '2024-06-18 16:55:36.000000', 'M031', '2', 5.00, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', '905e8697-2d6c-11ef-b22b-00ff93bfad24'),
('f0f1dda1-2d82-11ef-b22b-00ff93bfad24', '2024-06-18 16:56:24.000000', 'M033', '5', 12.50, 'c0c72494-23e6-11ef-be07-9c2f9d6cb57a', 'e0e8c960-255e-11ef-b8b2-00ff93bfad24');

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
('6490c464-2fdd-11ef-8cf4-00ff93bfad24', 'ad', 'ad', 8888, 'ad@gmail.com', 'EC8=', '2024-06-23 00:00:00.000000'),
('bee24a66-2fdc-11ef-8cf4-00ff93bfad24', 'df', 'dsf', 999, 'sdfds@gmail.com', 'EC8=', '2024-07-05 00:00:00.000000'),
('c0c72494-23e6-11ef-be07-9c2f9d6cb57a', 'loh', 'nini', 1212, 'WW@gmail.com', 'EC8=', '2012-12-12 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

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
