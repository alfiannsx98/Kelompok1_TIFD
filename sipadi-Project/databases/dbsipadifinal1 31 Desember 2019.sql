-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 08:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
('ADM1101', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5ddfb22e94b2a.jpg', '$2y$10$/HO3rT68PSi.UFrYvyaw0uRl47P5dyWJI.OzpjQDqJ7gqyV8k/cT2', 1572078167, 'Kediri Hiri Hiriaehao', 2),
('ADM1102', 'Wildan', 'wildanmangli29@gmail.com', '5debd4caa26a9.jpg', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1573374168, 'Banyuwangi', 1),
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
('IDB211201', 'Belawan 365 EC 250 ml', 'KTG1204', '5dfdb1b359509.png', 200000, 'Berguna untuk mengendalikan hama penggerek polong (Maruca tetulalis) pada tanaman Kacang Panjang.', 1576907187, 0),
('IDB2112010', 'Stamycin 50 gram ', 'KTG1101', '5dfdf93e055ec.png', 45000, 'STAMYCIN adalah Bakterisida Sistemik untuk mengendalikan hama LAYU , BERCAK DAUN, BUSUK BARANG pada tanaman CABE, PADI, TOMAT, T', 1576925502, 0),
('IDB2112011', 'Bactocyn 150 AL 200 gram', 'KTG1101', '5dfdfa46dd4fd.png', 60000, 'Obat multi fungsi untuk mengobati hama bakteri dan jamur/fungi pada tanaman', 1576925766, 0),
('IDB2112012', 'Zephyr 80 WP 250 gram', 'KTG1101', '5dfe1626c665f.png', 55000, 'Mempunyai kemampuan berspektrum luas cepat dalam pengendalian dan melindungi penyakit tanaman\r\nZEPHYR 80WP untuk mengatasi Penya', 1576932902, 0),
('IDB2112013', 'Clearopt 20 SC 250 ml', 'KTG1101', '5dfe175cd3660.png', 50000, 'CLEAROPT 20 SC merupakan bakterisida yang sangat efektif mengendalikan beberapa penyakit tular tanah baik yang disebabkan oleh b', 1576933212, 0),
('IDB2112014', 'Radix 2000 100 ml', 'KTG1202', '5dfe17eab60d1.png', 50000, 'RADIX menghasilkan efek yang cepat untuk memacu perakaran tanaman, pertumbuhan dan pembungaan, pembuahan dan pengumbian.', 1576933354, 0),
('IDB2112015', 'Dekamon 22,43 L 500 ml', 'KTG1202', '5dfe18fb3a668.png', 52000, ' DEKAMON Zat Pengatur Tumbuh Tanaman', 1576933627, 0),
('IDB2112016', 'Topshot 6000 250 ml', 'KTG1206', '5dfe19879a64d.png', 89000, 'Herbisida sistemik purna tumbuh berbentuk larutan dalam minyak untuk mengendalikan gulma berdaun sempit, gulma berdaun lebar, da', 1576933767, 0),
('IDB2112017', 'Nomine 103 OF 250 ml', 'KTG1206', '5dfe1b4d890b4.png', 188000, 'Herbisida ini sangat aman untuk tanaman padi, beberapa testimoni dari petani mengindikasikan bahwa padi kurang mengalami stress ', 1576934221, 0),
('IDB2112019', 'Pamungkas 490 SL 250 ml', 'KTG1206', '5dfe1d7b78899.png', 22000, 'Herbisida sistemik purna tumbuh yang berkerja sampai ke akar untuk mematikan gulma berbahan aktif IPA Glifosat 490 SL', 1576934779, 0),
('IDB211202', 'Columbus 600 EC 500 ml', 'KTG1204', '5dfdb75e9f653.png', 50000, 'Berguna untuk mengendalikan hama penggulung daun Lamprosema indicata pada budidaya tanaman kedelai.', 1576908638, 0),
('IDB2112020', 'Bioleaf 450 ml', 'KTG1205', '5dfe1e5ba0e25.png', 50000, 'pupuk semi organik yg lengkap unsur makro dan mikro yg baik untuk semua tanaman efek daun hijau mengkilap dan segar untuk perawa', 1576935003, 0),
('IDB211203', 'Hokitan 500 SL 500 ml', 'KTG1204', '5dfdf3acc525e.png', 45000, 'diperuntukkan untuk hama padi seperti kelompok pengisap batang/pelepah daun seperti wereng coklat, penggerek batang, dan wereng ', 1576924076, 0),
('IDB211204', 'Artos 100 SL 500 ml ', 'KTG1204', '5dfdf46fe96aa.png', 130000, 'Untuk memenuhi kebutuhan petani dalam mengatasi permasalahan WERENG dan menjadi solusi terbaik bagi para petani.', 1576924271, 0),
('IDB211205', 'Dafat 400 SL 200 ml', 'KTG1204', '5dfdf559476c7.png', 55000, ' Berguna untuk mengendalikan hama ulat grayak pada tanaman bawang merah.', 1576924505, 0),
('IDB211206', 'Murtox 520 SC 250 ml', 'KTG1203', '5dfdf61f3c198.png', 50000, 'Beguna untuk mengendalikan penyakit pada tanaman padi, bawang merah, cabai dll.', 1576924703, 0),
('IDB211207', 'Rolizol 250 EC 250 ml', 'KTG1203', '5dfdf75f0bc4c.png', 110000, 'Dapat diemulsikan untuk tanamanPadi sawah :penyakit hawar daun Rhizoctonia solani, penyakit bercak daun Cercospora janseana', 1576925023, 0),
('IDB211208', 'Vigold-T 480 SC 250 ml', 'KTG1203', '5dfdf7fa41ccd.png', 205000, 'Fungisida dengan bahan aktif ganda yaitu : Fluokastrobin 200 g/l dan Tebukonazol 277 g/l,\r\nMenggunakan teknologi xylem protect y', 1576925178, 0),
('IDB211209', 'Nazole 50 SC 250 ml', 'KTG1203', '5dfdf89e3bcbf.png', 50000, 'Untuk Mengendalikan Penyakit Antraknosa Collectotrichum Capsici Dan Penyakit Bercak Dau Cercospora Capisci Pada Tanaman Cabai.', 1576925342, 0),
('IDB2312021', 'Agrophos 500 ML', 'KTG1205', '5e006583ed404.png', 58000, 'Agrophos adalah pupuk phospat murni dalam bentuk ionik, cepat tersedia bagi tanaman untuk mencukupi kebutuhan unsur (P) dalam wa', 1577084291, 0),
('IDB2312022', 'Pupuk Fast Tonic', 'KTG1205', '5e0066dd482c9.png', 55000, 'Fast Tonik Pupuk Pelengkap Cair Khusus mengandung unsur hara utama N (Nitrogen), P (Phospat) dan K (Kalium) yang dilengkapi deng', 1577084637, 0),
('IDB2312023', 'Turmadan 328SL 1liter', 'KTG1206', '5e00762b7dc18.png', 65000, 'TURMADAN 328 SL* (Umum)\r\nparakuat diklorida (paraquat dichloride) : 328 g/l\r\nsetara dengan ion parakuat (paraquat ion active equ', 1577088555, 0),
('IDB2312024', 'Multi Flora 1000 ML', 'KTG1205', '5e007852a6acf.png', 15000, 'Pupuk multi flora adalah pupuk untuk merangsang pertumbuhan dan kesuburan tanaman, merangsang pembuahan, meningkatkan kualitas h', 1577089106, 0),
('IDB2312025', 'Perekat Golten 500 ML', 'KTG1208', '5e00793eb61f3.png', 11000, 'erekat perata Pestisida GOLTEN\r\nPerekat pestisida tersedia kemasan 500 ml', 1577089342, 0),
('IDB2312026', 'Perekat Penetran 100 ML', 'KTG1208', '5e0079a822fbe.png', 60000, 'enembus SUPER Pendongkrak Daya Bunuh Fungisida. FUNGICIDE BOOSTER merupakan double penetrant yang bekerja membawa bahan aktif fu', 1577089448, 0),
('IDB2312027', 'Cap Sebelas Natural 100 Gram', 'KTG1207', '5e0070f8b198f.png', 35000, 'Cocok untuk dataran rendah sampai tinggi. Potensi hasil sangat tinggi 1 â€“ 1,2 kilogram. Percabangan banyak dan produktif. Bung', 1577087224, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(32) NOT NULL,
  `id_users` varchar(32) NOT NULL,
  `id_barangs` varchar(32) NOT NULL,
  `qty_dibeli` int(11) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `tgl_transaksi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_users`, `id_barangs`, `qty_dibeli`, `subtotal`, `tgl_transaksi`) VALUES
('1', 'USER0122', 'IDB2112012', 9, 495000, '1577509714');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pesan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('IDB1201', 30, '1', '2020-12-07'),
('IDB1202', 30, '2', '2020-12-08'),
('IDB1201', 30, '1', '2020-12-07'),
('IDB1202', 30, '2', '2020-12-08'),
('IDB211201', 15, '5', '2020-06-09'),
('IDB211202', 15, '6', '2020-01-10'),
('IDB211203', 15, '7', '2020-02-18'),
('IDB211204', 15, '8', '2020-02-14'),
('IDB211205', 20, '9', '2020-02-06'),
('IDB211206', 15, '10', '2020-03-03'),
('IDB211207', 15, '11', '2020-07-09'),
('IDB211208', 20, '12', '2020-06-25'),
('IDB211209', 20, '13', '2020-04-10'),
('IDB2112010', 20, '14', '2020-06-16'),
('IDB2112011', 20, '15', '2020-06-12'),
('IDB2112012', 20, '16', '2020-06-05'),
('IDB2112013', 20, '17', '2020-06-12'),
('IDB2112014', 20, '18', '2020-07-18'),
('IDB2112015', 20, '19', '2020-08-17'),
('IDB2112016', 20, '20', '2020-07-13'),
('IDB2112017', 20, '21', '2020-07-20'),
('IDB2112019', 20, '23', '2020-07-06'),
('IDB2112020', 20, '24', '2020-07-12'),
('IDB2312021', 20, '25', '2020-06-18'),
('IDB2312022', 20, '26', '2020-06-23'),
('IDB2312027', 20, '31', '2020-05-20'),
('IDB2312023', 20, '27', '2020-06-24'),
('IDB2312024', 20, '28', '2020-05-12'),
('IDB2312025', 20, '29', '2020-04-23'),
('IDB2312026', 20, '30', '2020-05-21'),
('IDB2312027', 20, '31', '2020-05-27'),
('IDB2312027', 20, '32', '2020-06-17'),
('IDB2312027', 20, '33', '2020-05-22'),
('IDB2312027', 20, '34', '2020-05-22'),
('IDB2312027', 20, '35', '2020-06-24');

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
('IDTR12231901', 'IDB2112011', 1, 60000, 0, 1),
('IDTR12231901', 'IDB211209', 2, 50000, 0, 2),
('IDTR12231902', 'IDB2112012', 3, 55000, 0, 12),
('IDTR12231902', 'IDB2112019', 4, 22000, 0, 1),
('IDTR12251903', 'IDB211207', 5, 110000, 0, 23),
('IDTR12251903', 'IDB2312024', 6, 15000, 0, 3),
('IDTR12261904', 'IDB2112015', 7, 52000, 0, 1),
('IDTR12261905', 'IDB2312023', 8, 65000, 0, 11),
('IDTR12261906', 'IDB211203', 9, 45000, 0, 1),
('IDTR12261907', 'IDB2112012', 10, 55000, 0, 1),
('IDTR12271908', 'IDB211203', 11, 45000, 12, 0),
('IDTR12271908', 'IDB2312027', 12, 35000, 2, 0);

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
(1, '2020-12-07', 'IDB1201'),
(2, '2020-12-08', 'IDB1202'),
(1, '2020-12-07', 'IDB1201'),
(2, '2020-12-08', 'IDB1202'),
(5, '2019-02-07', 'IDB211201'),
(6, '2020-01-10', 'IDB211202'),
(7, '2020-02-18', 'IDB211203'),
(8, '2020-02-14', 'IDB211204'),
(9, '2020-02-06', 'IDB211205'),
(10, '2020-03-03', 'IDB211206'),
(11, '2020-07-09', 'IDB211207'),
(12, '2020-06-25', 'IDB211208'),
(13, '2020-04-10', 'IDB211209'),
(14, '2020-06-16', 'IDB2112010'),
(15, '2020-06-12', 'IDB2112011'),
(16, '2020-06-05', 'IDB2112012'),
(17, '2020-06-12', 'IDB2112013'),
(18, '2020-07-18', 'IDB2112014'),
(19, '2020-08-17', 'IDB2112015'),
(20, '2020-07-13', 'IDB2112016'),
(21, '2020-07-20', 'IDB2112017'),
(23, '2020-07-06', 'IDB2112019'),
(24, '2020-07-12', 'IDB2112020'),
(25, '2020-06-18', 'IDB2312021'),
(26, '2020-06-23', 'IDB2312022'),
(31, '2020-05-20', 'IDB2312027'),
(27, '2020-06-24', 'IDB2312023'),
(28, '2020-05-12', 'IDB2312024'),
(29, '2020-04-23', 'IDB2312025'),
(30, '2020-05-21', 'IDB2312026'),
(31, '2020-05-27', 'IDB2312027'),
(32, '2020-06-17', 'IDB2312027'),
(33, '2020-05-22', 'IDB2312027'),
(34, '2020-05-22', 'IDB2312027'),
(35, '2020-06-24', 'IDB2312027');

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
('KTG1101', 'Bakterisida', '5df03d0ad68cf.png'),
('KTG1202', 'ZPT', '5deb916ca895f.png'),
('KTG1203', 'Fungisida', '5debcf483b771.png'),
('KTG1204', 'Insektisida', '5debcf7be2692.png'),
('KTG1205', 'Pupuk', '5debcfc81cef8.png'),
('KTG1206', 'Herbisida', '5dfd9c0623879.png'),
('KTG1207', 'Benih', '5dfd9c29b29ac.png'),
('KTG1208', 'Perekat', '5dfd9c4ca5aa3.png'),
('KTG1209', 'Biostimulan', '5dfd9c603eaa7.png');

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
('IKR1128', 'JNE OKE ', 'Tulungagung ', 7000),
('IKR1129', 'JNE OKE', 'Jember', 7000);

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
('USER0122', 'irman', 'alfianrochmatul77@gmail.com', '$2y$10$xyCOCwRIf4Df/54qkISpgehzUDdAgylH4DKshm3Z0OdDUt/JY.qe6', '081252223123', 'E41181407', 1575362211, 1, 'default.jpg', 'default.jpg'),
('USER0123', 'sample1', 'sample1@gmail.com', '$2y$10$4Liq60aofgstHZEftbDin.fEmigLbfWDKB9IK84qNd2qCphexdaN6', '123213', '123132', 1575362675, 0, '5de62073c4df7.jpg', '5de62073c4fac.jpg'),
('USER0124', 'Agoy', 'ichayoga1@gmail.com', '$2y$10$pouJlUByXCZGX0QDTgjoduY4f.XhtdCCBzEywqM9WIMHcCt1GZHd6', '0834664366466', '3519080890809', 1576935231, 0, '5dfe1f3fbb741.jpg', '5dfe1f3fbbf12.png');

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
(38, '15ddf6c5eab731', 'alfianrochmatul77@gmail.com'),
(39, '15e0ad4d11d595', 'alfianrochmatul77@gmail.com'),
(41, '15e0ae597e29bf', ''),
(42, '15e0ae5af18442', ''),
(43, '15e0ae66b41ac9', 'alfianrochmatul77@gmail.com');

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
  `pemilik_toko` varchar(32) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat_toko` varchar(64) NOT NULL,
  `gambar_sampul` varchar(128) NOT NULL,
  `deskripsi_toko` varchar(128) NOT NULL,
  `no_rekening` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `pemilik_toko`, `no_hp`, `alamat_toko`, `gambar_sampul`, `deskripsi_toko`, `no_rekening`) VALUES
('IDT001', 'SiPadi', 'Sudibyo', '08125222222', 'Jember', '5e00db861b725.jpg', 'Menjual segala macam kebutuhaan pokoka', '999-999-999-99');

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
  `tgl_transaksi` date NOT NULL,
  `bukti_transfer` varchar(64) NOT NULL,
  `rekening_pembeli` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_adm`, `id_pembeli`, `id_toko`, `alamat_kirim`, `tgl_kirim`, `id_kurer`, `ongkir_kurir`, `total_harga`, `total_final`, `status_bayar`, `status_kirim`, `tgl_transaksi`, `bukti_transfer`, `rekening_pembeli`) VALUES
('IDTR12231901', 'ADM1101', 'USER0122', 'IDT001', 'asdsd', 1577117865, 'IKR1117', 7000, 1222, 203000, 1, 1, '2019-12-26', '5e00e6e3c40aa.jpg', 'asda213312'),
('IDTR12231902', 'ADM1101', 'USER0122', 'IDT001', 'dsn selatan . jl 222', 1577285230, 'IKR1114', 7000, 200020, 242000, 1, 1, '2019-11-26', 'checkout.jpg', '999-999-999'),
('IDTR12251903', 'ADM1101', 'USER0122', 'IDT001', 'jl.ok', 1577285227, 'IKR1117', 7000, 490000, 540000, 1, 1, '2019-10-26', '5e03763d60ceb.jpg', '991320-239--42--323-2-4'),
('IDTR12261904', 'ADM1101', 'USER0122', 'IDT001', 'ko', 1577346763, 'IKR1115', 7000, 590000, 650000, 1, 1, '2019-09-22', 'checkout.jpg', 'Belum Terisi'),
('IDTR12261905', 'ADM1101', 'USER0122', 'IDT001', 'ok', 1577346767, 'IKR1114', 7000, 9900000, 10000000, 1, 1, '2019-08-23', 'checkout.jpg', 'Belum Terisi'),
('IDTR12261906', 'ADM1101', 'USER0122', 'IDT001', 'asod', 1577346770, 'IKR1112', 7000, 52000, 70000, 1, 1, '2019-07-10', 'checkout.jpg', 'Belum Terisi'),
('IDTR12261907', 'ADM1101', 'USER0122', 'IDT001', 'oke hehe', 1577351693, 'IKR1129', 7000, 62000, 80000, 1, 1, '2019-12-26', '5e0479bac24b0.jpg', '809-9-9-0990'),
('IDTR12271908', 'Belum Terkonfirmasi', 'USER0122', 'IDT001', 'Tawang Mangu no.35', 0, 'IKR1129', 7000, 610000, 625000, 0, 0, '2019-12-27', 'checkout.jpg', 'Belum Terisi');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_users` (`id_users`,`id_barangs`),
  ADD KEY `id_barangs` (`id_barangs`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtl_brg`
--
ALTER TABLE `dtl_brg`
  ADD KEY `id_brg` (`id_brg`);

--
-- Indexes for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD KEY `id_tr` (`id_tr`,`id_barang`),
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
  ADD KEY `id_adm` (`id_adm`,`id_pembeli`,`id_toko`,`id_kurer`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_kurer` (`id_kurer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token_admin`
--
ALTER TABLE `token_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ktg`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_barangs`) REFERENCES `barang` (`id_brg`);

--
-- Constraints for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD CONSTRAINT `dtl_transaksi_ibfk_1` FOREIGN KEY (`id_tr`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `dtl_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_brg`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_kurer`) REFERENCES `kurir` (`id_kurir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
