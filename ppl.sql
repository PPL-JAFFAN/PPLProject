-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 04:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kode_wali` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kode_kota` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`kode_wali`, `nama`, `nip`, `alamat`, `email`, `no_hp`, `kode_kota`) VALUES
('1', 'Drs. Eko Adi Sarwoko, M.Kom.', '196511071992031003', 'Jalan Mawar Berduri No. 309', 'ekoadis@gmail.com', '081345234567', '1'),
('2', 'Nurdin Bahtiar, S.Si, M.T', '197907202003121002', 'Jalan Saksi No.20', 'nurdinbah@gmail.com', '0897635947', '1'),
('3', 'Priyo Sidik Sasongko, S.Si., M.Kom.', '197007051997021001', 'Jalan Sukasini No.24', 'priyosidik@gmail.com', '0894557813', '1'),
('4', 'Dr. Aris Sugiharto, S.Si., M.Kom.', '197108111997021004', 'Jalan Banteng Api No.72', 'arissugi@gmail.com', '0844699459', '1'),
('5', 'Beta Noranita, S.Si, M.Kom.', '197308291998022001', 'Jalan Moh. Hatta No.44', 'betanora@gmail.com', '0858648412', '1'),
('6', 'Indra Waspada, ST, M.T.I', '197902122008121002', 'Jalan Mozzarela No.25', 'indrawas@gmail.com', '0806766111', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_irs`
--

CREATE TABLE `tb_irs` (
  `semester` int(11) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `sks` int(11) NOT NULL,
  `file_irs` varbinary(8000) DEFAULT NULL,
  `status_irs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `semester` varchar(2) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `sks` int(11) NOT NULL,
  `file_khs` varbinary(8000) DEFAULT NULL,
  `sks_kumulatif` int(11) NOT NULL,
  `ip_semester` float DEFAULT NULL,
  `ip_kumulatif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`semester`, `nim`, `sks`, `file_khs`, `sks_kumulatif`, `ip_semester`, `ip_kumulatif`) VALUES
('5', '2406012012015', 22, NULL, 92, 3.5, 3.67),
('5', '24060120120001', 24, NULL, 92, 3.8, 3.92);

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
('1', 'Semarang', '1'),
('201', 'Yogyakarta', '2'),
('325', 'Lampung', '3'),
('431', 'Bengkulu', '4'),
('501', 'Bandung', '5'),
('611', 'Samarinda', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nim` varchar(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_kota` varchar(11) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `jalur_masuk` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto_mhs` varchar(255) NOT NULL,
  `kode_wali` varchar(5) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`nim`, `nama`, `alamat`, `kode_kota`, `angkatan`, `jalur_masuk`, `email`, `no_hp`, `status`, `foto_mhs`, `kode_wali`, `semester`) VALUES
('24060120120001', 'Bunga Mawar', 'Jalan Mawar Merah No. 203', '1', '2020', 'SNMPTN', 'bungamawar@gmail.com', '081366708978', 'Aktif', 'fayza.jpg', '1', '5'),
('2406012012015', 'Andy Bach', 'Jalan Mulawarman No.13', '5', '2021', 'SBMPTN', 'andybach@gmail.com', '0840431010', 'Nonaktif', '', '6', '3'),
('2406012013010', 'Rudy Mercury', 'Jalan Soekarno No.178', '611', '2022', 'SNMPTN', 'merkuriusun@gmail.com', '0877391834', 'Aktif', '', '3', '1'),
('24060120140120', 'Tono Hartono', 'Jalan Bupati Tikus No.225', '431', '2020', 'SBMPTN', 'tonohartono@gmail.com', '0837116965', 'Nonaktif', '', '2', '5'),
('24060120160114', 'Hani Indie', 'Jalan Sekar Wangi No.4', '325', '2021', 'UM', 'harumwangi@gmail.com', '0815783525', 'Nonaktif', '', '4', '3'),
('24060120160981', 'Tina Tanti', 'Jalan Cendrawasih No.10', '201', '2022', 'SBUB', 'tinacendra@gmail.com', '0817111933', 'Aktif', '', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkl`
--

CREATE TABLE `tb_pkl` (
  `nim` varchar(14) NOT NULL,
  `status_pkl` varchar(255) NOT NULL,
  `nilai_pkl` varchar(2) DEFAULT NULL,
  `scan_pkl` varbinary(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkl`
--

INSERT INTO `tb_pkl` (`nim`, `status_pkl`, `nilai_pkl`, `scan_pkl`) VALUES
('24060120120001', 'LULUS', 'A', NULL);

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
('1', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `nim` varchar(14) NOT NULL,
  `status_skripsi` varchar(255) NOT NULL,
  `nilai_skripsi` varchar(2) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `scan_skripsi` varbinary(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`nim`, `status_skripsi`, `nilai_skripsi`, `tanggal_sidang`, `scan_skripsi`) VALUES
('24060120120001', 'LULUS', '', '2022-10-31', ''),
('2406012012015', 'ON GOING', '', '2022-10-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nim/nip` varchar(18) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` enum('dosen','mhs','operator','departemen') NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nim/nip`, `username`, `status`, `password`, `email`) VALUES
('123123123', 'dosenwali', 'dosen', '1234', 'dosenwali@mail.com'),
('123123321', 'operator', 'operator', '1234', 'operator@mail.com'),
('1234', 'departemen', 'departemen', '1234', 'departemen@mail.com'),
('123456789', 'mahasiswa', 'mhs', '1234', 'mahasiswa@mail.com'),
('197308291998022001', 'dosen2', 'dosen', '1234', 'betanora@gmail.com'),
('24060120120001', 'Bunga Mawar', 'mhs', '1234', 'bungamawar@gmail.com'),
('2406012012015', 'Andy Bach', 'mhs', '1234', 'andybach@gmail.com'),
('2406012013010', 'Rudy Mercury', 'mhs', '1234', 'merkuriusun@gmail.com'),
('24060120140120', 'Tono Hartono', 'mhs', '1234', 'tonohartono@gmail.com'),
('24060120160114', 'Hani Indie', 'mhs', '1234', 'harumwangi@gmail.com'),
('24060120160981', 'Tina Tanti', 'mhs', '1234', 'tinacendra@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kode_wali`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`kode_kota`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_propinsi`
--
ALTER TABLE `tb_propinsi`
  ADD PRIMARY KEY (`kode_propinsi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nim/nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
