  <!-- Page Content-->
    <div class="container mb-4">
      <div class="row">
        <div class="col-lg-4 pb-5">
          <!-- Account Sidebar-->
          <div class="author-card pb-3">
            <div class="author-card-cover" style="background-image: url(img/widgets/author/cover.jpg);">
            </div>
            <div class="author-card-profile">
              <div class="author-card-avatar">
                <img src="<?= base_url(); ?>assets/user/profile/<?= $user['image']; ?>" alt="Daniel Adams"/>
              </div>
              <div class="author-card-details">
                <h5 class="author-card-name text-lg"><?= $user['nama']; ?></h5><span class="author-card-position">Joined <?= $user['date_created']; ?></span>
              </div>
            </div>
          </div>
          <div class="wizard">
            <nav class="list-group list-group-flush">
              <a class="list-group-item" href="<?= base_url(); ?>user/profile/<?= $user['id_user']; ?>">
                <i class="fe-icon-user text-muted"></i>
                Profile
              </a>
              <a class="list-group-item" href="<?= base_url(); ?>user/alamat/<?= $user['id_user']; ?>">
                <i class="fe-icon-map-pin text-muted"></i>
                Alamat
              </a>
              <a class="list-group-item" href="<?= base_url(); ?>user/history/<?= $user['id_user']; ?>">
                <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                History
              </a>
            </nav>
          </div>
        </div>