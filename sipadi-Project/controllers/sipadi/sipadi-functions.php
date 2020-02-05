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
    $subtotal = htmlspecialchars($data['subtotal']);
    $beratTotal = htmlspecialchars($data['berat_total']);
    $tgl_transaksi = time();

    $result = mysqli_query($koneksi, "SELECT id_barangs FROM cart WHERE id_barangs='$id_barangs'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Barang telah dimasukkan keranjang');</script>";
        return false;
    }

    $query = "INSERT INTO cart VALUES('$hasil','$id_usr','$id_barangs','$qty_dibeli','$beratTotal','$subtotal','$tgl_transaksi')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function checkout($data)
{
    global $koneksi;
    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM transaksi");
    $field = mysqli_num_rows($rowDB1);
    $brg = "IDTR";
    $d = date('mdy', time());

    $hasil = $brg . $d . "0" . ($field + 1);

    $idTransaksi = $hasil;
    $id_admin = "Belum Terkonfirmasi";
    $id_pembeli = htmlspecialchars($data['id_users']);
    $id_toko = "IDT001";
    $alamat_kirim = htmlspecialchars($data["alamat_kirim"]);
    $tgl_kirim = "00/00/0000";
    $ongkir = htmlspecialchars($data["ongkir_kurir"]);
    $total_harga = htmlspecialchars($data["harga_subtotal"]);
    $total_final = htmlspecialchars($data["harga_final"]);
    $status_bayar = htmlspecialchars($data["status_bayar"]);
    $status_kirim = htmlspecialchars($data["status_kirim"]);
    $tgl_transaksi = date('Y-m-j', time());
    $no_rekening = "Belum Terisi";

    $bukti_bayar = "checkout.jpg";

    // $bukti_bayar = uploadBukti();
    // if (!$bukti_bayar) {
    //     $bukti_bayar = "checkout.jpg";
    // }

    $hitungExp = mysqli_query($koneksi, "SELECT * FROM dtl_transaksi");
    $hitungExp1 = mysqli_num_rows($hitungExp);
    $query = "INSERT INTO transaksi VALUES('$idTransaksi','$id_admin','$id_pembeli','$id_toko','$alamat_kirim','$tgl_kirim','$ongkir','$total_harga','$total_final','$status_bayar','$status_kirim','$tgl_transaksi','$bukti_bayar','$no_rekening')";

    mysqli_query($koneksi, $query);
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


    for ($j = 0; $j <= $number; $j++) {
        $hitungExp1++;
        if (trim($_POST["harga_satuan"][$j] != '') && trim($_POST["jml_dibeli_tmp"][$j] != '')) {
            $dlt = "DELETE FROM cart WHERE id_cart='$i' OR id_users='$id_pembeli'";
            mysqli_query($koneksi, $dlt);
        }
    }
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

function updateTr($data)
{
    global $koneksi;

    $id = $data["id"];
    $rekening = htmlspecialchars($data["rekening_pembeli"]);
    $gambar = uploadBukti();
    if (!$gambar) {
        echo "<script>
        alert('Gambar gagal diupload!');
            </script>";
        return false;
    }
    $query = "UPDATE transaksi SET
                bukti_transfer = '$gambar',
                rekening_pembeli = '$rekening'
            WHERE id_transaksi = '$id' 
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function tambahCont($data)
{
    global $koneksi;

    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM contact");
    $field = mysqli_num_rows($rowDB1);
    $cont = "CONT";
    $d = date('m', time());

    $hasil = $cont . $d . "0" . ($field + 1);

    $id = $hasil;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $pesan = htmlspecialchars($data["pesan"]);






    $query = "INSERT INTO contact VALUES('','$nama','$email','$no_hp','$pesan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function gantiPass($data)
{
    global $koneksi;

    $id_pembeli = $data['id_pembeli'];
    $passwordLama = mysqli_real_escape_string($koneksi, $data['passwordLama']);
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password1 = mysqli_real_escape_string($koneksi, $data['password1']);

    $cek_password_lama = password_hash($passwordLama, PASSWORD_DEFAULT);

    $cekBenar = mysqli_query($koneksi, "SELECT password_pembeli FROM pembeli WHERE id_pembeli='$id_pembeli' AND password_pembeli='$cek_password_lama'");
    if (mysqli_fetch_assoc($cekBenar)) {
        echo "<script>alert('Password Lama anda Salah!')</script>";
        return false;
    }
    if ($password !== $password1) {
        echo "<script>alert('Password tidak cocok');</script>";
        return false;
    }
    $passwordBaru = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE pembeli SET 
            password_pembeli = '$passwordBaru'
            WHERE id_pembeli = '$id_pembeli'            
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
