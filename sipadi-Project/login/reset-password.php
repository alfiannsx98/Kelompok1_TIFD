<?php
require_once 'login_header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card o-hidden boreder-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <form action="../controllers/login/PHPMailer/config-mail.php" method="post" class="user">
                                <div class="form-group">
                                    <center>
                                        <h1 class="col-lg">RESET PASSWORD</h1>
                                    </center>
                                    <br>
                                    <?php
                                    if (isset($_POST["reset-submit"])) {
                                        $_POST["email_admin"];
                                    } ?>
                                    <input type="text" class="form-control form-control-user" id="email_admin" name="email_admin" placeholder="Masukkan Email Anda" value="">
                                </div>
                                <hr>
                                <button name="reset-submit" class="btn btn-primary btn-user btn-block">Kirim Kode</button>
                                <a href="login.php" class="btn btn-success btn-user btn-block">kembali ke Login</a>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'login_footer.php';
?>