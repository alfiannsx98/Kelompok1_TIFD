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
	<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
</head>

<body>
	<?php
	$qr = query("SELECT id_pembeli FROM pembeli WHERE email_pembeli='$mail'");
	foreach ($qr as $rslt) :
	?>
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
									<li class="account">
										<a href="#">
											Selamat Datang "<?= $mail; ?>"
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<!-- <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">Login</button>  -->
											<li><a href="#" data-toggle="modal" data-target="#"><i class="fa fa-sign-in"></i>Profil</a></li>
											<!-- <li><a href="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li> -->
											<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Ganti Password</a></li>
											<li><a href="../../controllers/login-pembeli/logout.php"><i class="fas fa-logout" aria-hidden="true"></i>Logout</a></li>
										</ul>
									</li>

									<!-- Currency / Language / My Account -->

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
								<a href="index.php">Sumber<span> Dadi</span></a>
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
										<?php
															$dtcart = mysqli_query($koneksi, "SELECT * FROM cart");
															$dt = mysqli_num_rows($dtcart);
										?>
										<a class="btn btn-success" href="cart.php?id=<?= $rslt['id_pembeli']; ?>"><i class="fa fa-shopping-cart"><span id="checkout_items" class="checkout_items"><?= $dt ?></span></i></a>
										<!-- <button href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal">
										<i class="fa fa-shopping-cart"></i>
									</button> -->
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
		<!-- Header -->


		<!-- MODAL CART -->
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

					</div>
				</div>
			</div>
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
						<?php if (isset($error)) : ?>
							<p class="alert-danger">Username/Password Salah</p>
						<?php endif; ?>
						<div class="d-flex flex-column text-center">
							<form action="" method="post">
								<div class="form-group">
									<input type="email" class="form-control" name="email_pembeli" id="email_pembeli" placeholder="Your email address...">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password_pembeli" id="password_pembeli" placeholder="Your password...">
								</div>
								<div class="form-group">
									<button type="submit" name="login" class="btn btn-success col-md-4 btn-round">Login</button>
									<button href="#" type="button" class="btn btn-primary btn-info col-md-4 btn-round" data-toggle="modal" data-target="#forgetModal" aria-hidden="true">Lupa Password</button>
								</div>
								<div class="d-flex justify-content-center social-buttons"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- AKHIR MODAL LOGIN -->


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
								</div>
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
	<?php endforeach; ?>