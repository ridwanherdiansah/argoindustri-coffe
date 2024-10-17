

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- alert -->
          <?= $this->session->flashdata('message'); ?>
          
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kopi</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Tambah data kopi:</div>
                      <button class="dropdown-item" data-toggle="modal" data-target="#Transaksi">Tambah</button>
                    </div>
                  </div>
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
                        <th>ID Kopi</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Jumlah Produk</th>
                        <th>Total Pembelian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php
                        $sub_total = 0;
                        foreach($transaksi as $t): 
                        
                        $sub_total = $sub_total + $t['total_harga'];
                      ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['id_transaksi']; ?></td>
                            <td scope="row"><?= $t['id_user']; ?></td>
                            <td scope="row"><?= $t['id_expedisi']; ?></td>
                            <td scope="row"><?= $t['id_kopi']; ?></td>
                            <td scope="row"><?php echo $_POST['tanggal_awal']; ?></td>
                            <td scope="row"><?php echo $_POST['tanggal_akhir']; ?></td>
                            <td scope="row"><?= $t['jumlah']; ?></td>
                            <td scope="row"> Rp - <?=number_format($t['total_harga'],2)?></td>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td rowspan="1" colspan="8">Sub Total</td>
                        <td rowspan="1" colspan="1"> Rp - <?=number_format($sub_total,2)?></td>
                      </tr>
                    </tfoot>
                  </table>
                
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="Transaksi" tabindex="-1" role="dialog" aria-labelledby="TransaksiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TransaksiLabel">Cetak Data Kopi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>admin/cetak_transaksi" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ID Kopi:</label>
            <input id="id_kopi" name="id_kopi" type="text" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Masukan Tanggal Awal:</label>
            <input id="tanggal_awal" name="tanggal_awal" type="date" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Masukan Tanggal Awal:</label>
            <input id="tanggal_akhir" name="tanggal_akhir" type="date" class="form-control" id="recipient-name">
          </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Lihat</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>