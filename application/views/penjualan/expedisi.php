  <!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Shipping-->
        <div class="col-xl-9 col-lg-8 pb-5">
          <div class="wizard">
            <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <div class="wizard-step">
                <i class="fe-icon-check-circle"></i>
                1. Alamat
              </div>
              <div class="wizard-step active">2. Expedisi</div>
              <div class="wizard-step">
                3. Cekout
              </div>
            </div>
            <div class="wizard-body">
              <h3 class="h5 pb-3">Pilih Pengiriman</h3>

              <?php 
                  $total_berat = 0;
                  $total_bayar = 0;
                  if(isset($_SESSION['kopi'])){ 

                    foreach($_SESSION['kopi'] as $key => $val):
                      $total_berat = $total_berat + $_SESSION['kopi'][$key]['total_berat'];
                      $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'];
                ?>

                <?php endforeach; }?>

                <form action="<?= base_url(); ?>penjualan/cek_ongkir/<?= $user['id_user']; ?>" class="interactive-credit-card row" method="post">
                  <div class="form-group col-sm-4">
                    <!-- kota pengirim -->
                    <!-- <input class="form-control" type="hidden" name="kota" placeholder="Card Number" value="<?= $admin_gudang['kota']; ?>"  required readonly> -->
                  </div>
                  <div class="form-group col-sm-4">
                    <!-- kota penerima -->
                    <input class="form-control" type="hidden" name="kota_penerima" placeholder="Full Name" value="<?= $user['kota']; ?>"  required readonly>
                  </div>
                  <div class="form-group col-sm-4">
                    <!-- total berat -->
                    <input class="form-control" type="hidden" name="berat" placeholder="Full Name" value="<?= $total_berat; ?>" required  readonly>
                  </div>
                  <div class="form-group col-sm-4">
                    <select id="expedisi" name="expedisi" class="form-control" id="exampleFormControlSelect1">
                      <option value="">Pilih Expedisi</option>


                      <?php
                        $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' => 'TIKI'];
                          foreach ($eks as $key => $value) {
                            echo "<option value='$key' ".($key == $this->input->post('expedisi') ? "selected" : "").">$key</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <button class="btn btn-primary btn-block mt-0" type="submit">Cek Pengiriman</button>
                  </div>
                </form>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="align-middle">Nama Expedisi</th>
                      <th class="align-middle">Waktu pengiriman</th>
                      <th class="align-middle">Harga kirim</th>
                      <th class="align-middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $biaya = json_decode($ongkir,true);
                      if ($biaya['rajaongkir']['status']['code'] == '200') {
                        foreach ($biaya['rajaongkir']['results'][0]['costs'] as $by) {
                          ?>
                          <form action="<?= base_url(); ?>penjualan/p_expedisi/<?= $user['id_user']; ?>" method="post" >
                          <tr>
                            <td class="align-middle">
                              <input type="hidden" name="nama" value="<?= $by['service']; ?>">
                              <span class="text-gray-dark"><?= $by['service']; ?></span><br>
                              <span class="text-muted text-sm">
                                <input type="hidden" name="deskripsi" value="<?= $by['description']; ?>">
                                <?= $by['description']; ?>
                              </span>
                            </td>
                            <td class="align-middle">
                              <input type="hidden" name="lama_hari" value="<?= $by['cost'][0]['etd']; ?>">
                              <?= $by['cost'][0]['etd'] ?> days
                            </td>
                            <td class="align-middle">
                              <input type="hidden" name="harga" value="<?= $by['cost'][0]['value']; ?>">
                              Rp - <?=number_format($by['cost'][0]['value'],2)?>
                            </td>
                            <td>
                              <!-- Success Button -->
                              <input class="form-control" type="hidden" name="berat" placeholder="Full Name" value="<?= $total_berat; ?>" required  readonly>
                              <button class="btn btn-style-5 btn-success" type="submit" >Pilih</button>
                            </td>
                          </tr>
                          </form>
                          
                          <?php
                              }
                            }
                          ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="wizard-footer d-flex justify-content-between">
              <a class="btn btn-secondary my-2" href="<?= base_url(); ?>penjualan/keranjang">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">
                  Back
                </span>
              </a>
            </div>
          </div>
        </div>
        <!-- Sidebar-->
        <aside class="col-xl-3 col-lg-4 pb-4 mb-2">
          <!-- Order Summary-->
          <div class="widget">
            <h4 class="widget-title">Rincian Pembayaran</h4>

            <?php 
                $total_berat = 0;
                $total_bayar = 0;
                if(isset($_SESSION['kopi'])){ 

                    foreach($_SESSION['kopi'] as $key => $val):
                      $total_berat = $total_berat + $_SESSION['kopi'][$key]['berat'];
                      $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'];
              ?>
                <div class="d-flex justify-content-between pb-2">
                  <div><?= $_SESSION['kopi'][$key]['nama'] ; ?></div>
                  <div class="font-weight-medium">Rp - <?=number_format($_SESSION['kopi'][$key]['total_harga'],2)?></div>
                </div>
              <?php endforeach; }?>

            <hr>
            <div class="pt-3 text-right text-lg font-weight-medium">Rp - <?=number_format($total_bayar,2)?> </div>
          </div>
        </aside>
      </div>
    </div>


    <script>
      document.getElementById('provinsi').addEventListener('change', function()
      {
        fetch("<?= base_url('rajaongkir/kota/') ?>"+this.value,{
          method:'GET',
        })
        .then((response) => response.text())
        .then((data) => {
          console.log(data)
          document.getElementById('kota').innerHTML = data
        }) 
      })


      document.getElementById('provinsi_penerima').addEventListener('change', function()
      {
        fetch("<?= base_url('rajaongkir/kota/') ?>"+this.value,{
          method:'GET',
        })
        .then((response) => response.text())
        .then((data) => {
          console.log(data)
          document.getElementById('kota_penerima').innerHTML = data
        }) 
      })
    </script>