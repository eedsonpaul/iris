<?php
	require_once '../cssandstuff/dbconnect.php';
	require_once '../cssandstuff/general_functions.php';
	
	function add_section($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11)
	{
		$q = mysql_query("insert into section values ('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11')");
		if(!$q) die("unable to add section".mysql_error());
	}
	
	function add_section_schedule($a1,$a2,$a3,$a4,$a5)
	{
		$q = mysql_query("insert into section_schedules values ('$a1','$a2','$a3','$a4','$a5')");
		if(!$q) die("unable to add section schedule".mysql_error());
	}

	function edit_section($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$course_code,$section_label)
	{
		$q = mysql_query("update section set
			course_code='$a1',
			section_label='$a2',
			room_id='$a3',
			employee_id='$a4',
			total_slots	='$a5',
			available_slots='$a6',
			waitlist_count='$a7',
			confirmed_count='$a8',
			enrolled_count='$a9',
			class_type='$a10'
			where course_code='$course_code' AND section_label='$section_label'");
			/*dissolved='$a14'*/
		if(!$q) die("Unable to update section". mysql_error());
	}
	
	function edit_section_schedule($a1,$a2,$a3,$a4,$a5,$course_code,$section_label)
	{
		$q = mysql_query("update section_schedules set
			course_code='$a1',
			section_label='$a2',
			start_time='$a3',
			end_time='$a4',
			day_of_the_week	='$a5'
			where course_code='$course_code' AND section_label='$section_label'");
			/*dissolved='$a14'*/
		if(!$q) die("Unable to update section schedule". mysql_error());
	}
	
	function retrieve_section($c,$t)
	{
		$q = mysql_query("select * from section where course_code='$c' and section_label='$t'");
		if(!$q) die("Unable to retrieve section". mysql_error());
		return rows($q);
	}
	
	function retrieve_section_schedule($c,$t)
	{
		$q = mysql_query("select * from section_schedules where course_code='$c' and section_label='$t'");
		if(!$q) die("Unable to retrieve section schedule". mysql_error());
		return rows($q);
	}
	
	function remove_offering($num1,$num2)
	{
		$q1 = mysql_query("delete from section where course_code='$num1' and section_label='$num2'");
		if(!$q1) die("Unable to delete section". mysql_error());
		$q2 = mysql_query("delete from section_schedules where course_code='$num1' and section_label='$num2'");
		if(!$q2) die("Unable to delete section schedule". mysql_error());
	}
	
	function dissolve_offering($course_code,$section)
	{
		$q = mysql_query("update section set dissolved='1' where course_code='$course_code' and section_label='$section'");
		if(!$q) die("Unable to dissolve section". mysql_error());
	}
	
	function undissolve_offering($course_code,$section)
	{
		$q = mysql_query("update section set dissolved='0' where course_code='$course_code' and section_label='$section'");
		if(!$q) die("Unable to undissolve section". mysql_error());
	}
	/*function options_faculty()
	{
		connect_db();
		$q = mysql_query("select faculty_number from osa_faculty");
		options(rows($q,"faculty_number"));
		mysql_close();
	}*/
	
	/*function options_faculty()
	{
		connect_db();
		$q1 = mysql_query("select faculty_number from osa_faculty");
		//print_arr(cols($q1,"faculty_number"));
		$q2 = mysql_query("select employee_lastname,employee_firstname from osa_employee where employee_designation='faculty'");//last name
		options_3(cols($q1,"faculty_number"),cols_2($q2,"employee_lastname","employee_firstname"));
		//print_arr2(cols_2($q2,"employee_lastname","employee_firstname"));
		mysql_close();
	}*/
	//options_faculty();
	
	/*function options_cc()
	{
		connect_db();
		$q = mysql_query("select subject_number from osa_subject");
		options(cols($q,"subject_number"));
		mysql_close();
	}*/
	function options_faculty()
	{
		$q1 = mysql_query("select employee_id,last_name,first_name from employee where designation_id='2'");
		if(!$q1) die("unable to retrieve id,firstname, and last name".mysql_error());
		//print("<select name=''>");
		options_3(cols_3($q1,"employee_id","last_name","first_name"));
		//print("</select>");
		print_arr3(cols_3($q1,"employee_id","last_name","first_name"));
	}
	
	function options_cc()
	{
		$q1 = mysql_query("select course_code,subject_title from subject");
		if(!$q1) die("unable to retrieve code and title".mysql_error());
		//print("<select name=''>");
		options(cols_2($q1,"course_code","subject_title"));
		//print("</select>");
		print_arr2(cols_2($q1,"course_code","subject_title"));
	}
	
	function options_course()
	{
		$q = mysql_query("select course_code from subject");
		if(!$q) die("unable to retrieve code".mysql_error());
		display_options(cols($q,"course_code"));
		//print_arr2(cols_2($q1,"course_code"));
	}
	//options_cc();
	//options_faculty();
?>