<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$_POST = $_SESSION;

require '../../controllers/transaksi/functions-transaksi.php';

$id = $_GET["id"];
$email = $_POST['email_admin'];
if (updateKirim($id) > 0) {
    echo "    
        <script>
            alert('data berhasil Diedit!');
            document.location.href = 'index.php';
        </script>";
}
