<?php
	include("subject_functions.php");
	//$_POST['subject_id'],
	update_subject(
	$_POST['course_code'],
	$_POST['subject_title'],
	$_POST['action_taken'],
	$_POST['repeatable_to'],
	strtotime($_POST['pdate']),
	strtotime($_POST['apdate']),
	strtotime($_POST['fdate']),
	strtotime($_POST['rdate']),
	strtotime($_POST['abdate']),
	"",
	$_POST['year'],
	$_POST['units'],
	$_POST['deg'],
	$_POST['sem'],
	$_POST['sub']);
	print("Subject Modified");
?>