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
<tr>
    <td>No</td>
    <td>as</td>
    <td>as</td>
</tr>
<tr>
    <?php foreach ($cart as $rslt) : ?>
        <td><?= $rslt['id_cart']; ?></td>
        <td><?= $rslt['id_users']; ?></td>
        <td><?= $rslt['id_barangs']; ?></td>
        <td><?= $rslt['qty']; ?></td>
        <td><?= $rslt['tgl_transaksi']; ?></td>
    <?php endforeach; ?>
</tr>
<?php require 'includes/footer.php'; ?>