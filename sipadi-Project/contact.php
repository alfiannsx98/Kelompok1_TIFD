<!DOCTYPE html>
<?php
session_start();
require '../controllers/sipadi/sipadi-functions.php';



if (isset($_SESSION["login_pembeli"]) == 1) {
	$mail = $_SESSION['email'];
	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$mail'");
	require 'includes/header-login.php';
} else {
	require 'includes/header.php';
}

if (isset($_POST["login"])) {
	$email = $_POST["email_pembeli"];
	$password = $_POST["password_pembeli"];

	$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email_pembeli = '$email'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password_pembeli"])) {
			header("location: ../sipadi/");
			$_SESSION["login_pembeli"] = 1;
			$_SESSION['email'] = $email;
		}
	}
	$error = true;
}
if (isset($_POST["submit"])) {
    if (tambahCont($_POST) > 0) {
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

<body>

	<div class="super_container"></div>


	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="contact.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Map Container -->

		<div class="row">
			<div class="col">
				<div id="google_map">
					<div class="map_container"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.699409194101!2d113.71522175323192!3d-8.209688228986323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd696f7d10ace89%3A0xd889be3d4aa49522!2sToko%20Pertanian%20SUMBERDADI!5e0!3m2!1sid!2sid!4v1577082811565!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		</div>



		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Contact Us</h1>
					<p>Ada banyak cara untuk menghubungi kami. Anda dapat mengirimi kami telepon, menelepon kami atau mengirim email, pilih yang paling cocok untuk Anda.</p>
					<div>
						<p>081 135 505 7</p>
						<p>sumberdadi@gmail.com</p>
					</div>
					<div>
						<p>Open hours: 8.00-17.00 Senin-Sabtu</p>
						<p>Sunday: Closed</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Hubungi Kami!</h1>
					<form action= "" method="POST">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="text" name="nama" placeholder="Nama" required="required" data-error="Name is required.">
							<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
							<input id="input_nohp" class="form_input input_nohp input_ph" type="text" name="no_hp" placeholder="NO HP" required="required" data-error="Nomor is required.">
							<textarea id="input_message" class="input_ph input_message" name="pesan" placeholder="Pesan" rows="3" required data-error="Please, write us a message."></textarea>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" name="submit" value="Submit">Kirim Pesan</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

	<!-- Newsletter -->

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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/contact_custom.js"></script>


</body>

</html>