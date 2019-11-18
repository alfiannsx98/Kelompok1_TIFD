<?php
require_once 'header.php';
require '../../controllers/transaksi/functions-transaksi.php';
session_start();
$_POST = $_SESSION;

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}
// $koneksi1 = mysqli_connect("localhost", "root", "", "dbsipadifinal1");
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT gambar_admin FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);

$dtTransaksi = query("SELECT * FROM transaksi");

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
                <h1 class="h3 mb-0 text-gray-800">Data Transaksi <a class="btn btn-primary" href="tambah.php"><i class="fas fa-user-plus"></i></a> <a href="#" class="btn btn-warning"><i class="fas fa-print"></i></a></h1>
                </h1>
            </div>
            <!-- Content Row -->
            <table id="example" class="ui celled table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Toko</th>
                        <th>Alamat Kirim</th>
                        <th>tgl_kirim</th>
                        <th>Kota Pembeli</th>
                        <th>Ongkos Kirim</th>
                        <th>Total Harga</th>
                        <th>Total Final</th>
                        <th>Status Bayar</th>
                        <th>Status Kirim</th>
                        <th>Tanggal Transaksi</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dtTransaksi as $tr) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tr['id_admin']; ?></td>
                            <td><?= $tr['id_pembeli']; ?></td>
                            <td><?= $tr['id_toko']; ?></td>
                            <td><?= $tr['alamat_kirim']; ?></td>
                            <td><?= $tr['tgl_kirim'] ?></td>
                            <td><?= $tr['kota_pembeli']; ?></td>
                            <td><?= $tr['ongkir_kurir']; ?></td>
                            <td><?= $tr['total_harga']; ?></td>
                            <td><?= $tr['total_final']; ?></td>
                            <td>
                                <?php if ($tr['status_bayar'] == 1) : ?>
                                    <div class='alert alert-success small'>Terbayar</div>
                                <?php else : ?>
                                    <a class='btn btn-warning' href='edit.php?'><i class='fas fa-check'></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($tr['status_kirim'] == 1) : ?>
                                    <div class='alert alert-success small'>Terkirim</div>
                                <?php else : ?>
                                    <a class='btn btn-warning' href='edit.php?'><i class='fas fa-check'></i></a>"
                                <?php endif; ?>
                            </td>
                            <td><?= date('d F Y', $tr['tgl_transaksi']); ?></td>
                            <td><img src="<?= "gambar/" . $tr['bukti_transfer']; ?>" class="img-alt" height="100" width="100" alt=""></td>
                            <td>
                                <!-- <i class="btn btn-success" href="edit.php?id=<?= $tr['id_transaksi']; ?>"><i class="fas fa-check-double"></i></a> -->
                                <?php if ($tr['status_bayar'] == 1 and $tr['status_kirim'] == 1) : ?>
                                    <div class='alert alert-success small'><i class='fas fa-check'></i></div>
                                <?php else : ?>
                                    <a class='btn btn-warning' href='edit.php?'><i class='fas fa-check'></i></a>
                                <?php endif; ?>
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