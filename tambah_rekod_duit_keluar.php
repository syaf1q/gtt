<?php
	extract($_REQUEST);

	require_once('Connections/connection.class.php');
	$con = connect();
	
?>
<script>		
	function goBack(){
		window.location.href='page.php?menushort=rekod_duit_keluar';
	}
</script>
<form id="form1" name="form1" method="post" action="tambah_rekod_duit_keluar_proses.php">
<input type="hidden" name="jenis_t" id="jenis_t" value="add" />
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div align="right">
      <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
      <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
      </div>
      <div class="form-group">
        <label for="nama">Jenis Bayaran</label>
        <select id="jenis_bayaran" name="jenis_bayaran" class="form-control">
        	<option value="">--Sila Pilih--</option>
              <option value="Maybank">Maybank</option>
              <option value="CIMB">CIMB</option>
              <option value="BIMB">BIMB</option>
              <option value="BSN">BSN</option>
              <option value="MyeG">MyeG</option>
              <option value="Tunai">Tunai</option>
              <option value="Cek">Cek</option>
              <option value="FPX">FPX</option>
			  <option value="General Expenses">General Expenses</option>
        </select>
      </div>
      <div class="form-group">
        <label for="name">Catatan</label>
        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="" value="">
      </div>
      <div class="form-group">
        <label for="name">Nilai (RM)</label>
        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="" value="">
      </div>
   </div>
 </div>
