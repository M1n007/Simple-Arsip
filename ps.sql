-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 09:23 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ps`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_disposisi` varchar(100) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_dispo` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `no_disposisi`, `no_surat`, `tgl_dispo`, `penerima`, `judul`, `catatan`, `pengirim`) VALUES
(6, 'DISPO001', '002/SP002/TGL002/2018', '2018-01-03', 'PEG003', 'ini surat', 'akcakksa', 'PEG0001'),
(7, 'DISPO002', '001/SP001/TGL001/2018', '2018-01-24', 'PEG0002', 'jjjj', 'jjjjjj', 'PEG003');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_peg` varchar(25) DEFAULT NULL,
  `nama_peg` varchar(25) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `jns_kelamin` enum('laki-laki','perempuan','','') DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `no_peg`, `nama_peg`, `jabatan`, `alamat`, `no_telp`, `jns_kelamin`, `level`, `username`, `password`) VALUES
(1, 'PEG0001', 'Aminudin', 'konduktor', 'kutabima rt 02/rw 02, kecamatan cimanggu', '082214899172', 'laki-laki', 'admin', 'admin', 'admin'),
(2, 'PEG0002', 'khoerul', 'kepala sekolah', 'jln mawar rt 03', '082214677891', 'laki-laki', 'user', 'user', 'user'),
(3, 'PEG003', 'Maula Akmal Alfikri Yusuf', 'kepala sekolah', 'jln mawar', '087719866723', 'laki-laki', 'admin', 'akmal', 'akmal');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_sukel` varchar(30) NOT NULL,
  `no_sukel` varchar(30) NOT NULL,
  `tgl_sukel` date NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `judul_sukel` varchar(100) NOT NULL,
  `isi_sukel` varchar(250) NOT NULL,
  `file_sukel` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kd_sukel`, `no_sukel`, `tgl_sukel`, `instansi`, `judul_sukel`, `isi_sukel`, `file_sukel`) VALUES
(1, 'SUKEL001', '09/2017/sp03', '2017-09-08', 'Pemerintah Jogja1', 'ini judul', 'ikkkkm', 'miraiq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_surat` varchar(30) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `jns_surat` varchar(30) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` varchar(250) NOT NULL,
  `file` varchar(100) NOT NULL,
  `instansi` varchar(250) NOT NULL,
  `tgl_suratdtg` varchar(30) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `kd_surat`, `no_surat`, `tgl_surat`, `jns_surat`, `judul`, `isi`, `file`, `instansi`, `tgl_suratdtg`, `penerima`) VALUES
(20, 'SURAT001', '001/SP001/TGL001/2018', '2018-01-03', 'surat ijin mengemudi', 'mengemudi', 'surat ijin mengemudi', 'Delete-Poster.jpg', 'bappeda', '2018-01-04', 'PEG003'),
(21, 'SURAT002', '002/SP002/TGL002/2018', '2018-02-01', 'surat lamaran', 'kkkk', 'kkkkkk', 'Delete-Poster.jpg', 'bappeda', '2018-02-03', 'PEG0001');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
