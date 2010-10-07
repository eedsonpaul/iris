<?php
//File: CSO Student Lists
//Version 1: Date: October 06, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	class studentLists {
	
		function viewPreenlistedStudents() {
			
		}
		
		function viewStudentsConfirmedButNotOfficiallyEnrolled() {
			include("connect_to_database.php");
			//$semester = $_SESSION['current_semester'];
			//$academic_year = $_SESSION['current_year'];
			$last_name = '';
			$first_name = '';
			$middle_name = " ";
			$course = '';
			$degree = "";
			$stud_no = "";					
				$sql = "select student_number from student_status where status = 'confirmed'";
				$res3 = mysql_query($sql);
				while($row = mysql_fetch_array($res3)){
					$student_id = $row['student_number'];				
					if($stud_no != $row['student_number']) {
						$sql="select last_name, first_name, middle_name, degree_program from student where student_number = '$student_id'";
						$res2=mysql_query($sql);
						while($row = mysql_fetch_array($res2)){
							$last_name = $row['last_name'];
							$first_name = $row['first_name'];
							$middle_name = $row['middle_name'];
							$course = $row['degree_program'];
					
							$sql="select * from degree_program where degree_program_id = '$course'";
							$res2=mysql_query($sql);
							while($row = mysql_fetch_array($res2)){
								$degree = $row['degree_name'];
							}
					
							echo "<tr><td><div align=left>".$student_id."</div></td>
							<td><div align=center>".$last_name.", ".$first_name." ".$middle_name."</div></td>
							<td><div align=center>".$degree."</div></td></tr>";
					
					
						}
					} 
					$stud_no = $student_id;
				}
				
				
			
		}
	
		function viewEnrolledStudents() {
			
		}
		
		function viewStudentsWithConfirmedSubjects() {
			
		}
	}
?>