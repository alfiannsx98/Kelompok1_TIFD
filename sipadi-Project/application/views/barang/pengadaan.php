
<?php
require_once '../../controllers/barang/functions-barang.php';
require_once 'header.php';

session_start();
$id = $_GET['id'];
$barang = query("SELECT * FROM barang WHERE id_brg = '$id'")[0];


if (isset($_POST["update"])) {
    if (ubahBrg($_POST) > 0) {
        echo "    
        <script>
            alert('data berhasil Diedit!');
        </script>";
    } else {
        echo "    
        <script>
            alert('data gagal Diedit!');
        </script>";
    }
    var_dump(ubahBrg($_POST));
}
$_POST = $_SESSION;
if (!isset($_SESSION["login"])) {
    header("Location: ../../login/login.php");
    exit;
}
if (($_POST["level"] == 2)) {
    header("Location: ../admin/");
    exit;
}
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);
?>



<?php require_once 'footer.php' ?>