-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 07:04 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `babysiter`
--

CREATE TABLE `babysiter` (
  `profile_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email_id` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `salary` int(6) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `bank_name` varchar(10) NOT NULL,
  `account_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babysiter`
--

INSERT INTO `babysiter` (`profile_id`, `first_name`, `last_name`, `email_id`, `password`, `phone_number`, `gender`, `salary`, `postal_code`, `area_name`, `bank_name`, `account_number`) VALUES
(1, 'adfad', 'hasan', '123@gmai.com', '1234', '01521207879', 'male', 1234, 8920, 'dhaka', 'dbbl', '1234'),
(2, 'abir', 'adfad', 'adfad@gad.com', '1234', '01718082814', 'male', 4998, 8920, 'dhaka', 'dbbl', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `booking_time` time NOT NULL,
  `booking_date` date NOT NULL,
  `customerprofile_id` int(10) NOT NULL,
  `customeremail_id` varchar(40) NOT NULL,
  `babysiterprofile_id` int(10) NOT NULL,
  `babysiteremail_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_time`, `booking_date`, `customerprofile_id`, `customeremail_id`, `babysiterprofile_id`, `babysiteremail_id`) VALUES
(12, '11:02:16', '2019-08-21', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(13, '11:04:07', '2019-08-21', 2, 'a@gmail.com', 1, '123@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `profile_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `weight` int(3) NOT NULL,
  `customerprofile_id` int(10) NOT NULL,
  `customeremail_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`profile_id`, `first_name`, `last_name`, `gender`, `weight`, `customerprofile_id`, `customeremail_id`) VALUES
(6, 'adf', 'adf', 'male', 25, 2, 'a@gmail.com'),
(7, 'adf', 'adf', 'male', 25, 2, 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `profile_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email_id` varchar(40) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number_of_child` int(1) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `road_number` varchar(15) DEFAULT NULL,
  `postal_code` int(10) NOT NULL,
  `area_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`profile_id`, `first_name`, `last_name`, `email_id`, `phone_number`, `password`, `number_of_child`, `house_number`, `road_number`, `postal_code`, `area_name`) VALUES
(1, 'abir', 'hasan', 'has@gmail.com', '01521207879', '1234', 2, '52/3 b', '25r/a', 8920, 'dhaka'),
(2, 'abir', 'hasan', 'a@gmail.com', '01521207879', '1234', 1, '52/3 b', '25r/a', 8920, 'dhaka'),
(3, '', '', '', '0', '', 0, '', '', 0, ''),
(4, 'sabir', 'hasan', 'b@gmail.com', '01521207879', '1234', 1, '52/3 b', '25r/a', 8920, 'dhaka'),
(5, 'sabir', 'adf', 'af@gmail.com', '01718082814', '1234', 5, '52/3 b', '25r/a', 8920, 'has');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `body` varchar(255) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `sender_email` varchar(40) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `receiver_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `date_and_time`, `body`, `sender_id`, `sender_email`, `receiver_id`, `receiver_email`) VALUES
(1, '2019-08-26 07:32:45', 'HI', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(2, '2019-08-26 07:32:54', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(3, '2019-08-26 07:36:51', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(4, '2019-08-26 07:36:52', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(5, '2019-08-26 07:36:52', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(6, '2019-08-26 07:36:52', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(7, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(8, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(9, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(10, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(11, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(12, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(13, '2019-08-26 07:36:53', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(14, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(15, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(16, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(17, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(18, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(19, '2019-08-26 07:36:54', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(20, '2019-08-26 07:36:55', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(21, '2019-08-26 07:39:06', 'hi', 2, 'a@gmail.com', 1, '123@gmai.com'),
(22, '2019-08-26 07:39:07', 'hi', 2, 'a@gmail.com', 1, '123@gmai.com'),
(23, '2019-08-26 07:39:07', 'hi', 2, 'a@gmail.com', 1, '123@gmai.com'),
(24, '2019-08-26 07:39:07', 'hi', 2, 'a@gmail.com', 1, '123@gmai.com'),
(25, '2019-08-26 07:41:58', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(26, '2019-08-26 07:42:05', 'hwllo', 1, '123@gmai.com', 2, 'a@gmail.com'),
(27, '2019-08-26 07:42:13', 'hi', 2, 'a@gmail.com', 1, '123@gmai.com'),
(28, '2019-08-26 07:43:27', 'bye', 2, 'a@gmail.com', 1, '123@gmai.com'),
(29, '2019-08-26 07:45:03', 'how are you', 2, 'a@gmail.com', 1, '123@gmai.com'),
(30, '2019-08-26 07:45:13', 'how are you', 2, 'a@gmail.com', 1, '123@gmai.com'),
(31, '2019-08-26 07:45:19', 'i am file', 1, '123@gmai.com', 2, 'a@gmail.com'),
(32, '2019-08-26 07:46:16', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(33, '2019-08-26 07:46:17', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(34, '2019-08-26 07:46:18', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(35, '2019-08-26 07:46:18', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(36, '2019-08-26 07:46:18', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(37, '2019-08-26 07:46:18', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(38, '2019-08-26 07:49:05', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(39, '2019-08-26 07:49:06', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(40, '2019-08-26 07:49:07', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(41, '2019-08-26 07:49:15', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(42, '2019-08-26 07:52:58', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(43, '2019-08-26 07:53:22', 'hello', 1, '123@gmai.com', 2, 'a@gmail.com'),
(44, '2019-08-26 07:53:30', 'how are you', 1, '123@gmai.com', 2, 'a@gmail.com'),
(45, '2019-08-26 07:54:12', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(46, '2019-08-26 07:54:12', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(47, '2019-08-26 07:54:13', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(48, '2019-08-26 07:54:18', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(49, '2019-08-26 07:54:26', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(50, '2019-08-26 08:19:07', 'hello', 1, '123@gmai.com', 2, 'a@gmail.com'),
(51, '2019-08-26 08:24:27', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(52, '2019-08-26 08:24:54', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(53, '2019-08-26 08:25:00', 'how are you', 1, '123@gmai.com', 2, 'a@gmail.com'),
(54, '2019-08-26 08:29:47', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(55, '2019-08-26 08:30:49', 'afdahadfa', 1, '123@gmai.com', 2, 'a@gmail.com'),
(56, '2019-08-26 08:33:53', 'adffad', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(57, '2019-08-26 08:44:51', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(58, '2019-08-26 08:44:56', 'how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(59, '2019-08-26 08:45:05', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(60, '2019-08-26 08:48:24', 'hi', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(61, '2019-08-26 08:48:30', 'how are ou', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(62, '2019-08-26 08:50:13', 'how to make a cup of tea', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(63, '2019-08-26 08:52:11', 'hi', 1, '123@gmai.com', 2, 'a@gmail.com'),
(64, '2019-08-26 09:21:32', 'how are you', 1, '123@gmai.com', 2, 'a@gmail.com'),
(65, '2019-08-26 09:40:22', 'hi how are you', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(66, '2019-08-26 09:40:31', 'ho???', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(67, '2019-08-26 09:40:45', '', 2, 'a@gmail.com', 2, 'adfad@gad.com'),
(68, '2019-08-26 10:20:39', 'hi ', 1, '123@gmai.com', 2, 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `payment_time` time NOT NULL,
  `payment_date` date NOT NULL,
  `bookingbooking_id` int(10) NOT NULL,
  `bookingcustomerprofile_id` int(10) NOT NULL,
  `bookingbabysiterprofile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_time`, `payment_date`, `bookingbooking_id`, `bookingcustomerprofile_id`, `bookingbabysiterprofile_id`) VALUES
(2, '11:03:21', '2019-08-21', 12, 2, 2),
(3, '11:04:19', '2019-08-21', 13, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babysiter`
--
ALTER TABLE `babysiter`
  ADD PRIMARY KEY (`profile_id`,`email_id`),
  ADD UNIQUE KEY `profile_id` (`profile_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`,`customerprofile_id`,`babysiterprofile_id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`),
  ADD KEY `FKbooking633209` (`customerprofile_id`,`customeremail_id`),
  ADD KEY `FKbooking728500` (`babysiterprofile_id`,`babysiteremail_id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `FKchild688152` (`customerprofile_id`,`customeremail_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`profile_id`,`email_id`),
  ADD UNIQUE KEY `profile_id` (`profile_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`,`bookingbooking_id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD KEY `FKpayment188951` (`bookingbooking_id`,`bookingcustomerprofile_id`,`bookingbabysiterprofile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babysiter`
--
ALTER TABLE `babysiter`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FKbooking633209` FOREIGN KEY (`customerprofile_id`,`customeremail_id`) REFERENCES `customer` (`profile_id`, `email_id`),
  ADD CONSTRAINT `FKbooking728500` FOREIGN KEY (`babysiterprofile_id`,`babysiteremail_id`) REFERENCES `babysiter` (`profile_id`, `email_id`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `FKchild688152` FOREIGN KEY (`customerprofile_id`,`customeremail_id`) REFERENCES `customer` (`profile_id`, `email_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKpayment188951` FOREIGN KEY (`bookingbooking_id`,`bookingcustomerprofile_id`,`bookingbabysiterprofile_id`) REFERENCES `booking` (`booking_id`, `customerprofile_id`, `babysiterprofile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
