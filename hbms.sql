-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` bigint(20) NOT NULL,
  `type` varchar(150) NOT NULL,
  `ward` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_id`, `type`, `ward`) VALUES
(1, 'Manual', 'ICU'),
(2, 'Semi-Electric', 'Accidents And Emergency'),
(3, 'Full-Electric', 'Psychiatric'),
(4, 'Bariatric', 'Orthopaedic'),
(5, 'Low Bed', 'Critical Care');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(150) NOT NULL,
  `blood_group` varchar(150) NOT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `name`, `age`, `sex`, `blood_group`, `phone`, `doctor`, `date`) VALUES
(1, 'selvaragavan', 21, 'Male', 'A+', '2147483647', 'Senthil', '2022-03-05 19:28:11'),
(2, 'Azeem', 22, 'Male', 'O-', '2147483647', 'Guna', '2022-03-01 09:48:25'),
(3, 'Solomon', 33, 'Male', 'A+', '2147483647', 'Rajan', '2022-03-01 20:28:25'),
(4, 'Gopi', 29, 'Female', 'O+', '2147483647', 'Velu', '2022-03-05 08:12:52'),
(5, 'Surili', 19, 'Male', 'A+', '2147483647', 'Anbu', '2022-03-07 09:45:41'),
(6, 'GP Muthu', 46, 'Female', 'O-', '2147483647', 'Ram', '2022-03-07 22:28:05'),
(7, 'pant', 12, 'Transexual', 'A+', '2147483647', 'Raju', '2022-03-08 15:15:20'),
(8, 'Sam', 27, 'Transexual', 'A+', '2147483647', 'John', '2022-03-09 16:10:41'),
(9, 'Guru', 22, 'Male', 'A', '2147483647', 'Desigan', '2022-03-05 06:28:41'),
(10, 'Bumrah', 12, 'Other', 'A+', '9899766895', 'Arjun', '2022-03-09 21:28:41'),
(11, 'simbu', 23, 'Male', 'A', '8747483647', 'Senthil', '2023-03-09 08:18:21'),
(12, 'ram', 25, 'Male', 'A', '8947483647', 'Senthil', '2023-03-09 17:28:41'),
(13, 'Mr Makesh', 30, 'Male', 'O+ve', '2147483647', 'Dr Robinson', '2023-03-09 05:28:41'),
(14, 'Ramesh', 33, 'Male', 'A', '2147483647', 'Arjun', '2023-03-09 18:28:41'),
(15, 'Veera', 12, 'Male', 'B', '9977483647', 'Senthil', '2023-03-10 20:28:41'),
(16, 'san', 15, 'Male', 'B+', '9847483685', 'Thiru', '2023-03-10 04:28:41'),
(17, 'Santhosh', 15, 'Male', 'B+', '9947483647', 'Vasu', '2023-03-10 09:35:28'),
(18, 'Sham', 25, 'Male', 'B+', '8847483647', 'Vasu', '2023-03-10 07:15:41'),
(19, 'ram', 14, 'Male', 'A', '6347483647', 'Senthil', '2023-03-10 08:28:35'),
(20, 'Sarath', 25, 'Male', 'A', '9747483647', 'Vasu', '2023-03-10 09:28:41'),
(21, 'Maddy', 26, 'Male', 'A', '2147483647', 'Senthil', '2023-03-10 14:01:36'),
(22, 'ram', 21, 'Male', 'O+ve', '2147483647', 'Thiru', '2023-03-10 19:05:44'),
(23, 'Guru', 22, 'Male', 'A', '2147483647', 'Desigan', '2022-03-05 12:54:23'),
(24, 'Veera', 12, 'Male', 'O-ve', '2147483647', 'Senthil', '2023-03-16 12:45:10'),
(25, 'ranjith', 15, 'Male', 'A+ve', '2547483647', 'Thiru', '2023-03-16 16:20:36'),
(26, 'ravi', 11, 'Male', 'O+ve', '2147483647', 'Vasu', '2023-03-20 12:52:03'),
(27, 'ramesh', 26, 'Male', 'O+ve', '2147483647', 'Senthil', '2023-03-20 15:45:30'),
(28, 'raj', 85, 'Male', 'O+ve', '7850403937', 'Vasu', '2023-03-20 16:02:20'),
(29, 'rakesh', 35, 'Male', 'O-ve', '7850403937', 'Senthil', '2023-03-20 16:05:35'),
(30, 'Anitha', 21, 'Female', 'O+ve', '7850403937', 'Dr. Thiru', '2023-03-20 16:17:18'),
(31, 'Mr.ram', 25, 'Male', 'O+ve', '7850403937', 'Dr. Vasu', '2023-03-20 16:21:47'),
(32, 'Ms/Mrs.Akshaya', 20, 'Female', 'A-ve', '5454648946', 'Dr. Thiru', '2023-03-20 16:22:33'),
(33, 'Ms/Mrs.Akalya', 25, 'Female', 'O-ve', '7850403937', 'Dr. Vasu', '2023-03-20 16:25:50'),
(34, 'Ms/Mrs.Archana', 25, 'Female', 'A+ve', '7892373949', 'Dr. Senthil', '2023-03-20 16:30:05'),
(35, 'Ms/Mrs.Manju', 26, 'Female', 'O+ve', '7890876383', 'Dr. Thiru', '2023-03-20 16:31:23'),
(36, 'Mr.Rahul', 24, 'Male', 'O+ve', '7850403937', 'Dr. Vasu', '2023-03-20 16:33:39'),
(37, 'Mr.kavin', 25, 'Male', 'O+ve', '7850403937', 'Dr. Senthil', '2023-03-21 13:59:20'),
(38, 'Mr.Abishek', 25, 'Male', 'O-ve', '7892373949', 'Dr. Vasu', '2023-03-21 14:18:06'),
(39, 'Ms.Jessy', 20, 'Female', 'O+ve', '7892372049', 'Dr. Thiru', '2023-03-21 15:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `pat_to_bed`
--

CREATE TABLE `pat_to_bed` (
  `pat_id` bigint(20) NOT NULL,
  `bed_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pat_to_bed`
--

INSERT INTO `pat_to_bed` (`pat_id`, `bed_id`) VALUES
(1, 'none'),
(2, '0'),
(3, '0'),
(4, '0'),
(5, '2'),
(6, '0'),
(7, '3'),
(8, '0'),
(10, 'none'),
(9, '5'),
(11, 'none'),
(12, '7'),
(13, '9'),
(14, 'none'),
(15, 'none'),
(16, 'none'),
(17, 'none'),
(18, 'none'),
(19, 'none'),
(20, 'none'),
(21, 'none'),
(22, 'none'),
(24, 'none'),
(23, 'none'),
(25, 'none'),
(26, 'none'),
(27, 'none'),
(28, 'none'),
(29, 'none'),
(30, 'none'),
(31, 'none'),
(32, 'none'),
(33, 'none'),
(34, 'none'),
(35, 'none'),
(36, 'none'),
(37, 'none'),
(38, 'none'),
(39, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `pword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `uname`, `pword`) VALUES
(1, 'Sri', 'niru', 'sri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
