<?php
$mahasiswa = [
    [
        "Nama" => "Alfian Rochmatul Irman",
        "NIM" => "E41181407",
        "Prodi" => "Teknik Informatika",
        "gambar" => "Screenshot_5.png"
    ],
    [
        "Nama" => "Gita Nurwahyuni",
        "NIM" => "saia tidak tau",
        "Prodi" => "Geografi",
        "gambar" => "Screenshot_9.png"
    ]
];

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
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $m) : ?>
        <ul>
            <li>
                <a href="latihan3.php?nama=<?= $m["Nama"]; ?>&gambar=<?= $m["gambar"]; ?>&nim=<?= $m["NIM"]; ?>&prodi=<?= $m["Prodi"]; ?>"><?= $m["Nama"]; ?></a>
                <!-- mengirim data dan sisanya di latihan 3 akan menangkap data -->
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>