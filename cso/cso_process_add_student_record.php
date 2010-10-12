<?php
//File: CSO Process Add Student Record
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM
	include("connect_to_database.php");
	
	switch ($_GET['action']) {
	
			case "ADD STUDENT":
				session_start();
				$emp_id = $_SESSION['employee_id'];
				$last_update = time();
				$student_ID = $_POST['student_id'];
				

				$sql1 = "SELECT degree_level FROM degree_program WHERE degree_program_id = '".$_POST['course']."'";
				$result = mysql_query($sql1);
				while($row = mysql_fetch_array($result)){
					$degree_level = $row['degree_level'];
				}


				$sql = "INSERT INTO student 
					(student_number, academic_standing, year_level, last_name, first_name, middle_name, gender, entry_academic_year, entry_semester, login_expiration, password, degree_program_id, degree_program,degree_level, access_level_id, last_updated, last_updated_by, graduating)
				
					VALUES ('".$_POST['student_id']."', 'Good Standing', '1', '".$_POST['last_name']."', '".$_POST['first_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['entry_academic_year']."', '".$_POST['entry_semester']."','".$_POST['login_expiration']."', '" . md5($_POST['student_id']) . "', '".$_POST['course']."', '".$_POST['course']."','$degree_level', '1', '$last_update', '$emp_id', 'No')";
	
						

				$sql2 = "INSERT INTO students_degree
						(student_number, degree_program_id, entry_academic_year, entry_semester, last_updated, last_updated_by)
						
						VALUES ('".$_POST['student_id']."', '".$_POST['course']."', '".$_POST['entry_academic_year']."', '".$_POST['entry_semester']."', '$last_update', '$emp_id')";
				
				mysql_query($sql2);	
				
						
				echo "<script> alert('Student record successfully added.'); window.location.href = 'cso_student_record_management.php';</script>";
			break;

			
			case "ADD LOGIN ACCOUNT":
				session_start();
				$student_ID = $_GET['id'];
				$last_update = time();
				$employee = $_SESSION['employee_id'];
				$password = $_POST['password'];
				$log_expire = $_POST['login_expiration'];
					$sql = "UPDATE student SET
								login_expiration = '$log_expire',
								password = '".md5($_POST['password'])."',
								last_updated = '$last_update',
								last_updated_by = '$employee'
								WHERE student_number = '$student_ID'";
								
					echo "<script> alert('Student login account successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
				
				//header("Location:cso_edit_student_personal_enrollment_data.php?id=$student_ID");
			break;
			
			case "ADD PERSONAL INFO":
				session_start();
				$employee = $_SESSION['employee_id'];
				$student_ID = $_GET['id'];
				$last_update = time();
				
				$sql = "UPDATE student SET
						first_name = '".$_POST['first_name']."',
						last_name = '".$_POST['last_name']."',
						middle_name = '".$_POST['middle_name']."',
						gender = '".$_POST['gender']."', 
						email_address = '".$_POST['email_address']."', 
						civil_status = '".$_POST['civil_status']."', 
						birthdate = '".$_POST['birthdate']."', 
						contact_number = '".$_POST['phone_no']."', 
						father_name = '".$_POST['fathers_name']."', 
						mother_name = '".$_POST['mothers_name']."',
						present_home_number = '".$_POST['present_house_no']."', 
						present_street = '".$_POST['present_street']."', 
						present_barangay = '".$_POST['present_brgy']."', 
						present_city_municipality = '".$_POST['present_city']."', 
						present_contact_number = '".$_POST['present_phone_no']."',
						home_contact_number = '".$_POST['home_phone_no']."', 
						home_house_number = '".$_POST['home_house_no']."', 
						home_street = '".$_POST['home_street']."', 
						home_barangay = '".$_POST['home_brgy']."', 
						home_city_municipality = '".$_POST['home_city']."',
						guardian = '".$_POST['contact_person_name']."', 
						guardian_house_number = '".$_POST['contact_person_house_no']."', 
						guardian_street = '".$_POST['contact_person_street']."', 
						guardian_barangay = '".$_POST['contact_person_brgy']."', 
						guardian_city_municipality = '".$_POST['contact_person_city']."', 
						guardian_contact_number = '".$_POST['contact_person_phone_no']."',
						last_updated = '$last_update',
						last_updated_by = '$employee'
						WHERE student_number = '$student_ID'";
					
					//echo $sql1;											
					echo "<script> alert('Student personal data successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
				

				break;
			
				case "ADD COURSE":
				$student_ID = $_GET['id'];
				$last_update = time();
				session_start();
				$count = 0;
				$employee = $_SESSION['employee_id'];
				$query = "SELECT * FROM students_degree WHERE student_number = '$student_ID'";
				$res = mysql_query($query);
				while ($row = mysql_fetch_array($res)) {
					$prev_ay =  $row['entry_academic_year'];
					$prev_sem =  $row['entry_semester'];
				}
				
				if($prev_ay == $_POST['start_ay'] && $prev_sem == $_POST['start_semester']) {
				$sql = "UPDATE students_degree SET
						degree_program_id = '".$_POST['course']."',
						entry_academic_year = '".$_POST['start_ay']."', 
						entry_semester = '".$_POST['start_semester']."', 
						last_updated = '$last_update',
						last_updated_by = '$employee'
						WHERE student_number = '$student_ID'";
				} else {
					$sql = "INSERT INTO students_degree 
						(student_number, degree_program_id, entry_academic_year, entry_semester, last_updated, last_updated_by) 
						
						VALUES ('$student_ID', '".$_POST['course']."', '".$_POST['start_ay']."', '".$_POST['start_semester']."', '$last_update', '$employee')";
				}
				
				$sqll = "UPDATE student SET
						degree_program_id = '".$_POST['course']."',
						degree_program = '".$_POST['course']."',
						last_updated = '$last_update',
						last_updated_by = '$employee'
						WHERE student_number = '$student_ID'";
				mysql_query($sqll);
				//echo $sqll;
				
				echo "<script> alert('Student course successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
				break;
			

	}
	
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
