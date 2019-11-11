<?php
require '../../../application/controllers/login/functions-login.php';

function ubah($data)
{
    global $koneksi;

    $id = $data["nik"];
    $nama = htmlspecialchars($data["nama_admin"]);
    $email = htmlspecialchars($data["email_admin"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar_admin']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE admin SET
                nama_admin = '$nama',
                email_admin = '$email',
                gambar = '$gambar'
            WHERE id = $id;
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
