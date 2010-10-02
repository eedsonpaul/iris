<?php
	require_once '../cssandstuff/dbconnect.php';
	function add_approved_scholarship($a1,$a2,$a3)
	{
		$q = mysql_query("insert into scholarship
							(scholarship_id,scholarship_name,amount_shouldered)
							values ('$a1','$a2','$a3')");
		if(!$q) die('Cannot add approved scholarship'.mysql_error());
	}
	
	function retrieve_scholarship_information($a1)
	{
		$q = mysql_query("select * from scholarship 
						where scholarship_id='$a1'");
		if(!$q) die('Cannot retrieve scholarship info'.mysql_error());
		return $q;
	}
	
	function retrieve_all_scholarship()
	{
		$q = mysql_query("select scholarship_id,scholarship_name from scholarship");
		if(!$q) die('Cannot retrieve all scholarships'.mysql_error());
		return $q;
	}
	
	function print_scholarship_options($q)
	{
		while($row = mysql_fetch_array($q))
		{
			echo '<option value='.$row[0].'>'.$row[1].'</option>';
		}
	}
	
	//print_r(retrieve_scholarship_information('scholar'));
	function search_approved_scholarship($a1)
	{
		$q = mysql_query("SELECT scholarship_id,scholarship_name,amount_shouldered FROM scholarship 
				WHERE scholarship_name like '%".$a1."%'");
		if(!$q) die('Search for approved scholarship failed'.mysql_error());
		return $q;
	}
	
	function print_table_search_scholarship($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_osa.php method=post><tr>';
			while($i<3)
			{
				echo '<td>';
				echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=scholarship_id value='.$row[0].'>';
			echo '<td><input type=submit name=osa value=Edit></td>';
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function print_table_remove_scholarship($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_osa.php method=post><tr>';
			while($i<3)
			{
				echo '<td>';
				echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=scholarship_id value='.$row[0].'>';
			echo '<td><input type=submit name=osa value=Remove></td>';
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function edit_scholarship_info($a1,$a2,$a3,$sid)
	{
		$q = mysql_query("update scholarship set 
						scholarship_id='$a1',
						scholarship_name='$a2',
						amount_shouldered='$a3'
						where scholarship_id='$sid'");
		if(!$q) die('Cannot edit scholarship info'.mysql_error());
	}

	function remove_scholarship($a1)
	{
		$q = mysql_query("delete from scholarship where scholarship_id='$a1'");
		if(!$q) die('Cannot delete scholarship'.mysql_error());
	}
	
	function add_student_scholarship($a1,$a2)
	{
		$q = mysql_query("update student set
			scholarship_id='$a2'
			where student_number='$a1'");
		if(!$q) die(mysql_error());
	}
	
	function retrieve_student_scholarship_info($a1)
	{
		$q = mysql_query("SELECT a.student_number,a.first_name,a.last_name,b.scholarship_name FROM student a,scholarship b 
			WHERE a.scholarship_id=b.scholarship_id
			and a.student_number='$a1'");
		if(!$q) die('Retrieval for student scholarship failed'.mysql_error());
		return $q;
	}
	
	function search_student_scholarship($a1)
	{
		$q = mysql_query("SELECT a.student_number,a.last_name,a.first_name,b.scholarship_name FROM student a,scholarship b 
			WHERE a.scholarship_id=b.scholarship_id
			and a.student_number like '%".$a1."%'");
		if(!$q) die('Search for student scholarship failed'.mysql_error());
		return $q;
	}
	
	function print_table_student_scholarship($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_osa.php method=post><tr>';
			while($i<4)
			{
				echo '<td>';
				if($i==1)
				{
					echo $row[$i].', '.$row[$i+1];
					$i++;
				}
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=student_number value='.$row[0].'>';
			echo "<td><input type=submit name=osa value='Edit Scholarship'></td>";
			$i=0;
			echo "</tr></form>";
		}
	}
	
	function print_table_remove_student_scholarship($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<form action=process_osa2.php method=post><tr>';
			while($i<4)
			{
				echo '<td>';
				if($i==1)
				{
					echo $row[$i].', '.$row[$i+1];
					$i++;
				}
				else echo $row[$i];
				$i++;
				echo '</td>';
			}
			echo '<input type=hidden name=student_number value='.$row[0].'>';
			echo "<td><input type=submit name=remove value='Remove Scholarship'></td>";
			$i=0;
			echo "</tr></form>";	
		}
	}
	
	function edit_student_scholarship($a1,$a2)
	{
		$q = mysql_query("update student set
						scholarship_id='$a1'
						where student_number='$a2'");
		if(!$q) die('Cannot Edit Scholarship'.mysql_error());
	}
	
	
	function remove_student_scholarship($a1)
	{
		$q = mysql_query("update student set
						scholarship_id='0'
						where student_number='$a1'");
		if(!$q) die('Cannot Remove student Scholarship'.mysql_error());
	}
	/*
	function add_stfap_bracket($a1)
	{
		$q = mysql_query();
		if(!$q) die(mysql_error());
	}
	
	function remove_stfap_bracket($a1)
	{
		$q = mysql_query();
		if(!$q) die(mysql_error());
	}
	
	function edit_stfap_bracket($a1)
	{
		$q = mysql_query();
		if(!$q) die(mysql_error());
	}
	*/
?>