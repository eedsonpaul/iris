<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSO Process Add Student Record</title>
</head>

<body>
<?php
	include("connect_to_database.php");
	
	switch ($_GET['action']) {
	
			case "ADD STUDENT":
				session_start();
				$emp_id = $_SESSION['employee_id'];
				$last_update = time();
				$student_ID = $_POST['student_id'];

				$sql = "INSERT INTO student 
						(student_number, last_name, first_name, middle_name, gender, entry_academic_year, entry_semester, citizenship, login_expiration, password, degree_program, access_level_id, last_updated, last_updated_by)
					
					VALUES ('".$_POST['student_id']."', '".$_POST['last_name']."', '".$_POST['first_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['entry_academic_year']."', '".$_POST['entry_semester']."', '".$_POST['citizenship']."', '".$_POST['login_expiration']."', '" . md5($_POST['student_id']) . "', '".$_POST['course']."', '1', '$last_update', '$emp_id')";
				
			
				$sqll = "INSERT INTO students_degree 
						(student_number, degree_program_id, entry_academic_year, entry_semester, last_updated, last_updated_by)
						
						VALUES ('".$_POST['student_id']."', '".$_POST['course']."', '".$_POST['entry_academic_year']."', '".$_POST['entry_semester']."', '$last_update', '$emp_id')";
				mysql_query($sqll);
						
				echo "<script> alert('Student record successfully added.'); window.location.href = 'cso_student_record_management.php';</script>";
			break;
			
			case "ADD STUDENT ID":
				$last_update = time();
				$student_ID = $_POST['student_id'];
				$sql = "INSERT INTO student 
						(student_number, last_updated)
					
					VALUES ('".$_POST['student_id']."', '$last_update')";
					
				header("Location:cso_generate_password_change_student_login_account.php?id=$student_ID");
			break;
			
			case "ADD LOGIN ACCOUNT":
				$student_ID = $_GET['id'];
				$last_update = time();
				$sql = "UPDATE student SET
							password = '".$_POST['password'] ."',
							last_name = '".$_POST['last_name']."',
							first_name = '".$_POST['first_name']."',
							middle_name = '".$_POST['middle_name']."',
							gender = '".$_POST['gender']."',
							entry_academic_year = '".$_POST['entry_academic_year']."',
							entry_semester = '".$_POST['entry_semester']."',
							last_updated = '$last_update'
							WHERE student_number = '$student_ID'";
							
				echo "<script> alert('Student login account successfully updated.'); window.location.href = 'cso_add_student_personal_data.php?id=$student_ID';</script>";
				//header("Location:cso_edit_student_personal_enrollment_data.php?id=$student_ID");
			break;
			
			case "ADD PERSONAL INFO":
				$student_ID = $_GET['id'];
				$lname = $_POST['last_name'];
				$fname = $_POST['first_name'];
				$midname = $_POST['middle_name'];
				$gen = $_POST['gender'];
				$bdate = $_POST['birthdate'];
				$eadd = $_POST['email_address'];
				$parbrgy = $_POST['parents_brgy'];
				$parcty = $_POST['parents_city'];
				$homebrgy = $_POST['home_brgy'];
				$homecty = $_POST['home_city'];
				$guard = $_POST['contact_person_name'];
				$guardbrgy = $_POST['contact_person_brgy'];
				$guardcity = $_POST['contact_person_city'];
				$last_update = time();
				
				$sql = "UPDATE student SET
						gender = '".$_POST['gender']."', 
						email_address = '".$_POST['email_address']."', 
						civil_status = '".$_POST['civil_status']."', 
						birthdate = '".$_POST['birthdate']."', 
						contact_number = '".$_POST['phone_no']."', 
						father_name = '".$_POST['fathers_name']."', 
						mother_name = '".$_POST['mothers_name']."', 
						parent_street = '".$_POST['parents_street']."', 
						parent_barangay = '".$_POST['parents_brgy']."', 
						parent_city_municipality = '".$_POST['parents_city']."', 
						present_street = '".$_POST['present_street']."', 
						present_barangay = '".$_POST['present_brgy']."', 
						present_city_municipality = '".$_POST['present_city']."', 
						present_contact_number = '".$_POST['present_phone_no']."', 
						home_house_number = '".$_POST['home_house_no']."', 
						home_street = '".$_POST['home_street']."', 
						home_barangay = '".$_POST['home_brgy']."', 
						home_city_municipality = '".$_POST['home_city']."', 
						guardian_house_number = '".$_POST['contact_person_house_no']."', 
						guardian_street = '".$_POST['contact_person_street']."', 
						guardian_barangay = '".$_POST['contact_person_brgy']."', 
						guardian_city_municipality = '".$_POST['contact_person_city']."', 
						guardian_contact_number = '".$_POST['contact_person_phone_no']."',
						last_updated = '$last_update' WHERE student_number = '$student_ID'";
																
					echo "<script> alert('Student personal data successfully updated.'); window.location.href = 'cso_edit_view_student_course.php?c=SAME&id=$student_ID';</script>";
				
//				} else {
//					$student_ID = $_GET['id'];
//					
//				}
				break;
			
				case "ADD COURSE":
				$student_ID = $_POST['student_id'];
				$last_update = time();
				$sql = "UPDATE students_degree SET
						entry_academic_year = '".$_POST['start_ay']."', 
						entry_semester = '".$_POST['start_semester']."', 
						last_updated = '$last_update'
						WHERE student_number = '$student_ID'";
				
				$sqll = "UPDATE student SET
						entry_academic_year = '".$_POST['start_ay']."', 
						entry_semester = '".$_POST['start_semester']."', 
						last_updated = '$last_update'
						WHERE student_number = '$student_ID'";
				mysql_query($sqll);
				
				echo "<script> alert('Student course successfully updated.'); window.location.href = 'cso.php';</script>";
				break;
			

	}
	
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
</body>
</html>
