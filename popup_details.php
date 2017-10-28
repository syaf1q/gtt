<?php
	extract($_REQUEST);
	session_start();
	
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
	$queryuser = "select ui.premier as premier from userinfo ui inner join maklumat_proses mp on mp.id_userinfo_agent = ui.id where mp.id_maklumat_asas='$id'";
	$resuser = mysql_query($queryuser,$con);
	$rowsuser = mysql_fetch_array($resuser);
?>
<script>
	function goBack() {
		window.location.href='page.php?menushort=senarai_pembayaran_main';
	}
</script>
<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<div class="page-header"><h3>Maklumat Pembayaran <?php echo $nama; ?><br /> Agen : <?php echo $agent; ?> (<?php echo $rowsuser['premier']; ?>%) || Servis : <?php echo $jenisbayaran; ?></h3></div>
        	<div class="row">
				<?php 
					/*
					if($jenisbayaran == 'Takaful/Insurance'){
                    	$querymaklumat="select * from maklumat_asas ma inner join maklumat_commission tf on tf.id_maklumat_asas = ma.id inner join maklumat_takaful mt on mt.id_maklumat_asas = ma.id where tf.id_maklumat_asas = '$id' and tf.jenis_bayaran = '$jenisbayaran' and ma.delete is null";
					}else if($jenisbayaran == 'Life Takaful'){
						echo $querymaklumat="select * from maklumat_commission tf inner join maklumat_life mt on mt.id = tf.id_gabung where tf.id = '$idunique' and tf.jenis_bayaran = 'Life Takaful'";
					}else if($jenisbayaran == 'MyeG'){
						$querymaklumat="select * from maklumat_asas ma inner join maklumat_commission tf on tf.id_maklumat_asas = ma.id inner join maklumat_myeg mt on mt.id_maklumat_asas = ma.id where tf.id_maklumat_asas = '$id' and tf.jenis_bayaran = '$jenisbayaran' and ma.delete is null";
					}else if($jenisbayaran == 'BSN'){
						$querymaklumat="select * from maklumat_commission mc where mc.id = '$idunique'";
					}else if($jenisbayaran == 'E-Pay'){
						$querymaklumat="select * from maklumat_commission mc where mc.id = '$idunique'";
					}else if($jenisbayaran == 'Wasiat'){
						$querymaklumat="select * from maklumat_asas ma inner join maklumat_commission tf on tf.id_maklumat_asas = ma.id inner join maklumat_wasiat mt on mt.id_maklumat_asas = ma.id where tf.id_maklumat_asas = '$id' and tf.jenis_bayaran = '$jenisbayaran' and ma.delete is null";
					}else if($jenisbayaran == 'Pusaka'){
						$querymaklumat="select * from maklumat_asas ma inner join maklumat_commission tf on tf.id_maklumat_asas = ma.id inner join maklumat_pusaka mt on mt.id_maklumat_asas = ma.id where tf.id_maklumat_asas = '$id' and tf.jenis_bayaran = '$jenisbayaran' and ma.delete is null";
					}
					*/
					$querymaklumat="select * from maklumat_commission mc where mc.id = '$idunique'";
                    $resmaklumat = mysql_query($querymaklumat,$con);
                    $rowsmaklumat = mysql_fetch_array($resmaklumat);
                ?>
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Jumlah Bayaran (RM)</th>
                    <?php if($rowsmaklumat['tax'] != null){ ?>
                    <th>Tax (RM)</th>
                    <?php } ?>
                    <th>Discount (RM)</th>
                    <th>Jumlah Keseluruhan (RM)</th>
                    <th>Komisen Agen (RM)</th>
                    <?php if($_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '4'){?>
                    <th>Komisen Staf (RM)</th>
                    <?php } ?>
                    <?php if($_SESSION['usertype'] == '4' || $_SESSION['usertype'] == '1'){?>
                    <th>Zakat (RM)</th>
                    <th>Pentadbiran (RM)</th>
                    <th>Pemegang Saham (RM)</th>
                    <?php } ?>
                    <th>Tarikh Bayaran Di Rekodkan</th>
                  </tr>
                </thead>
                <tbody>
                	
                  <tr>
                    <td><?php echo number_format($rowsmaklumat['jumlah_bayaran'],2); ?></td>
                    <?php if($rowsmaklumat['tax'] != null){ ?>
                    <td><?php echo number_format($rowsmaklumat['tax'],2); ?></td>
                    <?php } ?>
                    <td><?php echo number_format($rowsmaklumat['discount'],2); ?></td>
                    <td><?php echo number_format($rowsmaklumat['jumlah_keseluruhan'],2); ?></td>
                    <td><?php echo number_format($rowsmaklumat['agent'],2); ?></td>
                    <?php if($_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '4'){?>
                    <td><?php echo number_format($rowsmaklumat['staf'],2); ?></td>
                    <?php } ?>
                    <?php if($_SESSION['usertype'] == '4' || $_SESSION['usertype'] == '1'){?>
                    <td><?php echo number_format($rowsmaklumat['zakat'],2); ?></td>
                    <td><?php echo number_format($rowsmaklumat['pentadbiran'],2); ?></td>
                    <td><?php echo number_format($rowsmaklumat['pemegang_saham'],2); ?></td>
                    <?php } ?>
                    <td><?php echo trim_tarikh3($rowsmaklumat['tarikh_simpan']); ?></td>
                  </tr>
                  
                </tbody>
                </table>
            </div>
            <div class="row">
                <div align="right"><button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button></div>
            </div>
        </div>
	</div>
</div>