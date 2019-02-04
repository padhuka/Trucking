-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 08:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `truckdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_truck`
--

CREATE TABLE IF NOT EXISTS `jenis_truck` (
`id` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_truck`
--

INSERT INTO `jenis_truck` (`id`, `nama`, `size`) VALUES
(1, 'BLINDVAN (BOX)', '( 4m x 1,6m x 1,9m )'),
(2, 'PICKUP (BOX) ', '( 2,0m x 1,3m x 1,3m )'),
(3, 'PICKUP (BAK) ', '( 2,3m x 1,6m x 0,3m )'),
(4, 'TRUK ENGKEL (BAK) ', '( 3,1m x 1,6m x 1,6m )'),
(5, 'TRUK ENGKEL (BOX) ', '( 3,1m x 1,6m x 1,6m )'),
(6, 'TRUK ENGKEL (BOX REEFER) ', '( 3,1m x 1,6m x 1,6m )'),
(7, 'COLT DIESEL (BOX REEFER)', '( 4,2m x 2,0m x 1,6m )'),
(8, 'COLT DIESEL (BAK)', '( 4,3m x 2,0m x 2,0m )'),
(9, 'COLT DIESEL (BOX) ', '( 4,2m x 2,0m x 1,6m )'),
(10, 'COLT DIESEL LONG (BOX REEFER) ', '( 6,0m x 2,4m x 2,4m )'),
(11, 'COLT DIESEL LONG (BOX) ', '( 6,0m x 2,4m x 2,4m )'),
(12, 'COLT DIESEL LONG (BAK) ', '( 6,0m x 2,4m x 2,4m ) '),
(13, 'FUSO (BOX REEFER) ', '( 5,7m x 2,3m x 2,4m ) '),
(14, 'FUSO (BOX) ', '( 5,7m x 2,3m x 2,4m ) '),
(15, 'FUSO (BAK) ', '( 5,7m x 2,3m x 2,5m )'),
(16, 'TRAILER (SHORT CHASIS)', '( 6,3m x 2,2m x 2,3m )'),
(17, 'TRAILER (LONG CHASIS) ', '( 12m x 2,3m x 2,3m )'),
(18, 'TRAILER (COMBO CHASIS)', '( 12,6m x 4,6m x 4,6m )'),
(19, 'TRONTON (WINGBOX) ', '( 9,3m x 2,5m x 2,5m )'),
(20, 'TRONTON (WINGBOX REEFER) ', '( 9,3m x 2,5m x 2,5m )'),
(21, 'TRONTON (BAK) ', '( 6,3m x 2,2m x 2,5m )'),
(22, 'TRONTON (BOX) ', '( 6,3m x 2,2m x 2,3m )');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'JAKARTA'),
(2, 'MEDAN'),
(3, 'RIAU'),
(4, 'PALEMBANG'),
(5, 'LAMPUNG'),
(6, 'BANDUNG'),
(7, 'SEMARANG'),
(8, 'SURABAYA'),
(9, 'DENPASAR');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `fk_kota_asal` int(11) NOT NULL,
  `fk_kota_tujuan` int(11) NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `date` date NOT NULL,
  `fk_jenis_truck` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `dimensi_p` int(11) NOT NULL,
  `dimensi_l` int(11) NOT NULL,
  `dimensi_t` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL,
  `fk_jenis_truck` int(11) NOT NULL,
  `fk_kota_asal` int(11) NOT NULL,
  `fk_kota_tujuan` int(11) NOT NULL,
  `tarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `fk_jenis_truck`, `fk_kota_asal`, `fk_kota_tujuan`, `tarif`) VALUES
(0, 1, 1, 2, 0),
(0, 2, 1, 2, 17500000),
(0, 3, 1, 2, 8000000),
(0, 4, 1, 2, 16000000),
(0, 5, 1, 2, 16632000),
(0, 6, 1, 2, 19000000),
(0, 7, 1, 2, 22000000),
(0, 8, 1, 2, 20000000),
(0, 9, 1, 2, 18414000),
(0, 10, 1, 2, 0),
(0, 11, 1, 2, 16447200),
(0, 12, 1, 2, 22000000),
(0, 13, 1, 2, 0),
(0, 14, 1, 2, 33000000),
(0, 15, 1, 2, 25000000),
(0, 16, 1, 2, 0),
(0, 17, 1, 2, 38500000),
(0, 18, 1, 2, 0),
(0, 19, 1, 2, 0),
(0, 20, 1, 2, 0),
(0, 21, 1, 2, 32000000),
(0, 22, 1, 2, 36000000),
(0, 1, 1, 3, 10000000),
(0, 2, 1, 3, 9130000),
(0, 3, 1, 3, 8000000),
(0, 4, 1, 3, 18000000),
(0, 5, 1, 3, 12500000),
(0, 6, 1, 3, 17000000),
(0, 7, 1, 3, 20000000),
(0, 8, 1, 3, 15000000),
(0, 9, 1, 3, 16000000),
(0, 1, 1, 3, 10000000),
(0, 2, 1, 3, 9130000),
(0, 3, 1, 3, 8000000),
(0, 4, 1, 3, 18000000),
(0, 5, 1, 3, 12500000),
(0, 6, 1, 3, 17000000),
(0, 7, 1, 3, 20000000),
(0, 8, 1, 3, 15000000),
(0, 9, 1, 3, 16000000),
(0, 10, 1, 3, 0),
(0, 11, 1, 3, 17942400),
(0, 12, 1, 3, 0),
(0, 13, 1, 3, 0),
(0, 14, 1, 3, 27000000),
(0, 15, 1, 3, 18000000),
(0, 16, 1, 3, 0),
(0, 17, 1, 3, 35000000),
(0, 18, 1, 3, 0),
(0, 19, 1, 3, 35700000),
(0, 20, 1, 3, 0),
(0, 21, 1, 3, 31495300),
(0, 22, 1, 3, 37000000),
(0, 1, 1, 4, 5500000),
(0, 2, 1, 4, 8390000),
(0, 3, 1, 4, 8500000),
(0, 4, 1, 4, 0),
(0, 5, 1, 4, 0),
(0, 6, 1, 4, 0),
(0, 7, 1, 4, 0),
(0, 8, 1, 4, 14000000),
(0, 9, 1, 4, 7500000),
(0, 10, 1, 4, 0),
(0, 11, 1, 4, 8000000),
(0, 12, 1, 4, 0),
(0, 13, 1, 4, 0),
(0, 14, 1, 4, 23000000),
(0, 15, 1, 4, 20000000),
(0, 16, 1, 4, 0),
(0, 17, 1, 4, 24000000),
(0, 18, 1, 4, 0),
(0, 19, 1, 4, 20000000),
(0, 20, 1, 4, 0),
(0, 21, 1, 4, 0),
(0, 22, 1, 4, 0),
(0, 1, 1, 5, 3000000),
(0, 2, 1, 5, 7260000),
(0, 3, 1, 5, 5500000),
(0, 4, 1, 5, 6000000),
(0, 5, 1, 5, 8474000),
(0, 6, 1, 5, 8600000),
(0, 7, 1, 5, 9000000),
(0, 8, 1, 5, 8000000),
(0, 9, 1, 5, 9500000),
(0, 10, 1, 5, 9600000),
(0, 11, 1, 5, 9952000),
(0, 12, 1, 5, 0),
(0, 13, 1, 5, 0),
(0, 14, 1, 5, 24000000),
(0, 15, 1, 5, 13000000),
(0, 16, 1, 5, 0),
(0, 17, 1, 5, 19750000),
(0, 18, 1, 5, 0),
(0, 19, 1, 5, 35700000),
(0, 20, 1, 5, 32613800),
(0, 21, 1, 5, 47500000),
(0, 22, 1, 5, 50000000),
(0, 1, 1, 6, 1200000),
(0, 2, 1, 6, 2500000),
(0, 3, 1, 6, 3000000),
(0, 4, 1, 6, 2500000),
(0, 5, 1, 6, 2500000),
(0, 6, 1, 6, 2650000),
(0, 7, 1, 6, 3000000),
(0, 8, 1, 6, 3000000),
(0, 9, 1, 6, 6000000),
(0, 10, 1, 6, 3400000),
(0, 11, 1, 6, 3500000),
(0, 12, 1, 6, 0),
(0, 13, 1, 6, 5714140),
(0, 14, 1, 6, 5000000),
(0, 15, 1, 6, 5000000),
(0, 16, 1, 6, 3500000),
(0, 17, 1, 6, 4000000),
(0, 18, 1, 6, 6800000),
(0, 19, 1, 6, 5700000),
(0, 20, 1, 6, 5594700),
(0, 21, 1, 6, 6500000),
(0, 22, 1, 6, 6500000),
(0, 1, 1, 7, 3500000),
(0, 2, 1, 7, 3500000),
(0, 3, 1, 7, 7500000),
(0, 4, 1, 7, 5500000),
(0, 5, 1, 7, 5000000),
(0, 6, 1, 7, 4500000),
(0, 7, 1, 7, 5000000),
(0, 8, 1, 7, 4000000),
(0, 9, 1, 7, 6800000),
(0, 10, 1, 7, 4900000),
(0, 11, 1, 7, 4500000),
(0, 12, 1, 7, 6000000),
(0, 13, 1, 7, 7024160),
(0, 14, 1, 7, 7000000),
(0, 15, 1, 7, 5850000),
(0, 16, 1, 7, 0),
(0, 17, 1, 7, 7500000),
(0, 18, 1, 7, 0),
(0, 19, 1, 7, 7650000),
(0, 20, 1, 7, 8137170),
(0, 21, 1, 7, 7000000),
(0, 22, 1, 7, 10000000),
(0, 1, 1, 8, 4500000),
(0, 2, 1, 8, 6000000),
(0, 3, 1, 8, 7000000),
(0, 4, 1, 8, 6000000),
(0, 5, 1, 8, 6000000),
(0, 6, 1, 8, 6000000),
(0, 7, 1, 8, 6500000),
(0, 8, 1, 8, 6000000),
(0, 9, 1, 8, 8950000),
(0, 10, 1, 8, 6900000),
(0, 11, 1, 8, 6582080),
(0, 12, 1, 8, 9000000),
(0, 13, 1, 8, 11000000),
(0, 14, 1, 8, 10350000),
(0, 15, 1, 8, 9500000),
(0, 16, 1, 8, 0),
(0, 17, 1, 8, 9500000),
(0, 18, 1, 8, 9800000),
(0, 19, 1, 8, 15600000),
(0, 20, 1, 8, 10932100),
(0, 21, 1, 8, 9000000),
(0, 22, 1, 8, 12000000),
(0, 1, 1, 9, 7500000),
(0, 2, 1, 9, 10000000),
(0, 3, 1, 9, 7800000),
(0, 4, 1, 9, 9000000),
(0, 5, 1, 9, 8750000),
(0, 6, 1, 9, 9250000),
(0, 7, 1, 9, 16000000),
(0, 8, 1, 9, 8500000),
(0, 9, 1, 9, 12000000),
(0, 10, 1, 9, 10250000),
(0, 11, 1, 9, 9968000),
(0, 12, 1, 9, 9325500),
(0, 13, 1, 9, 0),
(0, 14, 1, 9, 18000000),
(0, 15, 1, 9, 10100000),
(0, 16, 1, 9, 40000000),
(0, 17, 1, 9, 45000000),
(0, 18, 1, 9, 0),
(0, 19, 1, 9, 20000000),
(0, 20, 1, 9, 0),
(0, 21, 1, 9, 13500000),
(0, 22, 1, 9, 25000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_type` enum('customer','partner') NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `no_ktp` varchar(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `fk_jenis_truck` int(15) DEFAULT NULL,
  `address` text,
  `domisili` varchar(255) DEFAULT NULL,
  `area_operasi` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `confirm_status` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `username`, `mobile_number`, `no_ktp`, `email_address`, `fk_jenis_truck`, `address`, `domisili`, `area_operasi`, `password`, `activation_code`, `confirm_status`) VALUES
(1, 'customer', 'Sujith', '9876543210', '', 'sujithsuji1098@gmail.com', NULL, '', '', '', 'c12b240b5710c6c9ee00ef4529803aac', '', 1),
(2, 'customer', 'Subramanya', '9988776655', '', 'subramanyarao4@gmail.com', NULL, '', '', '', 'a8c6b82ae79f5f29899228ced196b1b7', '', 1),
(3, 'customer', 'dhuka', '0813214050', '', 'dhuka.cahyanto@gmail.com', NULL, '', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'f65ccfbfec288565c1d414275985547799fde0ed286c85a50bd0ec5faa01d1ac', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_truck`
--

CREATE TABLE IF NOT EXISTS `user_truck` (
  `id` int(11) NOT NULL,
  `fk_user_id` varchar(20) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `fk_jenis_truck` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `stnk` blob NOT NULL,
  `kir` blob,
  `foto` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_truck`
--
ALTER TABLE `jenis_truck`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_truck`
--
ALTER TABLE `jenis_truck`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
