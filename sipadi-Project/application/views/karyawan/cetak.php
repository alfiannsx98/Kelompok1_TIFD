<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../../controllers/barang/functions-barang.php';
$barang = query("SELECT * FROM admin");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar Admin</title>
    </head>
    <body>
        <h1>Daftar Admin</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>ID Admin</th>
                <th>Nama Admin</th>
                <th>Email Admin</th>
                <th>Akun Dibuat</th>
                <th>Alamat</th>
            </tr>';
$i = 1;
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="gambar/' . $row["gambar_admin"] . '" width="50"></td>
                <td>' . $row["id_admin"] . '</td>
                <td>' . $row["nama_admin"] . '</td>
                <td>' . $row["email_admin"] . '</td>
                <td>Rp. ' . $row["admin_created"] . '</td>
                <td>' . $row["alamat"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-Admin.pdf', \Mpdf\Output\Destination::INLINE);
