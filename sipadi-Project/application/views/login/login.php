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
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css" type="text/css">

    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <h4 class="text-center">Form Login</h4>
        <hr>
        <?php if (isset($error)) : ?>
            <p class="alert-danger">Username/Password Salah</p>
        <?php endif; ?>
        <form method="post" class="user">
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="email_admin" class="form-control" placeholder="Masukan Username Anda">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password_admin" class="form-control" placeholder="Masukan Password Anda">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="../sipadi/" class="btn btn-success btn-user">Kembali</a>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>