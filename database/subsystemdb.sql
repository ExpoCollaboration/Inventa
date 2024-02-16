-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 08:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subsystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerSold` varchar(100) NOT NULL,
  `quantityperUnit` int(100) NOT NULL,
  `totalPrice` int(100) NOT NULL,
  `customerPayment` int(100) NOT NULL,
  `customerChange` int(100) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `transactionNo` bigint(10) NOT NULL,
  `customerDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customerName`, `customerSold`, `quantityperUnit`, `totalPrice`, `customerPayment`, `customerChange`, `paymentMethod`, `transactionNo`, `customerDate`) VALUES
(1, 'Fernando', 'Nuggets', 3, 300, 500, 300, 'Gcash', 5839661015, '2023-12-08 04:20 PM'),
(2, 'Lopez', 'Chicken', 4, 300, 857, 557, 'Gcash', 2527473803, '2023-12-08 04:21 PM'),
(3, 'Fegalan', 'Fries', 2, 50, 500, 300, 'Gcash', 5809234024, '2023-12-08 04:21 PM'),
(4, 'Kyle', 'Chicken', 3, 225, 857, 632, 'Gcash', 7206696853, '2023-12-08 04:22 PM'),
(5, 'Jude', 'Nuggets', 2, 200, 1000, 800, 'F2F', 2834789179, '2023-12-08 04:22 PM'),
(6, 'Glen', 'Chicken', 5, 375, 600, 225, 'F2F', 5712465355, '2023-12-08 05:48 PM'),
(7, 'Lambino', 'Fries', 5, 125, 500, 375, 'Gcash', 3671962232, '2023-12-08 09:41 PM'),
(8, 'Maya', 'Nuggets', 2, 200, 250, 50, 'Gcash', 4996285451, '2023-12-10 10:09 PM'),
(9, 'CASH', 'Nuggets', 1, 100, 1000, 900, 'Gcash', 9455771086, '2023-12-16 12:04 AM'),
(10, '', 'Nuggets', 2, 200, 857, 657, 'Gcash', 2651323700, '2023-12-19 08:14 AM'),
(11, '', 'Nuggets', 3, 300, 1000, 1000, 'Gcash', 7763173384, '2023-12-19 08:24 AM'),
(12, 'Cash', 'Chicken', 5, 375, 1000, 625, 'Gcash', 6610284652, '2023-12-19 08:27 AM'),
(13, 'Erin', 'Nuggets', 3, 300, 500, 200, 'Gcash', 4543909083, '2023-12-19 08:27 AM'),
(14, 'Kyle', 'Fries', 2, 50, 500, 450, 'Gcash', 5617321587, '2023-12-19 08:30 AM'),
(15, 'Cash', 'Nuggets', 2, 100, 500, 400, 'Gcash', 5713930143, '2023-12-20 01:25 PM'),
(16, 'Cash', 'Nuggets', 5, 500, 1000, 500, 'Gcash', 6060276667, '2023-12-27 10:23 AM'),
(17, 'Cash', 'Chicken', 3, 225, 500, 275, 'Gcash', 4879220741, '2023-12-30 03:30 PM'),
(18, 'Cash', 'Chicken', 13, 900, 1000, 100, 'Gcash', 8535508934, '2024-01-05 11:01 PM'),
(19, 'Mist', 'Fries', 15, 350, 500, 150, 'Gcash', 6588001693, '2024-01-05 11:01 PM'),
(20, 'Thomas', 'Nuggets', 17, 1600, 5000, 3400, 'Gcash', 8321218496, '2024-01-15 02:11 PM'),
(21, 'Kanna', 'Nuggets', 3, 200, 500, 300, 'Gcash', 8280426770, '2024-01-20 11:28 AM');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` int(100) NOT NULL,
  `productOutStock` tinyint(1) NOT NULL,
  `productDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `productPrice`, `productOutStock`, `productDate`) VALUES
(1, 'Nuggets', 100, 0, '2024-01-06 05:02 AM'),
(2, 'Chicken', 75, 0, '2024-01-06 04:18 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
