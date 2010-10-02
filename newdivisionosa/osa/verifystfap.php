<?php
	include("osa_functions.php");
	update_bracket_student(
		$_POST['student_id'],
		$_POST['bracket_id']);
	print("STFAP Bracket assigned.");
?>