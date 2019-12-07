<?php
require_once 'header.php';
require '../../../application/controllers/login/functions-login.php';
session_start();
$_POST = $_SESSION;

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


$dtKtg = query("SELECT * FROM kategori");

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

<!-- Hapus Modal -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require_once '../templates/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Kategori <a class="btn btn-primary" href="tambah.php"><i class="fas fa-user-plus"></i></a> <a href="#" class="btn btn-warning"><i class="fas fa-print"></i></a></h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtKtg as $ktg) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ktg['nama_kategori']; ?></td>
                            <td><img src="<?= '../../views/kategori/gambar/' . $ktg['gmbr']; ?>" class="img-thumbnail" height="100" width="100"></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?= $ktg['id_kategori']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger" href="hapus.php?id=<?= $ktg['id_kategori']; ?>" onclick="myFunction()"><i class="fas fa-trash-alt"></i></button>
                                <a href="#" class="btn btn-warning"><i class="fas fa-print"></i></a>
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