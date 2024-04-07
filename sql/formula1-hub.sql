-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 07, 2024 at 09:46 PM
-- Server version: 11.1.3-MariaDB-1:11.1.3+maria~ubu2204
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1-hub`
--
CREATE DATABASE IF NOT EXISTS `formula1-hub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `formula1-hub`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `text`, `created_at`, `updated_at`) VALUES
(33, 1661, 'Excited about the 2023 season! The new aerodynamic regulations are really shaking things up. Can\'t wait to see how the teams adapt.', '2024-01-21 22:34:08', '2024-01-21 22:34:08'),
(34, 1661, 'I\'m rooting for Verstappen this year. He\'s shown incredible skill, especially in those tight corner battles. Let\'s see if he can maintain his momentum!', '2024-01-21 22:34:15', '2024-01-21 22:34:15'),
(35, 1662, 'The engine improvements this season are fascinating. It\'s all about finding that perfect balance between power and efficiency. Teams like Mercedes and Ferrari are really pushing the limits.', '2024-01-21 22:35:31', '2024-01-21 22:35:31'),
(37, 1662, 'I\'m impressed by the rookies this season. They\'re not just there to make up the numbers; they\'re really challenging the veterans. Makes for some exciting races!', '2024-01-21 22:35:46', '2024-04-07 21:29:33'),
(38, 1661, 'The Bahrain Grand Prix was a thriller! The battle for the podium spots was intense. Loving the competitive energy this season.', '2024-01-21 22:36:06', '2024-01-21 22:36:06'),
(39, 1662, 'Anyone else think the Miami Grand Prix is going to be a game-changer this year? The track layout looks challenging, and the drivers will really have to be on top of their game.', '2024-01-21 22:38:52', '2024-01-21 22:38:52'),
(40, 1654, 'Hey!!! I am new here!', '2024-01-21 22:49:18', '2024-01-21 22:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `email`) VALUES
(1653, 'admin', '$2y$10$gknM1DnoS6lg7PhmwAbq3egElFGy2.6SdZvOK1oQqmp/tOlnhdMvC', 'admin@admin.com'),
(1654, 'rafal', '$2y$10$aGlnkkoiTYkBU81Hf6oI4.VzbZemKVsfeqk6iq54NXiir0d3vDEdq', 'test@email.com'),
(1661, 'speedracer99', '$2y$10$ez95wiMjZn6z543gW3AGE.TqZcdmF3lrySlD3ugzCBQ/fOGdAuMpG', 'speedracer99@email.com'),
(1662, 'f1fanatic2023', '$2y$10$SBrqWi3CP4CnOwI4MYfL7OT1aHJpypkVEdiRS4I1Axv2NZBcWdokS', 'f1fanatic2023@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1663;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
