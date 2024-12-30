-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2024 at 08:43 AM
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
  `id_user` int NOT NULL,
  `id_kendaraan` int NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `telat_hari` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_histori_transaksi`
--

INSERT INTO `tabel_histori_transaksi` (`id_histori_transaksi`, `id_transaksi`, `id_user`, `id_kendaraan`, `tanggal_dikembalikan`, `telat_hari`, `total_denda`) VALUES
(2, 4, 8, 3, '2024-12-22', '0', '0'),
(3, 6, 5, 4, '2024-12-22', '7', '700000'),
(4, 5, 8, 7, '2024-12-22', '0', '0');

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
(3, 'Mitsubishi Pajero', 'C 1920 GA', 'SUV', '850000', '1733727212_07d5354b10672a81c418.webp'),
(4, 'Toyota Avanza', 'A 4567 DT', 'MVP', '500000', '1733727277_0edd76ee0fd5da8a60f9.jpg'),
(5, 'Mitsubishi Xpander', 'T 8763 TR', 'MVP', '600000', '1733727328_4d60caa260e95cfaa13a.jpg'),
(14, 'Jeep Wrangler Rubicon', 'D 1992 AC', 'Mobil Jeep', '900000', '1735262428_7f2f52629d55745c9d75.jpg'),
(15, 'Honda Brio', 'G 1872 AA', 'Mobil Hatchback', '500000', '1735262853_2e2a45aa2849a25a1c82.png'),
(16, 'Honda Civic', 'D 1902 AU', 'Mobil Sedan', '1000000', '1735262880_db26be22b88e565b8230.png'),
(17, 'Toyota Camry', 'C 1276 AB', 'Mobil Sedan', '2000000', '1735262914_383b3386f8aa45f73e9d.png'),
(18, 'Mazda 3 Hatchback', 'T 5678 KA', 'Mobil Hatchback', '2500000', '1735262998_0ccc90add5876ad8aac9.png'),
(19, 'Marcedes-Benz C 200', 'T 1402 XM', 'Mobil Sedan', '3500000', '1735263112_75a93b7505c2bc209620.png'),
(20, 'BMW M3', 'B 2871 XA', 'Mobil Sedan', '5000000', '1735263212_8c9cdd79b2fceccd27b7.png');

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
  `tanggal_dikembalikan` date NOT NULL,
  `telat_hari` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `total_denda` decimal(10,0) NOT NULL,
  `keterangan` enum('Mobil Belum Diambil','Mobil Sudah Diambil','Transaksi Selesai') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_user`, `id_kendaraan`, `tglsewa_mulai`, `tglsewa_akhir`, `total_harga`, `denda`, `tanggal_dikembalikan`, `telat_hari`, `total_denda`, `keterangan`) VALUES
(1, 5, 3, '2024-12-12', '2024-12-21', '8500000', '100000', '2024-12-22', '1', '100000', 'Transaksi Selesai'),
(2, 8, 3, '2024-12-13', '2024-12-18', '5100000', '100000', '2024-12-22', '4', '400000', 'Transaksi Selesai'),
(3, 8, 4, '2024-12-18', '2024-12-22', '2500000', '100000', '0000-00-00', '', '0', 'Mobil Sudah Diambil'),
(4, 5, 14, '2024-12-27', '2024-12-31', '4500000', '100000', '0000-00-00', '', '0', 'Mobil Belum Diambil'),
(5, 5, 14, '2024-12-13', '2024-12-21', '8100000', '100000', '0000-00-00', '', '0', 'Mobil Belum Diambil');

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
(5, 'Siti Masitoh', 'sitim@gmail.com', '5678976', 'yuipohgasvdjags', '$2y$10$w2.tmd/KM2sHYZ9fqh4u.uoww610WTaKjehpuG053WrwhlhdxNGxS', 'pelanggan'),
(9, 'Binta', 'binta@example.com', '', '', '$2y$10$Q/8aWIuZdSafR7uFQ0goduYsmrlok63Xa63o7P5qCGV2hAaY9.TDa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_histori_transaksi`
--
ALTER TABLE `tabel_histori_transaksi`
  ADD PRIMARY KEY (`id_histori_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_histori_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_kendaraan`
--
ALTER TABLE `tabel_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
