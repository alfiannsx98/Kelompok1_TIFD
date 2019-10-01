<?php
// koneksi ke database
// urutan 1. Nama Host, 2.Username MySQL, 3.Password, 4.Database
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
// query data / ambil datanya
// parameter ada 2, pertama string variabel koneksi biar bisa dipanggil ber x x , lalu masukkan sintaks querynya
// sintaks sql ditulis dgn huruf besar, nama tabel dll huruf kecil
// ketika melakukan query, mysql query akan mengembalikan 2 hal, jika berhasil akan dilakukan
// seperti crud gituu.

// ambil data (fetch) mahasiswa dari object (result)
// ada 4 cara, 1.mysqli_fetch_row(), 2.mysqli_fetch_assoc(), 3.mysqli_fetch_array(), 4.mysqli_fetch_object()
// 1.mysqli_fetch_row() -> mengembalikan array numerik, array yang mengembalikan angka, jika mau menampilkan data tertentu tingaal menggunakan index ke (x)
// 2.mysqli_fetch_assoc() -> mengembalikan array asosiatif
// 3.mysqli_fetch_array() -> mengembalikan nilai atau value berdasarkan index angka ataupun index string. Tapi memiliki kekurangan
// diatas ^ jika dipanggil atau disajikan akan double atau 2x tampil.
// 4.mysqli_fetch_object() -> kita gak akan pakai, saolnya dia akan mengembalikan objek, dikarenakan dia tidak punya key numeric dan key assosiatif

// kesimpulan, jadi kita lebih enak menggunakan fetch_assoc.
// diatas menampilkan nim berdasarkan index ke(x)

// berikut / dibawah ini adalah cara dalam mengambil data dengan menggunakan fetch_assoc
// while ($var_result1 = mysqli_fetch_assoc($result)) {
//     var_dump($var_result1);
// }


// diatas tsb menampilkan prodi berdasarkan variabel string ["string"]
// diatas tsb menampilkan prodi bisa berdasarkan index ke(x) ataupun bisa dgn string ["string"]
// diatas tsb menampilkan object data dengan cara var_dump($var_result3->nama_objek), contoh var_dump($var_result3->nama)

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
                    <a href="#">Ubah</a> ||
                    <a href="#">Hapus</a>
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