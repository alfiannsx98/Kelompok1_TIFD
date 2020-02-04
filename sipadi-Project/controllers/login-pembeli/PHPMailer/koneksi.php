<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
if (mysqli_connect_errno()) {
    echo "Gagal Konek!: " . mysqli_connect_errno();
}
