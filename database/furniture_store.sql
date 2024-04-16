-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 05:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `User_Id`, `Name`, `Description`, `Price`, `photo`) VALUES
(14, 8, 'Chair', 'Comfortable Chair That you can use At your Home', '30000.00', 'images/fun2.jpg'),
(15, 8, 'Chair With Stand', 'Buy this chair and it stand where you can place any device', '100000.00', 'images/fun4.jpg'),
(18, 3, 'Best Saloon', 'This is the saloon chair for dinning room', '20000.00', './images/fun1.jpg'),
(20, 3, 'Saloon', 'These are interion saloon instrument', '10000.00', './images/ch.jpg'),
(24, 3, 'Saloon', 'These are interion saloon instrument', '10000.00', './images/ch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `furnitures`
--

CREATE TABLE `furnitures` (
  `Furniture_Id` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furnitures`
--

INSERT INTO `furnitures` (`Furniture_Id`, `Photo`, `Name`, `Description`, `Price`) VALUES
(22, './images/ch.jpg', 'Saloon', 'These are interion saloon instrument', '10000.00'),
(23, './images/fun4.jpg', 'Chair With Stand', 'This is the best chair and the stand for any device', '300000.00'),
(24, './images/fun2.jpg', 'Chair', 'Best chairs to sit on at your Home', '20000.00'),
(25, './images/fun1.jpg', 'Best Saloon', 'This is the saloon chair for dinning room', '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Furniture_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Id`, `Furniture_Id`, `Quantity`, `Status`, `Date`) VALUES
(28, 3, 25, 3, 'pending', '2024-03-31 10:36:57'),
(29, 3, 24, 3, 'pending', '2024-03-31 10:37:46'),
(30, 3, 22, 2, 'Delivered', '2024-03-31 10:37:58'),
(32, 3, 23, 1, 'pending', '2024-04-16 15:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `First_Name`, `Last_Name`, `Email`, `Phone_Number`, `Password`, `Role`) VALUES
(1, 'Jado', 'Jean', 'mutoniscovia22@gmail.com', 783339580, '1234', 'customer'),
(3, 'Niyo', 'Jean', 'jadomyvalue@gmail.com', 783339580, '$2y$10$Yk0.BuJZZI.n01Gfcg/TNeoO9oqi5PVVT.PndcQ105UIF4H9.Etri', 'customer'),
(4, 'Jado', 'Jean', 'dusengimanaleoncie@gmail.com', 783339580, '$2y$10$vu1i87QcJOB0GlSAWTNBDuorh5ZtX5S/2JW2qEtgNl0VA01Eeaw7q', 'customer'),
(5, 'Jado', 'Jean', 'mbarutensengeemmanuel@gmail.co', 783339580, '$2y$10$7GMAE37ClJXfGVo27Nyr/OTrGbvjvtnQ0/Js6xWqSm2pij3EQkGFW', 'customer'),
(6, 'Jado', 'Jean', 'email@gmail.com', 783339580, '$2y$10$hSzS622nfH7a0uThDjqJmuARdokVS8JKJhMkKV/mY/nVqoUCA5K.O', 'customer'),
(7, 'Sahil', 'Celestin', 'CELESTIN@gmail.com', 785962001, '$2y$10$3q46HKHwquACovi5bNup2O6e2dPGsXzayl3snq0hc2neeJE3x5Oia', 'customer'),
(8, 'Gakuru', 'Pierre', 'gakuru@gmail.com', 783339580, '$2y$10$Qt16XAio9rNILKdHEO6ZkuWy3bPTO5a1KtSog3z1cjpFJBHvrbuCq', 'customer'),
(9, 'Admin', 'Jado', 'admin@gmail.com', 785978416, '$2y$10$nD2glFLaZhL3PBQ2ns68W.KnYs/hb7uD4rv0eeHjihl3YGEkr0/X6', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `furnitures`
--
ALTER TABLE `furnitures`
  ADD PRIMARY KEY (`Furniture_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Furniture_Id` (`Furniture_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `furnitures`
--
ALTER TABLE `furnitures`
  MODIFY `Furniture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Furniture_Id`) REFERENCES `furnitures` (`Furniture_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
