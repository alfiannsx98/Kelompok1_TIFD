<?php

$mahasiswa = [
    ["Irman", "01010", "TIF", "alsdlad@gmail.com"],
    ["gita", "0101011", "TIFa", "aalasdlad@gmail.com"]
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
    <h1>DAFTAR MAHASISWA</h1>
    <?php foreach ($mahasiswa as $i) : ?>
        <ul>
            <li>Nama :<?= $i[0]; ?></li>
            <li><?= $i[1]; ?></li>
            <li><?= $i[2]; ?></li>
            <li><?= $i[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>