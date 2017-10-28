<?php
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php');
	$con = connect();

	if($jenis_t == 'add'){
		$query="insert into rekod_duit_keluar (jenis_bayaran, catatan, nilai, tarikh, active) values ('$jenis_bayaran', '$catatan', '$nilai', now(), 1)";
		mysql_query($query,$con);
		$idpass=mysql_insert_id();

		logrecord('Add', 'Rekod Duit Keluar', 'Id Rekod Duit Keluar = '.$idpass);
		
	}
?>
<script>
alert('Rekod Duit Keluar Berjaya');
window.location.href='page.php?menushort=rekod_duit_keluar';
</script>