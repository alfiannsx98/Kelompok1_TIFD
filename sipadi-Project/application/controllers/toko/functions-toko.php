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
function ubahTk($data)
{
    global $koneksi;

    $id = $data["id_toko"];
    $nama = htmlspecialchars($data["nama_toko"]);
    $alamat = htmlspecialchars($data["alamat_toko"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $deskripsi = htmlspecialchars($data["deskripsi_toko"]);

    if ($_FILES['gambar_sampul']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        if (!unlink("../../views/toko/gambar/" . $gambarLama)) {
            unlink("../../views/toko/gambar/" . $gambarLama);
            $gambar = uploadTk();
        } else {
            unlink("../..views/toko/gambar/" . $gambarLama);
            $gambar = uploadTk();
        }
    }
    $query = "UPDATE toko SET
                nama_toko = '$nama',
                alamat_toko = '$alamat',
                gambar_sampul = '$gambar',
                deskripsi_toko = '$deskripsi'
            WHERE id_toko = '$id'
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function uploadTk()
{
    $namaFile = $_FILES['gambar_sampul']['name'];
    $ukuranFile = $_FILES['gambar_sampul']['size'];
    $error = $_FILES['gambar_sampul']['error'];
    $tmpName = $_FILES['gambar_sampul']['tmp_name'];

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
    if ($ukuranFile > 900000000) {
        echo "<script>alert('Maaf file yang anda upload terlalu besar!');</script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/toko/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
