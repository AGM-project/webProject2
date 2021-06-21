-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 07:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persada`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilaiabsensi`
--

CREATE TABLE `nilaiabsensi` (
  `id` int(8) NOT NULL,
  `id_siswa` int(8) NOT NULL,
  `nilai_absensi` float NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilaiabsensi`
--

INSERT INTO `nilaiabsensi` (`id`, `id_siswa`, `nilai_absensi`, `status`) VALUES
(1, 5, 70, 'Tinggi'),
(3, 6, 80, 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `nilairatarata`
--

CREATE TABLE `nilairatarata` (
  `id` int(8) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai_rata_rata` float NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilairatarata`
--

INSERT INTO `nilairatarata` (`id`, `id_siswa`, `nilai_rata_rata`, `status`) VALUES
(2, 5, 90, 'Tinggi'),
(3, 6, 50, 'Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id` int(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `gaji` float NOT NULL,
  `jumlah_anak` int(4) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id`, `nama`, `alamat`, `gaji`, `jumlah_anak`, `foto`) VALUES
(2, 'Sutejo', 'Jakarta', 100000, 2, '60cea98613e5e.png'),
(3, 'test', '213123', 60000, 3, '60cece88b845c.png');

-- --------------------------------------------------------

--
-- Table structure for table `penerimabantuan`
--

CREATE TABLE `penerimabantuan` (
  `id` int(8) NOT NULL,
  `id_siswa` int(8) NOT NULL,
  `jumlah_bantuan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimabantuan`
--

INSERT INTO `penerimabantuan` (`id`, `id_siswa`, `jumlah_bantuan`) VALUES
(4, 4, 3000000),
(6, 5, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `no_telp`, `email`, `alamat`, `level`, `foto`) VALUES
(1, 'alif', 'alif', 'alif', '083808769876', 'alif@gmail.com', 'bekasi', 'admin', 'alif.jpg'),
(9, 'risda', 'risda', 'risda', '085267651234', 'risda@gmail.com', 'Bekasi', 'guru', '60ad4ce924c18.jpg'),
(10, 'atta', 'atta', 'atta', '084388887777', 'ATEAM@gmail.com', 'ahha', 'administrasi sekolah', 'atta.jpg'),
(14, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'administrasi sekolah', '60c34793905a8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `nisn` varchar(32) NOT NULL,
  `kelas` char(4) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_ortu` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `alamat`, `nisn`, `kelas`, `foto`, `id_ortu`) VALUES
(5, 'Sule', 'JKT', '12312312', '12', '60cec4509e6a5.png', 2),
(6, 'testing jr', 'test', '21312412', '11 A', '60cecea7e3b5f.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilaiabsensi`
--
ALTER TABLE `nilaiabsensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `nilairatarata`
--
ALTER TABLE `nilairatarata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimabantuan`
--
ALTER TABLE `penerimabantuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilaiabsensi`
--
ALTER TABLE `nilaiabsensi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilairatarata`
--
ALTER TABLE `nilairatarata`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerimabantuan`
--
ALTER TABLE `penerimabantuan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
