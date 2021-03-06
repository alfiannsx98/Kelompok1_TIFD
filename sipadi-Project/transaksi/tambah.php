<?php
require_once '../controllers/transaksi/functions-transaksi.php';
require_once 'header.php';

session_start();


if (isset($_POST["submit"])) {
    if (tambahTr($_POST)) {
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
                <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data" id="formKu">
                    <input type="hidden" name="id_toko" class="form-control" id="id_toko" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "IDT001"; ?>" readonly>
                    <input type="hidden" name="status_bayar" class="form-control" id="status_bayar" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "0"; ?>" readonly>
                    <input type="hidden" class="form-control" value="0" name="tanggal_kirim">
                    <input type="hidden" name="status_kirim" class="form-control" id="status_kirim" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "0"; ?>" readonly>
                    <input type="hidden" name="id_pembeli" class="form-control" id="id_pembeli" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "IDB001"; ?>" readonly>
                    <input type="hidden" name="tgl_kirim" class="form-control" id="tgl_kirim" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= "00/00/0000"; ?>" readonly>
                    <input type="hidden" name="tgl_transaksi" class="form-control" id="tgl_transaksi" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= time(); ?>" readonly>
                    <input type="hidden" name="bukti_transaksi" class="form-control" id="bukti_transaksi" cols="30" rows="6" placeholder="Masukkan Alamat Admin" value="<?= time(); ?>" readonly>
                    <input type="hidden" class="form-control form-control-user" id="id_admin" name="id_admin" placeholder="Masukan Nama Admin" value="<?= "Belum Terkonfirmasi"; ?>" readonly>
                    <div class="form-group">
                        <label for="email_admin"> Pembeli : </label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= "pembeli"; ?>" placeholder="Masukan Email Admin" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat_kirim"> Alamat Lengkap Penerima : </label>
                        <textarea class="form-control" name="alamat_kirim" id="alamat_kirim" placeholder="Silahkan mengisi Anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kota_kirim"> Kota Penerima : </label>
                        <select name="kota_kirim" id="kota_kirim" class="form-control" onchange="autofill_kota()">
                            <?php $kurir = query("SELECT * FROM kurir ORDER BY `kurir`.`kota_tujuan`"); ?>
                            <?php foreach ($kurir as $kr) : ?>
                                <option value="<?= $kr["id_kurir"] ?>"><?= $kr["kota_tujuan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ongkir_kurir"> Ongkos Kirim : </label>
                        <input type="number" class="form-control" name="ongkir_kurir" id="ongkir_kurir" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gmbr"> Masukkan bukti Transaksi : </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control form-control-user" id="gmbr" name="gmbr">
                            <label for="gmbr" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered" id="fieldQue">
                            <tr>
                                <td><label for="stok">Pilih barang</label></td>
                                <td><label for="expired">Harga Satuan</label></td>
                                <td><label for="expired">Jumlah yang dibeli</label></td>
                                <td><label for="kurang">Subtotal</label></td>
                                <td><label for="kurang">Aksi</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php $brg = query("SELECT * FROM barang"); ?>
                                    <select name="id_barang[]" id="id_barang" class="form-control id_barang_list" onchange="autofill()">
                                        <option value="" disabled selected>Silahkan Pilih Item</option>
                                        <?php foreach ($brg as $barg) : ?>
                                            <option value="<?= $barg['id_brg'] ?>"><?= $barg['nama_brg']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="harga_satuan[]" id="harga_satuan" class="form-control harga_satuan_list" readonly>
                                </td>
                                <td>
                                    <input type="number" name="jml_dibeli_tmp[]" id="jml_dibeli_tmp" class="form-control jml_dibeli_tmp_list" placeholder="Masukkan jml Dibeli">
                                </td>
                                <td>
                                    <input type="number" name="subtotal" id="subtotal" class="form-control subtotallist" readonly>
                                </td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-primary btn-user btn-block">Tambah Jumlah Data</button>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <label for="harga_final"> Harga Total : </label>
                            <input type="number" class="form-control" name="harga_total" id="harga_total" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_final"> Harga Final : </label>
                        <input type="number" class="form-control" name="harga_final" id="harga_final" readonly>
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
                    <a class="btn btn-primary" href="../controllers/login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>