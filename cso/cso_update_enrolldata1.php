<?php

	require 'connect_to_database.php';
	session_start();
    $student_number = $_SESSION['student_number'];	
	//$academic_year=$_GET['academic_year']; 
	//$semester=$_GET['semester']; 
	
	$student_type		=$_POST['student-type'];
	$registration_stat	=$_POST['reg-status'];
	$degree_level		=$_POST['degree-level'];
	$graduating			=$_POST['graduating'];
	$foreign_info		=$_POST['foreign'];
	$family_income		=$_POST['familyincome'];
	$personal_income	=$_POST['personalincome'];
	$employment			=$_POST['employed']; 
	$citizenship		=$_POST['country'];   
  $other_country  =$_POST['other_country'];  
	$birthdate		=$_POST['birthdate'];
	$birthplace			=$_POST['birthplace'];   
	$email_address		=$_POST['emailadd'];   
	$civil_status		=$_POST['civilstat'];  
	$residency			=$_POST['resident'];
	
    if($citizenship=='others'){
        mysql_query("UPDATE student SET 
									citizenship 		= '$other_country'
									WHERE student_number = $student_number");
    }
    else{
        mysql_query("UPDATE student SET 
									citizenship 		= '$citizenship'
									WHERE student_number = $student_number");
    }
  
	
		if($employment!="no"){
			$employer_name	    =$_POST['employer_name'];
			$employer_address      =$_POST['employer_address'];
			$employer_zipcode	=$_POST['employer_zipcode'];
			$employer_number	 =$_POST['employer_number'];
	
			mysql_query("UPDATE student SET 
									employer_name 		= '$employer_name',
									employer_address 	= '$employer_address',
									employer_zipcode 	= $employer_zipcode,
									employer_number 	= $employer_number
									
									WHERE student_number = $student_number");
			}
		else{
			mysql_query("UPDATE student SET 
									employer_name 		= '',
									employer_address 	= '',
									employer_zipcode 	= 0,
									employer_number 	= 0
									
									WHERE student_number = $student_number");		
		
		}
	
	
	mysql_query("UPDATE student SET 
	                student_type 		= '$student_type.',
									registration_stat 	= '$registration_stat',
									degree_level 		= '$degree_level',
									graduating 			= '$graduating',
									foreign_info 		= '$foreign_info',
									family_income 		= $family_income,
									personal_income 	= $personal_income,
									employment 			= '$employment',
									birthdate       = '$birthdate',
									birthplace			= '$birthplace',
									email_address		= '$email_address',
									civil_status		= '$civil_status',
									residency			= '$residency'
									

									
		WHERE student_number = $student_number");

	  header("location: cso_edit_enrolldata2.php");
?>
