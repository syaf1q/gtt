<?php session_start(); ?>
<div class="">
  <div class="widget-header"> <i class="icon-bookmark"></i>
    <h4>
      <div align="right"> <?php echo date('d M Y') ?></div>
    </h4>
    <HR>
    <h3>
      <div> <i class="glyphicon glyphicon-tag"></i> Menu</div>
    </h3>
    <BR>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=form_pembayaran_main"><img src="img/pembayaran.png" alt="Rekod Pembayaran"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-usd"><font color="#009933"> Rekod Pembayaran</font></h3>
          <p>Sila gunakan menu ini jika ingin merekodkan pembayaran. Maklumat-maklumat pembayaran yang telah selesai akan di hantar ke HQ</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=semakan_pembayaran_main"><img src="img/semakan.jpg" alt="Semakan Pembayaran"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-search"><font color="#FF00FF"> Semakan Pembayaran</font></h3>
          <p>Sila gunakan menu ini jika ingin menyemak semula maklumat-maklumat sebelum di hantar ke HQ.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=senarai_pembayaran_main"><img src="img/senarai bayaran.jpg" alt="Senarai Pembayaran"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-list-alt"><font color="#6666CC"> Senarai Pembayaran</font></h3>
          <p>Sila gunakan menu ini jika ingin membuat carian maklumat yang telah di hantar ke HQ. Semua transaksi dapat dilihat di menu ini</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  	<div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=carian_maklumat_main"><img src="img/carianmaklumat.jpg" alt="Carian Maklumat"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-briefcase"><font color="#009933"> Carian Rekod Maklumat</font></h3>
          <p>Menu ini digunakan untuk membuat carian maklumat-maklumat pelanggan. Carian boleh dibuat dari maklumat No Kad Pengenalan, Nama, No Kenderaan , No Polisi & No Bill </p>
        </div>
      </div>
    </div>
    <?php if($_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '4'){ ?>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=rekod_duit_keluar"><img src="img/transfer.jpg" alt="Rekod Duit Keluar eServices"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-usd"><font color="#009933"> Rekod Duit Keluar</font></h3>
          <p>Menu ini digunakan untuk merekodkan duit keluar</p>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '4'){ ?>
  	<div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=senarai_laporan"><img src="img/report.jpg" alt="Laporan eServices"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-book"><font color="#009933"> Senarai Laporan</font></h3>
          <p>Untuk menyemak laporan pembayaran, komisen dan etc</p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  
</div>
