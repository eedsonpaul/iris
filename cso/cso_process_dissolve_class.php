<?php
	include("connect_to_database.php");
	
				session_start();
				$subject_code = $_GET['id'];
				$sec_lab = $_GET['sec'];
				$last_update = time();
								
					$sql = "UPDATE section SET
						dissolved = '1' WHERE course_code = '$subject_code' && section_label = '$sec_lab'";
				
				
					
						
		if(isset($sql) && !empty($sql)) {
			$result = mysql_query($sql);
			echo "<script> alert('Class successfully dissolved.'); window.location.href ='cso_classes_management_module.php';</script>";
		}
?>