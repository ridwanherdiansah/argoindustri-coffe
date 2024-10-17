

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <button type="button" class="btn btn-primary d-none d-sm-inline-block shadow-sm" data-toggle="modal" data-target="#kopiModal">
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
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Tambah data kopi:</div>
                      <a class="dropdown-item" href="<?= base_url(); ?>suplier/t_kopi" >Tambah</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Petani</th>
                        <th>ID Kopi</th>
                        <th>Nama</th>
                        <th>Type Kopi</th>
                        <th>Jenis Kopi</th>
                        <th>Harga</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($kopi as $k): ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $k['id_petani']; ?></td>
                            <td scope="row"><?= $k['id_kopi']; ?></td>
                            <td scope="row"><?= $k['nama']; ?></td>
                            <td scope="row"><?= $k['type_kopi']; ?></td>
                            <td scope="row"><?= $k['jenis_kopi']; ?></td>
                            <td scope="row"><?= $k['harga']; ?></td>
                            <td scope="row"><?= $k['harga_jual']; ?></td>
                            <td scope="row"><?= $k['stok']; ?></td>
                            <td scope="row">
                              <a href="<?= base_url(); ?>suplier/e_kopi/<?= $k['id_kopi']; ?>" class="btn btn-warning btn-sm">Edit</a>
                              <a 
                                  href="javascript:;"
                                  data-menu="<?php echo $k['id_kopi'] ?>"
                                  data-toggle="modal" data-target="#TambahStok<?php echo str_replace(' ', '', $k['id_kopi']) ?>" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></button>
                              </a>
                              <a href="<?= base_url(); ?>suplier/d_kopi/<?= $k['id_kopi']; ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
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

<?php foreach ($kopi as $k ): ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="TambahStok<?php echo str_replace(' ', '', $k['id_kopi']) ?>" tabindex="-1" role="dialog" aria-labelledby="TambahStok" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahStok">Tambah stok kopi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?=base_url('suplier/t_stok/'. $k['id_kopi']);?>" method="post">
        
        <div class="modal-body">
          <div class="form-group">
            <label for="id_kopi" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID KOPI</label>
            <input type="text" class="form-control" id="id_kopi" name="id_kopi" 
            placeholder="Masukan ID KOPI" value="<?= $k['id_kopi']; ?>" readonly >
          </div>

          <div class="form-group">
            <label for="jumlah_stok" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>JUMLAH BARANG</label>
            <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" 
            placeholder="Masukan jumlah barang" required >
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>    
<?php endforeach; ?>


<!-- Modal -->
<div class="modal fade" id="kopiModal" tabindex="-1" role="dialog" aria-labelledby="kopiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kopiModalLabel">Cetak Data Kopi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>suplier/cetak_kopi/<?= $admin['id_pengepul']; ?>" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Masukan Id Kopi:</label>
            <input id="id_kopi" name="id_kopi" type="text" class="form-control" id="recipient-name">
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
