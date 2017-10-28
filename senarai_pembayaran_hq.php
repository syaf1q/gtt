<?php
	session_start();
	require_once('class/trim_date.php');
	
	if($_SESSION['usertype'] == '3'){
		$ut=$_SESSION['id'];
	}else if($_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '4'){
		$ut="%";
	}
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<div class="page-header"><h3>Senarai Pembayaran</h3></div>
        	<p class="alert alert-info"> <strong>Semakan komisen</strong></p>
            <form id="form1" name="form1" method="post" action="#">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Bayaran</th>
                        <th>Nilai Bayaran</th>
                        <th>Agen</th>
                        <th>Tarikh Direkodkan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count1=1;
                    $query1="select ma.id as id_maklumat_asas, ma.tarikh_manual as tarikh, mp.nama_pelanggan as nama, mpr.id_userinfo_agent as agent, mc.jumlah_bayaran as jumlah_bayaran, mc.jenis_bayaran as jenis_bayaran, mc.id as idunique from maklumat_asas ma inner join maklumat_pelanggan mp on mp.id = ma.id_maklumat_pelanggan inner join maklumat_proses mpr on mpr.id_maklumat_asas = ma.id inner join maklumat_commission mc on mc.id_maklumat_asas = ma.id where mpr.stage = 2 and mc.terima_duit is not null and ma.delete is null and mpr.id_userinfo_agent like '$ut' order by mc.tarikh_simpan desc";
                    $res1 = mysql_query($query1,$con);
                    while($rows1 = mysql_fetch_array($res1)){
                ?> 
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
                        <td>
                        	<a href="page.php?menushort=senarai_pembayaran_details&nama=<?php echo $rows1['nama']; ?>&id=<?php echo $rows1['id_maklumat_asas']; ?>&jenisbayaran=<?php echo $rows1['jenis_bayaran']; ?>&agent=<?php echo $rowsuser['fullname']; ?>&idunique=<?php echo $rows1['idunique']; ?>" class="glyphicon glyphicon-search" />
                        </td>
                    </tr>
                <?php $count1++;} ?>
                </tbody>
            </table>
            </form>
		</div>
	</div>
</div>