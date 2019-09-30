<?php
echo date("l, d-M-Y");

echo "<br>";
echo time();
// unix timestamp / epoch time
// detik yang sudah berlalu sejak 1970 dikarenakan kesepakatan orang jaman itu
// LENGKAP DI DOKUMENTASI PHP NYA

// cara mengetahui 100 hari dari sekarang menggunakan fungsi berikut:
echo "<br>";
echo date("d-M-Y", time() + 60 * 60 * 24 * 100);
// diatas ini dibaca dengan cara, tampilkan hari sekian hari yg dijumlah dengan banyaknya jumlah detik

// membuat detik secara sendri
// mktime(0,0,0,0,0,0)
// jam,menit,detik,bulan,tanggal,tahun

echo "<br>";
echo date("l", mktime(0, 0, 0, 8, 25, 1985,));

// memasukkan format tanggal jadinya detik

echo strtotime("25 augustus 1985");
