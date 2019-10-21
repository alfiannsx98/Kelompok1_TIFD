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
function tambah($data)
{
    global $koneksi;
    $nik = htmlspecialchars($data["nik"]);
    $email_admin = htmlspecialchars($data["email_admin"]);
    $gambar_admin = htmlspecialchars($data["gambar_admin"]);
    $
}