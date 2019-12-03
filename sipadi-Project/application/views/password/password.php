<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1220px; height:325px;">
    <?php
    require '../../../application/controllers/password/functions-password.php';
    //include "koneksi.php";
    if (isset($_GET['id_admin'])) {
        $id_admin = $_GET['id_admin'];
    }
    //else {
    //die ("Error. No ID Selected! ");    
    //}
    //proses ganti password
    if (isset($_POST['Ganti'])) {
    
    $password_lama    = $_POST['password_lama'];
    $password_baru    = $_POST['password_baru'];
    $konf_password    = $_POST['konf_password'];
    //cek old password
    $query = "SELECT * FROM admin WHERE id_admin='$id_admin' AND password_admin='$password_lama'";
    $sql = mysql_query ($query);
    $hasil = mysql_num_rows ($sql);
    if (! $hasil >= 1) {
        ?>
            <script language="JavaScript">
            alert('Password lama tidak sesuai!, silahkan ulang kembali!');
            document.location='index.php';
            </script>
        <?php
            unset($_SESSION['id_admin']);
            unset($_SESSION['level']);
            session_destroy();
    }
    

    //validasi data data kosong
    else if (empty($_POST['password_baru']) || empty($_POST['konf_password'])) {
            echo "<h3><font color=red>Ganti Password Gagal! Data Tidak Boleh Kosong.</font></h3>";    
    }
    //validasi input konfirm password
    else if (($_POST['password_baru']) != ($_POST['konf_password'])) {
            echo "<h3><font color=red><center>Ganti Password Gagal! Password dan Konfirm Password Harus Sama.</center></font></h3>";    
    }
    else {
    //update data
    $query = "UPDATE admin SET password_admin='$password_baru' WHERE id_admin='$id_admin'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        echo "<h3><font color=#8BB2D9><center>Ganti Password Berhasil!</center></font></h3>";    
    } else {
        echo "<h3><font color=red><center> Ganti Password Gagal!</center></font></h3>";    
    }
    }
    }
?>


<form action="" method="POST" name="form-ganti-password" enctype="multipart/form-data">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="56" align="center">
            <td><font size="2" color="ADFF2F"><b>FORM GANTI PASSWORD PHP</b></font></td>
        </tr>
    </table>
    <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="36">
            
        </tr>
        <tr height="36">
            <td>Password Lama :</td>
            <td><input type="password" name="password_lama" id="password_lama" size="30" maxlength="20"></td>
        </tr>
        <tr height="36">
            <td>Password Baru :</td>
            <td><input type="password" name="password_baru" id="password_baru" size="30" maxlength="20"></td>
        </tr>
        <tr height="36">
            <td>Konfirm Password Baru :</td>
            <td><input type="password" name="konf_password" id="konf_password" size="30" maxlength="20"></td>
        </tr>
        <tr height="56">
            <td> </td>
            <td><input type="submit" name="Ganti" value="Ganti"></td>
        </tr>
    </table>
</form>

</div>