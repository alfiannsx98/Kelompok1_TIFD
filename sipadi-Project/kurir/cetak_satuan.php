<?php
require_once __DIR__ . '../templates/vendor/autoload.php';

require '../controllers/kurir/functions-kurir.php';
$id = $_GET['id'];
$barang = query("SELECT * FROM kurir WHERE id_kurir='$id'");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar Kurir Satuan</title>
    </head>
    <body>
        <h1>Daftar Kurir Satuan</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>ID Kurir</th>
                <th>Nama Kurir</th>
                <th>Kota Tujuan</th>
                <th>Ongkir Kurir</th>
            </tr>';
$i = 1;
foreach ($kurir as $row) {
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
$mpdf->Output('daftar-kurirs.pdf', \Mpdf\Output\Destination::INLINE);
