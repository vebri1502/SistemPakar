-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 08:59 AM
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
(1, 'Daratan'),
(2, 'Taerah Tinggi'),
(3, 'Jarak Sungai'),
(4, 'Curah Hujan'),
(5, 'Risiko');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `hasil1` int(15) DEFAULT NULL,
  `hasil2` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `hasil1`, `hasil2`) VALUES
(1, 0, 0),
(2, 75, 25);

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `id_masukan` int(11) NOT NULL,
  `tinggi_permukaan` int(11) DEFAULT NULL,
  `jumlah_daerahT` int(11) DEFAULT NULL,
  `jarak_sungai` int(11) DEFAULT NULL,
  `curah_hujan` int(11) NOT NULL,
  `hasil1` int(11) NOT NULL,
  `hasil2` int(11) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`id_masukan`, `tinggi_permukaan`, `jumlah_daerahT`, `jarak_sungai`, `curah_hujan`, `hasil1`, `hasil2`, `id_hasil`) VALUES
(1, 0, 0, 0, 0, 0, 0, NULL),
(2, 50, 14, 10, 400, 75, 25, NULL),
(3, 55, 15, 12, 450, 65, 35, NULL);

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
(16, 'jauh', 25, 50, 3),
(17, 'Rendah', 10, 60, 5),
(18, 'Tinggi', 50, 100, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktor`
--
ALTER TABLE `faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id_masukan`),
  ADD KEY `FK_hasil` (`id_hasil`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `FK_param` (`id_faktor`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masukan`
--
ALTER TABLE `masukan`
  MODIFY `id_masukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `masukan`
--
ALTER TABLE `masukan`
  ADD CONSTRAINT `FK_hasil` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`);

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`id_faktor`) REFERENCES `faktor` (`id_faktor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
