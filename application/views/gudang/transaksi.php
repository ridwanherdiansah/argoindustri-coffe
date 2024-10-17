

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <button type="button" class="btn btn-primary d-none d-sm-inline-block shadow-sm" data-toggle="modal" data-target="#TransaksiModal">
            Cetak Data
            </button>
          </div>

          <!-- alert -->
          <?= $this->session->flashdata('message'); ?>
          
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>ID User</th>
                        <th>ID Expedisi</th>
                        <th>Total Pembayaran</th>
                        <th>Total Berat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($transaksi as $t): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['id_transaksi']; ?></td>
                            <td scope="row"><?= $t['id_user']; ?></td>
                            <td scope="row"><?= $t['id_expedisi']; ?></td>
                            <td scope="row"> Rp - <?=number_format($t['total_pembayaran'],2)?></td>
                            <td scope="row"><?= $t['total_berat']; ?> Gram</td>
                            <td scope="row"><?= $t['tanggal']; ?></td>
                            <td scope="row">
                              <?php if ($t['status'] == 0 ):?>
                                <a href="<?= base_url(); ?>gudang/cek_produk/<?= $t['id_transaksi']; ?>" class="btn btn-warning btn-sm">Cek produk</a>
                                <a href="<?= base_url() ; ?>gudang/tolak/<?= $t['id_transaksi']; ?>" class="btn btn-danger btn-sm">Tolak</a>
                              <?php elseif ($t['status'] == 1 ):?>
                                <a href="#" class="btn btn-success btn-sm">Poduk sudah di kirim</a>
                              <?php elseif ($t['status'] == 2 ) :?>
                                <div class="btn btn-success btn-sm">Poduk sudah sampai</div>
                              <?php else : ?>
                                <div class="btn btn-danger btn-sm">Tolak</div>
                              <?php endif;?>
                            </td>
                            <td scope="row">
                              <?php if ($t['status'] == 2 ): ?>
                                <a href="<?= base_url(); ?>gudang/detail_transaksi/<?= $t['id_transaksi']; ?>" class="btn btn-info btn-sm">Detail Transaksi</a>
                              <?php else: ?>
                                <a href="<?= base_url(); ?>gudang/detail_transaksi/<?= $t['id_transaksi']; ?>" class="btn btn-info btn-sm">Detail Transaksi</a>
                              <?php endif; ?>
                            </td>
                          </tr>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>

<!-- Modal -->
<div class="modal fade" id="TransaksiModal" tabindex="-1" role="dialog" aria-labelledby="TransaksiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TransaksiModalLabel">Cetak Data Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>gudang/cetak_transaksi" method="post">

          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id User</label>
            <input id="id_user" name="id_user" type="text" class="form-control" id="recipient-name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Awal:</label>
            <input id="tanggal_awal" name="tanggal_awal" type="date" class="form-control" id="recipient-name" required >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Akhir:</label>
            <input id="tanggal_akhir" name="tanggal_akhir" type="date" class="form-control" id="recipient-name" required>
          </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Cetak Data</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
      <!-- End of Main Content -->

<!-- Modal -->
<!-- <div class="modal fade" id="Transaksi" tabindex="-1" role="dialog" aria-labelledby="TransaksiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TransaksiLabel">Cetak Data Kopi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <!-- Card Body -->
        <!-- <div class="card-body">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Pengepul</th>
                        <th>ID Petani</th>
                        <th>ID Kopi</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($k_transaksi as $t): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['id_pengepul']; ?></td>
                            <td scope="row"><?= $t['id_petani']; ?></td>
                            <td scope="row"><?= $t['id_kopi']; ?></td>
                            <td scope="row"><?= $t['nama']; ?></td>
                            <td scope="row"><?= $t['harga']; ?></td>
                            <td scope="row"><?= $t['jumlah']; ?></td>
                            <td scope="row"><?= $t['total_harga']; ?></td>
                          </tr>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                
                </div>  -->        
     
  <!--   </div>
  </div>
</div> -->