<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsipadifinal1");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mnysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function register($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM pembeli");
    $field = mysqli_num_rows($rowDB1);
    $pmb = "USER";
    $d = date('m', time());
    $hasil = $pmb . "0" . $d . ($field + 1);
    $id_pembeli = $hasil;
    $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
    $email_pembeli = htmlspecialchars($data["email_pembeli"]);
    $password_pembeli = mysqli_real_escape_string($koneksi, $data["password"]);
    $password_pembeli1 = mysqli_real_escape_string($koneksi, $data["password1"]);
    $nomor_hp = htmlspecialchars($data["no_hp"]);
    $nik = htmlspecialchars($data["nik"]);
    $user_created = time();
    $is_active = 0;
    $gambar_pembeli = "default.jpg";
    $gambar_nik = "default.jpg";

    if ($password_pembeli !== $password_pembeli1) {
        echo "<script>alert('Maaf password tidak sama');</script>";
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT email_pembeli FROM pembeli WHERE email_pembeli = '$email_pembeli'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('email yang dipilih sudah terdaftar')</script>";
        return false;
    }

    $password = password_hash($password_pembeli, PASSWORD_DEFAULT);

    $query = "INSERT INTO pembeli VALUES('$id_pembeli','$nama_pembeli','$email_pembeli','$password','$nomor_hp','$nik','$user_created','$is_active','$gambar_pembeli','$gambar_nik')";
}
