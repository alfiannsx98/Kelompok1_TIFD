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
    // ini untuk tambah data transaksi(detail)
    $(document).ready(function() {
        var i = 1;
        var j = 1;

        $('#add').click(function() {
            i++;
            j++;
            $('#fieldQue').append('<tr id="row' + i + '"><td><?php $brg = query("SELECT * FROM barang"); ?><select name="id_barang[]" id="id_brg_' + j + '" data-j="' + j + '" onchange="return terisi();" class="form-control id_barang_list terisi"><?php foreach ($brg as $barang) : ?><option value="<?= $barang['id_brg']; ?>"><?= $barang['nama_brg']; ?></option><?php endforeach; ?></select></td><td><input type="number" name="harga_satuan[]" id="harga_satuan_' + j + '" class="form-control harga_satuan_list terisi"></td><td><input type="number" name="jml_dibeli[]" id="jml_dibeli[]" class="form-control jml_dibeli_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-user btn-block btn_remove">Hapus Data</button></td>');
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
</script>
<script>
    function terisi() {
        $(document).on("change", ".terisi", function(e) {
                    var select = $(this);
                    var item_id = select.val();
                    var idf = select.data("idf");

                    $.ajax({
                        url: "autofill.php",
                        data: 'id=' + id_brg,
                        success: function(data) {
                            var json = data,
                                obj = JSON.parse(json);
                            $("#harga_satuan_" + j).val(data.harga_brg)
                        }
                    });
                }
</script>
</body>

</html>