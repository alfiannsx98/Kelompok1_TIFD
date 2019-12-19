<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIPADI 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="../../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../../assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../assets/js/demo/chart-area-demo.js"></script>
<script src="../../../assets/js/demo/chart-pie-demo.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    // ini untuk tambah data
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#fieldQue').append('<tr id="row' + i + '"><td><input type="number" name="stok[]" placeholder="Masukkan data Stok" class="form-control stok_list" required></td><td><input type="date" name="expired[]" class="form-control expired_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-user btn-block btn_remove">Hapus Data</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "tambah.php",
                method: "POST",
                data: $('#tambahkeun').serialize(),
                success: function(data) {
                    (data);
                    $('#tambahkeun')[0].reset();
                }
            });
        });
    });
    // akhir dari tambah data
</script>
<script>
    // ini untuk update data
    $(document).ready(function() {
        var i = 1;
        $('#tmbh').click(function() {
            i++;
            $('#fieldQue').append('<tr id="row' + i + '"><td><input type="number" name="stok1[]" placeholder="Masukkan data Stok" class="form-control stok_list" required pattern="[-+]?[0-9]"></td><td><input type="date" name="expired1[]" class="form-control expired_list" required></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-user btn-block btn_remove">Hapus Data</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#update').click(function() {
            $.ajax({
                url: "edit.php",
                method: "POST",
                data: $('#editkeun').serialize(),
                success: function(data) {
                    (data);
                    $('#editkeun')[0].reset();
                }
            });
        });
    });
</script>
<script>
    function myFunction() {
        var r = confirm("Yakin Menghapus?");
        if (r == true) {
            document.location.href = 'hapus.php?id=<?= $brg['id_brg']; ?>';
        }
    }
</script>
<script>
    // INI FOOTERNYA UNTUK Change Nama Gambar
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
</body>

</html>