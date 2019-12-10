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
    require 'includes/header.php';
}

$cart = query("SELECT * FROM cart WHERE id_users='$id'");
?>

<div class="container">


    <?php foreach ($cart as $rs) : ?>
        <table class="highlight">
            <thead>
                <tr>
                    <th data-field="name">Item Name</th>
                    <th data-field="category">Category</th>
                    <th data-field="price">Price</th>
                    <th data-field="quantity">Quantity</th>
                    <th data-field="total">Total</th>
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
                <tr>
                    <?php foreach ($querycmnd as $r) : ?>
                        <td><?= $r['nm_brg']; ?></td>
                        <td><?= $r['kategori']; ?></td>
                        <td><?= $r['harga']; ?></td>
                        <td><?= $r['dibeli']; ?></td>
                        <td><?= $r['harga'] * $r['dibeli']; ?></td>
                        <td><a href="hapus_cart.php?id=<?= $r['id_cart']; ?>"><i class="material-icons red-text">Hapus</i></a></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        <?php endforeach; ?>

</div>
<?php
require 'includes/footer.php';
?>