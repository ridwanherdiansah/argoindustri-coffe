    <!-- Page Content-->
    <div class="container mb-3">
      <center>

        <!-- alert -->
        <?= $this->session->flashdata('message'); ?>

        <div class="col-md-6 pb-5">
          <form action="<?= base_url(); ?>auth/p_lupa_password" method="post" class="needs-validation wizard">
            <div class="wizard-body pt-2">
              <h3 class="h5 pt-4 pb-2">Masukan email anda</h3>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe-icon-mail"></i>
                  </span>
                </div>
                <input id="email" name="email" class="form-control" type="email" placeholder="Email" required >

            </div>
            <div class="wizard-footer text-right">
              <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
          </form>
        </div>
      </center>
    </div>