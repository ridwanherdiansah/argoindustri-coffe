    <!-- Page Content-->
    <div class="container pb-4 mb-1">
      <div class="row">
        <!-- Sidebar-->
        <div class="col-lg-3">
          <a class="offcanvas-toggle" href="#blog-single-sidebar" data-toggle="offcanvas">
            <i class="fe-icon-sidebar"></i>
          </a>
          <aside class="offcanvas-container" id="blog-single-sidebar">
            <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0">
              <span class="offcanvas-close"
              ><i class="fe-icon-x"></i>
              </span>
              <div class="widget widget-categories">
                <h4 class="widget-title">Petani Kopi</h4>
                <ul>
                  <?php foreach($petani as $p): ?>
                    <li><a href="<?= base_url(); ?>penjualan/petani/<?= $p['id_petani']; ?>"><?= $p['nama']; ?></a></li>
                  <?php endforeach;?>
                </ul>
              </div>
            </div>
          </aside>
        </div>
        <div class="col-lg-9">
          <!-- Categories Grid-->
          <div class="row pt-3">


            <!-- Category-->
            <?php foreach($petani as $p): ?>
            <div class="col-sm-6 mb-4">
              <a class="product-category-card mx-auto" href="<?= base_url(); ?>penjualan/petani/<?= $p['id_petani']; ?>">
                <div class="product-category-card-thumb">
                  <div class="main-img">
                    <img src="<?= base_url(); ?>assets/admin/img/suplier/<?= $p['image']; ?>" alt="Shop Category"/>
                  </div>
                </div>
                <div class="product-category-card-body">
                  <div class="product-category-card-meta"><?= $p['id_petani']; ?></div>
                  <h5 class="product-category-card-title"><?= $p['nama']; ?></h5>
                </div>
              </a>
            </div>
            <?php endforeach;?>
            <!-- end category -->


          </div>
        </div>
      </div>
    </div>