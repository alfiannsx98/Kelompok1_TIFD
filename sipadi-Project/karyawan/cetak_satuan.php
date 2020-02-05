<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../controllers/admin/functions-admin.php';
$id = $_GET['id'];
$karyawan = query("SELECT * FROM admin WHERE id_admin='$id'");

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
        <h1>Daftar Barang Satuan</h1>
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
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="gambar/' . $row["gambar_brg"] . '" width="50"></td>
                <td>' . $row["id_brg"] . '</td>
                <td>' . $row["nama_brg"] . '</td>
                <td>' . $row["id_ktg"] . '</td>
                <td>Rp. ' . $row["harga_brg"] . '</td>
                <td>' . $row["deskripsi_brg"] . '</td>
                <td>' . $row["tgl_upload"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-barang.pdf', \Mpdf\Output\Destination::INLINE);
