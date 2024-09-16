-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 03:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_web_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `build-web-page`
--

CREATE TABLE `build-web-page` (
  `id` bigint(20) NOT NULL,
  `coverImageUrl` varchar(255) NOT NULL,
  `mainTitle` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `aboutYou` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `servicesOrProducts` varchar(255) NOT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageUrlTwo` varchar(255) NOT NULL,
  `descriptionTwo` varchar(255) NOT NULL,
  `imageUrlThree` varchar(255) NOT NULL,
  `descriptionThree` varchar(255) NOT NULL,
  `companyDescription` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `build-web-page`
--
ALTER TABLE `build-web-page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `build-web-page`
--
ALTER TABLE `build-web-page`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
