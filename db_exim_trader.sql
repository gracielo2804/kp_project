-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 04:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exim_trader`
--
CREATE DATABASE IF NOT EXISTS `db_exim_trader` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_exim_trader`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `telp_admin` varchar(15) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Owner, 2 = Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `username_customer` varchar(20) NOT NULL,
  `password_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `pin_customer` int(6) NOT NULL,
  `telp_customer` varchar(15) NOT NULL,
  `email_customer` varchar(50) NOT NULL,
  `namabank_customer` varchar(15) NOT NULL,
  `norek_customer` varchar(15) NOT NULL,
  `an_customer` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_deposit`
--

DROP TABLE IF EXISTS `history_deposit`;
CREATE TABLE `history_deposit` (
  `id_depo` varchar(13) NOT NULL COMMENT 'format DP-DDMMYY-00001 (Contoh DP31072100001)',
  `username_cust` varchar(20) NOT NULL,
  `tanggal_depo` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `jumlah_depo` int(11) NOT NULL,
  `bank_cust` int(15) NOT NULL,
  `norek_cust` int(15) NOT NULL,
  `an_cust` varchar(50) NOT NULL,
  `id_bank_tujuan` int(11) NOT NULL,
  `bukti_trf` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Pending; 2 = Success; 3= Declined',
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_pembelian_paket`
--

DROP TABLE IF EXISTS `history_pembelian_paket`;
CREATE TABLE `history_pembelian_paket` (
  `tanggal_pembelian` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `username_cust` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_investasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_saldo`
--

DROP TABLE IF EXISTS `history_saldo`;
CREATE TABLE `history_saldo` (
  `tanggal_trans` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `username_cust` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1 = Deposit, 2 = Withdrawal, 3 = Pembelian Paket Investasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_withdrawal`
--

DROP TABLE IF EXISTS `history_withdrawal`;
CREATE TABLE `history_withdrawal` (
  `id_wd` varchar(13) NOT NULL COMMENT 'format WD-DDMMYY-00001 (Contoh WD31072100001)',
  `username_cust` varchar(20) NOT NULL,
  `tanggal_wd` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `jumlah_wd` int(11) NOT NULL,
  `status_wd` int(11) NOT NULL COMMENT '1 = Pending; 2 = Success; 3= Declined',
  `bukti_trf` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_email`
--

DROP TABLE IF EXISTS `konfirmasi_email`;
CREATE TABLE `konfirmasi_email` (
  `email` varchar(50) NOT NULL,
  `kode_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_paket`
--

DROP TABLE IF EXISTS `kontrak_paket`;
CREATE TABLE `kontrak_paket` (
  `username_cust` varchar(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `id_paket` int(11) NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Active; 2 = Expired'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_bank`
--

DROP TABLE IF EXISTS `list_bank`;
CREATE TABLE `list_bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rek` varchar(15) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Active, 2 = Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_edit_profile`
--

DROP TABLE IF EXISTS `list_edit_profile`;
CREATE TABLE `list_edit_profile` (
  `username_cust` varchar(20) NOT NULL,
  `tanggal` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `nama_cust` varchar(50) NOT NULL,
  `telp_cust` varchar(15) NOT NULL,
  `email_cust` varchar(50) NOT NULL,
  `namabank_cust` varchar(15) NOT NULL,
  `norek_cust` varchar(15) NOT NULL,
  `an_cust` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Pending; 2 = Success; 3= Declined',
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

DROP TABLE IF EXISTS `log_admin`;
CREATE TABLE `log_admin` (
  `tanggal` date NOT NULL COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `username_admin` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_investasi`
--

DROP TABLE IF EXISTS `paket_investasi`;
CREATE TABLE `paket_investasi` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `keterangan_paket` varchar(255) NOT NULL,
  `gambar_paket` varchar(255) NOT NULL,
  `minimal_investasi` int(11) NOT NULL,
  `presentase_profit` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Active, 2 = Non Active',
  `durasi_kontrak` int(11) NOT NULL COMMENT 'Dalam bentuk bulan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username_customer`);

--
-- Indexes for table `history_deposit`
--
ALTER TABLE `history_deposit`
  ADD PRIMARY KEY (`id_depo`),
  ADD KEY `username_cust` (`username_cust`),
  ADD KEY `id_bank_tujuan` (`id_bank_tujuan`);

--
-- Indexes for table `history_pembelian_paket`
--
ALTER TABLE `history_pembelian_paket`
  ADD KEY `username_cust` (`username_cust`);

--
-- Indexes for table `history_saldo`
--
ALTER TABLE `history_saldo`
  ADD KEY `username_cust` (`username_cust`);

--
-- Indexes for table `history_withdrawal`
--
ALTER TABLE `history_withdrawal`
  ADD PRIMARY KEY (`id_wd`),
  ADD KEY `username_cust` (`username_cust`);

--
-- Indexes for table `kontrak_paket`
--
ALTER TABLE `kontrak_paket`
  ADD KEY `username_cust` (`username_cust`);

--
-- Indexes for table `list_bank`
--
ALTER TABLE `list_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_edit_profile`
--
ALTER TABLE `list_edit_profile`
  ADD KEY `username_cust` (`username_cust`);

--
-- Indexes for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD KEY `username_admin` (`username_admin`);

--
-- Indexes for table `paket_investasi`
--
ALTER TABLE `paket_investasi`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_bank`
--
ALTER TABLE `list_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket_investasi`
--
ALTER TABLE `paket_investasi`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_deposit`
--
ALTER TABLE `history_deposit`
  ADD CONSTRAINT `history_deposit_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`),
  ADD CONSTRAINT `history_deposit_ibfk_2` FOREIGN KEY (`id_bank_tujuan`) REFERENCES `list_bank` (`id`);

--
-- Constraints for table `history_pembelian_paket`
--
ALTER TABLE `history_pembelian_paket`
  ADD CONSTRAINT `history_pembelian_paket_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);

--
-- Constraints for table `history_saldo`
--
ALTER TABLE `history_saldo`
  ADD CONSTRAINT `history_saldo_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);

--
-- Constraints for table `history_withdrawal`
--
ALTER TABLE `history_withdrawal`
  ADD CONSTRAINT `history_withdrawal_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);

--
-- Constraints for table `kontrak_paket`
--
ALTER TABLE `kontrak_paket`
  ADD CONSTRAINT `kontrak_paket_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);

--
-- Constraints for table `list_edit_profile`
--
ALTER TABLE `list_edit_profile`
  ADD CONSTRAINT `list_edit_profile_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);

--
-- Constraints for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD CONSTRAINT `log_admin_ibfk_1` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
