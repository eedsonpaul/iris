<?php
	include("../cssandstuff/dbconnect.php");
	include("../cssandstuff/general_functions.php");
	/*function add_subject($s)
	{
		connect_db();
		mysql_query("insert into osa_subject values ('".$s->sub_num."','".$s->sub_name."','".$s->sub_title."','".$s->course_code."','".$s->credited."','".$s->numeric_grades."','".$s->repeatable_to."','".$s->date_proposed."','".$s->date_approved."','".$s->date_first."','".$s->date_revision."','".$s->date_abolished."','".$s->unit."','".$s->lab_fee."','".$s->rgep."','".$s->desc."')");
		$mysql_close();
	}*/
	function add_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15)
	{
		$q = mysql_query("insert into subject values ('$a1','".$a2."','".$a3."','".$a4."','".$a5."','".$a6."','".$a7."','".$a8."','".$a9."','".$a10."','".$a11."','".$a12."','".$a13."','".$a14."','".$a15."')");
		if(!$q) die(mysql_error());
	}
	
	function update_subject($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$cid)
	{
		$q = mysql_query("update subject set
			course_code='$a1',	
			subject_title='$a2',
			action_taken='$a3',
			repeatable_to='$a4',
			date_proposed='$a5',
			date_approved='$a6',
			date_revision_implemented='$a7',
			academic_year='$a8',
			units='$a9',
			degree_level='$a10',
			semester_offered='$a11'
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
?>