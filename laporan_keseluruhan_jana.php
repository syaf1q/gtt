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
	
	$query1="select * from userinfo where id = '$agent'";
	$res1=mysql_query($query1,connect());
	$rows1=mysql_fetch_array($res1);
	if($rows1['fullname'] == ""){
		$agentnama = 'Semua';
	}else{
		$agentnama = $rows1['fullname'];
	}
?>
<div align="center">Laporan Keseluruhan Dari <?php echo $tarikh_mula; ?> Hingga <?php echo $tarikh_tamat; ?> Bagi Agen <?php echo $agentnama; ?> </div><br />
<?php if($transaksi == 'BSN'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Jenis Bil</td>
        <td>Catatan Bil</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.jenis_bil, mb.catatan_bil, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname 
	  from maklumat_bsn mb 
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['jenis_bil']; ?></td>
        <td><?php echo $rows['catatan_bil']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>

<?php if($transaksi == 'Takaful/Insurance'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Nama</td>
        <td>Agensi</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.person_covered, mb.agensi, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname 
	  from maklumat_takaful mb  
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['person_covered']; ?></td>
        <td><?php echo $rows['agensi']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>

<?php if($transaksi == 'MyeG'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Nama</td>
        <td>No Kenderaan</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.name_owner, mb.no_kenderaan, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname
	  from maklumat_myeg mb  
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['name_owner']; ?></td>
        <td><?php echo $rows['no_kenderaan']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>

<?php if($transaksi == 'E-Pay'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Jenis Bil</td>
        <td>Catatan Bil</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.jenis_bil, mb.catatan_bil, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname
	  from maklumat_epay mb  
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['jenis_bil']; ?></td>
        <td><?php echo $rows['catatan_bil']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>

<?php if($transaksi == 'Wasiat'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Nama Pewaris</td>
        <td>Ic Pewaris</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.nama_pewaris, mb.ic_pewaris, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname 
	  from maklumat_wasiat mb  
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['nama_pewaris']; ?></td>
        <td><?php echo $rows['ic_pewaris']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>

<?php if($transaksi == 'Pusaka'){ ?>
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td>No</td>
        <td>Nama Simati</td>
        <td>Ic Simati</td>
        <td>Jenis Transaksi</td>
        <td>Cara Bayaran</td>
        <td>Tarikh Rekod Maklumat</td>
        <td>Tarikh Penerimaan Duit</td>
        <td>Jumlah Pembayaran (RM)</td>
        <td>Diskaun (RM)</td>
        <td>Agen</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select mb.nama_simati, mb.nric_simati, mc.jenis_bayaran, mb.cara_bayaran, mb.nilai_bayaran, mb.discount, ma.tarikh_manual, mc.tarikh_simpan, ui.fullname  
	  from maklumat_pusaka mb  
	  inner join maklumat_commission mc on mc.id_gabung = mb.id
	  inner join maklumat_proses mp on mp.id_maklumat_asas = mb.id_maklumat_asas
	  inner join maklumat_asas ma on ma.id = mc.id_maklumat_asas
	  inner join userinfo ui on ui.id = mc.id_userinfo_hq
	  where mc.jenis_bayaran like '$transaksi' and mp.id_userinfo_agent like '$agent' and mc.branch like '$cawangan' and mc.tarikh_simpan between '$tarikh_mula_baru' and '$tarikh_tamat_baru' and terima_duit = 1";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $jumlah_keseluruhan = $jumlah_keseluruhan + $rows['nilai_bayaran'];
	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['nama_simati']; ?></td>
        <td><?php echo $rows['nric_simati']; ?></td>
        <td><?php echo $rows['jenis_bayaran']; ?></td>
        <td><?php echo $rows['cara_bayaran']; ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_manual']); ?></td>
        <td><?php echo trim_tarikh3($rows['tarikh_simpan']); ?></td>
        <td><?php echo $rows['nilai_bayaran']; ?></td>
        <td><?php echo $rows['discount']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
    </tr>
    <?php $count1++; } ?>
    <tr>
    	<td colspan="7" align="center">Jumlah</td>
        <td><?php echo number_format($jumlah_keseluruhan, 2, '.', ''); ?></td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
    </tr>
</table>
<?php } ?>