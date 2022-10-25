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
-- Table structure for table `tb_propinsi`
--

CREATE TABLE `tb_propinsi` (
  `kode_propinsi` varchar(11) NOT NULL,
  `nama_propinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_propinsi`
--

INSERT INTO `tb_propinsi` (`kode_propinsi`, `nama_propinsi`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('31', 'DKI Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Daerah Istimewa Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('52', 'Nusa Tenggara Barat'),
('64', 'Kalimantan Timur'),
('71', 'Sulawesi Utara'),
('73', 'Sulawesi Selatan'),
('75', 'Gorontalo'),
('82', 'Maluku Utara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_propinsi`
--
ALTER TABLE `tb_propinsi`
  ADD PRIMARY KEY (`kode_propinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
