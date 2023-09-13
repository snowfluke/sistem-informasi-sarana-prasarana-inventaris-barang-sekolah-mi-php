-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2023 at 05:01 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aple7114_sarpras-mi-nurjalin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bangunan`
--

CREATE TABLE `tb_bangunan` (
  `id_bangunan` int(11) NOT NULL,
  `kode_bangunan` varchar(255) NOT NULL,
  `nama_bangunan` varchar(255) NOT NULL,
  `jml_lantai_bangunan` varchar(255) NOT NULL,
  `luas_bangunan` varchar(255) NOT NULL,
  `status_bangunan` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bangunan`
--

INSERT INTO `tb_bangunan` (`id_bangunan`, `kode_bangunan`, `nama_bangunan`, `jml_lantai_bangunan`, `luas_bangunan`, `status_bangunan`) VALUES
(1, '111233010037', 'MI Nurjalin Pesahangan', '2 lantai', '764 m2', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `jumlah_awal` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan_barang` varchar(255) NOT NULL,
  `tanggal_barang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_merek`, `id_kategori`, `id_ruangan`, `id_kondisi`, `jumlah_awal`, `nama_barang`, `keterangan_barang`, `tanggal_barang`) VALUES
(12, 10, 3, 11, 1, '33', 'Kursi ', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(13, 10, 3, 11, 1, '16', 'Meja', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(14, 10, 3, 11, 1, '3', 'Papan Tulis', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(15, 11, 2, 11, 1, '1', 'Kipas Angin', 'Milik Mi Nurjalin Pesahangan', '2023-09-15'),
(16, 12, 2, 11, 1, '1', 'Jam Dinding', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(17, 13, 2, 11, 1, '1', 'Lampu', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(18, 10, 7, 11, 1, '3', 'Sapu', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(19, 10, 8, 11, 1, '35', 'Foto dan Gambar', 'Milik Mi Nurjalin Pesahangan', '2023-08-15'),
(20, 10, 3, 12, 1, '22', 'Kursi ', 'Milik Mi Nurjalin Pesahangan', '2023-09-17'),
(21, 10, 3, 12, 1, '21', 'Meja ', 'Milik Mi Nurjalin Pesahangan', '2023-08-17'),
(22, 10, 3, 12, 1, '1', 'Papan Tulis ', 'Milik Mi Nurjalin Pesahangan', '2023-09-17'),
(23, 11, 2, 12, 1, '1', 'Kipas Angin ', 'Milik Mi Nurjalin Pesahangan', '2023-09-17'),
(24, 12, 2, 12, 1, '1', 'Jam Dinding ', 'Milik Mi Nurjalin Pesahangan', '2023-08-17'),
(25, 10, 8, 12, 1, '30', 'Foto dan Gambar ', 'Milik Mi Nurjalin Pesahangan', '2023-08-17'),
(26, 10, 3, 12, 1, '1', 'Lemari ', 'Milik MI Nurjalin Pesahangan', '2023-08-17'),
(27, 10, 3, 12, 1, '1', 'Cermin ', 'Milik Mi Nurjalin Pesahangan', '2023-08-17'),
(28, 10, 7, 12, 1, '4', 'Sapu ', 'Milik MI Nurjalin Pesahangan', '2023-08-17'),
(29, 10, 3, 13, 1, '29', 'Kursi ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(30, 10, 3, 13, 1, '15', 'Meja', 'Milik MI Nurjalin Pesahangan', '2023-09-19'),
(31, 10, 3, 13, 1, '2', 'Papan Tulis', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(32, 9, 4, 13, 1, '4', 'Spidol', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(33, 11, 2, 13, 1, '1', 'Kipas Angin', 'Milik MI Nurjalin Pesahangan', '2023-09-19'),
(34, 12, 2, 13, 1, '1', 'Lampu ', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(35, 13, 2, 13, 1, '1', 'Jam Dinding', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(36, 10, 4, 13, 1, '2', 'Penghapus ', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(37, 10, 3, 13, 1, '1', 'lemari', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(38, 10, 8, 13, 1, '3', 'Foto', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(39, 10, 3, 13, 1, '1', 'Cermin', 'Milik MI Nurjalin Pesahangan', '2023-08-19'),
(40, 10, 3, 14, 1, '15', 'Meja', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(41, 10, 3, 14, 1, '20', 'kursi', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(42, 10, 4, 14, 1, '2', 'Papan Tulis', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(43, 10, 2, 14, 1, '1', 'Kipas Angin', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(44, 10, 2, 14, 1, '1', 'Lampu', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(45, 13, 2, 14, 1, '1', 'Jam Dinding', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(46, 10, 8, 14, 1, '15', 'Foto dan Gambar', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(47, 12, 2, 14, 1, '1', 'Jam Dinding', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(48, 10, 4, 14, 1, '3', 'Sapu', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(49, 10, 4, 14, 1, '3', 'Spidol', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(50, 10, 4, 14, 1, '1', 'Penghapus', 'Milik MI Nurjalin Pesahangan', '2023-08-20'),
(51, 10, 3, 15, 1, '19', 'Kursi', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(52, 10, 3, 15, 1, '20', 'Meja', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(53, 11, 2, 15, 1, '1', 'Kipas Angin', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(54, 11, 2, 15, 1, '1', 'Lemari', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(55, 10, 4, 15, 1, '3', 'Papan Tulis', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(56, 10, 8, 15, 1, '10', 'Foto dan Gambar', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(57, 9, 4, 15, 1, '6', 'Spidol', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(58, 10, 7, 15, 1, '4', 'Sapu ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(59, 10, 7, 15, 1, '1', 'Tempat Sampah', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(60, 10, 3, 16, 1, '26', 'Kursi', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(61, 10, 3, 16, 1, '16', 'Meja', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(62, 12, 2, 16, 0, '1', 'Jam Dinding', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(63, 10, 4, 16, 1, '2', 'Papan Tulis', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(64, 11, 2, 16, 1, '1', 'Kipas Angin ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(65, 10, 2, 16, 1, '4', 'Foto dan Gambar', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(66, 9, 4, 16, 1, '3', 'Spidol', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(67, 10, 4, 16, 1, '1', 'Penghapus ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(68, 10, 3, 16, 1, '1', 'Rak Sepatu', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(69, 10, 7, 16, 1, '1', 'Tempat Sampah', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(70, 10, 2, 16, 1, '1', 'Lampu', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(71, 10, 3, 16, 1, '1', 'Lemari', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(72, 7, 2, 17, 1, '2', 'Printer', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(73, 10, 3, 17, 1, '11', 'Kursi', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(74, 10, 3, 17, 1, '6', 'Meja', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(75, 10, 3, 17, 1, '5', 'Lemari ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(76, 13, 2, 17, 1, '1', 'Lampu', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(77, 11, 2, 17, 1, '2', 'Kipas Angin', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(78, 14, 2, 17, 1, '1', 'TV', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(79, 15, 2, 17, 1, '1', 'Komputer', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(80, 10, 3, 17, 1, '2', 'Papan Tulis', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(81, 16, 2, 17, 1, '1', 'Spiker', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(82, 7, 2, 17, 1, '1', 'Proyektor', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(83, 10, 3, 17, 1, '4', 'Foto ', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(84, 10, 3, 17, 1, '1', 'Cermin', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(85, 10, 3, 17, 1, '5', 'Bagan struktur', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(86, 12, 2, 17, 1, '1', 'Jam Dinding', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(87, 13, 2, 18, 1, '1', 'lampu', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(88, 17, 10, 17, 1, '4', 'Bola Voly', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(89, 10, 11, 19, 1, '30', 'Alat drumband', 'Milik MI Nurjalin Pesahangan', '2023-09-03'),
(92, 10, 3, 15, 3, '9', 'kursi', 'Jatuh Dari lantai 15', '2023-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(2, 'Alat Elektronik', 'barang barang eletronik'),
(3, 'Mebel', 'barang yang terbuat dari kayu'),
(4, 'Alat Tulis', 'alat-alat untuk menulis'),
(7, 'Alat Kebersihan', 'barang yang digunakan untuk bersih-bersih'),
(8, 'Hiasan Kelas', 'barang barang untuk hiasan kelas'),
(9, 'Alat Laboratorium / UKS', 'barang barang yang ada di UKS'),
(10, 'Alat Olahraga', 'alat alat untuk keperluan olahraga'),
(11, 'Alat Musik', 'alat untuk pentas musik'),
(13, 'Alat  Praktek', 'alat untuk praktek');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `nama_kondisi`, `keterangan`) VALUES
(1, 'Baik', 'Barang bagus'),
(2, 'Rusak Ringan', 'barang barang rusak namun masih bisa dipake'),
(3, 'Rusak Berat', 'barang tidak dapat dipakai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahan`
--

CREATE TABLE `tb_lahan` (
  `id_lahan` int(11) NOT NULL,
  `nama_lahan` varchar(255) NOT NULL,
  `no_sert_lahan` varchar(255) NOT NULL,
  `luas_lahan` varchar(255) NOT NULL,
  `status_lahan` enum('Wakaf','Milik Sendiri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `nama_lahan`, `no_sert_lahan`, `luas_lahan`, `status_lahan`) VALUES
(2, 'MI Nurjalin Pesahangan', '047/BANSM-JTGSK/XII/2018', '1313,5 m2', 'Milik Sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merek`
--

CREATE TABLE `tb_merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_merek`
--

INSERT INTO `tb_merek` (`id_merek`, `nama_merek`, `keterangan`) VALUES
(7, 'Epson', 'merek printer'),
(9, 'Kenko', 'merek spidol'),
(10, 'Tidak Bermerek', 'tidak ada merek barang'),
(11, 'Cosmos', 'merek kipas angin'),
(12, 'Quartz', 'merek jam dinding'),
(13, 'Philip', 'merek lampu'),
(14, 'Lg', 'Merek tv'),
(15, 'Accer', 'merek komputer'),
(16, 'Advance', 'merek spiker'),
(17, 'Mikasa', 'merek bola voly');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `keterangan`) VALUES
(11, 'Kelas 1', 'ruangan untuk siswa kelas 1'),
(12, 'Kelas 2', 'ruangan untuk siswa kelas 2'),
(13, 'Kelas 3', 'ruangan untuk siswa kelas 3'),
(14, 'Kelas 4', 'ruangan untuk siswa kelas 4'),
(15, 'Kelas 5', 'ruangan untuk siswa kelas 5'),
(16, 'Kelas 6', 'ruangan untuk siswa kelas 6'),
(17, 'Guru', 'untuk ruangan khusus guru'),
(18, 'UKS / Lab', 'ruangan untuk laboratorium dan uks'),
(19, 'Gudang', 'Alat alat sarana dan prasarana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jenis_transaksi` enum('masuk','keluar','pinjam') NOT NULL,
  `status` enum('belum','selesai') NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_barang`, `jenis_transaksi`, `status`, `jumlah`, `tanggal`, `keterangan_transaksi`) VALUES
(34, 89, 'masuk', 'selesai', '20', '2023-07-01', 'Pembelian baru'),
(35, 13, 'masuk', 'selesai', '12', '2023-07-12', 'Pembelian baru'),
(36, 13, 'keluar', 'selesai', '5', '2023-08-03', 'barang tidak bisa dipakai karena rusak'),
(37, 72, 'pinjam', 'selesai', '1', '2023-08-17', 'Di Pinjam oleh bapak nur salim'),
(39, 12, 'masuk', 'selesai', '15', '2023-08-30', 'Barang ini baru'),
(40, 17, 'masuk', 'selesai', '3', '2023-08-30', 'Beli baru'),
(42, 21, 'keluar', 'selesai', '10', '2023-08-30', 'rusak berat'),
(43, 27, 'masuk', 'selesai', '1', '2023-09-03', 'Pembelian baru'),
(44, 36, 'masuk', 'selesai', '2', '2023-09-04', 'beli baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `no_hp_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_user` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `no_hp_user`, `username`, `password`, `role_user`) VALUES
(2, 'admin', '123456789', 'admin', 'nimda', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bangunan`
--
ALTER TABLE `tb_bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD PRIMARY KEY (`id_lahan`);

--
-- Indexes for table `tb_merek`
--
ALTER TABLE `tb_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bangunan`
--
ALTER TABLE `tb_bangunan`
  MODIFY `id_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_merek`
--
ALTER TABLE `tb_merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
