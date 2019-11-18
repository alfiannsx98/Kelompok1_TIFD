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
function tambahTr($data)
{
    global $koneksi;
    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM transaksi");
    $field = mysqli_num_rows($rowDB1);
    $brg = "IDTR";
    $d = date('mdyy', time());

    $hasil = $brg . $d . "0" . ($field + 1);

    $idTransaksi = $hasil;
    $id_admin = htmlspecialchars($data["id_admin"]);
    $id_pembeli = htmlspecialchars($data["id_pembeli"]);
    $id_toko = htmlspecialchars($data["id_toko"]);
    $alamat_kirim = htmlspecialchars($data["alamat_kirim"]);
    $tgl_kirim = htmlspecialchars($data["tgl_kirim"]);
    $kota_pembeli = htmlspecialchars($data["kota_kirim"]);
    $ongkir = htmlspecialchars($data["ongkir"]);
    $total_harga = htmlspecialchars($data["total_harga"]);
    $total_final = htmlspecialchars($data["harga_final"]);
    $status_bayar = htmlspecialchars($data["status_bayar"]);
    $status_kirim = htmlspecialchars($data["status_kirim"]);
    $tgl_transaksi = htmlspecialchars($data["tgl_transaksi"]);

    $bukti_bayar = uploadBukti();
    if (!$bukti_bayar) {
        return false;
    }

    $number = count($_POST["id_barang"]);
    $number1 = count($_POST["harga_satuan"]);
    if ($number >= 1 && $number1 >= 1) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST["harga_satuan"][$i] != '') && trim($_POST["jml_dibeli"][$i] != '')) {
                $sql = "INSERT INTO dtl_transaksi VALUES('$idTransaksi','" . mysqli_real_escape_string($koneksi, $_POST["id_barang"][$i]) . "','" . mysqli_real_escape_string($koneksi, $_POST["harga_satuan"][$i]) . "','" . mysqli_real_escape_string($koneksi, $_POST["jml_dibeli"][$i]) . "')";
                mysqli_query($koneksi, $sql);
            }
        }
    }

    $query = "INSERT INTO transaksi VALUES('$idTransaksi','$id_admin','$id_pembeli','$id_toko','$alamat_kirim','$tgl_kirim','$kota_pembeli','$ongkir','$total_harga','$total_final','$status_bayar','$status_kirim','$tgl_transaksi','$bukti_bayar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function uploadBukti()
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
        echo "<script>
        alert('Bukan gambar yang anda upload');
        </script>
        ";
    }
    if ($ukuranFile > 20000000) {
        echo "<script>
            alert('Gambar yang anda upload terlalu besar!');
        </script>
        ";
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/transaksi/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
