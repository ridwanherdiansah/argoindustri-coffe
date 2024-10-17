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
    <br>
      <p align="left"> 
        <br>laporan Data transaksi dengan ID Kopi : 
        <br><?php echo $_POST['id_kopi']; ?>
        <br>laporan Data transaksi dari tanggal : 
        <br><?php echo $_POST['tanggal_awal']; ?> - <?php echo $_POST['tanggal_akhir']; ?>
      </p>
    <br>
    <br>
    <br>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>ID User</th>
                        <th>ID Expedisi</th>
                        <th>ID Kopi</th>
                        <th>Jumlah Produk</th>
                        <th>No Resi</th>
                        <th>Total Pembelian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php
                        $sub_total = 0;
                        foreach($data as $t): 
                        
                        $sub_total = $sub_total + $t['total_harga'];
                      ?>
                          <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td scope="row"><?= $t['id_transaksi']; ?></td>
                            <td scope="row"><?= $t['id_user']; ?></td>
                            <td scope="row"><?= $t['id_expedisi']; ?></td>
                            <td scope="row"><?= $t['id_kopi']; ?></td>
                            <td scope="row"><?= $t['no_resi']; ?></td>
                            <td scope="row"><?= $t['jumlah']; ?></td>
                            <td scope="row"> Rp - <?=number_format($t['total_harga'],2)?></td>
                      <?php $i++; ?>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td rowspan="1" colspan="7">Sub Total</td>
                        <td rowspan="1" colspan="1"> Rp - <?=number_format($sub_total,2)?></td>
                      </tr>
                    </tfoot>
                  </table>
                
	</center>

</body>
</html>