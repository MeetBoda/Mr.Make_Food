-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 04:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `SrNo` int(10) NOT NULL,
  `Food_Item` varchar(100) NOT NULL,
  `Price` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `ItemNo` int(10) NOT NULL,
  `Food_Item` varchar(100) NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` (`ItemNo`, `Food_Item`, `Price`) VALUES
(1, 'Manchurian & Noodles', 100),
(2, 'Burger', 80),
(3, 'Chole Bhature', 50),
(4, 'Dabeli', 30),
(5, 'Dosa', 60),
(6, 'Pizza', 120),
(7, 'Pavbhaji', 60),
(8, 'Idli Sambhar', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_record`
--

CREATE TABLE `order_record` (
  `Order_ID` int(10) NOT NULL,
  `Customer_name` varchar(100) NOT NULL,
  `Phone_No` decimal(10,0) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Payment_Mode` varchar(30) NOT NULL,
  `Order_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_record`
--

INSERT INTO `order_record` (`Order_ID`, `Customer_name`, `Phone_No`, `Amount`, `Address`, `Payment_Mode`, `Order_Date`) VALUES
(1, 'meet', '9157505662', 320, 'Dhrol', 'Cash On Delivery', '2022-07-17'),
(2, 'prey36', '8196840322', 320, 'Morbi', 'Online Payment', '2022-07-17'),
(3, 'pranjal', '7869504334', 150, 'Nadiad', 'Cash On Delivery', '2022-07-17'),
(4, 'pranjal', '8196840322', 50, 'Morbi', 'Online Payment', '2022-07-17'),
(5, 'nilay', '9876584930', 220, 'Vadodara', 'Cash On Delivery', '2022-07-17'),
(6, 'hitarth', '9875034534', 150, 'Nadiad', 'Online Payment', '2022-07-17'),
(7, 'prey36', '7869504334', 150, 'Morbi', 'Online Payment', '2022-07-17'),
(8, 'keyur', '9876584930', 150, 'Morbi', 'Cash On Delivery', '2022-07-17'),
(9, 'keyur', '9875034534', 50, 'Morbi', 'Online Payment', '2022-07-17'),
(10, 'keyur', '8196840322', 50, 'Morbi', 'Online Payment', '2022-07-17'),
(11, 'meet', '9875034534', 150, 'Nadiad', 'Online Payment', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `cpassword`) VALUES
(1, 'meet_boda', 'meet', 'meet@gmail.com', '1', ''),
(2, 'Prey', 'prey36', 'prey@gmail.com', '2307', ''),
(3, 'Pranjal', 'pranjal', 'pranjal@gmail.com', '1234', ''),
(4, 'Dhruv', 'dhruv', 'dhruv@gmail.com', '2345', ''),
(5, 'Nilay', 'nilay', 'nilay@gmail.com', '123', ''),
(6, 'Hitarth', 'hitarth', 'hp@gmail.com', 'hp', ''),
(7, 'Keyur', 'keyur', 'keyur@gmail.com', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD PRIMARY KEY (`SrNo`);

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`ItemNo`);

--
-- Indexes for table `order_record`
--
ALTER TABLE `order_record`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocart`
--
ALTER TABLE `addtocart`
  MODIFY `SrNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `ItemNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_record`
--
ALTER TABLE `order_record`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
