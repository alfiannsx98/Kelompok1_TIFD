<?php

// require = memanggil suatu file, disini dia memanggil file functions.php
// bisa memanggil dengan require ataupun include
// asc itu dr kecil ke bersar, kalau desc itu dari besar ke kecil
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

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

    <form action="" method="post">
        <input type="text" name="keyword" autofocus placeholder="Masukkan Data.." autocomplete="off">
        <button type="submit" name="cari">Cari Data</button>
    </form>

    <br>
    <br>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>

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
                <td><img src="<?= "../pertemuan6/img/" . $row["gambar"]; ?>" width="50" alt=""></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["prodi"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>