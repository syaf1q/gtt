<?php
	
	define("HOSTNAME","202.75.55.138:3306");
	define("USERNAME","albarrco_root");
	define("PASSWORD","12345678");
	define("DB_NAME","albarrco_eservices");
	
	function connect()
	{
		$con = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
		
		if(!$con)
		{
			die("Unable to connect!");
		}
		if(!mysql_select_db(DB_NAME,$con))
		{
			die("Unable to locate database!");
		}
		
		return $con;
	}
	
?>