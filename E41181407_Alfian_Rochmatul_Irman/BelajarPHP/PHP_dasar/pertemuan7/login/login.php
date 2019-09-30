<?php
// cek apakah tombol submit sudh ditekan atau belum
// cek username dan password, jika bnr maka redirect ke halaman admin, jika salah tampilkan pesan kesalahan

if (isset($_POST["submit"])) {
    if ($_POST["username"] == "admin" && $_POST["password"] == "indowebster9") {
        header("Location: admin.php");
        exit;
    } else {
        $error = true;
    }
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
    <h1>Login Admin!</h1>
    <?php if (isset($error)) : ?>
        <p style="color:red; font-style=italic;">username/password salah!</p>
    <?php endif; ?>
    <!-- login menggunakan method post dikarenakan tidak menggunakan url, jika get nanti password bisa ketauan -->
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
                <br>
            </li>
            <br>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <button type="submit" name="submit">Login!</button>
        </form>
    </ul>
</body>

</html>