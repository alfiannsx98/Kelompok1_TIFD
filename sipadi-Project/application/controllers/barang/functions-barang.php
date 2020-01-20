
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
function ubahBrg($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_barang"]);
    $kategori = htmlspecialchars($data["id_kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $hitungExp = mysqli_query($koneksi, "SELECT * FROM expired");
    $hitungExp1 = mysqli_num_rows($hitungExp);

    if ($_FILES['gmbr']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadBrg();
    }

    $number = count($_POST["stok"]);
    $number1 = count($_POST["expired"]);
    $idbrg = ($_GET['id']);
    $idExp = $data["id_expired"];
    if ($number >= 1 && $number1 >= 1) {
        for ($i = 0; $i < $number; $i++) {
            $sql = "UPDATE dtl_brg SET
                stok = '" . mysqli_real_escape_string($koneksi, $_POST["stok"][$i]) . "',
                expired = '" . mysqli_real_escape_string($koneksi, $_POST["expired"][$i]) . "'
            WHERE id_exp = '$idExp[$i]' AND id_brg = '$idbrg'
            ";
            mysqli_query($koneksi, $sql);
        }
    }
    $query = "UPDATE barang SET
    nama_brg = '$nama',
    id_ktg = '$kategori',
    gambar_brg = '$gambar',
    harga_brg = '$harga',
    deskripsi_brg = '$deskripsi'
    WHERE id_brg = '$id' 
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function tambahBrg($data)
{
    global $koneksi;
    // $rowDB2 = mysqli_query($koneksi, "SELECT * FROM expired");
    // $field1 = mysqli_num_rows($rowDB2);
    // $j = ($field1 + 1);
    $rowDB1 = mysqli_query($koneksi, "SELECT * FROM barang");
    $field = mysqli_num_rows($rowDB1);
    $brg = "IDB";
    $d = date('dm', time());
    $hasil = $brg . $d . "0" . ($field + 1);
    $idBrg = $hasil;
    $nama = htmlspecialchars($data["nama_barang"]);
    $kategori = htmlspecialchars($data["id_kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tgl_upload = time();
    $gambar_brg = uploadBrg();
    $is_active = 0;
    if (!$gambar_brg) {
        return false;
    }
    $hitungExp = mysqli_query($koneksi, "SELECT * FROM expired");
    $hitungExp1 = mysqli_num_rows($hitungExp);
    $hasil = mysqli_query($koneksi, "SELECT nama_brg FROM barang WHERE nama_brg = '$nama'");
    if (mysqli_fetch_assoc($hasil)) {
        echo "<script>
        alert('Data barang sudah terdaftar!');
        </script>";
        return false;
    }
    $query = "INSERT INTO barang VALUES('$idBrg','$nama','$kategori','$gambar_brg','$harga','$deskripsi','$tgl_upload','$is_active')";
    mysqli_query($koneksi, $query);
    $number = count($_POST["stok"]);
    $number1 = count($_POST["expired"]);
    if ($number >= 1 && $number1 >= 1) {
        for ($i = 0; $i < $number; $i++) {
            $hitungExp1++;
            if (trim($_POST["stok"][$i] != '') && trim($_POST["expired"][$i] != '')) {
                $sql = "INSERT INTO dtl_brg VALUES('$idBrg','" . mysqli_real_escape_string($koneksi, $_POST["stok"][$i]) . "','$hitungExp1','" . mysqli_real_escape_string($koneksi, $_POST["expired"][$i]) . "')";
                mysqli_query($koneksi, $sql);
                $sql1 = "INSERT INTO expired VALUES('$hitungExp1','" . mysqli_real_escape_string($koneksi, $_POST["expired"][$i]) . "','$idBrg')";
                mysqli_query($koneksi, $sql1);
            }
        }
    }

    return mysqli_affected_rows($koneksi);
}
function uploadBrg()
{
    $namaFile = $_FILES['gmbr']['name'];
    $ukuranFile = $_FILES['gmbr']['size'];
    $error = $_FILES['gmbr']['error'];
    $tmpName = $_FILES['gmbr']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Maaf yang telah anda uplaod bukan gambar');</script>";
    }
    if ($ukuranFile > 900000000) {
        echo "<script>alert('Maaf file yang anda upload terlalu besar!');</script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../views/barang/gambar/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapusBrg($id)
{
    global $koneksi;
    $qr_file = mysqli_query($koneksi, "SELECT gambar_brg FROM barang WHERE id_brg='$id'");
    $hsl =  mysqli_fetch_array($qr_file);
    if (!unlink("../../views/barang/gambar/" . $hsl["gambar_brg"])) {
        mysqli_query($koneksi, "DELETE FROM expired WHERE id_brg='$id'");
        mysqli_query($koneksi, "DELETE FROM dtl_brg WHERE id_brg='$id'");
        mysqli_query($koneksi, "DELETE FROM barang WHERE id_brg='$id'");
        return mysqli_affected_rows($koneksi);
    } else {
        unlink("../../views/barang/gambar/" . $hsl["gambar_brg"]);
        mysqli_query($koneksi, "DELETE FROM expired WHERE id_brg='$id'");
        mysqli_query($koneksi, "DELETE FROM dtl_brg WHERE id_brg='$id'");
        mysqli_query($koneksi, "DELETE FROM barang WHERE id_brg='$id'");
        return mysqli_affected_rows($koneksi);
    }
}
