<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username dan password
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        // ngecek apakah ada data ?  jika ada maka akan lanjut kebawah
        // cek password
        $row = mysqli_fetch_assoc($result);
        // $row itu yg ada di db(form nya)
        if (password_verify($password, $row["password"])) {
            // jika cocok maka lanjut ke halaman index
            $_SESSION["login"] = true;
            // ngecek session untuk login nya

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>LOGIN</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style=italic;">Username/password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Logiin!</button>
            </li>
        </ul>
    </form>
</body>

</html>