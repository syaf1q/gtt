<script>
	$(document).ready(function(){
		$("#tarikh_mula, #tarikh_tamat").datepicker({
			format: "dd/mm/yyyy"
		});
	});
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">  
    	<div class="page-header"><h3>Laporan Agihan</h3></div> 
        <p class="alert alert-info"> <strong>Sila pilih kriteria sebelum menjana laporan.</strong></p>
        <form id="form1" name="form1" method="post" action="laporan_agihan_jana.php">
		    <div class="form-group">
            	<label for="">Jenis Transaksi</label>
            	<select id="transaksi" name="transaksi" class="form-control">
                  <option value="">--Sila Pilih--</option>
                  <option value="BSN">BSN</option>
				  <option value="Takaful/Insurance">Takaful/Insurance</option>
                  <option value="MyeG">MyeG</option>
                  <option value="E-Pay">E-Pay</option>
                  <option value="Wasiat">Wasiat</option>
                  <option value="Pusaka">Pusaka</option>
				  <option value="%">Semua</option>
                </select>
          	</div>
            <div class="form-group">
            	<label for="">Tarikh Penerimaan Duit (Mula)</label>
            	<input type="text" class="form-control" id="tarikh_mula" name="tarikh_mula" placeholder="" value="">
          	</div>
            <div class="form-group">
            	<label for="">Tarikh Penerimaan Duit (Tamat)</label>
            	<input type="text" class="form-control" id="tarikh_tamat" name="tarikh_tamat" placeholder="" value="">
          	</div>
			<div class="form-group">
            	<label for="">Staf</label>
            	<select id="staf" name="staf" class="form-control">
                  <option value="">--Sila Pilih--</option>
                  <?php 
				  	$query="select * from userinfo where (usertype = '3' or usertype = '2' or usertype = '4') and active = 1";
					$res=mysql_query($query,connect());
					while($rows=mysql_fetch_array($res)){
				  ?>
                  <option value="<?php echo $rows['id']; ?>"><?php echo $rows['fullname']; ?></option>
                  <?php } ?>
				  <option value="%">Semua</option>
                </select>
          	</div>
            <div class="form-group">
            	<label for="">Cawangan</label>
            	<select id="cawangan" name="cawangan" class="form-control">
                  <option value="">--Sila Pilih--</option>
                  <option value="Senai">SENAI</option>
                  <option value="Larkin">LARKIN</option>
                  <option value="%">SEMUA</option>
                </select>
          	</div>
            <p>
            	<button type="submit" class="btn btn-success">Jana <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></button>
            </p>
        </form>
    </div>
  </div>
</div>