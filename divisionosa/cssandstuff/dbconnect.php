<?php
	/*unset($db_failed);
	if(mysql_connect("localhost","root")) mysql_select_db("animals") or $db_failed = mysql_error();
	else $db_failed="Could not connect to database.";
	if(isset($db_failed)) echo $dbfailed;*/
	/*function connect_db()
	{
		mysql_connect("localhost","root") or die("could not connect");
		mysql_select_db("db_softeng2010") or die("could not select database");
	}*/
	define('SQL_USER','localhost');
	define('SQL_PASS','root');
	define('SQL_DB','db_softeng2010');

	$conn = mysql_connect(SQL_USER, SQL_PASS)
		or die('Could not connect to the database; ' . mysql_error());
	
	mysql_select_db(SQL_DB, $conn)
		or die('Could not select database; ' . mysql_error());
?>