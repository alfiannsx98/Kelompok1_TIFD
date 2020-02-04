<?php
require_once 'login_header.php';
require '../../controllers/login/functions-login-pembeli.php';
include("../../controllers/login/PHPMailer/koneksi.php");

if (!isset($_GET["code"])) {
    exit("Tidak bisa menemukan Kode!");
}
$code = $_GET["code"];

$queryEmail = mysqli_query($koneksi, "SELECT email FROM token_user WHERE kode='$code'");
if (mysqli_num_rows($queryEmail) === 0) {
    echo "<div class='alert alert-danger' role='alert'>Maaf Kode yang anda minta tidak ditemukan. <a href='login.php' class='btn btn-success'>Kembali</a></div>";
    exit;
}
if (isset($_POST["simpan"])) {
    $password_pembeli = mysqli_real_escape_string($koneksi, $_POST["password_pembeli"]);
    $password_pembeli1 = mysqli_real_escape_string($koneksi, $_POST["password_pembeli1"]);
    $row = mysqli_fetch_array($queryEmail);
    $email = $row["email"];
    if ($password_pembeli !== $password_pembeli1) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Maaf Password yang anda masukkan tidak sama!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    } else {
        $password = password_hash($password_pembeli, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE pembeli SET password_pembeli='$password' WHERE email_pembeli='$email'");
        if ($query) {
            $query = mysqli_query($koneksi, "DELETE FROM token_user WHERE kode='$code'");
            echo "<a href='login.php' class='btn btn-success'>Kembali</a>";
        } else {
            echo "ada sesuatu yang salah!";
        }
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
                                        <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="Masukkan password anda" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="masukkan password anda yang kedua" required>
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
<?php require_once 'includes/footer.php'; ?>