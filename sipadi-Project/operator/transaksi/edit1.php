<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
if (!($_POST["level"] == 2)) {
    header("Location: ../admin/");
    exit;
}
$_POST = $_SESSION;

require '../../../controllers/transaksi/functions-transaksi.php';

$id = $_GET["id"];
$email = $_POST['email_admin'];
if (updateKirim($id) > 0) {
    echo "    
        <script>
            alert('data berhasil Diedit!');
            document.location.href = 'index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bayar Data</title>
</head>

<body>

</body>

</html>