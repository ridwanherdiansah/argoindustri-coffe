

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <button type="button" class="btn btn-primary d-none d-sm-inline-block shadow-sm" data-toggle="modal" data-target="#PemasukanModal">
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
                  <h6 class="m-0 font-weight-bold text-primary">Kopi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Pengepul</th>
                        <th>ID Petani</th>
                        <th>ID Kopi</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pemasukan as $p): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $p['id_pengepul']; ?></td>
                            <td scope="row"><?= $p['id_petani']; ?></td>
                            <td scope="row"><?= $p['id_kopi']; ?></td>
                            <td scope="row"><?= $p['nama']; ?></td>
                            <td scope="row"><?= $p['jumlah']; ?></td>
                            <td scope="row"><?= $p['tanggal']; ?></td>
                            <td scope="row">
                              <a href="<?= base_url(); ?>gudang/l_pemasukan/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Lihat</a>
                              </a>
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

<!-- Modal -->
<div class="modal fade" id="PemasukanModal" tabindex="-1" role="dialog" aria-labelledby="PemasukanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PemasukanModalLabel">Cetak Data Pemasukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>gudang/cetak_pemasukan" method="post">

          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id Pengepul</label>
            <input id="id_pengepul" name="id_pengepul" type="text" class="form-control" id="recipient-name" >
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