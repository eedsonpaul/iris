<?php
	require_once 'connect_to_database.php';
	//require_once '../cssandstuff/general_functions.php';
	
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
			if($row['class_type']=="lab" or strcasecmp($row['course_code'],"PE")==0 or strcasecmp($row[0],"cwts")==0 or strcasecmp($row['course_code'],"NSTP")==0) $z[1]++;
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
				else if($i==2 and (strcasecmp($row[0],"NSTP")==0 or strcasecmp($row[0],"cwts")==0 or strcasecmp($row[0],"PE")==0)) echo '('.$row[$i].')';
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
	
	function oned_array($arr)
	{
		$i=0;
		while($row = mysql_fetch_array($arr))
		{
			$a[$i] = $row;
			$i++;
		}
		return $a;
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
	
	function miscell_fees()
	{
		$q = mysql_query("select athletics,cultural,energy,internet,library,medical,registration
			from assessment_table
			where look_up=1");
		if(!$q) die('Cannot retrieve miscellaneous'.mysql_error());
		return $q;
	}
	
	//$a = mysql_fetch_array(miscell_fees());

	function student_fund()
	{
		$q = mysql_query("SELECT community_chest,publication,student_council 
			FROM `assessment_table` 
			WHERE look_up=1");
		if(!$q) die('Cannot retrieve student fund'.mysql_error());
		return $q;
	}
	
	//$a = mysql_fetch_array(student_fund());
	//print($a[0]);
	//print($a[1]);
	
	function other_fees()
	{
		$q = mysql_query("SELECT non_citizen_fee,entrance,deposit,id_fee,in_residence
			FROM `assessment_table` 
			WHERE look_up=1");
		if(!$q) die('Cannot retrieve other fees'.mysql_error());
		return $q;
	}
	
	//$a = mysql_fetch_array(other_fees());
	//print($a[0]);
	//print($a[1]);
	
	function laboratory_nstp()
	{
		$q = mysql_query("SELECT laboratory_fee,nstp_cwts 
			FROM `assessment_table` 
			WHERE look_up=1");
		if(!$q) die('Cannot retrieve laboratory fees and nstp'.mysql_error());
		return $q;
	}
	//$a = mysql_fetch_array(laboratory_nstp());
	//print($a[0]);
	//print($a[1]);
	function insert_assess_info($a,$b,$c,$d,$e,$f,$g,$h,$i)
	{
		$q = mysql_query("INSERT INTO assessment (
			student_number,
			unit_count,
			lab_count,
			non_citizen_fee,
			entrance,
			deposit,
			id_fee,
			in_residence,
			nstp,
			assessment_status
			)
			VALUES (
			'$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i','')");
		if(!$q) die('Cannot retrieve laboratory fees and nstp'.mysql_error());	
	}
	
	function retrieve_assess_info($student_number)
	{
		$q = mysql_query("SELECT unit_count,lab_count,non_citizen_fee,entrance,deposit,id_fee,in_residence,nstp 
			FROM `assessment` 
			WHERE student_number='$student_number'");
		if(!$q) die('Cannot retrieve assessment info'.mysql_error());
		return $q;
	}
	//$a = mysql_fetch_array(retrieve_assess_info('201000001'));
	//print($a[0]);
	//print($a[1]);
	
	function view_student_scholarship($student_number)
	{
		$q = mysql_query("SELECT a.scholarship_name,a.amount_shouldered 
			FROM scholarship a,student b 
			WHERE a.scholarship_id=b.scholarship_id
			and b.student_number='$student_number'");
		if(!$q) die('Cannot retrieve scholarship and amount'.mysql_query());
		return $q;
	}
	
	function retrieve_student_name($student_number)
	{
		$q = mysql_query("SELECT last_name,first_name 
			FROM student 
			WHERE student_number='$student_number'");
		if(!$q) die('Cannot retrieve scholarship and amount'.mysql_query());
		return $q;
	}
	
	function view_accountability($student_number)
	{
		$q = mysql_query("SELECT * 
			FROM accountability 
			WHERE accountability_status='pending' 
			and student_number='$student_number'");
		if(!$q) die('Cannot view accountability'.mysql_query());
		return $q;
	}
	
	function set_assessed($student_number)
	{
		$q = mysql_query("update`assessment`
			set assessment_status='assessed' 
			WHERE student_number='$student_number'");
		if(!$q) die('Cannot set Assessed'.mysql_query());
		else $r = 'Student Assessed';
		return $r;
	}
	
	function total_miscell($arr)
	{
		$i=0;
		$total=0;
		while($i<7)
		{
			$total=$total+$arr[$i++];
		}
		return $total;
	}
	
	function total_student_fund($arr)
	{
		$i=0;
		$total=0;
		while($i<3)
		{
			$total=$total+$arr[$i++];
		}
		return $total;
	}
	//echo total_miscell();
	//echo total_student_fund();
	function check_nstp($student_number)
	{
		$q = mysql_query("SELECT *
			FROM `student_status` 
			WHERE course_code='nstp'
			and student_number='$student_number'");
		if(!$q) die('Cannot check Nstp'.mysql_query());
		return $q;
	}
	
	function is_assessed($student_number)
	{
		$q = mysql_query("SELECT *
			FROM `assessment` 
			WHERE assessment_status='assessed'
			and student_number='$student_number'");
		if(!$q) die('Cannot check Nstp'.mysql_query());
		return $q;
	}
	
	function is_DOST($student_number)
	{
		$q = mysql_query("SELECT * FROM 
			student a,scholarship b 
			WHERE a.scholarship_id=b.scholarship_id
			and b.scholarship_name='DOST'
			and a.student_number='$student_number'");
		if(!$q) die('Cannot check Nstp'.mysql_query());
		return $q;
	}
	//print(mysql_numrows(is_assessed(201000000)));
	//$check_nstp = mysql_numrows(check_nstp('201012345'));
	//print(mysql_fetch_array(retrieve_assess_info(201000000)));

?>