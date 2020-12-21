-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 10:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(5) NOT NULL,
  `karyawan_name` varchar(255) NOT NULL,
  `karyawan_password` varchar(255) NOT NULL,
  `karyawan_position` enum('karyawan','manager') NOT NULL,
  `manager_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `karyawan_name`, `karyawan_password`, `karyawan_position`, `manager_id`) VALUES
(0, 'manager', '*********', 'manager', 0),
(1, 'Karyawan_1', '**********', 'karyawan', 0),
(2, 'Karyawan_2', '**********', 'karyawan', 1),
(3, 'Karyawan_3', '**********', 'karyawan', 1),
(4, 'Karyawan_4', '**********', 'karyawan', 2),
(5, 'Karyawan_5', '**********', 'karyawan', 2),
(6, 'Karyawan_6', '**********', 'karyawan', 1),
(7, 'Karyawan_7', '**********', 'karyawan', 2),
(8, 'Karyawan_8', '**********', 'karyawan', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD KEY `karyawan_ibfk_1` (`manager_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `karyawan` (`karyawan_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
