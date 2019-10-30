<?php
error_reporting(0);
$n = $_GET["n"];
?>

<form action="" method="post">

    <?php for ($x = 0; $x < $n; $x++) { ?>

        <h3>Masukkan Jumlah Penjualan Kecap Bulan ke-<?php echo "$x" ?></h3>
        <input type="number" name="<?php echo "y$x" ?>">


    <?php
        $Jx += $x;
    }
    ?>


    <h3>Masukkan Jumlah Penjualan Kecap Bulan ke</h3>
    <input type="number" name="dicari" min="<?= $n ?>">
    <button type="submit" name="hitung">hitung</button>

    <?php
    if (isset($_POST["hitung"])) {
        $dicari = $_POST["dicari"];
        for ($x = 0; $x < $n; $x++) {

            $hitung = $_POST["y$x"];
            $y[$x] = $hitung;
            echo "<br>";
            echo "y ke-$x = ";
            echo $y[$x];
            $Jy += $y[$x];
            $x2[$x] = $x * $x;
            echo "<br>";
            echo "x2 ke-$x = $x2[$x]";
            $Jx2 += $x2[$x];
            $xy[$x] = $y[$x] * $x;
            echo "<br>";
            echo "xy ke-$x = $xy[$x]";
            $Jxy += $xy[$x];
            echo "<br> ===== BATAS FOR =====";
        }
        $b = ($n * $Jxy - $Jx * $Jy) / ($n * $Jx2 - ($Jx * $Jx));

        echo "<br> Ini Sigma y = ";
        echo $Jy;
        echo "<br> Ini Sigma x = ";
        echo $Jx;
        echo "<br> Ini Sigma x2 = ";
        echo $Jx2;
        echo "<br> Ini Sigma xy = ";
        echo $Jxy;
        echo "<br> Ini adalah b = ";
        echo $b;
        $a = ($Jy / $n) - ($b * ($Jx / $n));
        echo "<br> Ini adalah a = ";
        echo $a;
        $bulan = $a + ($b * $dicari);
        echo "<br> Ini adalah penjualan kecap bulan ke-$dicari = ";
        echo $bulan;
        echo '</form>';
    }
    ?>