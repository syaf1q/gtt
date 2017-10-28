<?php
	extract($_REQUEST);
	
	require_once('Connections/connection.class.php'); 
	require_once('class/trim_date.php');
	include('log_action.php');
	
	$con = connect();
	
	if($tarikh_bersara_pelanggan == "" || $tarikh_bersara_pelanggan == null){
		$tarikh_bersara_pelanggan = '0000-00-00';
	}else{
		$tarikh_bersara_pelanggan = trim_tarikh($tarikh_bersara_pelanggan);
	}
	
	if($tarikh_bersara_pasangan == "" || $tarikh_bersara_pasangan == null){
		$tarikh_bersara_pasangan = '0000-00-00';
	}else{
		$tarikh_bersara_pasangan = trim_tarikh($tarikh_bersara_pasangan);
	}
	
	if($tarikh_tamat_roadtax_pelanggan == "" || $tarikh_tamat_roadtax_pelanggan == null){
		$tarikh_tamat_roadtax_pelanggan = '0000-00-00';
	}else{
		$tarikh_tamat_roadtax_pelanggan = trim_tarikh($tarikh_tamat_roadtax_pelanggan);
	}
	
	if($tarikh_tamat_roadtax_pasangan == "" || $tarikh_tamat_roadtax_pasangan == null){
		$tarikh_tamat_roadtax_pasangan = '0000-00-00';
	}else{
		$tarikh_tamat_roadtax_pasangan = trim_tarikh($tarikh_tamat_roadtax_pasangan);
	}
	
	
	if($type != 'edit'){
		$querysemak="select * from maklumat_pelanggan where nama_pelanggan = '$nama_pelanggan'";
		$res1 = mysql_query($querysemak,$con);
		$num_rows = mysql_num_rows($res1);
		if($num_rows > 0){
		?>
			<script>
			alert('Maaf, Nama Pelanggan Telah Wujud. Sila Buat Carian.');
			window.location.href='page.php?menushort=form_pembayaran_main';
			</script>
		<?php
		}else{
				$queryinsertperibadi="insert into maklumat_pelanggan (nama_pelanggan, nama_pasangan, no_tel_rumah, no_tel_hp_pelanggan, no_tel_hp_pasangan, no_kp_pelanggan, no_kp_pasangan, emel_pelanggan, emel_pasangan, alamat, status_perkhawinan, majikan_pelanggan, majikan_pasangan, pekerjaan_pelanggan, pekerjaan_pasangan, pendapatan_tahunan_pelanggan, pendapatan_tahunan_pasangan, tarikah_bersara_pelanggan, tarikah_bersara_pasangan, no_kenderaan_pelanggan, no_kenderaan_pasangan, tarikh_tamat_roadtax_pelanggan, tarikh_tamat_roadtax_pasangan) values ('$nama_pelanggan', '$nama_pasangan', '$no_tel_rumah', '$no_tel_hp_pelanggan', '$no_tel_hp_pasangan', '$nokp_pelanggan', '$nokp_pasangan', '$emel_pelanggan', '$emel_pasangan', '$alamat', '$kahwin', '$majikan_pelanggan', '$majikan_pasangan', '$pekerjaan_pelanggan', '$pekerjaan_pasangan', '$pendapatan_pelanggan', '$pendapatan_pasangan', '$tarikh_bersara_pelanggan', '$tarikh_bersara_pasangan', '$no_plat_pelanggan', '$no_plat_pasangan', '$tarikh_tamat_roadtax_pelanggan', '$tarikh_tamat_roadtax_pasangan')";
				mysql_query($queryinsertperibadi,$con);
				$id_pelanggan=mysql_insert_id();
				
				logrecord('Tambah', 'Maklumat Pelanggan', 'Id Pelanggan = '.$id_pelanggan);
		?>
		<script>
		alert('Rekod berjaya disimpan.');
		//window.location.href='page.php?menushort=form_pembayaran_main';
		</script>
		<?php
		}
	}else{
		$queryupdateperibadi="update maklumat_pelanggan set nama_pelanggan = '$nama_pelanggan', nama_pasangan='$nama_pasangan', no_tel_rumah='$no_tel_rumah', no_tel_hp_pelanggan='$no_tel_hp_pelanggan', no_tel_hp_pasangan='$no_tel_hp_pasangan', no_kp_pelanggan='$nokp_pelanggan', no_kp_pasangan='$nokp_pasangan', emel_pelanggan='$emel_pelanggan', emel_pasangan='$emel_pasangan', alamat='$alamat', status_perkhawinan='$kahwin', majikan_pelanggan='$majikan_pelanggan', majikan_pasangan='$majikan_pasangan', pekerjaan_pelanggan='$pekerjaan_pelanggan', pekerjaan_pasangan='$pekerjaan_pasangan', pendapatan_tahunan_pelanggan='$pendapatan_pelanggan', pendapatan_tahunan_pasangan='$pendapatan_pasangan', tarikah_bersara_pelanggan='$tarikh_bersara_pelanggan', tarikah_bersara_pasangan='$tarikh_bersara_pasangan', no_kenderaan_pelanggan='$no_plat_pelanggan', no_kenderaan_pasangan='$no_plat_pasangan', tarikh_tamat_roadtax_pelanggan='$tarikh_tamat_roadtax_pelanggan', tarikh_tamat_roadtax_pasangan='$tarikh_tamat_roadtax_pasangan' where id = '$idpelanggan'";
		mysql_query($queryupdateperibadi,$con);
		
		logrecord('Sunting', 'Maklumat Pelanggan', 'Id Pelanggan = '.$idpelanggan);

		?>
		<script>
		alert('Rekod berjaya disimpan.');
		window.location.href='page.php?menushort=form_pembayaran_main';
		</script>
		<?php
	}
?>
