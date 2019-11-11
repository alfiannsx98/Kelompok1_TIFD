<?php
require_once 'header.php';
require '../../../application/controllers/login/functions-login.php';
session_start();
$_POST = $_SESSION;

// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
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
                <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
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
                    <tr>
                        <td>1</td>
                        <td>Insektisida</td>
                        <td>insektisida.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fungisida</td>
                        <td>fungisida.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Herbisida</td>
                        <td>herbisida.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pupuk</td>
                        <td>pupuk.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Benih</td>
                        <td>benih.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>ZPT</td>
                        <td>zpt.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Biostimulan</td>
                        <td>biostimulan.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Perekat</td>
                        <td>perekat.jpg</td>
                        <td>EDIT|HAPUS</td>
                    </tr>
                </tbody>
            </table>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <?php require_once 'footer.php'; ?>