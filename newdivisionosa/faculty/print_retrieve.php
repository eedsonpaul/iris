<?php
	require_once '../cssandstuff/dbconnect.php';
	function retrieve_sections($emp_id)
	{
		$q = 	mysql_query("SELECT course_code, section_label
				FROM section
				WHERE employee_id =  '$emp_id'");
		if(!$q) die("Cannot Retrieve sections".mysql_error());
		return $q;
	}
	
	function printarray($arr)	//prints a multidimensional array from an input mysql row
	{
		$i=0;
		while($row = mysql_fetch_array($arr))
		{
			while($i<sizeof($row))
			{
				echo $row[$i]."  ";
				$i++;
			}
			echo '</br>';
			$i=0;
		}
	}
	
	function array_contain($arr)	//returns an array from an input mysql array	
	{
		$i=0;
		$j=0;
		while($row = mysql_fetch_array($arr))
		{
			while($i<sizeof($row))
			{
				$c[$j][$i] = $row[$i];
				$i++;
			}
			$i=0;
			$j++;
		}
		return $c;
	}
	
	function print_arr($a)	//prints a multidimensional array from an input array
	{
		$i=0;
		$j=0;
		while($i<sizeof($a))
		{
			while($j<sizeof($a[$i]))
			{
				echo $a[$i][$j]." ";
				$j++;
			}
			$j=0;
			$i++;
			echo "</br>";
		}
	}
	//print(retrieve_sections('0'));
	//print_arr(array_contain(retrieve_sections('0')));
	//printarray(retrieve_sections('0'));
?>