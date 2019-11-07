<?php
if (isset($_POST['nickname']) && $_POST['nickname']) {
    // memasukan file koneksi ke database
    require_once 'config.php';
    // menyimpan variable yang dikirim Form
    $nama = $_POST['nickname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    // cek nilai variable
    if (empty($nama)) {
        header('location: ./register.php?error=' .base64_encode('Nama tidak boleh kosong'));
    }
    if (empty($username)) {
        header('location: ./register.php?error=' .base64_encode('Username tidak boleh kosong'));   
    }
    if (empty($password)) {
        header('location: ./register.php?error=' .base64_encode('Password tidak boleh kosong'));   
    }
    // validasi apakah password dengan repassword sama
    if ($password != $repassword) { // jika tidak sama
        header('location: ./register.php?error=' .base64_encode('Password tidak boleh sama'));   
    }
    // encryption dengan md5
    $password = md5($password);
    $level = 'member'; // default, 
    // SQL Insert
    $sql = "INSERT INTO users (nama, username, password, level_user) VALUES ('$nama', '$username', '$password', '$level')";
    $insert = $dbconnect->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = './register.php';</script>";
    } else {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = './login.php';</script>";
    }
}
?>