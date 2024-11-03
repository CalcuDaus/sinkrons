-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2024 at 09:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinkron`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `akun_id` int NOT NULL,
  `akun_nama` varchar(255) NOT NULL,
  `akun_email` varchar(255) NOT NULL,
  `akun_password` varchar(255) NOT NULL,
  `akun_kelamin` enum('pria','wanita') NOT NULL,
  `akun_level` enum('operator','viewer','admin') NOT NULL,
  `akun_status` enum('aktif','tidak aktif') NOT NULL,
  `akun_segmen` enum('imb','krk','pengawasan','semua') NOT NULL,
  `akun_foto` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_id`, `akun_nama`, `akun_email`, `akun_password`, `akun_kelamin`, `akun_level`, `akun_status`, `akun_segmen`, `akun_foto`) VALUES
(1, 'Fittra Ferdiansyah', 'penyalahgunaanakun@gmail.com', '$2y$10$muMzo7NwEHA.zJL/9RedCuERNCcEdT3AJIlxexhQ2b061.YWMYwPm', 'pria', 'admin', 'aktif', 'semua', 'user.png'),
(5, 'Tutorial', 'tutorial@gmail.com', '$2y$10$OfpXyPu.hcJgtN9wIHkrn.K1KxVsZtEXpigmVAidIVoSMJjlwahPm', 'pria', 'operator', 'aktif', 'imb', 'user.png'),
(6, 'Viewer', 'viewer@gmail.com', '$2y$10$CA.MvRJ0k1GPOoLVqX/uXODx8rtJbRpxHl2a4CZeM51MS2KKmsT6G', 'pria', 'viewer', 'aktif', 'semua', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int NOT NULL,
  `jenis_nama` varchar(255) NOT NULL,
  `jenis_kelompok` enum('bangunan','konsultasi','status','permohonan','krk') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis_nama`, `jenis_kelompok`) VALUES
(10, 'Fungsi Usaha', 'bangunan'),
(11, 'Fungsi Sosial dan Budaya', 'bangunan'),
(12, 'Fungsi Hunian', 'bangunan'),
(13, 'Fungsi Campuran', 'bangunan'),
(14, 'Bangunan Gedung Kepentingan Umum', 'konsultasi'),
(15, 'Bangunan Gedung Eksisting (Administratif)', 'konsultasi'),
(16, 'Bangunan Fungsi Hunian dengan Kompleksitas Tidak Sederhana', 'konsultasi'),
(17, 'Bangunan Gedung Fungsi Hunian dengan Kompleksitas Sederhana', 'konsultasi'),
(18, 'Bangunan Gedung Kolektif', 'konsultasi'),
(19, 'Tidak Dilanjutkan', 'status'),
(20, 'Penugasan Inpeksi', 'status'),
(21, 'Pengambilan Dokumen', 'status'),
(22, 'Menunggu Pengambilan Izin', 'status'),
(23, 'Ruko', 'permohonan'),
(44, 'asd', 'konsultasi'),
(46, 'Tutorial', 'krk');

-- --------------------------------------------------------

--
-- Table structure for table `krk`
--

CREATE TABLE `krk` (
  `krk_id` int NOT NULL,
  `krk_pemohon` varchar(255) NOT NULL,
  `krk_suratmasuk` date NOT NULL,
  `krk_suratterima` date NOT NULL,
  `krk_permohonan` int NOT NULL,
  `krk_perihal` text NOT NULL,
  `krk_jalan` varchar(255) NOT NULL,
  `krk_desa` varchar(255) NOT NULL,
  `krk_kecamatan` varchar(255) NOT NULL,
  `krk_disposisi` text NOT NULL,
  `krk_screening` enum('y','n') NOT NULL DEFAULT 'n',
  `krk_surveyor` enum('y','n') NOT NULL DEFAULT 'n',
  `krk_production` enum('y','n') NOT NULL DEFAULT 'n',
  `krk_terbit` date NOT NULL,
  `krk_keterangan` text NOT NULL,
  `krk_nomor` varchar(255) NOT NULL,
  `krk_verifikasi` enum('y','n') NOT NULL DEFAULT 'n',
  `krk_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `krk`
--

INSERT INTO `krk` (`krk_id`, `krk_pemohon`, `krk_suratmasuk`, `krk_suratterima`, `krk_permohonan`, `krk_perihal`, `krk_jalan`, `krk_desa`, `krk_kecamatan`, `krk_disposisi`, `krk_screening`, `krk_surveyor`, `krk_production`, `krk_terbit`, `krk_keterangan`, `krk_nomor`, `krk_verifikasi`, `krk_status`) VALUES
(1, 'asdasdas', '2024-10-12', '2024-10-31', 10, 'asdasd', 'asdasd', 'Kec. Percut Sei Tuan', 'Kec. Sunggal', 'asdasd', 'y', 'y', 'n', '2024-11-01', 'asdasdasd', '1505624200  2/3', 'n', 46);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int NOT NULL,
  `log_user` int NOT NULL,
  `log_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_activity` enum('add','update','delete','login','etc') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `log_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_user`, `log_date`, `log_activity`, `log_detail`) VALUES
(1, 6, '2024-10-21 15:49:56', 'delete', 'Pengguna menghapus [data-bangunan] dengan [id-31]'),
(2, 1, '2024-10-21 15:50:57', 'login', 'User Login Success as [admin]'),
(3, 1, '2024-10-21 15:52:30', 'add', 'Menambahkan Pengguna baru [id-7]'),
(4, 1, '2024-10-21 15:59:04', 'delete', 'Admin menghapus [data-pengguna] dengan [id-7]'),
(5, 1, '2024-10-22 09:09:23', 'login', 'User Login Success as [admin]'),
(6, 1, '2024-10-22 10:24:58', 'delete', 'Pengguna menghapus [data-status] dengan [id-29]'),
(7, 1, '2024-10-22 10:32:22', 'add', 'Menambahkan Status PBG baru [id-37]'),
(8, 1, '2024-10-22 10:32:24', 'add', 'Menambahkan Status PBG baru [id-38]'),
(9, 1, '2024-10-22 10:32:26', 'add', 'Menambahkan Status PBG baru [id-39]'),
(10, 1, '2024-10-22 10:32:29', 'add', 'Menambahkan Status PBG baru [id-40]'),
(11, 1, '2024-10-22 10:32:30', 'add', 'Menambahkan Status PBG baru [id-41]'),
(12, 1, '2024-10-22 10:32:32', 'add', 'Menambahkan Status PBG baru [id-42]'),
(13, 1, '2024-10-22 10:32:35', 'add', 'Menambahkan Status PBG baru [id-43]'),
(14, 1, '2024-10-22 10:40:46', 'add', 'Menambahkan Pengguna baru [id-8]'),
(15, 1, '2024-10-22 10:43:03', 'delete', 'Admin menghapus [data-pengguna] dengan [id-8]'),
(16, 1, '2024-10-23 18:44:13', 'login', 'User Login Success as [admin]'),
(17, 1, '2024-10-23 19:18:37', 'add', 'Menambahkan Data PBG baru [id-4]'),
(18, 1, '2024-10-24 09:57:33', 'add', 'Menambahkan Data Pengawasan baru [id-5]'),
(19, 1, '2024-10-24 11:19:46', 'delete', 'Pengguna menghapus [data-status] dengan [id-42]'),
(20, 1, '2024-10-24 11:19:54', 'delete', 'Pengguna menghapus [data-status] dengan [id-43]'),
(21, 1, '2024-10-24 11:20:01', 'delete', 'Pengguna menghapus [data-status] dengan [id-37]'),
(22, 1, '2024-10-24 11:26:50', 'add', 'Menambahkan Data PBG baru [id-2]'),
(23, 1, '2024-10-24 12:32:07', 'delete', 'Pengguna menghapus [data-status] dengan [id-28]'),
(24, 1, '2024-10-24 12:32:11', 'delete', 'Pengguna menghapus [data-status] dengan [id-38]'),
(25, 1, '2024-10-24 12:32:16', 'delete', 'Pengguna menghapus [data-status] dengan [id-39]'),
(26, 1, '2024-10-24 12:32:20', 'delete', 'Pengguna menghapus [data-status] dengan [id-40]'),
(27, 1, '2024-10-24 12:32:24', 'delete', 'Pengguna menghapus [data-status] dengan [id-41]'),
(28, 1, '2024-10-25 10:50:58', 'login', 'User Login Success as [admin]'),
(29, 1, '2024-10-27 15:22:18', 'login', 'User Login Success as [admin]'),
(30, 1, '2024-10-27 15:55:57', 'add', 'Menambahkan Jenis Konsultasi baru [id-44]'),
(31, 1, '2024-10-27 15:58:06', 'add', 'Menambahkan Fungsi Bangunan baru [id-45]'),
(32, 1, '2024-10-27 15:58:10', 'delete', 'Pengguna menghapus [data-bangunan] dengan [id-45]'),
(33, 1, '2024-10-27 16:08:04', 'add', 'Menambahkan Status KRK baru [id-46]'),
(34, 1, '2024-10-28 09:34:46', 'login', 'User Login Success as [admin]'),
(35, 1, '2024-10-31 07:40:38', 'login', 'User Login Success as [admin]'),
(36, 1, '2024-10-31 08:12:08', 'login', 'User Login Success as [admin]'),
(37, 1, '2024-10-31 08:13:41', 'login', 'User Login Success as [admin]'),
(38, 1, '2024-10-31 08:52:30', 'login', 'User Login Success as [admin]'),
(39, 1, '2024-10-31 11:29:41', 'login', 'User Login Success as [admin]'),
(40, 1, '2024-10-31 22:01:08', 'login', 'User Login Success as [admin]'),
(41, 1, '2024-10-31 22:31:12', 'login', 'User Login Success as [admin]'),
(42, 1, '2024-10-31 22:31:17', 'login', 'User Login Success as [admin]'),
(43, 6, '2024-11-01 09:32:19', 'login', 'User Login Success as [viewer]'),
(44, 1, '2024-11-01 09:36:34', 'login', 'User Login Success as [admin]'),
(45, 1, '2024-11-01 09:39:32', 'login', 'User Login Success as [admin]'),
(46, 1, '2024-11-01 23:04:17', 'login', 'User Login Success as [admin]'),
(47, 1, '2024-11-02 14:33:05', 'login', 'User Login Success as [admin]'),
(48, 1, '2024-11-02 14:33:36', 'login', 'User Login Success as [admin]'),
(49, 1, '2024-11-02 14:34:02', 'login', 'User Login Success as [admin]'),
(50, 1, '2024-11-02 14:35:05', 'login', 'User Login Success as [admin]'),
(51, 1, '2024-11-02 14:35:16', 'login', 'User Login Success as [admin]'),
(52, 1, '2024-11-02 14:36:09', 'login', 'User Login Success as [admin]'),
(53, 1, '2024-11-02 17:15:51', 'login', 'User Login Success as [admin]'),
(54, 1, '2024-11-02 17:29:46', 'add', 'Menambahkan Data PBG baru [id-3]'),
(55, 1, '2024-11-03 01:51:01', 'login', 'User Login Success as [admin]'),
(56, 6, '2024-11-03 02:28:06', 'login', 'User Login Success as [viewer]'),
(57, 1, '2024-11-03 02:28:24', 'login', 'User Login Success as [admin]'),
(58, 6, '2024-11-03 02:28:44', 'login', 'User Login Success as [viewer]'),
(59, 6, '2024-11-03 02:31:29', 'login', 'User Login Success as [viewer]'),
(60, 1, '2024-11-03 02:38:18', 'login', 'User Login Success as [admin]'),
(61, 1, '2024-11-03 02:57:01', 'login', 'User Login Success as [admin]'),
(62, 1, '2024-11-03 14:00:52', 'login', 'User Login Success as [admin]'),
(63, 1, '2024-11-03 14:06:35', 'login', 'User Login Success as [admin]');

-- --------------------------------------------------------

--
-- Table structure for table `pbg`
--

CREATE TABLE `pbg` (
  `pbg_id` int NOT NULL,
  `pbg_konsultasi` int NOT NULL,
  `pbg_reg` varchar(255) NOT NULL,
  `pbg_pemilik` varchar(255) NOT NULL,
  `pbg_alamat` text NOT NULL,
  `pbg_telp` varchar(255) NOT NULL,
  `pbg_bangunan` text NOT NULL,
  `pbg_kecamatan` varchar(255) NOT NULL,
  `pbg_desa` varchar(255) NOT NULL,
  `pbg_fungsi` int NOT NULL,
  `pbg_tanggal` date NOT NULL,
  `pbg_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pbg`
--

INSERT INTO `pbg` (`pbg_id`, `pbg_konsultasi`, `pbg_reg`, `pbg_pemilik`, `pbg_alamat`, `pbg_telp`, `pbg_bangunan`, `pbg_kecamatan`, `pbg_desa`, `pbg_fungsi`, `pbg_tanggal`, `pbg_status`) VALUES
(2, 14, '2024-10-01', 'burhan', 'asdsadsadsad', '0', 'asdsadsad', 'Kec. Sunggal', 'Kec. Sunggal', 12, '2024-10-17', 19),
(3, 14, '2024-11-02', 'ASD', 'SAKD', '12321412', 'sdakjdw', 'dawjkasd', 'dsajkdw', 10, '2024-11-02', 21);

-- --------------------------------------------------------

--
-- Table structure for table `pengawasan`
--

CREATE TABLE `pengawasan` (
  `awas_id` int NOT NULL,
  `awas_tanggal` date NOT NULL,
  `awas_nosurat` varchar(255) NOT NULL,
  `awas_jenis` int NOT NULL,
  `awas_nama` varchar(255) NOT NULL,
  `awas_alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `awas_penilik` varchar(255) NOT NULL,
  `awas_perihal` text NOT NULL,
  `awas_kecamatan` varchar(255) NOT NULL,
  `awas_desa` varchar(255) NOT NULL,
  `awas_teguran` enum('Teguran 1','Teguran 2','Teguran 3') NOT NULL,
  `awas_keterangan` text NOT NULL,
  `awas_tindakan` text NOT NULL,
  `awas_hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengawasan`
--

INSERT INTO `pengawasan` (`awas_id`, `awas_tanggal`, `awas_nosurat`, `awas_jenis`, `awas_nama`, `awas_alamat`, `awas_penilik`, `awas_perihal`, `awas_kecamatan`, `awas_desa`, `awas_teguran`, `awas_keterangan`, `awas_tindakan`, `awas_hasil`) VALUES
(4, '2024-10-01', '600.1.5/007/DCKTR/DS/2024', 12, 'Dewi Wulansari', 'asdasdas', 'sulton', 'dasdada', 'Kec. Sunggal', 'Kec. Sunggal', 'Teguran 1', 'sffsdfsdfsd', 'sdfdfds', 'sfsdfsd'),
(5, '2024-10-17', '600.1.15/180.1/DCKTR/DS/2024', 11, 'Tutorial', 'sdasdasd', 'asdasdasd', 'asdasd', 'Kec. Percut Sei Tuan', 'Kec. Percut Sei Tuan', 'Teguran 1', 'asdsad', 'asdas', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `krk`
--
ALTER TABLE `krk`
  ADD PRIMARY KEY (`krk_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `pbg`
--
ALTER TABLE `pbg`
  ADD PRIMARY KEY (`pbg_id`);

--
-- Indexes for table `pengawasan`
--
ALTER TABLE `pengawasan`
  ADD PRIMARY KEY (`awas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `akun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `krk`
--
ALTER TABLE `krk`
  MODIFY `krk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pbg`
--
ALTER TABLE `pbg`
  MODIFY `pbg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengawasan`
--
ALTER TABLE `pengawasan`
  MODIFY `awas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
