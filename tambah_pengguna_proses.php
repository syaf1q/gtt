<?php
	extract($_REQUEST);
	require_once('Connections/connection.class.php'); 
	include('log_action.php');
	$con = connect();
	
	if($jenis_t == 'add'){
		$query="insert into userinfo (fullname, username, password, icno, emel, telno, usertype, premier, active) values ('$nama', '$username', '$password', '$nokp', '$emel', '$tel', '$kategori', '$komisen', '1')";
		mysql_query($query,$con);
		$idpass=mysql_insert_id();
		mysql_close();
		logrecord('Add', 'Staf', 'Id userinfo = '.$idpass);
		
	}else if($jenis_t == 'edit'){
		$query="update userinfo set fullname='$nama', username='$username', password='$password', icno='$nokp', emel='$emel', telno='$tel', usertype='$kategori', premier='$komisen' where id='$idp'";
		mysql_query($query,$con);
		mysql_close();
		logrecord('Edit', 'Staf', 'Id userinfo = '.$idp);
	}else if($jenis_t == 'delete'){
		$query="update userinfo set active='' where id='$idp'";
		mysql_query($query,$con);
		mysql_close();
		logrecord('Edit', 'Staf', 'Id userinfo = '.$idp);
	}
?>
<script>
alert('Rekod berjaya disimpan.');
window.location.href='page.php?menushort=senarai_pengguna_main';
</script>