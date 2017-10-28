<script>
	function semak(){
		var nama = document.getElementById("nama_pelanggan").value;
		
		var tarikh_manual = document.getElementById("tarikh_manual").value;
		
		if(nama == '' || tarikh_manual == ''){
			alert('Sila masukkan Nama pelanggan atau tarikh');
		}else{
			document.getElementById("form1").submit();
		}

	}
	
	function tambah(){
		//window.location.href='page.php?menushort=tambah_maklumat_pelanggan';
		window.location.href='page.php?menushort=senarai_pelanggan';
	}
	
	function lookup(inputString,check) {
	
		if(check==1)
		{
			if(inputString.length == 0) {
				// Hide the suggestion box.
				$('#suggestions').hide();
			} else {
				$.post("data/nama.php", {queryString: ""+inputString+""}, function(data){
					if(data.length >0) {
						$('#suggestions').show();
						$('#autoSuggestionsList').html(data);
					}
				});
			}
			
		}
	}
	
	function fill(thisValue,thisValue1,siri) {
	    if(siri==1)
		{
			$('#id_pelanggan').val(thisValue);
			$('#nama_pelanggan').val(thisValue1);
			setTimeout("$('#suggestions').hide();", 200);
		}
	}
	
	$(document).ready(function () {       
		$('#tarikh_manual').datepicker({
			format: "dd/mm/yyyy"
		});  
	}); 
</script>
<style type="text/css">
.suggestionsBox {
	position: relative;
	left: 30px;
	margin: 10px 0px 0px -30px;
	width: 300px;
	background-color: #212427;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border: 2px solid #000;
	color: #fff;
	cursor: pointer;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h3>Selamat Datang !</h3>
      </div>
      
      <p class="alert alert-info"> <strong>Sila buat carian <font color="#FF0000">Nama Pelanggan</font>.<br /> Jika tiada nama pelanggan, Agent/HQ perlu mengisi maklumat pelanggan.<br />Sila pastikan maklumat pelanggan yang tepat sebelum merekod.</strong></p>
      <form method="post" id="form1" name="form1" action="form_pembayaran_main_proses.php">
      	<input type="hidden" id="id_pelanggan" name="id_pelanggan" />
        <div class="col-md-8">
            <div class="form-group">
                <div align="right"><button type="button" class="btn btn-warning" onclick="tambah()">Semak Pelanggan <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button></div>
              <label for="nama_pelanggan">Nama Pelanggan</label>
              <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Auto Suggest" autocomplete="off" onkeyup="lookup(this.value,1);">
              <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="data/upArrow.png" style="position: relative; top: -16px; left: 10px;" alt="upArrow" />
                <div class="suggestionList" id="autoSuggestionsList"> &nbsp; </div>
               </div>
            </div>
        </div>
        <div class="col-md-4">&nbsp;</div>
            
        <div class="col-md-8">
            <div class="form-group">
                <label for="Tarikh">Tarikh</label>
                <input type="text" class="form-control" id="tarikh_manual" name="tarikh_manual" placeholder="Tarikh" />
            </div>
        </div>
		<div class="col-md-4">&nbsp;</div>
        
        <div class="col-md-4">
        <p><button type="button" onclick="semak()" class="btn btn-primary">Teruskan <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button></p>
        </div>
      </form>
    </div>
  </div>
</div>


