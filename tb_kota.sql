-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Oct 25, 2022 at 09:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `kode_kota` varchar(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `kode_propinsi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`kode_kota`, `nama_kota`, `kode_propinsi`) VALUES
('11.75', 'Kota Subulussalam', '11'),
('12.71', 'Medan', '12'),
('12.73', 'Sibolga', '12'),
('13.76', 'Payakumbuh', '13'),
('15.72', 'Kota Sungai Penuh', '15'),
('16.71', 'Palembang', '16'),
('17.71', 'Kota Bengkulu', '17'),
('18.71', 'Bandar Lampung', '18'),
('18.72', 'Metro', '18'),
('31.72', 'Kota Adminstrasi Jakarta Utara', '31'),
('31.75', 'Kota Administrasi Jakarta Timur', '31'),
('32.73', 'Bandung', '32'),
('33.72', 'Surakarta', '33'),
('33.74', 'Semarang', '33'),
('34.71', 'Kota Yogyakarta', '34'),
('35.77', 'Madiun', '35'),
('36.71', 'Tangerang', '36'),
('36.73', 'Serang', '36'),
('52.72', 'Bima', '52'),
('64.72', 'Samarinda', '64'),
('64.74', 'Kota Bontang', '64'),
('71.72', 'Bitung', '71'),
('73.71', 'Makassar', '73'),
('73.73', 'Kota Palopo', '73'),
('75.71', 'Kota Gorontalo', '75'),
('82.71', 'Ternate', '82'),
('82.72', 'Tidore', '82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`kode_kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
