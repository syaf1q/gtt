<?php
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php');
	$con = connect();
	
	$date = date("Y-m-d");
	
	$queryinsert="insert into kedatangan (date, cawangan, id_userinfo, active) values ('$date', '$cawangan', $id_staf, 1)";
	mysql_query($queryinsert,$con);
	$id_kedatangan=mysql_insert_id();
	
	logrecord('Tambah', 'Rekod Kehadiran', 'Id Kedatangan = '.$id_kedatangan);
?>
<script>
alert('Maklumat Kedatangan Berjaya Direkodkan.');
window.location.href='page.php?menushort=hqlist';
</script>
