<?php
	include("../cssandstuff/dbconnect.php");
	include("../cssandstuff/general_functions.php");
	/*function add_subject($s)
	{
		connect_db();
		mysql_query("insert into osa_subject values ('".$s->sub_num."','".$s->sub_name."','".$s->sub_title."','".$s->course_code."','".$s->credited."','".$s->numeric_grades."','".$s->repeatable_to."','".$s->date_proposed."','".$s->date_approved."','".$s->date_first."','".$s->date_revision."','".$s->date_abolished."','".$s->unit."','".$s->lab_fee."','".$s->rgep."','".$s->desc."')");
		$mysql_close();
	}*/
	function add_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13)
	{
		$q = mysql_query("insert into subject 
			(
			course_code,
			subject_title,
			action_taken,
			date_proposed,
			date_approved,
			date_first_implemented,
			date_revision_implemented,
			date_abolished_in_offering,
			academic_year,
			units,
			degree_level,
			semester_offered,
			lab_fee
			)values 
			('$a1',
			'$a2',
			'$a3',
			'$a4',
			'$a5',
			'$a6',
			'$a7',
			'$a8',
			'$a9',
			'$a10',
			'$a11',
			'$a12',
			'$a13')");
		if(!$q) die(mysql_error());
	}
	
	function update_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$cid)
	{
		$q = mysql_query("update subject set
			course_code='$a1',	
			subject_title='$a2',
			action_taken='$a3',
			date_proposed='$a4',
			date_approved='$a5',
			date_revision_implemented='$a6',
			academic_year='$a7',
			units='$a8',
			degree_level='$a9',
			semester_offered='$a10',
			lab_fee='$a11'
			where course_code='$cid'");
			//date_first_implemented='$a7',
			//date_abolished_in_offering='$a9',
		if(!$q) die(mysql_error());
	}
	
	function edit_subject($s)
	{
	}
	
	function retrieve_subject($c)
	{
		$q = mysql_query("select * from subject where course_code='$c'");
		if(!$q) die("Cannot Retrieve Subject".mysql_error());
		return rows($q);
	}
	
	function remove_subject($c,$d)
	{
		$q = mysql_query("update subject set abolished='1', date_abolished_in_offering='$d' where course_code='$c'");
		if(!$q) die("Cannot Remove Subject".mysql_error());
	}
	
	function search_course($course_code)
	{
		$q = mysql_query("SELECT a.course_code, a.subject_title, a.academic_year, a.units, a.degree_level, b.semester_type
			FROM subject a, semester b
			WHERE a.semester_offered = b.semester_id
			AND course_code like '%".$course_code."%'");
		if(!$q) die('Search for course failed'.mysql_error());
		return $q;
	}
	
	function print_table_search_course($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process.php method=post><tr>';
			while($i<6)
			{
				echo '<td>';
				if($i==2) echo $row[$i]-1 .' - '.$row[$i];
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=sub value='.$row[0].'>';
			echo '<td><input type=submit name=c value="Edit Course"\></td>';
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function print_table_remove_course($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process.php method=post><tr>';
			while($i<6)
			{
				echo '<td>';
				if($i==2) echo $row[$i]-1 .' - '.$row[$i];
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=sub value='.$row[0].'>';
			echo '<td><input type=submit name=c value="Remove"\></td>';
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function search_name($employee_id)
	{
		$q = mysql_query("select last_name,first_name
			from employee
			where employee_id='$employee_id'");
		if(!$q) die('Cannot search Name'.mysql_query());
		return $q;
	}
	
	function search_unit($employee_id)
	{
		$q = mysql_query("SELECT b.unit_name 
			FROM employee a,unit b 
			WHERE a.unit_id=b.unit_id
			and a.employee_id='$employee_id'");
		if(!$q) die('Cannot retrieve unit of employee'.mysql_query());
		return $q;
	}
	
	function retrieve_course_info($course_code)
	{
		$q = mysql_query("SELECT a.course_code,a.subject_title,a.academic_year,a.units,b.semester_type
			FROM subject a,semester b
			WHERE b.semester_id=a.semester_offered
			and course_code='$course_code'");
		if(!$q) die('Cannot retrieve course info'.mysql_query());
		return $q;
	}
?>