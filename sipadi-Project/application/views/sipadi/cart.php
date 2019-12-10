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
?>
<div class="container single_product_container">
    <div class="row">
        <div class="col">
            <table class="table col-10">
                <thead>
                    <tr>
                        <th data-field="name">Item Name</th>
                        <th data-field="category">Category</th>
                        <th data-field="price">Price</th>
                        <th data-field="quantity">Quantity</th>
                        <th data-field="total">Total</th>
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
                            cart.id_cart as 'id_cart'
                            FROM barang,kategori,cart
                            WHERE cart.id_barangs = barang.id_brg AND barang.id_ktg = kategori.id_kategori;
                "
                    );
                    ?>
                    <?php foreach ($querycmnd as $r) : ?>
                        <tr>
                            <td><?= $r['nm_brg']; ?></td>
                            <td><?= $r['kategori']; ?></td>
                            <td><?= $r['harga']; ?></td>
                            <td><?= $r['dibeli']; ?></td>
                            <td><?= $r['harga'] * $r['dibeli']; ?></td>
                            <td><a href="hapus_cart.php?id=<?= $r['id_cart']; ?>"><i class="material-icons red-text">Hapus</i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
        </table>
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
            <div class="custom-file col-md-5">
                <label for="gmbr" class="custom-file-label">Pilih File</label>
                <input type="file" class=" form-control form-control-user" id="gmbr" name="gmbr">
            </div>
        </div>
        <center>
            <button name="checkout" type="submit" class="btn btn-success">Checkout!</button>
        </center>
    </div>
</div>


<?php
require 'includes/footer.php';
?>