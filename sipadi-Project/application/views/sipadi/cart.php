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
<?php foreach ($cart as $rs) : ?>
    <div class="container single_product_container">



    </div>



    <?php
        require 'includes/footer.php';
        ?>
<?php endforeach; ?>
</div>