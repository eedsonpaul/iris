<?php
	require_once '../cssandstuff/dbconnect.php';
	function select_division()
	{
		$q = mysql_query("SELECT * 
			FROM `unit` 
			WHERE unit_id between 1 and 5");
		if(!$q) die('Cannot retrieve divisions'.mysql_query());
		return $q;
	}
	
	function option_division($array)
	{
		while($row = mysql_fetch_array($array))
		{
			echo '<option value='.$row[0].'>'.$row[1].'</option>';
		}
	}
	
	function insert_degree($a0,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14)
	{
		$r = 'Degree '.$a5.' added';
		$q = mysql_query("INSERT INTO `degree_program` (
		`degree_program_id` ,
		`program_code` ,
		`degree_level` ,
		`required_years` ,
		`required_units` ,
		`degree_name` ,
		`major` ,
		`minor` ,
		`degree_title` ,
		`credited` ,
		`currently_offered` ,
		`entrance_code` ,
		`enrolment_quota` ,
		`date_proposed` ,
		`unit_id`
		)
		VALUES ('$a0' , '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a10', '$a11', '$a12', '$a13', '$a14')");
		if(!$q) 
		{
			die('Cannot add degree'.mysql_error());
			$r = 'Cannot add Degree name'.$a5;
		}
		return $r;
	}
	function update_degree($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a0)
	{
		$r = 'Degree '.$a5.' updated';
		$q = mysql_query("update degree_program set
		program_code='$a1',
		degree_level='$a2',
		required_years='$a3',
		required_units='$a4',
		degree_name='$a5',
		major='$a6',
		minor='$a7',
		degree_title='$a8',
		credited='$a9',
		currently_offered='$a10',
		entrance_code='$a11',
		enrolment_quota='$a12',
		date_proposed='$a13',
		date_revised='$a14',
		unit_id='$a15'
		where degree_program_id='$a0'
		");
		if(!$q) 
		{
			die('Cannot update degree'.mysql_error());
			$r = 'Cannot update Degree name'.$a5;
		}
		return $r;
	}
	
	function search_degree($degree_name)
	{
		$q = mysql_query("SELECT a.degree_program_id,a.program_code, a.degree_level, a.degree_name, a.degree_title, a.entrance_code, a.enrolment_quota, b.unit_name
			FROM degree_program a, unit b
			WHERE a.unit_id = b.unit_id
			AND a.degree_name LIKE '%".$degree_name."%'");
		if(!$q) die('Cannot search degree'.mysql_error());
		return $q;
	}
	
	function print_edit_degree($array)
	{
		$i=1;
		while($row = mysql_fetch_array($array))
		{
			echo '<form action=process_dp.php method=post><tr>';
			while($i < 8)
			{
				echo '<td>';
				echo $row[$i];
				$i++;
				echo '</td>';
			}
			$i=1;
			echo '<input type=hidden name=degree_program_id value='.$row[0].'>';
			echo "<td><input type=submit name=dp value='Edit'></td>";
			echo '</tr></form>';
		}
	}
	function print_remove_degree($array)
	{
		$i=1;
		while($row = mysql_fetch_array($array))
		{
			echo '<form action=process_dp.php method=post><tr>';
			while($i < 8)
			{
				echo '<td>';
				echo $row[$i];
				$i++;
				echo '</td>';
			}
			$i=1;
			echo '<input type=hidden name=degree_program_id value='.$row[0].'>';
			echo "<td><input type=submit name=dp value='Remove'></td>";
			echo '</tr></form>';
		}
	}
	function retrieve_degree($degree_program_id)
	{
		$q = mysql_query("SELECT a.degree_program_id,a.program_code,a.degree_name,a.degree_level,a.required_years,a.required_units,a.major,a.minor,a.degree_title,a.credited,a.currently_offered, a.entrance_code, a.enrolment_quota,a.date_proposed, b.unit_name
			FROM degree_program a, unit b
			WHERE a.unit_id = b.unit_id
			and a.degree_program_id='$degree_program_id'");
		if(!$q) die('Cannot retrieve degree'.mysql_error());
		return $q;
	}
	function remove_degree($dpi)
	{
		$r = 'degree program has been removed';
		$q = mysql_query("delete from degree_program
			where degree_program_id='$dpi'");
		if(!$q) 
		{
			die('Cannot delete degree program'.mysql_error());
			$r = 'Cannot delete degree program';
		}
		return $r;
	}
	
	function retrieve_name($employee_id)
	{
		$q = mysql_query("SELECT a.employee_id, a.first_name, a.last_name, b.unit_name, c.designation
			FROM employee a, unit b, designation c
			WHERE a.employee_id = '$employee_id'
			AND a.unit_id = b.unit_id
			AND a.designation_id = c.designation_id");
		if(!$q) die('cannot retrieve info'.mysql_error());
		return $q;
	}
	
	function exist($num,$table,$attribute)
	{
		$q = mysql_query("SELECT * 
			FROM ".$table." 
			WHERE ".$attribute."='$num'");
		if(!$q) die('Individual does not exist'.mysql_error());
		return $q;
	}
	
	function exist2($num1,$num2,$table,$attribute1,$attribute2)
	{
		$q = mysql_query("SELECT * 
			FROM ".$table." 
			WHERE ".$attribute1."='$num1'
			and ".$attribute2."='$num2'");
		if(!$q) die('Section does not exist'.mysql_error());
		return $q;
	}
	
	function is_dissolved($num1,$num2,$dissolved)
	{
		$q = mysql_query("SELECT * 
			FROM section 
			WHERE dissolved='$dissolved' 
			and course_code='$num1'
			and section_label='$num2'");
		if(!$q) die('Section does not exist'.mysql_error());
		return $q;
	}
	//echo '<table>';
	//print_edit_degree(search_degree('com'));
	//echo '</table>';
	/*echo mysql_numrows(select_division());
	echo '<select name=3>';
	option_division(select_division());
	echo '</select>';*/
?>