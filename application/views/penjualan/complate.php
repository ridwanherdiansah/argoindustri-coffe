<!-- Page Content-->
<div class="container pb-5 mb-3">
  <!-- Checkout: Complete-->
  <div class="wizard pb-3">
    <div class="wizard-body pt-2 text-center">
      <h3 class="h4 pb-3">Terimaksi sudah order!</h3>
      <p class="mb-2">Produk kopi yang di order sedang di proses mohon untuk menungu.</p>
      <p class="mb-2">ID Transaksi anda adalah<strong> <?= $transaksi['id_transaksi']; ?>.</strong></p>
      <p>ID Transaksi ini untuk melacak produk kopi yang di order.</p>
      <a class="btn btn-secondary mt-3 mr-3" href="<?= base_url(); ?>penjualan/katalog_kopi">Kembali</a>
      <a class="btn btn-primary mt-3" href="<?= base_url(); ?>penjualan/track/<?= $transaksi['id_transaksi']; ?>">
      	<i class="fe-icon-map-pin"></i>&nbsp;Track Order</a>
    </div>
  </div>
</div>