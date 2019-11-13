<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resetpass.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h3>FORGOT PASSWORD</h3>
<div class="wrapper-f">
<form action="" method="post">
<label>Masukkan Email anda</label>
<input name="email" type="email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Masukkan Email Dengan benar oke gan')">
<input class="button" name="act_resset" type="submit" value="Submit"></form></div>

<?PHP 
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'tutorial';
$x = mysql_connect($server,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname,$x);
///////////////////////////////////////////////////////////////////////
if (isset($_POST['act_resset'])) {
date_default_timezone_set("Asia/Jakarta");
$pass="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($pass); 
$start=$len-$panjang; $xx=rand('0',$start); 
$yy=str_shuffle($pass); 
$passwordbaru=substr($yy, $xx, $panjang);
 
$email = trim(strip_tags($_POST['email']));
$password = mysql_real_escape_string(htmlentities((md5($passwordbaru))));
$datetime=date("h:i:s-j-M-Y");
 
// mencari alamat email si user
$query = "SELECT * FROM member WHERE email ='$email'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
$cek = mysql_num_rows($hasil);
$id_member = strip_tags($data['id_member']);
$alamatEmail = strip_tags($data['email']);
$nama = strip_tags($data['nama']);
$username =trim(strip_tags($data['user']));
if ($cek == 1) {
 
// title atau subject email
$title = "Permintaan Password Baru";
// isi pesan email disertai password
$pesan = "Kami telah meresset Ulang Kata sandi ".$nama." Dan anda dapat login kembali ke web kami \n\n 
DETAIL AKUN ANDA :\n Nama Penguna : ".$username." \n 
Kata sandi Anda yang baru adalah: ".$passwordbaru."\n\n 
\n\n PESAN NO-REPLY";
// header email berisi alamat pengirim
$header = "From: nama-website<no-reply@domain.com>";
// mengirim email
$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
// cek status pengiriman email
if ($kirimEmail) { 
 
// update password baru ke database (jika pengiriman email sukses)
$query = "UPDATE member SET password='$password', datetime='$datetime' WHERE id_member = '$id_member'";
$hasil = mysql_query($query);
 
if ($hasil) 
echo'<div class="warning">Kata sandi baru telah direset dan sudah dikirim ke email "'.$alamatEmail.'" Silahkan cek emailnya</div><br><br><hr><h3>CONTOH PESAN DALAM EMAIL<hr><br>
'.$pesan.'<hr>';
}
else {
echo'<div class="warning">Pengiriman Kata sandi baru ke email gagal</div>';
}
}
else{
 
echo'<div class="warning">Alamat Email tidak ditemukan</div>';
}}?>