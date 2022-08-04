-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 06:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_berat` int(11) NOT NULL,
  `produk_subberat` int(11) NOT NULL,
  `produk_subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `produk_nama`, `produk_harga`, `produk_berat`, `produk_subberat`, `produk_subharga`) VALUES
(2, 1, 2, 1, '', 0, 0, 0, 0),
(3, 2, 4, 1, '', 0, 0, 0, 0),
(4, 0, 9, 2, '', 0, 0, 0, 0),
(5, 0, 7, 3, '', 0, 0, 0, 0),
(6, 0, 9, 2, '', 0, 0, 0, 0),
(7, 0, 7, 3, '', 0, 0, 0, 0),
(8, 11, 9, 2, '', 0, 0, 0, 0),
(9, 11, 7, 3, '', 0, 0, 0, 0),
(10, 12, 9, 2, '', 0, 0, 0, 0),
(11, 12, 7, 3, '', 0, 0, 0, 0),
(12, 13, 9, 1, '', 0, 0, 0, 0),
(13, 16, 9, 1, 'Camera', 1500000, 1000, 1000, 1500000),
(14, 17, 7, 1, 'Laptop', 1500000, 1000, 1000, 1500000),
(15, 18, 9, 1, 'Camera', 1500000, 1000, 1000, 1500000),
(16, 18, 7, 1, 'Laptop', 1500000, 1000, 1000, 1500000),
(17, 19, 7, 1, 'Laptop', 1500000, 1000, 1000, 1500000),
(18, 20, 9, 1, 'Camera', 1500000, 1000, 1000, 1500000),
(19, 21, 7, 2, 'Laptop', 1500000, 1000, 2000, 3000000),
(20, 21, 9, 2, 'Camera', 1500000, 1000, 2000, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Handphone'),
(2, 'Laptop'),
(3, 'Karpet'),
(4, 'Kemeja');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `ongkos`) VALUES
(1, 'Bondowoso', 19000),
(2, 'Jember', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat`) VALUES
(1, 'andekoclex@gmail.com', 'ande123', 'Andre', '089837462573', 'PDAM'),
(2, 'ganipras14@gmailcom', 'ganigani', 'Gani prasetyo', '087767852367', 'PDAM'),
(3, 'mushafiwahdi@gmail.com', 'muss', 'mushafi wahdi', '083847825225', 'Desa Bendelan Rt 10 Rw 02 kecamatan Binakal Kabupaten Bondowoso'),
(4, 'anjaymabar@gmail.com', '123123', 'anjay', '083847825225', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama_pembayar`, `bank`, `jumlah`, `tanggal`, `bukti_pembayaran`) VALUES
(7, 19, 'Mushafi Wahdi', 'BRI', 1515000, '2020-04-19', '20200419122207erd andre.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `ongkos`, `alamat_lengkap`, `kode_pos`, `status_pembelian`, `resi`) VALUES
(1, 2, 1, '2020-03-11', 1500000, '', 0, '', 0, 'pending', ''),
(2, 2, 1, '2020-03-04', 500000, '', 0, '', 0, 'pending', ''),
(4, 2, 2, '2020-04-18', 7515000, '', 0, '', 0, 'pending', ''),
(7, 2, 1, '2020-04-18', 7519000, '', 0, '', 0, 'pending', ''),
(8, 2, 1, '2020-04-18', 7519000, '', 0, '', 0, 'pending', ''),
(9, 2, 1, '2020-04-18', 7519000, '', 0, '', 0, 'pending', ''),
(10, 2, 0, '2020-04-18', 7500000, '', 0, '', 0, 'pending', ''),
(11, 2, 2, '2020-04-18', 7515000, '', 0, '', 0, 'pending', ''),
(12, 2, 1, '2020-04-18', 7519000, '', 0, '', 0, 'pending', ''),
(13, 2, 1, '2020-04-18', 1519000, '', 0, '', 0, 'pending', ''),
(14, 2, 2, '2020-04-18', 3015000, '', 0, '', 0, 'pending', ''),
(15, 2, 2, '2020-04-18', 1515000, '', 0, '', 0, 'pending', ''),
(16, 2, 2, '2020-04-18', 1515000, '', 0, '', 0, 'pending', ''),
(17, 2, 2, '2020-04-18', 1515000, 'Jember', 15000, '', 0, 'pending', ''),
(18, 2, 2, '2020-04-18', 3015000, 'Jember', 15000, '', 0, 'pending', ''),
(19, 3, 2, '2020-04-19', 1515000, 'Jember', 15000, '', 0, 'barang dikirim', '2891ABH'),
(20, 3, 1, '2020-04-19', 1519000, 'Bondowoso', 19000, 'Jlan tancak kembar desa bendelan Rt10 Rw02 kecamatan binakal kabupaten bondowoso', 122124, 'pending', ''),
(21, 3, 2, '2020-04-19', 6015000, 'Jember', 15000, 'desa bendelan', 123123, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(7, 2, 'Laptop', 1500000, 1000, 'laptop.jpg', 'Laptop ROG 		', 3),
(9, 2, 'Camera', 1500000, 1000, 'camera_01.jpg', 'asdasd', 3),
(10, 1, 'Samsung A3', 900000, 500, 'samsung.jpg', 'Barang Mulus	', 4),
(11, 2, 'Laptop Bagus', 12000000, 1000, 'laptop2.jpg', 'Laptop mahal	', 10),
(12, 2, 'Laptop ASUS', 15000000, 1000, 'laptop5.jpg', 'Laptop bagus sekali	', 20),
(13, 1, 'ASUS ROG', 10000000, 500, 'rog.jpg', 'Prosesor : Snapdragon 855+', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
