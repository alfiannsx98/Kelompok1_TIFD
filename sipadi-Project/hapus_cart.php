<?php
session_start();
if (!isset($_SESSION['login_pembeli']) == 1) {
    header('Location: index.php');
    exit;
    require 'includes/header.php';
}
require 'controllers/sipadi/sipadi-functions.php';

$id = $_GET["id"];

if (hapusCart($id) > 0) {
    echo "    
        <script>
            document.location.href = 'cart.php';
        </script>";
} else {
    echo "    
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'cart.php';
        </script>";
}
