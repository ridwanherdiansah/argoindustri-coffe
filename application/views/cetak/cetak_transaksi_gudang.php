<!DOCTYPE html>
<html>
<head>
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <title>Cetak Transaksi</title>

   <!-- Custom styles for this page -->
</head>
<body onclick="window.print()">
	<center>
    <h2><u>Data Transaksi</u></h2>
    Argoindustri Girimekar
    <p align='right'>Tanggal :<?=date('y-m-d')?>
    <br><p align="left"> 
    <br>laporan Data Transaksi Gudang dari Id User : 
    <br><?php echo $_POST['id_user']; ?>
    <br>laporan Data Transaksi Gudang dari tanggal : 
    <br><?php echo $_POST['tanggal_awal']; ?> - <?php echo $_POST['tanggal_akhir']; ?> </p>
    <br>
    <br>
    <br>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>ID Transaksi</th>
                        <th>ID User</th>
                        <th>ID Expedisi</th>
                        <th>Nama Expedisi</th>
                        <th>Deskripsi Expedisi</th>
                        <th>No Resi</th>
                        <th>Berat</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php
                        foreach($data as $t): 
                      ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['tanggal']; ?></td>
                            <td scope="row"><?= $t['id_transaksi']; ?></td>
                            <td scope="row"><?= $t['id_user']; ?></td>
                            <td scope="row"><?= $t['id_expedisi']; ?></td>
                            <td scope="row"><?= $t['nama']; ?></td>
                            <td scope="row"><?= $t['deskripsi']; ?></td>
                            <td scope="row"><?= $t['no_resi']; ?></td>
                            <td scope="row"><?= $t['berat']; ?></td>
                            <td scope="row"><?= $t['total_pembayaran']; ?></td>
                            <td scope="row">
                              <?php if ($t['status'] == 0 ):?>
                                Cek produk
                              <?php elseif ($t['status'] == 1 ):?>
                                Poduk sudah di kirim
                              <?php elseif ($t['status'] == 2 ) :?>
                                Poduk sudah sampai
                              <?php else : ?>
                                Tolak
                              <?php endif;?>
                            </td>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                
	</center>

</body>
</html>