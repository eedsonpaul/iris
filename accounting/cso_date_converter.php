<?php
	class dateConverter {
		
		function dateConvert($original) {
    		$timestamp = mktime(0,0,0, substr($original, 4, 2), substr($original, 6), substr($original, 0, 4));
  		 	$date = date('j F Y', $timestamp);
			
			return $date;
		}
	}

?>