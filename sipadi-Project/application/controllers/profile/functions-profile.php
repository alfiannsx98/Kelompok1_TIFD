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
function ubah($data)
{
    global $koneksi;

    $id = $data["nik"];
    $nama = htmlspecialchars($data["nama_admin"]);
    $email = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar_admin']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE admin SET
                nama_admin = '$nama',
                email_admin = '$email',
                gambar_admin = '$gambar'
            WHERE id = $id;
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function upload()
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
