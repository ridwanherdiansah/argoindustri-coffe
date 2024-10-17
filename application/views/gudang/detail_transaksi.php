
<!-- Begin Page Content -->
    <div class="container-fluid">
      
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
