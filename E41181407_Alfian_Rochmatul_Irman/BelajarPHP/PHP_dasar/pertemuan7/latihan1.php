<?php

$x = 10;
function tampilx()

{
    global $x;
    echo $x;
}

tampilx();
echo "<br>";
echo $x;
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
    <!-- variabel super global ada banyak salah satunya $_GET, $_POST, $_REQUEST, $_SESSION dll -->
    <!-- superglobasls merupakan variabel global milik php dan merupakan array asosiatif -->
    <!-- "?" didalam url yaitu dibaca dengan "saya memasukkan data ke halaman ini(url yang dituju)" -->
    <?php var_dump($_GET); ?>

    <?= $_SERVER["SERVER_NAME"]; ?>
    <?php
    $_GET["nama"] = "Alfian Rochmatul Irman";
    $_GET["NIM"] = "E41181407";
    var_dump($_GET);
    ?>

    <!-- vardump itu untuk mengeluarkan suatu value -->
</body>

</html>