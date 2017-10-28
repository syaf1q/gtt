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
		
	function tambah(){
		window.location.href='page.php?menushort=tambah_rekod_duit_keluar';
	}
</script>
<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<div class="page-header"><h3>Senarai Duit Keluar</h3></div>
            <div align="right">
                <button type="button" class="btn btn-warning" onclick="tambah()">Rekod Duit Keluar <span class="glyphicon glyphicon-usd" aria-hidden="true"></span></button>
            </div>
        	<div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Bil</th>
                    <th>Jenis Duit Keluar</th>
                    <th>Catatan Duit Keluar</th>
                    <th>Nilai (RM)</th>
                    <th>Tarikh</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
						$count = 1;
						$querymaklumat="select * from rekod_duit_keluar where active  = 1";
						$resmaklumat = mysql_query($querymaklumat,$con);
						while($rowsmaklumat = mysql_fetch_array($resmaklumat)){
				  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $rowsmaklumat['jenis_bayaran']; ?></td>
                    <td><?php echo $rowsmaklumat['catatan']; ?></td>
                    <td><?php echo $rowsmaklumat['nilai']; ?></td>
                    <td><?php echo trim_tarikh3($rowsmaklumat['tarikh']); ?></td>
                    <td><a href="page.php?menushort=delete_rekod_duit_keluar&idrekod=<?php echo $rowsmaklumat['id']; ?>&jenis_t=delete" class="glyphicon glyphicon-trash" /></td>
                  </tr>
                  <?php $count++; } ?>
                </tbody>
                </table>
            </div>
        </div>
	</div>
</div>