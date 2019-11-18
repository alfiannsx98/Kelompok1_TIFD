<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambahTr($data)
{
    global $koneksi;
    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM transaksi");
}
