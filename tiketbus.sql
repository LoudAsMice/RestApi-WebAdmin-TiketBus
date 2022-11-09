-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 06:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `asal`
--

CREATE TABLE `asal` (
  `id` int(11) NOT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asal`
--

INSERT INTO `asal` (`id`, `asal`) VALUES
(1, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(100) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_tiketbus` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `satuan` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Belum Bayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `id_user`, `id_tiketbus`, `nama`, `hp`, `jumlah`, `asal`, `tujuan`, `tanggal`, `jam`, `satuan`, `total`, `status`) VALUES
(29, 8, 3, 'Fadhil', '081395974344', 5, 'Jakarta', 'Jogja', '18/06/2022', '05:30', 350000, 1750000, 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tiketbus`
--

CREATE TABLE `tiketbus` (
  `id` int(10) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `harga` int(100) NOT NULL,
  `tersedia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiketbus`
--

INSERT INTO `tiketbus` (`id`, `asal`, `tujuan`, `tanggal`, `jam`, `harga`, `tersedia`) VALUES
(2, 'Jakarta', 'Bandung', '18/06/2022', '10:00', 110000, 40),
(3, 'Jakarta', 'Jogja', '18/06/2022', '05:30', 350000, 35),
(4, 'Jakarta', 'Bandung', '30/06/2022', '06:00', 100000, 40),
(5, 'Jakarta', 'Bandung', '30/06/2022', '05:00', 100000, 35),
(6, 'Jakarta', 'Jogja', '30/06/2022', '10:00', 200000, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id`, `tujuan`) VALUES
(1, 'Bandung'),
(2, 'Jogja'),
(3, 'Semarang'),
(4, 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(8, 'debai', 'debai@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 'fadhilsatria', 'fadhilsatria@gmail.com', '4134dc827923290eecc2fd4d1693359f'),
(12, 'satrio', 'satrio@gmail.com', '4297f44b13955235245b2497399d7a93'),
(13, 'test', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(15, 'fadhilsatria1', 'fadhilsatria@gmail.com', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asal`
--
ALTER TABLE `asal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiketbus`
--
ALTER TABLE `tiketbus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asal`
--
ALTER TABLE `asal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tiketbus`
--
ALTER TABLE `tiketbus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
