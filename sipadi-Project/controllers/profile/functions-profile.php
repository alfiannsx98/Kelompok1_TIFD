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

    $id_admin = $data["id_admin"];
    $nama_admin = htmlspecialchars($data["nama_admin"]);
    $email_admin = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $alamat = htmlspecialchars($data["alamat"]);

    if ($_FILES['gambar_admin']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        error_reporting(0);
        if (!unlink("../views/karyawan/gambar/" . $gambarLama)) {
            echo "<script>alert('error hapus gmbr');</script>";
        } else {
            $gambar = uploadPr();
        }
    }
    $query = "UPDATE admin SET
                nama_admin = '$nama_admin',
                email_admin = '$email_admin',
                gambar_admin = '$gambar',
                alamat = '$alamat'
            WHERE id_admin = '$id_admin';
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

    move_uploaded_file($tmpName, '../karyawan/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
function ubahPassword($data)
{
    global $koneksi;

    $id_admin = $data['id_admin'];
    $passwordLama = mysqli_real_escape_string($koneksi, $data['passwordLama']);
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password1 = mysqli_real_escape_string($koneksi, $data['password1']);

    $cek_password_lama = password_hash($passwordLama, PASSWORD_DEFAULT);

    $cekbenar = mysqli_query($koneksi, "SELECT password_admin FROM admin WHERE id_admin='$id_admin' AND password_admin ='$cek_password_lama'");
    if (mysqli_fetch_assoc($cekbenar)) {
        echo "<script>alert('Password lama anda salah!');</script>";
        return false;
    }
    if ($password !== $password1) {
        echo "<script>('Password anda tidak cocok');</script>";
        return false;
    }
    $passwordBaru = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE admin SET
            password_admin = '$passwordBaru'
            WHERE id_admin = '$id_admin'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
