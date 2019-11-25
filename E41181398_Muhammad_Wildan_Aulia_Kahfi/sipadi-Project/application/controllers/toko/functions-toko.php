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

    if ($_FILES['gambar_toko']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadTk();
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
    $namaFile = $_FILES['gambar_toko']['name'];
    $ukuranFile = $_FILES['gambar_toko']['size'];
    $error = $_FILES['gambar_toko']['error'];
    $tmpName = $_FILES['gambar_toko']['tmp_name'];

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

    move_uploaded_file($tmpName, '../../views/toko/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
