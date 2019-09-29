<?php
//pengulangan
// for
// do while
// foreach
// foreach = pengulangan kusus array


// for ($i = 0; $i < 9; $i++) {
//     echo "hello world <br>";
// }


// $a = 0;
// while ($a <= 10) {
//     echo " hello world! <br>";
//     $a++;
// }


// $a = 0;
// do {
//     $a++;
//     echo $a;
// } while ($a < 10);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .warna-baris {
            background-color: silver;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo "<td></td>";
            }
            ?>
        </tr>
        <tr>
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo "<td></td>";
            }
            ?>
        </tr>
    </table>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php
        for ($i = 1; $i <= 3; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 5; $j++) {
                echo "<td>$i,$j</td>";
            }
            echo "</tr>";
        }
        echo "<br>";
        ?>
    </table>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php
        for ($i = 1; $i <= 3; $i++) : ?>
            <?php if ($i % 2 == 1) : ?>
                <tr class="warna-baris">
                <?php else : ?>
                <tr>
                <?php endif; ?>
                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i,$j"; ?></td>
                <?php endfor; ?>
                </tr>
            <?php endfor; ?>
    </table>
</body>

</html>