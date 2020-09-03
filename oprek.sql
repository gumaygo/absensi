-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 01:58 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oprek`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_dosen`
--

CREATE TABLE `absen_dosen` (
  `id_absendsn` int(11) NOT NULL,
  `tgl_absen` date NOT NULL DEFAULT '0000-00-00',
  `id_matkul` char(5) NOT NULL DEFAULT '',
  `jam_datang` time NOT NULL DEFAULT '00:00:00',
  `jam_plg` time NOT NULL DEFAULT '00:00:00',
  `status` varchar(20) NOT NULL DEFAULT '',
  `pertemuan` varchar(20) NOT NULL DEFAULT '',
  `judul` varchar(50) NOT NULL,
  `topik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_dosen`
--

INSERT INTO `absen_dosen` (`id_absendsn`, `tgl_absen`, `id_matkul`, `jam_datang`, `jam_plg`, `status`, `pertemuan`, `judul`, `topik`) VALUES
(1, '2020-01-19', 'KM001', '13:25:00', '16:15:00', 'Hadir', '1', 'oop', 'pengenalan oop');

-- --------------------------------------------------------

--
-- Table structure for table `absen_kelas`
--

CREATE TABLE `absen_kelas` (
  `id_absen` int(11) NOT NULL,
  `nim` char(10) NOT NULL DEFAULT '',
  `tgl_absen` date NOT NULL DEFAULT '0000-00-00',
  `id_matkul` char(5) NOT NULL DEFAULT '',
  `jam_mulai` time NOT NULL DEFAULT '00:00:00',
  `pertemuan` varchar(20) NOT NULL DEFAULT '',
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_kelas`
--

INSERT INTO `absen_kelas` (`id_absen`, `nim`, `tgl_absen`, `id_matkul`, `jam_mulai`, `pertemuan`, `status`) VALUES
(1, '1411502482', '2020-01-19', 'KM001', '13:25:00', '1', 'Hadir'),
(2, '687976655', '2020-01-19', 'KM001', '13:25:00', '1', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nama_admin` varchar(30) NOT NULL DEFAULT '',
  `foto` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_admin`, `foto`, `role`) VALUES
('admin1', '$2y$10$DvssY57q.doSu8vHls9gjOIz6B3lptophyaoQUt.c8XrgnmdaaFrm', 'Administrator', '2019_05_17_21_44_IMG_0615iwo6kiaj019pz7qbiiqgi0f5dqk13o.jpg', 'root'),
('spmi', '$2y$10$DvssY57q.doSu8vHls9gjOIz6B3lptophyaoQUt.c8XrgnmdaaFrm', 'spmi', '2019_05_17_21_44_IMG_0615iwo6kiaj019pz7qbiiqgi0f5dqk13o.jpg', 'spmi');

-- --------------------------------------------------------

--
-- Table structure for table `detil_matkul`
--

CREATE TABLE `detil_matkul` (
  `id_detil` int(11) NOT NULL,
  `id_matkul` char(5) NOT NULL,
  `nim` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_matkul`
--

INSERT INTO `detil_matkul` (`id_detil`, `id_matkul`, `nim`) VALUES
(2, 'KM001', '1411502483'),
(3, 'KM001', '1411502490'),
(4, 'KM001', '1411502492'),
(5, 'KM001', '1411502493'),
(7, 'KM001', '1411502482'),
(8, 'KM002', '1411502482'),
(9, 'KM001', '687976655');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nid` char(10) NOT NULL DEFAULT '',
  `nm_dosen` varchar(50) NOT NULL DEFAULT '',
  `jk` varchar(6) NOT NULL,
  `alamat` text NOT NULL,
  `telp_dosen` varchar(12) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nid`, `nm_dosen`, `jk`, `alamat`, `telp_dosen`, `password`, `email`, `foto`) VALUES
('1411100100', 'Tri Sandika', 'Pria', 'Polinela Raya', '088888888', '$2y$10$DvssY57q.doSu8vHls9gjOIz6B3lptophyaoQUt.c8XrgnmdaaFrm', 'trisandika@gmail.com', '11wmbeycey9w9z57rtt1hu5nm0svji82.jpg'),
('1411100101', 'Oke Win ', 'Pria', 'Ciledug Raya', '088888888', '$2y$10$DvssY57q.doSu8vHls9gjOIz6B3lptophyaoQUt.c8XrgnmdaaFrm', 'okewin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(10) NOT NULL DEFAULT '',
  `nm_mhs` varchar(50) NOT NULL DEFAULT '',
  `jk` varchar(6) NOT NULL,
  `alamat_mhs` text NOT NULL,
  `telp_mhs` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nm_mhs`, `jk`, `alamat_mhs`, `telp_mhs`, `email`) VALUES
('1411502482', 'aul', 'Pria', 'pesawaran', '0881212188', 'aul@gmail.com'),
('687976655', 'M Ilham Yusuf Gumai', 'Pria', '2277 Locust View Drive', '4159485527', 'gumay@maildrop.cc');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` char(5) NOT NULL DEFAULT '',
  `nm_matkul` varchar(50) NOT NULL DEFAULT '',
  `hari` varchar(20) NOT NULL DEFAULT '',
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruangan` varchar(20) NOT NULL DEFAULT '',
  `nid` char(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nm_matkul`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`, `nid`) VALUES
('KM001', 'Pemrograman Dasar', 'Senin', '13:25:00', '16:15:00', '7.5.1', '1411100100'),
('KM002', 'Pemrograman Web', 'Selasa', '08:00:00', '10:40:00', 'Lab Kom 10', '1411100100');

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `no` int(5) NOT NULL,
  `id_matkul` char(5) NOT NULL,
  `rancana_pertemuan` varchar(20) NOT NULL,
  `rencana_judul` varchar(20) NOT NULL,
  `rencana_topik` varchar(100) NOT NULL,
  `status2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana`
--

INSERT INTO `rencana` (`no`, `id_matkul`, `rancana_pertemuan`, `rencana_judul`, `rencana_topik`, `status2`) VALUES
(1, 'KM001', '1', 'oop', 'pengenalan oop', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_dosen`
--
ALTER TABLE `absen_dosen`
  ADD PRIMARY KEY (`id_absendsn`),
  ADD KEY `nid` (`id_matkul`);

--
-- Indexes for table `absen_kelas`
--
ALTER TABLE `absen_kelas`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nim` (`nim`,`id_matkul`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detil_matkul`
--
ALTER TABLE `detil_matkul`
  ADD PRIMARY KEY (`id_detil`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_dosen`
--
ALTER TABLE `absen_dosen`
  MODIFY `id_absendsn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `absen_kelas`
--
ALTER TABLE `absen_kelas`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detil_matkul`
--
ALTER TABLE `detil_matkul`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
