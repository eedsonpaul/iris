<?php

	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	
	$academic_year=$_POST['academic_year']; 
	$semester=$_POST['semester']; 	
	
	$father_name 				=$_POST['number'];
	$mother_name 				=$_POST['number'];
	$sameaddress				=$_POST['sameaddress'];
	$guardian 					=$_POST['number'];
	$guardian_house_number 		=$_POST['number'];
	$guardian_street 			=$_POST['number'];
	$guardian_barangay 			=$_POST['number'];
	$guardian_city_municipality =$_POST['number'];
	$guardian_contact_number 	=$_POST['number'];
	$house_type					=$_POST['house_type'];
	$recipient_name 			=$_POST['recipient_name'];
	$recipient_street 			=$_POST['recipient_street'];
	$recipient_city 			=$_POST['recipient_city'];
	$recipient_zipcode 			=$_POST['recipient_zipcode'];
	$recipient_phone 			=$_POST['recipient_phone'];
	
	mysql_query("UPDATE student SET father_name 				= '".$father_name."',
									mother_name 				= '".$mother_name."',
									guardian 					= '".$guardian."',
									guardian_house_number 		= $guardian_house_number,
									guardian_street 			= '".$guardian_street."',
									guardian_barangay 			= '".$guardian_barangay."',
									guardian_city_municipality 	= '".$guardian_city_municipality."',
									guardian_contact_number 	= $guardian_contact_number,
									house_type 					= '".$house_type."',
									recipient_name 				= '".$recipient_name."',
									recipient_street 			= '".$recipient_street."',
									recipient_city 				= '".$recipient_city."',
									recipient_zipcode 			= '".$recipient_zipcode."',
									recipient_phone 			= '".$recipient_phone."',
									
									
		WHERE student_number = $student_number");
	
	header("location: student_edit_data.php");
	
?>