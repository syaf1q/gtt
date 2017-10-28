<?php
	require_once('class/trim_date.php');
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        	<p class="alert alert-info"> <strong>Senarai carian maklumat pelanggan</strong></p>
            <form id="form1" name="form1" method="post" action="#">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama</th>
                        <th>NRIC/No Daftar Syarikat</th>
                        <th>No Kenderaan</th>
                        <th>No Polisi</th>
                        <th>No Bil</th>
                        <th>Jenis Bil</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count1=1;
                    $query1="select rs.name as name, rs.nric_company as nric_company, rs.reg_car_no as reg_car_no, rs.policy_no as policy_no, rs.bill_no as bill_no, rs.jenis_bill as jenis_bill from rekod_servis rs inner join maklumat_asas ma on ma.id=rs.id_service inner join maklumat_pelanggan mp on mp.id=ma.id_maklumat_pelanggan where ";
					if($optionsRadios == 'nric'){
						$query2="mp.no_kp_pelanggan like '%".$nric."%' ";
					}
					if($optionsRadios == 'name'){
						$query2="mp.nama_pelanggan like '%".$name."%' ";
					}
					$query=$query1.$query2;
					//echo $query;
                    $res1 = mysql_query($query,$con);
                    while($rows1 = mysql_fetch_array($res1)){
                ?> 
                    <tr>
                        <td><?php echo $count1; ?></td>
                        <td><?php echo $rows1['name']; ?></td>
                        <td><?php echo $rows1['nric_company']; ?></td>
                        <td><?php echo $rows1['reg_car_no']; ?></td>
                        <td><?php echo $rows1['policy_no']; ?></td>
                        <td><?php echo $rows1['bill_no']; ?></td>
                        <td><?php echo $rows1['jenis_bill']; ?></td>
                        <td>
                        	<a href="#" class="glyphicon glyphicon-search" />
                        </td>
                    </tr>
                <?php $count1++;} ?>
                </tbody>
            </table>
            </form>
		</div>
	</div>
</div>