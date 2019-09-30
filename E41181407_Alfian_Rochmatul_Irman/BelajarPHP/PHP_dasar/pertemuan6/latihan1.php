<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: #BADA55;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 0.5s;
        }

        .kotak:hover {
            transform: rotate(180deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php
    $angka = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    ?>

    <?php foreach ($angka as $i) : ?>
        <div class="kotak"><?= $i; ?></div>
    <?php endforeach; ?>
    <br>
    <br>
    <?php
    $angka1 = [[1, 2, 3], [4, 5], [6, 7, 8, 9]];
    ?>
    <div class="kotak"><?= $angka1[2][3]; ?></div>
    <!-- DIATAS ADALAH CARA MENCETAK ARRAY MULTIDIMENSI, CARA PENULISAN BEBAS -->
    <br>
    <br>
    <br>
    <?php
    $angka2 = [
        [1],
        [2, 3],
        [4, 5, 6],
        [7, 8, 9, 10],
        [11, 12, 13, 14, 15]
    ];
    ?>
    <?php foreach ($angka2 as $b) : ?>
        <?php foreach ($b as $ab) : ?>
            <div class="kotak"><?= $ab; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
    <!-- cara diatas adalah untuk memunculkan bilangan dari tiap array nya -->
</body>

</html>