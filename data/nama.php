<?php
	extract($_REQUEST);
	require_once('../Connections/connection.class.php');

	$query="select * from maklumat_pelanggan where nama_pelanggan like '%$queryString%'";
	$query=mysql_query($query,connect());
	while($row=mysql_fetch_array($query)){
		echo '<li onClick="fill(\''.$row['id'].'\', \''.$row['nama_pelanggan'].'\',1);">'.$row['nama_pelanggan'].'</li>';
	} 
?>