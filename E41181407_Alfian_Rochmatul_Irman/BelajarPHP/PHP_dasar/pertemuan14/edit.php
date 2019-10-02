<!-- cek apakah submit sudh diklik atau belom -->
<!-- konek ke dbms -->

<?php
require 'functions.php';
$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // ambil data dari tiap elemen dalam form
    // nim diambil dari $_POST didalam form
    // melakukan query insert data

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "<script>
        alert('data gagal diubah!');
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

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <li>
                <label for="nim">Nim anda : </label>
                <input type="text" id="nim" name="nim" value="<?= $mhs["nim"] ?>" required>
            </li>
            <br>
            <li>
                <label for="nama">nama anda : </label>
                <input type="text" id="nama" name="nama" value="<?= $mhs["nama"]; ?>" required>
            </li>
            <br>
            <li>
                <label for="email">email anda : </label>
                <input type="text" id="email" name="email" value="<?= $mhs["email"]; ?>" required>
            </li>
            <br>
            <li>
                <label for="prodi">prodi anda : </label>
                <input type="text" id="prodi" name="prodi" value="<?= $mhs["prodi"]; ?>" required>
            </li>
            <br>
            <li>
                <label for="gambar">gambar anda : </label>
                <img src="img/<?= $mhs['gambar']; ?>" width="100" height="100" alt="">
                <input type="file" id="gambar" name="gambar">
            </li>
            <br>
            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>

</html>