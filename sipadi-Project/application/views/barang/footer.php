<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
    var i = 1;
    $('#tambah').click(function()) {
    i++;
    $('dinamis').append('<tr id="row' + i + '"><td> <div class="col-sm"><input type = "number" name = "stok" class = "form-control" placeholder = "Masukkan Stok Barang"></div> </td><td><div class = "col-sm"><input type = "date" name = "expired" class = "form-control" placeholder = "Masukkan Stok Barang"></div></td><td><div class = "col-sm"><button id="' + i + '" type = "button" name = "kurang" class = "btn btn-danger btn-user btn-block btn_remove">kurangi Jumlah Data</button></div></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    $('#submit').click(function() {
        $.ajax({
            url: "tambah.php",
            method: "POST",
            data: $('#tambah').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
</script>
</body>

</html>