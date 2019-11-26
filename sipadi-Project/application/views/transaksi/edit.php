<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$_POST = $_SESSION;
require '../../controllers/transaksi/functions-transaksi.php';

$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi='$id'")[0];


if (updateByr($id) > 0) {
    echo "    
        <script>
            alert('data berhasil Diedit!');
            document.location.href = 'index.php';
        </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bayar Data</title>
</head>

<body>
    <form enctype="multipart/form-data" method="post" name="editkeun" id="editkeun">
        <div class="form-group">
            <table class="table table-bordered" hidden>
                <tr>
                    <td><label for="stok">Masukkan Stok Barang</label></td>
                    <td><label for="expired">Masukkan Expired Date</label></td>
                </tr>
                <?php $dtl_transaksi = query("SELECT * FROM dtl_transaksi WHERE id_tr='$id'"); ?>
                <?php $i = 1 ?>
                <?php foreach ($dtl_transaksi as $tr) : ?>
                    <tr>
                        <td>
                            <input type="number" name="harga_satuan[]" id="harga_satuan" class="form-control harga_satuan_list" value="<?= $tr['harga_satuan']; ?>">
                        </td>
                        <td>
                            <input type="number" name="jumlah_dibeli_tmp[]" id="jumlah_dibeli_tmp" value="<?= $tr['jumlah_beli']; ?>">
                        </td>
                        <td>
                            <input type="number" name="jumlah_beli[]" id="jumlah_beli" value="<?= $tr['jml_dibeli_tmp']; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php $i++; ?>
            </table>
        </div>
        <button type="submit" name="ok"></button>
        <script>
            document.getElementsByTagName('form')[0].submit()
        </script>
    </form>
</body>

</html>