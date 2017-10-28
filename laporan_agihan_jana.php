<?php
	ini_set('session.gc_maxlifetime', 10*60*60);
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	require_once('class/trim_date.php');
	$con = connect();
	
	$dm=substr($tarikh_mula,0,2);
	$mm=substr($tarikh_mula,3,2);
	$ym=substr($tarikh_mula,6,4);
	$tarikh_mula_baru=$ym.'-'.$mm.'-'.$dm;

	
	$dt=substr($tarikh_tamat,0,2);
	$mt=substr($tarikh_tamat,3,2);
	$yt=substr($tarikh_tamat,6,4);
	$tarikh_tamat_baru=$yt.'-'.$mt.'-'.$dt;
	
	if($cawangan == "%"){
		$cawangannama = 'Semua Cawangan';
	}else{
		$cawangannama = 'Cawangan '.$cawangan;
	}
?>
<div align="center">Laporan Agihan Dari <?php echo $tarikh_mula; ?> Hingga <?php echo $tarikh_tamat; ?> Bagi <?php echo $cawangannama; ?> </div><br />
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Jenis Transaksi</td>
        <td>Cawangan</td>
        <td>Jumlah Terimaan (RM)</td>
        <td>Diskaun</td>
        <td>Nama Penerima</td>
		<td>Komisen Agen</td>
		<td>Komisen Staf</td>
		<td>Agihan Zakat</td>
		<td>Agihan Pemegang Saham</td>
		<td>Agihan Pentadbiran</td>
		<td>Tarikh Terimaan Duit</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mc.jenis_bayaran as jenis_bayaran, mc.branch as branch, mc.jumlah_bayaran as jumlahbayaran, mc.discount as discount, mc.agent as agen, mc.zakat as zakat, mc.pentadbiran as pentadbiran, mc.staf as staf, mc.pemegang_saham as pemegang_saham, ui.fullname as fullname, mc.tarikh_simpan as tarikh_simpan
	  from maklumat_commission mc 
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq 
	  where ui.id like '$staf' and mc.branch like '$cawangan' and mc.terima_duit = 1 and mc.tarikh_simpan BETWEEN '$tarikh_mula_baru' and '$tarikh_tamat_baru' and mc.jenis_bayaran like '$transaksi'";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_agen = $jumlah_agen + $rows['agen'];
		  $jumlah_zakat = $jumlah_zakat + $rows['zakat'];
		  $jumlah_pentadbiran = $jumlah_pentadbiran + $rows['pentadbiran'];
		  $jumlah_staf = $jumlah_staf + $rows['staf'];
		  $jumlah_pemegang_saham = $jumlah_pemegang_saham + $rows['pemegang_saham'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['branch']; ?></td>
        <td><?php echo $rows['jumlahbayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
		<td><?php echo number_format($rows['agen'], 2, '.', ''); ?></td>
		<td><?php echo number_format($rows['staf'], 2, '.', ''); ?></td>
        <td><?php echo number_format($rows['zakat'], 2, '.', ''); ?></td>
		<td><?php echo number_format($rows['jumlah_pemegang_saham'], 2, '.', ''); ?></td>
		<td><?php echo number_format($rows['pentadbiran'], 2, '.', ''); ?></td>
		<td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="6" align="center"></td>
        <td><?php echo number_format($jumlah_agen, 2, '.', ''); ?></td>
        <td><?php echo number_format($jumlah_staf, 2, '.', ''); ?></td>
		<td><?php echo number_format($jumlah_zakat, 2, '.', ''); ?></td>
		<td><?php echo number_format($jumlah_pemegang_saham, 2, '.', ''); ?></td>
		<td><?php echo number_format($jumlah_pentadbiran, 2, '.', ''); ?></td>
		<td>&nbsp;</td>
    </tr>
</table>
