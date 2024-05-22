-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `14_gerakan_dasar`
--

CREATE TABLE `14_gerakan_dasar` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `14_gerakan_dasar`
--

INSERT INTO `14_gerakan_dasar` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `score` double NOT NULL,
  `nilai` double NOT NULL,
  `no_urut` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `club` varchar(40) NOT NULL,
  `jurus` varchar(100) DEFAULT NULL,
  `14_gerakan_dasar` varchar(100) DEFAULT NULL,
  `teknik_tangan` varchar(100) DEFAULT NULL,
  `teknik_kaki` varchar(100) DEFAULT NULL,
  `sparing_1_langkah` varchar(100) DEFAULT NULL,
  `sparing` varchar(100) DEFAULT NULL,
  `pemecahan_papan` varchar(100) DEFAULT NULL,
  `tes_fisik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `score`, `nilai`, `no_urut`, `nama`, `club`, `jurus`, `14_gerakan_dasar`, `teknik_tangan`, `teknik_kaki`, `sparing_1_langkah`, `sparing`, `pemecahan_papan`, `tes_fisik`) VALUES
(1, 3.2151662273438, 0.035616497222054, 625, 'Edward Stanford Wibisono', 'Satria Club Taekwondo Samarinda', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(2, 3.134302768693, 0.034720719851072, 626, 'Louisa Grace Felicia', 'Satria Taekwondo Club Samarinda', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(3, 2.3959896657524, 0.02654194316567, 627, 'Muhammad Yudha Prawira', 'Satria Taekwondo Club Samarinda', 'Cukup Baik', 'Cukup Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(4, 2.5678350181306, 0.02844558642478, 628, 'Aulia Namira', 'Satria Taekwondo Club Samarinda', 'Cukup Baik', 'Cukup Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(5, 3.134302768693, 0.034720719851072, 629, 'Anisa Nainawa Al Manaf', 'Petra Taekwondo Family', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(6, 3.2151662273438, 0.035616497222054, 630, 'Arasy Adi Virdaus', 'Victorem Taekwondo Club', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(7, 3.0969569303488, 0.034307015596427, 631, 'Febbyani Femi Rahmayanti', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(8, 2.7324824130513, 0.030269493205692, 633, 'Daffa Nusantara S,A', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Cukup Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(9, 2.9810539019098, 0.033023082014606, 634, 'Zein Husna Fasha', 'Satria Taekwondo Club Samarinda', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(10, 3.3340285077208, 0.03693321237129, 635, 'Muhammad Iqbal Taufani Aji', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(11, 3.0773985137542, 0.034090354235536, 636, 'Tiara Amalia Putri', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(12, 3.2151662273438, 0.035616497222054, 637, 'Nur Aida Insani', 'GARUDA MUDA PRIMA - SAMARINDA', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(13, 3.1145084994596, 0.034501445796384, 638, 'Bayu Yudha Syahputra', 'Smart', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(14, 3.235600227105, 0.035842857989825, 639, 'Muhammad Fiqri Al Anwari', 'GARUDA MUDA PRIMA - SAMARINDA', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(15, 3, 0.03323296032331, 640, 'Muhammad Ramadhan Annafi', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(16, 3.0969569303488, 0.034307015596427, 641, 'Khalfani Jafin Gyarsyah', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(17, 3, 0.03323296032331, 642, 'Syarafa Nur Rahman', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(18, 3, 0.03323296032331, 643, 'Naufa Adilah', 'Petra Taekwondo Family', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(19, 2.3392545172572, 0.025913450852711, 644, 'Justin Fedora Dinha', 'Petra Taekwondo Family', 'Cukup Baik', 'Cukup Baik', 'Sangat Baik', 'Baik', 'Cukup Baik', 'Cukup Baik', 'Cukup Baik', 'Baik'),
(20, 3.2151662273438, 0.035616497222054, 645, 'Mathea Beatrice Novianti', 'Smart', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(21, 2.9810539019098, 0.033023082014606, 646, 'Husnul Khatimah Ibnu Putri', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(22, 3.2151662273438, 0.035616497222054, 647, 'Muhammad Farhan Alithoriq', 'GARUDA MUDA PRIMA - SAMARINDA', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(23, 3.0773985137542, 0.034090354235536, 648, 'Wana Andara', 'Petra Taekwondo Family', 'Baik', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(24, 1, 0.011077653441103, 649, 'Fajariah Wulan Ariyani', 'Victorem Taekwondo Club', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik'),
(25, 3.2151662273438, 0.035616497222054, 650, 'Mutiar Indah Cahyani', 'Satria Taekwondo Club Samarinda', 'Baik', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(26, 3.1145084994596, 0.034501445796384, 651, 'Reisya Nazwa Anindya', 'Satria Taekwondo Club Samarinda', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(27, 2.5974426538885, 0.028773569552917, 652, 'Dewi Wulandari', 'GARUDA MUDA PRIMA - SAMARINDA', 'Cukup Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(28, 1, 0.011077653441103, 653, 'Figo Andriano Nurzy', 'Victorem Taekwondo Club', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik', 'Kurang Baik'),
(29, 3.1145084994596, 0.034501445796384, 654, 'Abdul Hartono', 'Palaran Taekwondo Team', 'Baik', 'Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Cukup Baik'),
(30, 3.3340285077208, 0.03693321237129, 655, 'Aisya Fitri Ramadhani', 'Satria Taekwondo Club Samarinda', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik'),
(31, 3.5212170433311, 0.039006822096929, 656, 'Sultan Bayu Putra Aji', 'BINTANG MUDA TAEKWONDO CLUB', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Baik', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `jurus`
--

CREATE TABLE `jurus` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurus`
--

INSERT INTO `jurus` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `tingkat_kepentingan_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `tingkat_kepentingan_kriteria`, `nama_kriteria`, `jenis`, `bobot`) VALUES
(1, 1, 'jurus', 'Benefit', 0.33973214285714),
(2, 2, '14 gerakan dasar', 'Benefit', 0.21473214285714),
(3, 3, 'teknik tangan', 'Benefit', 0.15223214285714),
(4, 4, 'teknik kaki', 'Benefit', 0.11056547619048),
(5, 5, 'sparing 1 langkah', 'Benefit', 0.079315476190476),
(6, 6, 'sparing', 'Benefit', 0.054315476190476),
(7, 7, 'pemecahan papan', 'Benefit', 0.033482142857143),
(8, 8, 'tes fisik', 'Benefit', 0.015625);

-- --------------------------------------------------------

--
-- Table structure for table `pemecahan_papan`
--

CREATE TABLE `pemecahan_papan` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemecahan_papan`
--

INSERT INTO `pemecahan_papan` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sparing`
--

CREATE TABLE `sparing` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparing`
--

INSERT INTO `sparing` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Kurang Baik', 1),
(5, 'Cukup Baik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sparing_1_langkah`
--

CREATE TABLE `sparing_1_langkah` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparing_1_langkah`
--

INSERT INTO `sparing_1_langkah` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teknik_kaki`
--

CREATE TABLE `teknik_kaki` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknik_kaki`
--

INSERT INTO `teknik_kaki` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teknik_tangan`
--

CREATE TABLE `teknik_tangan` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknik_tangan`
--

INSERT INTO `teknik_tangan` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(4, 'Cukup Baik', 2),
(5, 'Kurang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tes_fisik`
--

CREATE TABLE `tes_fisik` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tes_fisik`
--

INSERT INTO `tes_fisik` (`id`, `subkriteria`, `nilai`) VALUES
(1, '', 0),
(2, 'Sangat Baik', 4),
(3, 'Baik', 3),
(5, 'Kurang Baik', 1),
(6, 'Cukup Baik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `14_gerakan_dasar`
--
ALTER TABLE `14_gerakan_dasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurus`
--
ALTER TABLE `jurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemecahan_papan`
--
ALTER TABLE `pemecahan_papan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparing`
--
ALTER TABLE `sparing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparing_1_langkah`
--
ALTER TABLE `sparing_1_langkah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknik_kaki`
--
ALTER TABLE `teknik_kaki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknik_tangan`
--
ALTER TABLE `teknik_tangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tes_fisik`
--
ALTER TABLE `tes_fisik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `14_gerakan_dasar`
--
ALTER TABLE `14_gerakan_dasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jurus`
--
ALTER TABLE `jurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pemecahan_papan`
--
ALTER TABLE `pemecahan_papan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sparing`
--
ALTER TABLE `sparing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sparing_1_langkah`
--
ALTER TABLE `sparing_1_langkah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teknik_kaki`
--
ALTER TABLE `teknik_kaki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teknik_tangan`
--
ALTER TABLE `teknik_tangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tes_fisik`
--
ALTER TABLE `tes_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
