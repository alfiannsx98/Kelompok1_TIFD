<?php
require '../controllers/sipadi/sipadi-functions.php';
session_start();

$id = $_GET['id'];

if (isset($_SESSION['login_pembeli']) == 1) {
    $mail = $_SESSION['email'];
    $result = mysqli_query($koneksi, "SELECT id_pembeli FROM pembeli WHERE email_pembeli = '$mail'");
    $result1 = mysqli_fetch_assoc($result);
    $result = $result1['id_pembeli'];
    require 'includes/header-login.php';
} else {
    header('Location: index.php');
    exit;
    require 'includes/header.php';
}

$cart = query("SELECT * FROM transaksi WHERE id_transaksi='$id'");

if (isset($_POST["upload"])) {
    if (updateTr($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal di Upload');
            </script>
        ";
    }
}
?>
<div class="container single_product_container">
    <div class="row">
        <div class="col">
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Daftar Transaksi</a></li>
                </ul>
            </div>
            <form action="" method="post" class="user" enctype="multipart/form-data">
                <div class="form-group">
                    <?= "Kode Transaksi : #" . $id; ?>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <label for="">Masukkan Nomor Rekening Anda :</label>
                        <input type="text" class="form-control" name="rekening_pembeli" id="rekening_pembeli" required>
                    </div>
                    <div class="input-group col-sm-12 mb-3 mb-sm-0">
                        <span class="form-control" id="gmbr">Upload : </span>
                        <input type="file" class="form-control" id="gmbr" name="gmbr" aria-describedby="gmbr" required>
                        <div>&nbsp;</div>
                        <button class="btn btn-primary" type="submit" name="upload">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php
    require 'includes/footer.php';
    ?>