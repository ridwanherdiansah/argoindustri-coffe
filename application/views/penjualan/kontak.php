    <!-- Page Content-->
    <div class="container pb-4 mb-2">
      <!-- Customer Service-->
      <div class="row">
        <div class="col-md-7">
          <h2 class="text-muted opacity-50 mb-30">Gudang</h2>
        </div>
        <div class="col-md-5">
          <ul class="list-icon">
            <li class="mb-2">
              <i class="fe-icon-mail text-muted"></i>
              <a class="navi-link ml-1" href="mailto:customer.service@example.com">
                customer.service@example.com
              </a>
            </li>
            <li class="mb-2">
              <i class="fe-icon-phone text-muted"></i>
              <a class="navi-link ml-1" href="tel:108044357260">
                +1 (080) 44 357 260
              </a>
            </li>
            <li class="mb-2">
              <i class="fe-icon-clock text-muted"></i>
              <span class="ml-1">
                1 - 2 business days
              </span>
            </li>
          </ul>
        </div>
      </div>
      <hr class="mt-5">
      <!-- Outlet Stores-->
      <h3 class="h4 pt-5 pb-4 text-center">Kontak pengepul</h3>
      <div class="row">

        <?php foreach($admin as $a): ?>
        <div class="col-lg-4 col-sm-6 mb-30 pb-4">
          <div class="card">
            <img src="<?= base_url(); ?>assets/admin/img/profile/<?= $a['image']; ?>" alt="Orlando, USA"/>
            <div class="card-body">
              <h6><?= $a['nama']; ?></h6>
              <div class="widget widget-contacts">
                <ul>
                  <li>
                    <i class="fe-icon-map-pin"></i>
                    <span>Alamat</span>
                    <?= $a['alamat']; ?>, <?= $a['kota']; ?>, <?= $a['provinsi']; ?>.
                  </li>
                  <li>
                    <i class="fe-icon-mail"></i>
                    <span>Email</span>
                    <?= $a['email']; ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>

      </div>
    </div>