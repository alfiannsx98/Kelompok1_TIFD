<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="range">Range Divide And Conquer</label>
        <input type="text" name="range" id="range">
        <button type="submit" name="submit">Masukkan Range</button>
        <?php
        $range = $_POST["range"];

        function merge($l, $r, &$output)
        {
            global $range;

            $l_in = $l * $range;
            $r_in = ((int) (($l + $r) / 2) + 1) * $range;

            $l_c = (int) (((($l + $r) / 2) - $l + 1) * $range);
        }
        ?>
    </form>
</body>

</html>