

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
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Pengepul</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($admin as $p): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $p['id_pengepul']; ?></td>
                            <td scope="row"><?= $p['nama']; ?></td>
                            <td scope="row"><?= $p['email']; ?></td>
                            <td scope="row"><?= $p['alamat']; ?></td>
                            <td scope="row"><?= $p['provinsi']; ?></td>
                            <td scope="row"><?= $p['kota']; ?></td>
                            <td scope="row">
                              <?php if ($p['is_active'] == 0 ):?>
                                <a href="<?= base_url(); ?>gudang/active/<?= $p['id_pengepul']; ?>" class="btn btn-info btn-sm">Active kan</a>
                              <?php else : ?>
                                <a href="<?= base_url(); ?>gudang/non_active/<?= $p['id_pengepul']; ?>" class="btn btn-danger btn-sm">Non Activekan</a>
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


  <!-- tambahKopi Modal-->
  <div class="modal fade" id="tambahKopiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda mau keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">klik <b>Keluar</b> untuk keluar dari aplikasi </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a class="btn btn-primary" href="<?= base_url() ; ?>auth/logout">Keluar</a>
        </div>
      </div>
    </div>
  </div>