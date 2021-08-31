-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 06:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`, `nama_admin`, `telp_admin`, `email_admin`, `status`) VALUES
('owner_exim', 'exim123', 'owner', 'owner', 'owner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `username_customer` varchar(20) NOT NULL,
  `password_customer` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `pin_customer` varchar(100) NOT NULL,
  `telp_customer` varchar(15) NOT NULL,
  `email_customer` varchar(50) NOT NULL,
  `namabank_customer` varchar(15) NOT NULL,
  `norek_customer` varchar(15) NOT NULL,
  `an_customer` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `verif_email` int(11) NOT NULL COMMENT '1 = Belum Verif, 2 = Done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username_customer`, `password_customer`, `nama_customer`, `pin_customer`, `telp_customer`, `email_customer`, `namabank_customer`, `norek_customer`, `an_customer`, `saldo`, `verif_email`) VALUES
('cielo2804', '$2y$10$aLLX8v2EA5tJLmkb0murwuCGm/YG.Zqazy1v4.uBCaFfwXr8btMR.', 'Gracielo Justine Santoso', '$2y$10$daKuPvp5y80DkZ1U/fn5Cejq7HRUouZHOqN5bBjGAJ8Dau/WVFdSC', '087751065053', 'cielo.justine01@gmail.com', 'BCA', '0891320123', 'Gracielo Justine Santoso', 0, 2),
('justine28041', '$2y$10$jREeXUncmzsYwAmEXExI5.CRdMnyzUHDrwRaxzbY56Zd6k2m95YdW', 'Gracielo Justine Santoso', '$2y$10$CuRedKVw9jXVu5RPJhflXub217hgNjE2Eo/SsoUwIBcempL3sBROa', '087751065053', 'cielo.justine01@gmail.com', 'BCA', '0891320123', 'Gracielo Justine Santoso', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_deposit`
--

DROP TABLE IF EXISTS `history_deposit`;
CREATE TABLE `history_deposit` (
  `id_depo` varchar(13) NOT NULL COMMENT 'format DP-DDMMYY-00001 (Contoh DP31072100001)',
  `username_cust` varchar(20) NOT NULL,
  `tanggal_depo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `jumlah_depo` int(11) NOT NULL,
  `bank_cust` varchar(15) NOT NULL,
  `norek_cust` varchar(15) NOT NULL,
  `an_cust` varchar(50) NOT NULL,
  `id_bank_tujuan` int(11) NOT NULL,
  `bukti_trf` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Pending; 2 = Success; 3= Declined',
  `keterangan` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_deposit`
--

INSERT INTO `history_deposit` (`id_depo`, `username_cust`, `tanggal_depo`, `jumlah_depo`, `bank_cust`, `norek_cust`, `an_cust`, `id_bank_tujuan`, `bukti_trf`, `status`, `keterangan`, `updated_at`) VALUES
('DP19082100001', 'cielo2804', '2021-08-19 15:40:49', 120000, 'BCA', '0891320123', 'Gracielo Justine Santoso', 1, 'buktiTransfer/DP19082100001.jpg', 1, NULL, '2021-08-19 15:24:56'),
('DP19082100002', 'cielo2804', '2021-08-19 16:06:06', 125000, 'BCA', '0891320123', 'Gracielo Justine Santoso', 1, 'buktiTransfer/DP19082100002.jpg', 2, '', '2021-08-19 15:25:38'),
('DP19082100003', 'cielo2804', '2021-08-19 16:06:09', 123123, 'BCA', '0891320123', 'Gracielo Justine Santoso', 1, 'buktiTransfer/DP19082100003.png', 3, 'Foto Bukti Transfer Buram', '2021-08-19 15:27:46'),
('DP19082100004', 'cielo2804', '2021-08-19 15:55:09', 125950, 'BCA', '0891320123', 'Gracielo Justine Santoso', 3, 'buktiTransfer/DP19082100004.png', 1, NULL, '2021-08-19 15:55:09');

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
  `kode_email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi_email`
--

INSERT INTO `konfirmasi_email` (`email`, `kode_email`, `created_at`) VALUES
('cielo.justine01@gmail.com', '48940313e93aef1d1806a5839f6d43cc', '2021-08-04 12:10:11'),
('cielo.justine01@gmail.com', 'cf2eb05232968bdfef64f242c73ac81c', '2021-08-04 12:10:11'),
('cielo.justine01@gmail.com', '1b8f98fb70178094814cb74f09688f3d', '2021-08-04 12:10:48'),
('cielo.justine01@gmail.com', '0d70d02f478b18ffce7d27715e86660b', '2021-08-04 12:11:45'),
('cielo.justine01@gmail.com', 'fbd9629af8103a948daf8259ab04df3e', '2021-08-04 13:13:20');

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
  `namabank_admin` varchar(20) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Active, 2 = Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_bank`
--

INSERT INTO `list_bank` (`id`, `nama`, `no_rek`, `namabank_admin`, `atas_nama`, `status`) VALUES
(1, 'admin1', '0123123123', 'BCA', 'admin1', 1),
(2, 'admin2', '088123123', 'BCA', 'admin2', 2),
(3, 'admin3', '17712331', 'Mandiri', 'admin3', 1),
(4, 'admin4', '4512341123', 'Permata', 'admin4', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
