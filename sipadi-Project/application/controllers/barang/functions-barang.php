<?php
$koneksi = mysqli_query("localhost", "root", "", "dbsipadifinal1");

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
function tambahBrg($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM barang");
    $field = mysqli_num_rows($rowDB1);
    $brg = "IDB";
    $d = date('m', time());

    $hasil = $brg . $d . "0" . ($field + 1);

    $idBrg = $hasil;
    $nama = htmlspecialchars($data["nama_barang"]);
    $kategori = htmlspecialchars($data["id_kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = htmlspecialchars($data["stok"]);
    $tgl_upload = time();

    $gambar_brg = uploadBrg();
    if (!$gambar_brg) {
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT nama_brg FROM barang WHERE barang = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Data barang sudah terdaftar!');
        </script>";
        return false;
    }
    $query = "INSERT INTO barang VALUES('$idBrg','$nama','$kategori','$gambar_brg','$harga','$deskripsi','$tgl_upload','$stok')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function uploadBrg()
{
    $namaFile = $_FILES['gmbr']['name'];
    $ukuranFile = $_FILES['gmbr']['size'];
    $error = $_FILES['gmbr']['error'];
    $tmpName = $_FILES['gmbr']['tmp_name'];

    if($error === 4)
    {
        echo "<script></script>"
    }
}
