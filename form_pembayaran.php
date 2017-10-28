<?php
	ini_set('session.gc_maxlifetime', 10*60*60);
	session_start();
	
	extract($_REQUEST);
	require_once('class/trim_date.php');
	
	
?>
<script>
	function hantarkehq(){
		var r = confirm("Rekod ini akan di hantar ke HQ. Adakah anda ingin teruskan?");
		if (r == true) {
			window.location.href='form_pembayaran_selesai.php?id_maklumat_asas=<?php echo $id; ?>';
		}
	}
	
	function deletemaklumat(jenis,id,id3){
		var r = confirm("Adakah anda ingin buang maklumat ini?");
		if (r == true) {
			window.location.href='page.php?menushort=delete_form_dalam&nama_pelanggan=<?php echo $nama_pelanggan; ?>&id=<?php echo $id; ?>&jenis='+jenis+'&id2='+id+'&id3='+id3;
		}
	}
	
	$(document).ready(function(){
		$( "#tarikh_kematian").datepicker({
			format: "dd/mm/yyyy"
		});
	});
</script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="alert alert-success"> Sila lengkapkan maklumat-maklumat pembayaran bagi tab yang berkaitan sahaja. Terima kasih<br />
        <font color="#000000"><b>Nama Pelanggan</b></font> <font color="#FF0000"><?php echo $nama_pelanggan; ?></font> 
      </p>
      <div align="right"><button type="button" class="btn btn-primary" onclick="hantarkehq()">Selesai <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button></div>
      <div class="tab-box">
        <div class="col-xs-3">
          <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#takaful" data-toggle="tab">1. Takaful / Insurance</a></li>
            <li><a href="#life" data-toggle="tab">2. Life Takaful</a></li>
            <li><a href="#myeg" data-toggle="tab">3. MyeG</a></li>
            <li><a href="#bsn" data-toggle="tab">4. BSN</a></li>
            <li><a href="#epay" data-toggle="tab">5. E-Pay</a></li>
            <li><a href="#wasiat" data-toggle="tab">6. Wasiat</a></li>
            <li><a href="#pusaka" data-toggle="tab">7. Pusaka</a></li>
          </ul>
        </div>
        <div class="col-xs-9">
          <div class="tab-content"> 
            <!--tab pertama-->
            <div class="tab-pane active" id="takaful">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="takaful" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Cover Note</font>
                	<div class="form-inline">
                        <div class="form-group">
                        <label for="name">Di bawah</label>
                        <label class="radio-inline">
                          <input type="radio" name="dibawah" id="dibawah" value="Individu">
                          Individu </label>
                        <label class="radio-inline">
                          <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                          Syarikat </label>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                          <label for="name">NRIC / No Daftar Syarikat</label>
                          <input type="text" class="form-control" id="nric" name="nric" placeholder="" value="">
                        </div>
                    </div>
                    <br />
                	<div class="form-inline">
                            <div class="form-group">
                              <label for="name">Participant</label>
                              <input type="text" class="form-control" id="person_covered" name="person_covered" placeholder="" value="">
                            </div>
                        	<div class="form-group">
                              <label for="name">Cover Type</label>
                              <input type="text" class="form-control" id="cover_type" name="cover_type" placeholder="" value="">
                            </div>
                    </div>
                    <br />
                    <div class="form-inline">
                            <div class="form-group">
                              <label for="name">Vehicle No</label>
                              <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="" value="">
                            </div>
                        	<div class="form-group">
                              <label for="name">Vehicle Make</label>
                              <input type="text" class="form-control" id="vehicle_brand" name="vehicle_brand" placeholder="" value="">
                            </div>
                    </div>
                    <br />
                    <div class="form-inline">
                            <div class="form-group">
                              <label for="name">Vehicle Model</label>
                              <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="" value="">
                            </div>
                        	<div class="form-group">
                              <label for="name">Year Manufacture</label>
                              <input type="text" class="form-control" id="year_manufacture" name="year_manufacture" placeholder="" value="">
                            </div>
                    </div>
                    <br />
                    <div class="form-inline">
                            <div class="form-group">
                              <label for="name">Engine No</label>
                              <input type="text" class="form-control" id="engine_no" name="engine_no" placeholder="" value="">
                            </div>
                        	<div class="form-group">
                              <label for="name">Chasis No</label>
                              <input type="text" class="form-control" id="chasis_no" name="chasis_no" placeholder="" value="">
                            </div>
                    </div>
                    <br />
                    <div class="form-inline">
                        	<div class="form-group">
                              <label for="name">Cubic Capacity</label>
                              <input type="text" class="form-control" id="cubic" name="cubic" placeholder="" value="">
                            </div>
                        	<div class="form-group">
                              <label for="name">Seating Capacity</label>
                              <input type="text" class="form-control" id="seat_capacity" name="seat_capacity" placeholder="" value="">
                            </div>
                    </div>
                    <br />
                    <div class="form-inline">
                    	<div class="form-group">
                        <label for="name">Other optional of coverages</label>
                         <br />
                         <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[1]" name="inlineCheckbox[1]" value="Windscreen">Windscreen
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[2]" name="inlineCheckbox[2]" value="Strike, Riot & Civil Commotion">Strike, Riot & Civil Commotion
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[3]" name="inlineCheckbox[3]" value="Extra perils">Extra perils
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[4]" name="inlineCheckbox[4]" value="Legal liability to passenger for act of negligence">Legal liability to passenger for act of negligence
                        </label>
                        </div>
                    </div>
                    <br />
                    <div class="form-inline">
                    	<div class="form-group">
                         <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[5]" name="inlineCheckbox[5]" value="Vehicle Accessories">Vehicle Accessories
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[6]" name="inlineCheckbox[6]" value="Legal liability to passanger (drivers liability)">Legal liability to passanger (drivers liability)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[7]" name="inlineCheckbox[7]" value="Gas Convertion Kit and Tank">Gas Convertion Kit and Tank
                        </label>
                        </div>
                    </div>
                    <br />
                    <div class="form-inline">
                    	<div class="form-group">
                         <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[8]" name="inlineCheckbox[8]" value="C.A.R.T (7 days X 50)">C.A.R.T (7 days X 50)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[9]" name="inlineCheckbox[9]" value="C.A.R.T (7 days X 100)">C.A.R.T (7 days X 100)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[10]" name="inlineCheckbox[10]" value="C.A.R.T (7 days X 200)">C.A.R.T (7 days X 200)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[11]" name="inlineCheckbox[11]" value="C.A.R.T (14 days X 50)">C.A.R.T (14 days X 50)
                        </label>
                        </div>
                    </div>
                    <br />
                    <div class="form-inline">
                    	<div class="form-group">
                         <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[12]" name="inlineCheckbox[12]" value="C.A.R.T (14 days X 100)">C.A.R.T (14 days X 100)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[13]" name="inlineCheckbox[13]" value="C.A.R.T (14 days X 200)">C.A.R.T (14 days X 200)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[14]" name="inlineCheckbox[14]" value="C.A.R.T (21 days X 50)">C.A.R.T (21 days X 50)
                        </label>&nbsp;&nbsp;&nbsp;
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[15]" name="inlineCheckbox[15]" value="C.A.R.T (21 days X 100)">C.A.R.T (21 days X 100)
                        </label>
                        </div>
                    </div>
                    <br />
                    <div class="form-inline">
                    	<div class="form-group">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox[16]" name="inlineCheckbox[16]" value="C.A.R.T (21 days X 200)">C.A.R.T (21 days X 200)
                        </label>
                        </div>
                    </div>
                <br />
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Agensi Insurance</label>
                    <select id="agensi" name="agensi" class="form-control">
                      <option value="">--Sila Pilih--</option>
                      <option value="Etiqa">Etiqa</option>
                      <option value="UniAsia">UniAsia</option>
                      <option value="Tune Insurance">Tune Insurance</option>
                      <option value="Kurnia Insurance">Kurnia Insurance</option>
                      <option value="Am Insurance">Am Insurance</option>
                    </select>
                  </div>
                </div>
                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pembayaran</font>
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" value="" required="True">
                </div>
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="RM" value="">
                </div>
                <div class="form-group">
                  <label for="name">Nilai Service Tax</label>
                  <input type="text" class="form-control" id="tax" name="tax" placeholder="RM" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain" value="">
                </div>                
                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Bayaran Yang Telah Direkodkan</font>
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>NRIC/No Daftar Syarikat</th>
                        <th>No Kenderaan</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querytakaful="select mt.nric as nric, mt.vehicle_no as vehicle_no, mc.jumlah_bayaran as nilai_bayaran, 
						  mt.discount as discount, mt.cara_bayaran as cara_bayaran, mt.tarikh_simpan as tarikh_simpan, mt.id as id, mc.id id2
						  from maklumat_takaful mt inner join maklumat_commission mc on mc.id_gabung = mt.id
						  where mt.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'Takaful/Insurance'";
						  $restakaful=mysql_query($querytakaful,connect());
						  while($rowtakaful=mysql_fetch_array($restakaful)){
					?>
                    <tr>
                    	<td><?php echo $rowtakaful['nric']; ?></td>
                        <td><?php echo $rowtakaful['vehicle_no']; ?></td>
                        <td><?php echo number_format($rowtakaful['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowtakaful['discount'],2); ?></td>
                        <td><?php echo $rowtakaful['cara_bayaran']; ?></td>
                        <td><?php echo trim_tarikh2($rowtakaful['tarikh_simpan']); ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('Takaful', <?php echo $rowtakaful['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('Takaful',<?php echo $rowtakaful['id']; ?>, <?php echo $rowtakaful['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>              
            </div>
            <div class="tab-pane" id="life">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="life" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
				
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Insuran</font>
                <div class="form-group">
                  <label for="name">Fail telah wujud?</label>
                  <label class="radio-inline">
                    <input type="radio" name="fail" id="fail" value="Ya" >
                    Ya </label>
                  <label class="radio-inline">
                    <input type="radio" name="fail" id="fail" value="Tidak">
                    Tidak. </label>
                </div>
                
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="form-group">
                    <label for="name">Agensi Insurance</label>
                    <select id="agensi" name="agensi" class="form-control">
                      <option value="">--Sila Pilih--</option>
                      <option value="Etiqa">Etiqa</option>
                      <option value="UniAsia">UniAsia</option>
                      <option value="Tune Insurance">Tune Insurance</option>
                      <option value="Kurnia Insurance">Kurnia Insurance</option>
                      <option value="Am Insurance">Am Insurance</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Name Person Covered</label>
                  <input type="text" class="form-control" id="name_covered" name="name_covered" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Ic Person Covered</label>
                  <input type="text" class="form-control" id="nric_person_covered" name="nric_person_covered" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Policy No</label>
                  <input type="text" class="form-control" id="policy_no" name="policy_no" placeholder="" value="">
                </div>
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pembayaran</font>
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" value="" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="RM" value="">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain" value="">
                </div>
                
                
				<br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Bayaran Yang Telah Direkodkan</font>
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>NRIC Person Covered</th>
                        <th>Name Person Covered</th>
                        <th>Policy No</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querylife="select ml.nric_person_covered as nric_person_covered, ml.name_covered as name_covered, 
						  ml.policy_no as policy_no, ml.nilai_bayaran as nilai_bayaran, ml.discount as discount, ml.cara_bayaran as cara_bayaran,
						  ml.tarikh_simpan as tarikh_simpan, ml.id as id, mc.id as id2 
						  from maklumat_life ml 
						  inner join maklumat_commission mc on mc.id_gabung = ml.id 
						  where ml.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'Life Takaful'";
						  $reslife=mysql_query($querylife,connect());
						  while($rowlife=mysql_fetch_array($reslife)){
					?>
                    <tr>
                    	<td><?php echo $rowlife['nric_person_covered']; ?></td>
                        <td><?php echo $rowlife['name_covered']; ?></td>
                        <td><?php echo $rowlife['policy_no']; ?></td>
                        <td><?php echo number_format($rowlife['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowlife['discount'],2); ?></td>
                        <td><?php echo $rowlife['cara_bayaran']; ?></td>
                        <td><?php echo trim_tarikh2($rowlife['tarikh_simpan']); ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('Life', <?php echo $rowlife['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('Life',<?php echo $rowlife['id']; ?>, <?php echo $rowlife['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
            <div class="tab-pane" id="myeg">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="myeg" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pemilik</font>
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Nama Pemilik Kenderaan</label>
                  <input type="text" class="form-control" id="name_owner" name="name_owner" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">NRIC Pemilik Kenderaan</label>
                  <input type="text" class="form-control" id="ic_owner" name="ic_owner" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">No Kenderaan</label>
                  <input type="text" class="form-control" id="no_kenderaan" name="no_kenderaan" placeholder="" value="">
                </div>
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pembayaran</font>
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" value="" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="RM" value="">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai" >
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain" value="">
                </div>
                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Bayaran Yang Telah Direkodkan</font>
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>NRIC Pemilik </th>
                        <th>Nama Pemilik</th>
                        <th>No Kenderaan</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querymyeg="select mm.ic_owner as ic_owner, mm.name_owner as name_owner, mm.no_kenderaan as no_kenderaan, 
						  mm.nilai_bayaran as nilai_bayaran, mm.discount as discount, mm.cara_bayaran as cara_bayaran, mm.tarikh_simpan as tarikh_simpan,
						  mm.id as id, mc.id as id2 
						  from maklumat_myeg mm 
						  inner join maklumat_commission mc on mc.id_gabung = mm.id 
						  where mm.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'MyeG'";
						  $resmyeg=mysql_query($querymyeg,connect());
						  while($rowmyeg=mysql_fetch_array($resmyeg)){
					?>
                    <tr>
                    	<td><?php echo $rowmyeg['ic_owner']; ?></td>
                        <td><?php echo $rowmyeg['name_owner']; ?></td>
                        <td><?php echo $rowmyeg['no_kenderaan']; ?></td>
                        <td><?php echo number_format($rowmyeg['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowmyeg['discount'],2); ?></td>
                        <td><?php echo $rowmyeg['cara_bayaran']; ?></td>
                        <td><?php echo trim_tarikh2($rowmyeg['tarikh_simpan']); ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('MyeG', <?php echo $rowmyeg['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('MyeG', <?php echo $rowmyeg['id']; ?>, <?php echo $rowmyeg['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
            <div class="tab-pane" id="bsn">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="bsn" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <div class="row">
                	<div class="col-md-4">
                      <label for="name">Jenis Bil</label>
                      <select class="form-control" id="jenis_bil" name="jenis_bil">
                        <option value="">-- Sila Pilih --</option>
                        <?php
                            $query="select * from bil";
                            $query=mysql_query($query,connect());
                            while($row=mysql_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                        <?php } ?>
                      </select>
                  	</div>
                  <br />
                  <div class="col-md-8">
                  	<input type="text" class="form-control" id="catatan_bil" name="catatan_bil" placeholder="No Bil (jika ada)">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="0">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain">
                </div>
                
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                </div>
                <br />
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>Jenis Bil</th>
                        <th>Catatan Bil</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Dibawah</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querybsn="select mb.jenis_bil as jenis_bil, mb.catatan_bil as catatan_bil, mb.nilai_bayaran as nilai_bayaran, 
						  mb.discount as discount, mb.cara_bayaran as cara_bayaran, mb.dibawah as dibawah, mb.id as id, mc.id as id2 
						  from maklumat_bsn mb 
						  inner join maklumat_commission mc on mc.id_gabung = mb.id 
						  where mb.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'BSN'";
						  $querybsn=mysql_query($querybsn,connect());
						  while($rowbsn=mysql_fetch_array($querybsn)){
					?>
                    <tr>
                    	<td><?php echo $rowbsn['jenis_bil']; ?></td>
                        <td><?php echo $rowbsn['catatan_bil']; ?></td>
                        <td><?php echo number_format($rowbsn['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowbsn['discount'],2); ?></td>
                        <td><?php echo $rowbsn['cara_bayaran']; ?></td>
                        <td><?php echo $rowbsn['dibawah']; ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('BSN', <?php echo $rowbsn['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('BSN', <?php echo $rowbsn['id']; ?>, <?php echo $rowbsn['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
            <div class="tab-pane" id="epay">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="epay" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <div class="row">
                	<div class="col-md-4">
                      <label for="name">Jenis Bil</label>
                      <select class="form-control" id="jenis_bil" name="jenis_bil">
                        <option value="">-- Sila Pilih --</option>
                        <?php
                            $query="select * from bil";
                            $query=mysql_query($query,connect());
                            while($row=mysql_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                        <?php } ?>
                      </select>
                  	</div>
                  <br />
                  <div class="col-md-8">
                  	<input type="text" class="form-control" id="catatan_bil" name="catatan_bil" placeholder="No Bil (jika ada)">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="0">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain">
                </div>
                
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                </div>
                <br />
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>Jenis Bil</th>
                        <th>Catatan Bil</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Dibawah</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $queryepay="select me.jenis_bil as jenis_bil, me.catatan_bil as catatan_bil, me.nilai_bayaran as nilai_bayaran, 
						  me.discount as discount, me.cara_bayaran as cara_bayaran, me.dibawah as dibawah, me.id as id, mc.id as id2 
						  from maklumat_epay me 
						  inner join maklumat_commission mc on mc.id_gabung = me.id 
						  where me.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'E-Pay'";
						  $queryepay=mysql_query($queryepay,connect());
						  while($rowepay=mysql_fetch_array($queryepay)){
					?>
                    <tr>
                    	<td><?php echo $rowepay['jenis_bil']; ?></td>
                        <td><?php echo $rowepay['catatan_bil']; ?></td>
                        <td><?php echo number_format($rowepay['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowepay['discount'],2); ?></td>
                        <td><?php echo $rowepay['cara_bayaran']; ?></td>
                        <td><?php echo $rowepay['dibawah']; ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('E-Pay', <?php echo $rowepay['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('E-Pay', <?php echo $rowepay['id']; ?>, <?php echo $rowepay['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
            <div class="tab-pane" id="wasiat">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="wasiat" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Makluamt Pewaris</font>
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Nama Pewaris</label>
                  <input type="text" class="form-control" id="nama_pewaris" name="nama_pewaris" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">NRIC Pewaris</label>
                  <input type="text" class="form-control" id="ic_pewaris" name="ic_pewaris" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Tel No Pewaris</label>
                  <input type="text" class="form-control" id="no_tel_pewaris" name="no_tel_pewaris" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Jenis Wasiat</label>
                    <select id="jenis_wasiat" name="jenis_wasiat" class="form-control">
                      <option value="">--Sila Pilih--</option>
                      <option value="ARB">ARB</option>
                      <option value="AST">AST</option>
                      <option value="AAB">AAB</option>
                      <option value="Individu">Individu</option>
                  </select>
                </div>
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Makluamt Pembayaran</font>
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="RM" value="" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="0" value="">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain" value="">
                </div>
                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Bayaran Yang Telah Direkodkan</font>
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>NRIC Pewaris</th>
                        <th>Nama Pewaris</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querywasiat="select mw.ic_pewaris as ic_pewaris, mw.nama_pewaris as nama_pewaris, mw.nilai_bayaran as nilai_bayaran, 
						  mw.discount as discount, mw.cara_bayaran as cara_bayaran, mw.tarikh_simpan as tarikh_simpan, mw.id as id, mc.id as id2 
						  from maklumat_wasiat mw 
						  inner join maklumat_commission mc on mc.id_gabung = mw.id 
						  where mw.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'Wasiat'";
						  $reswasiat=mysql_query($querywasiat,connect());
						  while($rowwasiat=mysql_fetch_array($reswasiat)){
					?>
                    <tr>
                    	<td><?php echo $rowwasiat['ic_pewaris']; ?></td>
                        <td><?php echo $rowwasiat['nama_pewaris']; ?></td>
                        <td><?php echo number_format($rowwasiat['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowwasiat['discount'],2); ?></td>
                        <td><?php echo $rowwasiat['cara_bayaran']; ?></td>
                        <td><?php echo trim_tarikh2($rowwasiat['tarikh_simpan']); ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('Wasiat', <?php echo $rowwasiat['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('Wasiat', <?php echo $rowwasiat['id']; ?>, <?php echo $rowwasiat['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
            <div class="tab-pane" id="pusaka">
              <form method="post" action="form_pembayaran_proses.php">
                <input type="hidden" name="jenis" id="jenis" value="pusaka" />
                <input type="hidden" name="id_maklumat_asas" id="id_maklumat_asas" value="<?php echo $id; ?>" />
                <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pusaka</font>
                <div class="form-inline">
                  <div class="form-group">
                    <label for="name">Di bawah</label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Individu">
                      Individu </label>
                    <label class="radio-inline">
                      <input type="radio" name="dibawah" id="dibawah" value="Syarikat">
                      Syarikat </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name">Nama Simati</label>
                  <input type="text" class="form-control" id="nama_simati" name="nama_simati" placeholder="" value="">
                </div>
                <div class="form-group">
                  <label for="name">NRIC Simati</label>
                  <input type="text" class="form-control" id="nric_simati" name="nric_simati" placeholder="" value="">
                </div>
                <div class="form-group">
                  <label for="name">Tarikh Kematian</label>
                  <input type="text" class="form-control" id="tarikh_kematian" name="tarikh_kematian" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Nama Penuntut</label>
                  <input type="text" class="form-control" id="nama_penuntut" name="nama_penuntut" placeholder="" value="">
                </div>
                
                <div class="form-group">
                  <label for="name">Ic Penuntut</label>
                  <input type="text" class="form-control" id="nric_penuntut" name="nric_penuntut" placeholder="" value="">
                </div>

                <div class="form-inline">
                    <div class="form-group">
                      <label for="name">Bilangan Pasangan</label>
                      <input type="text" class="form-control" id="bil_pasangan" name="bil_pasangan" placeholder="" value="">
                    </div>
                    
                    <div class="form-group">
                      <label for="name">Bilangan Anak Lelaki</label>
                      <input type="text" class="form-control" id="bil_anak_lelaki" name="bil_anak_lelaki" placeholder="" value="">
                    </div>
                </div>
                <br />
                <div class="form-inline">
                    <div class="form-group">
                      <label for="name">Bilangan Anak Perempuan</label>
                      <input type="text" class="form-control" id="bil_anak_perempuan" name="bil_anak_perempuan" placeholder="" value="">
                    </div>
                    
                    <div class="form-group">
                      <label for="name">Bilangan Adik Beradik Lelaki</label>
                      <input type="text" class="form-control" id="bil_adik_beradik_lelaki" name="bil_adik_beradik_lelaki" placeholder="" value="">
                    </div>
                </div>
                <br />
                <div class="form-inline">
                    <div class="form-group">
                      <label for="name">Bilangan Adik Beradik Perempuan</label>
                      <input type="text" class="form-control" id="bil_adik_beradik_perempuan" name="bil_adik_beradik_perempuan" placeholder="" value="">
                    </div>
                </div>
                <br />
                <div class="form-group">
                  <label for="name">Bapa Masih Hidup</label>
                  <label class="radio-inline">
                    <input type="radio" name="status_bapa" id="status_bapa" value="Ya" >
                    Ya </label>
                  <label class="radio-inline">
                    <input type="radio" name="status_bapa" id="status_bapa" value="Tidak">
                    Tidak. </label>
                </div>
                    
                <div class="form-group">
                  <label for="name">Ibu Masih Hidup</label>
                  <label class="radio-inline">
                    <input type="radio" name="status_ibu" id="status_ibu" value="Ya" >
                    Ya </label>
                  <label class="radio-inline">
                    <input type="radio" name="status_ibu" id="status_ibu" value="Tidak">
                    Tidak. </label>
                </div>

                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Maklumat Pembayaran</font>
                <div class="form-group">
                  <label for="name">Nilai Bayaran</label>
                  <input type="text" class="form-control" id="nilaibayaran" name="nilaibayaran" placeholder="" value="" required="True">
                </div>
                
                <div class="form-group">
                  <label for="name">Nilai Diskaun</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="0" value="">
                </div>
                  
                <div class="form-group">
                  <label for="name">Cara Bayaran</label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Tunai">
                    Tunai </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="Cek">
                    Cek </label>
                  <label class="radio-inline">
                    <input type="radio" name="carabayaran" id="carabayaran" value="FPX">
                    FPX </label>
                  <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Lain-Lain" value="">
                </div>
                <br />
                <i class="glyphicon glyphicon-tag"></i><font color="#0099FF" size="3">Bayaran Yang Telah Direkodkan</font>
                <table class="table table-bordered">
                	<thead>
                      <tr>
                        <th>NRIC Simati</th>
                        <th>Nama Simati</th>
                        <th>Nilai Bayaran (RM)</th>
                        <th>Nilai Diskaun (RM)</th>
                        <th>Cara Bayaran</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						  $querypusaka="select mp.nama_simati as nama_simati, mp.nric_simati as nric_simati, mp.nilai_bayaran as nilai_bayaran, 
						  mp.discount as discount, mp.cara_bayaran as cara_bayaran, mp.tarikh_simpan as tarikh_simpan, mp.id as id, mc.id as id2 
						  from maklumat_pusaka mp 
						  inner join maklumat_commission mc on mc.id_gabung = mp.id 
						  where mp.id_maklumat_asas = '".$id."' and mc.jenis_bayaran = 'Pusaka'";
						  $respusaka=mysql_query($querypusaka,connect());
						  while($rowpusaka=mysql_fetch_array($respusaka)){
					?>
                    <tr>
                    	<td><?php echo $rowpusaka['nama_simati']; ?></td>
                        <td><?php echo $rowpusaka['nric_simati']; ?></td>
                        <td><?php echo number_format($rowpusaka['nilai_bayaran'],2); ?></td>
                        <td><?php echo number_format($rowpusaka['discount'],2); ?></td>
                        <td><?php echo $rowpusaka['cara_bayaran']; ?></td>
                        <td><?php echo trim_tarikh2($rowpusaka['tarikh_simpan']); ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" onclick="viewmaklumat('Pusaka', <?php echo $rowpusaka['id']; ?>)"/>
                        	<a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat('Pusaka', <?php echo $rowpusaka['id']; ?>, <?php echo $rowpusaka['id2']; ?>)"/>
                        </td> 
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p>
                  <button type="submit" class="btn btn-success">Simpan <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
