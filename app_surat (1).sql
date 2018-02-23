-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 08:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `no_peg` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin') NOT NULL,
  `copyright` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `no_peg`, `username`, `password`, `level`, `copyright`) VALUES
(7, 'PEG008', 'admin', 'admin', 'admin', 'AnCreator');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `no_disposisi` varchar(100) NOT NULL,
  `no_sumas` varchar(100) NOT NULL,
  `tgl_dispo` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `pengirim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `no_disposisi`, `no_sumas`, `tgl_dispo`, `penerima`, `judul`, `catatan`, `pengirim`) VALUES
(1, 'DISPO001', '003/004/srt004/', '2018-02-01', 'PEG002', 'zxcxz', 'zxczxc', 'PEG001'),
(2, 'DISPO002', '0002010201', '2018-02-10', 'PEG002', 'asd', 'asdas', 'PEG002'),
(3, 'DISPO003', '0002010201', '2018-02-01', 'PEG001', 'sad', 'adsa', 'PEG001');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `no_peg` varchar(10) DEFAULT NULL,
  `nama_peg` text,
  `jabatan` text,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `jns_kelamin` enum('laki-laki','perempuan','','') DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `no_peg`, `nama_peg`, `jabatan`, `alamat`, `no_telp`, `jns_kelamin`, `level`, `username`, `password`, `pertanyaan`) VALUES
(6, 'PEG001', 'aminudin', 'kepsek', 'sasads', '3', 'laki-laki', 'admin', 'admin', 'admin', 'mandarin'),
(10, 'PEG002', 'aaa2', 'aaa', 'aaa', '', 'laki-laki', 'admin', 'usr', 'usr', 'asd'),
(13, 'PEG003', 'wwwqqqq', 'www', 'www', '3333', 'laki-laki', 'user', '333', '333', 'dsfas'),
(14, 'PEG004', 'wwwqwe', 'wqwe', 'qweqwe', '22323', 'laki-laki', 'admin', 'aaswd', 'asda', 'asdkjas'),
(15, 'PEG005', 'asda', 'asdasda', 'ds cas', '34234', 'laki-laki', 'user', 'wads', 'sdasda', 'sdfs'),
(23, 'PEG006', 'asda', 'asdsad', 'asdasd', '324234', 'laki-laki', 'admin', '2423', '23423', 'asdasd'),
(24, 'PEG007', 'asdas', 'asda', 'asda', '34234', 'laki-laki', 'admin', '234234', '234234', 'cilacap'),
(25, 'PEG008', 'Ir Habib Mutaqin', 'kepala sekolah', 'jalan merbabu cinta menuju keadilan bersama', '087719855234', 'laki-laki', 'admin', 'habib', 'admin', 'cilacap'),
(26, 'PEG009', 'sss', 'sss', 'sss', '3333', 'laki-laki', 'user', 'qweq', 'weqwe', 'benda');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `kd_sukel` varchar(100) NOT NULL,
  `no_sukel` varchar(100) NOT NULL,
  `tgl_sukel` date NOT NULL,
  `instansi` text NOT NULL,
  `judul_sukel` text NOT NULL,
  `isi_sukel` varchar(250) NOT NULL,
  `file_sukel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kd_sukel`, `no_sukel`, `tgl_sukel`, `instansi`, `judul_sukel`, `isi_sukel`, `file_sukel`) VALUES
(14, 'SUKEL001', '003/004/006/009', '2018-02-09', 'bappeda', 'test', 'ini surat keluar pertama', 'Penguins.jpg'),
(15, 'SUKEL002', 'sdasda', '2018-02-01', 'sada', 'sadasd', 'asdasd', 'Pegawai___.pdf'),
(16, 'SUKEL003', 'sss', '2018-02-09', 'ss', 'ss', 'sss', 'Pegawai__aminudin_ (1).pdf'),
(17, 'SUKEL004', 'asdasd', '2018-02-02', 'asdasd', 'ssda', 'asdad', 'Pegawai__asda_.pdf'),
(18, 'SUKEL005', 'asdasdas', '2018-02-08', 'dasda', 'asdasd', 'asdasd', 'Pegawai__aminudin_ (1).pdf'),
(19, 'SUKEL006', 'asdasdasasda', '2018-02-16', 'asdasd', 'dasd', 'asda', 'Pegawai___.pdf'),
(20, 'SUKEL007', 'xczxc', '2018-02-01', 'zxczxc', 'xczxc', 'zxczxc', 'Pegawai__aminudin_ (1).pdf'),
(21, 'SUKEL008', 'zxczc', '2018-02-02', 'zxczcx', 'zxczxc', 'zxczc', 'Pegawai__asda_.pdf'),
(22, 'SUKEL009', 'zxczxc', '2018-02-01', 'zxczxc', 'zxczx', 'zxczxcz', 'Pegawai__aminudin_.pdf'),
(23, 'SUKEL010', 'xzczxc', '2018-02-03', 'zxcz', 'zxczxc', 'zxcz', 'Pegawai__aminudin_ (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `kd_sumas` varchar(100) NOT NULL,
  `no_sumas` varchar(100) NOT NULL,
  `tgl_sumas` date NOT NULL,
  `tgl_sumasdtg` date NOT NULL,
  `jns_sumas` text NOT NULL,
  `judul` text NOT NULL,
  `isi` varchar(250) NOT NULL,
  `instansi` text NOT NULL,
  `penerima` text NOT NULL,
  `file_sumas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `kd_sumas`, `no_sumas`, `tgl_sumas`, `tgl_sumasdtg`, `jns_sumas`, `judul`, `isi`, `instansi`, `penerima`, `file_sumas`) VALUES
(3, 'SUMAS001', '003/004/srt004/', '2018-02-01', '2018-02-02', 'surat undangan', 'untuk pegawai 002', 'ssss', 'bappeda', 'PEG002', 'Desert.jpg'),
(5, 'SUMAS002', '0002010201', '2018-02-01', '2018-02-02', 'sss', 'ss', 'ss', 'sSd', 'PEG001', 'Pegawai__aminudin_.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
