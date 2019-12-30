
<div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Lupa Password</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form action="../../controllers/login/PHPMailer/config-mail.php" method="post" class="user">
            <div class="form-group">
              <input type="text" class="form-control" id="namaemail"placeholder="Alamat Email">
              <?php
                if (isset($_POST["reset-submit"])) {
                   $_POST["email_pembeli"];
                     } ?>
              <input type="text" class="form-control form-control-user" id="email_pembeli" name="email_pembeli" placeholder="Masukkan Email Anda" value="">
            <button name="reset-submit" class="btn btn-info btn-block btn-round">KIRIM</button>
			      <a href="loginn.php" class="btn btn-success btn-user btn-block">kembali ke Login</a>
          </form>
          
          <div class="text-center text-muted delimiter"><a href="lupassword.php" class="text-info">Forget Password</a></div>
          <div class="d-flex justify-content-center social-buttons">
        </div>
      </div>
    </div>
  </div>
</div>
