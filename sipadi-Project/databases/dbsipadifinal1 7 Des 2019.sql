-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 09:07 AM
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
  `id_admin` varchar(32) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `gambar_admin` varchar(128) NOT NULL,
  `password_admin` varchar(128) NOT NULL,
  `admin_created` int(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `gambar_admin`, `password_admin`, `admin_created`, `alamat`, `level`) VALUES
('ADM1101', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5ddfb22e94b2a.jpg', '$2y$10$fv2nII7nXfB9cJ7SAv0LI.ZLz1u9aoFN9QIbHpz/0jbRw.efpiZYe', 1572078167, 'Kediri Hiri Hiriaehao', 1),
('ADM1102', 'Wildan', 'wildanmangli29@gmail.com', '5dc7c8eb6e88e.jpg', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1573374168, 'Banyuwangi', 2),
('ADM1103', 'Teddy', 'teddy@gmail.com', '5dd6349136a2b.png', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 11, 'Madura', 1),
('ADM1204', 'Myco Jihan', 'mycojihan28@gmail.com', '5deb59b8d2dce.jpg', '$2y$10$ww3hxGCTmfcB/GAZ0rWp/u6S/tzj33bG9LDxZsujybnygct10KgHS', 1575704985, 'jember hiri hiri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` varchar(32) NOT NULL,
  `nama_brg` varchar(64) NOT NULL,
  `id_ktg` varchar(32) NOT NULL,
  `gambar_brg` varchar(128) NOT NULL,
  `harga_brg` int(32) NOT NULL,
  `deskripsi_brg` varchar(128) NOT NULL,
  `tgl_upload` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `id_ktg`, `gambar_brg`, `harga_brg`, `deskripsi_brg`, `tgl_upload`, `is_active`) VALUES
('IDB1201', 'sample1', 'KTG1102', '5deb52f9d7310.jpg', 19000, 'oka', 1575703048, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtl_brg`
--

CREATE TABLE `dtl_brg` (
  `id_brg` varchar(32) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_exp` varchar(11) NOT NULL,
  `expired` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_brg`
--

INSERT INTO `dtl_brg` (`id_brg`, `stok`, `id_exp`, `expired`) VALUES
('IDB1201', 190, '1', '2021-02-02'),
('IDB1201', 100, '2', '2020-02-02'),
('IDB1201', 10, '3', '2019-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `dtl_transaksi`
--

CREATE TABLE `dtl_transaksi` (
  `id_tr` varchar(32) NOT NULL,
  `id_barang` varchar(32) NOT NULL,
  `no` int(11) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `jml_dibeli_tmp` int(10) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `dtl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `grosiran` AFTER UPDATE ON `dtl_transaksi` FOR EACH ROW BEGIN
UPDATE dtl_brg SET stok=stok-new.jumlah_beli
WHERE id_brg=new.id_barang
AND expired in (SELECT MIN(expired) FROM dtl_brg);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `id` int(11) NOT NULL,
  `expired` varchar(32) NOT NULL,
  `id_brg` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`id`, `expired`, `id_brg`) VALUES
(1, '2021-02-02', 'IDB1201'),
(2, '2020-02-02', 'IDB1201'),
(3, '2019-12-28', 'IDB1201');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(32) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL,
  `gmbr` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gmbr`) VALUES
('KTG1101', 'Bakterisida', '5dddc6cb0aa74.png'),
('KTG1102', 'ok', '5dddcc43d7044.png'),
('KTG1203', 'ZPT', '5de625f47f0c9.png'),
('KTG1204', 'Pupuk', '5de62615be59e.png'),
('KTG1205', 'Herbisida', '5de6262fe9eee.png');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(32) NOT NULL,
  `nama_kurir` varchar(128) NOT NULL,
  `kota_tujuan` varchar(32) NOT NULL,
  `ongkir_kurir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `kota_tujuan`, `ongkir_kurir`) VALUES
('IKR1101', 'JNE OKE', 'Bangkalan', 7000),
('IKR1102', 'JNE OKE', 'Banyuwangi ', 6000),
('IKR1103', 'JNE OKE ', 'Blitar', 7000),
('IKR1104', 'JNE OKE', 'Bondowoso', 6000),
('IKR1105', 'JNE OKE ', 'Bojonegoro', 6000),
('IKR1106', 'JNE OKE', 'Gresik', 7000),
('IKR1107', 'JNE OKE', 'Jombang', 7000),
('IKR1108', 'JNE OKE ', 'Kediri', 8000),
('IKR1109', 'JNE OKE ', 'Lamongan ', 7000),
('IKR1110', 'JNE OKE', 'Lumajang', 7000),
('IKR1111', 'JNE OKE ', 'Madiun', 8000),
('IKR1112', 'JNE OKE', 'Magetan', 7000),
('IKR1113', 'JNE OKE ', 'Malang', 7000),
('IKR1114', 'JNE OKE ', 'Mojokerto', 7000),
('IKR1115', 'JNE OKE', 'Nganjuk', 7000),
('IKR1116', 'JNE OKE ', 'Pacitan', 7000),
('IKR1117', 'JNE OKE ', 'Pamekasan', 7000),
('IKR1118', 'JNE OKE ', 'Pasuruan', 7000),
('IKR1119', 'JNE OKE ', 'Ponorogo', 7000),
('IKR1120', 'JNE OKE', 'Probolinggo ', 7000),
('IKR1121', 'JNE OKE', 'Sampang', 7000),
('IKR1122', 'JNE OKE', 'Sidoarjo', 8000),
('IKR1123', 'JNE OKE', 'Situbondo', 7000),
('IKR1124', 'JNE OKE', 'Sumenep', 11000),
('IKR1125', 'JNE OKE', 'Surabaya', 7000),
('IKR1126', 'JNE OKE ', 'Tuban', 7000),
('IKR1127', 'JNE OKE', 'Trenggalek', 7000),
('IKR1128', 'JNE OKE ', 'Tulungagung ', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(32) NOT NULL,
  `nama_pembeli` varchar(64) NOT NULL,
  `email_pembeli` varchar(64) NOT NULL,
  `password_pembeli` varchar(128) NOT NULL,
  `nomor_hp` varchar(32) NOT NULL,
  `nik_pembeli` varchar(32) NOT NULL,
  `user_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `gambar_pembeli` varchar(128) NOT NULL,
  `gmbr_nik_pembeli` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email_pembeli`, `password_pembeli`, `nomor_hp`, `nik_pembeli`, `user_created`, `is_active`, `gambar_pembeli`, `gmbr_nik_pembeli`) VALUES
('USER0121', 'ok', 'ok@gmail.com', '$2y$10$Y11TUGzTek6s5I0sfudb3u/L3Rq1CcDJxfrh1FU69nwe61MRdgPN2', '192', '12', 1, 1, 'ok.mal', 'ok.mal'),
('USER0122', 'irman', 'alfianrochmatul77@gmail.com', '$2y$10$Y11TUGzTek6s5I0sfudb3u/L3Rq1CcDJxfrh1FU69nwe61MRdgPN2', '081252223123', 'E41181407', 1575362211, 1, 'default.jpg', 'default.jpg'),
('USER0123', 'sample1', 'sample1@gmail.com', '$2y$10$4Liq60aofgstHZEftbDin.fEmigLbfWDKB9IK84qNd2qCphexdaN6', '123213', '123132', 1575362675, 0, '5de62073c4df7.jpg', '5de62073c4fac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `token_admin`
--

CREATE TABLE `token_admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_admin`
--

INSERT INTO `token_admin` (`id`, `kode`, `email`) VALUES
(22, '15dcb5a4f2e6e5', 'wildanmangli29@gmail.com'),
(23, '15dcb5beeaa5f0', 'adsasdok@gmail.com'),
(25, '15dcb5f509a374', 'wildanmangli29@gmail.com'),
(27, '15dd145507c5a5', 'alfianrochmatul77@gmail.com'),
(28, '15dd145735da95', 'alfianrochmatul77@gmail.com'),
(29, '15dd1457eb312f', 'alfianrochmatul77@gmail.com'),
(30, '15dd1459f8d4f2', 'alfianrochmatul77@gmail.com'),
(32, '15ddbe3dbc4a59', 'wildanmangli29@gmail.com'),
(33, '15ddf68a708a40', 'alfianrochmatul77@gmail.com'),
(34, '15ddf68b39eb48', 'alfianrochmatul77@gmail.com'),
(35, '15ddf69239153e', 'alfianrochmatul77@gmail.com'),
(36, '15ddf6b138de98', 'alfianrochmatul77@gmail.com'),
(38, '15ddf6c5eab731', 'alfianrochmatul77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `token_user`
--

CREATE TABLE `token_user` (
  `id` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_user`
--

INSERT INTO `token_user` (`id`, `kode`, `email`) VALUES
(1, '15de6222b7e857', 'wildan@gmail.com'),
(2, '15de6224529a8d', 'wildan@gmail.com'),
(3, '15de8b2b6bf4c0', 'alfianrochmatul77@gmail.com'),
(4, '15de8b2dfb8650', 'alfianrochmatul77@gmail.com'),
(5, '15de8b387f2669', 'alfianrochmatul77@gmail.com'),
(6, '15de8b396ae2ce', 'alfianrochmatul77@gmail.com'),
(7, '15de8b3e8bf9fb', 'alfianrochmatul77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(32) NOT NULL,
  `nama_toko` varchar(64) NOT NULL,
  `alamat_toko` varchar(64) NOT NULL,
  `gambar_sampul` varchar(128) NOT NULL,
  `deskripsi_toko` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `gambar_sampul`, `deskripsi_toko`) VALUES
('IDT001', 'SiPadi', 'Jember', '5ddf6e1ee7fc8.jpg', 'Menjual segala macam kebutuhaan pokoka');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(32) NOT NULL,
  `id_adm` varchar(32) NOT NULL,
  `id_pembeli` varchar(32) NOT NULL,
  `id_toko` varchar(32) NOT NULL,
  `alamat_kirim` varchar(128) NOT NULL,
  `tgl_kirim` int(32) NOT NULL,
  `id_kurer` varchar(32) NOT NULL,
  `ongkir_kurir` int(20) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `total_final` int(20) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `status_kirim` int(11) NOT NULL,
  `tgl_transaksi` varchar(32) NOT NULL,
  `bukti_transfer` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_ktg` (`id_ktg`);

--
-- Indexes for table `dtl_brg`
--
ALTER TABLE `dtl_brg`
  ADD KEY `id_brg` (`id_brg`);

--
-- Indexes for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD KEY `id_transaksi` (`id_tr`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD KEY `id_brg` (`id_brg`);

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
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `token_admin`
--
ALTER TABLE `token_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_user`
--
ALTER TABLE `token_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`,`id_toko`),
  ADD KEY `id_admin` (`id_adm`),
  ADD KEY `id_kurer` (`id_kurer`),
  ADD KEY `id_toko` (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `token_admin`
--
ALTER TABLE `token_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ktg`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `dtl_brg`
--
ALTER TABLE `dtl_brg`
  ADD CONSTRAINT `dtl_brg_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`);

--
-- Constraints for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD CONSTRAINT `dtl_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `dtl_transaksi_ibfk_2` FOREIGN KEY (`id_tr`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `expired`
--
ALTER TABLE `expired`
  ADD CONSTRAINT `expired_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_kurer`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_adm`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
