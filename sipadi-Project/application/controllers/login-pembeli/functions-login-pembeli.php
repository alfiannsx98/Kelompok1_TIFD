<?php
$koneksi = mysqli_connect("localhost", "root", "dbsipadifinal1");

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
function registeR($data)
{
    global $koneksi;

    $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
    $email_pembeli = htmlspecialchars($data["email_pembeli"]);
    $password_pembeli = mysqli_real_escape_string($koneksi, $data["password_pembeli"]);
    $password_pembeli1 = mysqli_real_escape_string($koneksi, $data["password_pembeli1"]);
    $nomor_hp = mysqli_real_escape_string($koneksi, $data["nomor_hp"]);
    $nik_pembeli = htmlspecialchars($data["nik_pembeli"]);
    $user_created = htmlspecialchars($data["user_created"]);
    $is_active = htmlspecialchars($data["is_active"]);

    $gambar_pembeli = upload_gmbr_pembeli();
    if (!$gambar_pembeli) {
        return false;
    }
    $gambar_nik = upload_gmbr_nik();
    if (!$gambar_nik) {
        return false;
    }
    if ($password_pembeli !== $password_pembeli1) {
        echo "<script>alert('Konfirmasi Password tidak sesuai!);</script>";
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT email_pembeli FROM pembeli WHERE email_pembeli = '$email_pembeli'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('email yang dipilih sudah terdaftar');</script>";
    }

    $password = password_hash($password_pembeli, PASSWORD_DEFAULT);

    $query = "INSERT INTO pembeli VALUES('$nama_pembeli','$email_pembeli','$password','$nomor_hp','$nik_pembeli','$user_created','$is_active')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function upload_gmbr_pembeli()
{
    $namaFile = $_FILES['gambar_pembeli']['name'];
    $ukuranFile = $_FILES['gambar_pembeli']['size'];
    $error = $_FILES['gambar_pembeli']['error'];
    $tmpName = $_FILES['gambar_pembeli']['tmp_name'];

    if ($error === 4) {
        echo "Error";
    }
}
