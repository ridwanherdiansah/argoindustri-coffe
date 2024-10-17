
<!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- alert   -->
        <?= $this->session->flashdata('message');?>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <?= form_open_multipart ('admin/content_1'); ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Project 1</h6>
                </div>
                <div class="card-body">
                  <input  id="id" name="id" type="hidden" class="form-control" placeholder="" value="<?=$dashboard['id'];?>">
                  <div class="form-group row">
                    <div class="col-sm-2">picture</div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="<?= base_url('assets/admin/img/frontend/').$dashboard['image_3'];?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_3" name="image_3">
                            <label class="custom-file-label" for="image">choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input  id="title_3" name="title_3" type="text" class="form-control" placeholder="" value="<?=$dashboard['title_3'];?>">
                      <?= form_error('title_3', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sub_title" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="deskripsi_3" name="deskripsi_3"><?=$dashboard['deskripsi_3'];?></textarea>
                      <?= form_error('deskripsi_3', '<small class="text-danger pl-3">', '</small>'); ?>
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

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid