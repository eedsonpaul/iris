<?php
	include("connect_to_database.php");
	
				session_start();
				$subject_code = $_GET['id'];
				$sec_lab = $_GET['sec'];
				$new_slots = $_POST['new_max_slots'];
				$degree_id = $_POST['course'];
				
								if($new_slots == "" && $degree_id != 0){
					$sql = "INSERT INTO offered_subjects (course_code, degree_program_id)
							VALUES('$subject_code', '$degree_id')";
				}else if ($new_slots !="" && $degree_id <> 0){
					$sql = "INSERT INTO offered_subjects (course_code, degree_program_id)
							VALUES('$subject_code', '$degree_id')";
					$sql1 = "UPDATE section SET
						total_slots = '$new_slots' WHERE course_code = '$subject_code' && section_label = '$sec_lab'";
						$result1 = mysql_query($sql1);
				}else if($new_slots !="" && $degree_id == 0){
					$sql = "UPDATE section SET
						total_slots = '$new_slots' WHERE course_code = '$subject_code' && section_label = '$sec_lab'";
				
				}
					
						
		if(isset($sql) && !empty($sql)) {
			echo "<script> alert('Class successfully updated.'); window.location.href ='cso_edit_class_restrictions_search.php';</script>";
			$result = mysql_query($sql);
		}
?>