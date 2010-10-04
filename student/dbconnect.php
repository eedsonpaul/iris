
<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "db_softeng2010";

	//connect to database

	$con = mysql_connect($host,$user,$password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($database, $con);
	
	
?>