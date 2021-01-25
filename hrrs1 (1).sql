-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 12:30 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrrs1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest_id` int(11) NOT NULL,
  `check_in_time` date NOT NULL,
  `check_out_time` date NOT NULL,
  `status` int(11) DEFAULT '1',
  `sub_total` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `grand_total` varchar(50) NOT NULL,
  `issue_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `admin_id`, `user_id`, `guest_id`, `check_in_time`, `check_out_time`, `status`, `sub_total`, `vat`, `discount`, `grand_total`, `issue_date`) VALUES
(5, 1, NULL, 5, '2021-01-01', '2021-01-03', 2, '3343', '501.45', '100', '3733.45', '2021-01-04 17:09:13'),
(6, 1, NULL, 6, '2021-01-04', '2021-01-05', 1, '10029', '1504.35', '200', '10952.35', '2021-01-04 17:11:47'),
(7, 1, NULL, 7, '2021-01-06', '2021-01-07', 1, '6686', '1002.9', '200', '7488.9', '2021-01-04 17:15:57'),
(8, 1, NULL, 8, '2021-01-08', '2021-01-09', 1, '6686', '1002.9', '200', '7488.9', '2021-01-04 17:37:12'),
(9, 1, NULL, 9, '2021-01-10', '2021-01-11', 1, '6686', '1002.9', '200', '7466.9', '2021-01-05 17:52:15'),
(10, 1, NULL, 10, '2021-01-12', '2021-01-13', 1, '6686', '1002.9', '200', '7488.9', '2021-01-05 17:57:23'),
(11, 1, NULL, 11, '2021-01-14', '2021-01-15', 1, '3343', '501.45', '200', '3644.45', '2021-01-06 16:18:23'),
(12, 1, NULL, 12, '0000-00-00', '0000-00-00', 0, '4500', '100', '', '4600', '2021-01-09 19:26:38'),
(13, 1, NULL, 13, '0000-00-00', '0000-00-00', 2, '501', '100', '100', '501', '2021-01-09 19:59:28'),
(14, 1, NULL, 14, '0000-00-00', '0000-00-00', 2, '900', '50', '', '950', '2021-01-10 15:58:36'),
(15, 1, NULL, 15, '0000-00-00', '0000-00-00', 2, '450', '100', '', '550', '2021-01-11 14:51:07'),
(16, 1, NULL, 16, '0000-00-00', '0000-00-00', 2, '5000', '200', '100', '5100', '2021-01-12 09:51:31'),
(17, 1, NULL, 17, '0000-00-00', '0000-00-00', 2, '430', '50', '50', '430', '2021-01-12 10:02:10'),
(18, 1, NULL, 18, '0000-00-00', '0000-00-00', 2, '900', '100', '300', '700', '2021-01-13 17:06:59'),
(19, 1, NULL, 19, '2021-01-14', '2021-01-15', 2, '3343', '501.45', '300', '3511.45', '2021-01-15 16:19:44'),
(20, 1, NULL, 20, '2021-01-16', '2021-01-17', 2, '600', '90', '100', '590', '2021-01-16 22:28:50'),
(21, 2, NULL, 21, '2021-01-17', '2021-01-18', 2, '454', '22', '200', '276', '2021-01-17 23:55:51'),
(22, 1, NULL, 22, '2021-01-17', '2021-01-18', 1, '3343', '167.15', '200', '3288.15', '2021-01-18 01:14:54'),
(23, 1, NULL, 23, '2021-01-17', '2021-01-18', 1, '43654', '2182.7', '100', '45725.7', '2021-01-18 09:45:06'),
(24, 1, NULL, 24, '2021-01-18', '2021-01-19', 2, '1300', '65', '100', '1253', '2021-01-18 13:33:26'),
(25, 1, NULL, 25, '2021-01-18', '2021-01-19', 1, '87308', '4365.4', '0', '91673.4', '2021-01-18 13:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `booking_room_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`booking_room_id`, `book_id`, `room_id`) VALUES
(1, 5, 9),
(2, 6, 9),
(3, 7, 9),
(4, 9, 9),
(5, 10, 9),
(6, 11, 9),
(7, 19, 9),
(8, 20, 10),
(9, 21, 3),
(10, 22, 9),
(11, 23, 7),
(12, 24, 12),
(13, 25, 5),
(14, 25, 6);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `created_at`) VALUES
(11, 'pool', '2020-12-08 15:16:32'),
(12, 'air condition', '2020-12-09 16:00:41'),
(13, 'wifi', '2020-12-27 17:17:49'),
(14, 'mini bar', '2021-01-16 10:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adult` int(50) NOT NULL,
  `child` int(50) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `guest_phone` varchar(16) NOT NULL,
  `guest_address` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `user_id`, `adult`, `child`, `guest_name`, `guest_phone`, `guest_address`, `created_at`) VALUES
(5, NULL, 1, 1, 'mim', '56453456', 'matikata', '2021-01-04 17:09:13'),
(6, NULL, 2, 2, 'mim', '56453456', 'matikata', '2021-01-04 17:11:47'),
(7, NULL, 2, 2, 'rifat', '56453456', 'matikata', '2021-01-04 17:15:57'),
(8, NULL, 2, 2, 'rifat', '56453456', 'matikata', '2021-01-04 17:37:12'),
(9, NULL, 1, 0, 'rami', '445453667', 'matikata', '2021-01-05 17:52:15'),
(10, NULL, 1, 0, 'rami', '445453667', 'matikata', '2021-01-05 17:57:23'),
(11, NULL, 1, 0, 'mim', '123434', 'dhaka', '2021-01-06 16:18:22'),
(12, NULL, 0, 0, 'ali', '12345', 'mirpur', '2021-01-09 19:26:38'),
(13, NULL, 0, 0, 'jui', '123', 'manukdi', '2021-01-09 19:59:28'),
(14, NULL, 1, 4, 'lucky', '12347867', 'dhaka', '2021-01-10 15:58:36'),
(15, NULL, 4, 1, 'rabbi', '12354', 'dewanbari', '2021-01-11 14:51:07'),
(16, NULL, 0, 0, 'arif', '4234235345', 'uttora', '2021-01-12 09:51:31'),
(17, NULL, 2, 0, 'shanta', '43546', 'jatrabari', '2021-01-12 10:02:10'),
(18, NULL, 0, 0, 'rifat', '6345465', 'mirpur', '2021-01-13 17:06:59'),
(19, NULL, 1, 0, 'mim', '67575676', 'matikata', '2021-01-15 16:19:44'),
(20, NULL, 1, 0, 'mukta', 'mukta@gmail.com', 'dhaka', '2021-01-16 22:28:50'),
(21, NULL, 0, 0, 'saniul', '12345678', 'gazipur', '2021-01-17 23:55:51'),
(22, NULL, 1, 0, 'alifa', 'alifa@gmail.com', 'dhaka', '2021-01-18 01:14:54'),
(23, NULL, 1, 0, 'jui', 'mukta@gmail.com', 'dhaka', '2021-01-18 09:45:06'),
(24, NULL, 1, 0, 'mimi', 'mukta@gmail.com', 'dhaka', '2021-01-18 13:33:26'),
(25, NULL, 0, 0, 'rifat', '56453456', 'dhaka', '2021-01-18 13:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_age` int(10) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `guest_id`, `member_name`, `member_age`, `type`) VALUES
(1, 7, 'mim', 22, 'adult'),
(2, 7, 'renu', 54, 'adult'),
(3, 7, 'anisha', 6, 'child'),
(4, 7, 'shan', 14, 'child'),
(5, 9, 'rafi', 100, 'adult'),
(6, 9, 'anisha', 4, 'child'),
(7, 10, 'rafi', 22, 'adult'),
(8, 10, 'anisha', 3, 'child'),
(9, 11, 'shan', 32, 'adult'),
(10, 11, 'anisha', 11, 'child'),
(11, 19, 'lali', 22, 'adult'),
(12, 19, 'anisha', 11, 'child'),
(13, 20, 'joynal', 34, 'adult'),
(14, 20, 'afnan', 11, 'child'),
(15, 22, 'mim', 60, 'adult'),
(16, 22, 'afnan', 4, 'child'),
(17, 23, 'rafi', 22, 'adult'),
(18, 23, 'ch', 11, 'child'),
(19, 24, 'shan', 22, 'adult'),
(20, 24, 'afnan', 11, 'child');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `book_id`, `paid`, `due`, `method`, `created_at`) VALUES
(1, 5, 'NaN', 'NaN', '', '2021-01-04 17:09:13'),
(2, 6, '10952', '0', '', '2021-01-04 17:11:47'),
(3, 7, '7488', '0', '', '2021-01-04 17:15:57'),
(4, 8, '7488', '0', '', '2021-01-04 17:37:12'),
(5, 9, '7466', '0', '', '2021-01-05 17:52:15'),
(6, 10, '7488', '0', '', '2021-01-05 17:57:23'),
(7, 11, '3644', '0', 'Cash', '2021-01-06 16:18:23'),
(8, 12, '3511', '0', '', '2021-01-09 19:26:39'),
(9, 13, '', '0', '', '2021-01-09 19:59:28'),
(10, 14, '', '0', '', '2021-01-10 15:58:36'),
(11, 15, '', '0', '', '2021-01-11 14:51:07'),
(12, 16, '', '0', '', '2021-01-12 09:51:31'),
(13, 17, '', '', '', '2021-01-12 10:02:10'),
(14, 18, '', '', '', '2021-01-13 17:06:59'),
(15, 19, '3511', '0', '', '2021-01-15 16:19:44'),
(16, 20, '590', '0', 'Cash', '2021-01-16 22:28:50'),
(17, 21, '0', '276', 'Cash', '2021-01-17 23:55:51'),
(18, 22, '3288.15', '0', 'Cash', '2021-01-18 01:14:54'),
(19, 23, '45725.7', '0', 'Cash', '2021-01-18 09:45:06'),
(20, 24, '1250', '3', 'Cash', '2021-01-18 13:33:26'),
(21, 25, '0', '91673.4', '', '2021-01-18 13:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(16) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`) VALUES
(1, 'mim', 'mi@gmail.com', '123445', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'rifu', 'rf@gmail.com', '123456', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(6, 'large room', '2020-12-06 17:52:54'),
(7, 'single room', '2020-12-06 17:53:25'),
(8, 'dubble room', '2020-12-07 23:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`room_id`, `room_name`, `cat_id`, `room_type_id`, `facilities`, `details`, `price`, `created_at`) VALUES
(3, 'room-1', 6, 11, '[\"pool\",\"air condition\"]', 'Aut recusandae Ex u', '454', '2020-12-10 16:23:21'),
(4, 'room-2', 7, 11, '[\"pool\",\"air condition\"]', 'rttgrt', '43654', '2020-12-10 16:34:51'),
(5, 'room-3', 6, 11, '[\"air condition\"]', 'rttgrt', '43654', '2020-12-10 16:34:59'),
(6, 'room-4', 6, 11, '[\"air condition\"]', 'Aut recusandae Ex u', '43654', '2020-12-13 15:50:02'),
(7, 'room-5', 6, 11, '[\"air condition\"]', 'Aut recusandae Ex u', '43654', '2020-12-13 15:55:15'),
(9, 'room-6', 6, 12, '[\"air condition\"]', 'with attach bathroom', '3343', '2020-12-14 17:52:52'),
(10, 'room-7', 7, 12, '[\"air condition\",\"wifi\"]', 'available', '600', '2021-01-16 20:55:22'),
(11, 'room-8', 8, 14, '[\"pool\",\"air condition\",\"wifi\"]', 'rgrthththj', '2000', '2021-01-18 09:41:04'),
(12, 'room-10', 6, 13, '[\"pool\",\"air condition\"]', '3423424', '1300', '2021-01-18 13:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_type`
--

CREATE TABLE `tb_room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tb_room_type`
--

INSERT INTO `tb_room_type` (`room_type_id`, `room_type_name`, `created_at`) VALUES
(11, 'small room', '2020-12-09 17:44:42'),
(12, 'AC', '2020-12-14 16:24:16'),
(13, 'Non-AC', '2020-12-14 16:24:39'),
(14, 'Hollywood Twin Room', '2021-01-07 00:21:32'),
(15, 'large room', '2021-01-16 10:24:57'),
(19, 'large room', '2021-01-18 13:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(16) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`booking_room_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin-email` (`admin_email`),
  ADD UNIQUE KEY `admin-phone` (`admin_phone`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `tb_room_type`
--
ALTER TABLE `tb_room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`,`user_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `booking_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_room_type`
--
ALTER TABLE `tb_room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`),
  ADD CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `tb_room` (`room_id`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`);

--
-- Constraints for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD CONSTRAINT `tb_room_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tb_categories` (`cat_id`),
  ADD CONSTRAINT `tb_room_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `tb_room_type` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
