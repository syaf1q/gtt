<?php
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php');
	$con = connect();
	
	$queryupdate="update maklumat_proses set stage = 2, tarikh_agent_submit = now() where id_maklumat_asas = '$id_maklumat_asas'";
	mysql_query($queryupdate,$con);
	
	logrecord('Hantar', 'Hantar maklumat ke HQ', 'Id Maklumat Asas = '.$id_maklumat_asas);
?>
<script>
alert('Rekod berjaya dihantar.');
window.location.href='page.php?menushort=dashboard';
</script>
