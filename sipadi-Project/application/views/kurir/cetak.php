<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../../controllers/barang/functions-barang.php';
$barang = query("SELECT * FROM kurir");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar kurir</title>
    </head>
    <body>
        <h1>Daftar kurir</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>ID kurir</th>
                <th>Nama kurir</th>
                <th>Kota Tujuan</th>
                <th>Ongkir Kurir</th>
            </tr>';
$i = 1;
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["id_kurir"] . '</td>
                <td>' . $row["nama_kurir"] . '</td>
                <td>' . $row["kota_tujuan"] . '</td>
                <td>Rp. ' . $row["ongkir_kurir"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-Kurir.pdf', \Mpdf\Output\Destination::INLINE);
