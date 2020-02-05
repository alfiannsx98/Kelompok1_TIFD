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
    $d = date('mdy', time());

    $hasil = $brg . $d . "0" . ($field + 1);

    $idTransaksi = $hasil;
    $id_admin = htmlspecialchars($data["id_admin"]);
    $id_pembeli = htmlspecialchars($data["id_pembeli"]);
    $id_toko = htmlspecialchars($data["id_toko"]);
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

    move_uploaded_file($tmpName, '../transaksi/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
function updateByr($data)
{
    global $koneksi;
    $email = $_POST['email'];
    $admin = mysqli_query($koneksi, "SELECT id_admin FROM admin WHERE email_admin = '$email'");
    $id_adm = mysqli_fetch_assoc($admin);
    $id_adm = $id_adm['id_admin'];


    $idTR = ($_GET["id"]);
    $st = mysqli_query($koneksi, "SELECT id_barang FROM dtl_transaksi WHERE id_tr = '$idTR'");
    $idtrans = mysqli_query($koneksi, "SELECT id_tr FROM dtl_transaksi WHERE id_tr = '$idTR'");
    $stmt = mysqli_fetch_array($idtrans);
    $id_brg = mysqli_fetch_assoc($st);
    $nomer = $data["no"];
    $nmbr = count($_POST["harga_satuan"]);
    $nmbr1 = count($_POST["jml_dibeli_tmp"]);
    if (trim($_POST["jumlah_beli"] != '') && trim($_POST["jml_dibeli_tmp"] != '')) {
        if ($nmbr >= 1 && $nmbr1 >= 1) {
            for ($i = 0; $i < $nmbr; $i++) {
                if (trim($_POST["jumlah_beli"] != '') && trim($_POST["jml_dibeli_tmp"] != '')) {
                    $sql = "UPDATE dtl_transaksi SET
                jumlah_beli ='" . mysqli_real_escape_string($koneksi, $_POST["jumlah_beli"][$i]) . "',
                jml_dibeli_tmp = '" . mysqli_real_escape_string($koneksi, $_POST["jml_dibeli_tmp"][$i]) . "'
                WHERE no='$nomer[$i]' AND id_tr = '$idTR'
            ";
                    mysqli_query($koneksi, $sql);
                }
            }
        }
    }
    $id = $_GET["id"];
    $query = "UPDATE transaksi SET
        id_adm = '$id_adm',
        status_bayar = '1'
    WHERE id_transaksi = '$id' 
    ";



    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function updateKirim()
{
    global $koneksi;
    $id = $_GET["id"];
    $email = $_POST['email_admin'];

    $admin = mysqli_query($koneksi, "SELECT id_admin FROM admin WHERE email_admin = '$email'");
    $id_adm = mysqli_fetch_assoc($admin);
    $id_adm = $id_adm['id_admin'];

    $tgl = time();

    $query = "UPDATE transaksi SET
        id_adm = '$id_adm',
        status_kirim = '1',
        tgl_kirim = '$tgl'
    WHERE id_transaksi = '$id' 
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
