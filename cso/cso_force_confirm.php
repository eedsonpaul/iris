<?php
	require_once 'student_add_subject.php';
	$student_number = $_SESSION['student_number'];
	$course_code = $_GET['coursecode'];
	$section_label =$_GET['sectionlabel'];
	
	header("Location:student_add_subject.php?&action=force&coursecode=$course_code&sectionlabel=$section_label");
?>