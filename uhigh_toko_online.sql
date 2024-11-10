-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uhigh_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'Elektronik', 'Perangkat teknologi untuk kebutuhan sehari-hari, seperti gadget dan alat rumah tangga.'),
(2, 'Fashion', 'Pakaian dan aksesoris untuk berbagai gaya, dari kasual hingga formal.'),
(3, 'Kecantikan dan Perawatan', 'Produk perawatan wajah, rambut, dan tubuh untuk penampilan sehat dan segar.'),
(4, 'Perabot Rumah Tangga', 'Furnitur dan dekorasi rumah untuk kenyamanan dan estetika ruangan.'),
(5, 'Olahraga dan Outdoor', 'Peralatan olahraga dan aktivitas luar ruangan untuk gaya hidup aktif.');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `nama_member`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(1, 'Fabiola Umaida', 'P', '085811112001', 'Magelang, Jawa Tengah'),
(2, 'Bisyarah', 'P', '085822222002', 'Bandung, Jawa Barat'),
(3, 'Thedeore Gom Gom', 'L', '085833332003', 'Tanah Data, Sumatera Selatan'),
(4, 'Khalifah Nasif', 'L', '085844442004', 'Singaparna, Jawa Barat'),
(5, 'Muhammad Albi R', 'P', '085855552005', 'Bogor, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `jumlah_produk`, `gambar`, `id_kategori`) VALUES
(1, 'Laptop ACER Predator 21X', 124999000, 4, '01hze432bqffztf655gqp67dsa.jpg', 1),
(2, 'Smart Phone Iphone 16 Mini', 7500000, 10, 'th.jpg', 1),
(3, 'Jam Tangan Garmin', 4500000, 8, 'OIP.jpg', 5),
(4, 'Sepatu Nike Alpha Fly', 6500000, 10, 'OIP (1).jpg', 5),
(5, 'Jaket Gelembung', 400000, 20, '328479c74fcc064ae79f2d3c8fd07a94.jpg_720x720q80.jpg', 2),
(6, 'Sabun Muka Kahf', 35000, 30, 'th (1).jpg', 3),
(7, 'Pisau', 15000, 14, 'OIP (2).jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Firdaus Dhiya Ulhaq', 'dhiyaulhaq15', '$2y$10$0tEkCzHhdg8tkImKo4Scpumi7nebCzwj8blY7vZ.ffXmuYNEvhCzO', 'Admin'),
(2, 'Prabowo Subianto', 'prabowori01', '$2y$10$kwOT4xQJxiFCcgDSmyXFG.hdb9bbeNVpFSrGsO6s5zrAUWalU9/3i', 'Admin'),
(3, 'Soekarno', 'soekarno1945', '$2y$10$rUBfFaZ9HslQpF5xCFEZ8.kv.YfVLxU/pFGD6Wj6Z49T9PuTZYxzS', 'Admin'),
(4, 'Gibran Rakabuming Raka', 'gibranri02', '$2y$10$Bhw6MLcct5QghiFsHsI6eeRB7tRhhD8aaSb1gUM7MQbWW2nXiW5GS', 'Operator'),
(5, 'Megawati Soekarno Putri', 'megawhats17', '$2y$10$ANKjE1q1W3oHdravSxx.WuFzLwPUTbl6B6caQuRFQTIE3VcXpYs4i', 'Operator'),
(7, 'ASCscs', 'dhiya123', '$2y$10$DB1nn7Dsj0GhGKGIkoS.GOdBXyRvOt/yd3QcxPpZMY0NaSVqoHZwi', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
