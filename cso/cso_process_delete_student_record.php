<?php
	include("connect_to_database.php");
	

		$id = $_GET['id'];				
		$sql = "DELETE FROM student WHERE student_id = '$id'";
		$sqll = "DELETE FROM students_degree WHERE student_id = '$id'";
		mysql_query($sqll);
	
		echo "<script> alert('Student successfully removed.'); window.location.href = 'cso.php';</script>";

				
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
	}
?>
