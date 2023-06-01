-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 07:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_roger`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `reference_number` int(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `reference_number`, `room_id`, `room_category_id`, `name`, `contact_number`, `email`, `price`, `payment`, `date_in`, `date_out`, `status`, `date_created`, `date_updated`) VALUES
(24, 3126, 'Room10', 1, 'asdasdasd asd ', '+639156915704', 'dasiferoq@mailinator.com', '120', '', '2023-04-20', '2023-04-28', 2, '2023-04-19', '2023-04-19'),
(25, 2409, 'Room18', 1, 'titererrwerwr', '+639567521753', 'ryantecling@gmail.com', '120', '400', '2023-05-23', '2023-05-24', 3, '2023-05-22', '2023-05-22'),
(27, 4108, 'Room24', 1, 'ryan tecling', '+639567521753', 'jijieazy13@gmail.com', '120', '400', '2023-06-01', '2023-06-04', 2, '2023-06-01', '2023-06-01'),
(28, 5794, 'Room1', 1, 'sdfsd afasdfd', '+639567521753', 'ryantecling@gmail.com', '120', '400', '2023-06-01', '2023-06-03', 1, '2023-06-01', '2023-06-01'),
(29, 2845, 'Room92', 1, 'asdasdas ajksnfkjans', '+639567521753', 'ryantecling@gmail.com', '120', '400', '2023-06-01', '2023-06-03', 1, '2023-06-01', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `reference_number` int(11) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `payment` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `reference_number`, `room_id`, `room_category_id`, `name`, `contact_number`, `payment`, `date_in`, `date_out`, `date_created`) VALUES
(5, 3106, 'Room81', 1, 'mathew dy', 2147483647, 0, '2023-04-19', '2023-04-28', '2023-04-15'),
(6, 4444, 'Room52', 1, 'melendez ', 2147483647, 0, '2023-04-27', '2023-04-28', '2023-04-15'),
(7, 4108, 'Room24', 1, 'ryan tecling', 2147483647, 0, '2023-06-01', '2023-06-04', '2023-06-01'),
(8, 3126, 'Room10', 1, 'asdasdasd asd ', 2147483647, 0, '2023-04-20', '2023-04-28', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `category`, `price`, `image`) VALUES
(1, 'family', '120', 0x66616d696c792e6a7067),
(2, 'deluxe', '500', 0x64656c7578652e6a7067),
(3, 'single', '150', 0x73696e676c652e6a7067),
(4, 'twin', '250', 0x7477696e2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(3, 'booked'),
(1, 'checked_in'),
(2, 'checked_out');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date_created`) VALUES
(1, 'mathew dalisay', 'mathewdalisay@gmail.com', '1234', '0000-00-00'),
(2, 'mathew dalisay 2', 'admin@gmail.com', 'admin', '0000-00-00'),
(3, 'melendezdj', 'melendezdj@gmail.com', '1234', '2023-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
