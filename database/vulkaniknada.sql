-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2025 at 04:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vulkaniknada`
--

-- --------------------------------------------------------

--
-- Table structure for table `orang_hilang`
--

CREATE TABLE `orang_hilang` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `lokasi_hilang` varchar(150) DEFAULT NULL,
  `tanggal_hilang` date DEFAULT NULL,
  `ciri_ciri` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Belum Ditemukan','Sudah Ditemukan') DEFAULT 'Belum Ditemukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang_hilang`
--

INSERT INTO `orang_hilang` (`id`, `nama_lengkap`, `usia`, `jenis_kelamin`, `lokasi_hilang`, `tanggal_hilang`, `ciri_ciri`, `foto`, `status`) VALUES
(1, 'Rizky Saputra', 23, 'Laki-laki', 'Gunung Merapi, Sleman', '2024-05-12', 'Berjaket hitam, celana jeans biru, tinggi 170 cm', 'rizky.jpg', 'Belum Ditemukan'),
(2, 'Siti Aminah', 35, 'Perempuan', 'Gunung Semeru, Lumajang', '2024-06-10', 'Berhijab coklat, membawa tas merah', 'siti.jpg', 'Belum Ditemukan'),
(3, 'Dewi Kartika', 28, 'Perempuan', 'Gunung Merbabu, Boyolali', '2024-04-20', 'Baju biru muda, rambut panjang', 'dewi.jpg', 'Sudah Ditemukan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orang_hilang`
--
ALTER TABLE `orang_hilang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orang_hilang`
--
ALTER TABLE `orang_hilang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
