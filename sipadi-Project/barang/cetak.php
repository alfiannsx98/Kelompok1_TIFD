<?php
require_once __DIR__ . '../../templates/vendor/autoload.php';

require '../controllers/barang/functions-barang.php';
$barang = query("SELECT * FROM barang");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daftar Barang</title>
    </head>
    <body>
        <h2>SumberDadi</h2>
        <p>Jl. Wolter Monginsidi No.89, Langsepam,</p>
        <p>Rowo Indah, Kec. Ajung, Kabupaten Jember, Jawa Timur 68175</p>
        <hr>

        <center>
            <h1>Daftar Barang</h1>
        </center>        
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Satuan</th>
                <th>Deskripsi</th>
                <th>Tanggal Diupload</th>
            </tr>';
$i = 1;
foreach ($barang as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="gambar/' . $row["gambar_brg"] . '" width="50"></td>
                <td>' . $row["id_brg"] . '</td>
                <td>' . $row["nama_brg"] . '</td>
                <td>' . $row["id_ktg"] . '</td>
                <td>Rp. ' . number_format($row["harga_brg"]) . '</td>
                <td>' . $row["deskripsi_brg"] . '</td>
                <td>' . $row["tgl_upload"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-barang.pdf', \Mpdf\Output\Destination::INLINE);
