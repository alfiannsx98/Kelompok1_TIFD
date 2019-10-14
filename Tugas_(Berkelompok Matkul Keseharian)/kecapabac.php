<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h2>masukkan nilai awal</h2> <input type="text" name="a">
        <hr>
        <h2>masukkan banyak data</h2> <input type="number" name="n" min="1" max="6"
        <hr>
        <h2>masukkan beda</h2> <input type="text" name="b">
        <hr>
        <input type="submit" value="ambyar" name="submit">

    </form>

    <?php
        error_reporting(0);
        $a = $_POST["a"];
        $n = $_POST["n"];
        $b = $_POST["b"];

        for($i = 1; $i <= $n; $i++){
            $Un = $a + ($i - 1) * $b;
            $bulan = $i + $n;

            echo "Penjualan di bulan ke $bulan adalah " , ($Un);
            echo "<br>";
        }
    ?>

</body>
</html>