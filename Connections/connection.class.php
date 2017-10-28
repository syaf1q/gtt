<?php
	
	define("HOSTNAME","localhost:3307");
	define("USERNAME","root");
	define("PASSWORD","root");
	define("DB_NAME","myservice2");
	
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