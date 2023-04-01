-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 01:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turf_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(11) NOT NULL,
  `turf_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `event_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `customer_id` int(11) NOT NULL COMMENT '1000',
  `name` varchar(30) NOT NULL,
  `mobile` bigint(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `approval_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`customer_id`, `name`, `mobile`, `place`, `email`, `photo`, `approval_status`) VALUES
(1000, 'hayan', 9847987676, 'manjeri', 'hayan@gmail.com', 'images (1).jpg', 0),
(1001, 'sinan', 9856786756, 'malappuram', 'sinan@gmail.com', 'download.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_reg`
--

CREATE TABLE `cust_reg` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` int(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_reg`
--

INSERT INTO `cust_reg` (`customer_id`, `name`, `mobile`, `place`, `email`) VALUES
(1, 'anusree', 2147483647, 'thamarassery', 'anusree@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`) VALUES
(1, 'admins@gmail.com', 'admins@123', 'admin'),
(102, 'anurag@gmail.com', 'anurag@123', 'owner'),
(103, 'saran@gmail.com', 'saran@123', 'owner'),
(1000, 'hayan@gmail.com', 'hayan@123', 'customer'),
(1001, 'sinan@gmail.com', 'sinan@123', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `owner_id` int(20) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `notification` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_registration`
--

CREATE TABLE `owner_registration` (
  `owner_id` int(11) NOT NULL COMMENT '100',
  `name` varchar(30) NOT NULL,
  `mobile` bigint(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `approval_status` tinyint(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_registration`
--

INSERT INTO `owner_registration` (`owner_id`, `name`, `mobile`, `place`, `email`, `photo`, `approval_status`) VALUES
(102, 'Anurag', 9846021545, 'Balussery', 'anurag@gmail.com', 'images.jpg', 1),
(103, 'saran', 9867986798, 'balussery', 'saran@gmail.com', 'images.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `booking_id` int(20) NOT NULL,
  `amount` float NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turf_registration`
--

CREATE TABLE `turf_registration` (
  `turf_id` int(11) NOT NULL,
  `owner_id` int(20) NOT NULL,
  `turf_name` varchar(20) NOT NULL,
  `turf_place` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turf_image` varchar(150) NOT NULL,
  `cost` double NOT NULL,
  `payment_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `turf` (`turf_id`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cust_reg`
--
ALTER TABLE `cust_reg`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `owner_registration`
--
ALTER TABLE `owner_registration`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `turf_registration`
--
ALTER TABLE `turf_registration`
  ADD PRIMARY KEY (`turf_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1000', AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `cust_reg`
--
ALTER TABLE `cust_reg`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner_registration`
--
ALTER TABLE `owner_registration`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '100', AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turf_registration`
--
ALTER TABLE `turf_registration`
  MODIFY `turf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `turf_registration`
--
ALTER TABLE `turf_registration`
  ADD CONSTRAINT `turf_registration_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner_registration` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
