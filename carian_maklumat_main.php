<div class="container">
  <div class="row">
    <div class="col-md-12">  
        <p class="alert alert-info"> <strong>Sila pilih kriteria sebelum membuat carian.</strong></p>
        <div class="panel panel-primary">
        	<div class="panel-heading">Carian maklumat-maklumat pelanggan</div>
  				<div class="panel-body">
        <form id="form1" name="form1" method="post" action="page.php?menushort=carian_maklumat">
        	<div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios" value="nric">NRIC/No Daftar Syarikat
                <input type="text" class="form-control" id="nric" name="nric" placeholder="">
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios" value="name">Nama
                <input type="text" class="form-control" id="name" name="name" placeholder="">
              </label>
            </div>
            <p>
            	<button type="submit" class="btn btn-success">Cari <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </p>
        </form>
        		</div>
        	</div>
        </div>
    </div>
  </div>
</div>