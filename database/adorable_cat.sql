-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2023 at 05:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adorable_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `room_id` int NOT NULL,
  `ph_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `noofrooms` int NOT NULL,
  `special_request` text NOT NULL,
  `cat_information` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `user_id`, `room_id`, `ph_number`, `check_in`, `check_out`, `noofrooms`, `special_request`, `cat_information`) VALUES
(28, 'Rama Bird', 'zekazy@mailinator.com', NULL, 1, '+1 (374) 535-8472', '1980-07-11', '2011-08-27', 2, 'Ipsa praesentium eo', '[{\"answer_text\": \" Wet Food\", \"question_text\": \"What food do you want us to feed your cats?\"}, {\"answer_text\": \"Zeus, Cooley\", \"question_text\": \"Please write cat name/s.\"}, {\"answer_text\": \"Yes\", \"question_text\": \"Spayed/Neutered\"}]'),
(29, NULL, NULL, 6, 1, NULL, '2023-04-21', '2023-04-22', 2, 'Please take care ....', '[{\"answer_text\": \"Male, Female\", \"question_text\": \"Gender  (Please write with comma if you have more than a cat.)\"}, {\"answer_text\": \"Dry Food\", \"question_text\": \"What food do you want us to feed your cats?\"}, {\"answer_text\": \"Mussy, Pussy\", \"question_text\": \"Please write cat name/s.\"}, {\"answer_text\": \" No\", \"question_text\": \"Spayed/Neutered\"}]'),
(30, NULL, NULL, 6, 1, NULL, '2023-04-20', '2023-04-25', 2, 'Ex sint voluptas ali', '[{\"answer_text\": \"Quaerat sint invent\", \"question_text\": \"Gender  (Please write with comma if you have more than a cat.)\"}, {\"answer_text\": \"Dry Food\", \"question_text\": \"What food do you want us to feed your cats?\"}, {\"answer_text\": \"Bruno Dale\", \"question_text\": \"Please write cat name/s.\"}, {\"answer_text\": \" No\", \"question_text\": \"Spayed/Neutered\"}]'),
(31, NULL, NULL, 6, 2, NULL, '2023-04-19', '2023-04-21', 2, 'Ad minim neque perfe', '[{\"answer_text\": \"Non quaerat dolore l\", \"question_text\": \"Gender  (Please write with comma if you have more than a cat.)\"}, {\"answer_text\": \" Wet Food\", \"question_text\": \"What food do you want us to feed your cats?\"}, {\"answer_text\": \"Ava Gallegos\", \"question_text\": \"Please write cat name/s.\"}, {\"answer_text\": \"Yes\", \"question_text\": \"Spayed/Neutered\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `cat_questions`
--

CREATE TABLE `cat_questions` (
  `id` int NOT NULL,
  `question_text` text NOT NULL,
  `question_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '1 => selectbox, 2=> textbox, 3=> radiobox\r\n',
  `option_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cat_questions`
--

INSERT INTO `cat_questions` (`id`, `question_text`, `question_type`, `option_values`) VALUES
(2, 'Spayed/Neutered', 'selectbox', 'Yes, No'),
(3, 'Please write cat name/s.', 'textbox', ''),
(4, 'What food do you want us to feed your cats?', 'radio', 'Dry Food, Wet Food'),
(6, 'Gender  (Please write with comma if you have more than a cat.)', 'textbox', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Colette Dawson', 'cano@mailinator.com', 'Porro rem iure aut e', 'Quia quod earum ex v');

-- --------------------------------------------------------

--
-- Table structure for table `feature_images`
--

CREATE TABLE `feature_images` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feature_images`
--

INSERT INTO `feature_images` (`id`, `room_id`, `image`) VALUES
(2, 1, 'download (4).jpg'),
(7, 2, 'images.jpg'),
(11, 4, 'download (4).jpg'),
(13, 5, 'download (6).jpg'),
(14, 5, 'images (3).jpg'),
(15, 5, 'images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `noofrooms` int NOT NULL,
  `specification` text NOT NULL,
  `price` int NOT NULL,
  `image` text NOT NULL,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT '0 => not deleted\r\n1 => deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `noofrooms`, `specification`, `price`, `image`, `deleted_at`) VALUES
(1, 'Single Room', 40, 'Your price includes:\r\nParking, Express check-in, Free WiFi, Free fitness center access\r\nExtra low price! (non-refundable)\r\nOptional benefit:Breakfast at AUD 33', 80, 'download (1).jpg', 0),
(2, 'Double Room', 35, 'Your price includes:\r\nParking, Express check-in, Free WiFi, Free fitness center access\r\nExtra low price! (non-refundable)\r\nOptional benefit:Breakfast at AUD ', 150, 'download.jpg', 0),
(3, 'Delex Room2', 302, 'Testing Data 2', 902, 'download (2).jpg', 1),
(4, 'Delex Room', 30, 'testing', 300, 'download (1).jpg', 1),
(5, 'Single Delux Room', 30, 'Testing', 300, 'download (6).jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '1 => cat_owner\r\n2 => staff\r\n3 => admin',
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT '1 => deleted\r\n0 => not delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `phone_number`, `deleted_at`) VALUES
(5, 'Daniel Hardin', '1', 'daniel@gmail.com', 'b30322674212eef9e7e23a0dfb33b916a8d5c23c', '09422715702', 0),
(6, 'admin', '3', 'admin@gmail.com', 'b30322674212eef9e7e23a0dfb33b916a8d5c23c', '09422715702', 0),
(7, 'Shu Li Li', '1', 'shuli@gmail.com', 'eb9ba4456bf0b19047d9439f671a714a3be52e74', '09345243523', 1),
(8, 'shu li 1 1', '2', 'shuli123@gmail.com', 'b30322674212eef9e7e23a0dfb33b916a8d5c23c', '09422715701', 0),
(9, 'Taylor Swift 123', '1', 'taylorswift@gmail.com', 'b30322674212eef9e7e23a0dfb33b916a8d5c23c', '09422715701', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_questions`
--
ALTER TABLE `cat_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cat_questions`
--
ALTER TABLE `cat_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feature_images`
--
ALTER TABLE `feature_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
