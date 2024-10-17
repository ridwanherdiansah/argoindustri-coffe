

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <button type="button" class="btn btn-primary d-none d-sm-inline-block shadow-sm" data-toggle="modal" data-target="#PengeluaranModal">
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
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Cek pendapatan:</div>
                      <button class="dropdown-item" data-toggle="modal" data-target="#Transaksi">Cek pendapatan</button>
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
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>No Resi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengeluaran as $p): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $p['id_transaksi']; ?></td>
                            <td scope="row"><?= $p['id_user']; ?></td>
                            <td scope="row"><?= $p['id_expedisi']; ?></td>
                            <td scope="row"><?= $p['tanggal']; ?></td>
                            <td scope="row"><?= $p['status']; ?></td>
                            <td scope="row"><?= $p['no_resi']; ?></td>
                            <td scope="row">
                            	<a href="<?= base_url(); ?>gudang/detail_transaksi/<?= $p['id_transaksi']; ?>" class="btn btn-info btn-sm">Lihat</a>
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


<!-- Modal -->
<div class="modal fade" id="PengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="PengeluaranModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PengeluaranModalLabel">Cetak Data Pemasukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>gudang/cetak_pengeluaran" method="post">

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