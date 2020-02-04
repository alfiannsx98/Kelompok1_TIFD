<?php
require_once '../controllers/kategori/functions-kategori.php';
require_once 'header.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");


if (isset($_POST["submit"])) {
    if (tambahKtg($_POST) > 0) {
        echo "    
        <script>
            alert('data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "    
        <script>
            alert('data gagal ditambah!');
        </script>";
    }
}
$_POST = $_SESSION;
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}
if (($_POST["level"] == 2)) {
    header("Location: ../operator/");
    exit;
}
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);
?>
<?php
require 'sidebar.php';
?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require_once '../templates/topbar.php'; ?>

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username"> Nama Kategori : </label>
                        <input type="text" class="form-control form-control-user" id="nama_kategori" name="nama_kategori" placeholder="Masukan Kategori Anda" required pattern="[a-zA-Z0-9\s]+">
                    </div>
                    <div class="form-group">
                        <label for="gmbr_ktg"> Gambar Kategori : </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gmbr_ktg" name="gmbr_ktg">
                            <label for="gmbr_ktg" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Simpan Data</button>
                </form>
                <br>
                <div class="text-center">
                    <div class="row">

                    </div>
                    <!-- Batas edit profil -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php require_once 'footer.php'; ?>