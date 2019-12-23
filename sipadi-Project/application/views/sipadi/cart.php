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
                alert('Data Gagal Ditambah');
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
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Checkout</a></li>
                    </ul>
                </div>
                <table class="table col-10">
                    <thead>
                        <tr>
                            <th data-field="name">Item Name</th>
                            <th data-field="category">Category</th>
                            <th data-field="price">Price</th>
                            <th data-field="quantity">Quantity</th>
                            <th data-field="total">Subtotal</th>
                            <th data-field="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $querycmnd = query(
                            "SELECT barang.nama_brg as 'nm_brg',
                            barang.id_brg as 'id_brg',
                            barang.harga_brg as 'harga',
                            kategori.nama_kategori as 'kategori',
                            cart.qty_dibeli as 'dibeli',
                            cart.id_cart as 'id_cart',
                            cart.subtotal as 'subtotal'
                            FROM barang,kategori,cart
                            WHERE cart.id_barangs = barang.id_brg AND barang.id_ktg = kategori.id_kategori;
                "
                        );
                        ?>
                        <?php foreach ($querycmnd as $r) : ?>
                            <tr>
                                <td hidden><input type="hidden" name="id_barang[]" id="" value="<?= $r['id_brg'] ?>"></td>
                                <td><input type="hidden"><?= $r['nm_brg']; ?></td>
                                <td><input type="hidden"><?= $r['kategori']; ?></td>
                                <td><input type="hidden" name="harga_satuan[]" value="<?= $r['harga']; ?>">Rp. <?= $r['harga']; ?></td>
                                <td><input type="hidden" name="jml_dibeli_tmp[]" value="<?= $r['dibeli']; ?>"><?= $r['dibeli']; ?></td>
                                <td><input type="hidden">Rp. <?= $r['subtotal']; ?></td>
                                <td><a href="hapus_cart.php?id=<?= $r['id_cart']; ?>"><i class="material-icons red-text">Hapus</i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
            </table>
            <div class="form-group">
                <label for="alamat_kirim"> Alamat Lengkap Penerima : </label>
                <textarea class="form-control" name="alamat_kirim" id="alamat_kirim" placeholder="Silahkan mengisi Anda" required></textarea>
            </div>
            <div class="form-group">
                <label for="kota_kirim"> Kota Penerima : </label>
                <select name="kota_kirim" id="kota_kirim" class="form-control" onchange="autofill_kota()" required>
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
                <label for="total"> Total Harga : </label>
                <input type="number" class="form-control" name="harga_total" id="harga_total">
            </div>
            <div class="form-group">
                <label for="harga_final"> Harga Final : </label>
                <input type="number" class="form-control" name="harga_final" id="harga_final">
            </div>
            <div class="form-group">
                <label for="gmbr">(Lewati jika belum ada) Masukkan bukti Transaksi : </label>
                <div class="custom-file col-md-5">
                    <label for="gmbr" class="custom-file-label">Pilih File</label>
                    <input type="file" class=" form-control form-control-user" id="gmbr" name="gmbr">
                </div>
            </div>
            <input type="hidden" name="status_bayar" id="" value="0">
            <input type="hidden" name="status_kirim" id="" value="0">
            <input type="hidden" name="tgl_transaksi" id="" value="<?= time(); ?>">
            <?php
            $qry = query("SELECT id_pembeli FROM pembeli WHERE id_pembeli='$id'");
            foreach ($qry as $rsllt) :
            ?>
                <input type="hidden" name="id_users" id="" value="<?= $rsllt['id_pembeli']; ?>">
            <?php endforeach; ?>
            <br>
            <center>
                <button name="checkout" type="submit" class="btn btn-success">Checkout!</button>
            </center>
        </div>
    </form>
</div>


<?php
require 'includes/footer.php';
?>