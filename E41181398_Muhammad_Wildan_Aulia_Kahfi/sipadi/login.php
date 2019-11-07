

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Form Login</title>
</head>
<body> 
    <br>
    <div class="row justify-content-center">
    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
    <?php
        if (isset($_GET['pesan'])) {
            if($_GET['pesan'] == "gagal"){
                echo "Login Gagal! Username anda atau Password anda salah" ;
            }elseif ($_GET['pesan'] == "logout") {
                echo "Anda telah Berhasil Logout";
            }elseif ($_GET['pesan'] == "belum_login") {
                echo "<center class='text-danger'>Anda harus login untuk mengakses halaman ini</center>";
            }
        }
    ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        </div>
    </div>
    
    <div class="container">
        <h4 class="text-center">Form Login</h4>
        <hr>
        <form action="cek_login.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <div class="input-group">
                    
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan Username Anda">
                </div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda">
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Login</button>
            <button type="reset" class="btn btn-secondary">Reset</button>

            <div class="text-center">
						<span class="txt1">
							Menu Utama
						</span>

						<a href="index.php" class="txt2 hov1">
							Back
						</a>
					</div>
        </form>
    </div>
    


<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>