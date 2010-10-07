/*
 
	check if time overlaps
	parameters should be same date format
 
*/

<?php

$from = '07:30:00';
$from_compare = '08:30:00';
$to = '09:00:00';
 $to_compare =  '09:30:00';
 
intersectCheck($from, $from_compare, $to, $to_compare);

function intersectCheck($from, $from_compare, $to, $to_compare){
	$from = strtotime($from);
	$from_compare = strtotime($from_compare);
	$to = strtotime($to);
	$to_compare = strtotime($to_compare);
	$intersect = min($to, $to_compare) - max($from, $from_compare);
		if ( $intersect < 0 ) $intersect = 0;
		$overlap = $intersect / 3600;
		if ( $overlap <= 0 ):
			// There are no time conflicts
			return TRUE;
			else:
			// There is a time conflict
			// echo '<p>There is a time conflict where the times overlap by ' , $overlap , ' hours.</p>';
			return FALSE;
		endif;
}

?>