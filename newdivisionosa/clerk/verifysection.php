<?php
	include("offering_functions.php");
	add_section(
		$_POST['course_code'],
		$_POST['section'],
		$_POST['room'],
		$_POST['faculty'],
		$_POST['tslots'],
		$_POST['tslots'],//available slots = total slots
		"0",
		"0",
		"0",
		$_POST['ctype']);
		
	add_section_schedule(
		$_POST['course_code'],
		$_POST['section'],
		$_POST['stime'],
		$_POST['etime'],
		$_POST['day']);
	print("Class Offering Added");
?>