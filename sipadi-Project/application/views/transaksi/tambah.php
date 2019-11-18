<?php
require_once '../../controllers/admin/functions-admin.php';
require_once 'header.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

if (isset($_POST["submit"])) {
    if (tambahTr($_POST) > 0) {
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
?>
<?php

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
                    <input type="hidden" name="id_toko" class="form-control" id="id_toko" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "IDT001"; ?>" readonly>
                    <input type="hidden" name="status_bayar" class="form-control" id="status_bayar" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "0"; ?>" readonly>
                    <input type="hidden" class="form-control" value="0" name="tanggal_kirim">
                    <input type="hidden" name="status_kirim" class="form-control" id="status_kirim" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "0"; ?>" readonly>
                    <input type="hidden" name="status_kirim" class="form-control" id="status_kirim" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "0"; ?>" readonly>
                    <input type="hidden" name="tgl_transaksi" class="form-control" id="tgl_transaksi" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= time(); ?>" readonly>
                    <input type="hidden" name="bukti_transaksi" class="form-control" id="bukti_transaksi" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= time(); ?>" readonly>
                    <div class="form-group">
                        <label for="id_admin"> Nama Admin : </label>
                        <input type="text" class="form-control form-control-user" id="id_admin" name="id_admin" placeholder="Masukan Nama Admin" value="<?= "Belum Terkonfirmasi"; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email_admin"> Pembeli : </label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= "pembeli"; ?>" placeholder="Masukan Email Admin" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat_kirim"> Alamat Kirim : </label>
                        <textarea class="form-control" name="alamat_kirim" id="alamat_kirim"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kota_kirim"> Kota Kirim : </label>
                        <input type="text" class="form-control" value="surabaya" name="kota_kirim" id="kota_kirim">
                    </div>
                    <div class="form-group">
                        <label for="ongkir_kurir"> Ongkos Kirim : </label>
                        <input type="number" class="form-control" value="7000" name="ongkir" id="ongkir">
                    </div>
                    <div class="form-group">
                        <label for="total_harga"> Total Harga : </label>
                        <input type="number" class="form-control" name="total_harga" id="total_harga">
                    </div>
                    <div class="form-group">
                        <label for="harga_final"> Harga Final : </label>
                        <input type="number" class="form-control" name="harga_final" id="harga_final">
                    </div>
                    <div class="form-group">
                        <label for="harga_final"> Harga Final : </label>
                        <input type="number" class="form-control" name="harga_final" id="harga_final">
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