<!DOCTYPE html>
<html>
<head>
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <title>Cetak Petani</title>

   <!-- Custom styles for this page -->
</head>
<body onclick="window.print()">
	<center>
		<h2><u>Data Suplier</u></h2>
    Argoindustri Girimekar
    <p align='right'>Tanggal :<?=date('y-m-d')?></p>
  </center>
		<br>laporan Data Suplier dari Id Suplier : 
    <br><?php echo $_POST['id_petani']; ?>
	<center>
    <br>
		<br>
		<br>
		<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
		<thead>
	        <tr>
            <th>No</th>
            <th>ID Pengepul</th>
            <th>ID Petani</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telepon</th>
          </tr>
	    </thead>
	    <tbody>
            <?php $i = 1; ?>
            <?php foreach($data as $p): ?>
            <tr>
              <td scope="row"><?= $i; ?></td>
              <td><?= $p['id_pengepul']; ?></td>
              <td><?= $p['id_petani']; ?></td>
              <td><?= $p['nama']; ?></td>
              <td><?= $p['jenis_kelamin']; ?></td>
              <td><?= $p['alamat']; ?></td>
              <td><?= $p['telepon']; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach;?>
	    </tbody>
	</table>	
	</center>

</body>
</html>