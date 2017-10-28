<?php
	extract($_REQUEST);
	require_once('Connections/connection.class.php');
	$con = connect();

?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function goBack() {
		window.location.href='page.php?menushort=dashboard';
	}
	
	function tambah(){
		window.location.href='page.php?menushort=tambah_maklumat_pengguna&jenis_t=add';
	}
</script>
<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<div class="page-header"><h3>Senarai Pengguna</h3></div>
            <div align="right">
            	<button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
                <button type="button" class="btn btn-warning" onclick="tambah()">Tambah Pengguna <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
            </div>
        	<div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Bil</th>
                    <th>Nama Pengguna</th>
                    <th>No K/P Pengguna</th>
                    <th>Emel Pengguna</th>
                    <th>HP Pengguna</th>
                    <th>Permier</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
						$count = 1;
						$querymaklumat="select * from userinfo where active = '1'";
						$resmaklumat = mysql_query($querymaklumat,$con);
						while($rowsmaklumat = mysql_fetch_array($resmaklumat)){
				  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $rowsmaklumat['fullname']; ?></td>
                    <td><?php echo $rowsmaklumat['icno']; ?></td>
                    <td><?php echo $rowsmaklumat['emel']; ?></td>
                    <td><?php echo $rowsmaklumat['telno']; ?></td>
                    <td><?php echo $rowsmaklumat['premier']; ?></td>
                    <td><a href="page.php?menushort=tambah_maklumat_pengguna&idp=<?php echo $rowsmaklumat['id']; ?>&jenis_t=edit" class="glyphicon glyphicon-search" />&nbsp;<a href="page.php?menushort=tambah_maklumat_pengguna_proses&idp=<?php echo $rowsmaklumat['id']; ?>&jenis_t=delete" class="glyphicon glyphicon-trash" /></td>
                  </tr>
                  <?php $count++; } ?>
                </tbody>
                </table>
            </div>
        </div>
	</div>
</div>