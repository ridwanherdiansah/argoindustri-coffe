
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="row">
        <div class="col-lg-3">
          <!-- Shop Sidebar-->
          <!-- Off-Canvas Toggle-->
          <a class="offcanvas-toggle" href="#shop-sidebar" data-toggle="offcanvas">
            <i class="fe-icon-sidebar"></i>
          </a>
          <!-- Off-Canvas Container-->
          <aside class="offcanvas-container" id="shop-sidebar">
            <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
              <!-- Categories-->
              <div class="widget widget-categories">
                <h4 class="widget-title">Nama Produk kopi</h4>
                <ul>
                  <?php foreach($kopi as $k): ?>
                    <li><a href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>"><?= $k['nama']; ?></a></li>
                  <?php endforeach;?>
                </ul>
              </div>

            </div>
          </aside>
        </div>
        <div class="col-lg-9">
          <!-- Shop Grid-->
          <div class="row">

            <!-- Product-->
            <?php foreach($kopi as $k): ?>
            <div class="col-md-4 col-sm-6 mb-30">
              <div class="product-card mx-auto mb-3">
                <div class="product-head d-flex justify-content-between align-items-center">
                  <span class="badge badge-danger">Sale</span>
                  <div class="rating-stars">
                    <i class="fe-icon-star active"></i><?= $k['rating']; ?>
                  </div>
                </div>
                <a class="product-thumb" href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>">
                  <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $k['image']; ?>" alt="Product Thumbnail"/>
                </a>
                <div class="product-card-body">
                  <a class="product-meta" href="<?= base_url(); ?>penjualan/petani/<?= $k['id_petani']; ?>"><?= $k['id_kopi']; ?></a>
                  <h5 class="product-title">
                    <a href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>"><?= $k['nama']; ?></a>
                  </h5>
                  <span class="product-price">
                    Rp - <?=number_format($k['harga_jual'],2)?> 
                  </span>
                </div>
                <div class="product-buttons-wrap">
                  <div class="product-buttons">
                    <!-- <div class="product-button">
                      <a href="<?= base_url(); ?>penjualan/rating/<?= $k['id_kopi']; ?>" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to your wishlist!">
                        <i class="fe-icon-heart"></i>
                      </a>
                    </div> -->
                    <div class="product-button">
                      <a href="<?= base_url(); ?>penjualan/kopi/<?= $k['id_kopi']; ?>" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="added to cart successfuly!">
                        <i class="fe-icon-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            <!-- end produk -->
          </div>
          <div class="pt-3">
            <!-- Pagination-->
            <nav class="pagination"><a class="prev-btn" href="#"><i class="fe-icon-chevron-left"></i>Prev</a>
              <ul class="pages">
                <li class="d-block d-sm-none w-100">2 / 18</li>
                <li class="d-none d-sm-inline-block"><a href="#">1</a></li>
                <li class="d-none d-sm-inline-block active"><a href="#">2</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">3</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">4</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">5</a></li>
                <li class="d-none d-sm-inline-block">...</li>
                <li class="d-none d-sm-inline-block"><a href="#">18</a></li>
              </ul><a class="next-btn" href="#">Next<i class="fe-icon-chevron-right"></i></a>
            </nav>
          </div>
        </div>
      </div>
    </div>