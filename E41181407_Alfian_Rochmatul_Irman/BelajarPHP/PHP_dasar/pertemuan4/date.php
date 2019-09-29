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
