<?php
require '../../controllers/sipadi/sipadi-functions.php';
session_start();

$id = $_GET['id'];

if (isset($_SESSION['login_pembeli']) == 1) {
    $mail = $_SESSION['email'];
    $result = mysqli_query($koneksi, "SELECT id_pembeli FROM pembeli WHERE email_pembeli = '$mail'");
    $result1 = mysqli_fetch_assoc($result);
    $result = $result1['id_pembeli'];
    require 'includes/header-login.php';
} else {
    header('Location: index.php');
    exit;
    require 'includes/header.php';
}

$cart = query("SELECT * FROM cart WHERE id_users='$id'");

if (isset($_POST["checkout"])) {
    if (checkout($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Berhasil di Checkout');
                document.location.href= 'index.php';
            </script>
        ";
    }
}
?>
<div class="container single_product_container">
    <form action="" method="post" class="user" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Daftar Transaksi</a></li>
                    </ul>
                </div>
                <table class="table col-10">
                    <thead>
                        <tr>
                            <th data-field="name">Kode Transaksi</th>
                            <th data-field="category">Alamat Kirim</th>
                            <th data-field="quantity">Harga Keseluruhan</th>
                            <th data-field="total">Nomor Rekening</th>
                            <th data-field="total">Bukti Transfer</th>
                            <th data-field="aksi">Aksi</th>
                            <th>Status Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $querycmnd = query("SELECT * FROM transaksi");
                        ?>
                        <?php foreach ($querycmnd as $r) : ?>
                            <tr>
                                <td hidden><input type="hidden" name="id_barang[]" id="" value="<?= $r['id_brg'] ?>"></td>
                                <td><input type="hidden"><?= $r['id_transaksi']; ?></td>
                                <td><input type="hidden"><?= $r['alamat_kirim']; ?></td>
                                <td><input type="hidden">Rp. <?= $r['total_final']; ?></td>
                                <?php if ($r['rekening_pembeli'] == "Belum Terisi") : ?>
                                    <td><input type="hidden"><span class="badge badge-warning"><?= $r['rekening_pembeli']; ?></span></td>
                                <?php else : ?>
                                    <td><input type="hidden"><?= $r['rekening_pembeli']; ?></td>
                                <?php endif; ?>
                                <td><img class="img-thumbnail" height="200px" width="200px" src="../../views/transaksi/gambar/<?= $r['bukti_transfer']; ?>" alt=""></td>
                                <?php if ($r['status_bayar'] == 1) : ?>
                                    <td>
                                        <div class="badge badge-pill badge-success">Pembayaran Berhasil</div>
                                    </td>
                                <?php else : ?>
                                    <td><a href="upload_transfer.php?id=<?= $r['id_transaksi']; ?>"><i class="material-icons red-text">Upload Bukti Transfer</i></a></td>
                                <?php endif; ?>
                                <?php if ($r['status_kirim'] == 1) : ?>
                                    <td>
                                        <div class="badge badge-pill badge-success">Terkirim</div>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <div class="badge badge-pill badge-warning">Belum Terkirim</div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
            </table>
        </div>
    </form>
</div>


<?php
require 'includes/footer.php';
?>