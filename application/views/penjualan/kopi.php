    <!-- Page Content-->

  <form action="<?= base_url(); ?>penjualan/t_keranjang/<?= $kopi['id_kopi']; ?>" method="post" >
    <div class="container mb-2">
      <div class="row">
        <!-- Product Gallery-->
        <div class="col-md-6 pb-5">
          <div class="product-gallery">
            <span class="badge badge-danger text-md font-weight-normal">Sale</span>
            <div class="product-carousel owl-carousel">
              <a class="gallery-item" href="<?= base_url(); ?>assets/admin/img/kopi/<?= $kopi['image']; ?>" data-fancybox="gallery1" data-hash="one">
                <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $kopi['image']; ?>" alt="Product">
              </a>
            </div>
            <ul class="product-thumbnails">
              <li class="active">
                <a href="#one">
                  <img src="<?= base_url(); ?>assets/admin/img/kopi/<?= $kopi['image']; ?>" alt="Product">
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Product Info-->
          <div class="col-md-6 pb-5">
            <div class="product-meta"><i class="fe-icon-bookmark"></i>
              <a href="<?= base_url(); ?>penjualan/petani/<?= $kopi['id_petani']; ?>"><?= $kopi['id_petani']; ?></a>
            </div>
            <h2 class="h3 font-weight-bold"><?= $kopi['nama']; ?></h2>
            <h3 class="h4 font-weight-light">
              Rp - <?=number_format($kopi['harga_jual'],2); ?>
            </h3>
            <p class="text-muted"><?= $kopi['keterangan_kopi']; ?> <a href='#details' class='scroll-to'>Keterangan lebih lanjut</a></p>
            <div class="row mt-4">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="size">Type Kopi</label>
                  <input id="type_kopi" name="type_kopi" class="form-control" type="text" value="<?= $kopi['type_kopi']; ?>" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="color">Jenis Kopi</label>
                  <input id="jenis_kopi" name="jenis_kopi" class="form-control" type="text" value="<?= $kopi['jenis_kopi']; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row align-items-end pb-4">
              <div class="col-sm-3">
                <div class="form-group mb-0">
                  <label for="berat">Berat (Gram)</label>
                  <input id="berat" name="berat" class="form-control" type="text" value="<?= $kopi['berat']; ?>" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group mb-0">
                  <label for="quantity">Jumlah Barang</label>
                  <select class="form-control" id="jumlah_barang" name="jumlah_barang" >
                    <option id="jumlah_barang" value="1" class="form-control" >1</option>
                    <option id="jumlah_barang" value="2" class="form-control" >2</option>
                    <option id="jumlah_barang" value="3" class="form-control" >3</option>
                    <option id="jumlah_barang" value="4" class="form-control" >4</option>
                    <option id="jumlah_barang" value="5" class="form-control" >5</option>
                    <option id="jumlah_barang" value="6" class="form-control" >6</option>
                    <option id="jumlah_barang" value="7" class="form-control" >7</option>
                    <option id="jumlah_barang" value="8" class="form-control" >8</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="pt-4 hidden-sm-up"></div>
                <button class="btn btn-primary btn-block m-0" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!">
                  <i class="fe-icon-shopping-cart"></i> Masukan ke keranjang</button>
              </div>
            </div>
            <div class="pt-1 mb-4"><span class="text-medium">ID KOPI :</span> <?= $kopi['id_kopi']; ?></div>
            <hr class="mb-2"> 
<!--               <div class="mt-2 mb-2">
                <span class="text-muted d-inline-block align-middle mb-2">Jumlah</span>
                <input id="" name="" class="form-control" type="text" required readonly >
              </div> -->
            </div>
          </div>
      </div>
    </div>
  </form>
    <!-- Product Details-->
    <div class="bg-secondary pt-5 pb-4" id="details">
      <div class="container py-2">
        <div class="row">
          <div class="col-md-6">
            <h3 class="h6">Keterangan Kopi </h3>
            <p class="mb-4 pb-2"><?= $kopi['keterangan_kopi']; ?></p>
            <h3 class="h6">Suplier </h3>
            <ul class="list-icon mb-4 pb-2">
              <li><strong>ID Petani : </strong> <?= $kopi['id_petani']; ?></li>
              <li><strong>ID Kopi : </strong> <?= $kopi['id_kopi']; ?></li>
              <li><strong>Nama Kopi : </strong> <?= $kopi['nama']; ?></li>
              <li><strong>Type Kopi :</strong> <?= $kopi['type_kopi']; ?></li>
              <li><strong>Jenis Kopi :</strong> <?= $kopi['jenis_kopi']; ?></li>
              <li><strong>Harga : </strong>Rp - <?=number_format($kopi['harga_jual'],2); ?></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h3 class="h6">Spesifikasi Kopi</h3>
            <ul class="list-unstyled mb-4 pb-2">
              <li><strong>Tempat tanam :</strong> <?= $kopi['tempat_tanam']; ?></li>
              <li><strong>Tanggal tanam :</strong> <?= $kopi['tanggal_tanam']; ?></li>
              <li><strong>Tanggal panen :</strong> <?= $kopi['tanggal_panen']; ?></li>
              <li><strong>Pupuk :</strong>  <?= $kopi['pupuk']; ?></li>
              <li><strong>Keterangan pupuk :</strong> <?= $kopi['keterangan_pupuk']; ?></li>
              <li><strong>Riwayat penyakit :</strong> <?= $kopi['riwayat_penyakit']; ?></li>
            </ul>
            <h3 class="h6">Stok Kopi:</h3>
            <ul class="list-unstyled mb-4 pb-2">
              <li><strong>Stok kopi :</strong> <?= $kopi['stok']; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Reviews-->
    <div class="container pt-5">
      
      <!-- alert -->
      <?= $this->session->flashdata('komentar'); ?>
      
      <div class="row pt-2">
        <div class="col-md-4 pb-5 mb-3">
          <div class="card border-default">
            <div class="card-body">
              <div class="text-center">
                <strong>Rating :</strong>
                <div class="d-inline align-baseline display-4 mr-1"><?= $kopi ['rating']; ?>,</div>
              </div>
              <div class="pt-3"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">Komentar</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-8 pb-5 mb-3">
          <div class="d-flex flex-wrap justify-content-between pb-2">
            <h3 class="h4">Komentar</h3>
          </div>
          <!-- Review-->
          <?php foreach($komentar as $ko): ?>
          <div class="blockquote comment mb-4">
            <p><?= $ko['komentar']; ?></p>
            <footer class="testimonial-footer">
              <div class="d-table-cell align-middle pl-2">
                <div class="blockquote-footer"><?= $ko['nama']; ?>
                  <cite><?= $ko['tanggal']; ?>, <?= $ko['waktu']; ?></cite>
                </div>
              </div>
            </footer>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>

<!-- modal -->
<!-- Leave a Review-->
    <form action="<?= base_url(); ?>penjualan/p_komentar/<?= $kopi['id_kopi']; ?>" method="post" class="needs-validation modal fade" id="leaveReview" tabindex="-1" novalidate>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Komentar</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="review-message">Komentar</label>
              <textarea id="komentar" name="komentar" class="form-control" id="review-message" rows="8" required></textarea>
              <div class="invalid-tooltip">Please enter review message!</div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Kirim</button>
          </div>
        </div>
      </div>
    </form>
<!-- end modal -->