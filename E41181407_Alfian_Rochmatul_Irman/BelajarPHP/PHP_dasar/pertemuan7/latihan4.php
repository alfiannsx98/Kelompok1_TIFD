<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_POST["submit"])) : ?>
        <h1>Halo Selamat Datang <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>
    <h1>POST</h1>
    <!-- mengirim data akan dialamatkan didalam form action, nanti dimasukkan didalam form action="" -->
    <!-- dilengkapi dgn method , bebas bisa dgn post/get -->
    <!-- jangan lupa dikasih atribut didalam form nya! -->
    <form action="" method="post">
        Masukkan Nama : untuk halaman ini!
        <input type="text" name="nama">
        <br>
        <br>
        <button type="submit" name="submit">Simpan Data!</button>
    </form>
    <br>
    <br>
    <form action="latihan5.php" method="post">
        Masukkan Nama : untuk halaman latihan 5 tetapi dengan post
        <input type="text" name="nama">
        <br>
        <br>
        <button type="submit" name="submit">Simpan Data!</button>
    </form>
    <br>
    <br>
    <form action="latihan5.php" method="get">
        Masukkan Nama : untuk halaman latihan 5 tetapi dengan get (mendapatkan suatu url!)
        <input type="text" name="nama">
        <br>
        <br>
        <button type="submit" name="submit">Cek Get!</button>
    </form>
</body>

</html>