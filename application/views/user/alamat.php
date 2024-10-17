        <!-- Addresses-->
        <div class="col-lg-8 pb-5">
          <h5>Alamat</h5>
          <hr class="pb-3">
          <form action="<?= base_url(); ?>user/p_alamat/<?= $user['id_user']; ?>" method="post" class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-company">Desa</label>
                <input id="desa" name="desa" class="form-control" type="text" id="account-company" value="<?= $user['desa']; ?>" placeholder="Masukan nama desa" required >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-country">Kecamatan</label>
                <input id="kecamatan" name="kecamatan" class="form-control" type="text" id="account-company" value="<?= $user['desa']; ?>" placeholder="Masukan nama kecamatan" required >
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Provinsi</label>
                  <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlSelect1">
                    <option value=""><?= $user['provinsi']; ?></option>

                    <?php
                      $curl = curl_init();
                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/province?",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "key: aaa7455b9029fa0906b85f4199588f53"
                        ),
                      ));
                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        // echo "cURL Error #:" . $err;
                        redirect('auth/error');
                      } else {
                        $provinsi = json_decode($response, true);
                      }
                    ?>

                    <?php
                      if ($provinsi['rajaongkir']['status']['code'] == '200') {
                          foreach ($provinsi['rajaongkir']['results'] as $p) {
                            echo "<option value='$p[province_id]' >$p[province]</option>";
                          }
                      }
                    ?>
                    
                  </select>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-country">Kota</label>
                  <select id="kota" name="kota" class="form-control" id="exampleFormControlSelect1">
                    <option value=""><?= $user['kota']; ?></option>
                    <?php
                      if (count($_POST)) {
                        $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$this->input->post('provinsi'),
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "key: aaa7455b9029fa0906b85f4199588f53"
                        ),
                      ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        // echo "cURL Error #:" . $err;
                         redirect('auth/error');
                      } else {
                        $kota = json_decode($response, true) ;
                        echo "<option value=''>Pilih Nama Kota</option>";
                        if ($kota['rajaongkir']['status']['code'] == '200'){
                          foreach ($kota['rajaongkir']['results'] as $kt) {
                            echo "<option name='kota' value='$kt[city_id]'>$kt[city_name]</option>";
                          }
                        }
                      }
                      }
                    ?>

                  </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="account-address1">Rincian alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" type="text" required> <?= $user['alamat']; ?></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="account-address1">Kode Pos</label>
                <input id="kode_pos" name="kode_pos" type="text" class="form-control" value="<?= $user['kode_pos']; ?>" required>
              </div>
            </div>
            <div class="col-12 padding-top-1x">
              <hr class="my-3">
              <div class="text-right">
                <button class="btn btn-primary" type="submit" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your address updated successfuly.">Simpan</button>
              </div>
            </div>
          </form>
        </div>
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