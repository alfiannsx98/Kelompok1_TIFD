<?php
// cek apakah tidak ada di $_GET
if (!isset($_GET["nama"])) {
    // redirect (memindahkan) user dari suatu halaman ke halaman yg lain
    header("location: latihan2.php");
    exit;
    // ini sudh bisa masuk ke validasi :"))
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>detail data mahasiswa</h1>
    <ul>
        <li><img src="<?= "../pertemuan6/img/" . $_GET["gambar"]; ?>" alt=""></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["prodi"]; ?></li>
        <li><?= $_GET["nim"]; ?></li>
    </ul>
    <a href="latihan2.php">Kembali ke data mahasiswa</a>
</body>

</html>