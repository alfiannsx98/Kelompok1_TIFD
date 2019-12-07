<?php

session_start();


$_POST = $_SESSION;
if (!isset($_SESSION["login"])) {
    header("Location: ../../login/login.php");
    exit;
}
if (($_POST["level"] == 2)) {
    header("Location: ../operator/");
    exit;
}
require '../../controllers/barang/functions-barang.php';

$id = $_GET["id"];


if (hapusBrg($id) > 0) {
    echo "    
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "    
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index.php';
        </script>";
}
