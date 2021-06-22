-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 11:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websiskamling`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id_class` varchar(8) NOT NULL,
  `nama_class` varchar(50) NOT NULL,
  `sks_class` int(2) NOT NULL,
  `waktu_class` varchar(6) NOT NULL,
  `id_lecturer` varchar(10) DEFAULT NULL,
  `presensi` int(2) NOT NULL,
  `nilai_class` int(3) DEFAULT NULL,
  `kredit_class` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id_class`, `nama_class`, `sks_class`, `waktu_class`, `id_lecturer`, `presensi`, `nilai_class`, `kredit_class`) VALUES
('SI190001', 'Analisis Data Terstruktur', 3, 'SELASA', '1111111111', 3, NULL, '0'),
('SI190002', 'Pemrograman Web', 3, 'RABU', '1111111112', 3, NULL, '0'),
('SI190003', 'Administrasi Basis Data', 3, 'KAMIS', '1111111113', 3, NULL, '0'),
('SI190004', 'Bahasa Indonesia', 3, 'RABU', '1111111114', 3, NULL, '0'),
('SI190005', 'Interaksi Manusia Komputer', 3, 'JUMAT', '1111111115', 2, NULL, '0'),
('SI190006', 'Komputer dan Masyarakat', 2, 'SENIN', '1111111116', 5, NULL, '0'),
('SI190007', 'Kewirausahaan', 3, 'SENIN', '1111111117', 6, NULL, '0'),
('SI190008', 'Kepemimpinan', 3, 'KAMIS', '1111111118', 3, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `npm` varchar(11) NOT NULL,
  `id_class` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`npm`, `id_class`) VALUES
('19082010100', 'SI190001'),
('19082010100', 'SI190002'),
('19082010121', 'SI190001'),
('19082010121', 'SI190002'),
('19082010100', 'SI190003'),
('19082010121', 'SI190004'),
('19082010100', 'SI190005'),
('19082010100', 'SI190007'),
('19082010121', 'SI190006'),
('19082010121', 'SI190008');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id_lecturer` varchar(10) NOT NULL,
  `nama_lecturer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id_lecturer`, `nama_lecturer`) VALUES
('1111111111', 'Bu Danu'),
('1111111112', 'Pak Anwar'),
('1111111113', 'Pak Budi'),
('1111111114', 'Pak Supri'),
('1111111115', 'Pak Hadi'),
('1111111116', 'Bu Septi'),
('1111111117', 'Bu Ira'),
('1111111118', 'Pak Chandra'),
('1111111119', 'Bu Restu'),
('1111111120', 'Pak Indra');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id_major` varchar(5) NOT NULL,
  `major` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id_major`, `major`) VALUES
('081', 'Sistem Informasi'),
('082', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_report` int(11) NOT NULL,
  `jenis_report` varchar(30) NOT NULL,
  `isi_report` text NOT NULL,
  `cp_report` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id_report`, `jenis_report`, `isi_report`, `cp_report`) VALUES
(2, 'Kekerasan', 'dibully senior', '081803319424'),
(3, 'Kekerasan', 'dibully senior', '081803319424'),
(4, '2', 'catcalling di danau upn', '081803319424'),
(5, '2', 'catcalling di danau upn', '081803319424'),
(6, '2', 'catcalling di danau upn', '081803319424'),
(7, '2', 'catcalling di danau upn', '081803319424'),
(8, '2', 'catcalling di danau upn', '081803319424'),
(9, '2', 'catcalling di danau upn', '081803319424'),
(10, '1', 'Keroyokan dikarenakan beda ras di FH', '081803319424'),
(11, '1', 'madura dikeroyok', '081803319424'),
(12, '1', 'madura dikeroyok', '081803319424'),
(13, '2', 'catcalling', '081803319424'),
(14, '1', 'tawuran', '081803319424'),
(15, '1', 'tawuran', '081803319424'),
(16, '1', 'penikaman', '081803319424'),
(17, '1', 'perkelahian di warung upn', '081803319424'),
(18, '1', 'gusur rusun', '081803319424');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `npm` varchar(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_major` varchar(3) NOT NULL,
  `id_lecturer` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `sks` int(3) NOT NULL,
  `ipk` float NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `img` varchar(40) NOT NULL,
  `id_report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`npm`, `nama`, `password`, `id_major`, `id_lecturer`, `alamat`, `semester`, `sks`, `ipk`, `tahun_masuk`, `img`, `id_report`) VALUES
('19082010100', 'kandias penginjak bumi', 'kandias123', '082', '1111111112', 'keputih', '4', 94, 3.98, 2019, 'andik.jpg', 0),
('19082010121', 'Catur Arpal Perkasa', 'catur123', '081', '1111111111', 'gayungan', '4', 94, 3.99, 2019, 'catur.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `id_lecturer` (`id_lecturer`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD KEY `npm` (`npm`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id_lecturer`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id_major`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_major` (`id_major`),
  ADD KEY `id_lecturer` (`id_lecturer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_lecturer`) REFERENCES `lecturers` (`id_lecturer`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `students` (`npm`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_class`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_major`) REFERENCES `majors` (`id_major`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_lecturer`) REFERENCES `lecturers` (`id_lecturer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
