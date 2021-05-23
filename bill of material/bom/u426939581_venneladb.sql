-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 12:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u426939581_venneladb`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugtbl`
--

CREATE TABLE `drugtbl` (
  `slno` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `molecule` varchar(50) NOT NULL,
  `distributor` varchar(50) NOT NULL,
  `rcvddate` date NOT NULL,
  `mfgdate` date NOT NULL,
  `expdate` date NOT NULL,
  `qty` int(11) NOT NULL,
  `freeqty` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `mrp` float NOT NULL,
  `purprice` float NOT NULL,
  `tax` float NOT NULL DEFAULT 12,
  `taxtype` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugtbl`
--

INSERT INTO `drugtbl` (`slno`, `brand`, `type`, `molecule`, `distributor`, `rcvddate`, `mfgdate`, `expdate`, `qty`, `freeqty`, `invoice`, `mrp`, `purprice`, `tax`, `taxtype`) VALUES
(12, 'FLEXON', 'SYP', 'IBRUFIN', 'SREE SAI', '2020-03-08', '2020-01-01', '2022-05-01', 9, 1, 'DC10638', 26.96, 19.25, 0, 1),
(13, 'OMINICEF O', 'SYP', 'CEFIXIM', 'SREE SAI', '2020-03-08', '2020-01-01', '2021-03-01', 10, 2, 'DC10638', 70.9, 50.64, 0, 1),
(14, 'CLAMP', 'SYP', 'NA', 'SVV', '2020-04-20', '2020-01-01', '2021-02-01', 10, 2, 'RO11478', 59.43, 42.45, 12, 0),
(16, 'SCAVISTA12MG', 'TAB', 'IVERMECTIN ', 'SRI SAI', '2020-09-09', '2020-09-09', '2022-07-31', 20, 0, 'ER02853', 85, 60.71, 12, 0),
(17, 'FABIFLU', 'TAB', 'FEPARAVIR', 'SRI SAI', '2020-09-09', '2020-09-09', '2021-01-01', 5, 0, 'EC00348', 1224, 874.29, 12, 0),
(18, 'BEVON', 'SYP', 'MVT', 'SRI SAI', '2020-09-09', '2020-09-09', '2021-12-31', 20, 4, 'ER02859', 144.55, 103.25, 0, 1),
(19, 'BEVON', 'DROPS', 'MVT', 'SRI SAI', '2020-09-09', '2020-09-09', '2021-12-31', 10, 0, 'ER02853', 40.4, 28.86, 12, 0),
(20, 'AUGPEN', 'INJ', 'AMIXILLIN', 'SRI SAI', '2020-09-09', '2020-09-09', '2021-04-30', 10, 2, 'ER02853', 149.7, 106.93, 12, 0),
(21, 'MEGA CV', 'INJ', 'MEGA CV', 'SRI SAI', '2020-09-09', '2020-09-09', '2021-04-30', 10, 4, 'ER02859', 97.68, 69.77, 0, 1),
(22, 'MEGA CV 1.2', 'INJ', 'MEGA CV', 'SRI SAI', '2020-09-10', '2020-09-10', '2021-12-30', 10, 4, 'ER02889', 134.49, 96.06, 0, 1),
(23, 'OMEG D', 'TAB', 'OMEG', 'SRI SAI', '2020-09-10', '2020-09-10', '2022-05-30', 10, 0, 'ER02889', 161, 115.36, 0, 1),
(24, 'COMBITHER', 'SYP', 'COMBITHER', 'SRI SAI', '2020-09-10', '2020-09-10', '2021-08-30', 9, 1, 'ER02889', 220, 157.14, 0, 1),
(25, 'KABURLU 400MG', 'TAB', 'FABIFLU', 'SRI SAI', '2020-09-10', '2020-09-10', '2021-01-30', 5, 0, 'ER00351', 1224, 874.29, 0, 1),
(238, 'OMEG D', 'TAB', 'OMEG', 'NIKHIL', '2020-11-18', '0000-00-00', '2035-11-30', 100, 50, 'NIK123456', 100, 75, 12, 0),
(239, 'FABIFLU', 'TAB', 'FEPARAVIR', 'NIKHIL', '2020-11-17', '0000-00-00', '2035-11-30', 10, 10, 'NIK456123', 200, 100, 0, 1),
(242, 'MEGA CV', 'INJ', 'MEGA CV', 'MADHU', '2020-11-19', '0000-00-00', '2045-11-30', 200, 10, 'MAD123456', 10, 5, 0, 0),
(243, 'COMBITHER', 'SYP', 'COMBITHER', 'MADHU', '2020-11-19', '0000-00-00', '2045-11-30', 10, 0, 'MAD654321', 150, 100, 0, 0),
(247, 'OMINICEF O', 'SYP', 'CEFIXIM', 'MADHU', '2020-11-19', '0000-00-00', '2045-11-30', 100, 0, 'MAD741853', 300, 150, 0, 0),
(248, 'OMINICEF O', 'SYP', 'CEFIXIM', 'NIKHIL', '2020-11-26', '0000-00-00', '2045-11-30', 100, 0, 'NIK741852', 300, 150, 0, 0),
(249, 'COMBITHER', 'SYP', 'COMBITHER', 'NIKHIL', '2020-11-20', '0000-00-00', '2045-11-30', 100, 0, 'NIK741853', 20, 10, 0, 0),
(262, 'OMINICEF O', 'SYP', 'CEFIXIM', 'MADHU', '2020-11-19', '0000-00-00', '2045-11-30', 100, 0, 'MAD741852', 300, 175, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoicetbl`
--

CREATE TABLE `invoicetbl` (
  `slno` bigint(20) UNSIGNED NOT NULL,
  `distributor` varchar(150) NOT NULL,
  `invoiceno` varchar(20) NOT NULL,
  `invoicedate` date NOT NULL,
  `gsttype` tinyint(4) NOT NULL DEFAULT 0,
  `netamount` float NOT NULL,
  `totalmrp` float NOT NULL,
  `discount_per` float NOT NULL,
  `discount_amt` float NOT NULL,
  `profit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicetbl`
--

INSERT INTO `invoicetbl` (`slno`, `distributor`, `invoiceno`, `invoicedate`, `gsttype`, `netamount`, `totalmrp`, `discount_per`, `discount_amt`, `profit`) VALUES
(13, 'NIKHIL', 'NIK123456', '2020-11-18', 0, 8400, 15000, 0, 0, 6600),
(14, 'NIKHIL', 'NIK456123', '2020-11-17', 1, 1000, 4000, 0, 0, 3000),
(15, 'SRI SAI', 'ER00351', '2020-09-10', 1, 4371.45, 6120, 0, 0, 1748.55),
(16, 'SRI SAI', 'ER02859', '2020-09-09', 1, 2762.7, 4836.72, 0, 0, 2074.02),
(18, 'SRI SAI', 'ER02889', '2020-09-10', 1, 3528.46, 5692.86, 0, 0, 2164.4),
(19, 'SREE SAI', 'DC10638', '2020-03-08', 1, 679.65, 1120.4, 0, 0, 440.75),
(21, 'MADHU', 'MAD741853', '2020-11-19', 1, 15000, 30000, 0, 0, 15000),
(22, 'NIKHIL', 'NIK741852', '2020-11-26', 1, 15000, 30000, 0, 0, 15000),
(23, 'NIKHIL', 'NIK741853', '2020-11-20', 1, 1000, 2000, 0, 0, 1000),
(36, 'MADHU', 'MAD741852', '2020-11-19', 0, 15000, 30000, 4, 600, 15600);

-- --------------------------------------------------------

--
-- Table structure for table `stocktbl`
--

CREATE TABLE `stocktbl` (
  `slno` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(250) NOT NULL,
  `type` varchar(150) NOT NULL,
  `molecule` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocktbl`
--

INSERT INTO `stocktbl` (`slno`, `brand`, `type`, `molecule`, `qty`, `lastupdate`) VALUES
(1, 'OMINICEF O', 'SYP', 'CEFIXIM', 350, '2020-11-21 11:01:54'),
(2, 'COMBITHER', 'SYP', 'COMBITHER', 100, '2020-11-19 06:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `slno` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`slno`, `userid`, `username`, `password`) VALUES
(1, 'admin', 'Dr JayaRaj', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugtbl`
--
ALTER TABLE `drugtbl`
  ADD UNIQUE KEY `slno` (`slno`);

--
-- Indexes for table `invoicetbl`
--
ALTER TABLE `invoicetbl`
  ADD UNIQUE KEY `slno` (`slno`);

--
-- Indexes for table `stocktbl`
--
ALTER TABLE `stocktbl`
  ADD UNIQUE KEY `slno` (`slno`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD UNIQUE KEY `slno` (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugtbl`
--
ALTER TABLE `drugtbl`
  MODIFY `slno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `invoicetbl`
--
ALTER TABLE `invoicetbl`
  MODIFY `slno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stocktbl`
--
ALTER TABLE `stocktbl`
  MODIFY `slno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `slno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
