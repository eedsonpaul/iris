<?php 
	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	
	
	 $password=$_POST['password']; // 
	 $retype =$_POST['retype']; // 
	 $question=$_POST['question']; //
	 $answer=$_POST['answer']; // 
	 
	
	 
		$hashedPassword = MD5($password);
	
		mysql_query("UPDATE student SET password = '".$hashedPassword."', security_question = '".$question."', answer ='".$answer."'
		WHERE student_number =  $student_number");
		
		header("location: student_success_edit_login.php");
		
	

?>