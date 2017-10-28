<?php
	extract($_REQUEST);
	include('log_action.php');

	if($jenis_t == 'delete'){
		$query="update rekod_duit_keluar set active = 0 where id='".$idrekod."'";
		mysql_query($query,$con);

		logrecord('Delete', 'Rekod Duit Keluar', 'Id Rekod Duit Keluar = '.$idrekod);
		
	}
?>
<script>
alert('Rekod Duit Keluar Berjaya');
window.location.href='page.php?menushort=rekod_duit_keluar';
</script>