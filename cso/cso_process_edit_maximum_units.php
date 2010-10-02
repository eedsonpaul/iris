<?php
	include("connect_to_database.php");
	
				session_start();
				$student_num = $_GET['id'];
				$stnum = $_SESSION['student_number'];
				$last_update = time();
				//$student_ID = $_POST['student_id'];


				$sql = "UPDATE student SET
						max_units_allowed = '".$_POST['new_max_units']."', 
						last_updated = '$last_update' WHERE student_number='$student_num'";
					
						
		if(isset($sql) && !empty($sql)) {
			echo "<script> alert('Student maximum units successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
			$result = mysql_query($sql);
		}
?>