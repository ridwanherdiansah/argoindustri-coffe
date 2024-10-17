<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Account Pengepul!</h1>
              </div>

              <?= $this->session->flashdata('message'); ?>
              
              <form class="user" method="post" action="<?= base_url();?>auth/registrasi ">
                <div class="form-group">
                  <input name="nama" type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" required >
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input name="email" type="text" class="form-control form-control-user" id="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>" required>
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password1" type="password" class="form-control form-control-user" id="password1" placeholder="Password" required >
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input name="password2" type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" required >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Registrasi
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url(); ?>auth/login">Login !</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>