        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
          <?= form_open_multipart ('user/p_profile/'. $user['id_user']); ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-ln">Nama</label>
                <input id="nama" name="nama" class="form-control" type="text" id="account-ln" value="<?= $user['nama']; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-email">Alamat Email</label>
                <input class="form-control" type="email" id="account-email" value="<?= $user['email']; ?>" readonly disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-pass">Password baru</label>
                <input id="password1" name="password1" class="form-control" type="password" id="account-pass">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-confirm-pass">Confirmasi Password</label>
                <input id="password2" name="password2" class="form-control" type="password" id="account-confirm-pass">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-confirm-pass">Foto profile</label>
                <input class="form-control" type="file" id="image" name="image">
              </div>
            </div>
            <div class="col-12">
              <hr class="mt-2 mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <button class="btn btn-primary" type="submit" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">
                  Update Profile
                </button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>