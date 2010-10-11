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
	
			case "EDIT STUDENT NUMBER":
				session_start();
				$student_num = $_GET['id'];
				$stnum = $_SESSION['student_number'];
				$last_update = time();
				$student_ID = $_POST['student_id'];
				$sqll = "SELECT student_number FROM student WHERE student_number = '$student_ID'";
				$result = mysql_query($sqll);
				$stud_num = "";
				while ($row = mysql_fetch_array($result)) {
					extract($row);
					$stud_num = $student_number;
				}
				
				if($stud_num=="") {
				$sql = "UPDATE student SET
						student_number = '".$_POST['student_id']."', 
						last_updated = '$last_update' WHERE student_number='$student_num'";
				$sql1 = "UPDATE students_degree SET
						student_number = '".$_POST['student_id']."', 
						last_updated = '$last_update' WHERE student_number='$student_num'";
				$sql2 = "UPDATE accountability SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql3 = "UPDATE assessment SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql4 = "UPDATE grade SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql5 = "UPDATE scholars SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql6 = "UPDATE slb SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql7 = "UPDATE student_assessment SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				$sql8 = "UPDATE student_status SET
						student_number = '".$_POST['student_id']."' 
						WHERE student_number='$student_num'";
				mysql_query($sql1);
				mysql_query($sql2);
				mysql_query($sql3);
				mysql_query($sql4);
				mysql_query($sql5);
				mysql_query($sql6);
				mysql_query($sql7);
				mysql_query($sql8);
				echo "<script> alert('Student number successfully updated.'); window.location.href = 'cso_student_record_management.php';</script>";
				} else if($stud_num==$student_ID){
						echo "<script> alert('Student number already exists. Please input another student number'); window.location.href = 'cso_edit_student_number.php?id=$stnum';</script>";
				}
			break;
			

	}
	
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
</body>
</html>
