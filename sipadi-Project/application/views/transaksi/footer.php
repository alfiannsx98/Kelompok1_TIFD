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
    $(document).ready(function() {
        $('#example1').DataTable();
    })
</script>
<script>
    // ini untuk tambah data transaksi(detail)
    $(document).ready(function() {
        var i = 1;
        var j = 1;

        $('#add').click(function() {
            i++;
            j++;
            $('#fieldQue').append('<tr id="row' + i + '"><td><?php $brg = query("SELECT * FROM barang"); ?><select name="id_barang[]" id="id_brg_' + j + '" data-j="' + j + '" class="form-control id_barang_list terisi"><option value="" disabled selected>Silahkan Pilih Item</option><?php foreach ($brg as $barang) : ?><option value="<?= $barang['id_brg']; ?>"><?= $barang['nama_brg']; ?></option><?php endforeach; ?></select></td><td><input type="number" name="harga_satuan[]" id="harga_satuan_' + j + '" class="form-control harga_satuan_list terisi" readonly></td><td><input type="number" name="jml_dibeli_tmp[]" id="jml_dibeli_' + j + '" class="form-control jml_dibeli_tmp_list" placeholder="masukkan jml dibeli"></td><td><input type="number" name="subtotal" id="subtotal1_' + j + '" class="form-control subtotallist" readonly></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-user btn-block btn_remove">Hapus Data</button></td>');
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
        $(document).on("change", ".terisi", function(e) {
            var select = $(this);
            var item_id = select.val();
            var j = select.data("j");

            $.ajax({
                url: "autofill.php",
                data: 'id=' + item_id,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $("#harga_satuan_" + j).val(obj.harga_brg)
                }
            });
        });
        // $('#fieldQue').click(function() {
        $('#fieldQue').click(function() {
            var totalSum = 0;
            var totalSum1 = 0;
            var bil5 = parseInt($('#harga_satuan_' + j).val())
            var bil6 = parseInt($('#jml_dibeli_' + j).val())
            var hasil = bil5 * bil6
            $('#subtotal1_' + j).attr('value', hasil);
            $('#subtotal').each(function() {
                var inputVal = $(this).val();
                if ($.isNumeric(inputVal)) {
                    totalSum += parseFloat(inputVal)
                }
                $('#id_brg_' + j).each(function() {
                    var inputVal1 = $('#subtotal1_' + j).val();
                    if ($.isNumeric(inputVal1)) {
                        totalSum1 += parseFloat(inputVal1)
                    }
                });
                var totalHarga = totalSum + totalSum1
                // $('#harga_total').attr('value', totalHarga);
            });
        });
        // });
    });
</script>
<!-- untuk autofill bukan looping -->
<script type="text/javascript">
    function autofill() {
        var id_brg = $("#id_barang").val();
        $.ajax({
            url: 'autofill.php',
            data: 'id=' + id_brg,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#harga_satuan').val(obj.harga_brg);
            }
        });
    }
</script>
<script>
    // ini untuk update data
    $(document).ready(function() {
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
    // ini untuk update data
    $(document).ready(function() {
        var i = 1;
        var j = 1;
        $('#tmbh').click(function() {
            i++;
            j++;
            $('#editkeun').append('<tr id="row' + i + '"><td><?php $brg = query("SELECT * FROM barang"); ?><select name="id_barang[]" id="id_brg_' + j + '" data-j="' + j + '" class="form-control id_barang_list terisi"><option value="" disabled selected>Silahkan Pilih Item</option><?php foreach ($brg as $barang) : ?><option value="<?= $barang['id_brg']; ?>"><?= $barang['nama_brg']; ?></option><?php endforeach; ?></select></td><td><input type="number" name="harga_satuan[]" id="harga_satuan_' + j + '" class="form-control harga_satuan_list terisi"></td><td><input type="number" name="jml_dibeli_tmp[]" id="jml_dibeli[]" class="form-control jml_dibeli_tmp_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-user btn-block btn_remove">Hapus Data</button></td>');
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
    // INI FOOTERNYA UNTUK Change Nama Gambar
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<!-- autofill untuk harga kurir -->
<script type="text/javascript">
    function autofill_kota() {
        var kota_kirim = $("#kota_kirim").val();
        $.ajax({
            url: 'autofill_ongkir.php',
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
        var bil1 = parseInt($("#harga_satuan").val())
        var bil2 = parseInt($("#jml_dibeli_tmp").val())

        var hasil = bil1 * bil2
        $("#subtotal").attr("value", hasil);
    });
</script>
<script>
    // $('#fieldQue').click(function() {
    //     var totalSum = 0;
    //     var totalSum1 = 0;
    //     // $('#subtotal').each(function() {
    //     //     var inputVal = parseInt($(this).val())
    //     //     if ($.isNumeric(inputVal)) {
    //     //         totalSum += parseInt(inputVal)
    //     //     }
    //     // });
    //     $('#subtotal1').each(function() {
    //         var inputVal1 = parseInt($(this).val())
    //         if ($.isNumeric(inputVal1)) {
    //             totalSum1 += parseInt(inputVal1)
    //         }
    //     });
    //     var subtotal1 = parseInt($('#subtotal').val())
    //     var subtotal2 = parseInt($(totalSum1).val())

    //     var totalHarga = subtotal1 + subtotal2
    //     $('#total_harga').attr('value', totalHarga)
    // });
</script>
<script type="text/javascript">
    $(function() {
        var total_harga = function() {
            var sum = 0;

            $('.subtotallist').each(function() {
                var num = $(this).val();

                if (num !== 0) {
                    sum += parseInt(num);
                }
            });

            $('#harga_total').val(sum);
        }
        $('.subtotallist').click(function() {
            total_harga();
        });
    });
</script>
<script type="text/javascript">
    $('#formKu').click(function() {
        var bil3 = parseInt($('#harga_total').val())
        var bil4 = parseInt($('#ongkir_kurir').val())

        var hasil = bil3 + bil4
        $('#harga_final').attr('value', hasil)
    });
</script>
</body>

</html>