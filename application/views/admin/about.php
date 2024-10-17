<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <?= $this->session->flashdata('message');?>
              <form action="<?= base_url();?>admin/about" method="post">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">About Content</h6>
                </div>
                <div class="card-body">
                  <input  id="id" name="id" type="hidden" class="form-control" placeholder="" value="<?= $dashboard['id']; ?>" >
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input  id="title_2" name="title_2" type="text" class="form-control" placeholder="" value="<?= $dashboard['title_2']; ?>" required >
                      <?= form_error('title_2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="link" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea id="deskripsi_2" name="deskripsi_2" class="form-control" required ><?= $dashboard['deskripsi_2']; ?></textarea>
                      <?= form_error('deskripsi_2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                      <span class="text">Update Header Dashboard</span>
                    </button>
                </div>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->