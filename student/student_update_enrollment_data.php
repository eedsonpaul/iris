<?php 
	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	$academic_year=$_GET['academic_year']; 
	$semester=$_GET['semester']; 

	
	   $student_type=$_POST['student-type'];
	   $graduating=$_POST['graduating'];
	   $employment=$_POST['employed'];
	   $registration_stat=$_POST['reg-status'];
	   $foreign_info=$_POST['foreign'];
	   $citizenship=$_POST['country'];
	   $residency=$_POST['resident'];
	  $major=$_POST['major']; //not required
	  $minor=$_POST['minor']; //not required
	  $year_level=$_POST['year-level'];
	  $degree_level=$_POST['degree-level'];
	  $family_income=$_POST['familyincome'];
	  $personal_income=$_POST['personalincome'];
	  $gender=$_POST['sex'];
	  $civil_status=$_POST['civilstat'];
	  $birthdate=$_POST['birthdate'];
	  $birthplace=$_POST['birthplace'];
	  $emailadd=$_POST['emailadd'];
	  $semester=$_POST['semester'];
	  $sameaddress=$_POST['sameaddress'];
	  $housenum=$_POST['housenum'];
	  $street=$_POST['street'];
	  $barangay=$_POST['barangay'];
	  $city=$_POST['city'];
	  $number=$_POST['number'];
	  
	  $father_name =$_POST['number'];
	  $mother_name =$_POST['number'];
	  
	  $guardian =$_POST['number'];
	  $guardian_house_number =$_POST['number'];
	  $guardian_street =$_POST['number'];
	  $guardian_barangay =$_POST['number'];
	  $guardian_city_municipality =$_POST['number'];
	  $guardian_contact_number =$_POST['number'];
	  
	  $recipient_name =$_POST['recipient_name'];
	  $recipient_street =$_POST['recipient_street'];
	  $recipient_city =$_POST['recipient_city'];
	  $recipient_zipcode =$_POST['recipient_zipcode'];
	  $recipient_phone =$_POST['recipient_phone'];
	  
	  $employer_address=$_POST['employer-address'];
	  $employer_zipcode=$_POST['employer-zipcode'];
	  $employer_number=$_POST['employer-phonenum'];
		
	if($sameaddress==false){
       mysql_query("UPDATE student SET student_type = '".$student_type."' , graduating = '".$graduating."' ,
	   employment ='".$employment."', registration_stat = '".$registration_stat."' , foreign_info = '".$foreign_info."' ,
	   citizenship = '".$citizenship."', residency = '".$residency."', major = '".$major."' , 
	   minor = '".$minor."' , year_level = '".$year_level."' , degree_level = '".$degree_level."' , 
	   family_income = '".$family_income."', personal_income = '".$personal_income."' , gender = '".$gender."' ,
	   civil_status = '".$civil_status."', birthdate = '".$birthdate."' , birthplace = '".$birthplace."' , 
	   email_address = '".$emailadd."' , semester = '".$semester."' , present_house_number = '".$housenum."', 
	   present_street = '".$street."'  , present_barangay = '".$barangay."' ,
	   present_city_municipality = '".$city."'  ,  present_contact_number = '".$number."'  
		 WHERE student_number =  $student_number");
		 header("location: student_success_edit_enrolldata.php?academic_year='.$academic_year.'&semester='.$semester.'");
		 
	}
	
	else{
	    mysql_query("UPDATE student SET student_type = '".$student_type."' , graduating = '".$graduating."' ,
	   employment ='".$employment."', registration_stat = '".$registration_stat."' , foreign_info = '".$foreign_info."' ,
	   citizenship = '".$citizenship."', residency = '".$residency."', major = '".$major."' , 
	   minor = '".$minor."' , year_level = '".$year_level."' , degree_level = '".$degree_level."' , 
	   family_income = '".$family_income."', personal_income = '".$personal_income."' , gender = '".$gender."' ,
	   civil_status = '".$civil_status."', birthdate = '".$birthdate."' , birthplace = '".$birthplace."' , 
	   email_address = '".$emailadd."' , semester = '".$semester."' , present_house_number = '".$housenum."', 
	   present_street = '".$street."'  , present_barangay = '".$barangay."' ,
	   present_city_municipality = '".$city."'  ,  present_contact_number = '".$number."' , 
	   home_house_number = '".$housenum."', home_street = '".$street."'  ,
	   home_barangay = '".$barangay."' , home_city_municipality = '".$city."'  , 
	   home_contact_number = '".$number."'   
		 WHERE student_number =  $student_number");
		 header("location: student_success_edit_enrolldata.php?academic_year='.$academic_year.'&semester='.$semester.'");
	}
	
	 mysql_query("UPDATE student SET  father_name = '".father_name."' , mother_name = '".mother_name."' , guardian = '".guardian."' , 
					guardian_house_number = '".guardian_house_number."' , guardian_street = '".guardian_street."' , guardian_barangay = '".guardian_barangay."' , 
					guardian_city_municipality = '".guardian_city_municipality."' , guardian_contact_number = '".guardian_contact_number."' , 
					recipient_name = '".recipient_name."' , recipient_street = '".recipient_street."' , recipient_city = '".recipient_city."' ,
					recipient_zipcode = '".recipient_zipcode."' , recipient_phone = '".recipient_phone."' ,
					WHERE student_number =  $student_number");


?>