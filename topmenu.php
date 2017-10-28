<?php session_start(); ?>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="page.php?menushort=dashboard"><img src="img/Logo-ALB.png" alt="Logo" height="30"/></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['usertype'] == '4' || $_SESSION['usertype'] == '2' || $_SESSION['usertype'] == '1'){ ?><li> <a href="page.php?menushort=hqlist"> <span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a> </li> <?php } ?>
        <?php if($_SESSION['usertype'] == '1'){ ?>
        <li> <a href="page.php?menushort=senarai_pengguna_main"> Selamat Datang <strong><?php echo $_SESSION['fullname'];?></strong><br /><font color="#FF0000" size="3">Cawangan <?php echo $_SESSION['branch'];?></font></a></li>
        <?php }else{ ?>
        <li> <a href="#"> Selamat Datang <strong><?php echo $_SESSION['fullname'];?></strong><br /><font color="#FF0000" size="3">Cawangan <?php echo $_SESSION['branch'];?></font></a></li>
        <?php } ?>
        <li> <a href="logout.php"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Keluar </a> </li>
        
      </ul>
    </div>
  </div>
</nav>
