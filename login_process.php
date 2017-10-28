<?php
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	include('log_action.php'); 
?>
<body bgcolor="#fff">
<?php		
	
	if($username == '' || $password == '' || $branch == ''){ ?>
		<script>
		alert('Maklumat tidak lengkap.');
		setTimeout("location.href = 'index.php';",0);
		</script>
<?php
	}else{
	
	
	$sql="select * from userinfo where username = '$username' and password = '$password' and active = 1";
	$query=mysql_query($sql,connect());
	$row=mysql_fetch_array($query);
	$count=mysql_num_rows($query);
	 
	if($count>0){
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$password;
		$_SESSION['fullname']=$row['fullname'];
		$_SESSION['icno']=$row['icno'];
		$_SESSION['usertype']=$row['usertype'];
		$_SESSION['premier']=$row['premier'];
		$_SESSION['branch']=$branch;
		
		logrecord('Login', 'Log In Masuk', 'Log Masuk = '.$row['fullname']);
?>
	<table width="100%">
        <tr>
            <td align="center"><img src="img/loading.gif" border="0" /></td>
        </tr>
    </table>
		<script type="text/JavaScript">
		setTimeout("location.href = 'page.php?menushort=dashboard';",1500);
		</script>
<?php		
	}
	else{?>
		<script>
		alert('Nama pengguna atau kata laluan yang anda masukkan tidak sah. Sila cuba lagi.');
		setTimeout("location.href = 'index.php';",0);
		</script>
		<?php
	}
	}
?>
</body>