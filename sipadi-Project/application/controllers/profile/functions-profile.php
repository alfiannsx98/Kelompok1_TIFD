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
function ubahPr($data)
{
    global $koneksi;

    $id_nik = $data["nik"];
    $nama_admin = htmlspecialchars($data["nama_admin"]);
    $email_admin = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar_admin']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadPr();
    }
    $query = "UPDATE admin SET
                nama_admin = '$nama_admin',
                email_admin = '$email_admin',
                gambar_admin = '$gambar'
            WHERE nik = '$id_nik';
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function uploadPr()
{
    $namaFile = $_FILES['gambar_admin']['name'];
    $ukuranFile = $_FILES['gambar_admin']['size'];
    $error = $_FILES['gambar_admin']['error'];
    $tmpName = $_FILES['gambar_admin']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('bukan gambar yang telah anda upload');</script>";
    }
    if ($ukuranFile > 20000000) {
        echo "<script>alert('Ukuran gambar yang anda upload terlalu besar!');</script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/login/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
