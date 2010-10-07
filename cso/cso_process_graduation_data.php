<?php
//File: CSO Student Graduation Data Class
//Version 1: Date: October 06, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	include ("connect_to_database.php");
	$action = $_GET['action'];
	$student = new studentGraduationData();
	
	if($action == "ADD") {
		$student->addGraduationData();
	} else if($action == "DELETE") {
		$student->deleteGraduationData();
	}
	
	
	class studentGraduationData {
	
		//add/edit student graduation data
		function addGraduationData() {
			$stud_num = $_POST['student_id'];
			$date_grad = $_POST['date_graduated'];
			$ay_grad = $_POST['specify_academic_year'];
			$sem_grad = $_POST['semester'];
			$gwa = $_POST['gwa'];
			$honor = $_POST['honor_received'];
			$course = $_POST['course'];
			$prev_ay = '';
			$prev_sem = '';	
			$query = "SELECT * from student WHERE student_number = '$stud_num'";
			$res = mysql_query($query);
			
			while($row = mysql_fetch_array($res)) {
				$prev_ay = $row['academic_year_graduated'];
				$prev_sem = $row['semester_graduated'];
			}
			
			if(($sem_grad!=$prev_sem) && ($ay_grad!=$prev_ay)) {	
				$sql = "UPDATE student SET
						date_graduated = '$date_grad',
						academic_year_graduated = '$ay_grad',
						semester_graduated = '$sem_grad',
						course_graduated = '$course'
					WHERE student_number = '$stud_num' ";
			} else {
				$sql = "UPDATE student SET
						date_graduated = '$date_grad',
						course_graduated = '$course'
					WHERE student_number = '$stud_num' ";
			}
		
			if(isset($sql) && !empty($sql)) {
				echo "<!--" . $sql . "-->";
				$result = mysql_query($sql);
				
				echo "<script> alert('Student graduation data successfully saved.'); window.location.href = 'cso_add_delete_view_graduation_data.php?id=$stud_num';</script>";
			}
			
		}
		
		//delete student graduation data
		function deleteGraduationData() {
			$stud_num = $_GET['id'];
			
			$sql = "UPDATE student SET
						date_graduated = '',
						academic_year_graduated = '',
						semester_graduated = '-1',
						course_graduated = ''
					WHERE student_number = '$stud_num' ";
					
			if(isset($sql) && !empty($sql)) {
				echo "<!--" . $sql . "-->";
				$result = mysql_query($sql);
				
				echo "<script> alert('Student graduation data successfully deleted.'); window.location.href = 'cso_add_delete_view_graduation_data.php?id=$stud_num';</script>";
			}

		}
	
	}
?>
