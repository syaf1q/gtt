<?php
	session_start();
	require_once('class/trim_date.php');
	
	$ut=$_SESSION['id'];
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function deletemaklumatasas(id){
		window.location.href='page.php?menushort=delete_form_dalam&id='+id+'&jenis=asas';
	}
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<div class="page-header"><h3>Senarai Pelanggan</h3></div>
        	<p class="alert alert-info"> <strong>Sila klik pada nama pelanggan	(hyperlink) untuk menyambung semula proses merekod makluamat pembayaran.</strong></p>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Pelanggan</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count1=1;
                    $query1="select ma.id as id_maklumat_asas, ma.tarikh_manual as tarikh, mp.nama_pelanggan as nama from maklumat_asas ma inner join maklumat_pelanggan mp on mp.id = ma.id_maklumat_pelanggan inner join maklumat_proses mpr on mpr.id_maklumat_asas = ma.id where mpr.stage = 1 and mpr.id_userinfo_agent = '".$_SESSION['id']."' and ma.delete is null and mpr.id_userinfo_agent = '$ut'";
                    $res1 = mysql_query($query1,$con);
                    while($rows1 = mysql_fetch_array($res1)){
                ?> 
                
                    <tr>
                        <td><?php echo $count1++; ?></td>
                        <td><a href="page.php?menushort=pembayaran&id=<?php echo $rows1['id_maklumat_asas'];?>&nama_pelanggan=<?php echo $rows1['nama']; ?>"><?php echo $rows1['nama']; ?></a></td>
                        <td><?php echo trim_tarikh3($rows1['tarikh']); ?></td>
                        <td><a href="#" class="glyphicon glyphicon-trash" onclick="deletemaklumatasas('<?php echo $rows1['id_maklumat_asas'];?>')"/></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
		</div>
	</div>
</div>