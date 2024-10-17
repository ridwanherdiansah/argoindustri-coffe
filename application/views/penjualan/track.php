    <!-- Page Content-->
    <div class="container pb-5 mb-4">
      <!-- Order Tracking-->
      <div class="wizard pb-3">
        <div class="bg-dark px-3 py-4 text-center text-white text-uppercase">
          ID Transaksi - <strong><?= $transaksi['id_transaksi']; ?></strong>
        </div>
        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between bg-secondary px-3 py-4">
          <div class="w-100 text-center">
            <span class="font-weight-medium">
              Pengiriman :
            </span>
              <?= $transaksi['deskripsi']; ?>
            </div>
          <div class="w-100 text-center">
            <span class="font-weight-medium">
              Status:
            </span>
            <?php if ($transaksi['status'] == 0 ):?>
              Proses order
            <?php elseif ($transaksi['status'] == 1 ):?>
              Produk di kirim
            <?php elseif ($transaksi['status'] == 2 ) :?>
              Produk sudah sampai
            <?php else : ?>
              Produk di tolak
            <?php endif;?>
          </div>
          <div class="w-100 text-center">
            <span class="font-weight-medium">
              Tanggal transaksi:
            </span>
              <?= $transaksi['tanggal']; ?>
          </div>
        </div>
        <div class="wizard-body pb-5">
          <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
            <?php if ($transaksi['status'] == 0 ):?>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-check-circle"></i>
                Order confirmasi
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-settings"></i> 
                Proses Order
              </div>
              <div class="wizard-step">
                <i class="wizard-icon fe-icon-truck"></i>
                Produk di kirim 
              </div>
              <div class="wizard-step">
                <i class="wizard-icon fe-icon-home"></i>
                Produk sampai 
              </div>
            <?php elseif ($transaksi['status'] == 1 ):?>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-check-circle"></i>
                Order confirmasi
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-settings"></i> 
                Proses Order
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-truck"></i>
                Produk di kirim 
              </div>
              <div class="wizard-step">
                <i class="wizard-icon fe-icon-home"></i>
                Produk sampai 
              </div>
            <?php elseif ($transaksi['status'] == 2 ) :?>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-check-circle"></i>
                Order confirmasi
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-settings"></i> 
                Proses Order
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-truck"></i>
                Produk di kirim 
              </div>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-home"></i>
                Produk sampai 
              </div>
            <?php else : ?>
              <div class="wizard-step active">
                <i class="wizard-icon fe-icon-check-circle"></i>
                Produk di tolak
              </div>
              <div class="wizard-step ">
                <i class="wizard-icon fe-icon-settings"></i> 
                 Produk di tolak
              </div>
              <div class="wizard-step">
                <i class="wizard-icon fe-icon-truck"></i>
                Produk di tolak
              </div>
              <div class="wizard-step">
                <i class="wizard-icon fe-icon-home"></i>
                Produk di tolak
              </div>
            <?php endif;?>
          </div>
        </div>
        <div class="wizard-footer d-sm-flex flex-wrap justify-content-between align-items-center text-center">
          <a class="btn btn-primary btn-sm mt-2" href="#order-details" data-toggle="modal">Detail Transaksi</a>
        </div>
      </div>
    </div>

<!-- Order Details-->
    <div class="modal fade" id="order-details">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">ID Transaksi - <?= $transaksi['id_transaksi']; ?></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pb-0">
            <!-- Item-->
            <?php foreach($k_transaksi as $kt): ?>
              <div class="cart-item d-md-flex justify-content-between pr-2">
                <div class="px-3 my-3">
                  <div class="cart-item-label d-none d-mb-block">
                    Product
                  </div>
                  <a class="cart-item-product" href="<?= base_url(); ?>penjualan/kopi/<?= $kt['id_kopi']; ?>">
                    <div class="cart-item-product-thumb">
                      <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $kt['image']; ?>" alt="Product">
                    </div>
                    <div class="cart-item-product-info">
                      <h4 class="cart-item-product-title">
                        <?= $kt['nama']; ?>
                      </h4>
                      <span>
                        <strong>
                          Harga :
                        </strong>
                          Rp - <?=number_format($kt['total_harga'],2)?>
                        </span>
                    </div>
                  </a>
                </div>
                <div class="px-3 my-3 text-center">
                  <div class="cart-item-label">
                    Jumlah barang
                  </div>
                  <span class="text-xl font-weight-medium">
                    <?= $kt['jumlah']; ?>
                  </span>
                </div>
                <div class="px-3 my-3 text-center">
                  <div class="cart-item-label">
                    Total harga
                  </div>
                  <span class="text-xl font-weight-medium">
                    Rp - <?=number_format($kt['total_harga'],2)?>
                  </span>
                </div>
              </div>
            <?php endforeach;?>
          </div>

          <div class="modal-footer flex-wrap justify-content-between">
            <div class="px-2 py-1">
              <span class="text-muted">Total berat : </span>
              <span class="font-weight-medium"><?= $transaksi['total_berat']; ?> Gram</span>
            </div>
            <div class="px-2 py-1">
              <span class="text-muted">Biaya pengiriman : </span>
              <span class="font-weight-medium">Rp - <?=number_format($transaksi['harga'],2); ?></span></div>
            <div class="px-2 py-1">
              <span class="text-muted">Total pembayaran : </span>
              <span class="text-lg font-weight-medium">Rp - <?=number_format($transaksi['total_pembayaran'],2); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>