    <!-- Page Content-->
    <div class="container mb-3">
      <center>

        <!-- alert -->
        <?= $this->session->flashdata('registrasi'); ?>

        <div class="col-md-6 pb-5">
          <h3 class="h4 pb-1">Registrasi</h3>
          <form action="<?= base_url(); ?>auth/user_registrasi" method="post" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-ln">Nama</label>
                  <input id="nama" name="nama" class="form-control" type="text" <?= set_value('nama'); ?> required>
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-email">Alamat Email</label>
                  <input id="email" name="email" class="form-control" type="email" <?= set_value('email'); ?> required id="reg-email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-password">Password</label>
                  <input id="password1" name="password1" class="form-control" type="password" required id="reg-password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-password-confirm">Kompirmasi Password</label>
                  <input id="password2" name="password2" class="form-control" type="password" required id="reg-password-confirm">
                </div>
              </div>
            </div>
            <div class="text-right">
              <button class="btn btn-primary" type="submit">Registrasi</button>
            </div>
          </form>
        </div>
      </center>
    </div>