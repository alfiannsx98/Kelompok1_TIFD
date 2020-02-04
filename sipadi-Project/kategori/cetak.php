<?php
require_once __DIR__ . '../templates/vendor/autoload.php';

require '../controllers/barang/functions-barang.php';
$barang = query("SELECT * FROM Kategori");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daftar Kategori</title>
    </head>
    <body>

    <h2>SumberDadi</h2>
    <p>Jl. Wolter Monginsidi No.89, Langsepam,</p>
    <p>Rowo Indah, Kec. Ajung, Kabupaten Jember, Jawa Timur 68175</p>
    <hr>

        <h1>Daftar Kategori</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
            </tr>';
$i = 1;
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["id_kategori"] . '</td>
                <td>' . $row["nama_kategori"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kategori.pdf', \Mpdf\Output\Destination::INLINE);
