<?php
$masuk = $_GET["masuk"];
if (isset($_POST["simpan"])) {
    function merge_sort($my_array)
    {
        if (count($my_array) == 1) return $my_array;
        $mid = count($my_array) / 2;
        $left = array_slice($my_array, 0, $mid);
        $right = array_slice($my_array, $mid);
        $left = merge_sort($left);
        $right = merge_sort($right);
        return merge($left, $right);
    }
    function merge($left, $right)
    {
        $res = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                $res[] = $right[0];
                $right = array_slice($right, 1);
                echo "jika true ";
                print_r($res);
                echo "<br>";
                print_r($right);
            } else {
                $res[] = $left[0];
                $left = array_slice($left, 1);
                echo "jika false ";
                print_r($res);
                echo "<br>";
                print_r($left);
            }
        }
        while (count($left) > 0) {
            $res[] = $left[0];
            $left = array_slice($left, 1);
            print_r($res);
            echo "<br>";
            print_r($left);
            echo " kiri ";
        }
        while (count($right) > 0) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
            print_r($res);
            echo "<br>";
            print_r($right);
            echo " kanan ";
        }
        return $res;
    }
    $inputan = $_POST["angka"];
    $test_array = $inputan;
    // echo "Original Array : ";
    // echo implode(', ', $test_array);
    echo "\nSorted Array :";
    echo implode(', ', merge_sort($test_array)) . "\n";
}
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
    <?php for ($i = 0; $i < $masuk; $i++) : ?>
        <form action="" method="post">
            <input type="number" name="angka[]">
        <?php endfor; ?>
        <button type="submit" name="simpan"> savee</button>
        </form>
</body>

</html>