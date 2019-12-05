<?php
require_once 'header.php';
require '../../controllers/profile/functions-profile.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");

if (isset($_POST["update"])) {
    if (ubahPassword($_POST) > 0) {
        echo "<script>alert('data berhasil diubah!');</script>";
    } else {
        echo "<script>alert('data gagal diubah!');</script>";
    }
}
// $_GET['id'];
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
while($gmbr = mysqli_fetch_assoc($sql)){
    $gbr = $gmbr["gambar_admin"];
    $id_admin = $gmbr["id_admin"];
}
?>

<!-- Sidebar -->
<?php
require '../templates/sidebar.php';
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
                <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <input type="hidden" name="id_admin" value="<?= $_GET['id'];?>">
                    <div class="form-group">
                        <label for="username"> Password Lama : </label>
                        <input type="password" class="form-control form-control-user" id="passwordLama" name="passwordLama" placeholder="Masukkan Pasword lama anda"  required>
                    </div>
                    <div class="form-group">
                        <label for="username"> Password Baru : </label>
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Pasword baru anda" required>
                    </div>
                    <div class="form-group">
                        <label for="username"> Konfirmasi Password Baru : </label>
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan password baru anda dan harus sama dengan password sebelumnya" required>
                    </div>
                    <hr>
                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Edit Password</button>
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
            <!-- End of Main Content -->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

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