-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Des 2019 pada 07.23
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `gambar_admin`, `password_admin`, `admin_created`, `alamat`, `level`) VALUES
('ADM1101', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5ddfb22e94b2a.jpg', '$2y$10$fv2nII7nXfB9cJ7SAv0LI.ZLz1u9aoFN9QIbHpz/0jbRw.efpiZYe', 1572078167, 'Kediri Hiri Hiriaehao', 1),
('ADM1102', 'Wildan', 'wildanmangli29@gmail.com', '5debd4caa26a9.jpg', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 1573374168, 'Banyuwangi', 1),
('ADM1103', 'Teddy', 'teddy@gmail.com', '5dd6349136a2b.png', '$2y$10$/QtnRHsS7PN8fucdrcR21OcByYy8sf6WaCCAJcr/hoWP22fq5rIba', 11, 'Madura', 1),
('ADM1204', 'Myco Jihan', 'mycojihan28@gmail.com', '5deb59b8d2dce.jpg', '$2y$10$ww3hxGCTmfcB/GAZ0rWp/u6S/tzj33bG9LDxZsujybnygct10KgHS', 1575704985, 'jember hiri hiri', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
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
('IDB2112018', 'Turmadan 328 SL 1 liter', 'KTG1206', '5dfe1c3833814.png', 65000, 'Berguna untuk menyehatkkan tumbuhan ', 1576934456, 0),
('IDB2112019', 'Pamungkas 490 SL 250 ml', 'KTG1206', '5dfe1d7b78899.png', 22000, 'Herbisida sistemik purna tumbuh yang berkerja sampai ke akar untuk mematikan gulma berbahan aktif IPA Glifosat 490 SL', 1576934779, 0),
('IDB211202', 'Columbus 600 EC 500 ml', 'KTG1204', '5dfdb75e9f653.png', 50000, 'Berguna untuk mengendalikan hama penggulung daun Lamprosema indicata pada budidaya tanaman kedelai.', 1576908638, 0),
('IDB2112020', 'Bioleaf 450 ml', 'KTG1205', '5dfe1e5ba0e25.png', 50000, 'pupuk semi organik yg lengkap unsur makro dan mikro yg baik untuk semua tanaman efek daun hijau mengkilap dan segar untuk perawa', 1576935003, 0),
('IDB211203', 'Hokitan 500 SL 500 ml', 'KTG1204', '5dfdf3acc525e.png', 45000, 'diperuntukkan untuk hama padi seperti kelompok pengisap batang/pelepah daun seperti wereng coklat, penggerek batang, dan wereng ', 1576924076, 0),
('IDB211204', 'Artos 100 SL 500 ml ', 'KTG1204', '5dfdf46fe96aa.png', 130000, 'Untuk memenuhi kebutuhan petani dalam mengatasi permasalahan WERENG dan menjadi solusi terbaik bagi para petani.', 1576924271, 0),
('IDB211205', 'Dafat 400 SL 200 ml', 'KTG1204', '5dfdf559476c7.png', 55000, ' Berguna untuk mengendalikan hama ulat grayak pada tanaman bawang merah.', 1576924505, 0),
('IDB211206', 'Murtox 520 SC 250 ml', 'KTG1203', '5dfdf61f3c198.png', 50000, 'Beguna untuk mengendalikan penyakit pada tanaman padi, bawang merah, cabai dll.', 1576924703, 0),
('IDB211207', 'Rolizol 250 EC 250 ml', 'KTG1203', '5dfdf75f0bc4c.png', 110000, 'Dapat diemulsikan untuk tanamanPadi sawah :penyakit hawar daun Rhizoctonia solani, penyakit bercak daun Cercospora janseana', 1576925023, 0),
('IDB211208', 'Vigold-T 480 SC 250 ml', 'KTG1203', '5dfdf7fa41ccd.png', 205000, 'Fungisida dengan bahan aktif ganda yaitu : Fluokastrobin 200 g/l dan Tebukonazol 277 g/l,\r\nMenggunakan teknologi xylem protect y', 1576925178, 0),
('IDB211209', 'Nazole 50 SC 250 ml', 'KTG1203', '5dfdf89e3bcbf.png', 50000, 'Untuk Mengendalikan Penyakit Antraknosa Collectotrichum Capsici Dan Penyakit Bercak Dau Cercospora Capisci Pada Tanaman Cabai.', 1576925342, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(32) NOT NULL,
  `id_users` varchar(32) NOT NULL,
  `id_barangs` varchar(32) NOT NULL,
  `qty_dibeli` int(11) NOT NULL,
  `tgl_transaksi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_brg`
--

CREATE TABLE `dtl_brg` (
  `id_brg` varchar(32) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_exp` varchar(11) NOT NULL,
  `expired` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtl_brg`
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
('IDB2112018', 20, '22', '2020-06-23'),
('IDB2112019', 20, '23', '2020-07-06'),
('IDB2112020', 20, '24', '2020-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_transaksi`
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
-- Trigger `dtl_transaksi`
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
-- Struktur dari tabel `expired`
--

CREATE TABLE `expired` (
  `id` int(11) NOT NULL,
  `expired` varchar(32) NOT NULL,
  `id_brg` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `expired`
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
(22, '2020-06-23', 'IDB2112018'),
(23, '2020-07-06', 'IDB2112019'),
(24, '2020-07-12', 'IDB2112020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(32) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL,
  `gmbr` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
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
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(32) NOT NULL,
  `nama_kurir` varchar(128) NOT NULL,
  `kota_tujuan` varchar(32) NOT NULL,
  `ongkir_kurir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
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
-- Struktur dari tabel `pembeli`
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
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email_pembeli`, `password_pembeli`, `nomor_hp`, `nik_pembeli`, `user_created`, `is_active`, `gambar_pembeli`, `gmbr_nik_pembeli`) VALUES
('USER0121', 'ok', 'ok@gmail.com', '$2y$10$Y11TUGzTek6s5I0sfudb3u/L3Rq1CcDJxfrh1FU69nwe61MRdgPN2', '192', '12', 1, 1, 'ok.mal', 'ok.mal'),
('USER0122', 'irman', 'alfianrochmatul77@gmail.com', '$2y$10$Y11TUGzTek6s5I0sfudb3u/L3Rq1CcDJxfrh1FU69nwe61MRdgPN2', '081252223123', 'E41181407', 1575362211, 1, 'default.jpg', 'default.jpg'),
('USER0123', 'sample1', 'sample1@gmail.com', '$2y$10$4Liq60aofgstHZEftbDin.fEmigLbfWDKB9IK84qNd2qCphexdaN6', '123213', '123132', 1575362675, 0, '5de62073c4df7.jpg', '5de62073c4fac.jpg'),
('USER0124', 'Agoy', 'ichayoga1@gmail.com', '$2y$10$pouJlUByXCZGX0QDTgjoduY4f.XhtdCCBzEywqM9WIMHcCt1GZHd6', '0834664366466', '3519080890809', 1576935231, 0, '5dfe1f3fbb741.jpg', '5dfe1f3fbbf12.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token_admin`
--

CREATE TABLE `token_admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token_admin`
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
-- Struktur dari tabel `token_user`
--

CREATE TABLE `token_user` (
  `id` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token_user`
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
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(32) NOT NULL,
  `nama_toko` varchar(64) NOT NULL,
  `alamat_toko` varchar(64) NOT NULL,
  `gambar_sampul` varchar(128) NOT NULL,
  `deskripsi_toko` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `gambar_sampul`, `deskripsi_toko`) VALUES
('IDT001', 'SiPadi', 'Jember', '5ddf6e1ee7fc8.jpg', 'Menjual segala macam kebutuhaan pokoka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_barangs` (`id_barangs`);

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ktg`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_barangs`) REFERENCES `barang` (`id_brg`);

--
-- Ketidakleluasaan untuk tabel `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD CONSTRAINT `dtl_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `dtl_transaksi_ibfk_2` FOREIGN KEY (`id_tr`) REFERENCES `transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
