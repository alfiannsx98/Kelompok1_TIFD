<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../../controllers/admin/functions-admin.php';
$karyawan = query("SELECT * FROM admin");

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
                <th>ID Admin</th>
                <th>Nama Admin</th>
                <th>Email Admin</th>
                <th>Gambar Admin</th>
                <th>Admin Created</th>
                <th>Alamat</th>
            </tr>';
$i = 1;
foreach ($karyawan as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="gambar/' . $row["gambar_admin"] . '" width="50"></td>
                <td>' . $row["id_admin"] . '</td>
                <td>' . $row["nama_admin"] . '</td>
                <td>' . $row["email_admin"] . '</td>
                <td>' . $row["admin_created"] . '</td>
                <td>' . $row["alamat"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-admin.pdf', \Mpdf\Output\Destination::INLINE);
