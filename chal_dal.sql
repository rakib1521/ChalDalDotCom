-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 11:43 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chal_dal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `phone_no`, `address`, `gender`, `email`, `password`) VALUES
(15, 'Rakib Hossain Rifat', '1521436179', 'Rampura', 'Male', 'rakibhossain1521@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_information`
--

CREATE TABLE `item_information` (
  `Id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Catagory` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `hot_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_information`
--

INSERT INTO `item_information` (`Id`, `Name`, `Price`, `Catagory`, `Image`, `hot_item`) VALUES
(2, 'Capsicam', 70, 1, 'capsicam.jpg', 0),
(3, 'Onion', 20, 1, 'onion.jpg', 0),
(4, 'Ginger', 150, 1, 'ginger.jpg', 0),
(5, 'Garlic', 50, 1, 'garlic.jpg', 0),
(7, 'Mango', 65, 2, 'mango.jpg', 0),
(8, 'Apple', 180, 2, 'apple.jpg', 0),
(9, 'Banana', 30, 2, 'banana.jpg', 0),
(12, 'Strawberry', 600, 2, 'strawberry.jpg', 1),
(13, 'Jack Fruit', 72, 2, 'jackfruit.jpg', 0),
(16, 'Coca Cola', 35, 3, 'coke.jpg', 0),
(17, 'Pepsi', 100, 3, 'pepsi.jpg', 1),
(18, 'Mountain Dew ', 18, 3, 'mountaindew.jpg', 0),
(19, 'Taza Tea', 150, 3, 'tazatea.jpg', 0),
(28, 'Vim Soap', 29, 4, 'vims.jpg', 0),
(29, 'Vim Liquid', 66, 4, 'viml.jpg', 0),
(30, 'Pepsodent', 100, 4, 'pepsodent.jpg', 0),
(31, 'Close Up', 120, 4, 'closeup.jpg', 1),
(32, 'Xiaomi Note 7 ', 15000, 6, 'XN7.jpg', 0),
(33, 'Xiaomi Mi 8', 22000, 6, 'XM8.jpg', 0),
(34, 'Samsung Galaxy A8', 450000, 6, 'SGA8S.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `Product_price` float NOT NULL,
  `buy_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `phone_no`, `address`, `gender`, `email`, `password`) VALUES
(1, 'Rakib Hossain Rifat', '1521436179', '183/2 East Rampura, Dhaka-1219', ' Male', 'rakibhossain1521@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_information`
--
ALTER TABLE `item_information`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_information`
--
ALTER TABLE `item_information`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
