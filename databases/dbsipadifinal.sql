-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 01:23 PM
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
-- Database: `dbsipadifinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(256) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(256) DEFAULT NULL,
  `GAMBAR_ADMIN` varchar(256) DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(256) DEFAULT NULL,
  `ADMIN_CREATED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `EMAIL_ADMIN`, `GAMBAR_ADMIN`, `PASSWORD_ADMIN`, `ADMIN_CREATED`) VALUES
(0, 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'default.jpg', '12345678', 212121),
(1, 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'default.jpg', '12345678', 1234566);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_BRG` varchar(256) DEFAULT NULL,
  `HARGA_BRG` int(11) DEFAULT NULL,
  `GAMBAR_BRG` varchar(256) DEFAULT NULL,
  `DESKRIPSI_BRG` varchar(256) DEFAULT NULL,
  `BARANG_ACTIVE` int(11) DEFAULT NULL,
  `JUMLAH_STOK_TERSEDIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BRG`, `HARGA_BRG`, `GAMBAR_BRG`, `DESKRIPSI_BRG`, `BARANG_ACTIVE`, `JUMLAH_STOK_TERSEDIA`) VALUES
(1, 1, 'Zephyr', 40000, 'default.jpg', 'Obat mantap untuk serangga', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `dtltransaksi`
--

CREATE TABLE `dtltransaksi` (
  `ID_TRANSAKSI` varchar(256) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `HARGA_SATUAN_BRG` int(11) DEFAULT NULL,
  `JUMLAH_UNIT_DIBELI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtltransaksi`
--

INSERT INTO `dtltransaksi` (`ID_TRANSAKSI`, `ID_BARANG`, `HARGA_SATUAN_BRG`, `JUMLAH_UNIT_DIBELI`) VALUES
('TR001190910', 1, 40000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Insektisida');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `ID_KURIR` int(11) NOT NULL,
  `NAMA_KURIR` varchar(256) DEFAULT NULL,
  `HARGA_ONGKIR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`ID_KURIR`, `NAMA_KURIR`, `HARGA_ONGKIR`) VALUES
(1, 'JNE OKE', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(256) DEFAULT NULL,
  `EMAIL_USER` varchar(256) DEFAULT NULL,
  `GAMBAR_USER` varchar(256) DEFAULT NULL,
  `PASSWORD_USER` varchar(256) DEFAULT NULL,
  `USER_CREATED` int(11) DEFAULT NULL,
  `NIK_OPERATOR` varchar(256) DEFAULT NULL,
  `GMBR_NIK_OPERATOR` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`ID_USER`, `NAMA_USER`, `EMAIL_USER`, `GAMBAR_USER`, `PASSWORD_USER`, `USER_CREATED`, `NIK_OPERATOR`, `GMBR_NIK_OPERATOR`) VALUES
(1, 'Loki', 'loki@gmail.com', 'default.jpg', '123123132', 123123123, '32132191231203312', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `ID_PEMBELI` int(11) NOT NULL,
  `NAMA_PEMBELI` varchar(256) DEFAULT NULL,
  `EMAIL_PEMBELI` varchar(256) DEFAULT NULL,
  `PASSWORD_PEMBELI` varchar(256) DEFAULT NULL,
  `NOMORHP` varchar(128) DEFAULT NULL,
  `GAMBAR_PEMBELI` varchar(256) DEFAULT NULL,
  `NIK_PEMBELI` varchar(256) DEFAULT NULL,
  `GMBR_NIK_PEMBELI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`ID_PEMBELI`, `NAMA_PEMBELI`, `EMAIL_PEMBELI`, `PASSWORD_PEMBELI`, `NOMORHP`, `GAMBAR_PEMBELI`, `NIK_PEMBELI`, `GMBR_NIK_PEMBELI`) VALUES
(1, 'joni', 'joni@gmail.com', '12312313', '081252223123', 'default.jpg', '123321919412390', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `ID_TOKO` int(11) NOT NULL,
  `NAMA_TOKO` varchar(256) DEFAULT NULL,
  `ALAMAT` varchar(256) DEFAULT NULL,
  `DESKRIPSI_TOKO` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`ID_TOKO`, `NAMA_TOKO`, `ALAMAT`, `DESKRIPSI_TOKO`) VALUES
(1, 'Toko Sumberdadi', 'Jl. Wolter Monginsidi No.89 langsepan . ajung. jember', 'Toko Menjual berbagai macam kebutuhan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `ID_TRANSAKSI` varchar(256) NOT NULL,
  `ID_KURIR` int(11) NOT NULL,
  `ID_TOKO` int(11) NOT NULL,
  `ID_PEMBELI` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ALAMAT_KIRIM` varchar(256) DEFAULT NULL,
  `TANGGAL_KIRIM` int(11) DEFAULT NULL,
  `KOTA_KIRIM` varchar(256) DEFAULT NULL,
  `ONGKIR_KURIR_TRANSAKSI` int(11) DEFAULT NULL,
  `TOTAL_HARGA` int(11) DEFAULT NULL,
  `GRAND_TOTAL` int(11) DEFAULT NULL,
  `STATUS_BAYAR` int(11) DEFAULT NULL,
  `STATUS_KIRIM` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` int(11) DEFAULT NULL,
  `BUKTI_TRANSFER` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`ID_TRANSAKSI`, `ID_KURIR`, `ID_TOKO`, `ID_PEMBELI`, `ID_USER`, `ALAMAT_KIRIM`, `TANGGAL_KIRIM`, `KOTA_KIRIM`, `ONGKIR_KURIR_TRANSAKSI`, `TOTAL_HARGA`, `GRAND_TOTAL`, `STATUS_BAYAR`, `STATUS_KIRIM`, `TANGGAL_TRANSAKSI`, `BUKTI_TRANSFER`) VALUES
('TR001190910', 1, 1, 1, 1, 'Jl. Wolter Monginsidi No.89 langsepan . ajung. jember', 1999, 'Kediri', 10000, 90000, 100000, 1, 1, 1999, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_TIAP_JENIS_BARANG_HANYA_MEMILIKI_1_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `dtltransaksi`
--
ALTER TABLE `dtltransaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`,`ID_BARANG`),
  ADD KEY `FK_TIAP_TRANSAKSI_DAPAT_MEMILIKI_LEBIH_DARI_1_BARANG2` (`ID_BARANG`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`ID_KURIR`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`ID_PEMBELI`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`ID_TOKO`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_1_OPERATOR_MENGOPERASIKAN_TRANSAKSI` (`ID_USER`),
  ADD KEY `FK_DALAM_1X_TRANSAKSI_HANYA_BISA_MENGGUNAKAN_1_JENIS_KURIR` (`ID_KURIR`),
  ADD KEY `FK_DIDALAM_1_TRANSAKSI_TERDAPAT_1_PEMBELI` (`ID_PEMBELI`),
  ADD KEY `FK_TIAP_TRANSAKSI_HANYA_BISA_MEMASUKKAN_1_TOKO_DI_TIAP_TRANSAKSI` (`ID_TOKO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_TIAP_JENIS_BARANG_HANYA_MEMILIKI_1_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `dtltransaksi`
--
ALTER TABLE `dtltransaksi`
  ADD CONSTRAINT `FK_TIAP_TRANSAKSI_DAPAT_MEMILIKI_LEBIH_DARI_1_BARANG` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi_penjualan` (`ID_TRANSAKSI`),
  ADD CONSTRAINT `FK_TIAP_TRANSAKSI_DAPAT_MEMILIKI_LEBIH_DARI_1_BARANG2` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `FK_1_OPERATOR_MENGOPERASIKAN_TRANSAKSI` FOREIGN KEY (`ID_USER`) REFERENCES `operator` (`ID_USER`),
  ADD CONSTRAINT `FK_DALAM_1X_TRANSAKSI_HANYA_BISA_MENGGUNAKAN_1_JENIS_KURIR` FOREIGN KEY (`ID_KURIR`) REFERENCES `kurir` (`ID_KURIR`),
  ADD CONSTRAINT `FK_DIDALAM_1_TRANSAKSI_TERDAPAT_1_PEMBELI` FOREIGN KEY (`ID_PEMBELI`) REFERENCES `pembeli` (`ID_PEMBELI`),
  ADD CONSTRAINT `FK_TIAP_TRANSAKSI_HANYA_BISA_MEMASUKKAN_1_TOKO_DI_TIAP_TRANSAKSI` FOREIGN KEY (`ID_TOKO`) REFERENCES `toko` (`ID_TOKO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
