-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2020 pada 08.19
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.2.25

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
-- Struktur dari tabel `apparel_detail`
--

CREATE TABLE `apparel_detail` (
  `id` int(11) NOT NULL,
  `id_apparel` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `waist` text NOT NULL,
  `inners` int(11) NOT NULL,
  `outers` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` varchar(5) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `apparel_detail2`
--

CREATE TABLE `apparel_detail2` (
  `id` int(11) NOT NULL,
  `id_apparel` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `body` text NOT NULL,
  `lefts` int(11) NOT NULL,
  `rights` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` varchar(5) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bra_detail`
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
  `remarks` varchar(20) NOT NULL,
  `wing_shape` varchar(50) NOT NULL,
  `cf_shape` varchar(50) NOT NULL,
  `cup_shape` varchar(50) NOT NULL,
  `inners_shape` varchar(50) NOT NULL,
  `mesh_shape` varchar(50) NOT NULL,
  `liner_shape` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mask_detail`
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
-- Struktur dari tabel `order_apparel`
--

CREATE TABLE `order_apparel` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` datetime NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0,
  `check_lab` int(11) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_bra`
--

CREATE TABLE `order_bra` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` datetime NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0,
  `check_lab` int(11) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_mask`
--

CREATE TABLE `order_mask` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` datetime NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_lab` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_panty`
--

CREATE TABLE `order_panty` (
  `order_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `so` varchar(50) NOT NULL,
  `line` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_estimated` datetime NOT NULL,
  `style` varchar(50) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `shift` enum('A','B') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `check_qa` int(11) NOT NULL DEFAULT 0,
  `check_vse` int(11) NOT NULL DEFAULT 0,
  `check_cutting` int(11) NOT NULL DEFAULT 0,
  `check_lab` int(11) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `panty_detail`
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
  `remarks` varchar(20) NOT NULL,
  `gusset_shape` varchar(50) NOT NULL,
  `front_shape` varchar(50) NOT NULL,
  `back_shape` varchar(50) NOT NULL,
  `side_shape` varchar(50) NOT NULL,
  `inners_shape` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `time` time NOT NULL,
  `type` enum('panty','bra','mask','apparel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `epf` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apparel_detail`
--
ALTER TABLE `apparel_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apparel_detail2`
--
ALTER TABLE `apparel_detail2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bra_detail`
--
ALTER TABLE `bra_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mask_detail`
--
ALTER TABLE `mask_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_apparel`
--
ALTER TABLE `order_apparel`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_bra`
--
ALTER TABLE `order_bra`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_mask`
--
ALTER TABLE `order_mask`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_panty`
--
ALTER TABLE `order_panty`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `panty_detail`
--
ALTER TABLE `panty_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apparel_detail`
--
ALTER TABLE `apparel_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `apparel_detail2`
--
ALTER TABLE `apparel_detail2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bra_detail`
--
ALTER TABLE `bra_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mask_detail`
--
ALTER TABLE `mask_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_apparel`
--
ALTER TABLE `order_apparel`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_bra`
--
ALTER TABLE `order_bra`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_mask`
--
ALTER TABLE `order_mask`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_panty`
--
ALTER TABLE `order_panty`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `panty_detail`
--
ALTER TABLE `panty_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
