<?php
	session_start();
	
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php');
	include('class/trim_date.php');
	$con = connect();
	
	$tarikh_manual_trim = trim_tarikh($tarikh_manual);
	
	$queryasas="insert into maklumat_asas (id_maklumat_pelanggan, tarikh, tarikh_manual) values ('$id_pelanggan', now(), '$tarikh_manual_trim')";
	mysql_query($queryasas,$con);
	$id_maklumat_asas=mysql_insert_id();
	
	$querytakaful="insert into maklumat_proses (id_maklumat_asas, id_userinfo_agent, tarikh_agent, stage) values ('$id_maklumat_asas', '".$_SESSION['id']."', now(), 1)";
	mysql_query($querytakaful,$con);	
	
	logrecord('Hantar', 'Jana Maklumat Asas', 'Id Maklumat Asas = '.$id_maklumat_asas);
?>
<script>
window.location.href='page.php?menushort=pembayaran&nama_pelanggan=<?php echo $nama_pelanggan; ?>&id=<?php echo $id_maklumat_asas; ?>';
</script>