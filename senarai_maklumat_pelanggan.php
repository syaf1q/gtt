<?php
	extract($_REQUEST);
	
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();

?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function goBack() {
		window.location.href='page.php?menushort=form_pembayaran_main';
	}
	
	function tambah(){
		window.location.href='page.php?menushort=tambah_maklumat_pelanggan';
	}
</script>
<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<div class="page-header"><h3>Senarai Pelanggan</h3></div>
            <div align="right">
            	<button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
                <button type="button" class="btn btn-warning" onclick="tambah()">Tambah Pelanggan <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
            </div>
        	<div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Bil</th>
                    <th>Nama Pelanggan</th>
                    <th>No K/P Pelanggan</th>
                    <th>Emel Pelanggan</th>
                    <th>HP Pelanggan</th>
                    <th>Alamat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
						$count = 1;
						$querymaklumat="select * from maklumat_pelanggan";
						$resmaklumat = mysql_query($querymaklumat,$con);
						while($rowsmaklumat = mysql_fetch_array($resmaklumat)){
				  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $rowsmaklumat['nama_pelanggan']; ?></td>
                    <td><?php echo $rowsmaklumat['no_kp_pelanggan']; ?></td>
                    <td><?php echo $rowsmaklumat['emel_pelanggan']; ?></td>
                    <td><?php echo $rowsmaklumat['no_tel_hp_pelanggan']; ?></td>
                    <td><?php echo $rowsmaklumat['alamat']; ?></td>
                    <td><a href="page.php?menushort=tambah_maklumat_pelanggan&idpelanggan=<?php echo $rowsmaklumat['id']; ?>&type=edit" class="glyphicon glyphicon-search" /></td>
                  </tr>
                  <?php $count++; } ?>
                </tbody>
                </table>
            </div>
            <div class="row">
                <div align="right"></div>
            </div>
        </div>
	</div>
</div>