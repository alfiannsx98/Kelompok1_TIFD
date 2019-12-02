<?php
require_once 'header.php';
require '../../controllers/admin/functions-admin.php';
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
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT gambar_admin FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);

$dtKrywn = query("SELECT * FROM admin");

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
                <h1 class="h3 mb-0 text-gray-800">Data Admin <a class="btn btn-primary" href="tambah.php"><i class="fas fa-user-plus"></i></a> <a href="#" class="btn btn-warning"><i class="fas fa-print"></i></a></h1>
                </h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="ui celled table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width:125px;">Nama Admin</th>
                        <th style="width:125px;">Email Admin</th>
                        <th style="width:125px;">Gambar Admin</th>
                        <th style="width:125px;">Admin Created</th>
                        <th style="width:125px;">Alamat</th>
                        <th style="width:125px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtKrywn as $krywn) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $krywn['nama_admin']; ?></td>
                            <td><?= $krywn['email_admin']; ?></td>
                            <td><img src="<?= "gambar/" . $krywn['gambar_admin']; ?>" class="img-alt" height="100" width="100" alt=""></td>
                            <td><?= date('d F Y', $krywn['admin_created']); ?></td>
                            <td><?= $krywn['alamat']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?= $krywn['id_admin']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger" href="hapus.php?id=<?= $krywn['id_admin']; ?>" onclick="myFunction()"><i class="fas fa-trash-alt"></i></button>
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