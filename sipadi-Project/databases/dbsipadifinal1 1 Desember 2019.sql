-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 02:24 PM
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
('ADM1101', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5ddfb22e94b2a.jpg', '$2y$10$vnQx0meuFNxtNr9pu3rVQuEfIIO/nkXnA.oqPKKFPx.rusz3/hoCa', 1572078167, 'Kediri Hiri Hiriaeh', 1),
('ADM1102', 'Wildan', 'wildanmangli29@gmail.com', '5dc7c8eb6e88e.jpg', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1573374168, 'Banyuwangi', 2),
('ADM1103', 'Teddy', 'teddy@gmail.com', '5dd6349136a2b.png', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 11, 'Madura', 1),
('ADM1104', 'Myco', 'mycojihan@gmail.com', '5dd63499421b3.png', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1, 'Jember', 1),
('ADM1105', 'agoy', 'yoga@gmail.com', '5dd634aaa96b4.jpg', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1, 'Banyuwangi', 1),
('ADM1106', 'adsdsa', 'asd@gmail.com', '5dde4793cf764.png', '$2y$10$MueLfWJm2NLcF1KsfTXRDeBF64f5zWv/TByNnUPIclqI33IqM7YTm', 1574848380, 'asdoo', 2),
('ADM1107', 'okasd', 'oksad@gmail.com', '5dde5f0362980.png', '$2y$10$7g.Cu12X4XEj8KXoE6ZzSuFacA7T03D6KByuXRZQMFeMF0gAFFZsa', 1574854382, 'asodkok', 2),
('ADM1108', 'adminsample', 'ok@gmail.com', '5ddf6d3ed329b.jpg', '$2y$10$6XmdS1iFwKjT4RODsGDeL.mMsgcKjDGCkYN5Z0Bm5EGul6.4gCjEm', 1574923400, 'soadk', 2);

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
  `tgl_upload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `id_ktg`, `gambar_brg`, `harga_brg`, `deskripsi_brg`, `tgl_upload`) VALUES
('IDB1101', 'Pupuk Cair', 'KTG1101', '5ddfb26a12cd1.jpg', 19000, 'Pupuk mantap', 1574941290);

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
('IDB1101', 80, '1', '2019-11-29'),
('IDB1101', 100, '2', '2020-04-30');

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
-- Dumping data for table `dtl_transaksi`
--

INSERT INTO `dtl_transaksi` (`id_tr`, `id_barang`, `no`, `harga_satuan`, `jml_dibeli_tmp`, `jumlah_beli`) VALUES
('IDTR11271901', 'IDB1101', 1, 1200, 0, 1),
('IDTR11271902', 'IDB1102', 2, 121221, 0, 1),
('IDTR11271902', 'IDB1101', 3, 1200, 0, 12),
('IDTR11271902', 'IDB1101', 4, 1200, 0, 100),
('IDTR11271903', 'IDB1103', 5, 9000, 0, 10),
('IDTR11271903', 'IDB1101', 6, 1200, 0, 9),
('IDTR11271903', 'IDB1102', 7, 11111, 0, 5),
('IDTR11281904', 'IDB1101', 8, 1200, 0, 10),
('IDTR11281905', 'IDB1101', 9, 1200, 0, 120),
('IDTR11281905', 'IDB1102', 10, 11, 0, 11),
('IDTR11281906', 'IDB1102', 11, 11, 12, 0),
('IDTR11281906', 'IDB1103', 12, 12929, 11, 0),
('IDTR11281906', 'IDB1102', 13, 11, 12, 0),
('IDTR11281906', 'IDB1104', 14, 122121, 12, 0),
('IDTR11281906', 'IDB1102', 15, 11, 12, 0),
('IDTR11281906', 'IDB1104', 16, 122121, 12, 0),
('IDTR11281906', 'IDB1103', 17, 12929, 12, 0),
('IDTR11281906', 'IDB1102', 18, 11, 2, 0),
('IDTR11281906', 'IDB1104', 19, 122121, 1, 0),
('IDTR11281907', 'IDB1103', 20, 12929, 0, 12),
('IDTR11281907', 'IDB1102', 21, 11, 0, 1),
('IDTR11281907', 'IDB1103', 22, 12929, 0, 12),
('IDTR11281908', 'IDB1101', 23, 19000, 0, 10),
('IDTR11281909', 'IDB1101', 24, 19000, 6, 0);

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
(1, '2019-11-29', 'IDB1101'),
(2, '2020-04-30', 'IDB1101');

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
('KTG1101', 'Bakterisida', '5dd4f63d1b964.png'),
('KTG1102', 'ok', '5dd6c78812619.png');

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
('IDB001', 'ok', 'ok@gmail.com', '1', '192', '12', 1, 1, 'ok.mal', 'ok.mal');

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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_adm`, `id_pembeli`, `id_toko`, `alamat_kirim`, `tgl_kirim`, `id_kurer`, `ongkir_kurir`, `total_harga`, `total_final`, `status_bayar`, `status_kirim`, `tgl_transaksi`, `bukti_transfer`) VALUES
('IDTR11271901', 'ADM1101', 'IDB001', 'IDT001', 'asd', 1574839453, 'IKR1118', 7000, 122, 111, 1, 1, '1574839326', '5dde2456db63d.jpg'),
('IDTR11271902', 'ADM1101', 'IDB001', 'IDT001', 'asd', 1574925435, 'IKR1120', 0, 0, 248221, 1, 1, '1574847656', '5dde44d15ec9a.png'),
('IDTR11271903', 'ADM1101', 'IDB001', 'IDT001', 'tawangmangu no 35', 1574925439, 'IKR1106', 7000, 145555, 151000, 1, 1, '1574854436', '5dde60a2750f3.jpg'),
('IDTR11281904', 'ADM1101', 'IDB001', 'IDT001', 'ASDOK', 1574925441, 'IKR1105', 6000, 12000, 18000, 1, 1, '1574922327', '5ddf68743f487.jpg'),
('IDTR11281905', 'ADM1101', 'IDB001', 'IDT001', 'asd', 1574926270, 'IKR1105', 6000, 144121, 150121, 1, 1, '1574926196', '5ddf7791c1e54.jpg'),
('IDTR11281906', 'Belum Terkonfirmasi', 'IDB001', 'IDT001', 'asd', 0, 'IKR1118', 7000, 277291, 284291, 0, 0, '1574936447', '5ddf9f9a64509.png'),
('IDTR11281907', 'ADM1101', 'IDB001', 'IDT001', 'asd', 0, 'IKR1106', 7000, 310307, 317307, 1, 0, '1574936584', '5ddfa01e4d483.png'),
('IDTR11281908', 'ADM1101', 'IDB001', 'IDT001', 'anune', 1574941388, 'IKR1115', 7000, 190000, 197000, 1, 1, '1574941310', '5ddfb29901042.png'),
('IDTR11281909', 'Belum Terkonfirmasi', 'IDB001', 'IDT001', 'odko', 0, 'IKR1115', 7000, 114000, 121000, 0, 0, '1574941439', '5ddfb33f83e93.jpg');

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
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_kurer` (`id_kurer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `token_admin`
--
ALTER TABLE `token_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
