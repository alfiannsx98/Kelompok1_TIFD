<?php
require '../../../application/controllers/login/functions-login.php';
require_once 'login_header.php';
session_start();

if (isset($_COOKIE['nik']) && isset($_COOKIE['key'])) {
    $nik = $_COOKIE['nik'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan nik nya
    $result = mysqli_query($koneksi, "SELECT email_admin FROM admin WHERE nik='$nik'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['email_admin'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: ../admin/");
    exit;
}

if (isset($_POST["login"])) {
    $email = $_POST["email_admin"];
    $password = $_POST["password_admin"];

    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password_admin"])) {
            $_SESSION["login"] = true;
            $_SESSION = $_POST;

            if (isset($_POST['remember'])) {
                setcookie('nik', $row['nik'], time() + 60);
                setcookie('key', hash('sha256', $row['email_admin']), time() + 60);
            }
            header("location: ../admin/");
            exit;
        }
    }
    $error = true;
}

?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card o-hidden boreder-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                <?php if (isset($error)) : ?>
                                    <p class="alert-danger">Username/Password Salah</p>
                                <?php endif; ?>
                            </div>
                            <form action="" method="post" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email_admin" name="email_admin" placeholder="Masukkan Email Anda" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="masukkan Password" value="">
                                </div>
                                <hr>
                                <!-- <input type="checkbox" name="remember" id="remember" class="">
                                <label for="remember">Remember Me</label> -->
                                <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                <a href="#" class="btn btn-success btn-user btn-block">kembali ke laman awal</a>
                            </form>
                            <br>
                            <div class="text-center">
                                <a class="small" href="reset-password.php">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a href="register.php" class="small">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'login_footer.php'; ?>