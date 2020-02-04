<?php
require '../../controllers/login/functions-login.php';
session_start();
if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>alert('user baru berhasil ditambahkan');</script>";
        header("Location: login.php");
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

<body class="bg-gradient-success">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan NIK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Masukkan nama anda">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email_admin" name="email_admin" placeholder="Masukkan alamat email anda">
                                </div>
                                <div class="form-group row">
                                    <div class="input-group col-sm-12 mb-3 mb-sm-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="gambar_admin">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar_admin" name="gambar_admin" aria-describedby="gambar_admin">
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="Masukkan password anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="masukkan password anda yang kedua">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="admin_created" name="admin_created" value="<?php echo time(); ?>" hidden readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="level" name="level" value="2" hidden readonly>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" name="register" type="submit">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <!--<div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>-->
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