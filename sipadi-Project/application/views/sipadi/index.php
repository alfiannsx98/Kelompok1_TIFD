<!DOCTYPE html>
<html lang="en">

<head>
	<title>SIPADI</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_300">

			<!-- Top Navigation -->

			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left">Sistem Informasi Pertanian Sumberdadi</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">

									<!-- Currency / Language / My Account -->
									<li class="account">
										<a href="#">
											My Account
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<!-- <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">Login</button>  -->
											<li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>Login</a></li>
											<!-- <li><a href="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li> -->
											<li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="#">Sumber<span> Dadi</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="#">Home</a></li>
									<li><a href="#kategori">Kategori</a></li>
									<li><a href="#produk">Produk</a></li>
									<li><a href="#about">About Us</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<li class="checkout">
										<button href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal">
											<i class="fa fa-shopping-cart"></i>
										</button>
									</li>
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>

		</header>



		<!-- Slider -->

		<div class="main_slider" style="background-image:url(images/slide01.jpg)">
			<div class="container fill_height">
				<div class="row align-items-center fill_height">
					<div class="col">
						<div class="main_slider_content">
							<h1>SIPADI</h1>
							<h6>Sistem Informasi Pertanian Sumberdadi</h6>
							<div class="red_button shop_now_button"><a href="#produk">shop now</a></div>
						</div>
					</div>
				</div>
			</div>

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



									<!-- Product benih -->



									<!-- Product biostimulan -->


								</div>
							</div>
						</div>
					</div>
				</div>
				</secction>
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


									<div class="red_button deal_ofthe_week_button"><a href="#produk">shop now</a></div>
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
							<div class="red_button shop_now_button"><a href="#produk">shop now</a></div>
						</div>
					</div>

					<!-- Footer -->

					<?php
					require 'includes/footer.php';
					?>
			</section>
		</div>

		<!-- MODAL DIALOG LOGIN -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header border-bottom-0">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-title text-center">
							<h4>Login</h4>
						</div>
						<div class="d-flex flex-column text-center">

							<div class="form-group">
								<input type="email" class="form-control" id="email1" placeholder="Your email address...">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password1" placeholder="Your password...">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-info col-md-4 btn-round">Login</button>
								<button href="#" type="button" class="btn btn-success btn-info col-md-4 btn-round" data-toggle="modal" data-target="#forgetModal" aria-hidden="true">Lupa Password</button>
							</div>
							<div class="d-flex justify-content-center social-buttons">
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<!--cart-->

	<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title" id="exampleModalLabel">
						Your Shopping Cart
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-image">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Produk</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="w-25">
									<img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
								</td>
								<td>Vans Sk8-Hi MTE Shoes</td>
								<td>89$</td>
								<td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
								<td>178$</td>
								<td>
									<a href="#" class="btn btn-danger btn-sm">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="d-flex justify-content-end">
						<h5>Total: <span class="price text-success">89$</span></h5>
					</div>
				</div>
				<div class="modal-footer border-top-0 d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success">Checkout</button>
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

	<!-- MODAL DIALOG LOGIN -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h4>Login</h4>
					</div>
					<div class="d-flex flex-column text-center">

						<div class="form-group">
							<input type="email" class="form-control" id="email1" placeholder="Your email address...">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password1" placeholder="Your password...">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-info col-md-4 btn-round">Login</button>
							<button href="#" type="button" class="btn btn-success btn-info col-md-4 btn-round" data-toggle="modal" data-target="#forgetModal" aria-hidden="true">Lupa Password</button>
						</div>
						<div class="d-flex justify-content-center social-buttons">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--lupa passwoerd-->

	<div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h4>Lupa Password</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<form>
							<div class="form-group">
								<input type="text" class="form-control" id="namaemail" placeholder="Alamat Email">

								<button type="button" class="btn btn-info btn-block btn-round">KIRIM</button>
								<a href="index.php" class="btn btn-success btn-user btn-block">kembali</a>
						</form>
						<div class="d-flex justify-content-center social-buttons">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!--cart-->

	<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title" id="exampleModalLabel">
						Your Shopping Cart
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-image">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Produk</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="w-25">
									<img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
								</td>
								<td>Vans Sk8-Hi MTE Shoes</td>
								<td>89$</td>
								<td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
								<td>178$</td>
								<td>
									<a href="#" class="btn btn-danger btn-sm">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="d-flex justify-content-end">
						<h5>Total: <span class="price text-success">89$</span></h5>
					</div>
				</div>
				<div class="modal-footer border-top-0 d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success">Checkout</button>
				</div>
			</div>
		</div>
	</div>

<<<<<<< HEAD
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/custom.js"></script>
=======
	<!-- Footer -->

	<?php
		require 'includes/footer.php';
	?>

</section>
</div>

<!-- MODAL DIALOG LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
         
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
			</div>
			<div class="form-group">
			<button type="button" class="btn btn-info col-md-4 btn-round">Login</button>
			<button href="#" type="button" class="btn btn-success btn-info col-md-4 btn-round" data-toggle="modal" data-target="#forgetModal" aria-hidden="true">Lupa Password</button>
			</div>
          <div class="d-flex justify-content-center social-buttons">
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--lupa passwoerd-->

<div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Lupa Password</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="text" class="form-control" id="namaemail"placeholder="Alamat Email">

            <button type="button" class="btn btn-info btn-block btn-round">KIRIM</button>
			<a href="login.php" class="btn btn-success btn-user btn-block">kembali ke Login</a>
          </form>
          <div class="d-flex justify-content-center social-buttons">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--cart-->

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Your Shopping Cart
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
              </td>
              <td>Vans Sk8-Hi MTE Shoes</td>
              <td>89$</td>
              <td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
              <td>178$</td>
              <td>
                <a href="#" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table> 
        <div class="d-flex justify-content-end">
          <h5>Total: <span class="price text-success">89$</span></h5>
        </div>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Checkout</button>
      </div>
    </div>
  </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
>>>>>>> parent of 1bdeb02... gnti link
</body>

</html>