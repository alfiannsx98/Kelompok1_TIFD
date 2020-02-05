<?php
require 'controllers/sipadi/sipadi-functions.php';
session_start();

$id = $_GET['id'];
if (isset($_SESSION['login_pembeli']) == 1) {
    $mail = $_SESSION['email'];
    $result = mysqli_query($koneksi, "SELECT id_pembeli FROM pembeli WHERE email_pembeli = '$mail'");
    $result1 = mysqli_fetch_assoc($result);
    $result = $result1['id_pembeli'];
} else {
    header('Location: index.php');
    exit;
}
?>
<?php

if (isset($_POST["ganti"])) {
    if (gantiPass($_POST) > 0) {
        echo "<script>alert('Password berhasil diubah');</script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>
<?php require 'login-pembeli/header.php'; ?>

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Ganti Password</h1>
</div>
<form class="user" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_pembeli" value="<?= $_GET['id']; ?>">
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password" name="passwordLama" placeholder="Masukkan password lama anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password baru anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan ulang password baru anda" required>
        </div>
    </div>
    <button class="btn btn-success btn-user btn-block" name="ganti" type="submit">
        Ganti Password
    </button>
    <a class="btn btn-primary btn-user btn-block" name="batal" href="index.php">
        BATAL
    </a>
    <hr>
</form>
<?php require 'login-pembeli/footer.php'; ?>