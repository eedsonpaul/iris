<?php 
	require 'dbconnect.php';
	session_start();
	
	$year=$_POST['textfield22']; // from year
	$ynum=$_POST['textfield223']; // 5 numbers
	$pass=$_POST['textfield222']; // pass
	
	$s_Num=$year.$ynum;
	
	$res=mysql_query("SELECT student_number,first_name from student where student_number='".$s_Num."' and password='".$pass."'");
	
	$num=mysql_num_rows($res); // if naa
	
	if($num!=1){
		header("location: invalidLogin.php");
	}else{
		$_SESSION['student_number']=$s_Num;
		header("location: student.php");
	}
	

?>