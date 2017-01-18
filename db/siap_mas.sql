-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 01:23 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siap_mas`
--

-- --------------------------------------------------------

--
-- Table structure for table `direksi`
--

CREATE TABLE IF NOT EXISTS `direksi` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `direksi_type` varchar(25) NOT NULL,
  `direksi_kontak` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` text NOT NULL,
  `tempat_fasilitas` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` int(25) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tanggapan`
--

CREATE TABLE IF NOT EXISTS `nilai_tanggapan` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `proses_tanggapan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori/staff` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE IF NOT EXISTS `saran` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int(25) NOT NULL,
  `id_staff_kampus` int(25) NOT NULL,
  `id_mahasiswa` int(25) NOT NULL,
  `saran_pesan` text NOT NULL,
  `saran_b_foto` varchar(10) NOT NULL,
  `saran_tertanggapi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `staff_nama` varchar(100) NOT NULL,
  `staff_type` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perembpuan','','','') NOT NULL,
  `no_telpon` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tanggapi_saran`
--

CREATE TABLE IF NOT EXISTS `tanggapi_saran` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `pesan_masuk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
