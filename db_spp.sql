-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2020 at 01:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL,
  `kompetensi_keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(7, 'XI RPL 2', 'Rekayasa Perangkat Lunak'),
(8, 'XI RPL 1', 'Rekayasa Perangkat Lunak'),
(9, 'XI TKJ 1', 'Teknik Komputer dan Jaringan'),
(10, 'XI TKJ 2', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan` varchar(8) DEFAULT NULL,
  `id_spp` int(11) DEFAULT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan`, `id_spp`, `keterangan`) VALUES
(26, NULL, '20200101', NULL, 'Januari', 5, ''),
(27, NULL, '20200101', NULL, 'Februari', 5, ''),
(28, NULL, '20200101', NULL, 'Maret', 5, ''),
(29, NULL, '20200101', NULL, 'April', 5, ''),
(30, NULL, '20200101', NULL, 'Mei', 5, ''),
(31, NULL, '20200101', NULL, 'Juni', 5, ''),
(32, NULL, '20200101', NULL, 'Juli', 5, ''),
(33, NULL, '20200101', NULL, 'Agustus', 5, ''),
(34, NULL, '20200101', NULL, 'Septembe', 5, ''),
(35, NULL, '20200101', NULL, 'Oktober', 5, ''),
(36, NULL, '20200101', NULL, 'November', 5, ''),
(37, NULL, '20200101', NULL, 'Desember', 5, ''),
(38, NULL, '20200202', NULL, 'Januari', 4, ''),
(39, NULL, '20200202', NULL, 'Februari', 4, ''),
(40, NULL, '20200202', NULL, 'Maret', 4, ''),
(41, NULL, '20200202', NULL, 'April', 4, ''),
(42, NULL, '20200202', NULL, 'Mei', 4, ''),
(43, NULL, '20200202', NULL, 'Juni', 4, ''),
(44, NULL, '20200202', NULL, 'Juli', 4, ''),
(45, NULL, '20200202', NULL, 'Agustus', 4, ''),
(46, NULL, '20200202', NULL, 'Septembe', 4, ''),
(47, NULL, '20200202', NULL, 'Oktober', 4, ''),
(48, NULL, '20200202', NULL, 'November', 4, ''),
(49, NULL, '20200202', NULL, 'Desember', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `level` enum('Admin','Petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(9, 'admin', '$2y$10$vIihYytrV4T.LcDO8gRQ0udYIfhuchmLBxQqfZZTi8jWhzSbyyzwW', 'Admin SPP', 'Admin'),
(10, 'petugas', '$2y$10$9kqpqbFd1NQLN.2bObvxo.BkFvJy.d3ZNGZ1FYu0Ld0ieUqibv4Iq', 'petugas SPP', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(13) DEFAULT NULL,
  `id_spp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('20200101', '14404', 'Alfip Lutfiana Luki', 7, '', '', 5),
('20200202', '14401', 'Lutfiana Luki', 9, '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(4, 2019, 115000),
(5, 2020, 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

