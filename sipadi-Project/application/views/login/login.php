<?php
require '../../../application/controllers/login/functions-login.php';
session_start();

if (isset($_COOKIE['ID_ADMIN']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['ID_ADMIN'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan id nya
    $result = mysqli_query($koneksi, "SELECT EMAIL_ADMIN FROM admin WHERE ID_ADMIN=$id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['EMAIL_ADMIN'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $email = $_POST["EMAIL_ADMIN"];
    $password = $_POST["PASSWORD_ADMIN"];

    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE EMAIL_ADMIN = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["PASSWORD_ADMIN"])) {
            $_SESSION["login"] = true;
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>

    <link rel="stylesheet" href="../../../assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
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
                                        <?php else : ?>
                                            <p class="alert-success">Login Sukses</p>
                                        <?php endif; ?>
                                    </div>
                                    <form action="" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="EMAIL_ADMIN" name="EMAIL_ADMIN" placeholder="Masukkan Email Anda" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="PASSWORD_ADMIN" name="PASSWORD_ADMIN" placeholder="masukkan Password" value="">
                                        </div>
                                        <hr>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                        <a href="#" class="btn btn-success btn-user btn-block">kembali ke laman awal</a>
                                    </form>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Belum punya akun? Daftar sini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../assets/js/sb-admin-2.min.js"></script>
</body>

</html>