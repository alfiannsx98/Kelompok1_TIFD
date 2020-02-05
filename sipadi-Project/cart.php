<?php
require 'controllers/sipadi/sipadi-functions.php';
session_start();

$id = $_GET['id'];

if (isset($_SESSION['login_pembeli']) == 1) {
    $mail = $_SESSION['email'];
    $result = mysqli_query($koneksi, "SELECT id_pembeli FROM pembeli WHERE email_pembeli = '$mail'");
    $result1 = mysqli_fetch_assoc($result);
    $result = $result1['id_pembeli'];
    require 'includes/header-login.php';
} else {
    header('Location: index.php');
    exit;
    require 'includes/header.php';
}

$cart = query("SELECT * FROM cart WHERE id_users='$id'");

if (isset($_POST["checkout"])) {
    if (checkout($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Berhasil di Checkout');
                document.location.href= 'index.php';
            </script>
        ";
    }
}

?>
<div class="container single_product_container">
    <form id="formKu" action="" method="post" class="user" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Checkout</a></li>
                    </ul>
                </div>
                <table class="table col-10">
                    <thead>
                        <tr>
                            <th data-field="name">Nama Barang</th>
                            <th data-field="category">Kategori</th>
                            <th data-field="price">Harga</th>
                            <th data-field="quantity">Jumlah Dibeli</th>
                            <th data-field="quantity">Total Berat Barang</th>
                            <th data-field="total">Subtotal</th>
                            <th data-field="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $querycmnd = query(
                            "SELECT barang.nama_brg as 'nm_brg',
                            barang.id_brg as 'id_brg',
                            barang.harga_brg as 'harga',
                            kategori.nama_kategori as 'kategori',
                            cart.qty_dibeli as 'dibeli',
                            cart.id_cart as 'id_cart',
                            cart.subtotal as 'subtotal',
                            cart.total_berat as 'beratTotal'
                            FROM barang,kategori,cart
                            WHERE cart.id_barangs = barang.id_brg AND barang.id_ktg = kategori.id_kategori;
                "
                        );
                        ?>
                        <?php foreach ($querycmnd as $r) : ?>
                            <tr>
                                <td hidden><input type="hidden" name="id_barang[]" id="" value="<?= $r['id_brg'] ?>"></td>
                                <td><input type="hidden"><?= $r['nm_brg']; ?></td>
                                <td><input type="hidden"><?= $r['kategori']; ?></td>
                                <td><input type="number" name="harga_satuan[]" value="<?= $r['harga']; ?>" hidden>Rp. <?= $r['harga']; ?></td>
                                <td><input type="number" name="jml_dibeli_tmp[]" value="<?= $r['dibeli']; ?>" hidden><?= $r['dibeli']; ?></td>
                                <td><input type="number" id="beratTotal" class="form-control beratTotal" value="<?= $r['beratTotal']; ?>" hidden><?= $r['beratTotal'] . ' gr'; ?></td>
                                <td><input type="number" id="subtotals" class="form-control subtotalsa" value="<?= $r['subtotal']; ?>" hidden>Rp. <?= $r['subtotal']; ?></td>
                                <td><a href="hapus_cart.php?id=<?= $r['id_cart']; ?>"><i class="material-icons red-text">Hapus</i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
            </table>
            <div class="form-group">
                <label for="alamat_kirim"> Alamat Lengkap Penerima : </label>
                <textarea class="form-control" name="alamat_kirim" id="alamat_kirim" placeholder="Silahkan mengisi Anda" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="kota_provinsi"> Kota Provinsi : </label>
                    <select name="kota_provinsi" id="kota_provinsi" class="form-control" onchange="get_kota()" required>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="kota_kirim"> Kota Penerima : </label>
                    <select name="kota_kirim" id="kota_kirim" class="form-control" onchange="get_ongkir()" required>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ongkir_kurir"> Ongkos Kirim : </label>
                <select id="opsi_ongkir" name="ongkir_kurir" class="form-control">

                </select>
                <!-- <input type="number" name="harga_ongkier" id="harga_ongkier" hidden> -->
            </div>
            <div class="form-group">
                <label for="total"> Total Harga : </label>
                <input type="number" class="form-control" name="harga_subtotal" id="harga_subtotal" readonly>
            </div>
            <div class="form-group">
                <label for="harga_final"> Harga Final : </label>
                <input type="number" class="form-control" name="harga_final" id="harga_final" readonly>
            </div>
            <div hidden>
                <input type="number" name="keseluruhanBerat" id="keseluruhanBerat">
            </div>
            <input type="hidden" name="status_bayar" id="" value="0">
            <input type="hidden" name="status_kirim" id="" value="0">
            <?php
            $qry = query("SELECT id_pembeli FROM pembeli WHERE id_pembeli='$id'");
            foreach ($qry as $rsllt) :
            ?>
                <input type="hidden" name="id_users" id="" value="<?= $rsllt['id_pembeli']; ?>">
            <?php endforeach; ?>
            <br>
            <center>
                <button name="checkout" type="submit" class="btn btn-success">Checkout!</button>
            </center>
        </div>
    </form>
</div>


<?php
require 'includes/footer.php';
?>
<script type="text/javascript">
    $(function() {
        var total_berat = function() {
            var sum = 0;

            $('.beratTotal').each(function() {
                var num = $(this).val();

                if (num !== 0) {
                    sum += parseInt(num);
                }
            });

            $('#keseluruhanBerat').val(sum);
        }
        $('#formKu').click(function() {
            total_berat();
        });
    });
</script>
<script type="text/javascript">
    function get_ongkir() {
        $('#opsi_ongkir').html('<option disabled hidden selected>Mohon Tunggu Sedang memproses ...</option>');
        $.ajax({
            method: 'GET',
            url: 'http://localhost/Kelompok1_TIFD/sipadi-Project/controllers/rajaongkir/get_ongkir.php',
            data: {
                'city_id': $('#kota_kirim').val(),
                'berat': $('#keseluruhanBerat').val()
            },
            dataType: 'JSON',
            success: function(result) {
                field_ongkir = '<ul>';
                $.each(result.rajaongkir.results[0].costs, function(index1, jenis_ongkir) {
                    $.each(jenis_ongkir.cost, function(index1, tarif) {
                        field_ongkir += '<option value="' + tarif.value + '">Paket "' + jenis_ongkir.description + '" (Harga Rp. ' + tarif.value + ') Durasi (Selama ' + tarif.etd + ' Hari) Dengan Jumlah total berat barang (' + $('#keseluruhanBerat').val() / 1000 + 'KG)</option>'
                        // field_ongkir += '<li><input type="radio" value="' + tarif.value + '" name="kurir" id="harga_ongkier">' + jenis_ongkir.description + ' [' + tarif.value + ']</li>';
                    });
                });
                field_ongkir += '</ul>';
                $('#opsi_ongkir').html(field_ongkir);
            }
        });
    }
</script>