<?php
require_once '../../controllers/admin/functions-admin.php';
require_once 'header.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

if (isset($_POST["submit"])) {
    if (tambahAdm($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambah');
            </script>
        ";
    }
}

$_POST = $_SESSION;
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_array($sql);
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
                <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_admin"> Nama Admin : </label>
                        <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Masukan Nama Admin" title="Isikan data dengan benar" required pattern="[a-zA-Z\s]+">
                    </div>
                    <div class="form-group">
                        <label for="email_admin"> Email Admin : </label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" title="Isikan data dengan benar" placeholder="Masukan Email Admin" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_admin"> Alamat Admin : </label>
                        <textarea name="alamat_admin" class="form-control" id="alamat_admin" cols="30" rows="6" placeholder="Masukkan Alamat Admin" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password_admin"> Password Admin : </label>
                        <input type="password" name="password_admin" class="form-control form-control-user" placeholder="Masukkan password admin" title="Isikan data Minimum 8 Digit" maxlength="16" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="password_admin1"> Ulangi Password Admin : </label>
                        <input type="password" name="password_admin1" class="form-control form-control-user" placeholder="Masukkan password admin" maxlength="16" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="gmbr"> Gambar Admin : </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control form-control-user" id="gambar_admin" name="gambar_admin">
                            <label for="gambar_admin" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <input type="hidden" name="admin_created" value="<?= time(); ?>">
                    <input type="hidden" name="level" value="2">
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../../application/controllers/login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>