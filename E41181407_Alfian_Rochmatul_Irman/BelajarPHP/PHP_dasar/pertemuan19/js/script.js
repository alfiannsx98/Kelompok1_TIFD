// ambil elemen yang dibutuhkan tadi, menggunakan teknik penelusuran 

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// kita butuh trigger untuk aksi menjalankan ajaxnya.

// tombolCari.addEventListener('click', function () {
//     alert('Berhasill!!');
// });

// tambahkan event ketika keyword ditulis.

keyword.addEventListener('keyup', function () {

    // buat object ajax

    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax nya untuk menentukan apakah sumber data siap atau tidak

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax

    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();


});