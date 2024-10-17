

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        	<!-- alert -->
          <?= $this->session->flashdata('message'); ?>

          <!-- Content Row -->

        <div class="container-fluid animatedParent animateOnce">
	        <div class="animated fadeInUpShort">
	            <div class="row my-3">
	                <div class="col-md-7  offset-md-2">
	                    <?= form_open_multipart ('suplier/p_kopi'); ?>
	                        <div class="card no-b  no-r">
	                            <div class="card-body">
	                            	

	                                <h5 class="card-title">DATA KOPI</h5>
	                                <div class="form-row">
	                                    <div class="col-md-12">

	                                        <div class="form-row">
	                                        	<div class="form-group col-6 m-0">
	                                                <label for="id_petani" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID PETANI</label>
	                                                <input id="id_petani" name="id_petani" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" required>
	                                            </div>

	                                            <div class="form-group col-6 m-0">
	                                                <label for="id_kopi" class="col-form-label s-12">ID KOPI</label>
		                                            <input id="id_kopi" name="id_kopi" placeholder="ID Kopi" class="form-control r-0 light s-12 " type="text" value="<?= $kopi ?>" required readonly >
	                                            </div>

	                                        </div>

	                                        <div class="form-group m-0">
	                                            <label for="nama" class="col-form-label s-12">NAMA KOPI</label>
	                                            <input id="nama" name="nama" placeholder="Masukan nama petani" class="form-control r-0 light s-12 " type="text" required>
	                                        </div>

	                                        <div class="form-row">
			                                    <div class="form-group col-12 m-0">
			                                        <label for="keterangan_kopi"  class="col-form-label s-12">KETERANGAN KOPI</label>
			                                        <textarea id="keterangan_kopi" name="keterangan_kopi" class="form-control" placeholder="Masukan keterangan kopi" required></textarea>
			                                    </div>
			                                </div>

	                                        <div class="form-row">
	                                            <div class="form-group col-6 m-0">
	                                                <label for="type kopi" class="col-form-label s-12">TYPE KOPI</label>
	                                                <input id="type_kopi" name="type_kopi" placeholder="Masukan type kopi" class="form-control r-0 light s-12 date-picker" type="text" required>
	                                            </div>
	                                            <div class="form-group col-6 m-0">
	                                                <label for="jenis_kopi" class="col-form-label s-12">JENIS KOPI</label>
	                                                <input id="jenis_kopi" name="jenis_kopi" placeholder="Masukan jenis kopi" class="form-control r-0 light s-12" type="text" required>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="form-row">
	                                    <div class="form-group col-12 m-0">
	                                        <label for="tempat_tanam"  class="col-form-label s-12">ALAMAT TANAM</label>
	                                        <textarea id="tempat_tanam" name="tempat_tanam" class="form-control" placeholder="Masukan alamat tanam" required></textarea>
	                                    </div>
	                                </div>

	                                <div class="form-row mt-1">
	                                    <div class="form-group col-6 m-0">
	                                        <label for="tanggal_tanam" class="col-form-label s-12">TANGGAL TANAM</label>
	                                        <input id="tanggal_tanam" name="tanggal_tanam" placeholder="Masukan nama tanggal tanam" class="form-control r-0 light s-12 " type="date" required >
	                                    </div>

	                                    <div class="form-group col-6 m-0">
	                                        <label for="tanggal_panen" class="col-form-label s-12">TANGGAL PANEN</label>
	                                        <input id="tanggal_panen" name="tanggal_panen" placeholder="Masukan nama tanggal panen" class="form-control r-0 light s-12 " type="date" required >
	                                    </div>
	                                </div>

	                                <div class="form-row mt-1">
	                                    <div class="form-group col-4 m-0">
	                                        <label for="pupuk" class="col-form-label s-12">PUPUK</label>
	                                        <input id="pupuk" name="pupuk" placeholder="Masukan alamat pupuk" class="form-control r-0 light s-12 " type="text" required >
	                                    </div>

	                                    <div class="form-group col-8 m-0">
	                                        <label for="telepon" class="col-form-label s-12">KETERANGAN PUPUK</label>
	                                        <textarea id="keterangan_pupuk" name="keterangan_pupuk" class="form-control" type="text" placeholder="Masukan keterangan pupuk" required style="margin-top: 0px; margin-bottom: 0px; height: 39px;"></textarea>
	                                    </div>
	                                </div>

	                                <div class="form-row">
	                                    <div class="form-group col-12 m-0">
	                                        <label for="riwayat_penyakit"  class="col-form-label s-12">RIWAYAT PENYAKIT</label>
	                                        <textarea id="riwayat_penyakit" name="riwayat_penyakit" class="form-control" placeholder="Masukan riwayat penyakit" required></textarea>
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
		                                            <input id="harga" name="harga" placeholder="Harga" class="form-control r-0 light s-12 " type="text" value="" required >
	                                            </div>
	                                            <div class="form-group col-6 m-0">
	                                                <label for="harga" class="col-form-label s-12">BERAT</label>
		                                            <input id="berat" name="berat" placeholder="Harga" class="form-control r-0 light s-12 " type="text" value="" required >
	                                            </div>
	                                        </div>

	                                        <div class="form-row">
	                                        	<div class="form-group col-6 m-0">
		                                            <label for="stok" class="col-form-label s-12">STOK</label>
		                                            <input id="stok" name="stok" placeholder="Masukan stok kopi" class="form-control r-0 light s-12 " type="text" required>
		                                        </div>
	                                        </div>

	                                        
	                                    </div>
	                                </div>
	                            </div>
	                            <hr>
	                            <center>
	                            <div class="card-body">
	                                <div class="col-md-3 offset-md-1">
		                               	<div class="file-field">
								            <div class="z-depth-1-half mb-4">
								              <img src="<?= base_url(); ?>assets/admin/img/kopi/default.jpg" class="img-fluid"
								                alt="example placeholder">
								            </div>
								            <div class="d-flex justify-content-center">
								              <div class="btn btn-mdb-color btn-rounded float-left">
								                <span>Choose file</span>
								                <input type="file" id="image" name="image" required >
								              </div>
								            </div>
								        </div>
		                            </div>
	                            </div>
	                            </center>
	                            <hr>
	                            <div class="card-body">
	                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Simpan Data</button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	    	</div>
	    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
