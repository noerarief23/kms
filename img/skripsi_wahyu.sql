-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2015 at 03:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_wahyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
`id_dokumen` int(5) unsigned NOT NULL,
  `nama_dokumen` varchar(100) DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `isi_dokumen` text,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
`id_forum` int(5) NOT NULL,
  `topik` varchar(100) DEFAULT NULL,
  `masalah` text,
  `tgl_forum` date DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `topik`, `masalah`, `tgl_forum`, `id_user`) VALUES
(2, 'Tes', '<p>sad</p>\r\n', '2015-12-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Jabatan 1');

-- --------------------------------------------------------

--
-- Table structure for table `kamus`
--

CREATE TABLE IF NOT EXISTS `kamus` (
`id_katadasar` int(5) NOT NULL,
  `katadasar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
`id_keyword` int(5) NOT NULL,
  `nama_keyword` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(5) NOT NULL,
  `tgl_komentar` date DEFAULT NULL,
  `isi_komentar` text,
  `id_user` int(5) DEFAULT NULL,
  `id_like` int(5) DEFAULT NULL,
  `id_forum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `tgl_komentar`, `isi_komentar`, `id_user`, `id_like`, `id_forum`) VALUES
(1, '2015-12-28', 'sdfs', 1, NULL, 2),
(2, '2015-12-28', 'dasdad', 1, NULL, 2),
(3, '2015-12-28', 'sadadas', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
`like` int(5) NOT NULL,
  `id_komentar` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modul_knowledge`
--

CREATE TABLE IF NOT EXISTS `modul_knowledge` (
`id_modul` int(5) NOT NULL,
  `nama_modul` varchar(100) DEFAULT NULL,
  `tgl_modul` date DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL,
  `path` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stemming`
--

CREATE TABLE IF NOT EXISTS `stemming` (
`id_stemming` int(5) NOT NULL,
  `id_dokumen` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
`id_token` int(5) NOT NULL,
  `id_dokumen` int(5) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `jabatan_id` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `jabatan_id`) VALUES
(1, 'admin', 'admin@wahyu.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', NULL),
(2, 'admin2', 'udin@wahyu.com', '*A4B6157319038724E3560894F7F932C8886EBFCF', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
 ADD PRIMARY KEY (`id_dokumen`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
 ADD PRIMARY KEY (`id_forum`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kamus`
--
ALTER TABLE `kamus`
 ADD PRIMARY KEY (`id_katadasar`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
 ADD PRIMARY KEY (`id_keyword`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`), ADD KEY `id_forum` (`id_forum`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
 ADD PRIMARY KEY (`like`);

--
-- Indexes for table `modul_knowledge`
--
ALTER TABLE `modul_knowledge`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `stemming`
--
ALTER TABLE `stemming`
 ADD PRIMARY KEY (`id_stemming`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
 ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `jabatan_id` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
MODIFY `id_dokumen` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
MODIFY `id_forum` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
MODIFY `id_katadasar` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
MODIFY `id_keyword` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
MODIFY `like` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modul_knowledge`
--
ALTER TABLE `modul_knowledge`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stemming`
--
ALTER TABLE `stemming`
MODIFY `id_stemming` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
