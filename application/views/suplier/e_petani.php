

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->

        <div class="container-fluid animatedParent animateOnce">
	        <div class="animated fadeInUpShort">
	            <div class="row my-3">
	                <div class="col-md-7  offset-md-2">
	                    <?= form_open_multipart ('suplier/pe_petani/'. $k_petani['id_petani']); ?>
	                        <div class="card no-b  no-r">
	                            <div class="card-body">
	                                <h5 class="card-title">DATA PETANI</h5>
	                                <div class="form-row">
	                                    <div class="col-md-12">
	                                        <div class="form-group m-0">
	                                            <label for="id_petani" class="col-form-label s-12">ID PETANI</label>
	                                            <input id="id_petani" name="id_petani" placeholder="ID Petani" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['id_petani']; ?>" required readonly >
	                                        </div>
	                                        <div class="form-group m-0">
	                                            <label for="nama" class="col-form-label s-12">NAMA</label>
	                                            <input id="nama" name="nama" placeholder="Masukan nama petani" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['nama']; ?>" required>
	                                        </div>

	                                        <div class="form-row">
	                                            <div class="form-group col-6 m-0">
	                                                <label for="tempat lahir" class="col-form-label s-12"><i class="icon-fingerprint"></i>TEMPAT LAHIR</label>
	                                                <input id="tempat_lahir" name="tempat_lahir" placeholder="Masukan tempat lahir petani" class="form-control r-0 light s-12 date-picker" type="text" value="<?= $k_petani['tempat_lahir']; ?>" required>
	                                            </div>
	                                            <div class="form-group col-6 m-0">
	                                                <label for="tanggal_lahir" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>TANGGAL LAHIR</label>
	                                                <input id="tanggal_lahir" name="tanggal_lahir" class="form-control r-0 light s-12 datePicker" data-time-picker="false"
	                                                       data-format-date='Y/m/d' type="date" value="<?= $k_petani['tanggal_lahir']; ?>" required>
	                                            </div>
	                                        </div>

	                                        <div class="form-group m-0">
			                                    <label class="col-form-label s-12">JENIS KELAMIN</label>
			                                    <br>
			                                    <div class="custom-control custom-radio custom-control-inline">
													<input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" required >
													<label class="form-check-label" for="flexRadioDefault1">
													Laki - Laki
													</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required >
													<label class="form-check-label" for="flexRadioDefault2">
													Perempuan
													</label>
												</div>
			                                </div>
	                                    </div>

	                                </div>

	                                <div class="form-row">
	                                    <div class="form-group col-12 m-0">
	                                        <label for="alamat"  class="col-form-label s-12">ALAMAT</label>
	                                        <input type="text" name="alamat" class="form-control r-0 light s-12" id="alamat"
	                                               placeholder="Masukan alamat petani" value="<?= $k_petani['alamat']; ?>" required>
	                                    </div>
	                                </div>

	                                <div class="form-row mt-1">
	                                    <div class="form-group col-4 m-0">
	                                        <label for="desa" class="col-form-label s-12">DESA</label>
	                                        <input id="desa" name="desa" placeholder="Masukan nama desa" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['desa']; ?>" required >
	                                    </div>

	                                    <div class="form-group col-4 m-0">
	                                        <label for="kecamatan" class="col-form-label s-12">KECAMATAN</label>
	                                        <input id="kecamatan" name="kecamatan" placeholder="Masukan nama kecamatan" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['kecamatan']; ?>" required >
	                                    </div>
	                                    <div class="form-group col-4 m-0">
	                                        <label for="kota" class="col-form-label s-12">KAB/KOTA</label>
	                                        <input id="kota" name="kota" placeholder="Masukan nama Kab/Kota" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['kota']; ?>" required >
	                                    </div>
	                                </div>

	                                <div class="form-row mt-1">
	                                    <div class="form-group col-4 m-0">
	                                        <label for="email" class="col-form-label s-12">EMAIL</label>
	                                        <input id="email" name="email" placeholder="Masukan alamat email" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['email']; ?>" required >
	                                    </div>

	                                    <div class="form-group col-4 m-0">
	                                        <label for="telepon" class="col-form-label s-12">TELEPON</label>
	                                        <input id="telepon" name="telepon" placeholder="+62 -" class="form-control r-0 light s-12 " type="text" value="<?= $k_petani['telepon']; ?>" required >
	                                    </div>
	                                </div>
	                                
	                            </div>
	                            <hr>
	                            <center>
	                            <div class="card-body">
	                                <div class="col-md-3 offset-md-1">
		                               	<div class="file-field">
								            <div class="z-depth-1-half mb-4">
								              <img src="<?= base_url(); ?>assets/admin/img/suplier/<?= $k_petani['image']; ?>" class="img-fluid"
								                alt="example placeholder">
								            </div>
								            <div class="d-flex justify-content-center">
								              <div class="btn btn-mdb-color btn-rounded float-left">
								                <span>Choose file</span>
								                <input type="file" id="image" name="image" >
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
