<?php
require_once 'header.php';
require '../../controllers/toko/functions-toko.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
$toko = query("SELECT * FROM toko");

if (isset($_POST["submit"])) {
    if (ubahTk($_POST) > 0) {
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
$sql = mysqli_query($koneksi, "SELECT gambar_admin FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);


?>
<?php require_once 'sidebar.php'; ?>

<!-- Modal -->
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

<!-- End Modal -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require_once '../templates/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ubah Data TOKO</h1>
            </div>
            <div class="col-lg-10">
                <?php foreach ($toko as $tk) : ?>
                    <form action="" class="user" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_toko" value="<?= $tk['id_toko']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $tk['gambar_sampul']; ?>">
                        <div class="form-group">
                            <label for="nama_toko"> Nama Toko : </label>
                            <input type="text" class="form-control form-control-user" name="nama_toko" value="<?= $tk['nama_toko']; ?>" required pattern="[a-zA-Z\s]+">
                        </div>
                        <div class="form-group">
                            <label for="alamat_toko"> Alamat Toko : </label>
                            <textarea name="alamat_toko" id="alamat_toko" class="form-control form-control" cols="30" rows="7" required><?= $tk['alamat_toko']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""> Gambar Lama : </label>
                            <br>
                            <img src="<?= "../toko/gambar/" . $tk['gambar_sampul']; ?>" height="500" width="700" class="img-thumbnail">
                        </div>
                        <div class="form-group">
                            <label for="gmbr"> Gambar Toko Baru : </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar_sampul" name="gambar_sampul">
                                <label for="gambar_sampul" class="custom-file-label">Pilih File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi"> Deskripsi Toko : </label>
                            <textarea name="deskripsi_toko" id="deskripsi_toko" class="form-control" cols="30" rows="10" required><?= $tk['deskripsi_toko']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Update Data</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End of Main Content -->
    </div>
    <?php require_once 'footer.php'; ?>