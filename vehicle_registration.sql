-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:57 PM
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
-- Database: `vehicle_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$7fDslfks8P/uZzH31R4PhuCd191KbNn9kdoGYm12PB6pRpRYUEnVO'),
(2, 'kiko', '$2y$10$hk5kmfu0Wv8httI0x/KyhOxbUH9YWonwkxzL7w/Od6VtQQKAR0IWy');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledata`
--

CREATE TABLE `vehicledata` (
  `id` bigint(20) NOT NULL,
  `vehicle_models` varchar(255) NOT NULL,
  `vehicle_types` varchar(255) NOT NULL,
  `fuel_types` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicledata`
--

INSERT INTO `vehicledata` (`id`, `vehicle_models`, `vehicle_types`, `fuel_types`) VALUES
(1, 'BMW', 'Sedan', 'Diesel'),
(2, 'Mercedes-Benz', 'Coupe', 'Gasoline'),
(3, 'Audi', 'Hatchback', 'Electric\r\n'),
(4, 'Kia', 'SUV', ''),
(5, 'Opel', 'Minivan', ''),
(6, 'Skoda', '', ''),
(7, 'Toyota', '', ''),
(8, 'Fiat', '', ''),
(9, 'Volkswagen', '', ''),
(10, 'Peugeot', '', ''),
(11, 'Maserati', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_chassis_number` varchar(255) NOT NULL,
  `vehicle_production_year` date NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `registration_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_model`, `vehicle_type`, `vehicle_chassis_number`, `vehicle_production_year`, `registration_number`, `fuel_type`, `registration_to`) VALUES
(1, 'BMW', 'Sedan', 'k1ktya', '2020-06-14', 'SR9009AD', 'Diesel', '2024-05-21'),
(2, 'Audi', 'Coupe', 'r1ste', '2017-06-06', 'SR7005AD', 'Diesel', '2024-05-21'),
(3, 'Mercedes-Benz', 'Coupe', 'dz7car', '2022-02-08', 'SR3333DZ', 'Gasoline', '2023-06-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicledata`
--
ALTER TABLE `vehicledata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicledata`
--
ALTER TABLE `vehicledata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
