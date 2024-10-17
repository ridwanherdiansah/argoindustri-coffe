    <!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Review-->
        <div class="col-xl-9 col-lg-8 pb-5">
          <div class="wizard">
            <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <div class="wizard-step">
                <i class="fe-icon-check-circle"></i>
                1. Alamat
              </div>
              <div class="wizard-step">
                <i class="fe-icon-check-circle"></i>
                2. Expedisi
              </div>
              <div class="wizard-step active">3. Cekout</div>
            </div>
            <div class="wizard-body">
              <h3 class="h5 pb-3">Produk pembelian</h3>
              <!-- Item-->
              <?php 
                $total_berat = 0;
                $total_bayar = 0;
                if(isset($_SESSION['kopi'])){ 

                  foreach($_SESSION['kopi'] as $key => $val):
                    $total_berat = $total_berat + $_SESSION['kopi'][$key]['total_berat'];
                    $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'] + $_SESSION['expedisi']['harga'];
              ?>
              <div class="cart-item d-md-flex justify-content-between pr-2">
                <div class="px-3 my-3">
                  <a class="cart-item-product" href="shop-single.html">
                    <div class="cart-item-product-thumb">
                      <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $_SESSION['kopi'][$key]['image'] ; ?>" alt="Product">
                    </div>
                    <div class="cart-item-product-info">
                      <h4 class="cart-item-product-title">
                      <?= $_SESSION['kopi'][$key]['nama'] ; ?>
                    </h4>
                    <span>
                      <strong>Berat </strong> <?= $_SESSION['kopi'][$key]['berat'] ; ?> Gram
                    </span>
                    </div>
                  </a>
                </div>
                <div class="px-2 my-3 text-center">
                  <div class="cart-item-label">
                    Jumlah barang
                  </div>
                  <span class="text-xl font-weight-medium"><?= $_SESSION['kopi'][$key]['jumlah_barang'] ?></span>
                </div>

                <div class="px-2 my-3 text-center">
                  <div class="cart-item-label">
                    Harga satuan
                  </div>
                  <span class="text-xl font-weight-medium"><?=number_format($_SESSION['kopi'][$key]['harga'],2)?></span>
                </div>

                <div class="px-2 my-3 text-center">
                  <div class="cart-item-label">
                    Total berat
                  </div>
                  <span class="text-xl font-weight-medium"><?= $_SESSION['kopi'][$key]['total_berat'] ?></span>
                </div>

                <div class="px-2 my-3 text-center">
                  <div class="cart-item-label">
                    Total harga
                  </div>
                  <span class="text-xl font-weight-medium"><?=number_format($_SESSION['kopi'][$key]['total_harga'],2)?></span>
                </div>
              </div>
              <?php endforeach; }?>

              <div class="text-right pb-4">
                <span class="text-muted">Total pembayaran : </span>
                <span class="text-xl font-weight-medium">Rp - <?=number_format($total_bayar,2)?> </span>
                <br>
                <span class="text-muted">Total berat : </span>
                <span class="text-xl font-weight-medium"><?= $total_berat; ?> Gram</span>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="h6">Alamat penerima</h4>
                  <ul class="list-unstyled">
                    <li><span class="text-muted">Nama : </span><?= $user['nama']; ?></li>
                    <li><span class="text-muted">Alamat :<br>
                        </span> <?= $user['alamat']; ?>,
                                <?= $user['desa']; ?>,
                                <?= $user['kecamatan']; ?>
                    </li>
                    <li><span class="text-muted">Telepon : </span>(+68) <?= $user['telepon']; ?> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="wizard-footer d-flex justify-content-between">
              <a class="btn btn-secondary my-2" href="<?= base_url(); ?>penjualan/keranjang">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">Back</span>
              </a>
              <a class="btn btn-primary my-2" href="<?= base_url(); ?>penjualan/p_cekout/<?= $user['id_user']; ?>">Complete Order</a>
            </div>
          </div>
        </div>
        <!-- Sidebar-->
         <aside class="col-xl-3 col-lg-4 pb-4 mb-2">
          <!-- Order Summary-->
          <div class="widget">
            <h4 class="widget-title">Rincian pembayaran</h4>

            <?php 
                $total_berat = 0;
                $total_bayar = 0;
                if(isset($_SESSION['kopi'])){ 

                    foreach($_SESSION['kopi'] as $key => $val):
                      $total_berat = $total_berat + $_SESSION['kopi'][$key]['berat'];
                      $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'] + $_SESSION['expedisi']['harga'];
              ?>
                <div class="d-flex justify-content-between pb-2">
                  <div><?= $_SESSION['kopi'][$key]['nama'] ; ?></div>
                  <div class="font-weight-medium">Rp - <?=number_format($_SESSION['kopi'][$key]['total_harga'],2)?></div>
                </div>
              <?php endforeach; }?>
                <div class="d-flex justify-content-between pb-2">
                  <div><?= $_SESSION['expedisi']['nama'] ; ?></div>
                  <div class="font-weight-medium">Rp - <?=number_format($_SESSION['expedisi']['harga'],2)?></div>
                </div>

            <hr>
            <div class="pt-3 text-right text-lg font-weight-medium">Rp - <?=number_format($total_bayar,2)?> </div>
          </div>
        </aside>

      </div>
    </div>