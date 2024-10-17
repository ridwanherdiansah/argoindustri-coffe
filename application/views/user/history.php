        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($transaksi as $t): ?>
                <tr>
                  <td>
                    <a class="navi-link" href="<?= base_url(); ?>penjualan/track/<?= $t['id_transaksi']; ?>">
                      <?= $t['id_transaksi']; ?>
                    </a>
                  </td>
                  <td><?= $t['tanggal']; ?></td>
                  <td>
                    <?php if ($t['status'] == 0 ):?>
                      <span class="badge badge-warning m-0">Proses order</span>
                    <?php elseif ($t['status'] == 1 ):?>
                      <a href="<?= base_url(); ?>penjualan/terima/<?= $t['id_transaksi']; ?>" class="btn btn-info btn-sm">Produk sudah di terima</a>
                    <?php elseif ($t['status'] == 2 ) :?>
                      <span class="badge badge-success m-0">Produk sudah sampai</span>
                    <?php else : ?>
                      <span class="badge badge-danger m-0">Produk di tolak</span>
                    <?php endif;?>
                  </td>
                  <td>
                    <span> Rp - <?=number_format($t['total_pembayaran'],2)?></span>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>