<?php
// pertemuan 2 php dasar
// standar output
// di sintaks php

// dengan echo
// atau print

// var_dump untuk melihat isi variabel


echo "Nama saya irman";
print "saya romad";

print_r("saya matul");

var_dump("SASAKAKAKAK");

echo 12312312;

echo true;

echo false;

echo "jum'at";

// penulisan sintaks php didalam html
// penulisan html didalam php

// variabel dan tipe data
// variabel dengan tanda "$" contoh
// operator aritmatika +,-,*,/,%
//operator penggabung string (concatenation,concat)
// " . "
// operator assignment =,=+,-=,*=,/=,%=,.=
// operator perbandingan <,>,<=,>=,==
// identitas === , !==
// logika &&,||,!


var_dump(1 !== "1");


$x = 1;
$x -= 5;

echo $x;


$nama = "irman";
$nama .= " ";
$nama .= "matol";

echo $nama;


echo 1 + 1;
$a = 1000;
$b = 129129;
$bb = $a * $b;
echo $bb;
$nama = "Irman";
$nama_depan = "irman";
$nama_belakang = "matol";

echo $nama_depan . " " . $nama_belakang;
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
    <h1>selamat datang <?= "IRMAAAN"; ?></h1>
    <h1>halo selamat datang <?= $nama; ?></h1>
    <p><?= "INI ADALAH paragraf" ?></p>

    <?php
    echo "<h1>HALO SELAMAT DTG IRMAN</h1>";
    ?>
    <?= "HALO SAYA ADALAH $nama"; ?>
    <?= 'halo saya adalah $nama'; ?>
    <?= "<h1>$nama</h1>" ?>
    <?= $nama ?>
</body>

</html>