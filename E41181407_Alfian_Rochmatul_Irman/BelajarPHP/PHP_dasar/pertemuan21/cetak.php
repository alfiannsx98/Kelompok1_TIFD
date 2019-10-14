<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/print.css">
        <title>Daftar Mahasiswa</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
            </tr>';
$i = 1;
foreach ($mahasiswa as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td><img src="img/' . $row["gambar"] . '" width="50"></td>
                <td>' . $row["nim"] . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $row["email"] . '</td>
                <td>' . $row["prodi"] . '</td>
            </tr>';
}

$html .=    '</table>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);