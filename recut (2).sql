-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 03:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recut`
--

-- --------------------------------------------------------

--
-- Table structure for table `bra_detail`
--

CREATE TABLE `bra_detail` (
  `id` int(11) NOT NULL,
  `id_bra` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `wing` int(11) NOT NULL,
  `cf` int(11) NOT NULL,
  `cup` int(11) NOT NULL,
  `inners` int(11) NOT NULL,
  `mesh` int(11) NOT NULL,
  `liner` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mask_detail`
--

CREATE TABLE `mask_detail` (
  `id` int(11) NOT NULL,
  `id_mask` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `panel` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_bra`
--

CREATE TABLE `order_bra` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` time NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_mask`
--

CREATE TABLE `order_mask` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` time NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_panty`
--

CREATE TABLE `order_panty` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` time NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panty_detail`
--

CREATE TABLE `panty_detail` (
  `id` int(11) NOT NULL,
  `id_panty` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `gusset` int(11) NOT NULL,
  `front` int(11) NOT NULL,
  `back` int(11) NOT NULL,
  `side` int(11) NOT NULL,
  `inners` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `epf` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `epf`, `username`, `password`, `level`) VALUES
(1, '8497', 'Naka', '21232f297a57a5a743894a0e4a801fc3', 'CUTTING'),
(3, '6458', 'Lukman', '9d63484abb477c97640154d40595a3bb', 'VSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bra_detail`
--
ALTER TABLE `bra_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mask_detail`
--
ALTER TABLE `mask_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_bra`
--
ALTER TABLE `order_bra`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_mask`
--
ALTER TABLE `order_mask`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_panty`
--
ALTER TABLE `order_panty`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `panty_detail`
--
ALTER TABLE `panty_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bra_detail`
--
ALTER TABLE `bra_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mask_detail`
--
ALTER TABLE `mask_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_bra`
--
ALTER TABLE `order_bra`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_mask`
--
ALTER TABLE `order_mask`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_panty`
--
ALTER TABLE `order_panty`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panty_detail`
--
ALTER TABLE `panty_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
