<!-- Begin Page Content -->

        <div class="container-fluid">

        <!-- alert	 -->
        <?= $this->session->flashdata('message');?>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <form action="<?= base_url();?>admin/header " method="post">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Header Content</h6>
                </div>
                <div class="card-body">
                  <input  id="id" name="id" type="hidden" class="form-control" placeholder="" value="<?= $dashboard['id']; ?>">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input  id="title" name="title" type="text" class="form-control" placeholder="" value="<?= $dashboard['title']; ?>">
                      <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sub_title" class="col-sm-2 col-form-label">Sub Title</label>
                    <div class="col-sm-10">
                      <input  id="sub_title" name="sub_title" type="text" class="form-control" placeholder="" value="<?= $dashboard['sub_title']; ?>">
                      <?= form_error('sub_title', '<small class="text-danger pl-3">', '</small>'); ?>
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
        <!-- /.container-fluid