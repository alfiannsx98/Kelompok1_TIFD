<?php require '../../controllers/sipadi/sipadi-functions.php'; ?>
<?php
if (isset($_COOKIE['id_pembeli']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id_pembeli'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($koneksi, "SELECT email_pembeli FROM pembeli WHERE id_pembeli='$id'");
	$row = mysqli_fetch_assoc($result);

	if ($key === hash('sha256', $row['email_pembeli'])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login_pembeli"])) {
	header("Location: ../sipadi/");
}

if (isset($_POST["login"])) {
	$email = $_POST["email_pembeli"];
	$password = $_POST["password_pembeli"];

	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$email'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password_pembeli"])) {
			$_SESSION["login_pembeli"] = 1;
			header("location: ../sipadi/");
		}
	}
	$error = true;
}
$_SESSION["login_pembeli"] = false;
?>
<!-- Header -->
<?php
require 'includes/header.php';
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

					<!-- Slide 1 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/INSEKTISIDA.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesinsek.php">Insektisida</a></h6>
									<div class="product_price">20pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 2 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/fungisida.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesfungi.php">Fungisida</a></h6>
									<div class="product_price">30pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 3 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/bakterisida.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesbak.php">Bakterisida</a></h6>
									<div class="product_price">10pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 4 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/zpt.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categorieszpt.php">ZPT</a></h6>
									<div class="product_price">10pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 5 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/pupuk.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriespuk.php">Pupuk</a></h6>
									<div class="product_price">15pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 6 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/herbisida.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesher.php">Herbisida</a></h6>
									<div class="product_price">50pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 7 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/benih.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesbenih.php">Benih</a></h6>
									<div class="product_price">5pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 8 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/perekat.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesperekat.php">Perekat</a></h6>
									<div class="product_price">40pcs</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 9 -->

					<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="images/bios.png" alt="gambar">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="categoriesbios.php">Biostimulan</a></h6>
									<div class="product_price">10pcs</div>
								</div>
							</div>
						</div>
					</div>
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
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".insektisida">Insektisida</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".fungisida">Fungisida</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".zpt">ZPT</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".pupuk">Pupuk</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".herbisida">Herbisida</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".benih">Benih</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".perekat">Perekat</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".biostimulan">Biostimulan</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product insektisida -->

						<div class="product-item insektisida">
							<div class="product discount product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/productinsektisida1.png" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.php">Columbus 600EC (500ml)</a></h6>
									<div class="product_price">Rp.60.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<!-- Product Fungisida -->

						<div class="product-item fungisida">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product2.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Fungisida Murtox (100ml)</a></h6>
									<div class="product_price">Rp.70.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<!-- Product Bakterisida -->

						<div class="product-item bakterisida">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/productbakterisida1.png" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Bactocyn 150 AL (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<!-- Product pupuk -->

						<div class="product-item pupuk">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/productpupuk.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Multi Flora (1000ml)</a></h6>
									<div class="product_price">Rp.50.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<div class="product-item pupuk">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/productpupuk1.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Pupuk Organik (40kg)</a></h6>
									<div class="product_price">Rp.200.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>


						<!-- Product zpt -->
						<div class="product-item zpt">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Herbisida Primaxone (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>


						<!-- Product herbisida -->

						<div class="product-item herbisida">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Herbisida Primaxone (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<div class="product-item herbisida">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/productherbisida1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Topshot (500ml)</a></h6>
									<div class="product_price">Rp.20.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

						<!-- Product perekat -->
						<div class="product-item perekat">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Herbisida Primaxone (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>


						<!-- Product benih -->
						<div class="product-item benih">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Herbisida Primaxone (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>


						<!-- Product biostimulan -->
						<div class="product-item biostimulan">
							<div class="product product_filter">
								<div class="product_image">
									<a href="single.php"><img src="images/product1.png" alt="gambar">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name1"><a href="single.html">Herbisida Primaxone (200ml)</a></h6>
									<div class="product_price">Rp.30.000,00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Tambah Keranjang</a></div>
						</div>

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
						<h6>opening all week</h6>
						<p>8AM - 09PM</p>
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
					<h2>Latest Blogs</h2>
				</div>
			</div>
		</div>
		<div class="row blogs_container">
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/blog1.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h4>
						<span class="blog_meta"></span>
						<a class="blog_more" href="#">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/blog2.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h4>
						<span class="blog_meta"></span>
						<a class="blog_more" href="#">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 blog_item_col">
				<div class="blog_item">
					<div class="blog_background" style="background-image:url(images/blog3.jpg)"></div>
					<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
						<h4 class="blog_title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h4>
						<span class="blog_meta"></span>
						<a class="blog_more" href="#">Read more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Newsletter -->
<section id="about">
	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php
	require 'includes/footer.php';
	?>
</section>
</div>







<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>