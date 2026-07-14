-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 11:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `trip_registrations`
--

CREATE TABLE `trip_registrations` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `trip_date` varchar(50) NOT NULL,
  `travelers` int(3) NOT NULL,
  `package` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_registrations`
--

INSERT INTO `trip_registrations` (`id`, `name`, `email`, `phone`, `age`, `gender`, `address`, `trip_date`, `travelers`, `package`, `message`, `created_at`) VALUES
(1, 'Sarah Appiah', 'sarahappiah@gmail.com', '0201504937', 39, 'Female', 'Assin Fosu', 'April 2026', 1, 'Deluxe - $1,499', 'sunset beach stay', '2026-01-14 16:25:07'),
(2, 'Ragan Mensah', 'raganmensah@gmail.com', '0201504937', 39, 'Male', 'Assin Fosu', 'April 2026', 1, 'Deluxe - $1,499', 'sea food and the lagoon escape ', '2026-01-18 22:24:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trip_registrations`
--
ALTER TABLE `trip_registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trip_registrations`
--
ALTER TABLE `trip_registrations`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
