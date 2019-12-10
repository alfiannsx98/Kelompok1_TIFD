<?php
require '../../controllers/sipadi/sipadi-functions.php';
session_start();
?>
<?php
$id = $_GET['id'];


if (isset($_SESSION["login_pembeli"]) == 1) {
	$mail = $_SESSION['email'];
	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$mail'");
	require 'includes/header-login.php';
} else {
	require 'includes/header.php';
}
?>

<?php
$produk = query("SELECT * FROM barang WHERE id_brg='$id'");
foreach ($produk as $pr) :
	?>
	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="categoriesinsek.php"><i class="fa fa-angle-right" aria-hidden="true"></i>categories</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $pr['nama_brg']; ?></a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li class="active"><img src="<?= "../../views/barang/gambar/" . $pr['gambar_brg']; ?>" alt="" data-image="images/inseksingle.jpg"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(<?= "../../views/barang/gambar/" . $pr['gambar_brg']; ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= $pr['nama_brg']; ?></h2>
						<p><?= $pr['deskripsi_brg']; ?></p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>Ongkir Berbayar</span>
					</div>
					<div class="product_price">Rp. <?= $pr['harga_brg']; ?></div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="red_button shop_now_button"><a href="#">Beli</a></div>
				<div class="red_button shop_now_button"><a href="#">add to cart</a></div>
				</div>
			</div>
		</div>

	</div>


	<!-- Tabs -->

	<!-- Footer -->



	<?php
	require 'includes/footer.php';
	?>

	</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/single_custom.js"></script>
	</body>

	</html>