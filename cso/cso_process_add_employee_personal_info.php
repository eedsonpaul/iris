<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSO Process Add Employee Record</title>
</head>

<body>
<?php
	include("connect_to_database.php");
	
	switch ($_GET['action']) {
		case "ADD EMPLOYEE ID":
			$empID = $_POST['employee_id'];
			$last_update = time();
			$sql = "INSERT INTO employee 
						(employee_id, last_updated)
				
					VALUES ('$empID', '$last_update')";
	  
				echo "<script> alert('Employee ID successfully added. '); window.location.href = 'cso_add_employee_record.php?action=ADD&id=$empID';</script>";
				break;
	
		case "ADD PERSONAL INFO":
		   $empID = $_GET['id'];
			$lastname = $_POST['last_name'];
			$firstname= $_POST['first_name'];
			$last_update = time();
			$sql = "UPDATE employee SET
						last_name = '".$_POST['last_name']."', 
						first_name = '".$_POST['first_name']."', 
						middle_name = '".$_POST['middle_name']."', 
						gender = '".$_POST['gender']."', 
						email_address = '".$_POST['email_address']."', 
						civil_status = '".$_POST['civil_status']."', 
						birthdate = '".$_POST['birthdate']."', 
						contact_number = '".$_POST['phone_no']."', 
						employee_type = '".$_POST['employee_type']."',
						housing_type = '".$_POST['housing_type']."', 
						citizenship = '".$_POST['citizenship']."', 
						spouse_name = '".$_POST['spouse_name']."', 
						spouse_contact_number = '".$_POST['spouse_phone_number']."', 
						father_name = '".$_POST['fathers_name']."', 
						mother_name = '".$_POST['mothers_name']."', 
						parent_address = '".$_POST['parents_address']."', 
						present_address = '".$_POST['present_address']."', 
						guardian = '".$_POST['contact_person_name']."', 
						guardian_address = '".$_POST['contact_person_address']."',
						last_updated = '$last_update'
						WHERE employee_id = '$empID'";
				
	  
				echo "<script> alert('Employee personal info successfully added. '); window.location.href = 'cso_add_employee_login_info.php?action=ADD&id=$empID';</script>";
				break;
				
			case "ADD LOGIN INFO":
				
			$id = $_GET['id'];
			$last_update = time();
				if ($_POST['password']==$_POST['retyped_password']) {
					$sql = "UPDATE employee SET
							last_name = '".$_POST['last_name']."',
							first_name = '".$_POST['first_name']."',
							middle_name = '".$_POST['middle_name']."',
							gender = '".$_POST['gender']."',
							username = '".$_POST['login_name']."',
							password = '".$_POST['password']."',
							security_question = '".$_POST['security_question']."',
							security_answer = '".$_POST['answer']."',
							last_updated = '$last_update'
						 	WHERE employee_id= '$id'";
				
				echo "<script> alert('Employee successfully added.'); window.location.href = 'cso.php';</script>";
				} else {
					echo "<script> alert('Passwords do not match.'); window.location.href = 'cso_add_employee_login_info.php?id=$id';</script>";	
				}
			break;
			
			case "EDIT PERSONAL DATA":
				
		   $id = $_GET['id'];
		   $last_update = time();
				$sql = "UPDATE employee SET
						last_name = '".$_POST['last_name']."', 
						first_name = '".$_POST['first_name']."',
						middle_name = '".$_POST['middle_name']."',
						gender = '".$_POST['gender']."', 
						email_address = '".$_POST['email_address']."', 
						civil_status = '".$_POST['civil_status']."', 
						birthdate = '".$_POST['birthdate']."', 
						contact_number = '".$_POST['phone_no']."', 
						employee_type = '".$_POST['employee_type']."', 
						unit_id = '".$_POST['unit_id']."', 
						designation_id = '".$_POST['desig_id']."', 
						housing_type = '".$_POST['housing_type']."', 
						citizenship = '".$_POST['citizenship']."', 
						spouse_name = '".$_POST['spouse_name']."', 
						spouse_contact_number = '".$_POST['spouse_phone_number']."', 
						father_name = '".$_POST['fathers_name']."',  
						mother_name = '".$_POST['mothers_name']."',
						parents_address = '".$_POST['parents_address']."', 
						present_address =  '".$_POST['present_address']."',
						guardian =  '".$_POST['contact_person_name']."',	
						guardian_address = '".$_POST['contact_person_address'].",
						last_updated = '$last_update' 
						WHERE employee_id = '$id'";	
						
				echo "<script> alert('Employee personal successfully updated.'); window.location.href = 'cso.php';</script>";		
				break;
	}
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
</body>
</html>
