<?php
require '../../../application/controllers/login/functions-login.php';

session_start();

if (isset($_COOKIE['id_admin']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_admin'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan id nya
    $result = mysqli_query($koneksi, "SELECT email_admin FROM admin WHERE id_admin='$id'");
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
    $level = mysqli_query($koneksi, "SELECT level FROM admin WHERE email_admin = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $lv = mysqli_fetch_assoc($level);
        if ($lv['level'] != 1) {
            if (password_verify($password, $row["password_admin"])) {
                $_POST["level"] = 2;
                $_SESSION["login"] = true;
                $_SESSION = $_POST;
                header("location: ../operator/");
                exit;
            }
        } else {
            if (password_verify($password, $row["password_admin"])) {
                $_POST["level"] = 1;
                $_SESSION["login"] = true;
                $_SESSION = $_POST;
                header("location: ../admin/");
                exit;
            }
        }
    }
    $error = true;
}
require_once 'login_header.php';
?>

<body class="bg-gradient-primary ">
    <div class="container"></div>

    <div class="col-lg-6 ">

        <!-- Outer Row -->
        <div class="card o-hidden border-0 shadow-lg-6 my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                            </div>
                            <?php if (isset($error)) : ?>
                                <p class="alert-danger">Username/Password Salah</p>
                            <?php endif; ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php require_once 'login_footer.php'; ?>