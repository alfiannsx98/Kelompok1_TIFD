<!-- cek apakah submit sudh diklik atau belom -->
<!-- konek ke dbms -->

<?php
require 'functions.php';
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");
if (isset($_POST["submit"])) {
    // ambil data dari tiap elemen dalam form
    // nim diambil dari $_POST didalam form
    // melakukan query insert data

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "<script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
    </script>";
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
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">Nim anda : </label>
                <input type="text" id="nim" name="nim" required>
            </li>
            <br>
            <li>
                <label for="nama">nama anda : </label>
                <input type="text" id="nama" name="nama" required>
            </li>
            <br>
            <li>
                <label for="email">email anda : </label>
                <input type="text" id="email" name="email" required>
            </li>
            <br>
            <li>
                <label for="prodi">prodi anda : </label>
                <input type="text" id="prodi" name="prodi" required>
            </li>
            <br>
            <li>
                <label for="gambar">gambar anda : </label>
                <input type="file" id="gambar" name="gambar" required>
            </li>
            <br>
            <button type="submit" name="submit">Simpan Data</button>
        </ul>
    </form>
</body>

</html>