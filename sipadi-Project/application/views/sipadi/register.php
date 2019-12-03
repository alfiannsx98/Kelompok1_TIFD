<?php
require '../../controllers/login-pembeli/functions-login-pembeli.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>alert('user baru berhasil ditambahkan');</script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>
<?php require '../../views/login-pembeli/header.php'; ?>

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
</div>
<form class="user" method="post" action="../../controllers/login-pembeli/PHPMailer/config-mail.php" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="nama_pembeli" name="nama_pembeli" placeholder="Masukkan nama Pembeli" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="email_pembeli" name="email_pembeli" placeholder="Masukkan email anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan password anda yang kedua" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp Anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="input-group col-sm-12 mb-3 mb-sm-0">
            <div class="input-group-prepend">
                <span class="input-group-text" id="gambar_pembeli">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar_pembeli" name="gambar_pembeli" aria-describedby="gambar_pembeli">
                <label class="custom-file-label">Pilih Gambar Profil Anda</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan NIK anda" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="input-group col-sm-12 mb-3 mb-sm-0">
            <div class="input-group-prepend">
                <span class="input-group-text" id="gambar_nik">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar_nik" name="gambar_nik" aria-describedby="gambar_nik">
                <label class="custom-file-label">Pilih Gambar NIK anda</label>
            </div>
        </div>
    </div>
    <button class="btn btn-success btn-user btn-block" name="register" type="submit">
        Register Account
    </button>
    <a class="btn btn-primary btn-user btn-block" name="batal" href="index.php">
        BATAL
    </a>
    <hr>
</form>
<?php require '../../views/login-pembeli/footer.php'; ?>