// js yg diisi dgn jQuery

// $(document) = memanggil jquery


// menghilangkan tombol cari

$('#tombol-cari').hide();

$(document).ready(function () {
    // buat event ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        $('.loader').show();

        // $menggunakan get
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {
            $('#container').html(data);

            $('.loader').hide();
        });

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    })
});