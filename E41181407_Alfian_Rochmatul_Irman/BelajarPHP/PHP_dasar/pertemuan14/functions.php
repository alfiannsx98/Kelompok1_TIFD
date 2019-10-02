<?php

$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $koneksi;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);

    // upload gambar (menjalankan fungsi upload gambar), $gambar jika berhasil akan diisi dgn fungsi upload gambar
    // akan dikirimkan nama gambar dan dikirim gambar ke suatu direktori
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES ('','$nama','$nim','$email','$prodi','$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu!);
        </script>";
        return false;
    }

    // cek apakah gambar sudah diupload atau belum, dicek dengan cara ekstensi file nya
    // explode adalah fungsi untuk memecah sebuah string menjadi array,dipecah dgn delimiter
    // mengubah semua ekstensi menjadi huruf kecil menggunakan strtolower
    // ngecek suatu ekstensi didalam array
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar =  explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukanlah gambar!');
        </script>";
    }

    // cek jika ukuran terlalu besar, dibatasi ukurannya
    if ($ukuranFile > 2000000) {
        echo "<script>
            alert('Ukuran yang anda upload terlalu besar!');
        </script>";
    }
    // Generate nama baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($koneksi);
}
function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);



    // cek apakah user mengupload gambar baru
    // disini keadaan ketika mengupload gambar baru maka kondisi kedua terpenuhi, jika tidak maka kondisi 1 yg terpenuhi
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                prodi = '$prodi',
                gambar = '$gambar'
            WHERE id = $id
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR prodi LIKE '%$keyword%'";
    return query($query);
}


function register($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai!');
        </script>";
        return false;
    }

    // cek username apakah sudh ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username yang dipilih sudah terdaftar');</script>";
        return false;
    }

    // enkripsi sblm ditambahkan
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan databaru ke db
    mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password')");
    return mysqli_affected_rows($koneksi);
}
