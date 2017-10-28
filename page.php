<?php
	extract($_REQUEST);
	include('Connections/connection.class.php');
	$con = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eServices</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
<link rel="stylesheet" href="assets/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/datepicker.css">
<link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="plugins/fancybox/jquery.fancybox.pack.js"></script>
</head>
<?php include('topmenu.php'); ?>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
	  		$querymenu = "select * from menu_list where menu_short = '$menushort'";
			$resmenu = mysql_query($querymenu,$con);
			$rowsmenu = mysql_fetch_array($resmenu);
			$open = $rowsmenu['menu_url'];
	  ?>
      <?php include($open);?>
    </div>
  </div>
</div>
</body>
</html>