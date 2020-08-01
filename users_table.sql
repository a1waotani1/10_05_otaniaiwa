-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2020 at 08:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsacf_d06_05`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `age` varchar(128) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `name`, `password`, `image`, `age`, `bio`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'testuser1', 'Ivy Johnson', 'testuser1', 'upload/*20200730123000b5d58f8e09784b5a8fdbfc05b675ec39.jpeg', '18', 'hdhdhdhd', 0, 0, '2020-07-30 19:30:00', '2020-07-30 19:30:00'),
(2, 'testuser2', '竹内マリア', 'testuser2', 'upload/*202007300937102328cd4cd903a5f86eb832501b8872b4.jpeg', '21', '辛いものがとても苦手で、甘党でーす', 0, 0, '2020-07-30 16:37:10', '2020-07-30 16:37:10'),
(3, 'testuser3', '', 'testuser3', NULL, '', '', 0, 0, '2020-07-15 17:50:07', '2020-07-15 17:50:07'),
(4, 'testuser4', '', 'testuser4', NULL, '', '', 0, 0, '2020-07-15 17:50:37', '2020-07-15 17:50:37'),
(5, 'testuser5', '', 'testuser5', NULL, '', '', 0, 0, '2020-07-23 12:38:19', '2020-07-23 12:38:19'),
(8, 'testing123', NULL, 'testing123', NULL, NULL, NULL, 0, 0, '2020-08-01 15:14:08', '2020-08-01 15:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
