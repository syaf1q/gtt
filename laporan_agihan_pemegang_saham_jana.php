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
	
?>
<div align="center">Laporan Agihan Pemegang Saham Dari <?php echo $tarikh_mula; ?> Hingga <?php echo $tarikh_tamat; ?></div><br />
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
        <td>Rahimah</td>
        <td>Peratus Rahimah</td>
        <td>Hamdan Aziz</td>
        <td>Peratus Hamdan Aziz</td>
        <td>Abu Bakar Abd Halim</td>
		<td>Peratus Abu Bakar Abd Halim</td>
		<td>Shamrul Sihar</td>
		<td>Peratus Shamrul Sihar</td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select sum(pemegang_saham) as sumpemegangsaham from maklumat_commission WHERE terima_duit = 1 and tarikh_simpan BETWEEN '$tarikh_mula_baru' and '$tarikh_tamat_baru'";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){
		  $sumpemegangsaham = $rows['sumpemegangsaham'];
		  $sumpemegangsaham1 = round($sumpemegangsaham,2);
		  
		  $rahimah_view = (229000/400000)*100;
		  $rahimah_view = round($rahimah_view,2);

		  $hamdan_view = (120000/400000)*100;
		  $hamdan_view = round($hamdan_view,2);

		  $abubakar_view = (40000/400000)*100;
		  $abubakar_view = round($abubakar_view,2);

		  $shamrul_view = (11000/400000)*100;
		  $shamrul_view = round($shamrul_view,2);

		  $rahimah = 229000/400000;
		  $hamdan = 120000/400000;
		  $abubakar = 40000/400000;
		  $shamrul = 11000/400000;

		  $kom_rahimah = $sumpemegangsaham1 * $rahimah;
		  $kom_rahimah = round($kom_rahimah,2);

		  $kom_hamdan = $sumpemegangsaham1 * $hamdan;
		  $kom_hamdan = round($kom_hamdan,2);

		  $kom_abubakar = $sumpemegangsaham1 * $abubakar;
		  $kom_abubakar = round($kom_abubakar,2);

		  $kom_shamrul = $sumpemegangsaham1 * $shamrul;
		  $kom_shamrul = round($kom_shamrul,2);
	  }
	?>
    <tr>
    	<td>RM <?php echo $kom_rahimah; ?></td>
        <td><?php echo $rahimah_view; ?> %</td>
        <td>RM <?php echo $kom_hamdan; ?></td>
        <td><?php echo $hamdan_view; ?> %</td>
		<td>RM <?php echo $kom_abubakar; ?></td>
		<td><?php echo $abubakar_view; ?> %</td>
		<td>RM <?php echo $kom_shamrul; ?></td>
        <td><?php echo $shamrul_view; ?> %</td>
    </tr>
</table>
