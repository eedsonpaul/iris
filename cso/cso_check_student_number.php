﻿<?php
//File: CSO Check Student Number
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	include("connect_to_database.php");
	$count = 0;
	$student_ID = $_POST['student_id'];
	$query = "SELECT student_number from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			extract($row);
			$count++;
	}
	
	if($count==0) {
		header("Location: cso_add_student_account.php?id=$student_ID");
	} else {
		echo "<script> alert('Student number already exists. Please input another student number.'); window.location.href = 
			'cso_add_student_record.php';</script>";
	}
?>