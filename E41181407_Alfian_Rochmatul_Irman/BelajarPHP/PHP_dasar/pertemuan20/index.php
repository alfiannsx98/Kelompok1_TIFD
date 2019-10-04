<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// penulisan $_SESSION["login"];
// require = memanggil suatu file, disini dia memanggil file functions.php
// bisa memanggil dengan require ataupun include
// asc itu dr kecil ke bersar, kalau desc itu dari besar ke kecil
require 'functions.php';

// query pagination !, untuk menentukan 1 halaman tampil berapa halaman
// ditambahkan dgn keyword limit

// configurasi pagination
// round($variabel) = membulatkan ke bilangan pecahan terdekat
// floor($variabel) = membulatkan ke bilangan pecahan kebawah
// ceil($variabel) = membulatkan ke bilangan bulat keatas

$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// halaman aktif diambil dari $_GET url
// if (isset($_GET["halaman"])) {
//     $halamanAktif = $_GET["halaman"];
// } else {
//     $halamanAktif = 1;
// }
// Sekarang menggunakan operator tenary

// jika halaman aktif = 3, lalu jumlah halaman awal datanya adalah 15, awaldata=1
// halaman 3, mulai pasti dari 11
// eh menghitung mulai dari 1 deng

$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// diatas itu adalah menggunakan tenary

// untuk menghitung jumlah array atau data didalam array model apapun, dengan cara count(query("SELECT * FROM mahasiswa));

// jumlah halaman = total data / data per halaman

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC LIMIT $awalData, $jumlahDataPerHalaman");
// diatas ini diatur limit dengan 5 = index ke, lalu jumlah data = 3
// jika tombol cari di klik, maka akan ditimpa $mahasiswa dengan tombol cari mahasiswa sesuai data

// akan mencari data di mahasiswa berdasarkan function "cari", lalu data diambil didalam "keyword"

// cara baca, jika tombol "cari" dipencet maka dia akan ambil apapun dari user berdasarkan "keyword"
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="logout.php">Logout</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" autofocus placeholder="Masukkan Data.." autocomplete="off">
        <button type="submit" name="cari" id="tombol-cari">Cari Data</button>
    </form>
    <br><br>

    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&lt;</a>
    <?php endif; ?>
    <!-- buat navigasi -->
    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight:bold;color:red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>

    <?php endfor; ?>
    <?php if ($jumlahHalaman > $halamanAktif) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
    <?php endif; ?>
    <br>
    <br>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>
    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row["id"]; ?>">Ubah</a> ||
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                    <td><img src="<?= "img/" . $row["gambar"]; ?>" width="50" alt=""></td>
                    <td><?= $row["nim"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["prodi"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>

</html>