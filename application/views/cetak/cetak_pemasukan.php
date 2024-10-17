<!DOCTYPE html>
<html>
<head>
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <title>Cetak Pemasukan</title>

   <!-- Custom styles for this page -->
</head>
<body onclick="window.print()">
	<center>
		<h2><u>Data Pemasukan</u></h2>
		Argoindustri Girimekar
		<p align='right'>Tanggal :<?=date('y-m-d')?>
		<br><p align="left"> laporan Data pemasukan dari tanggal : 
		<br><?php echo $_POST['tanggal_awal']; ?> - <?php echo $_POST['tanggal_akhir']; ?> </p>
		<br>
		<br>
		<br>
		<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
		<thead>
	        <tr>
	          <th scope="col">#</th>
	          <th>ID Pengepul</th>
	          <th>ID Petani</th>
	          <th>ID Kopi</th>
	          <th>Nama</th>
	          <th>Tanggal</th>
	          <th>Jumlah</th>
	        </tr>
	    </thead>
	    <tbody>
            <?php $i = 1; ?>
              <?php
              
              $total = 0;
              foreach($data as $t):
               $total = $total + $t['jumlah'];
            ?>
              
                <tr>
                  <td scope="row"><?= $i; ?></td>
                  <td><?= $t['id_pengepul']; ?></td>
                  <td><?= $t['id_petani']; ?></td>
                  <td><?= $t['id_kopi']; ?></td>
                  <td><?= $t['nama']; ?></td>
                  <td><?= $t['tanggal']; ?></td>
                  <td><?= $t['jumlah']; ?></td>
	            </tr>
	          <?php $i++; ?>
	        <?php endforeach;?>
	    </tbody>
	    <tfoot>
            <tr>
	            <td rowspan="1" colspan="6">Jumlah Total</td>
	            <td rowspan="1" colspan="1"><?= $total; ?></td>
          	</tr>
        </tfoot>
	</table>	
	</center>

</body>
</html>