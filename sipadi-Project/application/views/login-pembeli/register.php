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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Page</title>

    <link rel="stylesheet" href="../../../assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nama_pembeli" name="nama_pembeli" placeholder="Masukkan nama Pembeli">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="email_pembeli" name="email_pembeli" placeholder="Masukkan nama anda" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_pembeli" name="password_pembeli" placeholder="Masukkan password anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_pembeli1" name="password_pembeli1" placeholder="Masukkan password anda yang kedua">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor Hp Anda">
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
                                        <input type="text" class="form-control form-control-user" id="nik_pembeli" name="nik_pembeli" placeholder="Masukkan NIK anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group col-sm-12 mb-3 mb-sm-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="gambar_nik_pembeli">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar_nik_pembeli" name="gambar_nik_pembeli" aria-describedby="gambar_nik_pembeli">
                                            <label class="custom-file-label">Pilih Gambar NIK anda</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="user_created" name="user_created" value="<?php echo time(); ?>" hidden readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="is_active" name="is_active" value="0" hidden readonly>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" name="register" type="submit">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../assets/js/sb-admin-2.min.js"></script>

</body>

</html>