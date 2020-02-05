<?php
require_once __DIR__ . '../templates/vendor/autoload.php';

require '../controllers/barang/functions-barang.php';
$barang = query("SELECT * FROM transaksi");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar Transaksi</title>
    </head>
    <body>
        <h1>Daftar Transaksi</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>ID Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Alamat Kirim</th>
                <th>Tanggal Kirim</th>
            </tr>';
$i = 1;
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["id_transaksi"] . '</td>
                <td>' . $row["id_pembeli"] . '</td>
                <td>' . $row["alamat_kirim"] . '</td>
                <td>Rp. ' . $row["tgl_kirim"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-Transaksi.pdf', \Mpdf\Output\Destination::INLINE);
