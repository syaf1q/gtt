<?php
	ini_set('session.gc_maxlifetime', 10*60*60);
	session_start();
	require_once('class/trim_date.php');
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function hantar(){
		var r = confirm("Andakah anda ingin teruskan?");
		if (r == true) {
			document.getElementById("form1").submit();
		}
	}
	
	function tambah(){
		window.location.href='page.php?menushort=tambah_kedatangan';
	}
	
	function deletemaklumat(id, tran){
		var r = confirm("Adakah anda ingin buang maklumat ini?");
		if (r == true) {
			window.location.href='page.php?menushort=delete_form_dalam&id='+id+'&jenis=hqlist&tran='+tran;
		}
	}
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<div class="page-header"><h3>Senarai Pelanggan</h3></div>
        	<p class="alert alert-info"> <strong>Sila tick pada nama pelanggan dan pilih bilangan staf jika telah menerima bayaran dari agent.<br />Klik pada butang 'Selesai' jika telah selesai.</strong></p>
            <form id="form1" name="form1" method="post" action="form_terima_selesai.php">
            
            <div align="right"><button type="button" class="btn btn-primary" onclick="hantar()">Selesai <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button></div>
            <table id="example1" class="table" cellspacing="0" width="100%">
            	<button type="button" class="btn btn-success" onclick="tambah()">Tambah Maklumat Kedatangan <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Staf Yang Hadir</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						$count2=1;
						$query1="select ui.fullname as fullname, ui.id as id, ke.id as id2 from kedatangan ke inner join userinfo ui on ui.id = ke.id_userinfo where ke.date = CURDATE() and ke.active = 1";
                    	$res1 = mysql_query($query1,$con);
                    	while($rows1 = mysql_fetch_array($res1)){
					?>
                    	<tr>
                        	<td><?php echo $count2; ?></td>
                            <td><?php echo $rows1['fullname']; ?></td>
                            <td><a href="delete_maklumat_tabs.php?jenis=Kedatangan&id_kedatangan=<?php echo $rows1['id2']; ?>&name_kedatangan=<?php echo $rows1['fullname']; ?>" class="glyphicon glyphicon-remove" /></td>
                        </tr>
                    <?php $count2++; } ?>
                </tbody>
            </table>
            <br />
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Bayaran</th>
                        <th>Nilai Bayaran</th>
                        <th>Agen</th>
                        <th>Tarikah Rekod</th>
                        <th>Duit Diterima?</th>
                        <?php if($_SESSION['usertype'] == '4'){ ?>
						<th>Buang Rekod</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count1=1;
                    $query1="select ma.id as id_maklumat_asas, ma.tarikh_manual as tarikh, mp.nama_pelanggan as nama, mpr.id_userinfo_agent as agent, mc.jumlah_bayaran as jumlah_bayaran, mc.jenis_bayaran as jenis_bayaran, mc.id as idunique, mc.jenis_bil as jenis_bil, mc.id_gabung as id_gabung from maklumat_asas ma inner join maklumat_pelanggan mp on mp.id = ma.id_maklumat_pelanggan inner join maklumat_proses mpr on mpr.id_maklumat_asas = ma.id inner join maklumat_commission mc on mc.id_maklumat_asas = ma.id where mpr.stage = 2 and mc.terima_duit is null and ma.delete is null order by ma.tarikh desc";
                    $res1 = mysql_query($query1,$con);
                    while($rows1 = mysql_fetch_array($res1)){
                ?> 
                	<input type="text" id="id_maklumat_asas[<?php echo $count1; ?>]" name="id_maklumat_asas[<?php echo $count1; ?>]" value="<?php echo $rows1['id_maklumat_asas']; ?>" style="display:none"/>
                    <input type="text" id="jenis_bayaran[<?php echo $count1; ?>]" name="jenis_bayaran[<?php echo $count1; ?>]" value="<?php echo $rows1['jenis_bayaran']; ?>" style="display:none"/>
                    <input type="text" id="nilaibayaran[<?php echo $count1; ?>]" name="nilaibayaran[<?php echo $count1; ?>]" value="<?php echo $rows1['jumlah_bayaran']; ?>" style="display:none"/>
                    <input type="text" id="idunique[<?php echo $count1; ?>]" name="idunique[<?php echo $count1; ?>]" value="<?php echo $rows1['idunique']; ?>" style="display:none"/>
                    <input type="text" id="jenis_bil[<?php echo $count1; ?>]" name="jenis_bil[<?php echo $count1; ?>]" value="<?php echo $rows1['jenis_bil']; ?>" style="display:none"/>
                    <tr>
                        <td><?php echo $count1; ?></td>
                        <td><?php echo $rows1['nama']; ?></td>
                        <td><?php echo $rows1['jenis_bayaran']; ?></td>
                        <td><?php echo $rows1['jumlah_bayaran']; ?></td>
                        <td>
							<?php 
								$qeuryuser = "select * from userinfo where id = '".$rows1['agent']."'";
								$resuser = mysql_query($qeuryuser,$con);
								$rowsuser = mysql_fetch_array($resuser);
								echo $rowsuser['fullname']; ?>
                        </td>	
                        <td><?php echo trim_tarikh3($rows1['tarikh']); ?></td>
                        <td><input type="checkbox" id="terima[<?php echo $count1; ?>]" name="terima[<?php echo $count1; ?>]" /></td>
                        <?php if($_SESSION['usertype'] == '4'){ ?>
						<td><a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumat(<?php echo $rows1['id_gabung']; ?>, '<?php echo $rows1['jenis_bayaran']; ?>')"/></td>
                        <?php } ?>
                    </tr>
                <?php $count1++;} ?>
                </tbody>
            </table>
            <input type="hidden" id="bilangan" name="bilangan" value="<?php echo $count1-1; ?>" />
            </form>
		</div>
	</div>
</div>