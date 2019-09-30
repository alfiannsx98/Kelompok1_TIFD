<?php
$mahasiswa = [
    ["WUADO", "MOONTOD", 219219],
    ["Irman", "TYDACK BECANDA", 191919],
    ["HEHEK!", "WUADOHD", true],
    ["BAUK", "TIDAK", 219219]
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
    <ul>
        <?php foreach ($mahasiswa as $a) : ?>
            <?php foreach ($a as $b) : ?>
                <li><?= $b; ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
    <!-- Array assosiasi -->
    <!-- definisi mirip seperti array numerik -->
    <!-- keynya adalah string yg dibuat sendiri -->
    <!-- "=>" adalah -->
    <br>
    <br>
    <br>
    <?php $mahasiswa11 = [
        [
            "Nama" => "Alfian Rochmatul Irman",
            "NIM" => "E41181407",
            "Umur" => "20",
            "PRODI" => "TEKNIK INFORMATIKA",
            "gambar" => "Screenshot_5.png"
        ],
        [
            "Nama" => "Cubacvba",
            "NIM" => "E4129219",
            "Umur" => "999",
            "PRODI" => "saia tidak tau",
            "TUGAS" => [90, 80, 70, 100, 99, 20],
            "gambar" => "Screenshot_12.png"
        ]

    ]; ?>

    <h1>DAFTAR MAHASISWA</h1>
    <?php foreach ($mahasiswa11 as $ok) : ?>
        <ul>
            <li>Nama : <?= $ok["Nama"]; ?></li>
            <li>NIM : <?= $ok["NIM"]; ?></li>
            <li>Umur : <?= $ok["Umur"]; ?></li>
            <li>PRODI : <?= $ok["PRODI"]; ?></li>
            <li>GAMBAR : <img src="<?= "img/" . $ok["gambar"]; ?>" alt=""></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>