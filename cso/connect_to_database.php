<?php

	$dbC = new DatabaseConnect();
	$dbC->connectDatabase('localhost','root','');
	$dbC->selectDatabase('db_softeng2010');
	
	class DatabaseConnect{
	
		function connectDatabase($bhost,$bname,$bpass){
			mysql_connect($bhost,$bname,$bpass) or 
			die("Error in connecting database".mysql_error());
		}
	
		function selectDatabase($database){
			mysql_select_db($database) or 
			die ("Error : Unknown Database".mysql_error());
		}
	}

?>
