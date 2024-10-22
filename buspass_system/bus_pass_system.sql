-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 09:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_pass_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadhaar`
--

CREATE TABLE `aadhaar` (
  `id` int(11) NOT NULL,
  `aadhaar_number` varchar(12) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aadhaar`
--

INSERT INTO `aadhaar` (`id`, `aadhaar_number`, `verified`) VALUES
(1, '123456789012', 0),
(2, '234567890123', 0),
(3, '345678901234', 0),
(4, '456789012345', 0),
(5, '567890123456', 0),
(6, '678901234567', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bus_pass`
--

CREATE TABLE `bus_pass` (
  `pass_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pass_type` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `starting_from` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_pass`
--

INSERT INTO `bus_pass` (`pass_id`, `user_id`, `pass_type`, `duration`, `starting_from`, `destination`, `start_date`, `end_date`, `price`) VALUES
(1, 3, 'monthly', 2, 'T. Nagar', 'Selaiyur', '2024-10-21', '0000-00-00', 0.00),
(2, 3, 'monthly', 1, 'Guindy', 'Selaiyur', '2024-10-21', '2024-10-31', 0.00),
(3, 3, 'differently_abled', 2, 'T. Nagar', 'Camp Road', '2024-10-21', '2024-11-04', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `bus_price`
--

CREATE TABLE `bus_price` (
  `r_id` int(50) NOT NULL,
  `stop1` decimal(10,2) DEFAULT NULL,
  `stop2` decimal(10,2) DEFAULT NULL,
  `stop3` decimal(10,2) DEFAULT NULL,
  `stop4` decimal(10,2) DEFAULT NULL,
  `stop5` decimal(10,2) DEFAULT NULL,
  `stop6` decimal(10,2) DEFAULT NULL,
  `stop7` decimal(10,2) DEFAULT NULL,
  `stop8` decimal(10,2) DEFAULT NULL,
  `stop9` decimal(10,2) DEFAULT NULL,
  `stop10` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_price`
--

INSERT INTO `bus_price` (`r_id`, `stop1`, `stop2`, `stop3`, `stop4`, `stop5`, `stop6`, `stop7`, `stop8`, `stop9`, `stop10`) VALUES
(2, 10.00, 15.00, 20.00, 25.00, 30.00, 35.00, 40.00, 45.00, 50.00, 55.00),
(3, 20.00, 25.00, 30.00, 35.00, 40.00, 45.00, 50.00, 55.00, 60.00, 65.00),
(4, 25.00, 30.00, 35.00, 40.00, 45.00, 50.00, 55.00, 60.00, 65.00, 70.00),
(5, 30.00, 35.00, 40.00, 45.00, 50.00, 55.00, 60.00, 65.00, 70.00, 75.00),
(6, 35.00, 40.00, 45.00, 50.00, 55.00, 60.00, 65.00, 70.00, 75.00, 80.00),
(7, 40.00, 45.00, 50.00, 55.00, 60.00, 65.00, 70.00, 75.00, 80.00, 85.00),
(8, 45.00, 50.00, 55.00, 60.00, 65.00, 70.00, 75.00, 80.00, 85.00, 90.00),
(9, 50.00, 55.00, 60.00, 65.00, 70.00, 75.00, 80.00, 85.00, 90.00, 95.00),
(10, 55.00, 60.00, 65.00, 70.00, 75.00, 80.00, 85.00, 90.00, 95.00, 100.00),
(11, 60.00, 65.00, 70.00, 75.00, 80.00, 85.00, 90.00, 95.00, 100.00, 105.00),
(12, 65.00, 70.00, 75.00, 80.00, 85.00, 90.00, 95.00, 100.00, 105.00, 110.00),
(13, 70.00, 75.00, 80.00, 85.00, 90.00, 95.00, 100.00, 105.00, 110.00, 115.00),
(14, 75.00, 80.00, 85.00, 90.00, 95.00, 100.00, 105.00, 110.00, 115.00, 120.00),
(15, 80.00, 85.00, 90.00, 95.00, 100.00, 105.00, 110.00, 115.00, 120.00, 125.00),
(16, 85.00, 90.00, 95.00, 100.00, 105.00, 110.00, 115.00, 120.00, 125.00, 130.00),
(17, 90.00, 95.00, 100.00, 105.00, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00),
(18, 95.00, 100.00, 105.00, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00, 140.00),
(19, 100.00, 105.00, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00, 140.00, 145.00),
(20, 105.00, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00, 140.00, 145.00, 150.00),
(21, 110.00, 115.00, 120.00, 125.00, 130.00, 135.00, 140.00, 145.00, 150.00, 155.00),
(22, 115.00, 120.00, 125.00, 130.00, 135.00, 140.00, 145.00, 150.00, 155.00, 160.00),
(23, 120.00, 125.00, 130.00, 135.00, 140.00, 145.00, 150.00, 155.00, 160.00, 165.00),
(24, 125.00, 130.00, 135.00, 140.00, 145.00, 150.00, 155.00, 160.00, 165.00, 170.00),
(25, 130.00, 135.00, 140.00, 145.00, 150.00, 155.00, 160.00, 165.00, 170.00, 175.00),
(26, 135.00, 140.00, 145.00, 150.00, 155.00, 160.00, 165.00, 170.00, 175.00, 180.00),
(27, 140.00, 145.00, 150.00, 155.00, 160.00, 165.00, 170.00, 175.00, 180.00, 185.00),
(28, 145.00, 150.00, 155.00, 160.00, 165.00, 170.00, 175.00, 180.00, 185.00, 190.00),
(29, 150.00, 155.00, 160.00, 165.00, 170.00, 175.00, 180.00, 185.00, 190.00, 195.00),
(30, 155.00, 160.00, 165.00, 170.00, 175.00, 180.00, 185.00, 190.00, 195.00, 200.00),
(31, 160.00, 165.00, 170.00, 175.00, 180.00, 185.00, 190.00, 195.00, 200.00, 205.00),
(32, 165.00, 170.00, 175.00, 180.00, 185.00, 190.00, 195.00, 200.00, 205.00, 210.00),
(33, 170.00, 175.00, 180.00, 185.00, 190.00, 195.00, 200.00, 205.00, 210.00, 215.00),
(34, 175.00, 180.00, 185.00, 190.00, 195.00, 200.00, 205.00, 210.00, 215.00, 220.00),
(35, 180.00, 185.00, 190.00, 195.00, 200.00, 205.00, 210.00, 215.00, 220.00, 225.00),
(36, 185.00, 190.00, 195.00, 200.00, 205.00, 210.00, 215.00, 220.00, 225.00, 230.00),
(37, 190.00, 195.00, 200.00, 205.00, 210.00, 215.00, 220.00, 225.00, 230.00, 235.00),
(38, 195.00, 200.00, 205.00, 210.00, 215.00, 220.00, 225.00, 230.00, 235.00, 240.00),
(39, 200.00, 205.00, 210.00, 215.00, 220.00, 225.00, 230.00, 235.00, 240.00, 245.00),
(40, 205.00, 210.00, 215.00, 220.00, 225.00, 230.00, 235.00, 240.00, 245.00, 250.00),
(41, 210.00, 215.00, 220.00, 225.00, 230.00, 235.00, 240.00, 245.00, 250.00, 255.00),
(42, 215.00, 220.00, 225.00, 230.00, 235.00, 240.00, 245.00, 250.00, 255.00, 260.00),
(43, 220.00, 225.00, 230.00, 235.00, 240.00, 245.00, 250.00, 255.00, 260.00, 265.00),
(44, 225.00, 230.00, 235.00, 240.00, 245.00, 250.00, 255.00, 260.00, 265.00, 270.00),
(45, 230.00, 235.00, 240.00, 245.00, 250.00, 255.00, 260.00, 265.00, 270.00, 275.00),
(46, 235.00, 240.00, 245.00, 250.00, 255.00, 260.00, 265.00, 270.00, 275.00, 280.00),
(47, 240.00, 245.00, 250.00, 255.00, 260.00, 265.00, 270.00, 275.00, 280.00, 285.00),
(48, 245.00, 250.00, 255.00, 260.00, 265.00, 270.00, 275.00, 280.00, 285.00, 290.00),
(49, 250.00, 255.00, 260.00, 265.00, 270.00, 275.00, 280.00, 285.00, 290.00, 295.00),
(50, 255.00, 260.00, 265.00, 270.00, 275.00, 280.00, 285.00, 290.00, 295.00, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE `bus_route` (
  `r_id` int(11) NOT NULL,
  `route_no` varchar(10) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `stop1` varchar(100) NOT NULL,
  `stop2` varchar(100) NOT NULL,
  `stop3` varchar(100) DEFAULT NULL,
  `stop4` varchar(100) DEFAULT NULL,
  `stop5` varchar(100) DEFAULT NULL,
  `stop6` varchar(100) DEFAULT NULL,
  `stop7` varchar(100) DEFAULT NULL,
  `stop8` varchar(100) DEFAULT NULL,
  `stop9` varchar(100) DEFAULT NULL,
  `stop10` varchar(100) DEFAULT NULL,
  `total_fare` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_route`
--

INSERT INTO `bus_route` (`r_id`, `route_no`, `route_name`, `stop1`, `stop2`, `stop3`, `stop4`, `stop5`, `stop6`, `stop7`, `stop8`, `stop9`, `stop10`, `total_fare`) VALUES
(2, '', '1A', 'T. Nagar', 'Saidapet', 'Guindy', 'Velachery', 'Medavakkam', 'Tambaram East', 'Camp Road', 'Selaiyur', 'Tambaram', NULL, 21),
(3, '', '5B', 'Broadway', 'Parrys Corner', 'High Court', 'Chepauk', 'Mylapore', 'Adyar', 'Indira Nagar', 'Tidel Park', 'Thiruvanmiyur', '', 21),
(4, '', '6C', 'Anna Nagar', 'Shenoy Nagar', 'Chetpet', 'Egmore', 'Central', 'Park Town', 'Fort', 'High Court', NULL, NULL, NULL),
(5, '', '18A', 'Thiruvanmiyur', 'Adyar', 'Saidapet', 'Guindy', 'Kathipara', 'St Thomas Mount', 'Pallavaram', 'Chromepet', 'Tambaram', NULL, NULL),
(6, '', '23C', 'Vadapalani', 'Ashok Nagar', 'K. K. Nagar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL, NULL),
(7, '', '27H', 'Besant Nagar', 'Adyar', 'Indira Nagar', 'Tidel Park', 'Thiruvanmiyur', 'ECR', 'Neelankarai', 'Uthandi', NULL, NULL, NULL),
(8, '', '29B', 'Perambur', 'Vyasarpadi', 'Mint', 'Broadway', 'Parrys Corner', 'Royapuram', 'Washermanpet', 'Thiruvottriyur', NULL, NULL, NULL),
(9, '', '47A', 'Thiruvottiyur', 'Ennore', 'Manali', 'Red Hills', 'Puzhal', 'Madhavaram', 'Perambur', 'Ayanavaram', 'Chetpet', NULL, NULL),
(10, '', '52K', 'Tambaram', 'Perungalathur', 'Vandalur', 'Urapakkam', 'Guduvanchery', 'Potheri', 'Maraimalai Nagar', 'Singaperumal Koil', NULL, NULL, NULL),
(11, '', '54M', 'Adambakkam', 'Velachery', 'Perungudi', 'Thoraipakkam', 'Karapakkam', 'Sholinganallur', 'Siruseri', NULL, NULL, NULL, NULL),
(12, '', '70V', 'Vandalur', 'Kelambakkam', 'Thiruporur', 'Mahabalipuram', 'Cheyyur', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '', '12B', 'Central', 'Egmore', 'Chintadripet', 'Nungambakkam', 'Kodambakkam', 'Ashok Pillar', 'KK Nagar', 'Vadapalani', NULL, NULL, NULL),
(14, '', '13A', 'T. Nagar', 'Kodambakkam', 'Vadapalani', 'Porur', 'Poonamallee', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '', '14D', 'Velachery', 'Medavakkam', 'Perumbakkam', 'Sholinganallur', 'Navalur', 'SIPCOT', 'Siruseri', NULL, NULL, NULL, NULL),
(16, '', '15G', 'Tambaram', 'Selaiyur', 'Camp Road', 'Madambakkam', 'Medavakkam', 'Pallikaranai', NULL, NULL, NULL, NULL, NULL),
(17, '', '16C', 'Broadway', 'Parrys Corner', 'Mint', 'Vyasarpadi', 'Perambur', 'Madhavaram', 'Red Hills', 'Puzhal', NULL, NULL, NULL),
(18, '', '17B', 'Egmore', 'Chetpet', 'Aminjikarai', 'Anna Nagar', 'Mogappair', 'Ambattur', 'Avadi', NULL, NULL, NULL, NULL),
(19, '', '18E', 'T. Nagar', 'Nandanam', 'Saidapet', 'Guindy', 'Pallavaram', 'Chromepet', 'Tambaram', 'Perungalathur', 'Vandalur', NULL, NULL),
(20, '', '19A', 'High Court', 'Central', 'Park Town', 'Egmore', 'Chetpet', 'Nungambakkam', 'Vadapalani', 'Porur', 'Poonamallee', NULL, NULL),
(21, '', '21L', 'Adyar', 'Guindy', 'Velachery', 'Perungudi', 'Thoraipakkam', 'Karapakkam', 'Sholinganallur', NULL, NULL, NULL, NULL),
(22, '', '42V', 'Thiruvanmiyur', 'Indira Nagar', 'Adyar', 'Saidapet', 'Guindy', 'Kathipara', 'Pallavaram', 'Chromepet', 'Tambaram', NULL, NULL),
(23, '', '43C', 'Broadway', 'Parrys Corner', 'High Court', 'Anna Salai', 'Nandanam', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL),
(24, '', '44B', 'Adyar', 'Guindy', 'Velachery', 'Pallikaranai', 'Thoraipakkam', 'Sholinganallur', NULL, NULL, NULL, NULL, NULL),
(25, '', '45A', 'T. Nagar', 'Kodambakkam', 'Vadapalani', 'Porur', 'Poonamallee', NULL, NULL, NULL, NULL, NULL, NULL),
(26, '', '46P', 'Thiruvottiyur', 'Ennore', 'Manali', 'Red Hills', 'Puzhal', 'Madhavaram', NULL, NULL, NULL, NULL, NULL),
(27, '', '47J', 'Perambur', 'Vyasarpadi', 'Mint', 'Broadway', 'Parrys Corner', 'High Court', NULL, NULL, NULL, NULL, NULL),
(28, '', '48E', 'CMBT', 'Vadapalani', 'Ashok Nagar', 'KK Nagar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL),
(29, '', '49C', 'Thiruvanmiyur', 'Indira Nagar', 'Adyar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL, NULL),
(30, '', '50M', 'T. Nagar', 'Kodambakkam', 'Vadapalani', 'Porur', 'Poonamallee', NULL, NULL, NULL, NULL, NULL, NULL),
(31, '', '51A', 'Besant Nagar', 'Adyar', 'Indira Nagar', 'Tidel Park', 'Perungudi', 'Thoraipakkam', 'Karapakkam', NULL, NULL, NULL, NULL),
(32, '', '32D', 'Broadway', 'Parrys Corner', 'High Court', 'Anna Salai', 'Nandanam', 'Saidapet', 'Guindy', NULL, NULL, NULL, NULL),
(33, '', '33E', 'Adambakkam', 'Velachery', 'Perungudi', 'Thoraipakkam', 'Karapakkam', 'Sholinganallur', 'Navalur', NULL, NULL, NULL, NULL),
(34, '', '34A', 'Tambaram', 'Camp Road', 'Selaiyur', 'Medavakkam', 'Perumbakkam', 'Sholinganallur', NULL, NULL, NULL, NULL, NULL),
(35, '', '35M', 'T. Nagar', 'Kodambakkam', 'Vadapalani', 'Ashok Nagar', 'KK Nagar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL),
(36, '', '36P', 'Guindy', 'Velachery', 'Medavakkam', 'Pallikaranai', 'Thoraipakkam', 'Sholinganallur', 'Siruseri', NULL, NULL, NULL, NULL),
(37, '', '37B', 'Broadway', 'Mannady', 'Mint', 'Vyasarpadi', 'Perambur', 'Madhavaram', 'Red Hills', NULL, NULL, NULL, NULL),
(38, '', '38D', 'Anna Nagar', 'Shenoy Nagar', 'Chetpet', 'Egmore', 'Central', NULL, NULL, NULL, NULL, NULL, NULL),
(39, '', '39C', 'CMBT', 'Vadapalani', 'Ashok Nagar', 'KK Nagar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL),
(40, '', '40A', 'Thiruvanmiyur', 'Adyar', 'Indira Nagar', 'Tidel Park', 'Perungudi', 'Thoraipakkam', NULL, NULL, NULL, NULL, NULL),
(41, '', '41G', 'Besant Nagar', 'Adyar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL, NULL, NULL),
(42, '', '22M', 'Tambaram', 'Camp Road', 'Medavakkam', 'Perumbakkam', 'Sholinganallur', 'Navalur', 'Kelambakkam', NULL, NULL, NULL, NULL),
(43, '', '23G', 'CMBT', 'Vadapalani', 'Ashok Pillar', 'KK Nagar', 'Saidapet', 'Guindy', 'Velachery', NULL, NULL, NULL, NULL),
(44, '', '24C', 'Thiruvanmiyur', 'Indira Nagar', 'Adyar', 'Saidapet', 'Guindy', 'Kathipara', 'Meenambakkam', 'Pallavaram', 'Chromepet', 'Tambaram', NULL),
(45, '', '25B', 'Broadway', 'Mannady', 'Mint', 'Vyasarpadi', 'Perambur', 'Madhavaram', 'Red Hills', NULL, NULL, NULL, NULL),
(46, '', '26V', 'Besant Nagar', 'Adyar', 'Indira Nagar', 'Tidel Park', 'Perungudi', 'Thoraipakkam', 'Karapakkam', 'Sholinganallur', NULL, NULL, NULL),
(47, '', '27J', 'Anna Nagar', 'Mogappair', 'Ambattur', 'Avadi', 'Thiruninravur', 'Thiruvallur', NULL, NULL, NULL, NULL, NULL),
(48, '', '28A', 'Guindy', 'Velachery', 'Medavakkam', 'Pallikaranai', 'Thoraipakkam', 'Sholinganallur', 'Navalur', NULL, NULL, NULL, NULL),
(49, '', '29C', 'T. Nagar', 'Kodambakkam', 'Vadapalani', 'Koyambedu', 'Mogappair', 'Ambattur', NULL, NULL, NULL, NULL, NULL),
(50, '', '30A', 'Central', 'Park Town', 'Egmore', 'Aminjikarai', 'Anna Nagar', 'Mogappair', 'Ambattur', 'Avadi', NULL, NULL, NULL),
(51, '', '31B', 'Thiruvanmiyur', 'Adyar', 'Saidapet', 'Guindy', 'Kathipara', 'Meenambakkam', 'Pallavaram', 'Chromepet', 'Tambaram', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile_number`, `password`) VALUES
(1, '9629500704', '$2y$10$gnRqYjL.wBXsjwLxR141EukKJSS3.IvgbMuHmEUA0HWPciV6mFxFe'),
(2, '7894561235', '$2y$10$IKdSpB6LtXTuO3byaiHd5u3R4aNJxmCsyRIrfi3yjtXUckfSLD3ce'),
(3, '1234567890', '$2y$10$aXxBV.F5318/GoYYNbnCmOONoYReUjuvfbMtlZxGwcj3VRZMv0LbS');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `email`, `name`, `address`, `city`, `state`, `pincode`, `mobile_number`) VALUES
(1, 'john.doe@example.com', 'John ', '123 Main St', 'Tenkasi', 'Tamil Nadu', '627811', '9629500704'),
(2, 'jane.smith@example.com', 'Jane Smith', '456 Oak St', 'Tenkasi', 'Tamil Nadu', '627811', '7894561235'),
(3, 'guru@gmail.com', 'gurubaran', '70 sannathi street courtallam', 'tirunelveli', 'tamilnadu', '627802', '7894561235'),
(4, 'gurubaran', 'guru@gmail.com', '70 sannathi street courtallam', 'tirunelveli', 'tamilnadu', '627802', '7894561235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadhaar`
--
ALTER TABLE `aadhaar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aadhaar_number` (`aadhaar_number`);

--
-- Indexes for table `bus_pass`
--
ALTER TABLE `bus_pass`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `bus_price`
--
ALTER TABLE `bus_price`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `bus_route`
--
ALTER TABLE `bus_route`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aadhaar`
--
ALTER TABLE `aadhaar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_pass`
--
ALTER TABLE `bus_pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus_price`
--
ALTER TABLE `bus_price`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bus_route`
--
ALTER TABLE `bus_route`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
