<?php
	include("osa_functions.php");
	add_a(
		$_POST['aid'],
		$_POST['atype'],
		$_POST['snum'],
		$_POST['details'],
		$_POST['adue'],
		$_POST['year'],
		$_POST['sem'],
		time(),
		$_POST['eid'],
		$_POST['astat'],
		$_POST['date_cleared']
		);
	print("Student Accountability assigned.");
?>