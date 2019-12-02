<?php
require_once '../../controllers/barang/functions-barang.php';
require_once 'header.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");

$id = $_GET['id'];
$barang = query("SELECT * FROM barang WHERE id_brg = '$id'")[0];


if (isset($_POST["update"])) {
    if (ubahBrg($_POST) > 0) {
        echo "    
        <script>
            alert('data berhasil Diedit!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "    
        <script>
            alert('data gagal Diedit!');
        </script>";
    }
}
$_POST = $_SESSION;
if (!isset($_SESSION["login"])) {
    header("Location: ../../login/login.php");
    exit;
}
if (!($_POST["level"] == 2)) {
    header("Location: ../admin/");
    exit;
}
$email = $_POST['email_admin'];
$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
$gmbr = mysqli_fetch_assoc($sql);
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
                <h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $barang["id_brg"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $barang["gambar_brg"]; ?>">
                    <div class="form-group">
                        <label for="username"> Nama Barang : </label>
                        <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Masukan Barang Anda" value="<?= $barang['nama_brg']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori : </label>
                        <select name="id_kategori" class="form-control">
                            <option value="" disabled selected>Silahkan Pilih Item</option>
                            <?php $rslt = query("SELECT * FROM kategori"); ?>
                            <?php foreach ($rslt as $nmKTG) : ?>
                                <option value="<?= $nmKTG['id_kategori']; ?>"><?= $nmKTG['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""> Gambar Barang Lama : </label>
                        <br>
                        <img class="img-thumbnail" src="<?= "gambar/" . $barang['gambar_brg']; ?>" width="300" height="300">
                    </div>
                    <div class="form-group">
                        <label for="gmbr"> Gambar Barang : </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gmbr" name="gmbr">
                            <label for="gmbr" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga"> Harga Barang: </label>
                        <input type="number" name="harga" class="form-control form-control-user" placeholder="Masukkan harga barang" value="<?= $barang['harga_brg']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"> Deskripsi Barang : </label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="7" placeholder="Masukkan Deskripsi Barang" class="form-control" required><?= $barang['deskripsi_brg']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered" id="fieldQue">
                            <tr>
                                <td><label for="stok">Masukkan Stok Barang</label></td>
                                <td><label for="expired">Masukkan Expired Date</label></td>
                            </tr>
                            <?php $dtlBrg = query("SELECT * FROM dtl_brg WHERE id_brg='$id'"); ?>
                            <?php $i = 1 ?>
                            <?php foreach ($dtlBrg as $brg) : ?>
                                <tr>
                                    <td>
                                        <input type="number" name="stok[]" class="form-control stok_list" placeholder="Masukkan Stok Barang" value="<?= $brg['stok']; ?>" required pattern="[-+]?[0-9]">
                                    </td>
                                    <td>
                                        <input type="date" name="expired[]" class="form-control expired_list" value="<?= $brg['expired']; ?>" required>
                                    </td>
                                    <td hidden>
                                        <input type="number" name="id_expired[]" class="form-control" placeholder="Masukkan Stok Barang" value="<?= $brg['id_exp']; ?>" hidden>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php $i++; ?>
                        </table>
                    </div>
                    <td>
                        <button type="button" name="tmbh" id="tmbh" class="btn btn-primary btn-user btn-block">Tambah Jumlah Data</button>
                    </td>
                    <!-- <button type="button" name="tmbh" id="tmbh" class="btn btn-primary btn-user btn-block">Tambah Jumlah Data</button> -->
                    <hr>
                    <button type="submit" name="update" class="btn btn-success btn-user btn-block">Update Data</button>
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