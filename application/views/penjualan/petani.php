    <!-- Hero-->
    <section class="bg-center bg-repeat-y box-shadow" style="background-image: url(img/homepages/freelancer-portfolio/hero-bg.png);">
      <div class="container">
        <div class="row">
          <div class="col-md-6 bg-secondary order-md-2 pt-md-5 overflow-hidden">
            <div class="mt-5 pt-5">
              <img class="d-block mx-auto" src="<?= base_url(); ?>assets/admin/img/suplier/<?= $petani['image']; ?>" alt="Martin Garrix" data-parallax="{&quot;scale&quot; : 1.15}">
            </div>
          </div>
          <div class="col-md-6 bg-white order-md-1 py-md-5 overflow-hidden">
            <div class="mt-md-5 py-5 text-center text-md-left">
              <h2 class="h3 text-body pt-md-5 pb-3">
                <span class="d-block font-family-body font-weight-light pb-2">
                  Hello!
                </span>
                <span class="d-block font-family-body font-weight-light">
                  Nama saya
                  <span class='font-weight-bold'>
                    <?= $petani['nama']; ?>
                  </span>
              </span>
            </h2>
              <h1 class="mb-4 mb-md-5" data-parallax="{&quot;x&quot; : 50}">
                <span class='font-weight-bold'>
                  <?= $petani['id_petani']; ?>
                </span>
              </h1>
              <div class="pt-3">
                  <a class="scroll-to btn btn-style-4 btn-gradient btn-icon-right mb-3" href="#works" data-parallax="{&quot;y&quot; : -25}">
                    <i class="fe-icon-arrow-down text-md"></i>
                      Produk Kopi
                  </a>
              </div>
              <div class="pt-4 pt-md-5">
                <?= $petani['email']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About-->
    <section class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 pt-3 text-center">
          <h2 class="h3 block-title mb-3">
            Keterangan Petani
          </h2>
          <p class="text-muted">
            Nama saya <?= $petani['nama']; ?>. saya lahir di <?= $petani['tempat_lahir']; ?> pada tahun <?= $petani['tanggal_lahir']; ?>. saya sekarang tinggal di <?= $petani['alamat']; ?>, desa <?= $petani['desa']; ?>, kota <?= $petani['kota']; ?>.
          </p>
        </div>
      </div>
      <hr class="mt-5">
    </section>
    <!-- Portfolio-->
    <section class="pb-5 mb-4" data-offset-top="105" id="works">
      <div class="bg-white mx-auto px-3 px-xl-5 pt-4 pb-5 box-shadow" style="max-width: 1300px;">
        <h2 class="h3 block-title text-center">
          Kopi
          <small>
          Kopi yang di produksi dari petani <?= $petani['nama']; ?>
        </small>
      </h2>
        <div class="row pt-4">
          <!-- Portfolio Item-->
          <?php foreach($kopi as $k): ?>
          <div class="col-md-4 col-sm-6 mb-30">
            <div class="portfolio-card">
              <a class="portfolio-thumb" href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>">
                <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $k['image']; ?>" alt="Portfolio Thumbnail"/>
              </a>
              <div class="portfolio-card-body">
                <div class="portfolio-meta">
                  <a href="#">
                    <i class="fe-icon-heart text-accent"></i>
                    <?= $k['rating']; ?>
                  </a>
                </div>
                <h5 class="portfolio-title">
                  <a href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>">
                    <?= $k['nama']; ?>
                  </a>
                </h5>
              <a class="tag-link" href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>">
                Masukan ke keranjang
              </a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </section>
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="js/vendor.min.js"></script>
    <script src="js/theme.min.js"></script>
  </body>
</html>