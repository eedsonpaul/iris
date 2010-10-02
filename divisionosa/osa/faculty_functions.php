<?php
	require_once '../cssandstuff/dbconnect.php';
	require_once '../cssandstuff/general_functions.php';
	
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
	
	function retrieve_account($student_number)
	{
		$q	=	mysql_query("SELECT d.student_number, d.last_name, d.first_name, a.accountability_type, b.details, b.amount_due, b.year_incurred, c.semester_type
				FROM student d, semester_mapping c, accountability b, accountability_type a
				WHERE b.accountability_type_id = a.accountability_type_id
				AND b.accountability_status = 'pending'
				AND c.semester_id = b.semester_incurred
				AND b.student_number = d.student_number
				and d.student_number='$student_number'");
		if(!$q) die("Cannot Retrieve Accountability".mysql_error());
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
	
	function retrieve_bracket_degree($student_number)
	{
		$q	=	mysql_query("select b.stfap_bracket,a.degree_program
				from student a,stfap b
				where a.stfap_bracket_id=b.stfap_bracket_id
				and a.student_number='$student_number'");
		if(!$q) die("Cannot retrieve bracket and degree.".mysql_error());
		return $q;	
	}
	
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
	
	//echo mysql_numrows(retrieve_confirmed('201000000'));
	
	function print_table_account($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<tr>';
			while($i<8)//sizeof($row)
			{
				echo '<td>';
				if($i==1)
				{
					echo $row[$i].", ".$row[$i+1];
					$i++;
				}
				else if($i==6) {
					echo ($row[$i]-1)."-".$row[$i];
					echo "/".$row[$i+1];
					$i++;
				}
				else echo $row[$i]." ";
				$i++;
				echo '</td>';
			}
			$i=0;
			echo "</tr>";
		}
	}
	
	function print_table_course($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<tr>';
			while($i<9)//sizeof($row)
			{
				echo '<td>';
				if($i==2 and $row[7]=="lab") echo "-";
				else if($i==4)
				{
					echo $row[$i]."-".$row[$i+1];
					$i++;
				}
				else echo $row[$i]." ";
				$i++;
				echo '</td>';
			}
			$i=0;
			echo "</tr>";
		}
	}
	
	function print_bracket_degree($arr)	//returns an array containing stafp bracket and degree program from an input mysql array	
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
	
	function accept_array($arr)	//returns an array from an input mysql array	
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
	
	function print_coursecode_label($p)
	{
		return accept_array(retrieve_sections($p));
	}
	
	function search_handled_sections($employee_id)
	{
		$q = mysql_query("SELECT a.course_code, a.section_label, c.units, d.day_of_the_week, d.start_time, d.end_time, a.room_id, a.class_type
			FROM section a, employee b, subject c, section_schedules d
			WHERE a.employee_id = b.employee_id
			AND b.designation_id =2
			AND a.course_code = c.course_code
			AND c.course_code = d.course_code
			AND a.section_label = d.section_label
			AND c.abolished =0
			AND b.employee_id = '$employee_id'");
		if(!$q) die('Cannot search handled sections'.mysql_error());
		return $q;
	}
	
	function print_table_handled_sections($a,$b)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_faculty.php method=post><tr>';
			while($i<8)
			{
				echo '<td>';
				if($i==4)
				{
					echo $row[$i].' - '.$row[$i+1];
					$i++;
				}
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=course_code value='.$row[0].'>';
			echo '<input type=hidden name=section_label value='.$row[1].'>';
			echo '<input type=hidden name=employee_id value='.$b.'>';
			echo "<td><input type=submit name=action value='Handle Grades'></td>";
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function display_enrolled_students($a,$b)
	{
		$q = mysql_query("SELECT a.student_number
			FROM student_status a
			WHERE a.status = 'enrolled'
			AND a.course_code = '$a'
			AND a.section_label = '$b'");
		if(!$q) die('Cannot display enrolled students'.mysql_error());
		return $q;
	}
	
	function print_enrolled_students($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_faculty.php method=post><tr>';
			while($i<3)
			{
				echo '<td>';
				if($i==4)
				{
					echo $row[$i].' - '.$row[$i+1];
					$i++;
				}
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=course_code value='.$row[0].'>';
			echo '<input type=hidden name=section_label value='.$row[1].'>';
			echo '<input type=hidden name=employee_id value='.$b.'>';
			echo "<td><input type=submit name=action value='Handle Grades'></td>";
			$i=0;
			echo "</tr></form>";
		}
	}
?>