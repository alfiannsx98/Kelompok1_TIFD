<?php
require_once __DIR__ . '../templates/vendor/autoload.php';

require '../controllers/kategori/functions-kategori.php';
$id = $_GET['id'];
$barang = query("SELECT * FROM kategori WHERE id_kategori='$id'");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar Barang Satuan</title>
    </head>
    <body>
        <h1>Daftar Kategori Satuan</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
            </tr>';
$i = 1;
foreach ($kategori as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="gambar/' . $row["gmbr"] . '" width="50"></td>
                <td>' . $row["id_kategori"] . '</td>
                <td>' . $row["nama_kategori"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kategori.pdf', \Mpdf\Output\Destination::INLINE);
