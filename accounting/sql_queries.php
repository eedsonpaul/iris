<?php
	
	$query = null;
	$result = null;

	class SqlQueries{
	
		function querySql($sqlquery){
			$query = $sqlquery;
			$result = mysql_query($query);
			
			return $result;
		}
		
	}


?>