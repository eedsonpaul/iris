<?
	include("dbconnect.php");
	include("general_functions.php");
	/*function add_subject($s)
	{
		connect_db();
		mysql_query("insert into osa_subject values ('".$s->sub_num."','".$s->sub_name."','".$s->sub_title."','".$s->course_code."','".$s->credited."','".$s->numeric_grades."','".$s->repeatable_to."','".$s->date_proposed."','".$s->date_approved."','".$s->date_first."','".$s->date_revision."','".$s->date_abolished."','".$s->unit."','".$s->lab_fee."','".$s->rgep."','".$s->desc."')");
		$mysql_close();
	}*/
	
	function add_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15)
	{
		connect_db();
		mysql_query("insert into osa_subject values ('".$a1."','".$a2."','".$a3."','".$a4."','".$a5."','".$a6."','".$a7."','".$a8."','".$a9."','".$a10."','".$a11."','".$a12."','".$a13."','".$a14."','".$a15."')");
		mysql_close();
	}
	
	function update_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$course_code)
	{
		connect_db();
		mysql_query("update osa_subject set
			subject_number='$a1',
			subject_name='$a2',
			subject_title='$a3',
			credited='$a4',
			numeric_grades='$a5',
			repeatable_to='$a6',
			date_proposed='$a7',
			date_approved='$a8',
			date_first_implemented='$a9',
			date_revision_implemented='$a10',
			date_abolished_in_offering='$a11',
			unit_in_charged='$a12'
			lab_fee='$a13'
			rgepnstppe_name='$a14'
			description='$a15'
			where course_code='$course_code'");
		mysql_close();
	}
	
	function edit_subject($s)
	{
		connect_db();
		mysql_close();
	}
	
	function retrieve_subject($s)
	{
		connect_db();
		$q = mysql_query("select * from osa_subject where subject_number='$s'");
		mysql_close();
		return rows($q);
	}
	
	//print_arr(retrieve_subject("55"));
	
	function remove_subject($s)
	{
		connect_db();
		$q = mysql_query("delete from osa_subject where subject_number='$s'");
		mysql_close();
	}
	
	/*function hello()
	{
		connect_db();
		$q = mysql_query("select faculty_number from osa_faculty");
		//print_r(rows($q,"faculty_number"));
		$e = cols($q,"faculty_number");
		while($row = mysql_fetch_array($q))
  		{
  			echo $row['faculty_number'];
  			echo "<br />";
  		}
			
		print_arr($e);
		echo "<select name=test>";
		options($e);
		echo "</select>";
		print_r($r);
		print("Hello");
		mysql_close();
	}
	
	hello();*/
?>