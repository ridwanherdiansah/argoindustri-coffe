<!-- Begin Page Content  -->
        <div class="container-fluid">

          <!-- alert -->
          <?= $this->session->flashdata('message');?>
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <?= form_open_multipart ('admin/contack'); ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Contact </h6>
                </div>
                <div class="card-body">
                  <input  id="id" name="id" type="hidden" class="form-control" placeholder="" value="<?=$dashboard['id'];?>">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input  id="title_6" name="title_6" type="text" class="form-control" placeholder="" value="<?=$dashboard['title_6'];?>" required >
                      <?= form_error('title_6', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input  id="deskripsi_6" name="deskripsi_6" type="text" class="form-control" placeholder="" value="<?=$dashboard['deskripsi_6'];?>" required >
                      <?= form_error('deskripsi_6', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input  id="alamat" name="alamat" type="text" class="form-control" placeholder="" value="<?=$dashboard['alamat'];?>" required>
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input  id="email" name="email" type="text" class="form-control" placeholder="" value="<?=$dashboard['email'];?>" required>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                      <input  id="telepon" name="telepon" type="text" class="form-control" placeholder="" value="<?=$dashboard['telepon'];?>" required>
                      <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Whatsapp</label>
                    <div class="col-sm-10">
                      <input  id="whatsap" name="whatsap" type="text" class="form-control" placeholder="" value="<?=$dashboard['whatsap'];?>" required>
                      <?= form_error('whatsap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                      <input  id="facebook" name="facebook" type="text" class="form-control" placeholder="" value="<?=$dashboard['facebook'];?>" required>
                      <?= form_error('facebook', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="sub_title" class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-10">
                      <input  id="youtube" name="youtube" type="text" class="form-control" placeholder="" value="<?=$dashboard['youtube'];?>" required>
                      <?= form_error('youtube', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  
                    <button type="submit" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                      <span class="text">Update Home Dashboard</span>
                    </button>
                </div>
              </div>
              </form>
            </div>

            </div>
          </div>
        </div>
        <!-- /.container-fluid