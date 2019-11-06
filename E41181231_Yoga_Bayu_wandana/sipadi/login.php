<section>

  <div class="login-bg">
    <div class="row">
      <div class="col-5">
        <div class="modal fade" id="login_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light font-m-bold" id="LoginLabel">Login</h5>
                    <button type="button" class="close btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form class="font-m-light" action="#" method="post">
                    <div class="form-group">
                      <label for="username-user" class="font-m-med">Username</label>
                      <input type="text" class="form-control" id="username-user" name="username-user" aria-describedby="usernameHelp" placeholder="Enter username">
                      <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="password-user" class="font-m-med">Password</label>
                      <input type="password" class="form-control" id="password-user" name="password-user" placeholder="Password">
                      <small id="passwordHelp" class="form-text text-muted">Masukkan 8 - 32 Karakter.</small>
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="tampil-sandi">
                      <label class="form-check-label" for="tampil-sandi">Tampilkan Sandi</label>
                    </div>
                    <div class="text-center">
                      <small><a href="daftar_user" class="text-dark">Belum ada akun?</a></small>
                    </div>
                  
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary" name="login_user">Save changes</button>
                </div>
              </div>
              </form>
          </div>
      </div>
      </div>
    </div>
  </div>
</section>