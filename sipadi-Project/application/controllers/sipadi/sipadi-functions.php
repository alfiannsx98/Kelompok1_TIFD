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
function hapusCart($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM cart WHERE id_cart='$id'");

    return mysqli_affected_rows($koneksi);
}
function tambahCart($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM cart");
    $field = mysqli_num_rows($rowDB1);
    $hasil = ($field + 1);
    $id_usr = htmlspecialchars($data['id_users']);
    $id_barangs = htmlspecialchars($data['id_barangs']);
    $qty_dibeli = htmlspecialchars($data['qty_dibeli']);
    $tgl_transaksi = time();

    $result = mysqli_query($koneksi, "SELECT id_barangs FROM cart WHERE id_barangs='$id_barangs'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Barang telah dimasukkan keranjang');</script>";
        return false;
    }

    $query = "INSERT INTO cart VALUES('$hasil','$id_usr','$id_barangs','$qty_dibeli','$tgl_transaksi')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function checkout($data)
{
    global $koneksi;

    global $koneksi;
    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM transaksi");
    $field = mysqli_num_rows($rowDB1);
    $brg = "IDTR";
    $d = date('mdy', time());

    $hasil = $brg . $d . "0" . ($field + 1);

    $idTransaksi = $hasil;
    $id_admin = htmlspecialchars($data["id_admin"]);
    $id_pembeli = htmlspecialchars($data['id_users']);
    $id_toko = "IDT001";
    $alamat_kirim = htmlspecialchars($data["alamat_kirim"]);
    $tgl_kirim = htmlspecialchars($data["tgl_kirim"]);
    $ongkir = htmlspecialchars($data["kota_kirim"]);
    $ongkir_kurir = htmlspecialchars($data["ongkir_kurir"]);
    $total_harga = htmlspecialchars($data["harga_total"]);
    $total_final = htmlspecialchars($data["harga_final"]);
    $status_bayar = htmlspecialchars($data["status_bayar"]);
    $status_kirim = htmlspecialchars($data["status_kirim"]);
    $tgl_transaksi = htmlspecialchars($data["tgl_transaksi"]);

    $bukti_bayar = uploadBukti();
    if (!$bukti_bayar) {
        return false;
    }

    $hitungExp = mysqli_query($koneksi, "SELECT * FROM dtl_transaksi");
    $hitungExp1 = mysqli_num_rows($hitungExp);

    $number = count($_POST["id_barang"]);
    $number1 = count($_POST["harga_satuan"]);
    $jml_dibeli = "0";
    if ($number >= 1 && $number1 >= 1) {
        for ($i = 0; $i < $number; $i++) {
            $hitungExp1++;
            if (trim($_POST["harga_satuan"][$i] != '') && trim($_POST["jml_dibeli_tmp"][$i] != '')) {
                $sql = "INSERT INTO dtl_transaksi VALUES('$idTransaksi','" . mysqli_real_escape_string($koneksi, $_POST["id_barang"][$i]) . "','$hitungExp1','" . mysqli_real_escape_string($koneksi, $_POST["harga_satuan"][$i]) . "','" . mysqli_real_escape_string($koneksi, $_POST["jml_dibeli_tmp"][$i]) . "','$jml_dibeli')";
                mysqli_query($koneksi, $sql);
            }
        }
    }

    $query = "INSERT INTO transaksi VALUES('$idTransaksi','$id_admin','$id_pembeli','$id_toko','$alamat_kirim','$tgl_kirim','$ongkir','$ongkir_kurir','$total_harga','$total_final','$status_bayar','$status_kirim','$tgl_transaksi','$bukti_bayar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
