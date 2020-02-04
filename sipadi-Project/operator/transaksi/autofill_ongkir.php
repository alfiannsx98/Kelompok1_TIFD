<?php
require '../../controllers/transaksi/functions-transaksi.php';

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id_kurir='$id'");
$ongkir = mysqli_fetch_array($sql);
$data = array('ongkir_kurir' => $ongkir['ongkir_kurir']);
echo json_encode($data);
