<?php require '../../controllers/sipadi/sipadi-functions.php'; ?>
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
			header("location: ../sipadi/");
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
<div class="container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center" style="padding-top:200px">
				<ul style="padding-bottom: 40px">
					<li><a href="index.php">Home</a></li>
					<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Profil</a></li>
				</ul>
			</div>

		</div>
	</div>
	<?php
	$id = $_GET['id'];
	$profil = query("SELECT * FROM pembeli WHERE id_pembeli='$id'");
	foreach ($profil as $pr) :
	?>
		<div class="jumbotron jumbotron-fluid">
			<div class="container text-center">
				<img src="<?= "../../views/login-pembeli/gambar/" . $pr['gambar_pembeli'] ?>" width="200" class="rounded-circle">
				<h1 class="display-4"><?= $pr['nama_pembeli']; ?></h1>
				<p class="lead">Selamat Datang di Website Kami</p>
			</div>
		</div>


		<div class="row">
			<div class="col text-center">
				<h1>Tentang</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg">
				<h4>Email : <?= $pr['email_pembeli'] ?></h4>
			</div>
			<div class="col-lg">
				<h4>Nomor HP : <?= $pr['nomor_hp']; ?></h4>
			</div>
			<div class="col-lg">
				<h4>NIK : <?= $pr['nik_pembeli']; ?></h4>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php
require 'includes/footer.php';
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>