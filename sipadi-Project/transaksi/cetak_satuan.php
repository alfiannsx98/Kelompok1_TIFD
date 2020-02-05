<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../controllers/transaksi/functions-transaksi.php';
$id = $_GET['id'];
$transaksi = query("SELECT `transaksi`.*,`kurir`.`kota_tujuan`,`admin`.`nama_admin`,`pembeli`.`nama_pembeli`,`toko`.`nama_toko`
FROM `transaksi` 
JOIN `kurir` ON `kurir`.`id_kurir` = `transaksi`.`id_kurer`
JOIN `admin` ON `admin`.`id_admin` = `transaksi`.`id_adm`
JOIN `pembeli` ON `pembeli`.`id_pembeli` = `transaksi`.`id_pembeli`
JOIN `toko` ON `toko`.`id_toko` = `transaksi`.`id_toko`
WHERE `transaksi`.`id_transaksi` = '$id'
");

$dtl = query("SELECT `dtl_transaksi`.*,`barang`.`nama_brg`
FROM `dtl_transaksi`
JOIN `barang` ON `barang`.`id_brg` = `dtl_transaksi`.`id_barang`
WHERE `dtl_transaksi`.`id_tr` = '$id'
");

$mpdf = new \Mpdf\Mpdf();
$i = 1;
foreach ($transaksi as $row) {
    $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
</head>
<body>
    <h2>SumberDadi</h2>
    <p>Jl. Wolter Monginsidi No.89, Langsepam,</p>
    <p>Rowo Indah, Kec. Ajung, Kabupaten Jember, Jawa Timur 68175</p>
    <hr>
    <center>
        <h1>Laporan Transaksi</h1>
    </center>
    <p>ID Transaksi : ' . $row["id_transaksi"] . '</p> 
    <p>Nama Admin : ' . $row["nama_admin"] . '</p>
    <p>Nama Pembeli : ' . $row["nama_pembeli"] . '</p>
    <p>Alamat Kirim : ' . $row["alamat_kirim"] . '</p>
    <p>Tanggal Pengiriman : ' . $row["tgl_kirim"] . '</p>
    <p>Kota Tujuan : ' . $row["kota_tujuan"] . '</p>
    <p>Tanggal Transaksi : ' . $row["tgl_transaksi"] . '</p>
            ';
    $html .=
        '<table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah Dibeli</th>
        </tr>';
    foreach ($dtl as $dt_tr) {
        $html .=
            '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $dt_tr['nama_brg'] . '</td>
                        <td>Rp. ' .  number_format($dt_tr['harga_satuan']) . '</td>
                        <td>' . $dt_tr['jumlah_beli'] . '</td>
                    </tr>
            ';
    }

    // 

    $html .=    '
</table>
<h4>Ongkos Kirim : Rp.  ' . number_format($row['ongkir_kurir']) . '</h4>
<h4>Total Final : Rp.  ' . number_format($row['total_final']) . '</h4>
</body>
    </html>';
}
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-transaksi-' . $id . '.pdf', \Mpdf\Output\Destination::INLINE);
