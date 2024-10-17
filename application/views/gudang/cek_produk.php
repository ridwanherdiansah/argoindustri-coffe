
<!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- alert -->
      <?= $this->session->flashdata('message'); ?>

      	<h1 class="h3 mb-4 text-gray-800">
      		<center>
      			<a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#TerimaModal">
	                <span class="icon text-white-50">
	                  	<i class="fas fa-flag"></i>
	                </span>
	                <span class="text">Terima</span>
                </a>
                <a href="<?= base_url() ; ?>gudang/tolak/<?= $expedisi['id_transaksi']; ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                    	<i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Tolak</span>
                </a>
            </center>
      	</h1>
          <!-- Content Row -->
          <div class="row">

            <!-- sub total transaksi -->
            <div class="col-xl-5 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sub total transaksi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                      <tr>
	                        <td>Sub Total Produk</td>
	                        <td>Rp - <?=number_format($sub_total_detail_transaksi,2); ?></td>
	                      </tr>
	                      <tr>
	                        <td>Sub Total Expedisi</td>
	                        <td>Rp - <?=number_format($expedisi['harga'],2); ?></td>
	                      </tr>
	                      <tr>
	                        <td><b>Total Pembayaran</b></td>
	                        <td><b>Rp - <?=number_format($expedisi['harga'],2); ?></b></td>
	                      </tr>
                  </table>
                </div>
              </div>
            </div>

            <!-- expedisi -->
            <div class="col-xl-7 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expedisi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                    <thead>
	                      <tr>
	                        <th>No</th>
	                        <th>ID Expedisi</th>
	                        <th>No Resi</th>
	                        <th>Nama</th>
	                        <th>Deskripsi</th>
	                        <th>Lama Hari</th>
	                        <th>Berat</th>
	                        <th>Harga</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                      <?php $i = 1; ?>
	                          <tr>
	                            <td scope="row"><?= $i; ?></td>
	                            <td scope="row"><?= $expedisi['id_expedisi']; ?></td>
	                            <td scope="row"><?= $expedisi['no_resi']; ?></td>
	                            <td scope="row"><?= $expedisi['nama']; ?></td>
	                            <td scope="row"><?= $expedisi['deskripsi']; ?></td>
	                            <td scope="row"><?= $expedisi['lama_hari']; ?></td>
	                            <td scope="row"><?= $expedisi['berat']; ?> Gram</td>
	                            <td scope="row">Rp - <?=number_format($expedisi['harga'],2); ?></td>
	                      <?php $i++; ?>
	                    </tbody>
	                    <tfoot>
	                      <tr>
	                        <td rowspan="1" colspan="7">Sub Total Expedisi</td>
	                        <td rowspan="1" colspan="1">Rp - <?=number_format($expedisi['harga'],2); ?></td>
	                      </tr>
	                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <!-- detail transaksi -->
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
                        <th>ID Transaksi</th>
                        <th>ID Pengepul</th>
                        <th>ID Petani</th>
                        <th>ID Kopi</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php
                      	$ppn = 2000;
                        $sub_total = 0;
                        foreach($k_transaksi as $t): 
                        $ppn = $ppn - $t['total_harga'];
                        $sub_total = $sub_total + $t['total_harga'];
                      ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['id_transaksi']; ?></td>
                            <td scope="row"><?= $t['id_pengepul']; ?></td>
                            <td scope="row"><?= $t['id_petani']; ?></td>
                            <td scope="row"><?= $t['id_kopi']; ?></td>
                            <td scope="row"><?= $t['nama']; ?></td>
                            <td scope="row">Rp - <?=number_format($t['harga'],2); ?></td>
                            <td scope="row"><?= $t['jumlah']; ?></td>
                            <td scope="row">Rp - <?=number_format($t['total_harga'],2); ?></td>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td rowspan="1" colspan="8">Sub Total Transaksi</td>
                        <td rowspan="1" colspan="1"> Rp - <?=number_format($sub_total,2)?></td>
                      </tr>
                    </tfoot>
                  </table>
                
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- Logout Modal-->
  <div class="modal fade" id="TerimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Terima Orderan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        	<form action="<?= base_url() ; ?>gudang/terima/<?= $expedisi['id_transaksi']; ?>" method="post">
        		<div class="modal-body">
		        	<div class="form-group">
		            	<label for="id_kopi" class="col-form-label s-12">Masukan No Resi</label>
		            	<input type="text" class="form-control" id="no_resi" name="no_resi" required>
		          	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="submit" class="btn btn-primary">Terima</button>
		        </div>
        	</form>
        	
      </div>
    </div>
  </div>
