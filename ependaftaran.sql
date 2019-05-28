-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2018 at 04:15 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ependaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `datamurid`
--

DROP TABLE IF EXISTS `datamurid`;
CREATE TABLE IF NOT EXISTS `datamurid` (
  `idMurid` int(4) NOT NULL AUTO_INCREMENT,
  `namaMurid` varchar(128) NOT NULL,
  `kpMurid` varchar(12) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `penjagaMurid` varchar(8) NOT NULL,
  `namaPenjaga` varchar(128) NOT NULL,
  `telefonPenjaga` varchar(12) NOT NULL,
  PRIMARY KEY (`idMurid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datamurid`
--

INSERT INTO `datamurid` (`idMurid`, `namaMurid`, `kpMurid`, `kelas`, `alamat`, `penjagaMurid`, `namaPenjaga`, `telefonPenjaga`) VALUES
(1, 'Lai Kin Meng', '010705140154', '1 Adil', '47 Jalan 2/17, Linseng Garden, 46000 Petaling Jaya, Selangor', 'Bapa', 'Lai Chong Wei', '0102654131'),
(2, 'Thanes Kumar', '010511141331', '1 Bakti', '1-1 PJ Flats, Jalan Selangor, 46000 Petaling Jaya, Selangor', 'Bapa', 'Parathi Sinnathamby', '0141351284'),
(3, 'Nik Muhammad Zaen', '010713141514', '1 Bakti', '3-17 Maxwell Towers, Jalan 5/17, Gasing Indah, 46000 Petaling Jaya, Selangor', 'Penjaga', 'Wan Izzat Yusry', '01115648101'),
(4, 'Aisam Anak Hudson', '011215043155', '1 Cekap', 'No. 3 Jalan Universiti, Seksyen 12, 46000 Petaling Jaya, Selangor', 'Bapa', 'Huson Alloy', '0175181521'),
(5, 'Mas Sofea Saela bt Shamsudin', '010524111054', '1 Adil', '22 Jalan Anak Gasing, Jalan Gasing, 46000 Petaling Jaya', 'Bapa', 'Mas Shamsudin', '0131241520');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`),
  KEY `userName` (`userName`,`userEmail`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'Matt', 'admin@ependaftaran', 'b0a20cddba121012871430edcf07976f94ced4ef0b0ea65b41bb060464e767d7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
