<?php
	extract($_REQUEST);
	require_once('Connections/connection.class.php');
	$con = connect();

?>

<script>
	function goBack() {
		window.location.href='page.php?menushort=senarai_pengguna_main';
	}
	
	function semakda(){
		document.getElementById("form1").submit();
	}
</script>

<?php
	if($jenis_t == 'edit'){
		$query="select * from userinfo where id = '$idp'";
		$res = mysql_query($query,$con);
		$rows = mysql_fetch_array($res);
	}
?>

<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<div class="page-header">
        		<h3>Senarai Pengguna</h3>
            </div>
            <p class="alert alert-success"> Sila lengkapkan maklumat pengguna
          	</p>
        	<form id="form1" name="form1" method="post" action="tambah_pengguna_proses.php">
            	<input type="hidden" id="jenis_t" name="jenis_t" value="<?php echo $jenis_t; ?>" />
                <input type="hidden" id="idp" name="idp" value="<?php echo $rows['id']; ?>" />
            	<div align="right">
                    <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
                    <button type="button" onclick="semakda()" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </div>
            	<div class="form-group">
                  <label for="nama">Nama Penuh</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="<?php echo $rows['fullname']; ?>">
                </div>
                <div class="form-group">
                  <label for="nokp">No Kad Penggenalan</label>
                  <input type="text" class="form-control" id="nokp" name="nokp" placeholder="" value="<?php echo $rows['icno']; ?>">
                </div>
                <div class="form-group">
                  <label for="emel">Emel</label>
                  <input type="text" class="form-control" id="emel" name="emel" placeholder="" value="<?php echo $rows['emel']; ?>">
                </div>
                <div class="form-group">
                  <label for="tel">No Tel Bimbit</label>
                  <input type="text" class="form-control" id="tel" name="tel" placeholder="" value="<?php echo $rows['telno']; ?>">
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori Pengguna</label>
                  <select id="kategori" name="kategori" class="form-control">
                      <option value="">--Sila Pilih--</option>
                      <option value="1" <?php if($rows['usertype']=='1'){?>selected<?php } ?>>Admin</option>
                      <option value="4" <?php if($rows['usertype']=='4'){?>selected<?php } ?>>Management</option>
                      <option value="2" <?php if($rows['usertype']=='2'){?>selected<?php } ?>>HQ</option>
                      <option value="3" <?php if($rows['usertype']=='3'){?>selected<?php } ?>>Agen</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="komisen">Komisen Agen (%) - Tentukan Agen Premier</label>
                  <select id="komisen" name="komisen" class="form-control">
                      <option value="">--Sila Pilih--</option>
                      <option value="5" <?php if($rows['premier']=='5'){?>selected<?php } ?>>5%</option>
                      <option value="8" <?php if($rows['premier']=='8'){?>selected<?php } ?>>8%</option>
                    </select>
                </div>
                
                <p align="center" style="color:#F00">Username dan password di bawah akan digunakan oleh pengguna untuk akses ke sistem.</p>
                <div class="col-md-6">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $rows['username']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $rows['password']; ?>">
                </div>
            </form>
            <br /><br /><br /><br />
        </div>
    </div>
</div>