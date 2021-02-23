-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 09:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `m_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`m_id`, `name`, `email`, `password`) VALUES
(7, 'management', 'management@gmail.com', '123'),
(8, 'management', 'admin@gmail.com', '123'),
(9, 'rohit19060', 'thepinkcomrade@gmail.com', '123'),
(10, 'maddy', 'maddy@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `h_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hired` int(10) NOT NULL DEFAULT 0,
  `dob` date DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `bio` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `ic` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`h_id`, `name`, `email`, `password`, `hired`, `dob`, `phone`, `address`, `rate`, `bio`, `profile`, `ic`, `certificate`, `order_id`) VALUES
(41, 'Maddy', 'asdf@gmail.com', '123', 7, '2019-01-10', 2147483647, 'asdf', 15, 'Hi, Myself Rohit', '41profileGaming.png', '41icGaming.pdf', '41certificateGaming.pdf', 16),
(43, 'rohit', 'jain@gmail.com', '123', 7, '1998-03-20', 2147483647, 'rtadsfasdf', 15, 'TEst BIo', '43profileKing_Tech_Profile_Light.png', '43icGaming.pdf', '43certificateGaming.pdf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date_hired` date NOT NULL,
  `date_upto` date NOT NULL,
  `amount` int(11) NOT NULL,
  `m_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `h_id`, `date_hired`, `date_upto`, `amount`, `m_id`) VALUES
(14, 43, '2021-02-23', '2021-02-24', 1392, 7),
(15, 43, '2021-02-23', '2021-02-24', 1392, 7),
(16, 41, '2021-02-23', '2021-02-25', 240, 7);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` tinyint(1) NOT NULL,
  `PN` tinyint(1) DEFAULT NULL,
  `HP` tinyint(1) DEFAULT NULL,
  `WM` tinyint(1) DEFAULT NULL,
  `MET` tinyint(1) DEFAULT NULL,
  `BAQ` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `PN`, `HP`, `WM`, `MET`, `BAQ`) VALUES
(41, 0, 1, 1, 1, 0),
(43, 0, 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`h_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
