    <!-- Page Content-->
    <div class="container pb-5 mb-2">

      <!-- Cart Item-->
      <?php 
        $total_berat = 0;
        $total_bayar = 0;
        if(isset($_SESSION['kopi'])){ 

          foreach($_SESSION['kopi'] as $key => $val):
            $total_berat = $total_berat + $_SESSION['kopi'][$key]['total_berat'];
            $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'];
      ?>

      <div class="cart-item d-md-flex justify-content-between">

        <a href="<?= base_url(); ?>penjualan/d_keranjang/<?=$_SESSION['kopi'][$key]['id_kopi']?>">
          <span class="remove-item">
            <i class="fe-icon-x"></i>
          </span>
        </a>

        <div class="px-3 my-3">
          <a class="cart-item-product" href="<?= base_url(); ?>penjualan/kopi/<?= $_SESSION['kopi'][$key]['id_kopi'] ; ?>">
            <div class="cart-item-product-thumb">
              <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $_SESSION['kopi'][$key]['image'] ; ?>" alt="Product">
            </div>
            <div class="cart-item-product-info">
              <h4 class="cart-item-product-title"><?= $_SESSION['kopi'][$key]['nama'] ; ?></h4>
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

      <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-left">
        <div class="py-2">
          <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Total Berat:</span>
          <span class="d-inline-block align-middle text-xl font-weight-medium"><?= $total_berat ; ?> Gram</span>
        </div>
        <div class="py-2">
          <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Total Harga:</span>
          <span class="d-inline-block align-middle text-xl font-weight-medium">Rp - <?=number_format($total_bayar,2)?> </span>
        </div>
      </div>

      <!-- <?= print_r($_SESSION); ?> -->

      <!-- Buttons-->
      <hr class="my-2">
      <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3">
          <a class="btn btn-primary btn-block" href="<?= base_url(); ?>penjualan/p_keranjang/<?= $user['id_user']; ?>">
            <i class="fe-icon-credit-card"></i>
            &nbsp;Checkout
          </a>
        </div>
      </div>
    </div>