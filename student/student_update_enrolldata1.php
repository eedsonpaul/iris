<?php

	require 'dbconnect.php';
	session_start();
    echo $student_number = $_SESSION['student_number'];	
	//$academic_year =$_POST['academic_year']; 
	//$semester =$_POST['semester']; 

	
	$student_type		=$_POST['student-type'];
	$registration_stat	=$_POST['reg-status'];
	$major				=$_POST['major']; 		//not required
	echo "<br>" . $minor				=$_POST['minor']; 		//not required
	echo "<br>" . $year_level			=$_POST['year-level'];
	echo "<br>" . $degree_level		    =$_POST['degree-level'];
	echo "<br>" . $graduating			=$_POST['graduating'];
	echo "<br>" . $foreign_info		    =$_POST['foreign'];
	echo "<br>" . $gender				=$_POST['sex'];
	echo "<br>" . $family_income		=$_POST['familyincome'];
	echo "<br>" . $personal_income	    =$_POST['personalincome'];
	echo "<br>" . $employment			=$_POST['employed']; 
	echo "<br>" . $citizenship		    =$_POST['country'];   
	echo "<br>" . $birthdate			=$_POST['birthdate'];
	echo "<br>" . $birthplace			=$_POST['birthplace'];   
	echo "<br>" . $emailadd			    =$_POST['emailadd'];   
	echo "<br>" . $civil_status		    =$_POST['civilstat'];  
	echo "<br>" . $employer_name		=$_POST['employer_name'];
	echo "<br>" . $employer_address	    =$_POST['employer_address'];
	echo "<br>" . $employer_zipcode	    =$_POST['employer_zipcode'];
	echo "<br>" . $employer_number	    =$_POST['employer_number'];
	echo "<br>" . $residency			=$_POST['resident'];
	
	
	
	mysql_query("UPDATE student SET student_type 		= '".$student_type."',
									registration_stat 	= '".$registration_stat."',
									major 				= '".$major."',
									minor 				= '".$minor."',
									year_level 			= $year_level,
									degree_level 		= '".$degree_level."',
									graduating 			= '".$graduating."',
									foreign_info 		= '".$foreign_info."',
									gender 				= '".$gender."',
									family_income 		= $family_income,
									personal_income 	= $personal_income,
									employment 			= '".$employment."',
									citizenship 		= '".$citizenship."',
									birthdate 			= $birthdate,
									birthplace 			= '".$birthplace."',
									email_address 			= '".$emailadd."',
									civil_status 		= '".$civil_status."',
									employer_name 		= '".$employer_name."',
									employer_address 	= '".$employer_address."',
									employer_zipcode 	= $employer_zipcode,
									employer_number 	= $employer_number,
									residency 			= '".$residency."'
									
		WHERE student_number = $student_number");

	 header("location: student_edit_enrolldata2.php?academic_year='.$academic_year.'&semester='.$semester.'");



?>