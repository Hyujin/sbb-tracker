-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 01:56 AM
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
-- Database: `prog`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(12) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `usertype` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `fullname`, `usertype`, `password`) VALUES
(53, 'Altria Agent', 'Agent', '$2y$10$Rbl42tgh9Jl78dp3yudgwO9N6D/50QH3croXEkMAH4y0xA8PHSaye'),
(54, 'Eugene Cortes', 'Agent', '$2y$10$emnnGzPKO1qrokJI1eLMZeszRx9xeoINd5xvk5Z.hkWlpGJAromu2');

-- --------------------------------------------------------

--
-- Table structure for table `superusers`
--

CREATE TABLE `superusers` (
  `id` int(12) NOT NULL,
  `fullname` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superusers`
--

INSERT INTO `superusers` (`id`, `fullname`, `password`, `usertype`) VALUES
(1, 'Altria Client', '1989', 'Client'),
(2, 'Altria Admin', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(12) NOT NULL,
  `fullname` varchar(16) NOT NULL,
  `order_id` int(18) NOT NULL,
  `cx_phone` int(12) NOT NULL,
  `disposition` varchar(18) NOT NULL,
  `amount` int(18) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `fullname`, `order_id`, `cx_phone`, `disposition`, `amount`, `timestamp`) VALUES
(55, 'Eugene Cortes', 124, 2147483647, 'Refund', 999, '2021-10-31 07:00:00.000000'),
(56, 'Eugene Cortes', 125, 7649078, 'Sales', 899, '2021-11-01 19:47:08.611967'),
(57, 'Eugene Cortes', 126, 2147483647, 'General Inquiry', 0, '2021-11-01 19:47:19.556078'),
(58, 'Eugene Cortes', 127, 46479, 'Refund', 499, '2021-11-01 19:47:45.216177'),
(59, 'Eugene Cortes', 128, 7688990, 'Reshipment Status', 0, '2021-11-01 19:48:03.961184'),
(60, 'Eugene Cortes', 129, 24647798, 'Sales', 8999, '2021-11-01 19:48:27.845951'),
(61, 'Eugene Cortes', 31246597, 2147483647, 'Reshipment Status', 0, '2021-11-02 00:50:01.797570'),
(62, 'Altria Agent', 132, 2147483647, 'Order Status', 0, '2021-11-02 00:50:26.933536');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superusers`
--
ALTER TABLE `superusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `superusers`
--
ALTER TABLE `superusers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
