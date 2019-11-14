<?php
require_once 'header.php';
require '../../controllers/profile/functions-profile.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");

if (isset($_POST["update"])) {
    if (ubahPr($_POST) > 0) {
        echo "<script>alert('data berhasil diubah!');</script>";
    } else {
        echo "<script>alert('data gagal diubah!');</script>";
    }
}
// $_GET['id'];
$_POST = $_SESSION;
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);
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
                <h1 class="h3 mb-0 text-gray-800">Profile Admin</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <input type="hidden" name="nik" value="<?= $gmbr['nik']; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $gmbr["gambar_admin"]; ?>">
                    <div class="form-group">
                        <label for="username"> Nama : </label>
                        <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Masukan Nama Anda" value="<?= $gmbr['nama_admin']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username"> Email Admin : </label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="" value="<?= $gmbr['email_admin']; ?>" readonly>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="username"> Gambar Admin : </label>
                        <img src="<?= "../karyawan/gambar/" . $gmbr['gambar_admin']; ?>" class="img-thumbnail">
                    </div>
                    <div class="form-group col-sm">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_admin" name="gambar_admin">
                            <label for="gambar_admin" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username"> Alamat : </label>
                        <textarea name="alamat" class="form-control" cols="30" rows="7"><?= $gmbr['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username"> Tanggal Akun Dibuat : </label>
                        <input type="text" class="form-control form-control-user" id="admin_created" name="admin_created" placeholder="" value="<?= date('d F Y', $gmbr['admin_created']); ?>" readonly>
                    </div>
                    <hr>
                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Edit Profil</button>
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