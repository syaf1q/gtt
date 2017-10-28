<script>
	$(document).ready(function(){
		$( "#tarikh_bersara_pelanggan, #tarikh_bersara_pasangan, #tarikh_tamat_roadtax_pelanggan, #tarikh_tamat_roadtax_pasangan").datepicker({
			format: "dd/mm/yyyy"
		});
	});
	
	function goBack() {
		window.location.href='page.php?menushort=senarai_pelanggan';
	}
	
	function submitk() {
		var nama_pelanggan = document.getElementById("nama_pelanggan").value;
		if(nama_pelanggan != ""){
			document.getElementById("form1").submit();
		}else{
			alert('Sila masukkan Nama Pelanggan');
		}
	}
</script>
<?php
	extract($_REQUEST);
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
	if($type == 'edit'){
		$query="select * from maklumat_pelanggan where id = '$idpelanggan'";
		$res = mysql_query($query,$con);
		$rows = mysql_fetch_array($res);
	}

?>
<form id="form1" name="form1" method="post" action="tambah_maklumat_pelanggan_proses.php">
	<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $idpelanggan; ?>"/>
    <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="alert alert-success">Sila <?php if($type == 'edit'){?>sunting<?php }else{ ?>tambah<?php } ?> maklumat pelanggan.
      </p>
      <div align="right">
      <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
      <button type="button" onclick="submitk()" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
      </div>
      <div class="tab-box">
      	<ul class="nav nav-tabs">
          <li class="active"><a href="#peribadi" data-toggle="tab">Maklumat Peribadi</a></li>
          <li><a href="#kerja" data-toggle="tab">Maklumat Pekerjaan</a></li>
          <li><a href="#lain" data-toggle="tab">Maklumat Lain-lain</a></li>
        </ul>
        <div class="tab-content">
        	<div class="tab-pane active" id="peribadi">
            	<div class="form-group">
                  <label for="nama_pelanggan">Nama Pelanggan <font color="#FF0000"><b>*</b></font></label>
                  <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="" value="<?php echo $rows['nama_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="nama_pasangan">Nama Pasangan</label>
                  <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder="" value="<?php echo $rows['nama_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $rows['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="no_tel_rumah">No Telefon Rumah</label>
                  <input type="text" class="form-control" id="no_tel_rumah" name="no_tel_rumah" placeholder="" value="<?php echo $rows['no_tel_rumah']; ?>">
                </div>
                <div class="form-group">
                  <label for="no_tel_hp_pelanggan">No Telefon Hp Pelanggan</label>
                  <input type="text" class="form-control" id="no_tel_hp_pelanggan" name="no_tel_hp_pelanggan" placeholder="" value="<?php echo $rows['no_tel_hp_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="no_tel_hp_pasangan">No Telefon Hp Pasangan</label>
                  <input type="text" class="form-control" id="no_tel_hp_pasangan" name="no_tel_hp_pasangan" placeholder="" value="<?php echo $rows['no_tel_hp_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="nokp_pelanggan">No Kad Pengenalan Pelanggan</label>
                  <input type="text" class="form-control" id="nokp_pelanggan" name="nokp_pelanggan" placeholder="" value="<?php echo $rows['no_kp_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="nokp_pasangan">No Kad Pengenalan Pasangan</label>
                  <input type="text" class="form-control" id="nokp_pasangan" name="nokp_pasangan" placeholder="" value="<?php echo $rows['no_kp_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="kahwin">Taraf Perkahwinan</label>
                  <select id="kahwin" name="kahwin" class="form-control">
                  	<option value="">-- Sila Pilih --</option>
                    <option value="Bujang" <?php if($rows['status_perkhawinan'] == 'Bujang'){?>selected<?php } ?>>Bujang</option>
                    <option value="Berkahwin" <?php if($rows['status_perkhawinan'] == 'Berkahwin'){?>selected<?php } ?>>Berkahwin</option>
                    <option value="Duda" <?php if($rows['status_perkhawinan'] == 'Duda'){?>selected<?php } ?>>Duda</option>
                    <option value="Janda" <?php if($rows['status_perkhawinan'] == 'Janda'){?>selected<?php } ?>>Janda</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="emel_pelanggan">Emel Pelanggan</label>
                  <input type="text" class="form-control" id="emel_pelanggan" name="emel_pelanggan" placeholder="" value="<?php echo $rows['emel_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="emel_pasangan">Emel Pasangan</label>
                  <input type="text" class="form-control" id="emel_pasangan" name="emel_pasangan" placeholder="" value="<?php echo $rows['emel_pasangan']; ?>">
                </div>
            </div> 
            <div class="tab-pane" id="kerja">
            	<div class="form-group">
                  <label for="majikan_pelanggan">Majikan Pelanggan</label>
                  <input type="text" class="form-control" id="majikan_pelanggan" name="majikan_pelanggan" placeholder="" value="<?php echo $rows['majikan_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="majikan_pasangan">Majikan Pasangan</label>
                  <input type="text" class="form-control" id="majikan_pasangan" name="majikan_pasangan" placeholder="" value="<?php echo $rows['majikan_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="pekerjaan_pelanggan">Pekerjaan Pelanggan</label>
                  <input type="text" class="form-control" id="pekerjaan_pelanggan" name="pekerjaan_pelanggan" placeholder="" value="<?php echo $rows['pekerjaan_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="pekerjaan_pasangan">Pekerjaan Pasangan</label>
                  <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan" placeholder="" value="<?php echo $rows['pekerjaan_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="pendapatan_pelanggan">Pendapatan Pelanggan</label>
                  <input type="text" class="form-control" id="pendapatan_pelanggan" name="pendapatan_pelanggan" placeholder="RM" value="<?php echo $rows['pendapatan_tahunan_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="pendapatan_pasangan">Pendapatan Pasangan</label>
                  <input type="text" class="form-control" id="pendapatan_pasangan" name="pendapatan_pasangan" placeholder="RM" value="<?php echo $rows['pendapatan_tahunan_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="tarikh_bersara_pelanggan">Tarikah Bersara Pelanggan</label>
                  <input type="text" class="form-control" id="tarikh_bersara_pelanggan" name="tarikh_bersara_pelanggan" placeholder="" value="<?php echo trim_tarikh2($rows['tarikah_bersara_pelanggan']); ?>">
                </div>
                <div class="form-group">
                  <label for="tarikh_bersara_pasangan">Tarikah Bersara Pasangan</label>
                  <input type="text" class="form-control" id="tarikh_bersara_pasangan" name="tarikh_bersara_pasangan" placeholder="" value="<?php echo trim_tarikh2($rows['tarikah_bersara_pasangan']); ?>">
                </div>
            </div>
            <div class="tab-pane" id="lain">
            	<div class="form-group">
                  <label for="no_plat_pelanggan">No Kenderaan Pelanggan</label>
                  <input type="text" class="form-control" id="no_plat_pelanggan" name="no_plat_pelanggan" placeholder="" value="<?php echo $rows['no_kenderaan_pelanggan']; ?>">
                </div>
                <div class="form-group">
                  <label for="no_plat_pasangan">No Kenderaan Pasangan</label>
                  <input type="text" class="form-control" id="no_plat_pasangan" name="no_plat_pasangan" placeholder="" value="<?php echo $rows['no_kenderaan_pasangan']; ?>">
                </div>
                <div class="form-group">
                  <label for="tarikh_tamat_roadtax_pelanggan">Tarikh Tamat Roadtax Pelanggan</label>
                  <input type="text" class="form-control" id="tarikh_tamat_roadtax_pelanggan" name="tarikh_tamat_roadtax_pelanggan" placeholder="" value="<?php echo trim_tarikh2($rows['tarikh_tamat_roadtax_pelanggan']); ?>">
                </div>
                <div class="form-group">
                  <label for="tarikh_tamat_roadtax_pasangan">Tarikh Tamat Roadtax Pasangan</label>
                  <input type="text" class="form-control" id="tarikh_tamat_roadtax_pasangan" name="tarikh_tamat_roadtax_pasangan" placeholder="" value="<?php echo trim_tarikh2($rows['tarikh_tamat_roadtax_pasangan']); ?>">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>