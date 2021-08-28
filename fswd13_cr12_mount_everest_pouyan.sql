-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2021 at 05:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr12_mount_everest_pouyan`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr12_mount_everest_pouyan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_cr12_mount_everest_pouyan`;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lat` decimal(20,12) NOT NULL,
  `lng` decimal(20,12) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `location`, `description`, `lat`, `lng`, `price`, `pic`) VALUES
(4, 'soneva Jani', 'water villas and island hideaways in large private lagoon, surrounded by nature. Tranquil hideaway in the Maldives’ pristine Noonu Atoll with uninterrupted ocean views.', '5.720759405002', '73.415041872701', '2000.00', 'h1.jpg'),
(11, 'Soori Bali', 'Set on the edge of the ocean between the Mount Batukaru and terraced rice fields, Soori Bali is a hidden refuge, rejuvenating and peaceful\r\n', '-8.576723407898', '115.054758980922', '700.00', 'h2.jpg'),
(12, 'Bluewater Maribago ', 'Bluewater Maribago Beach Resort is a rustic resort for travelers interested in convenience, relaxation, and plenty of leisure activities.\r\n\r\n', '10.287549305334', '124.000320925117', '60.00', 'h4.jpg'),
(13, 'Costa Grand Resort ', 'Costa Grand Resort & Spa is the only resort located right on the black sand beach in the famous and cosmopolitan village of Kamari\r\n\r\n', '36.382060513575', '25.486500258429', '130.00', 'h3.jpg'),
(14, 'the Lovina Bali', 's a coastal area on the northwestern side of the island of Bali, Indonesia. The coastal strip stretches from 5 km west of the city of Singaraja to 15 km west.\r\n', '-8.154952665186', '115.030554126942', '177.00', 'h5.jpg'),
(15, 'Hotel Istra Insel Sveti Andrea', 'is an island in the Croatian part of the Adriatic Sea. It is part of the Elaphiti Islands archipelago\r\n\r\n\r\n', '45.059380729103', '13.624122453112', '157.00', 'h6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
