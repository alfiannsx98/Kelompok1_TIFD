<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>Nama Mahasiswa</td>
            <td>Nomor Induk Mahasiswa</td>
            <h2>Hello World</h2>
            <a href="#">coba</a>
            <div>
                <p>asd</p>
            </div>
        </tr>
        <?php foreach ($mahasiswa as $m) :  ?>
            <tr>
                <td><?= $m["nama"]; ?></td>
                <td><?= $m["nim"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>