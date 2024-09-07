-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekndes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id_aduan` int(11) NOT NULL,
  `judul_keluhan` varchar(255) DEFAULT NULL,
  `keluhan` text NOT NULL,
  `wilayah` varchar(255) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_masukkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id_aduan`, `judul_keluhan`, `keluhan`, `wilayah`, `foto`, `id_user`, `tanggal_masukkan`) VALUES
(8, 'lapor 1', 'keluhan laporan 1', 'Majalengka', 0x75706c6f6164732f53637265656e73686f7420323032332d31302d3136203039323430382e706e67, 8, '2023-11-13 23:37:40'),
(9, 'Laporan 2', 'coba coba saa', 'Tasikmalaya', 0x75706c6f6164732f53637265656e73686f74202833292e706e67, 7, '2023-11-21 17:31:33'),
(10, 'lapor 3', 'sekali lagi', 'Serang', 0x75706c6f6164732f53637265656e73686f7420323032332d31302d3235203139303032352e706e67, 7, '2023-11-21 17:36:22'),
(11, 'Lapor 4', 'lagi lagi coba', 'Sumedang', 0x75706c6f6164732f53637265656e73686f7420323032332d31302d3138203030343134342e706e67, 7, '2023-11-21 23:07:30'),
(12, 'saca', ' acs', 'sac  asa', 0x75706c6f6164732f6b74702e6a7067, 8, '2023-11-25 03:25:10'),
(13, 'mengeluh', 'gapunya duit', 'dompetsaya', 0x75706c6f6164732f67616d626172322e4a504547, 8, '2023-11-25 03:28:58'),
(14, 'afca ac', 'egr  sgr e', 'adC A', 0x75706c6f6164732f53637265656e73686f74202836292e706e67, 8, '2023-11-25 04:58:52'),
(15, 'nyoba keluhan', 'ini conteoh detail', 'dasda', 0x75706c6f6164732f5472616e736b726970204477692050726173657469612e6a7067, 8, '2023-11-27 07:46:45'),
(16, 'sjaf', 'avds ', 'avds as', 0x75706c6f6164732f3339393936333233365f323333343531343539363734383238325f363134303133373731393731373437383439385f6e2e6a7067, 8, '2023-11-27 07:47:33'),
(17, 'acdsa', 'wCS', 'WFS ', 0x75706c6f6164732f67616d626172312e4a504547, 8, '2023-11-27 07:48:56'),
(18, 'asvcsz', 'asvd cdsz', 'adca', 0x75706c6f6164732f67616d626172322e4a504547, 8, '2023-11-27 07:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `foto` blob DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` blob NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `gambar`, `content`, `date`) VALUES
(41, 'asd ', 0x2e2e2f2e2e2f75706c6f6164732f617274696b656c2f53637265656e73686f7420323032332d31302d3235203139303032352e706e67, 'Contoh isi yang lain', '2023-11-12'),
(43, 'Contoh', 0x2e2e2f2e2e2f75706c6f6164732f617274696b656c2f53637265656e73686f7420323032332d31302d3038203231303230362e706e67, '<b>Halo ini adalah contoh isi artikel bold</b>\r\n<i>Halo ini adalah contoh isi artikel italic</i>\r\nHalo ini adalah contoh isi artikel', '2023-11-13'),
(44, 'CONTOH 2', 0x2e2e2f2e2e2f75706c6f6164732f617274696b656c2f53637265656e73686f7420323032332d31312d3039203038343833342e706e67, 'Halo ini adalah contoh isi artikel </br>\r\n<b>Halo ini adalah contoh isi artikel bold</b></br>\r\n<i>Halo ini adalah contoh isi artikel italic</i></br>', '2023-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_doc` int(11) NOT NULL,
  `documentasi` blob DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_duit` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jumlah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id_pd` int(11) NOT NULL,
  `foto` blob DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `pedukuhan` varchar(25) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `phone`, `nik`, `pedukuhan`, `role`) VALUES
(4, 'Dwi Prasetia', 'dwiprst13@gmail.com', '7fd6d36ae44765c9f6b7c86cbb87adaf', '085229992286', '3401101312010001', 'Krinjing', 'admin'),
(7, 'Salma Mesias Gesuri Wirata Kusuma', 'salma@gmail.com', 'f6852b2a3ac0cd7e69c801f69eddb57a', '0824213411', '241414532', 'Kronjong', 'user'),
(8, 'Nopal Setyanto', 'nopal@gmail.com', '6efc67e68005e7503df580d11e5e7a23', '081328358265', '340110131031238', 'Kranjing', 'user'),
(9, 'Romli Setiawan', 'romli@gmail.com', 'b68e37fba2754b2e19f1b53969b75e49', '08241412421', '34011012321', 'krenjeng', 'user'),
(10, 'Sunanan', 'sunan@gmail.com', '1be3e450f77a06f4800f1bb281cf0413', '081328672984', '3401103232799840', 'Krinjang', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id_aduan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_duit`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id_pd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_duit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `aduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
