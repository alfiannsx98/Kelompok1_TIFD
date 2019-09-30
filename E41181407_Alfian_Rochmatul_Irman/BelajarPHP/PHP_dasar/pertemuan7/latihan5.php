<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- isi dari $_POST disesuaikan dengan name yang ada di inputan, contoh name="nama" -->
    <h1>jangan kahwatir penggunaan salah satu akan terjadi error dikarenakan ya satu2 zz</h1>
    <h1>selamat datang <?= $_POST["nama"]; ?>!</h1>
    <h1>Selamat Datang (menggunakan Get) <?= $_GET["nama"]; ?></h1>
</body>

</html>