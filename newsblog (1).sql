-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2022 at 08:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `sub_type` int(4) NOT NULL DEFAULT 0,
  `img_path` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `type`, `sub_type`, `img_path`, `created_at`) VALUES
(6, 'sports', 'natoinal', 1, 1, '68163-04.jpg', '2022-09-03 12:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `sub_type` enum('NATIONAL','INTER_NATIONAL','STATE') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sub_type`, `created_at`) VALUES
(1, 'Political', NULL, '2022-09-02 18:24:32'),
(2, 'Business', NULL, '2022-09-02 18:24:32'),
(3, 'Sports', NULL, '2022-09-02 18:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `status` enum('PENDING','APPROVED','REJECTED') NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `comment`, `status`, `created_at`) VALUES
(25, 7, 'ttere', 'APPROVED', '2022-09-02 12:45:55'),
(26, 7, 'ttere', 'APPROVED', '2022-09-02 12:46:00'),
(27, 7, 'vgycbh', 'PENDING', '2022-09-01 16:11:41'),
(28, 6, 'r4vb3njx', 'REJECTED', '2022-09-02 12:46:03'),
(29, 2, 'uyb43', 'PENDING', '2022-09-01 16:11:48'),
(30, 1, 'fy3rdbhe', 'PENDING', '2022-09-01 16:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_list`
--

CREATE TABLE `subscribe_list` (
  `id` int(11) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe_list`
--

INSERT INTO `subscribe_list` (`id`, `email`, `created_at`) VALUES
(2, 'email2@email.com', '2022-09-01 06:26:44'),
(5, 'rstr@gmail.com', '2022-09-01 15:23:16'),
(6, 'rstr@gmail.com', '2022-09-01 15:32:26'),
(7, 'rstr@gmail.com', '2022-09-03 06:36:09'),
(8, 'rstr@gmail.com', '2022-09-03 06:36:20'),
(9, 'rstr@gmail.qwef', '2022-09-03 06:36:23'),
(10, 'rstr@gmail.qwef', '2022-09-03 06:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `Sub_categories`
--

CREATE TABLE `Sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sub_categories`
--

INSERT INTO `Sub_categories` (`id`, `name`, `created_at`) VALUES
(1, 'State', '2022-09-03 11:51:07'),
(2, 'national', '2022-09-03 11:51:07'),
(3, 'inter national', '2022-09-03 11:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `account_type` enum('ADMIN','SUB_ADMIN','USER','OTHER') CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `account_type`, `created_at`) VALUES
(3, 'lokesh', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMIN', '2022-08-28 16:32:13'),
(5, 'chaitu', 'lovali4133@exoacre.com', '81dc9bdb52d04dc20036dbd8313ed055', 'SUB_ADMIN', '2022-09-01 18:13:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Sub_categories`
--
ALTER TABLE `Sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Sub_categories`
--
ALTER TABLE `Sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
