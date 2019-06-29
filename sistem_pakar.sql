-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 10:53 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `faktor`
--

CREATE TABLE `faktor` (
  `id_faktor` int(11) NOT NULL,
  `nama_faktor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktor`
--

INSERT INTO `faktor` (`id_faktor`, `nama_faktor`) VALUES
(1, 'daratan'),
(2, 'daerah_tinggi'),
(3, 'jarak_sungai'),
(4, 'curah_hujan');

-- --------------------------------------------------------

--
-- Table structure for table `myu`
--

CREATE TABLE `myu` (
  `id_myu` int(11) NOT NULL,
  `myu_rendah` decimal(6,4) DEFAULT NULL,
  `myu_sedang1` decimal(6,4) DEFAULT NULL,
  `myu_sedang2` decimal(6,4) DEFAULT NULL,
  `myu_tinggi` decimal(6,4) DEFAULT NULL,
  `id_faktor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `id_pakar` int(8) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`id_pakar`, `nama`, `username`, `pass`) VALUES
(1, 'admin01', 'admin01', 'admin01');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `nama_parameter` varchar(10) DEFAULT NULL,
  `batas_bawah` int(11) DEFAULT NULL,
  `batas_atas` int(11) DEFAULT NULL,
  `id_faktor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `nama_parameter`, `batas_bawah`, `batas_atas`, `id_faktor`) VALUES
(1, 'rendah', 10, 110, 1),
(2, 'sedang1', 50, 150, 1),
(3, 'sedang2', 150, 250, 1),
(4, 'tinggi', 200, 400, 1),
(5, 'sedikit', 1, 5, 2),
(6, 'sedang1', 4, 8, 2),
(7, 'sedang2', 8, 12, 2),
(8, 'banyak', 10, 15, 2),
(9, 'rendah', 60, 160, 4),
(10, 'normal1', 100, 200, 4),
(11, 'normal2', 200, 300, 4),
(12, 'tinggi', 250, 500, 4),
(13, 'dekat', 5, 15, 3),
(14, 'sedang1', 10, 20, 3),
(15, 'sedang2', 20, 30, 3),
(16, 'jauh', 25, 50, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktor`
--
ALTER TABLE `faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `myu`
--
ALTER TABLE `myu`
  ADD PRIMARY KEY (`id_myu`),
  ADD KEY `FK_myu` (`id_faktor`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `FK_parameter` (`id_faktor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myu`
--
ALTER TABLE `myu`
  MODIFY `id_myu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myu`
--
ALTER TABLE `myu`
  ADD CONSTRAINT `FK_myu` FOREIGN KEY (`id_faktor`) REFERENCES `faktor` (`id_faktor`);

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `FK_parameter` FOREIGN KEY (`id_faktor`) REFERENCES `faktor` (`id_faktor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
