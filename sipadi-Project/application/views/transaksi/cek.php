<?php
require_once '../../controllers/transaksi/functions-transaksi.php';
require_once 'header.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");

$id = $_GET['id'];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = '$id'")[0];
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
                <h1 class="h3 mb-0 text-gray-800">Edit transaksi</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                        <table class="table table-bordered" id="editkeun" name="editkeun">
                            <tr>
                                <input type="hidden" name="email" value="<?= $email; ?>">
                                <td><label for="stok">harga satuan</label></td>
                                <td><label for="expired">Jumlah Beli</label></td>
                                <td><label for="expired">temporari jmlh beli</label></td>
                            </tr>
                            <?php $trnsksi = query("SELECT * FROM dtl_transaksi WHERE id_tr='$id'"); ?>
                            <?php $i = 1 ?>
                            <?php foreach ($trnsksi as $brg) : ?>
                                <tr>
                                    <td hidden>
                                        <input type="number" name="no[]" id="no" value="<?= $brg["no"]; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="harga_satuan[]" id="harga_satuan" class="form-control harga_satuan" value="<?= $brg['harga_satuan']; ?>" required pattern="[-+]?[0-9]" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="jml_dibeli_tmp[]" id="jml_dibeli_tmp" class="form-control jml_dibeli_tmp_list" value="<?= $brg['jumlah_beli']; ?>" required readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah_beli[]" id="jumlah_beli" class="form-control jumlah_beli_list" value="<?= $brg['jml_dibeli_tmp']; ?>" readonly>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php $i++; ?>
                        </table>
                    </div>
                    <!-- <button type="button" name="tmbh" id="tmbh" class="btn btn-primary btn-user btn-block">Tambah Jumlah Data</button> -->
                    <hr>
                    <?php $jml = query("SELECT * FROM dtl_transaksi WHERE id_tr='$id'"); ?>
                    <?php foreach ($jml as $j) : ?>
                        <?php if ($j['jml_dibeli_tmp'] == 0) : ?>
                            <button type="submit" name="update" id="update" class="btn btn-success btn-user btn-block" hidden>Update Data</button>
                        <?php else : ?>
                            <button type="submit" name="update" id="update" class="btn btn-success btn-user btn-block">Update Data</button>
                        <?php endif; ?>
                    <?php endforeach; ?>
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