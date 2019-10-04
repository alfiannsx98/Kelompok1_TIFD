// js yg diisi dgn jQuery

// $(document) = memanggil jquery

$(document).ready(function () {
    // buat event ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    })
});