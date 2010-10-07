<?php
//File: CSO Remove INC/4.0
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	$student_number = $_GET[''];
	$section = $_GET['sec'];
	$subject = $_GET['sub'];
	$completion_grade = $_POST['completion_grade'];
	
	if($completion_grade==5){
		$sql = "UPDATE grade SET
					completion_grade = '$completion_grade',
					grade_status = 'failed'
				WHERE student_number = '$student_number' && section_label = '$section' && course_code = '$subject'";
	} else if($completion_grade>=3) {
		$sql = "UPDATE grade SET
					completion_grade = '$completion_grade',
					grade_status = 'passed'
				WHERE student_number = '$student_number' && section_label = '$section' && course_code = '$subject'";
	}
	
	if(isset($sql) && !empty($sql)) {
			$result = mysql_query($sql);
			echo "<script> alert('Student grade successfully updated.'); window.location.href ='cso_grades_module.php';</script>";
	}
?>