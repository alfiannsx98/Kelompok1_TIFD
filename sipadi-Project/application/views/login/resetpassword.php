<?php
require_once 'login_header.php';
require '../../controllers/login/functions-login.php';
include("../../controllers/login/PHPMailer/koneksi.php");

if (!isset($_GET["code"])) {
    exit("Tidak bisa menemukan Kode!");
}
$code = $_GET["code"];

$queryEmail = mysqli_query($koneksi, "SELECT email FROM token_admin WHERE kode='$code'");
if (mysqli_num_rows($queryEmail) === 0) {
    echo "Maaf Kode yang anda minta tidak ditemukan";
    echo "<a href='login.php'>Kembali</a>";
}
if (isset($_POST["simpan"])) {
    $password_admin = mysqli_real_escape_string($koneksi, $_POST["password_admin"]);
    $password_admin1 = mysqli_real_escape_string($koneksi, $_POST["password_admin1"]);
    $row = mysqli_fetch_array($queryEmail);
    $email = $row["email"];
    if ($password_admin !== $password_admin1) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }
    $password = password_hash($password_admin, PASSWORD_DEFAULT);
    $query = mysqli_query($koneksi, "UPDATE admin SET password_admin='$password' WHERE email_admin='$email'");

    if ($query) {
        $query = mysqli_query($koneksi, "DELETE FROM token_admin WHERE code='$code'");
        exit("password terupdate");
    } else {
        exit("ada sesuatu yang salah!");
    }

    // mysqli_query($koneksi, $query);

    // return mysqli_affected_rows($koneksi);
}
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card o-hidden boreder-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="Masukkan password anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="masukkan password anda yang kedua">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button type="submit" name="simpan" class="btn btn-success">Simpan!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'login_footer.php'; ?>