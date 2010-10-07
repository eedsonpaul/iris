
<?php
require 'dbconnect.php';
require_once 'function_section.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
 
	$course_code = $_GET['subjectid'];
	$section_label =$_GET['sectionlabel'];

	
	$confirmed = countConfirmed($course_code,$section_label)+1;
	mysql_query("UPDATE student_status SET status='confirmed' where course_code='$course_code' AND student_number=$student_number AND section_label='$section_label' ");
	mysql_query("UPDATE section SET confirmed_count = $confirmed where course_code='$course_code' AND section_label='$section_label'");
	echo "SUBJECT CONFIRMED";
?>

