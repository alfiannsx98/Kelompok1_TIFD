<?php
$bilanganU = $_POST["inputN"];

for ($i = 0; $i < $bilanganU; $i++) {
    $n = 100 + $i * 10;
    $blnKe = $i + 7;
    echo "Penjualan di bulan ke $blnKe adalah " . ($n);
    echo "<br>";
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Penghitungan Matematis Prediksi Kecap ABC</h1>

    <form action="" method="post">
        <label for="inputN">
            <input type="text" name="inputN" placeholder="Masukkan nilai N">
        </label>
        <button name="submit" type="submit">Submit</button>
    </form>
    <!-- Rumus menggunakan barisan aritmatika dengan Un = a+(n-1)*b , -->
    <!-- u1 = 100 -->
</body>

</html>