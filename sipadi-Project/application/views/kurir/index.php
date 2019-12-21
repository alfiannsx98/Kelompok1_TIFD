<?php
require_once 'header.php';
require '../../controllers/kurir/functions-kurir.php';
session_start();
$_POST = $_SESSION;

// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}
if (($_POST["level"] == 2)) {
    header("Location: ../operator/");
    exit;
}
$koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);

$dtKur = query("SELECT * FROM kurir");

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
                <h1 class="h3 mb-0 text-gray-800">Data Kurir <a class="btn btn-primary" href="tambah.php"><i class="fas fa-user-plus"></i></a> <a href="cetak.php" class="btn btn-warning"><i class="fas fa-print"></i></a></h1>
                </h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="ui celled table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kurir</th>
                        <th>Kota Tujuan</th>
                        <th>Ongkir Kurir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtKur as $kur) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $kur['nama_kurir']; ?></td>
                            <td><?= $kur['kota_tujuan']; ?></td>
                            <td><?= $kur['ongkir_kurir']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?= $kur['id_kurir']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger" href="hapus.php?id=<?= $kur['id_kurir']; ?>" onclick="myFunction()"><i class="fas fa-trash-alt"></i></button>
                                <a href="cetak_satuan.php?id=<?= $kur['id_kurir']; ?>" class="btn btn-warning"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <?php require_once 'footer.php'; ?>