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
function tambahAdm($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM admin");
    $field = mysqli_num_rows($rowDB1);
    $adm = "ADM";
    $d = date('m', time());

    $hasil = $adm . $d . "0" . ($field + 1);

    $id_admin = $hasil;
    $nama = htmlspecialchars($data["nama_admin"]);
    $email = htmlspecialchars($data["email_admin"]);
    $alamat = htmlspecialchars($data["alamat_admin"]);
    $password_admin = mysqli_real_escape_string($koneksi, $data["password_admin"]);
    $password_admin1 = mysqli_real_escape_string($koneksi, $data["password_admin1"]);
    $admin_created = htmlspecialchars($data["admin_created"]);
    $level = htmlspecialchars($data["level"]);

    $gambar_admin = upload();
    if (!$gambar_admin) {
        return false;
    }

    if ($password_admin !== $password_admin1) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai');
        </script>";
    }

    $result = mysqli_query($koneksi, "SELECT email_admin FROM admin WHERE email_admin = '$email'");
    if (mysqlI_fetch_assoc($result)) {
        echo "<script>alert('email yang dipilih sudah terdaftar!');</script>";
        return false;
    }
    $password = password_hash($password_admin, PASSWORD_DEFAULT);

    $query = "INSERT INTO ADMIN VALUES('$id_admin','$nama','$email','$gambar_admin''$password_admin','$admin_created','$alamat','$level')";

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
        echo "<script>alert('Bukan gambar yang telah anda upload');</script>";
    }
    if ($ukuranFile > 20000000) {
        echo "<script>alert('Ukuran gambar yang anda upload terlalu besar');</script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/karyawan/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
