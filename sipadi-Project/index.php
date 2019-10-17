<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>

    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= ('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden boreder-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form action="#" method="#" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email Anda" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placehodler="masukkan Password">
                                        </div>
                                        <hr>
                                        <button href="#" class="btn btn-primary btn-user btn-block">Login</button>
                                        <a href="#" class="btn btn-success btn-user btn-block">kembali ke laman awal</a>
                                    </form>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Belum punya akun? Daftar sini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
</body>

</html>