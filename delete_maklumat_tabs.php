<?php
	extract($_REQUEST);
	
	require_once('Connections/connection.class.php'); 
	include('log_action.php');
	$con = connect();
	
	if($jenis == 'Takaful'){
		$query="delete from maklumat_takaful where id = '$id2'";
		mysql_query($query,$con);
		
		$query1="delete from maklumat_takaful_coverage where id_maklumat_takaful = '$id2'";
		mysql_query($query1,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi Takaful', 'Id Maklumat Takaful = '.$id2);
	}else if($jenis == 'Life'){
		$query="delete from maklumat_life where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi Life', 'Id Maklumat Life = '.$id2);
	}else if($jenis == 'MyeG'){
		$query="delete from maklumat_myeg where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi MyEG', 'Id Maklumat MyEG = '.$id2);
	}else if($jenis == 'BSN'){
		$query="delete from maklumat_bsn where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi BSN', 'Id Maklumat BSN = '.$id2);
	}else if($jenis == 'E-Pay'){
		$query="delete from maklumat_epay where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi E-Pay', 'Id Maklumat E-Pay = '.$id2);
	}else if($jenis == 'asas'){
		$query="update maklumat_asas ma set ma.delete = 1 where ma.id = '$id'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Maklumat Asas', 'Id Maklumat Asas = '.$id);
	}else if($jenis == 'Wasiat'){
		$query="delete from maklumat_wasiat where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi wasiat', 'Id Maklumat wasiat = '.$id2);
	}else if($jenis == 'Pusaka'){
		$query="delete from maklumat_pusaka where id = '$id2'";
		mysql_query($query,$con);
		
		$query="delete from maklumat_commission where id = '$id3'";
		mysql_query($query,$con);
		
		$query="delete from rekod_servis where id_service = '$id2'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Pembayaran. Transaksi Pusaka', 'Id Maklumat Pusaka = '.$id2);
	}else if($jenis == 'Kedatangan'){
		$query="update kedatangan set active = '' where id = '$id_kedatangan'";
		mysql_query($query,$con);
		
		logrecord('Buang', 'Rekod Kehadiran', 'Nama Kehadiran = '.$name_kedatangan);
	}else if($jenis == 'hqlist'){
		$query="delete from maklumat_commission where id_gabung = '$id'";
		mysql_query($query,$con);
		
		if($tran == 'BSN'){
			$query1="delete from maklumat_bsn where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'E-Pay'){
			$query1="delete from maklumat_epay where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'MyeG'){
			$query1="delete from maklumat_myeg where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'Takaful/Insurance'){
			$query1="delete from maklumat_takaful where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'Life'){
			$query1="delete from maklumat_life where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'Pusaka'){
			$query1="delete from maklumat_pusaka where id = '$id'";
			mysql_query($query1,$con);
		}
		
		if($tran == 'Wasiat'){
			$query1="delete from maklumat_wasiat where id = '$id'";
			mysql_query($query1,$con);
		}
		
		logrecord('Buang', 'Rekod Pada HQ List', 'Hapus Rows Tersebut');
	}
	
?>

<script>
alert('Buang Maklumat Berjaya');
<?php if($jenis != 'asas' && $jenis != 'Kedatangan' && $jenis != 'hqlist'){?>
window.location.href='page.php?menushort=pembayaran&nama_pelanggan=<?php echo $nama_pelanggan; ?>&id=<?php echo $id; ?>';
<?php }else if($jenis == 'Kedatangan'){ ?>
window.location.href='page.php?menushort=hqlist';
<?php }else if($jenis == 'asas'){ ?>
window.location.href='page.php?menushort=semakan_pembayaran_main';
<?php }else if($jenis == 'hqlist'){ ?>
window.location.href='page.php?menushort=hqlist';
<?php } ?>
</script>
