<?php
	include("connect_to_database.php");
	

		$id = $_GET['id'];				
		$sql = "DELETE FROM student WHERE student_number = '$id'";
		$sqll = "DELETE FROM students_degree WHERE student_number = '$id'";
		$sql1 = "DELETE FROM student_status WHERE student_number = '$id'";
		$sql2 = "DELETE FROM student_assessment WHERE student_number = '$id'";
		$sql3 = "DELETE FROM slb WHERE student_number = '$id'";
		$sql4 = "DELETE FROM scholars WHERE student_number = '$id'";
		$sql5 = "DELETE FROM grade WHERE student_number = '$id'";
		$sql6 = "DELETE FROM assessment WHERE student_number = '$id'";
		$sql7 = "DELETE FROM adviser_history WHERE student_number = '$id'";
		$sql8 = "DELETE FROM accountability WHERE student_number = '$id'";
		
		mysql_query($sqll);
		mysql_query($sql1);
		mysql_query($sql2);
		mysql_query($sql3);
		mysql_query($sql4);
		mysql_query($sql5);
		mysql_query($sql6);
		mysql_query($sql7);
		mysql_query($sql8);
	
		echo "<script> alert('Student successfully deleted.'); window.location.href = 'cso.php';</script>";

				
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
	}
?>
