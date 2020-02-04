<?php
require_once '../../controllers/barang/functions-barang.php';
require_once 'header.php';

session_start();
if (isset($_POST["submit"])) {
    if (pengadaan($_POST) > 0) {
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
    header("Location: ../../login/login.php");
    exit;
}
if (($_POST["level"] == 2)) {
    header("Location: ../admin/");
    exit;
}
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);
require 'sidebar.php';
?>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require_once '../templates/topbar.php'; ?>

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pengadaan Stok Barang</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" name="tambahkeun" id="tambahkeun" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Pilih Barang Untuk ditambah stok : </label>
                        <select name="id_barang" class="form-control">
                            <?php $rslt = query("SELECT * FROM barang"); ?>
                            <?php foreach ($rslt as $nmBrg) : ?>
                                <option value="<?= $nmBrg['id_brg']; ?>" class="form-control"><?= $nmBrg['nama_brg']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!--  ditambahkan dinamis add form input -->
                    <div class="form-group">
                        <label for="fieldQue">Isi Stok barang dan Expired Date : </label>
                        <table class="table table-bordered" id="fieldQue">
                            <tr>
                                <td><label for="stok">Masukkan Stok Barang</label></td>
                                <td><label for="expired">Masukkan Expired Date</label></td>
                                <td><label for="kurang">Aksi</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="stok[]" class="form-control stok_list" placeholder="Masukkan Stok Barang" required pattern="[-+]?[0-9]">
                                </td>
                                <td>
                                    <input type="date" name="expired[]" class="form-control expired_list" placeholder="Masukkan Stok Barang" required>
                                </td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-primary btn-user btn-block">Tambah Jumlah Data</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- bates ditambahkan dinamis add form input -->
                    <hr>
                    <button type="submit" id="submit" name="submit" class="btn btn-success btn-user btn-block">Simpan Data</button>
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