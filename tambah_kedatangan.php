<?php
	session_start();
	extract($_REQUEST);
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
?>
<script>
	function goBack() {
		window.location.href='page.php?menushort=hqlist';
	}
</script>



<form id="form1" name="form1" method="post" action="tambah_kedatangan_proses.php">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div align="right">
      <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
      <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
      </div>
      <div class="form-group">
        <label for="nama_pelanggan">Nama Staf <font color="#FF0000"><b>*</b></font></label>
        <select id="id_staf" name="id_staf" class="form-control">
        	<option value="">--Sila Pilih--</option>
			<?php
				$query1="select * from userinfo where usertype = 2 and active = 1";
				$res1 = mysql_query($query1,$con);
				while($rows1 = mysql_fetch_array($res1)){
			?>
              <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['fullname']; ?></option>
            <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="nama_pasangan">Cawangan</label>
        <input type="text" class="form-control" id="cawangan" name="cawangan" readonly="readonly" value="<?php echo $_SESSION['branch']; ?>">
      </div>
      <div class="form-group">
        <label for="nama_pasangan">Tarikh</label>
        <input type="text" class="form-control" id="tarikh_kedatangan" name="tarikh_kedatangan" readonly="readonly" value="<?php echo date("d/m/Y"); ?>">
      </div>
  	</div>
  </div>
</div>
</form>