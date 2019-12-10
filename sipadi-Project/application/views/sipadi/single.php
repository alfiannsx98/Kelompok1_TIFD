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


if (isset($_POST["add"])) {
	if (tambahCart($_POST) > 0) {
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
$produk = query("SELECT * FROM barang WHERE id_brg='$id'");
foreach ($produk as $pr) :
	?>
	<div class="container ">
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
						<form action="" method="post" enctype="multipart/form-data">
							<h2><?= $pr['nama_brg']; ?></h2>
							<p><?= $pr['deskripsi_brg']; ?></p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<?php $result = mysqli_query($koneksi, "SELECT id_pembeli FROM pembeli WHERE email_pembeli = '$mail'"); ?>
						<?php foreach ($result as $ahe) : ?>
							<input type="hidden" name="id_users" value="<?= $ahe['id_pembeli']; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id_barangs" value=<?= $id; ?>>
						<span class="ti-truck"></span><span>Ongkir Berbayar</span>
					</div>
					<div class="product_price">Rp. <?= $pr['harga_brg']; ?></div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity: </span>
					</div>
					<input type="number" name="qty_dibeli" class="form-control">
				<?php endforeach; ?>
				<div class="shop_now_button">
					<button class="btn btn-primary" type="submit" name="add">add to cart</button>
				</div>
				</div>
			</div>
			</form>
		</div>

	</div>


	<!-- Tabs -->

	<!-- Footer -->



	<?php
	require 'includes/footer.php';
	?>