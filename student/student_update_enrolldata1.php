<?php

	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	
//	echo $academic_year=$_GET['academic_year']; 
//	echo $semester=$_GET['semester']; 
	
	$student_type		=$_POST['student-type'];
	$registration_stat	=$_POST['reg-status'];
	//$major				=$_POST['major']; 		//not required
	// $minor				=$_POST['minor']; 		//not required
	$degree_level		=$_POST['degree-level'];
	$graduating			=$_POST['graduating'];
	$foreign_info		=$_POST['foreign'];
	$family_income		=$_POST['familyincome'];
	$personal_income	=$_POST['personalincome'];
	echo $employment			=$_POST['employed']; 
	$citizenship		=$_POST['country'];   
	//echo "<br>" . $birthdate		=$_POST['birthdate'];
	$birthplace			=$_POST['birthplace'];   
	$email_address		=$_POST['emailadd'];   
	$civil_status		=$_POST['civilstat'];  
	$residency			=$_POST['resident'];

	
		if($employment!="no"){
			echo $employer_name	    =$_POST['employer_name'];
			echo $employer_address      =$_POST['employer_address'];
			$employer_zipcode	=$_POST['employer_zipcode'];
			$employer_number	 =$_POST['employer_number'];
	
			mysql_query("UPDATE student SET 
									student_type 		= '$student_type.',
									employer_name 		= '$employer_name',
									employer_address 	= '$employer_address',
									employer_zipcode 	= $employer_zipcode,
									employer_number 	= $employer_number
									
									WHERE student_number = $student_number");
			}
		else{
			mysql_query("UPDATE student SET 
									student_type 		= '',
									employer_name 		= '',
									employer_address 	= '',
									employer_zipcode 	= 0,
									employer_number 	= 0
									
									WHERE student_number = $student_number");		
		
		}
	
	
	mysql_query("UPDATE student SET student_type 		= '$student_type.',
									registration_stat 	= '$registration_stat',
									degree_level 		= '$degree_level',
									graduating 			= '$graduating',
									foreign_info 		= '$foreign_info',
									family_income 		= $family_income,
									personal_income 	= $personal_income,
									employment 			= '$employment',
								
									citizenship 		= '$citizenship',
									birthplace			= '$birthplace',
									email_address		= '$email_address',
									civil_status		= '$civil_status',
									residency			= '$residency'
									

									
		WHERE student_number = $student_number");

	//header("location: student_edit_enrolldata2.php");
?>