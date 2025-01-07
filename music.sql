-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 01:48 PM
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
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `massage` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `massage`) VALUES
(1, 'saxi', 's2306@gmail.com', 'music', 'Nice'),
(2, 'Dhruvi', 's2306@gmail.com', 'Podcaste', 'good'),
(3, 'Dhara', 'd2306@gmail.com', 'Podcaste', 'good'),
(4, 'Riya', 'r123@gmail.om', 'music', 'nice'),
(5, 'Priya', 'p@gmail.com', 'music', '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `url`, `file_path`) VALUES
(5, 'Meri Jaan', '', 'uploads/Meri Jaan.mp3'),
(6, 'Cruel', '', 'uploads/cruel.mp3'),
(7, 'Buhe wich', '', 'uploads/Buhe_Vich.mp3'),
(8, 'Fikar', '', 'uploads/Fikar.mp3'),
(10, 'Love me like you do', '', 'uploads/Intentions.mp3'),
(11, 'xyz', '', 'uploads/Abhi_to.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'saxi', 's@gmail.com', '$2y$10$67s9DOHBsqhDylkigrMmhOeFE2dWT73ZKp6dVBctsdnA0K.MXNZCK'),
(2, 'Dhruvi', 'd@gmail.com', '$2y$10$iCDjE/Z/ZsqZRWzymPihveyg4ji5mS6qfXDVbZjZEtXMvh5cLCBCK'),
(3, 'Sneha', 'sneha@gmail.com', '$2y$10$jx26hMenz6sAgcymrddYQ.O7ISRLSTT4JeC28O2d5slagkxPIAL8q'),
(4, 'Bansi', 'bansi@gmail.com', '$2y$10$98WCj8sbqLkHlfxBm36PZ.nR40BT1kfTQrYNzZaxbRl4Xdk8hBlL.'),
(5, 'Drashti', 'drashti@gmail.com', '$2y$10$gkH7pWvg3c6H5LWzm.vjPuplToT9UNaZc26Dy1vei80jfUk30Maci'),
(6, 'abc', 'abc@gmail.com', '$2y$10$g/anAJsRaBL37BoCP8TaOOgunZHpx08MDL7bBZCcNFx.drkXz/20a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
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
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
