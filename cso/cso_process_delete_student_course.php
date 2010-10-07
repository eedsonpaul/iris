<?php
	include("connect_to_database.php");
	

		$id = $_GET['id'];
		$sql = "UPDATE student SET degree_program = '0', semester = '-1' WHERE student_number = '$id'";				
		$sqll = "DELETE FROM students_degree WHERE student_number = '$id'";
		mysql_query($sqll);
		echo "<script> alert('Student course successfully deleted.'); window.location.href = 'cso_edit_view_student_course.php?c=NOT&id=$id&change=YES';</script>";

				
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
	}
?>
