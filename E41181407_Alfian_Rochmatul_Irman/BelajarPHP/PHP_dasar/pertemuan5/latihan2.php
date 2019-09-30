<!-- pengulangan pada array bisa dgn foreach -->
<?php

$angka = [2, 3, 4, 5, 6, 1111, 99999];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php for ($i = 0; $i < count($angka); $i++) { ?>
        <div class="kotak"><?= $angka[$i]; ?></div>
    <?php } ?>
    <div class="clear"></div>
    <?php foreach ($angka as $a) { ?>
        <div class="kotak"><?= $a; ?></div>
    <?php } ?>
    <div class="clear"></div>
    <?php foreach ($angka as $am) : ?>
        <div class="kotak"><?= $am; ?></div>
    <?php endforeach; ?>
</body>

</html>