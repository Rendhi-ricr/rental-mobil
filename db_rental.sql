-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 05:54 PM
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
-- Table structure for table `tabel_kendaraan`
--

CREATE TABLE `tabel_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `nama_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nomber_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_kendaraan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_perhari` decimal(10,2) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_kendaraan`
--

INSERT INTO `tabel_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `nomber_kendaraan`, `tipe_kendaraan`, `harga_perhari`, `gambar`) VALUES
(3, 'Mitsubishi Pajero', 'B1234DA', 'SUV', '850000.00', '1733727212_07d5354b10672a81c418.webp'),
(4, 'Toyota Avanza', 'A4567DT', 'MVP', '500000.00', '1733727277_0edd76ee0fd5da8a60f9.jpg'),
(5, 'Mitsubishi Xpander', 'T8763TR', 'MVP', '600000.00', '1733727328_4d60caa260e95cfaa13a.jpg'),
(6, 'Daihatsu Xenia', 'D9281OP', 'MVP', '500000.00', '1733727395_13cdca460c3fed51eba5.jpg');

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
  `total_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_user`, `id_kendaraan`, `tglsewa_mulai`, `tglsewa_akhir`, `total_harga`) VALUES
(1, 5, 6, '0000-00-00', '2024-12-14', '3500000'),
(2, 5, 3, '0000-00-00', '2024-12-11', '1700000'),
(3, 5, 4, '0000-00-00', '2024-12-13', '2000000'),
(4, 5, 4, '2024-12-11', '2024-12-13', '1500000'),
(5, 5, 4, '2024-12-10', '2024-12-14', '2500000');

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
(4, 'qwertyuio', 'sdfghjk@dfgh', '', '', '$2y$10$m3ecqC6FICm7HBR/QT94PONQdBGA8LdjJ2ILHf04gGbSME9sD3dAu', 'pelanggan'),
(5, 'Siti Masitoh', 'sitim@gmail.com', '', 'qwertyui', '$2y$10$w2.tmd/KM2sHYZ9fqh4u.uoww610WTaKjehpuG053WrwhlhdxNGxS', 'pelanggan');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
