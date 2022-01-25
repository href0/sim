-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 07:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `golongan_id` int(11) NOT NULL,
  `golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`golongan_id`, `golongan`) VALUES
(1, 'A'),
(2, 'AU'),
(3, 'BI'),
(4, 'BIU'),
(5, 'BIIU'),
(6, 'BII'),
(7, 'C'),
(8, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pemohon`
--

CREATE TABLE `jenis_pemohon` (
  `jenis_pemohon_id` int(11) NOT NULL,
  `jenis_pemohon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pemohon`
--

INSERT INTO `jenis_pemohon` (`jenis_pemohon_id`, `jenis_pemohon`) VALUES
(1, 'B'),
(2, 'P'),
(3, 'PG'),
(4, 'R'),
(5, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `sim`
--

CREATE TABLE `sim` (
  `sim_id` int(11) NOT NULL,
  `no_register` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `jenis_pemohon_id` int(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`sim_id`, `no_register`, `nama`, `umur`, `golongan_id`, `jenis_pemohon_id`, `tanggal_pembuatan`, `jenis_kelamin`, `pekerjaan`, `alamat`) VALUES
(1, '21313', 'Rinaldi', '22', 2, 3, '2022-01-27', 'Laki-Laki', 'swasta', 'swasta'),
(3, '23123312', 'Rinaldias', '12', 3, 2, '2022-01-27', 'Perempuan', 'asdas', '12312asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$bS.QEPQLsUWuE22NzSJpauX.BO.g0tdv2LGFXavFNCB8HsM1wAAE6', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`golongan_id`);

--
-- Indexes for table `jenis_pemohon`
--
ALTER TABLE `jenis_pemohon`
  ADD PRIMARY KEY (`jenis_pemohon_id`);

--
-- Indexes for table `sim`
--
ALTER TABLE `sim`
  ADD PRIMARY KEY (`sim_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `golongan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_pemohon`
--
ALTER TABLE `jenis_pemohon`
  MODIFY `jenis_pemohon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sim`
--
ALTER TABLE `sim`
  MODIFY `sim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
