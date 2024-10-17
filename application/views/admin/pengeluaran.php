

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
                        <th>Tanggal</th>
                        <th>Status</th>
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
