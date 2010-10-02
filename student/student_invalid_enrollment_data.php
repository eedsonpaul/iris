<?php 
	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	
	

	 
	 if($_POST['student-type']!=NULL&&$_POST['graduating']!=NULL&&$_POST['employed']!=NULL&&$_POST['reg-status']!=NULL&&
		$_POST['foreign']!=NULL&&$_POST['country']!=NULL&&$_POST['resident']!=NULL&&$_POST['year-level']!=NULL&&
		$_POST['degree-level']!=NULL&&$_POST['familyincome']!=NULL&&$_POST['personalincome']!=NULL&&
		$_POST['sex']!=NULL&&$_POST['civilstat']!=NULL){
		
		
	  echo $student_type=$_POST['student-type'];
	  echo $graduating=$_POST['graduating'];
	  echo $employment=$_POST['employed'];
	  echo $registration_stat=$_POST['reg-status'];
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
	  
	  $employer_address=$_POST['employer-address'];
	  $employer_zipcode=$_POST['employer-zipcode'];
	  $employer_phonenum=$_POST['employer-phonenum'];
		
		
       mysql_query("UPDATE student SET student_type = '".$_POST['student-type']."' , graduating = '".$_POST['graduating']."' ,
	   employment ='".$_POST['employed']."', registration_stat = '".$_POST['reg-status']."' , foreign_info = '".$_POST['foreign']."' ,
	   citizenship = '".$_POST['country']."', residency = '".$_POST['resident']."', major = '".$_POST['major']."' , 
	   minor = '".$_POST['minor']."' , year_level = '".$_POST['year-level']."' , degree_level = '".$_POST['degree-level']."' , 
	   family_income = '".$_POST['familyincome']."', personal_income = '".$_POST['personalincome']."' , gender = '".$_POST['sex']."' ,
	   civil_status = '".$_POST['civilstat']."' 
		 WHERE student_number =  $student_number");
		
		echo "UPDATE SUCCESSFUL";
	}
	else{
	
		echo "UPDATE UNSUCCESSFUL Pls fill out all fields with *.";
	}


?>