<?php
require_once '../../controllers/barang/functions-barang.php';
require_once 'header.php';
session_start();


// $email = $_POST["email_admin"];
// $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email'");
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

if (isset($_POST["submit"])) {
    if (tambahBrg($_POST) > 0) {
        echo "    
        <script>
            alert('data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "    
        <script>
            alert('data gagal ditambah!');
            document.location.href = 'index.php';
        </script>";
    }
}
$_POST = $_SESSION;
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
                <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="" method="post" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username"> Nama Barang : </label>
                        <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Masukan Barang Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori : </label>
                        <select name="id_kategori" class="form-control">
                            <?php $rslt = query("SELECT * FROM kategori"); ?>
                            <?php foreach ($rslt as $nmKTG) : ?>
                                <option value="<?= $nmKTG['id_kategori']; ?>"><?= $nmKTG['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
                        <input type="number" name="harga" class="form-control form-control-user" placeholder="Masukkan harga barang">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"> Deskripsi Barang : </label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="7" placeholder="Masukkan Deskripsi Barang" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stok"> Stok Barang : </label>
                        <input type="number" name="stok" class="form-control form-control-user" placeholder="Masukkan Stok Barang">
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