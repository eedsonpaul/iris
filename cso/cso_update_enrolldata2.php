<?php

	require 'connect_to_database.php';
	session_start();
    $student_number = $_SESSION['student_number'];	
//	$academic_year=$_POST['academic_year']; 
//	$semester=$_POST['semester']; 	
	
	$father_name 				=$_POST['father_name'];
	$mother_name 				=$_POST['mother_name'];
    echo $sameaddress				=$_POST['sameaddress'];
	$guardian 					=$_POST['guardian'];
	$guardian_house_number 		=$_POST['guardian_house_number'];
	$guardian_street 			=$_POST['guardian_street'];
	$guardian_barangay 			=$_POST['guardian_barangay'];
	$guardian_city_municipality	=$_POST['guardian_city_municipality'];
	$guardian_province		 	=$_POST['guardian_province'];
	$guardian_contact_number 	=$_POST['guardian_contact_number'];
	$house_type					=$_POST['house_type'];
	//wala pa sa database ang housetype
	$recipient_name 			=$_POST['recipient_name'];
	$recipient_street 			=$_POST['recipient_street'];
	$recipient_city 			=$_POST['recipient_city'];
	$recipient_zipcode 		 	=$_POST['recipient_zipcode'];
	$recipient_phone 			=$_POST['recipient_phone'];
	
	$housenum		=	$_POST['housenum'];
	$street			=	$_POST['street'];
	$barangay		=	$_POST['barangay'];
	$city			=	$_POST['city'];
	$number			=	$_POST['number'];
	$province		=	$_POST['province'];
	
	mysql_query("UPDATE student SET father_name 				= '$father_name',
									mother_name 				= '$mother_name',
									guardian 					= '$guardian',
									guardian_house_number 		= $guardian_house_number,
									guardian_street 			= '$guardian_street',
									guardian_barangay 			= '$guardian_barangay',
									guardian_city_municipality 	= '$guardian_city_municipality',
									guardian_province		 	= '$guardian_province',
									guardian_contact_number 	= $guardian_contact_number,
									recipient_name 				= '$recipient_name',
									recipient_street 			= '$recipient_street',
									recipient_city 				= '$recipient_city',
									recipient_zipcode 			= $recipient_zipcode,
									recipient_phone 			= $recipient_phone
									
		WHERE student_number = $student_number");
		
	if($sameaddress=="yes"){
	
	mysql_query("UPDATE student SET home_house_number 				=  $housenum,
									home_street 					= '$street',
									home_barangay 					= '$barangay',
									home_city_municipality 			= '$city',
									home_province 					= '$province',
									home_contact_number 			=  $number,
									present_home_number 			=  $housenum,
									present_street 					= '$street',
									present_barangay 				= '$barangay',
									present_city_municipality 		= '$city',
									present_province 				= '$province',
									present_contact_number 			=  $number

								
	WHERE student_number = $student_number");
	
	}
	
	else{
	
	mysql_query("UPDATE student SET home_house_number 				=  0,
									home_street 					= '',
									home_barangay 					= '',
									home_city_municipality 			= '',
									home_province 					= '',
									home_contact_number 			=  0,
									present_home_number 			=  $housenum,
									present_street 					= '$street',
									present_barangay 				= '$barangay',
									present_city_municipality 		= '$city',
									present_province 				= '$province',
									present_contact_number 			=  $number

								
	WHERE student_number = $student_number");
	
	}
	
	echo "<script> alert('Student enrollment data successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
	
?>