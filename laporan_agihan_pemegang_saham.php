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
    	<div class="page-header"><h3>Laporan Agihan Pemegang Saham</h3></div> 
        <p class="alert alert-info"> <strong>Sila pilih kriteria sebelum menjana laporan.</strong></p>
        <form id="form1" name="form1" method="post" action="laporan_agihan_pemegang_saham_jana.php">
            <div class="form-group">
            	<label for="">Tarikh Penerimaan Duit (Mula)</label>
            	<input type="text" class="form-control" id="tarikh_mula" name="tarikh_mula" placeholder="" value="">
          	</div>
            <div class="form-group">
            	<label for="">Tarikh Penerimaan Duit (Tamat)</label>
            	<input type="text" class="form-control" id="tarikh_tamat" name="tarikh_tamat" placeholder="" value="">
          	</div>
            <p>
            	<button type="submit" class="btn btn-success">Jana <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></button>
            </p>
        </form>
    </div>
  </div>
</div>