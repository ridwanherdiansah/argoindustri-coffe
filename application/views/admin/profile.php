
<!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- alert   -->
        <?= $this->session->flashdata('message');?>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <?= form_open_multipart ('admin/e_profile/'. $admin['id_pengepul']); ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                  <input  id="id" name="id" type="hidden" class="form-control" placeholder="" value="<?=$admin['id'];?>">
                  <div class="form-group row">
                    <div class="col-sm-2">picture</div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="<?= base_url('assets/admin/img/profile/').$admin['image'];?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">

                        <div class="form-row">
                          <div class="form-group col-6 m-0">
                                <label for="id_pengepul" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>ID Pengepul</label>
                                <input id="id_pengepul" name="id_pengepul" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $admin['id_pengepul']; ?>" readonly required>
                            </div>

                            <div class="form-group col-6 m-0">
                                <label for="email" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Email</label>
                                <input id="email" name="email" placeholder="Masukan ID Petani" class="form-control r-0 light s-12" data-time-picker="false" type="text" value="<?= $admin['email']; ?>" readonly required>
                            </div>

                            <div class="form-group col-12 m-0">
                                <label for="nama" class="col-form-label s-12">Nama</label>
                              <input id="nama" name="nama" placeholder="ID Kopi" class="form-control r-0 light s-12 " type="text" value="<?= $admin['nama']; ?>" required >
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 m-0">
                                <label for="alamat"  class="col-form-label s-12">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukan alamat " required><?= $admin['alamat']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6 m-0">
                                <label for="provinsi" class="col-form-label s-12">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlSelect1">
                                <option value=""><?= $admin['provinsi']; ?></option>

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
                                    echo "cURL Error #:" . $err;
                                    // redirect('auth/error');
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
                            <div class="form-group col-6 m-0">
                                <label for="kota" class="col-form-label s-12">Kota</label>
                                <select id="kota" name="kota" class="form-control" id="exampleFormControlSelect1">
                                <option value=""><?= $admin['kota']; ?></option>
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
                                    echo "cURL Error #:" . $err;
                                     // redirect('auth/error');
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
                    </div>
                     <button type="submit" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                      <span class="text">Simpan</span>
                    </button>
                  </div>
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
        <!-- /.container-fluid

