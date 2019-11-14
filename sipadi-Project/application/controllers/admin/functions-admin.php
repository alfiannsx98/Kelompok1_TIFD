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
}
