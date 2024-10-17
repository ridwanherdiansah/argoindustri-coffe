    <!-- Page Content-->
    <div class="container mb-3">
      <center>

        <!-- alert -->
        <?= $this->session->flashdata('login'); ?>

        <div class="col-md-6 pb-5">
          <form action="<?= base_url(); ?>auth/puser_login" method="post" class="needs-validation wizard">
            <div class="wizard-body pt-2">
              <h3 class="h5 pt-4 pb-2">Login</h3>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe-icon-mail"></i>
                  </span>
                </div>
                <input id="email" name="email" class="form-control" type="email" placeholder="Email" required >
              </div>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe-icon-lock"></i>
                  </span>
                </div>
                <input id="password" name="password" class="form-control" type="password" placeholder="Password" required>
              </div>
            </div>
            <div class="wizard-footer text-right">
              <label class="float-left"><a href="<?= base_url('auth/lupaPassword')?>">Lupa Password</a></label>
              <button class="btn btn-primary" type="submit">Login</button>
            </div>
          </form>
        </div>
      </center>
    </div>