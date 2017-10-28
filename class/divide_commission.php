<?php
	session_start();
	require_once('Connections/connection.class.php'); 
	
	function commision_takaful($nilaibayaran, $id_maklumat_asas, $bilstaf, $jenis_bayaran, $idunique){
		$con = connect();
		
		$queryformula = "select * from conf_takaful";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$querytakaful = "select * from maklumat_commission where id='$idunique'";
		$restakaful = mysql_query($querytakaful,$con);
		$rowstakaful = mysql_fetch_array($restakaful);
		
		$queryuser = "select ui.premier as premier from userinfo ui inner join maklumat_proses mp on mp.id_userinfo_agent = ui.id where mp.id_maklumat_asas='$id_maklumat_asas'";
		$resuser = mysql_query($queryuser,$con);
		$rowsuser = mysql_fetch_array($resuser);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowstakaful['tax'] - $rowstakaful['discount'] - 10;
		$nilaibersih = $nilaibayaran * ($nilai_jumlah_keseluruhan/100);
		$agentbersih = $nilaibersih * ($rowsuser['premier']/$nilai_jumlah_keseluruhan);
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf/$bilstaf;
		$pemegangsahambersih = $nilaibersih * ($nilai_pemegang_saham/$nilai_jumlah_keseluruhan);
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique'";
		mysql_query($query,$con);
		mysql_close();
	}
	
	function commision_life($nilaibayaran, $id_maklumat_asas, $bilstaf, $jenis_bayaran, $idunique){
		$con = connect();
		
		$queryformula = "select * from conf_life";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$querylife= "select * from maklumat_commission where id='$idunique'";
		$reslife = mysql_query($querylife,$con);
		$rowslife = mysql_fetch_array($reslife);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowslife['discount'];
		$nilaibersih = $nilaibayaran * ($nilai_jumlah_keseluruhan/100);
		$agentbersih = 0;
		$zakatbersih = 0;
		
		if($rowslife['fail'] == 'Tidak'){
			$stafbersih = $nilai_staf;
		}else{
			$stafbersih = 0;
		}
		
		$pemegangsahambersih = $nilaibersih * ($nilai_pemegang_saham/$nilai_jumlah_keseluruhan);
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique'";
		mysql_query($query,$con);
		mysql_close();
	}
	
	function commision_myeg($nilaibayaran, $id_maklumat_asas, $bilstaf, $jenis_bayaran, $idunique){
		$con = connect();
		
		$queryformula = "select * from conf_myeg";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$querymyeg = "select * from maklumat_commission where id='$idunique'";
		$resmyeg = mysql_query($querymyeg,$con);
		$rowsmyeg = mysql_fetch_array($resmyeg);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowsmyeg['discount'];
		$nilaibersih = $nilai_jumlah_keseluruhan;
		$agentbersih = $nilai_agent;
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf/$bilstaf;
		$pemegangsahambersih = $nilai_pemegang_saham;
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique'";
		mysql_query($query,$con);
		mysql_close();
	}
	
	function commision_bsn($nilaibayaran, $idunique, $bilstaf, $jenis_bayaran, $jenis_bil, $id_maklumat_asas){
		$con = connect();
		
		$queryformula = "select * from conf_bsn";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$querybsn = "select * from maklumat_commission where id='$idunique'";
		$resbsn = mysql_query($querybsn,$con);
		$rowbsn = mysql_fetch_array($resbsn);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowbsn['discount'];
		$nilaibersih = $nilai_jumlah_keseluruhan;
		$agentbersih = $nilai_agent;
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf;
		$pemegangsahambersih = $nilai_pemegang_saham;
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$nilaicek = (int)$rowbsn['jumlah_bayaran'];
		if($nilaicek >= 10){
			$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique' ";
			mysql_query($query,$con);
			mysql_close();
		}else{
			$query="update maklumat_commission set jumlah_keseluruhan='0', agent='0', zakat='0', pentadbiran='0', staf='0', pemegang_saham='0', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique' ";
			mysql_query($query,$con);
			mysql_close();
		}
	}
	
	function commision_epay($nilaibayaran, $idunique, $bilstaf, $jenis_bayaran, $jenis_bil, $id_maklumat_asas){
		$con = connect();
		
		$queryformula = "select * from conf_epay";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$queryepay = "select * from maklumat_commission where id='$idunique'";
		$resepay = mysql_query($queryepay,$con);
		$rowepay = mysql_fetch_array($resepay);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowepay['discount'];
		$nilaibersih = $nilai_jumlah_keseluruhan;
		$agentbersih = $nilai_agent;
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf;
		$pemegangsahambersih = $nilai_pemegang_saham;
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$nilaicek = (int)$rowepay['jumlah_bayaran'];
		if($nilaicek >= 10){
			$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique' ";
			mysql_query($query,$con);
			mysql_close();
		}else{
			$query="update maklumat_commission set jumlah_keseluruhan='0', agent='0', zakat='0', pentadbiran='0', staf='0', pemegang_saham='0', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique' ";
			mysql_query($query,$con);
			mysql_close();
		}
	}
	
	function commision_wasiat($nilaibayaran, $id_maklumat_asas, $bilstaf, $jenis_bayaran, $idunique){
		$con = connect();
		
		$queryformula = "select * from conf_wasiat";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		$pentadbiran = $rowsformula['pentadbiran'];
		
		$querywasiat = "select * from maklumat_commission where id='$idunique'";
		$reswasiat = mysql_query($querywasiat,$con);
		$rowswasiat = mysql_fetch_array($reswasiat);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowswasiat['discount'];
		$nilaibersih = $nilai_jumlah_keseluruhan;
		$agentbersih = $nilai_agent;
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf/$bilstaf;
		$pemegangsahambersih = $nilai_pemegang_saham;
		$pentadbiranbersih = $pentadbiran;
		#---
		
		$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique'";
		mysql_query($query,$con);
		mysql_close();
	}
	
	function commision_pusaka($nilaibayaran, $id_maklumat_asas, $bilstaf, $jenis_bayaran, $idunique){
		$con = connect();
		
		$queryformula = "select * from conf_pusaka";
		$resformula = mysql_query($queryformula,$con);
		$rowsformula = mysql_fetch_array($resformula);
		$nilai_jumlah_keseluruhan = $rowsformula['jumlah_keseluruhan'];
		$nilai_agent = $rowsformula['agent'];
		$nilai_zakat = $rowsformula['zakat'];
		$nilai_staf = $rowsformula['staf'];
		$nilai_pemegang_saham = $rowsformula['pemegang_saham'];
		
		$querywasiat = "select * from maklumat_commission where id='$idunique'";
		$reswasiat = mysql_query($querywasiat,$con);
		$rowswasiat = mysql_fetch_array($reswasiat);
		
		#---Formula
		$nilaibayaran = $nilaibayaran - $rowswasiat['discount'];
		$nilaibersih = $nilai_jumlah_keseluruhan;
		$agentbersih = $nilai_jumlah_keseluruhan * ($nilai_agent/100);
		$zakatbersih = $nilai_zakat;
		$stafbersih = $nilai_staf/$bilstaf;
		$pemegangsahambersih = $nilai_pemegang_saham;
		$pentadbiranbersih = $nilaibersih - ($agentbersih + $zakatbersih + $stafbersih + $pemegangsahambersih);
		#---
		
		$query="update maklumat_commission set jumlah_keseluruhan='$nilaibersih', agent='$agentbersih', zakat='$zakatbersih', pentadbiran='$pentadbiranbersih', staf='$stafbersih', pemegang_saham='$pemegangsahambersih', tarikh_simpan = now(), terima_duit = 1, id_userinfo_hq = '".$_SESSION['id']."', branch = '".$_SESSION['branch']."' where id='$idunique'";
		mysql_query($query,$con);
		mysql_close();
	}

?>