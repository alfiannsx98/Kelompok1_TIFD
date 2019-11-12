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
function tambahKtg($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data["nama_kategori"]);

    $gambar = uploadKtg();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO kategori VALUES ('','$nama','$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function uploadKtg()
{
    $namaFile = $_FILES['gmbr']['name'];
    $ukuranFile = $_FILES['gmbr']['size'];
    $error = $_FILES['gmbr']['error'];
    $tmpName = $_FILES['gmbr']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Maaf yang telah anda uplaod bukan gambar');</script>";
    }
    if ($ukuranFile > 500000000) {
        echo "<script>alert('Maaf file yang anda upload terlalu besar!');</script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/kategori/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
function ubahKtg($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_kategori"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gmbr']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadKtg();
    }
    $query = "UPDATE kategori SET
                nama_kategori = '$nama',
                gmbr = '$gambar'
            WHERE id_kategori = $id 
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function hapusKtg($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

    return mysqli_affected_rows($koneksi);
}
