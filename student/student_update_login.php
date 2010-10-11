
<?php 
	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	
	
	 echo $password1=$_POST['password1']; // 
	 echo $password2 =$_POST['password2']; // 
	 echo $question=$_POST['question']; //
	 echo $answer=$_POST['answer']; // 
	 
	if($password1!=NULL&&$password2!=NULL&&$question!=NULL&&$answer!=NULL){
	
	 if($password1==$password2){
	 
		$hashedPassword = MD5($password1);
	
		mysql_query("UPDATE student SET password = '".$hashedPassword."', security_question = '".$question."', answer ='".$answer."'
		WHERE student_number =  $student_number");
		
		header("location: student_update_login_result.php?message='UPDATE SUCCESSFUL'");
		
	}
	else{
		header("location: student_update_login_result.php?message='UPDATE FAILED. Passwords do not match'");
	}
	
	}
	
	else
	{
		header("location: student_update_login_result.php?message='UPDATE FAILED. Fill out all fields'");
	}
	

?>