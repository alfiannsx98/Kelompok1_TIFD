-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2019 pada 02.57
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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
  `id_admin` varchar(128) NOT NULL,
  `nama_admin` varchar(256) NOT NULL,
  `email_admin` varchar(256) NOT NULL,
  `gambar_admin` varchar(256) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `admin_created` int(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `gambar_admin`, `password_admin`, `admin_created`, `alamat`, `level`) VALUES
('ADM1101', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '5dcad406c0d93.jpg', '$2y$10$vPIR7qEuJAT3BbFT9NFxBO5Xm1zz4AbLU4SLnkM0xlc0.mjTuhV9S', 1572078167, 'Kediri Hiri Hiri', 1),
('ADM1102', 'Wildan', 'wildanmangli29@gmail.com', '5dc7c8eb6e88e.jpg', '$2y$10$vPIR7qEuJAT3BbFT9NFxBO5Xm1zz4AbLU4SLnkM0xlc0.mjTuhV9S', 1573374168, 'Banyuwangi', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_brg`, `id_ktg`, `harga_brg`, `gmbr_brg`, `deskripsi_brg`, `tgl_upload`, `brg_kadaluarsa`, `jml_stok_tersedia`) VALUES
('IDB001', 'Mka', 1, 12000, 'coba.jpg', 'mantap', 12219, 219199, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_transaksi`
--

CREATE TABLE `dtl_transaksi` (
  `id_transaksi` varchar(256) NOT NULL,
  `id_barang` varchar(256) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `jml_dibeli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(128) NOT NULL,
  `nama_kategori` varchar(256) NOT NULL,
  `gmbr` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gmbr`) VALUES
('KTG1101', 'Bakterisida', '5dca25fed0a20.png'),
('KTG1102', 'Biostimulan', '5dcc9e8eeb1ad.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(128) NOT NULL,
  `nama_kurir` varchar(128) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
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
-- Struktur dari tabel `token_admin`
--

CREATE TABLE `token_admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token_admin`
--

INSERT INTO `token_admin` (`id`, `kode`, `email`) VALUES
(22, '15dcb5a4f2e6e5', 'wildanmangli29@gmail.com'),
(23, '15dcb5beeaa5f0', 'adsasdok@gmail.com'),
(25, '15dcb5f509a374', 'wildanmangli29@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(256) NOT NULL,
  `alamat_toko` varchar(256) NOT NULL,
  `deskripsi_toko` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ktg` (`id_ktg`);

--
-- Indeks untuk tabel `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token_admin`
--
ALTER TABLE `token_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`,`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `token_admin`
--
ALTER TABLE `token_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
