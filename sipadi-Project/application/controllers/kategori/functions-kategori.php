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
function ubahKtg($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_kategori"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $file = "../../views/kategori/gambar/" . $gambarLama;
    if ($_FILES['gmbr_ktg']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadKtg();
    }
    $query = "UPDATE kategori SET
                nama_kategori = '$nama',
                gmbr = '$gambar'
            WHERE id_kategori = '$id' 
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function tambahKtg($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM kategori");
    $field = mysqli_num_rows($rowDB1);
    $ktg = "KTG";
    $d = date('m', time());

    $hasil = $ktg . $d . "0" . ($field + 1);

    $nama = htmlspecialchars($data["nama_kategori"]);

    $gambar = uploadKtg();
    if (!$gambar) {
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT nama_kategori FROM kategori WHERE nama_kategori='$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Nama Kategori telah Terdaftar');</script>";
        return false;
    }

    $query = "INSERT INTO kategori VALUES ('$hasil','$nama','$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function uploadKtg()
{
    $namaFile = $_FILES['gmbr_ktg']['name'];
    $ukuranFile = $_FILES['gmbr_ktg']['size'];
    $error = $_FILES['gmbr_ktg']['error'];
    $tmpName = $_FILES['gmbr_ktg']['tmp_name'];

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

function hapusKtg($id)
{
    global $koneksi;

    $qr_file = mysqli_query($koneksi, "SELECT gmbr FROM kategori WHERE id_kategori='$id'");
    $hsl =  mysqli_fetch_array($qr_file);

    if (!unlink("../../views/kategori/gambar/" . $hsl["gmbr"])) {
        mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

        return mysqli_affected_rows($koneksi);
    } else {
        unlink("../../views/kategori/gambar/" . $hsl["gmbr"]);
        mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

        return mysqli_affected_rows($koneksi);
    }
}
