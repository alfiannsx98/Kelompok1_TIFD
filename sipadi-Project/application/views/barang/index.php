<?php
require_once 'header.php';
require '../../../application/controllers/login/functions-login.php';
session_start();

$getKtg = mysqli_query($koneksi, "SELECT `barang`.*,`kategori`.`nama_kategori`
            FROM `barang` JOIN `kategori`
            ON `barang`.`id_ktg` = `kategori`.`id_kategori`
    ");
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
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);

// $dtBrg = query("SELECT * FROM barang");
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

        <?php require_once '../../views/templates/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Barang <a class="btn btn-primary" href="tambah.php"><i class="fas fa-user-plus"></i></a> <a href="cetak.php" target="_blank" class="btn btn-warning"><i class="fas fa-print"></i></a></h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="ui celled table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Gambar Barang</th>
                        <th>Harga Barang</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($getKtg as $brg) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $brg['nama_brg']; ?></td>
                            <td><?= $brg['nama_kategori']; ?></td>
                            <td><img src="<?= "gambar/" . $brg['gambar_brg']; ?>" height="150" width="150" alt=""></td>
                            <td><?= $brg['harga_brg']; ?></td>
                            <td><?= $brg['deskripsi_brg']; ?></td>
                            <td><?= date('d F Y', $brg['tgl_upload']); ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?= $brg['id_brg']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger" href="hapus.php?id=<?= $brg['id_brg']; ?>" onclick="myFunction()"><i class="fas fa-trash-alt"></i></a>
                                <a href="cetak_satuan.php?id=<?= $brg['id_brg']; ?>" class="btn btn-warning"><i class="fas fa-print"></i></a>
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