-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 08:54 AM
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
('1', 'Drs. Eko Adi Sarwoko, M.Kom.', '196511071992031003', 'Jalan Mawar Berduri No. 309', 'ekoadis@gmail.com', '081345234567', '33.74'),
('2', 'Nurdin Bahtiar, S.Si, M.T', '197907202003121002', 'Jalan Saksi No.20', 'nurdinbah@gmail.com', '0897635947', '33.74'),
('3', 'Priyo Sidik Sasongko, S.Si., M.Kom.', '197007051997021001', 'Jalan Sukasini No.24', 'priyosidik@gmail.com', '0894557813', '33.74'),
('4', 'Dr. Aris Sugiharto, S.Si., M.Kom.', '197108111997021004', 'Jalan Banteng Api No.72', 'arissugi@gmail.com', '0844699459', '33.74'),
('5', 'Beta Noranita, S.Si, M.Kom.', '197308291998022001', 'Jalan Moh. Hatta No.44', 'betanora@gmail.com', '858648412', '33.74'),
('6', 'Indra Waspada, ST, M.T.I', '197902122008121002', 'Jalan Mozzarela No.25', 'indrawas@gmail.com', '0806766111', '33.74');

-- --------------------------------------------------------

--
-- Table structure for table `tb_irs`
--

CREATE TABLE `tb_irs` (
  `semester_irs` int(11) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `sks` int(11) NOT NULL,
  `file_irs` varbinary(8000) DEFAULT NULL,
  `status_irs` varchar(255) NOT NULL,
  `verif_irs` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_irs`
--

INSERT INTO `tb_irs` (`semester_irs`, `nim`, `sks`, `file_irs`, `status_irs`, `verif_irs`) VALUES
(7, '2406012013010', 24, NULL, '', 'sudah'),
(5, '24060120140120', 22, NULL, '', 'sudah'),
(6, '24060120160114', 24, NULL, '', 'belum'),
(6, '24060120160981', 22, NULL, '', 'sudah'),
(6, '24060120120001', 20, NULL, '', 'belum'),
(6, '2406012012015', 24, NULL, '', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `semester_khs` varchar(2) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `sks` int(11) NOT NULL,
  `file_khs` varchar(255) DEFAULT NULL,
  `sks_kumulatif` int(11) NOT NULL,
  `ip_semester` float DEFAULT NULL,
  `ip_kumulatif` float NOT NULL,
  `verif_khs` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`semester_khs`, `nim`, `sks`, `file_khs`, `sks_kumulatif`, `ip_semester`, `ip_kumulatif`, `verif_khs`) VALUES
('5', '2406012012015', 22, NULL, 92, 3.5, 3.67, 'belum'),
('5', '24060120120001', 24, NULL, 92, 3.8, 3.92, 'belum'),
('6', '2406012013010', 24, NULL, 100, 3.6, 3.32, 'sudah'),
('4', '24060120140120', 22, NULL, 72, 3.5, 3.75, 'sudah'),
('5', '24060120160114', 20, NULL, 88, 4, 3.9, 'belum'),
('5', '24060120160981', 22, NULL, 90, 3.2, 3.47, 'belum'),
('4', '24060120160981', 20, '4_24060120160981.pdf', 80, 3.5, 3.4, 'belum');

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
('12.73', 'Sibolga', '12'),
('13.76', 'Payakumbuh', '13'),
('15.72', 'Kota Sungai Penuh', '15'),
('17.71', 'Kota Bengkulu', '17'),
('18.71', 'Bandar Lampung', '18'),
('31.72', 'Kota Adminstrasi Jakarta Utara', '31'),
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
('73.73', 'Kota Palopo', '73'),
('82.72', 'Tidore', '82');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_matkul` varchar(11) CHARACTER SET utf8 NOT NULL,
  `nama_matkul` varchar(50) CHARACTER SET utf8 NOT NULL,
  `jenis_matkul` varchar(20) CHARACTER SET utf8 NOT NULL,
  `jumlah_sks` varchar(2) CHARACTER SET utf8 NOT NULL,
  `semester` varchar(2) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_matkul`, `nama_matkul`, `jenis_matkul`, `jumlah_sks`, `semester`) VALUES
('PAIK21364', 'Teori Bahasa dan Otomata', 'Wajib', '3', '7'),
('PAIK6101', 'Matematika I', 'Wajib', '2', '1'),
('PAIK6102', 'Dasar Pemrograman', 'Wajib', '3', '1'),
('PAIK6103', 'Dasar Sistem', 'Wajib', '3', '1'),
('PAIK6104', 'Logika Informatika', 'Wajib', '3', '1'),
('PAIK6105', 'Struktur Diskrit', 'Wajib', '4', '1'),
('PAIK6201', 'Matematika II', 'Wajib', '2', '2'),
('PAIK6202', 'Algoritma dan Pemrograman', 'Wajib', '4', '2'),
('PAIK6203', 'Organisasi dan Aristektur Komputer', 'Wajib', '3', '2'),
('PAIK6204', 'Aljabar Linier', 'Wajib', '3', '2'),
('PAIK6301', 'Struktur Data', 'Wajib', '4', '3'),
('PAIK6302', 'Sistem Operasi', 'Wajib', '3', '3'),
('PAIK6303', 'Basis Data', 'Wajib', '4', '3'),
('PAIK6304', 'Metode Numerik', 'Wajib', '3', '3'),
('PAIK6305', 'Interaksi Manusia dan Komputer', 'Wajib', '3', '3'),
('PAIK6306', 'Statistika', 'Wajib', '3', '3'),
('PAIK6401', 'Pemrograman Berorientasi Objek', 'Wajib', '3', '4'),
('PAIK6402', 'Jaringan Komputer', 'Wajib', '3', '4'),
('PAIK6403', 'Manajemen Basis Data', 'Wajib', '3', '4'),
('PAIK6404', 'Grafika dan Komputasi Visual', 'Wajib', '3', '4'),
('PAIK6406', 'Sistem Cerdas', 'Wajib', '3', '4'),
('PAIK6501', 'Pengembangan Berbasis Platform', 'Wajib', '4', '5'),
('PAIK6502', 'Komputasi Tersebar dan Paralel', 'Wajib', '3', '5'),
('PAIK6503', 'Sistem Informasi', 'Wajib', '3', '5'),
('PAIK6504', 'Proyek Perangkat Lunak', 'Wajib', '3', '5'),
('PAIK6505', 'Pembelajaran Mesin', 'Wajib', '3', '5'),
('PAIK6506', 'Keamanan dan Jaminan Informasi', 'Wajib', '3', '5'),
('PAIK6601', 'Analisis dan Strategi Algoritma', 'Wajib', '3', '6'),
('PAIK6602', 'Uji Perangkat Lunak', 'Wajib', '3', '6'),
('PAIK6603', 'Masyarakat dan Etika Profesi', 'Wajib', '3', '6'),
('PAIK6604', 'Praktik Kerja Lapangan', 'Wajib', '3', '6'),
('PAIK6605', 'Manajemen Proyek', 'Wajib', '3', '6'),
('PAIK6701', 'Metodologi dan Penulisan Ilmiah', 'Wajib', '2', '7'),
('PAIK6821', 'Tugas Akhir', 'Wajib', '6', '8'),
('UNW00004', 'Bahasa Indonesia', 'Wajib', '2', '2'),
('UNW00006', 'Internet of Things', 'Wajib', '2', '2'),
('UNW00007', 'Bahasa Inggris', 'Wajib', '2', '1'),
('UNW00008', 'Kewirausahaan', 'Wajib', '2', '5'),
('UNW00009', 'Kuliah Kerja Nyata', 'Wajib', '3', '7');

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
('2406012010143', 'Ajeng Yuniar', 'Ki. Yogyakarta No. 918', '36.71', '2018', 'SNMPTN', 'irma.putra@hakim.sch.id', '082931237576', 'Lulus', '', '2', '8'),
('24060120120001', 'Bunga Mawar', 'Jalan Mawar Merah No. 203', '33.74', '2020', 'SNMPTN', 'bungamawar@gmail.com', '081366708978', 'Aktif', 'fayza.jpg', '1', '5'),
('2406012012015', 'Andy Bach', 'Jalan Mulawarman No.13', '32.73', '2021', 'SBMPTN', 'andybach@gmail.com', '0840431010', 'Cuti', '', '6', '3'),
('2406012012048', 'Aurora Laksmiwati', 'Jr. Ketandan No. 436', '73.73', '2019', 'SNMPTN', 'cici.nasyidah@utami.or.id', '088685980865', 'Cuti', '', '3', '7'),
('2406012012198', 'Rahayu Purwanti', 'Dk. K.H. Wahid Hasyim (Kopo) No. 26', '82.72', '2019', 'UM', 'whariyah@yahoo.com', '082990446285', 'Mangkir', '', '3', '7'),
('2406012012312', 'Rafid Wijaya', 'Dk. Bakit No. 687', '36.73', '2021', 'UM', 'galar24@januar.my.id', '087956614276', 'Undur Diri', '', '6', '3'),
('2406012013010', 'Rudy Mercury', 'Jalan Soekarno No.178', '64.72', '2022', 'SNMPTN', 'merkuriusun@gmail.com', '0877391834', 'Aktif', '', '3', '1'),
('2406012013122', 'Muni Pradana', 'Kpg. S. Parman No. 496', '12.73', '2019', 'SBMPTN', 'ade.melani@gmail.com', '082161457040', 'Mangkir', '', '1', '7'),
('2406012013289', 'Zahra Palastri', 'Jr. Abdul Muis No. 790', '13.76', '2021', 'UM', 'andriani.carla@uyainah.tv', '089433463958', 'Cuti', '', '4', '3'),
('2406012013445', 'Violet Andriani', 'Psr. Baan No. 783', '31.72', '2022', 'UM', 'waluyo.cakrabirawa@nuraini.biz.id', '085893414686', 'Aktif', '', '5', '1'),
('24060120140120', 'Tono Hartono', 'Jalan Bupati Tikus No.225', '17.71', '2020', 'SBMPTN', 'tonohartono@gmail.com', '0837116965', 'Aktif', '', '2', '5'),
('2406012014091', 'Annas Suji', 'Jalan Tirto Agung 23 No.91', '33.74', '2020', 'SNMPTN', 'annsuji@yahoo.com', '081583548271', 'Cuti', '', '5', '5'),
('2406012014112', 'Elvin Natsir', 'Dk. Industri No. 985', '36.71', '2020', 'SBMPTN', 'irawan.bagas@yahoo.co.id', '086214200800', 'Undur Diri', '', '4', '5'),
('2406012015015', 'Ida Puspita', 'Gg. Baabur Royan No. 793', '52.72', '2021', 'SBMPTN', 'ega.saptono@wastuti.or.id', '089291583365', 'DO', '', '6', '3'),
('24060120160114', 'Hani Indie', 'Jalan Sekar Wangi No.4', '18.71', '2021', 'UM', 'harumwangi@gmail.com', '0815783525', 'Mangkir', '', '4', '3'),
('24060120160981', 'Tina Tanti', 'Jalan Cendrawasih No.10', '34.71', '2022', 'SBUB', 'tinacendra@gmail.com', '0817111933', 'Aktif', '', '5', '5'),
('2406012016352', 'Widya Hartati', 'Psr. Fajar No. 93', '36.71', '2020', 'SBMPTN', 'rusamah@yahoo.com', '080042693952', 'Meninggal', '', '5', '4'),
('2406012017017', 'Dagel Winarno', 'Ds. Cikapayang No. 375', '13.76', '2018', 'SBUB', 'khasanah@gmail.co.id', '084948776818', 'Lulus', '', '1', '8'),
('2406012017120', 'Laras Wastuti', 'Jln. Baya Kali Bungur No. 774', '73.73', '2020', 'SBUB', 'hassanah.sidiq@gmail.co.id', '087181649395', 'DO', '', '3', '4'),
('2406012017472', 'Among Salahudin', 'Ds. Diponegoro No. 146', '33.72', '2022', 'UM', 'margana77@gmail.com', '083581927511', 'Meninggal Dunia', '', '2', '1'),
('2406012017832', 'Qori Nurdiyanti', 'Psr. Ters. Pasir Koja No. 826', '15.72', '2019', 'SNMPTN', 'pradipta.raden@yahoo.co.id', '084136694279', 'Lulus', '', '6', '7'),
('2406012018992', 'Digdaya Januar', 'Jr. Bakin No. 716', '71.72', '2022', 'UM', 'uyainah.zelaya@gmail.co.id', '089168586586', 'Aktif', '', '1', '1'),
('2406012019744', 'Queen Pratiwi', 'Psr. Salak No. 98', '64.74', '2017', 'SBMPTN', 'ana52@yolanda.or.id', '085721425503', 'Lulus', '', '2', '10'),
('2406012019748', 'Bagiya Hardiansyah', 'Kpg. Rajawali No. 567', '35.77', '2020', 'SBMPTN', 'zsaptono@yahoo.co.id', '080835553143', 'Undur Diri', '', '4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkl`
--

CREATE TABLE `tb_pkl` (
  `nim` varchar(14) NOT NULL,
  `status_pkl` varchar(255) NOT NULL,
  `nilai_pkl` varchar(2) DEFAULT NULL,
  `scan_pkl` varbinary(8000) DEFAULT NULL,
  `verif_pkl` varchar(11) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkl`
--

INSERT INTO `tb_pkl` (`nim`, `status_pkl`, `nilai_pkl`, `scan_pkl`, `verif_pkl`) VALUES
('24060120120001', 'LULUS', 'A', NULL, 'belum'),
('2406012012015', 'LULUS', 'B', NULL, 'sudah'),
('2406012013010', 'BELUM MENGAMBIL', NULL, NULL, 'belum'),
('24060120140120', 'SEDANG MENGAMBIL', NULL, NULL, 'sudah'),
('24060120160114', 'SEDANG MENGAMBIL', NULL, NULL, 'sudah'),
('24060120160981', 'BELUM MENGAMBIL', NULL, NULL, 'belum');

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
('12', 'Sumatera Utara'),
('15', 'Jambi'),
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
('73', 'Gorontalo'),
('82', 'Maluku Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `nim` varchar(14) NOT NULL,
  `status_skripsi` varchar(255) NOT NULL,
  `nilai_skripsi` varchar(2) DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `scan_skripsi` varbinary(8000) NOT NULL,
  `verif_skripsi` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`nim`, `status_skripsi`, `nilai_skripsi`, `tanggal_sidang`, `scan_skripsi`, `verif_skripsi`) VALUES
('24060120120001', 'LULUS', 'A', '2022-10-31', '', 'sudah'),
('2406012012015', 'ON GOING', '', '2022-10-31', '', 'sudah'),
('2406012013010', 'BELUM MENGAMBIL', NULL, NULL, '', 'belum'),
('24060120140120', 'BELUM MENGAMBIL', NULL, NULL, '', 'belum'),
('24060120160114', 'ON GOING', NULL, '2022-11-09', '', 'sudah'),
('24060120160981', 'LULUS', 'B', '2022-10-10', '', 'sudah');

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
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_matkul`);

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
