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
		
		function tracker($employee_id, $action_flag, $target_type, $id, $section_label) {
		$date = date("Y-n-d H:i:s", time()); //time of update, modification, addition, deletion of records
		$tracker = '../tracker.txt'; //file name of the log file
		$username = mysql_result(mysql_query("SELECT username FROM {employee} WHERE employee_id='$employee_id'"));
		if ($action_flag == 1) {
			$action = 'creates user ';
		} else if ($action_flag == 2) {
			$action = 'edits user ';
		} else if ($action_flag == 3) {
			$action = 'removes/blocks user ';
		} else if ($action_flag == 4) {
			$action = 'adds accountability ';
		} else if ($action_flag == 5) {
			$action = 'edits accountability ';
		} else if ($action_flag == 6) {
			$action = 'removes accountability ';
		} else if ($action_flag == 7) {
			$action = 'extends slots ';
		} else if ($action_flag == 8) {
			$action = 'extends slots ';
		}
		if ($target_type == 1) { //student type
			$target = $id;
		} else if ($target_type == 2) { //subject type
			$target = $id . '-' . $section_label;
		}
		$handle = fopen($tracker, 'a') or die('Cannot open file:  '.$my_file); //append series of activities by the employee
		$log = $date . ' ' . $username . ' ' . $action . ' ' . $target . "\n"; //info to store
		fwrite($handle, $log);
		fclose($handle);
	} //function that tracks the changes in the db by users
	
	//insert tracking function here
        $action_flag = 7;
        $target_type = 2;
        $employee_id = $_SESSION['username'];
        $id = $subject_code;
        $section_label = $sec_lab;
        tracker($employee_id, $action_flag, $target_type, $id, $section_label);
?>