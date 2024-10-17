

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- alert -->
          <?= $this->session->flashdata('message'); ?>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Petani</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petani; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kopi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kopi; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pembelian</h6>
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
                        <th>Tanggal</th>
                        <th>Status</th>
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
                            <td scope="row"><?= $t['id_kopi']; ?></td>
                            <td scope="row"><?= $t['tanggal']; ?></td>
                            <td scope="row">
                              <?php if ($t['status'] == 0 ):?>
                                Cek produk
                              <?php elseif ($t['status'] == 1 ):?>
                                Poduk sudah di kirim
                              <?php elseif ($t['status'] == 2 ) :?>
                                Poduk sudah sampai
                              <?php else : ?>
                                Tolak
                              <?php endif;?>
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
