<?php require 'controllers/sipadi/sipadi-functions.php'; ?>
<?php
session_start();
// if (isset($_COOKIE['id_pembeli']) && isset($_COOKIE['key'])) {
// 	$id = $_COOKIE['id_pembeli'];
// 	$key = $_COOKIE['key'];

// 	$result = mysqli_query($koneksi, "SELECT email_pembeli FROM pembeli WHERE id_pembeli='$id'");
// 	$row = mysqli_fetch_assoc($result);

// 	if ($key === hash('sha256', $row['email_pembeli'])) {
// 		$_SESSION['login'] = true;
// 	}
// }

if (isset($_POST["login"])) {
	$email = $_POST["email_pembeli"];
	$password = $_POST["password_pembeli"];

	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$email'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password_pembeli"])) {
			header("location: index.php");
			$_SESSION["login_pembeli"] = 1;
			$_SESSION['email'] = $email;
		}
	}
	$error = true;
}

?>
<!-- Header -->
<?php
if (isset($_SESSION["login_pembeli"]) == 1) {
	$mail = $_SESSION['email'];
	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$mail'");
	require 'includes/header-login.php';
} else {
	require 'includes/header.php';
}
?>
<!-- Slider -->
<?php
require 'includes/slider.php';
?>

<div class="super_container"></div>

<!-- Kategori -->
<section id="kategori">
	<div class="row">
		<div class="col">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Kategori</h2>
				</div>
			</div>
			<div class="product_slider_container">
				<div class="owl-carousel owl-theme product_slider">
					<?php
					$getrow = query('SELECT kategori.nama_kategori, COUNT(barang.id_brg) as total FROM barang RIGHT JOIN kategori on kategori.id_kategori = barang.id_ktg GROUP BY kategori.id_kategori');
					?>
					<!-- Slide 1 -->
					<?php $kategori = query("SELECT * FROM kategori"); ?>
					<?php foreach ($getrow as $ktgr) : ?>
						<?php foreach ($kategori as $ktr) : ?>
							<div class="owl-item product_slider_item">

								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="<?= "kategori/gambar/" . $ktr['gmbr']; ?>" alt="gambar">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="index.php#produk" data-filter=".<?= $ktg['nama_kategori'] ?>"><?= $ktr["nama_kategori"]; ?></a></h6>
											<div class="product_price"><?= $ktgr['total']; ?>pcs</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</div>

				<!-- Slider Navigation -->

				<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</div>
				<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- New Arrivals -->
<section id="produk">
	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Produk</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<?php $kategori = mysqli_query($koneksi, "SELECT * FROM kategori"); ?>
							<?php foreach ($kategori as $ktg) : ?>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".<?= $ktg['nama_kategori'] ?>"><?= $ktg['nama_kategori']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product insektisida -->
						<?php
						$barang = mysqli_query($koneksi, "SELECT `barang`.*,`kategori`.`nama_kategori`
            					FROM `barang` JOIN `kategori`
            					ON `barang`.`id_ktg` = `kategori`.`id_kategori`
    						"); ?>
						<?php foreach ($barang as $br) : ?>
							<div class="product-item <?= $br['nama_kategori'] ?>">

								<div class="product discount product_filter">
									<div class="product_image">
										<a href="single.php?id=<?= $br['id_brg']; ?>"><img src="<?= "barang/gambar/" . $br["gambar_brg"]; ?>" alt="">
									</div>
									<div class="product_info">
										<h6 class="product_name1"><a href="single.php?id=<?= $br['id_brg']; ?>"><?= $br["nama_brg"]; ?></a></h6>
										<a class="btn btn-primary btn-lg btn-block add_to_cart_button" href="single.php?id=<?= $br['id_brg']; ?>">READ MORE</a>
										<div class="product_price" style="top: -110px">Rp. <?= $br["harga_brg"]; ?>
										</div>

									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Deal of the week -->

<div class="deal_ofthe_week">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="deal_ofthe_week_img">
					<img src="images/d.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 text-right deal_ofthe_week_col">
				<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
					<div class="section_title">
						<h2>Pertanian</h2>
						<ul>
							<li>
								<p>Pertanian adalah kegiatan pemanfaatan sumber daya hayati yang
									dilakukan manusia untuk menghasilkan bahan
									pangan, bahan baku industri, atau sumber energi,
									serta untuk mengelola lingkungan hidupnya</p>
							</li>
						</ul>
					</div>
					<div class="red_button shop_now_button"><a href="#produk">shop now</a></div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Benefit -->

<div class="benefit">
	<div class="container">
		<div class="row benefit_row">
			<div class="col-lg-4 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>BIAYA KIRIM</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>BARANG DITERIMA</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>Buka senin-sabtu</h6>
						<p>08.00AM - 17.00PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Blogs -->

<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title">
					<h2>Cara Pemesanan</h2>
				</div>
			</div>
		</div>
		<div class="row blogs_container">
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/carapemesanan.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4>Login dan Register</h4>
						<P class="blog_title">Pertama anda harus login, kalau belum punya akun dipersilahkan register terlebih dahulu, isi semua field yang ada di register, selanjutnya anda bisa mengakses website</P>
						<span class="blog_meta"></span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/carapemesanan.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4>Beli Produk</h4>
						<P class="blog_title">Pilih produk yang anda butuhkan, klik add to cart untuk menambahkan barang & Beli</P>
						<span class="blog_meta"></span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/carapemesanan.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4>Pembayaran</h4>
						<p class="blog_title">Setelah melakukan pembelian langkah selanjutnya pembayaran dengan cara transfer uang dan barang anda siap untuk dikirim</p>
						<span class="blog_meta"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Newsletter -->
<section id="about">

	<!-- Footer -->

	<?php
	require 'includes/footer.php';
	?>