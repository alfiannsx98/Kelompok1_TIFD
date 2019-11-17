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
function tambahKur($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id_kurir ");
    $field = mysqli_num_rows($rowDB1);
    $kur = "KUR";
    $d = date('m', time());

    $hasil = $kur . $d . "0" . ($field + 1);

    $id_kurir = $hasil;
    $nama = htmlspecialchars($data["nama_kurir"]);
    $kota_tujuan = htmlspecialchars($data["kota_tujuan"]);
    $ongkir_kurir = htmlspecialchars($data["ongkir_kurir"]);


    

    

    $query = "INSERT INTO kurir VALUES('$id_kurir','$nama','$kota_tujuan','$ongkir_kurir')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function uploadKur()
{
    $namaFile = $_FILES['gmbr']['name'];
    $ukuranFile = $_FILES['gmbr']['size'];
    $error = $_FILES['gmbr']['error'];
    $tmpName = $_FILES['gmbr']['tmp_name'];

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
function ubahKur($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_kurir"]);
    $kota_tujuan = htmlspecialchars($data["kota_tujuan"]);
    $ongkir_kurir = htmlspecialchars($data["ongkir_kurir"]);

    
    $query = "UPDATE kurir SET
                nama_kurir = '$nama',
                kota_tujuan = '$kota_tujuan',
                ongkir_kurir = '$ongkir_kurir'
            WHERE id_kurir = '$id' 
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapusKur($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM kurir WHERE id_kurir='$id'");

    return mysqli_affected_rows($koneksi);
}
