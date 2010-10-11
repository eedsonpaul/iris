<?php
	include ("cso_generate_password_class.php");
	session_start();
	$password = new Password();
	$new_pass = $password->createRandomPassword();
	$student_id = $_GET['id'];

	$_SESSION['student_password'] = $new_pass;

		header("Location: cso_generate_password_change_student_login_account.php?c=NOT&id=$student_id&p=CHANGE");

?>

