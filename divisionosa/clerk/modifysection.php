<?php
	include("offering_functions.php");
	edit_section(
		$_POST['course_code'],
		$_POST['section_label'],
		$_POST['room'],
		$_POST['faculty'],
		$_POST['tslots'],
		$_POST['tslots'], //available slots = total slots
		"0",
		"0",
		"0",
		$_POST['ctype'],
		$_POST['ccode'],
		$_POST['slbl']);
		
	edit_section_schedule(
		$_POST['course_code'],
		$_POST['section_label'],
		$_POST['stime'],
		$_POST['etime'],
		$_POST['day'],
		$_POST['ccode'],
		$_POST['slbl']);
	print("Class Offering Modified");
?>