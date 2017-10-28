<?php 
session_start();
include('log_action.php'); 
logrecord('Logout', 'Log Out Keluar', 'Log Keluar = '.$_SESSION['fullname']);
session_destroy();
echo "<script>window.location.href=\"index.php\"</script>";
?>