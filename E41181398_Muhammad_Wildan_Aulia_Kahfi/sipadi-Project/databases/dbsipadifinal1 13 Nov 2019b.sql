-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 02:44 AM
-- Server version: 10.4.6-MariaDB
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
-- Database: `dbsipadifinal1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nik` varchar(128) NOT NULL,
  `nama_admin` varchar(256) NOT NULL,
  `email_admin` varchar(256) NOT NULL,
  `gambar_admin` varchar(256) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `admin_created` int(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tanggal_lahir` varchar(35) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nik`, `nama_admin`, `email_admin`, `gambar_admin`, `password_admin`, `admin_created`, `alamat`, `tanggal_lahir`, `level`) VALUES
('E41181398', 'Wildan', 'wildanmangli29@gmail.com', '5dc7c8eb6e88e.jpg', '$2y$10$vPIR7qEuJAT3BbFT9NFxBO5Xm1zz4AbLU4SLnkM0xlc0.mjTuhV9S', 1573374168, 'Banyuwangi', '01/01/2000', 2),
('E41181407', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5dcad406c0d93.jpg', '$2y$10$vPIR7qEuJAT3BbFT9NFxBO5Xm1zz4AbLU4SLnkM0xlc0.mjTuhV9S', 1572078167, 'Kediri Hiri Hiri', '01/07/1999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(256) NOT NULL,
  `nama_brg` varchar(256) NOT NULL,
  `id_ktg` int(11) NOT NULL,
  `harga_brg` int(128) NOT NULL,
  `gmbr_brg` varchar(256) NOT NULL,
  `deskripsi_brg` varchar(256) NOT NULL,
  `tgl_upload` int(11) NOT NULL,
  `brg_kadaluarsa` int(11) NOT NULL,
  `jml_stok_tersedia` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_brg`, `id_ktg`, `harga_brg`, `gmbr_brg`, `deskripsi_brg`, `tgl_upload`, `brg_kadaluarsa`, `jml_stok_tersedia`) VALUES
('IDB001', 'Mka', 1, 12000, 'coba.jpg', 'mantap', 12219, 219199, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtl_transaksi`
--

CREATE TABLE `dtl_transaksi` (
  `id_transaksi` varchar(256) NOT NULL,
  `id_barang` varchar(256) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `jml_dibeli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(128) NOT NULL,
  `nama_kategori` varchar(256) NOT NULL,
  `gmbr` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gmbr`) VALUES
('KTG1101', 'Bakterisida', '5dca25fed0a20.png'),
('KTG1102', 'Biostimulan', '5dca313c489e6.png');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(128) NOT NULL,
  `ongkir_kurir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `ongkir_kurir`) VALUES
(1, 'JNE OKE', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(256) NOT NULL,
  `email_pembeli` varchar(256) NOT NULL,
  `password_pembeli` varchar(256) NOT NULL,
  `nomor_hp` varchar(128) NOT NULL,
  `nik_pembeli` varchar(128) NOT NULL,
  `user_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `gambar_pembeli` varchar(256) NOT NULL,
  `gmbr_nik_pembeli` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token_admin`
--

CREATE TABLE `token_admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_admin`
--

INSERT INTO `token_admin` (`id`, `kode`, `email`) VALUES
(22, '15dcb5a4f2e6e5', 'wildanmangli29@gmail.com'),
(23, '15dcb5beeaa5f0', 'adsasdok@gmail.com'),
(25, '15dcb5f509a374', 'wildanmangli29@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(256) NOT NULL,
  `alamat_toko` varchar(256) NOT NULL,
  `deskripsi_toko` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(256) NOT NULL,
  `nik_admin` varchar(128) NOT NULL,
  `id_pembeli` varchar(128) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `alamat_kirim` varchar(256) NOT NULL,
  `tgl_kirim` varchar(128) NOT NULL,
  `kota_pembeli` varchar(128) NOT NULL,
  `ongkir_kurir` int(20) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `total_final` int(20) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `status_kirim` int(11) NOT NULL,
  `tgl_transaksi` varchar(128) NOT NULL,
  `bukti_transfer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ktg` (`id_ktg`);

--
-- Indexes for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_admin`
--
ALTER TABLE `token_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`,`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `token_admin`
--
ALTER TABLE `token_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
