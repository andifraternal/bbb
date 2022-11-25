-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 04:42 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoha`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id_barang` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `harga_update` int(11) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_update`, `status_aktif`, `created_at`, `updated_at`) VALUES
('637f07299a0e1', '637ecf5f5a8e5', 'emboh', 3000, 1, '2022-11-24 12:54:49', '2022-11-24 12:54:49'),
('637f074aa4fa2', '637ecf5c565c9', 'fas', 6000, 1, '2022-11-24 12:55:22', '2022-11-24 12:55:22'),
('637f0787bd751', '637ecf5c565c9', 'vda', 300, 1, '2022-11-24 12:56:23', '2022-11-24 12:56:23'),
('637f07c01c888', '637ecf5f5a8e5', 'aa', 222, 1, '2022-11-24 12:57:20', '2022-11-24 12:57:20'),
('637f07cc31809', '637ecf5f5a8e5', 'aa', 222, 1, '2022-11-24 12:57:32', '2022-11-24 12:57:32'),
('637f07ee7d235', '637ecf5c565c9', 'dagf', 0, 1, '2022-11-24 12:58:06', '2022-11-24 12:58:06'),
('637f081060107', '637ecf5f5a8e5', 'fdafda', 0, 0, '2022-11-24 12:58:40', '2022-11-24 12:58:40'),
('637f0b8a3989e', '637ecf5f5a8e5', 'oke', 2000, 1, '2022-11-24 13:13:30', '2022-11-24 13:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang_log`
--

CREATE TABLE `master_barang_log` (
  `id_log` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang_log`
--

INSERT INTO `master_barang_log` (`id_log`, `id_barang`, `harga`, `created_at`) VALUES
('637f0729ab285', '637f07299a0e1', 3000, '2022-11-24 12:54:49'),
('637f074ab6836', '637f074aa4fa2', 6000, '2022-11-24 12:55:22'),
('637f0787cf3a9', '637f0787bd751', 300, '2022-11-24 12:56:23'),
('637f07c030bae', '637f07c01c888', 222, '2022-11-24 12:57:20'),
('637f07cc59d02', '637f07cc31809', 222, '2022-11-24 12:57:32'),
('637f07ee8e0a4', '637f07ee7d235', 0, '2022-11-24 12:58:06'),
('637f081073a17', '637f081060107', 0, '2022-11-24 12:58:40'),
('637f0b8a4bc94', '637f0b8a3989e', 60000, '2022-11-24 13:13:30'),
('637f0ef709ec6', '637f0b8a3989e', 2000, '2022-11-24 13:28:07'),
('637f107e89b84', '637f0b8a3989e', 2000, '2022-11-24 13:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori`
--

CREATE TABLE `master_kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_kategori`
--

INSERT INTO `master_kategori` (`id_kategori`, `nama_kategori`, `status_aktif`, `created_at`, `updated_at`) VALUES
('637ec5e70e149', 'oke', 0, '2022-11-24 08:16:23', '2022-11-24 08:16:23'),
('637ec60e38016', 'kjvsdkvdaj', 0, '2022-11-24 08:17:02', '2022-11-24 08:17:02'),
('637ec64734a7f', 'vdsvdbvd', 0, '2022-11-24 08:17:59', '2022-11-24 08:17:59'),
('637ece445324e', 'bvdbvdsbds', 0, '2022-11-24 08:52:04', '2022-11-24 08:52:04'),
('637ece586c2c9', 'mmmmm', 0, '2022-11-24 08:52:24', '2022-11-24 08:52:24'),
('637ecea7e5167', 'xxx', 0, '2022-11-24 08:53:43', '2022-11-24 08:53:43'),
('637eceac0a850', 'babifccccc', 0, '2022-11-24 08:53:48', '2022-11-24 08:53:48'),
('637ecf5997123', 'bvdbds', 0, '2022-11-24 08:56:41', '2022-11-24 08:56:41'),
('637ecf5c565c9', 'satu', 1, '2022-11-24 08:56:44', '2022-11-24 08:56:44'),
('637ecf5f5a8e5', 'dua', 1, '2022-11-24 08:56:47', '2022-11-24 08:56:47'),
('637ecf624ff22', 'dsbdsbds', 0, '2022-11-24 08:56:50', '2022-11-24 08:56:50'),
('637ee2b8a70fc', 'dggsgs', 0, '2022-11-24 10:19:20', '2022-11-24 10:19:20'),
('637ee2c97337d', 'bvdbvd', 0, '2022-11-24 10:19:37', '2022-11-24 10:19:37'),
('637ee3569c19c', 'gdsgds', 0, '2022-11-24 10:21:58', '2022-11-24 10:21:58'),
('637ee35a620df', 'aaaaabaas', 0, '2022-11-24 10:22:02', '2022-11-24 10:22:02'),
('637ee52f79111', 'aaads', 0, '2022-11-24 10:29:51', '2022-11-24 10:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tanggal_po` date NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `laba_rugi` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_master`
--

CREATE TABLE `transaksi_master` (
  `id_transaksi_master` varchar(200) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tanggal_po` date NOT NULL,
  `total_harga_beli` float NOT NULL,
  `total_harga_jual` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengeluaran`
--

CREATE TABLE `transaksi_pengeluaran` (
  `id_transaksi_pengeluaran` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `tanggal_po` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `master_barang_log`
--
ALTER TABLE `master_barang_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `master_kategori`
--
ALTER TABLE `master_kategori`
  ADD PRIMARY KEY (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
