<?php
session_start();
require_once('Connections/connection.class.php'); 
function logrecord($main_action, $menu_details, $catatan){
	
	$con=connect();
	$query="INSERT INTO log_actions (login_name, main_action, menu_details, catatan, action_date) 
	VALUES ('".$_SESSION['fullname']."', '$main_action', '$menu_details', '$catatan', now())";
		 
	mysql_query($query,$con);
	mysql_close();
	
}
?>