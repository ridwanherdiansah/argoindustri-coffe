

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <!-- alert -->
        <?= $this->session->flashdata('message'); ?>

          <!-- Content Row -->

        <div class="container-fluid animatedParent animateOnce">
	        <div class="animated fadeInUpShort">
	            <div class="row my-3">
	                <div class="col-md-7  offset-md-2">

	                        <div class="card no-b  no-r">
	                            <div class="card-body">
	                            	

	                                <h5 class="card-title">DATA PEMASUKAN</h5>
	                                <div class="form-row">
	                                    <div class="col-md-12">

	                                        <div class="form-row">
	                                        	
	                                        	<div class="form-group col-6 m-0">
	                                                <label for="id_pengepul" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID PENGEPUL</label>
	                                                <input id="id_pengepul" name="id_pengepul" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $pemasukan['id_pengepul']; ?>" readonly required>
	                                            </div>

	                                        	<div class="form-group col-6 m-0">
	                                                <label for="id_petani" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID PETANI</label>
	                                                <input id="id_petani" name="id_petani" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $pemasukan['id_petani']; ?>" readonly required>
	                                            </div>

	                                            <div class="form-group col-6 m-0">
	                                                <label for="id_kopi" class="col-form-label s-12">ID KOPI</label>
		                                            <input id="id_kopi" name="id_kopi" placeholder="ID Kopi" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['id_kopi']; ?>" required readonly >
	                                            </div>

	                                        </div>

	                                        <div class="form-group m-0">
	                                            <label for="nama" class="col-form-label s-12">NAMA KOPI</label>
	                                            <input id="nama" name="nama" placeholder="Masukan nama petani" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['nama']; ?>" readonly required>
	                                        </div>

	                                        <div class="form-row">
			                                    <div class="form-group col-12 m-0">
			                                        <label for="keterangan_kopi"  class="col-form-label s-12">KETERANGAN KOPI</label>
			                                        <textarea id="keterangan_kopi" name="keterangan_kopi" class="form-control" placeholder="Masukan keterangan kopi" readonly required><?= $pemasukan['keterangan_kopi']; ?></textarea>
			                                    </div>
			                                </div>

	                                        <div class="form-row">
	                                            <div class="form-group col-6 m-0">
	                                                <label for="type kopi" class="col-form-label s-12">TYPE KOPI</label>
	                                                <input id="type_kopi" name="type_kopi" placeholder="Masukan type kopi" class="form-control r-0 light s-12 date-picker" type="text" value="<?= $pemasukan['type_kopi']; ?>" readonly required>
	                                            </div>
	                                            <div class="form-group col-6 m-0">
	                                                <label for="jenis_kopi" class="col-form-label s-12">JENIS KOPI</label>
	                                                <input id="jenis_kopi" name="jenis_kopi" placeholder="Masukan jenis kopi" class="form-control r-0 light s-12" type="text" value="<?= $pemasukan['jenis_kopi']; ?>" readonly required>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                            </div>
	                            <hr>
	                             <div class="card-body">
	                                <h5 class="card-title">HARGA KOPI</h5>
	                                <div class="form-row">
	                                    <div class="col-md-12">

	                                        <div class="form-row">
	                                        	<div class="form-group col-6 m-0">
	                                                <label for="harga" class="col-form-label s-12">HARGA</label>
		                                            <input id="harga" name="harga" placeholder="Harga" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['harga']; ?>" readonly required >
	                                            </div>

	                                            <div class="form-group col-6 m-0">
	                                                <label for="harga_jual" class="col-form-label s-12">HARGA JUAL</label>
		                                            <input id="harga_jual" name="harga_jual" placeholder="Harga jual" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['harga_jual']; ?>" readonly required >
	                                            </div>
	                                        </div>

	                                        <div class="form-row">
	                                        	<div class="form-group col-6 m-0">
	                                                <label for="jumlah" class="col-form-label s-12">JUMLAH</label>
		                                            <input id="jumlah" name="jumlah" placeholder="jumlah" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['jumlah']; ?>" readonly required >
	                                            </div>

	                                            <div class="form-group col-6 m-0">
	                                                <label for="tanggal" class="col-form-label s-12">TANGAL</label>
		                                            <input id="tanggal" name="tanggal" placeholder="Harga jual" class="form-control r-0 light s-12 " type="text" value="<?= $pemasukan['tanggal']; ?>" readonly required >
	                                            </div>
	                                        </div>

	                                    </div>
	                                </div>
	                            </div>
	                            <center>
	                            </center>
	                            <hr>
	                            <div class="card-body">
	                                <a href="<?= base_url(); ?>gudang/pemasukan" type="button" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Kembali</a>
	                            </div>
	                        </div>
	                </div>
	            </div>
	    	</div>
	    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
