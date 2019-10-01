<!-- cek apakah submit sudh diklik atau belom -->
<!-- konek ke dbms -->

<?php
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");
if (isset($_POST["submit"])) { }
// ambil data dari tiap elemen dalam form
// nim diambil dari $_POST didalam form
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$prodi = $_POST["prodi"];
$gambar = $_POST["gambar"];

// melakukan query insert data

$query = "INSERT 
INTO mahasiswa
VALUES ('','$nama','$nim','$email','$prodi','$gambar')";

mysqli_query($koneksi, $query);
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
                <input type="text" id="nim" name="nim">
            </li>
            <br>
            <li>
                <label for="nama">nama anda : </label>
                <input type="text" id="nama" name="nama">
            </li>
            <br>
            <li>
                <label for="email">email anda : </label>
                <input type="text" id="email" name="email">
            </li>
            <br>
            <li>
                <label for="prodi">prodi anda : </label>
                <input type="text" id="prodi" name="prodi">
            </li>
            <br>
            <li>
                <label for="gambar">gambar anda : </label>
                <input type="text" id="gambar" name="gambar">
            </li>
            <br>
            <button type="submit" name="submit">Simpan Data</button>
        </ul>
    </form>
</body>

</html>