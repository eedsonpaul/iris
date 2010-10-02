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
	
	function retrieve_course($student_number)
	{
		$q	=	mysql_query("SELECT DISTINCT d.course_code,d.section_label,c.units,b.day_of_the_week,b.start_time,
				b.end_time,a.room_id,a.class_type,d.status
				FROM section a,section_schedules b,subject c,student_status d 
				WHERE d.student_number='$student_number'
				and c.course_code=d.course_code
				and b.course_code=d.course_code
				and b.section_label=d.section_label
				and a.course_code=d.course_code
				and a.section_label=d.section_label");
		if(!$q) die("Cannot Retrieve courses".mysql_error());
		return $q;
	}
	
	function retrieve_confirmed($student_number)
	{
		$q	=	mysql_query("SELECT d.course_code,d.section_label,c.units,b.day_of_the_week,b.start_time,
				b.end_time,a.room_id,a.class_type,d.status
				FROM section a,section_schedules b,subject c,student_status d 
				WHERE d.student_number='$student_number'
				and c.course_code=d.course_code
				and b.course_code=d.course_code
				and b.section_label=d.section_label
				and a.course_code=d.course_code
				and a.section_label=d.section_label
				and d.status='confirmed'");
		if(!$q) die("Cannot retrieve enrolled courses".mysql_error());
		return $q;
	}
	
	//echo mysql_numrows(retrieve_confirmed('201000000'));
	/*$t=0;
	$s=0;
	$u=retrieve_confirmed('201000000');
	while($r=mysql_fetch_array($u))
	{
		if($r['class_type']=="lec") $t=$t+$r['units'];
		else $s++;
	}
	echo $t;
	echo $s;*/
	
	function count_confirmed($q)
	{
		$z[0] = 0;
		$z[1] = 0;
		while($row=mysql_fetch_array($q))
		{
			if($row['class_type']=="lab") $z[1]++;
			else $z[0]=$z[0]+$row['units'];
		}
		return $z;
	}
	
	print_r(count_confirmed(retrieve_confirmed('201000000')));
	//echo count_confirmed(retrieve_confirmed('201000000'))[1];
	
	function retrieve_bracket_degree($student_number)
	{
		$q	=	mysql_query("select b.stfap_bracket,a.degree_program
				from student a,stfap b
				where a.stfap_bracket_id=b.stfap_bracket_id
				and a.student_number='$student_number'");
		if(!$q) die("Cannot retrieve bracket and degree.".mysql_error());
		return $q;	
	}
	
	printarray(retrieve_bracket_degree('201000000'));
	print_r(accept_multiarray(retrieve_bracket_degree('201000000')));
	print_r(print_bracket_degree(retrieve_bracket_degree('201000000')));
	
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
	
	function print_bracket_degree($arr)	//returns an array from an input mysql array	
	{
		$i=0;
		while($row = mysql_fetch_array($arr))
		{
			while($i<2)
			{
				$c[$i] = $row[$i];
				$i++;
			}
		}
		return $c;
	}
	
	function accept_multiarray($arr)	//returns an array from an input mysql array	
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
	
	function print_array($a)	//prints a multidimensional array from an input array
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
	//print_arr(accept_array(retrieve_sections('0')));
	//print_array(retrieve_sections('0'));
	//print_r(accept_array(retrieve_sections('0')));
	//printarray(retrieve_course('201000000'));
?>