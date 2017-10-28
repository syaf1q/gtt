<?php
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php');
	$con = connect();
	
	if($jenis == 'takaful'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		
		if($tax == '' || $tax == null){
			$tax = 0;	
		}
		
		$querytakaful="insert into maklumat_takaful (dibawah, nilai_bayaran,cara_bayaran,tarikh_simpan,agensi,discount,tax,catatan, id_maklumat_asas, nric, person_covered, vehicle_no, vehicle_brand, vehicle_model, engine_no, chasis_no, year_manufacture, cubic, seat_capacity, cover_type) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$agensi', '$discount', '$tax', '$catatan', '$id_maklumat_asas', '$nric', '$person_covered', '$vehicle_no', '$vehicle_brand', '$vehicle_model', '$engine_no', '$chasis_no', '$year_manufacture', '$cubic', '$seat_capacity', '$cover_type')";
		mysql_query($querytakaful,$con);
		$idpass=mysql_insert_id();
		

		for($a=1; $a<=16; $a++){
			//$value='$inlineCheckbox'.$a;
			$value=$inlineCheckbox[$a];
			//$value=$inlineCheckbox1;
			if($value != '' || $value != null){
				$querytakafulcoverage="insert into maklumat_takaful_coverage (id_maklumat_takaful, coverage_name) values ('$idpass', '$value')";
				mysql_query($querytakafulcoverage,$con);
			}
		}
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'Takaful/Insurance', '$nilaibayaran', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (name, nric_company, reg_car_no, service, id_service) values ('$person_covered', '$nric', '$vehicle_no', 'takaful', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi Takaful', 'Id Maklumat Takaful = '.$idpass);
	}
	
	if($jenis == 'life'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		
		$querylife="insert into maklumat_life (dibawah,nilai_bayaran,cara_bayaran,tarikh_simpan,agensi,discount,catatan,fail,id_maklumat_asas,name_covered, nric_person_covered, policy_no) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$agensi', '$discount', '$catatan', '$fail', '$id_maklumat_asas', '$name_covered', '$nric_person_covered', '$policy_no')";
		mysql_query($querylife,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'Life Takaful', '$nilaibayaran', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (name, nric_company, policy_no, service, id_service) values ('$name_covered', '$nric_person_covered', '$policy_no', 'life', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi Life', 'Id Maklumat Life = '.$idpass);
	}
	
	if($jenis == 'myeg'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		
		$querymyeg="insert into maklumat_myeg (dibawah, nilai_bayaran, cara_bayaran, tarikh_simpan, discount, catatan, id_maklumat_asas, name_owner, ic_owner, no_kenderaan) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$discount', '$catatan', '$id_maklumat_asas', '$name_owner', '$ic_owner', '$no_kenderaan')";
		mysql_query($querymyeg,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'MyeG', '$nilaibayaran', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (name, nric_company, reg_car_no, service, id_service) values ('$name_owner', '$ic_owner', '$no_kenderaan', 'myeg', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi MyEG', 'Id Maklumat MyEG = '.$idpass);
	}
	
	if($jenis == 'bsn'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		$querybsn="insert into maklumat_bsn (dibawah, nilai_bayaran, cara_bayaran, tarikh_simpan, discount, catatan, jenis_bil, catatan_bil, id_maklumat_asas) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$discount', '$catatan', '$jenis_bil', '$catatan_bil', '$id_maklumat_asas')";
		mysql_query($querybsn,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, jenis_bil, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'BSN', '$nilaibayaran', '$jenis_bil', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (bill_no, jenis_bill, service, id_service) values ('$catatan_bil', '$jenis_bil', 'bsn', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi BSN', 'Id Maklumat BSN = '.$idpass);
	}
	
	if($jenis == 'epay'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		$queryepay="insert into maklumat_epay (dibawah, nilai_bayaran, cara_bayaran, tarikh_simpan, discount, catatan, jenis_bil, catatan_bil, id_maklumat_asas) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$discount', '$catatan', '$jenis_bil', '$catatan_bil', '$id_maklumat_asas')";
		mysql_query($queryepay,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, jenis_bil, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'E-Pay', '$nilaibayaran', '$jenis_bil', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (bill_no, jenis_bill, service, id_service) values ('$catatan_bil', '$jenis_bil', 'epay', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi E-Pay', 'Id Maklumat E-Pay = '.$idpass);
	}
	
	if($jenis == 'wasiat'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		$querywasiat="insert into maklumat_wasiat (dibawah,nilai_bayaran,cara_bayaran,tarikh_simpan,discount,catatan,id_maklumat_asas,nama_pewaris,ic_pewaris,no_tel_pewaris, jenis_wasiat) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$discount', '$catatan', '$id_maklumat_asas', '$nama_pewaris', '$ic_pewaris', '$no_tel_pewaris', '$jenis_wasiat')";
		mysql_query($querywasiat,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'Wasiat', '$nilaibayaran', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);
		
		$queryrekod="insert into rekod_servis (name, nric_company, jenis_wasiat, service, id_service) values ('$nama_pewaris', '$ic_pewaris', '$jenis_wasiat', 'wasiat', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi Wasiat', 'Id Maklumat Wasiat = '.$idpass);
	}
	
	if($jenis == 'pusaka'){
		if($discount == '' || $discount == null){
			$discount = 0;	
		}
		
		$dm=substr($tarikh_kematian,0,2);
		$mm=substr($tarikh_kematian,3,2);
		$ym=substr($tarikh_kematian,6,4);
		$tarikh_kematian_baru=$ym.'-'.$mm.'-'.$dm;
	
		$querypusaka="insert into maklumat_pusaka (dibawah,nilai_bayaran,cara_bayaran,tarikh_simpan,discount,catatan,id_maklumat_asas, nama_simati, nric_simati, tarikh_kematian, nama_penuntut, nric_penuntut, bil_pasangan, bil_anak_lelaki, bil_anak_perempuan, bil_adik_beradik_lelaki, bil_adik_beradik_perempuan, status_bapa, status_ibu) values ('$dibawah', '$nilaibayaran', '$carabayaran', now(), '$discount', '$catatan', '$id_maklumat_asas', '$nama_simati', '$nric_simati', '$tarikh_kematian_baru', '$nama_penuntut', '$nric_penuntut', '$bil_pasangan', '$bil_anak_lelaki', '$bil_anak_perempuan', '$bil_adik_beradik_lelaki', '$bil_adik_beradik_perempuan', '$status_bapa', '$status_ibu')";
		mysql_query($querypusaka,$con);
		$idpass=mysql_insert_id();
		
		$querycommission="insert into maklumat_commission (id_gabung, tarikh_simpan, jenis_bayaran, jumlah_bayaran, id_maklumat_asas, discount, tax) values ('$idpass', now(), 'Pusaka', '$nilaibayaran', '$id_maklumat_asas', '$discount', '$tax')";
		mysql_query($querycommission,$con);	
		
		$queryrekod="insert into rekod_servis (name, nric_company, service, id_service) values ('$nama_simati', '$nric_simati', 'pusaka', '$id_maklumat_asas')";
		mysql_query($queryrekod,$con);	
		
		logrecord('Add', 'Rekod Pembayaran. Transaksi Pusaka', 'Id Maklumat Pusaka = '.$idpass);
	}
?>
<script>
alert('Rekod Pembayaran Berjaya');
window.location.href='page.php?menushort=pembayaran&nama_pelanggan=<?php echo $nama_pelanggan; ?>&id=<?php echo $id_maklumat_asas; ?>';
</script>