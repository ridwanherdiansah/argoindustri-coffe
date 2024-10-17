

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <!-- alert -->
        <?= $this->session->flashdata('message'); ?>

          <!-- Content Row -->

        <div class="container-fluid animatedParent animateOnce">
	        <div class="animated fadeInUpShort">
	            <div class="row my-3">
	                <div class="col-md-7  offset-md-2">
	                	<!-- 
	                    <?= form_open_multipart ('suplier/pe_kopi/'. $kopi['id_kopi']); ?> -->
	                        <div class="card no-b  no-r">
	                            <div class="card-body">
	                            	

	                                <h5 class="card-title">DETAIL KOPI</h5>
	                                <div class="form-row">
	                                    <div class="col-md-12">

	                                        <div class="form-row">
	                                        	
	                                        	<div class="form-group col-4 m-0">
	                                                <label for="id_pengepul" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID TRANSAKSI</label>
	                                                <input id="id_pengepul" name="id_pengepul" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $k_transaksi['id_transaksi']; ?>" readonly required>
	                                            </div>

	                                        	<div class="form-group col-4 m-0">
	                                                <label for="id_petani" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID PETANI</label>
	                                                <input id="id_petani" name="id_petani" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $k_transaksi['id_petani']; ?>" readonly required>
	                                            </div>

	                                            <div class="form-group col-4 m-0">
	                                                <label for="id_kopi" class="col-form-label s-12">ID KOPI</label>
		                                            <input id="id_kopi" name="id_kopi" placeholder="ID Kopi" class="form-control r-0 light s-12 " type="text" value="<?= $k_transaksi['id_kopi']; ?>" required readonly >
	                                            </div>

	                                        </div>

	                                        <div class="form-group m-0">
	                                            <label for="nama" class="col-form-label s-12">NAMA KOPI</label>
	                                            <input id="nama" name="nama" placeholder="Masukan nama petani" class="form-control r-0 light s-12 " type="text" value="<?= $k_transaksi['nama']; ?>" readonly required>
	                                        </div>

	                                        <div class="form-row">
	                                            <div class="form-group col-4 m-0">
	                                                <label for="type kopi" class="col-form-label s-12">HARGA SATUAN KOPI</label>
	                                                <input id="type_kopi" name="type_kopi" placeholder="Masukan type kopi" class="form-control r-0 light s-12 date-picker" type="text" value="<?= $k_transaksi['harga']; ?>" readonly required>
	                                            </div>
	                                            <div class="form-group col-4 m-0">
	                                                <label for="jenis_kopi" class="col-form-label s-12">JUMLAH PEMEBLIAN KOPI</label>
	                                                <input id="jenis_kopi" name="jenis_kopi" placeholder="Masukan jenis kopi" class="form-control r-0 light s-12" type="text" value="<?= $k_transaksi['jumlah']; ?>" readonly required>
	                                            </div>
	                                            <div class="form-group col-4 m-0">
	                                                <label for="jenis_kopi" class="col-form-label s-12">TOTAL HARGA</label>
	                                                <input id="jenis_kopi" name="jenis_kopi" placeholder="Masukan jenis kopi" class="form-control r-0 light s-12" type="text" value="<?= $k_transaksi['total_harga']; ?>" readonly required>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                            </div>
	                            <center>
	                            </center>
	                            <hr>
	                            <div class="card-body">
	                                <a href="<?= base_url(); ?>admin/transaksi" type="button" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Kembali</a>
	                            </div>
	                        </div>
	                    <!-- </form> -->
	                </div>
	            </div>
	    	</div>
	    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
