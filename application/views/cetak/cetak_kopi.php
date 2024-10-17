<!DOCTYPE html>
<html>
<head>
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <title>Cetak Kopi</title>

   <!-- Custom styles for this page -->
</head>
<body onclick="window.print()">
	<center>
		<h2><u>Data Kopi</u></h2>
    Argoindustri Girimekar
    <p align='right'>Tanggal :<?=date('y-m-d')?></p>
  </center>
		<br>laporan Data Kopi dari Id Kopi : 
    <br><?php echo $_POST['id_kopi']; ?>
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
            <th>ID Kopi</th>
            <th>Nama</th>
            <th>Keterangan Kopi</th>
            <th>Type Kopi</th>
            <th>Jenis Kopi</th>
            <th>Harga</th>
            <th>Harga Jual</th>
            <th>Rating</th>
          </tr>
	    </thead>
	    <tbody>
            <?php $i = 1; ?>
            <?php foreach($data as $p): ?>
            <tr>
              <td scope="row"><?= $i; ?></td>
              <td><?= $p['id_pengepul']; ?></td>
              <td><?= $p['id_petani']; ?></td>
              <td><?= $p['id_kopi']; ?></td>
              <td><?= $p['nama']; ?></td>
              <td><?= $p['keterangan_kopi']; ?></td>
              <td><?= $p['type_kopi']; ?></td>
              <td><?= $p['jenis_kopi']; ?></td>
              <td><?= $p['harga']; ?></td>
              <td><?= $p['harga_jual']; ?></td>
              <td><?= $p['rating']; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach;?>
	    </tbody>
	</table>	
	</center>

</body>
</html>