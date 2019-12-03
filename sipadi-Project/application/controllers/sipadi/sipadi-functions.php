<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsipadifinal1");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mnysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
