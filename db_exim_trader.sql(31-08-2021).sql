-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 05:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `list_edit_profile`
--

DROP TABLE IF EXISTS `list_edit_profile`;
CREATE TABLE `list_edit_profile` (
  `username_cust` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Format YYYY-MM-DD HH:MI:SS',
  `nama_cust` varchar(50) NOT NULL,
  `telp_cust` varchar(15) NOT NULL,
  `email_cust` varchar(50) NOT NULL,
  `password_cust` varchar(100) NOT NULL,
  `namabank_cust` varchar(15) NOT NULL,
  `norek_cust` varchar(15) NOT NULL,
  `an_cust` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Pending; 2 = Success; 3= Declined; 4 = canceled',
  `keterangan` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_edit_profile`
--

INSERT INTO `list_edit_profile` (`username_cust`, `tanggal`, `nama_cust`, `telp_cust`, `email_cust`, `password_cust`, `namabank_cust`, `norek_cust`, `an_cust`, `status`, `keterangan`, `updated_at`) VALUES
('cielo2804', '2021-08-31 15:36:52', 'asd', 'asd', 'asd', '', 'asd', '123123', 'asdasd', 4, NULL, '2021-08-31 08:36:52'),
('cielo2804', '2021-08-31 15:36:52', 'sad', 'asd', 'asd', '', 'asd', 'asd', 'asd', 4, NULL, '2021-08-31 08:36:52'),
('cielo2804', '2021-08-31 15:36:52', 'cielo2804', '087751065053', 'cielo.justine01@gmail.com', '$2y$10$aLLX8v2EA5tJLmkb0murwuCGm/YG.Zqazy1v4.uBCaFfwXr8btMR.', 'BCA', '0891320123', 'Gracielo Justine Santoso', 4, NULL, '2021-08-31 08:36:52'),
('cielo2804', '2021-08-31 15:36:52', 'cielo2804', '087751065053', 'cielo.justine01@gmail.com', '$2y$10$aLLX8v2EA5tJLmkb0murwuCGm/YG.Zqazy1v4.uBCaFfwXr8btMR.', 'BCA', '0891320123', 'Gracielo Justine Santoso', 1, NULL, '2021-08-31 15:36:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_edit_profile`
--
ALTER TABLE `list_edit_profile`
  ADD KEY `username_cust` (`username_cust`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_edit_profile`
--
ALTER TABLE `list_edit_profile`
  ADD CONSTRAINT `list_edit_profile_ibfk_1` FOREIGN KEY (`username_cust`) REFERENCES `customer` (`username_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
