<?php
	extract($_REQUEST);
	
	require_once('class/divide_commission.php');
	require_once('Connections/connection.class.php');
	include('log_action.php'); 
	$con = connect();
	
	$query1="select * from kedatangan ke where ke.date = CURDATE() and ke.active = 1";
    $res1 = mysql_query($query1,$con);
    $bilstaf = mysql_num_rows($res1);
	if($bilstaf == 0){
	?>
    	<script>
		alert('Tiada Maklumat Kedatangan.');
		window.location.href='page.php?menushort=hqlist';
		</script>
    <?php
	}
	
	$query2="select * from kedatangan ke where ke.date = CURDATE() and ke.active = 1";
    $res2 = mysql_query($query2,$con);
    while($rows2 = mysql_fetch_array($res2)){
		$query3="select * from kedatangan ke where id_userinfo = '".$rows2['id_userinfo']."' and ke.date = CURDATE() and ke.active = 1";
    	$res3 = mysql_query($query3,$con);
		$rows3bil = mysql_num_rows($res3);
		if($rows3bil > 1){
			?>
				<script>
                alert('Maklumat Kedatangan Tidak Tepat.');
                window.location.href='page.php?menushort=hqlist';
                </script>
            <?php
		}
	}

	if($bilstaf != 0){
		for($a=1; $a<=$bilangan; $a++){
			if($terima[$a] == 'on'){	
				if($jenis_bayaran[$a] == 'Takaful/Insurance'){
					$updateproses="update maklumat_takaful set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."'";
					mysql_query($updateproses,$con);
					commision_takaful($nilaibayaran[$a], $id_maklumat_asas[$a], $bilstaf, $jenis_bayaran[$a], $idunique[$a]);
					
					logrecord('Terima Duit', 'Takaful/Insurance', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'Life Takaful'){
					$updateproses="update maklumat_life set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."'";
					mysql_query($updateproses,$con);
					commision_life($nilaibayaran[$a], $id_maklumat_asas[$a], $bilstaf, $jenis_bayaran[$a], $idunique[$a]);
					
					logrecord('Terima Duit', 'Life Takaful', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'MyeG'){
					$updateproses="update maklumat_myeg set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."'";
					mysql_query($updateproses,$con);
					commision_myeg($nilaibayaran[$a], $id_maklumat_asas[$a], $bilstaf, $jenis_bayaran[$a], $idunique[$a]);
					
					logrecord('Terima Duit', 'MyeG', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'BSN'){
					$updateproses="update maklumat_bsn set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."' and jenis_bil = '".$jenis_bil[$a]."'";
					mysql_query($updateproses,$con);		
					commision_bsn($nilaibayaran[$a], $idunique[$a], $bilstaf, $jenis_bayaran[$a], $jenis_bil[$a], $id_maklumat_asas[$a]);
					
					logrecord('Terima Duit', 'BSN', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'E-Pay'){
					$updateproses="update maklumat_epay set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."' and jenis_bil = '".$jenis_bil[$a]."'";
					mysql_query($updateproses,$con);		
					commision_epay($nilaibayaran[$a], $idunique[$a], $bilstaf, $jenis_bayaran[$a], $jenis_bil[$a], $id_maklumat_asas[$a]);
					
					logrecord('Terima Duit', 'E-Pay', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'Wasiat'){
					$updateproses="update maklumat_wasiat set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."' and jenis_bil = '".$jenis_bil[$a]."'";
					mysql_query($updateproses,$con);		
					commision_wasiat($nilaibayaran[$a], $id_maklumat_asas[$a], $bilstaf, $jenis_bayaran[$a], $idunique[$a]);
					
					logrecord('Terima Duit', 'Wasiat', 'Id Commission = '.$idunique[$a]);
				}
				else if($jenis_bayaran[$a] == 'Pusaka'){
					$updateproses="update maklumat_pusaka set bil_staf = '".$bilstaf."' where id_maklumat_asas = '".$id_maklumat_asas[$a]."' and jenis_bil = '".$jenis_bil[$a]."'";
					mysql_query($updateproses,$con);		
					commision_pusaka($nilaibayaran[$a], $id_maklumat_asas[$a], $bilstaf, $jenis_bayaran[$a], $idunique[$a]);
					
					logrecord('Terima Duit', 'Pusaka', 'Id Commission = '.$idunique[$a]);
				}
			}		
		}
	}
?>
<script>
alert('Rekod berjaya dihantar.');
window.location.href='page.php?menushort=dashboard';
</script>