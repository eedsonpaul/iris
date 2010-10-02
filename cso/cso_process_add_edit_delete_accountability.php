<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSO Process Add/Edit/Delete Accountability</title>
</head>

<body>
<?php
	include("connect_to_database.php");
	
	switch ($_GET['action']) {
	
			case "ADD ACCOUNTABILITY":
				$student_ID = $_GET['id'];
				$count = 0;
				$accountability_ID = 0;
				$query = "SELECT accountability_id FROM cso_accountability where accountability_name = '".$_POST['accountability']."'";
				$result = mysql_query($query);
        			while ($row = mysql_fetch_array($result)) {
					extract($row);
					$count++;
					$accountability_ID = $accountability_id;
				} 
				if ($count == 0) {
					$sql = "INSERT INTO cso_accountability 
							(accountability_name, accountability_details)
					
						VALUES (
							'".$_POST['accountability']."', '".$_POST['accountability_details']."')";
					
					$query = "SELECT accountability_id FROM cso_accountability where accountability_name = '".$_POST['accountability']."'";
					$result = mysql_query($query);
        				while ($row = mysql_fetch_array($query)) {
						extract($row);
						$accountability_ID = $accountability_id;
					}

					$query2 = "INSERT INTO cso_student_accountability 
							(student_number, accountability_id, amount_due, academic_year_incurred, semester_incurred, exact_date_incurred, 
							unit_accountability_incurred)
						VALUES (
							'$student_ID', '$accountability_ID', '".$_POST['amount_due']."', '".$_POST['academic_year_incurred']."', 
							'".$_POST['semester_incurred']."', '".$_POST['exact_date_incurred']."', 'CSO')";
					mysql_query($query2);
	

				} else {
					$search = "SELECT accountability_id FROM cso_accountability where accountability_name = '".$_POST['accountability']."'";
					$result = mysql_query($search);
        				while ($row = mysql_fetch_array($result)) {
						extract($row);
						$accountability_ID = $accountability_id;
					} 
					
					$sql = "INSERT INTO cso_student_accountability 
							(student_number, accountability_id, amount_due, academic_year_incurred, semester_incurred, exact_date_incurred, 
							unit_accountability_incurred)
						VALUES (
							'$student_ID', '$accountability_ID', '".$_POST['amount_due']."', '".$_POST['academic_year_incurred']."', 
							'".$_POST['semester_incurred']."', '".$_POST['exact_date_incurred']."', 'CSO')";
	
				}
				
				echo "<script> alert('<?php echo $count;?>'); window.location.href = 'cso_students_accountabilities_module.php?id=$student_ID';</script>";
			break;
			
			case "EDIT ACCOUNTABILITY":
				$student_ID = $_GET['id'];
				$sql = "UPDATE cso_student SET
							last_name = '".$_POST['last_name']."',
							first_name = '".$_POST['first_name']."',
							middle_name = '".$_POST['middle_name']."',
							gender = '".$_POST['gender']."',
							login_expiration = '".$_POST['login_expiration']."',
							entry_academic_year = '".$_POST['entry_academic_year']."',
							entry_semester = '".$_POST['entry_semester']."' WHERE student_number = '$student_ID'";
				header("Location:cso_edit_student_personal_enrollment_data.php?id=$student_ID");
			break;
			
	}
	
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
</body>
</html>
