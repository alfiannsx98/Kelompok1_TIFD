<?php
require_once '../controllers/kurir/functions-kurir.php';
require_once 'header.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");

$id = $_GET['id'];
$kurir = query("SELECT * FROM kurir WHERE id_kurir = '$id'")[0];


if (isset($_POST["submit"])) {
    if (ubahKur($_POST) > 0) {
        echo "    
        <script>
            alert('data berhasil diedit!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diedit!');
        document.Location.href = 'index.php';
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
                <h1 class="h3 mb-0 text-gray-800">Edit Kurir</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $kurir["id_kurir"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $kurir["gmbr"]; ?>">
                    <div class="form-group">
                        <label for="username"> Nama Kurir : </label>
                        <input type="text" class="form-control form-control-user" id="nama_kurir" name="nama_kurir" placeholder="" value="<?= $kurir["nama_kurir"]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username"> Kota Tujuan : </label>
                        <input type="text" class="form-control form-control-user" id="kota_tujuan" name="kota_tujuan" value="<?= $kurir["kota_tujuan"]; ?>" required pattern="[a-zA-ZX\s]+">
                    </div>
                    <div class="form-group">
                        <label for="username"> Ongkir Kurir : </label>
                        <input type="number" class="form-control form-control-user" id="ongkir_kurir" name="ongkir_kurir" value="<?= $kurir["ongkir_kurir"]; ?>" required>
                    </div>
                    <hr>
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Update Data</button>
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
                    <a class="btn btn-primary" href="../application/controllers/login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>