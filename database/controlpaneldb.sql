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
-- Database: `controlpaneldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adminImage` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `adminImage`, `adminEmail`, `username`, `password`, `role`) VALUES
(1, 'Argie Delgado', '658e8ccb606d9.jpg', 'delgadoargie04@gmail.com', 'Koni', 'TheXcreator', 'admin'),
(2, 'John Smith', '658ef37131d83.png', 'erin69@gmail.com', 'admin', 'admin123', 'admin'),
(3, 'Erin Marithe', '65b0b566116f4.jpg', 'erin23@gmail.com', 'ErinX', 'erinsenpia', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(1, 'Kyle Macasilhig', 'macasilhig.307446@marikina.sti.edu.ph', 'Kyle1', 'kylex', 'cashier'),
(2, 'Christ Fegalan', 'chrisfeg@gmail.com', 'fegalan123', 'passfeg', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `grouppermission`
--

CREATE TABLE `grouppermission` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `groupPermission` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouppermission`
--

INSERT INTO `grouppermission` (`id`, `groupName`, `groupPermission`, `description`) VALUES
(1, 'Stock Control', 'Add Product,Edit Product,View Product,View Product List,View Product Information,Reports,Print Reports,Stock Audit Log', 'Stock control example');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `permission`, `description`) VALUES
(1, 'Add Product', 'Add product in the stock control system'),
(2, 'Edit Product', 'Edit product in the stock control system'),
(3, 'View Product', 'View product in the stock control system'),
(4, 'View Product List', 'View product list in the stock control system'),
(5, 'View Product Information', 'View product information in the stock control system'),
(6, 'Reports', 'View Reports daily, monthly, annualy'),
(7, 'Print Reports', 'Print and import to excel the reports '),
(8, 'Stock Audit Log', 'View the Audit log List');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(100) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `roleDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`, `roleDescription`) VALUES
(1, 'Manager', 'This manager can access the functionality of 3 subsytem and dashboard'),
(2, 'Stock Controller', 'This users can access the functionality of Stock control system');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grouppermission`
--
ALTER TABLE `grouppermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grouppermission`
--
ALTER TABLE `grouppermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
