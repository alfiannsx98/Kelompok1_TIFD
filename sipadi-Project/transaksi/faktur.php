<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../controllers/transaksi/functions-transaksi.php';
$id = $_GET['id'];
$transaksi = query("SELECT `transaksi`.*,`admin`.`nama_admin`,`pembeli`.`nama_pembeli`,`toko`.`nama_toko`
FROM `transaksi` 
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
        <link rel="stylesheet" href="css/print.css">
        <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 20px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }

        .garistepi {
            border: 2px solid black;
        }
    </style>
    </head>
    <body style="font-family:tahoma; font-size:8pt;" class="garistepi">
    <center>
    <table style="width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;" border="0">
        <td width="70%" align="left" style="padding-right:80px; vertical-align:top">
            <span style="font-size:12pt"><b>SUMBERDADI</b></span></br>Jl. Wolter Monginsidi No.89, Langsepam, Rowo
            Indah, Kec. Ajung, Kabupaten Jember, Jawa Timur</br>Telp : 0594094545
        </td>
        <td style="vertical-align:top" width="30%" align="left">
            <b><span style="font-size:12pt">FAKTUR PENJUALAN</span></b></br>
            ID Transaksi : ' . $row['id_transaksi'] . '</br>
            Tanggal :' . $row['tgl_transaksi'] . '</br>
        </td>
    </table>
    <table style="width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;" border="0">
        <td width="70%" align="left" style="padding-right:80px; vertical-align:top">
            Nama Admin : ' . $row['nama_admin'] . '</br>
            Alamat : ' . $row['alamat_kirim'] . '
        </td>
        <td style="vertical-align:top" width="30%" align="left">
            No Telp : 087654676543
        </td>
    </table>
    <table cellspacing="0" style="width:600px; font-size:12pt; font-family:calibri;  border-collapse: collapse;"
        border="1">

        <tr align="center">
            <td width="30%">Kode Barang</td>
            <td width="35%">Nama Barang</td>
            <td width="30%">Harga</td>
            <td width="30%">Jumlah Dibeli</td>
            <td width="20%">Ongkir</td>
            <td width="30%">Total Harga</td>
        <tr>';
    foreach ($dtlTr as $dttr) {
        $html .=
            '<tr>
        <td>' . $dttr['id_barang'] . '</td>
        <td>' . $dttr['nama_brg'] . '</td>
        <td>' . number_format($dttr['harga_satuan']) . '</td>
        <td>' . $dttr['jumlah_beli'] . '</td>
        <td>' . $row['ongkir_kurir'] . '</td>
        <td>' . $dttr['total_harga'] . '</td>
        <tr<tr>
    <tr>';
    }
    $html .=
        '<tr>
        <td colspan="5">
        <div style="text-align:right">Total Yang Harus Di Bayar Adalah : </div>
    </td>
    <td style="text-align:right">' . $row['total_final'] . '</td>
                    </tr>
            ';
}
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-transaksi-' . $id . '.pdf', \Mpdf\Output\Destination::INLINE);
