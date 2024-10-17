    <!-- Page Content-->
    <div class="container mb-3">
      <center>

        <!-- alert -->
        <?= $this->session->flashdata('message'); ?>

        <div class="col-md-6 pb-5">
          <form action="<?= base_url(); ?>auth/p_verifikasi_pasword" method="post" class="needs-validation wizard">
            <input type="hidden" name="mail" value="<?= $this->uri->segment(3) ?>">
            <div class="wizard-body pt-2">
              <h3 class="h5 pt-4 pb-2">verifikasi_pasword</h3>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe-icon-lock"></i>
                  </span>
                </div>
                <input id="password1" name="password1" class="form-control" type="password" placeholder="Password baru" required>
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe-icon-lock"></i>
                  </span>
                </div>
                <input id="password2" name="password2" class="form-control" type="password" placeholder="Verifikasi password baru" required>
              </div>
            </div>
            <div class="wizard-footer text-right">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </center>
    </div>