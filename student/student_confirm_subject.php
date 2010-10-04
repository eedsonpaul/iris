
<?php
require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
 
	$course_code = $_GET['subjectid'];
	$section_label =$_GET['sectionlabel'];

	
	
	mysql_query("UPDATE student_status SET status='confirmed' where course_code='$course_code' AND student_number=$student_number AND section_label='$section_label' ");
	echo "SUBJECT CONFIRMED";

?>

