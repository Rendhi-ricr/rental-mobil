-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 08:41 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_histori_transaksi`
--

CREATE TABLE `tabel_histori_transaksi` (
  `id_histori_transaksi` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `telat_hari` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_histori_transaksi`
--

INSERT INTO `tabel_histori_transaksi` (`id_histori_transaksi`, `id_transaksi`, `tanggal_dikembalikan`, `telat_hari`, `total_denda`) VALUES
(1, 3, '2024-12-17', '0', '0'),
(2, 3, '2024-12-18', '0', '0'),
(3, 7, '2024-12-18', '9', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kendaraan`
--

CREATE TABLE `tabel_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `nama_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nomber_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_kendaraan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_perhari` decimal(10,0) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_kendaraan`
--

INSERT INTO `tabel_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `nomber_kendaraan`, `tipe_kendaraan`, `harga_perhari`, `gambar`) VALUES
(3, 'Mitsubishi Pajero', 'B 1234 DA', 'SUV', '850000', '1733727212_07d5354b10672a81c418.webp'),
(4, 'Toyota Avanza', 'A 4567 DT', 'MVP', '500000', '1733727277_0edd76ee0fd5da8a60f9.jpg'),
(5, 'Mitsubishi Xpander', 'T 8763 TR', 'MVP', '600000', '1733727328_4d60caa260e95cfaa13a.jpg'),
(7, 'Daihatsu Xenia', 'C 1412 GA', 'MVP', '500000', '1733912146_3d1730c727beca48ed7a.jpg'),
(12, 'fgbnmh', 'D 1956 AC', 'Mobil SUV', '1234567', '1734527338_83bbecd057bbc438332a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_kendaraan` int NOT NULL,
  `tglsewa_mulai` date NOT NULL,
  `tglsewa_akhir` date NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `denda` decimal(10,0) NOT NULL,
  `keterangan` enum('Mobil Belum Diambil','Mobil Sudah Diambil','Transaksi Selesai') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_user`, `id_kendaraan`, `tglsewa_mulai`, `tglsewa_akhir`, `total_harga`, `denda`, `keterangan`) VALUES
(1, 8, 3, '2024-12-20', '2024-12-25', '5100000', '100000', 'Mobil Sudah Diambil'),
(2, 5, 5, '2024-12-17', '2024-12-21', '3000000', '100000', 'Mobil Belum Diambil'),
(4, 5, 4, '2024-12-21', '2024-12-27', '3500000', '100000', 'Mobil Belum Diambil'),
(5, 8, 12, '2024-12-26', '2024-12-28', '3703701', '300000', 'Mobil Belum Diambil'),
(6, 8, 3, '2024-12-13', '2024-12-16', '3400000', '100000', 'Mobil Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','pelanggan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `email`, `no_hp`, `alamat`, `password`, `role`) VALUES
(1, 'rendhi', 'rendhirichardo2@gmail.com', '081224210297', 'qwertyuio', '$2y$10$Y05YT/pflTqJqQ8.Utz5x.3cyIIQIEN0POiQSDYo92Oe/GuKhzHPm', 'admin'),
(3, 'Nada Savana', 'admin123@gmail.com', '', '', '$2y$10$Iwn4f2Z4cH37ohP5nIVbFOvThfWlsVKhDqXzuQfJWkhBClhimxItG', 'admin'),
(5, 'Siti Masitoh', 'sitim@gmail.com', '', 'iyutfygcvnbkj', '$2y$10$w2.tmd/KM2sHYZ9fqh4u.uoww610WTaKjehpuG053WrwhlhdxNGxS', 'pelanggan'),
(6, 'Agus', 'agus@gmail.com', '', '', '$2y$10$Hi0o8p6pkD7C14TmzELGDeytTjYuw630VCjVcYBGzKc9ZdeoepzCK', 'pelanggan'),
(7, 'Asep', 'asep@gmail.com', '', 'wertyui', '$2y$10$e9g2R/Xqcv7GEUIJXz1/qexhAS1pzYMG9t91MLq0uIxIp3L1HUwpm', ''),
(8, 'Agung Pakmen', 'agung@example.com', '', 'Subang', '$2y$10$umitaw54XQ5lZUiqsP.L7eyHG.lNSsfLr0NvjfgQNvizJkfMOuaj2', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_histori_transaksi`
--
ALTER TABLE `tabel_histori_transaksi`
  ADD PRIMARY KEY (`id_histori_transaksi`);

--
-- Indexes for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_histori_transaksi`
--
ALTER TABLE `tabel_histori_transaksi`
  MODIFY `id_histori_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
