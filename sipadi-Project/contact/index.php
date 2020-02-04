<?php
require_once '../barang/header.php';
require '../controllers/login/functions-login.php';
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


$dtcontact = query("SELECT * FROM contact");

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
                <a class="btn btn-primary" href="../application/controllers/login/logout.php">Logout</a>
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
                <h1 class="h3 mb-0 text-gray-800">Data Hubungi Kami</h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtcontact as $contact) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><span class="badge badge-pill badge-info"><?= $contact['nama']; ?></span></td>
                            <td><span class="badge badge-pill badge-success"><?= $contact['email']; ?></span></td>
                            <td><span class="badge badge-pill badge-danger"><?= $contact['pesan']; ?></span></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <?php require_once '../barang/footer.php'; ?>