-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 12:58 PM
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
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Science and Technology'),
(2, 'History and Culture'),
(3, 'Arts and Entertainment'),
(4, 'Health and Wellness'),
(5, 'Nature and Environment'),
(6, 'Travel and Exploration'),
(7, 'Philosophy and Religion'),
(8, 'Business and Economics'),
(9, 'Education and Learning'),
(10, 'DIY and Hobbies'),
(11, 'Social Issues and Activism'),
(12, 'Languages and Linguistics'),
(13, 'Food and Cooking'),
(14, 'Sports and Recreation'),
(15, 'Literature and Writing'),
(17, 'Cum et distinctio');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'Technology'),
(2, 'AI'),
(3, 'Science'),
(4, 'Programming'),
(5, 'Web Development'),
(6, 'Health'),
(7, 'Artificial Intelligence'),
(8, 'Machine Learning'),
(9, 'Data Science'),
(10, 'Cybersecurity'),
(11, 'Blockchain'),
(12, 'Programming Languages'),
(13, 'Software Development'),
(14, 'Cloud Computing'),
(15, 'Internet of Things (IoT)'),
(16, 'Robotics'),
(17, 'Virtual Reality'),
(18, 'Augmented Reality'),
(19, 'Biotechnology'),
(20, 'Space Exploration'),
(21, 'Environment'),
(22, 'Healthcare'),
(23, 'Fitness'),
(24, 'Nutrition'),
(25, 'Travel'),
(26, 'History'),
(27, 'Culture'),
(28, 'Entertainment'),
(29, 'Sports'),
(30, 'Finance'),
(31, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bio` text,
  `roleID` int NOT NULL DEFAULT '2',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--



--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `userID` int NOT NULL,
  `categoryID` int DEFAULT NULL,
  `status` enum('accepted','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wiki`
--



--
-- Table structure for table `wiki_tag`
--

CREATE TABLE `wiki_tag` (
  `tagID` int DEFAULT NULL,
  `wikiID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wiki_tag`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`roleID`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `wiki_tag`
--
ALTER TABLE `wiki_tag`
  ADD KEY `tagID` (`tagID`),
  ADD KEY `wikiID` (`wikiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wiki_tag`
--
ALTER TABLE `wiki_tag`
  ADD CONSTRAINT `wiki_tag_ibfk_1` FOREIGN KEY (`tagID`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_tag_ibfk_2` FOREIGN KEY (`wikiID`) REFERENCES `wiki` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
