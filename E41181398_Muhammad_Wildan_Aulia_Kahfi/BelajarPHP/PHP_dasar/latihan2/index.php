<?php
echo "Nama saya wildan";

print "sanes tiang elit";

print_r("nanging tiang alit");

var_dump("wkwkwkwkwk");

echo 12312312;

echo true;

echo false;

echo "jum'at";

var_dump(1 !== "1");


$x = 5;
$x -= 5;

echo $x;


$nama = "wildan";
$nama .= " ";
$nama .= "nae";

echo $nama;


echo 2 + 3;
$a = 1000;
$b = 129129;
$bb = $a * $b;
echo $bb;
$nama = "wildan";
$nama_depan = "wildan";
$nama_belakang = "nae";

echo $nama_depan . " " . $nama_belakang;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>latihan2</title>
</head>

<body>
    <h1>selamat datang <?= "wildanae"; ?></h1>
    <h1>halo selamat datang <?= $nama; ?></h1>
    <p><?= "INI ADALAH paragraf" ?></p>

    <?php
    echo "<h1>HALO SELAMAT DTG wildanae</h1>";
    ?>
    <?= "HALO SAYA ADALAH $nama"; ?>
    <?= 'halo saya adalah $nama'; ?>
    <?= "<h1>$nama</h1>" ?>
    <?= $nama ?>
</body>

</html>