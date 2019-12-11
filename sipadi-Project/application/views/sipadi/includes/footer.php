<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
					<ul class="footer_nav">
						<li><a href="contact.php">Contact us</a></li>
						<li><a href="../login/login.php">Author</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="footer_nav_container">
					<div class="cr">@Copyright SIPADI</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</section>
</div>

<script type="text/javascript">
	function autofill_kota() {
		var kota_kirim = $("#kota_kirim").val();
		$.ajax({
			url: '../transaksi/autofill_ongkir.php',
			data: 'id=' + kota_kirim,
			success: function(data) {
				var json = data,
					obj = JSON.parse(json);
				$('#ongkir_kurir').val(obj.ongkir_kurir);
			}
		});
	}
</script>
<script type="text/javascript">
	$("#formKu").click(function() {
		var bil1 = parseInt($("#qty_dibeli").val())
		var bil2 = parseInt($("#harga").val())

		var hasil = bil1 * bil2
		$("#subtotal").attr("value", hasil);
	});
</script>

<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>