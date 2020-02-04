<?php
require '../../controllers/transaksi/functions-transaksi.php';

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_brg='$id'");
$brg = mysqli_fetch_array($sql);
$data = array('harga_brg' => $brg['harga_brg']);
echo json_encode($data);
