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
function tambahKur($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM kurir");
    $field = mysqli_num_rows($rowDB1);
    $kur = "KUR";
    $d = date('m', time());

    $hasil = $kur . $d . "0" . ($field + 1);

    $id_kurir = $hasil;
    $nama = htmlspecialchars($data["nama_kurir"]);
    $kota_tujuan = htmlspecialchars($data["kota_tujuan"]);
    $ongkir_kurir = htmlspecialchars($data["ongkir_kurir"]);






    $query = "INSERT INTO kurir VALUES('$id_kurir','$nama','$kota_tujuan','$ongkir_kurir')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahKur($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_kurir"]);
    $kota_tujuan = htmlspecialchars($data["kota_tujuan"]);
    $ongkir_kurir = htmlspecialchars($data["ongkir_kurir"]);


    $query = "UPDATE kurir SET
                nama_kurir = '$nama',
                kota_tujuan = '$kota_tujuan',
                ongkir_kurir = '$ongkir_kurir'
            WHERE id_kurir = '$id' 
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapusKur($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM kurir WHERE id_kurir='$id'");

    return mysqli_affected_rows($koneksi);
}
