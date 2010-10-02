<?php
	session_start();
	include("connect_to_database.php");
	
			$sub_id = $_GET['id'];
			$sec_id = $_GET['lab'];
			$stud_num = $_SESSION['stud_num'];
			$action = $_GET['act'];
			
			if ($action=="Confirm") {
				$sql="select * from prerequisite where course_code = '$sub_id'";
				$count = 0;
				$res = mysql_query($sql);
				
				while($row=mysql_fetch_array($res)){
					extract($row);
					$sql="select * from grade where student_number = '$stud_num' && course_code = '$sub_id' && section_label = '$sec_id' && (initial_grade <= 3 || (initial_grade = 4 && completion_grade >= 3) || (grade_status = 'inc' && completion_grade >= 3))";
					$result = mysql_query($sql);
					while($row=mysql_fetch_array($result)){
					$count++;
					}
				}
				
				$sqll="select * from student_status where student_number = '$stud_num' && status = 'waitlisted'";
				$wait_count = 0;
				$resu = mysql_query($sqll);
				
				while($row=mysql_fetch_array($resu)){
					extract($row);
					$wait_count++;
				}

				if ($count==0 && $wait_count==0) {
					$sql = "UPDATE student_status SET
					status = 'confirmed' WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
					mysql_query($sql);
					echo "<script> alert('Subject successfully confirmed.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
				} else {
					echo "<script> alert('Cannot confirm subject.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
				}
			} else if ($action=="Unconfirm") {
				$sql = "UPDATE student_status SET
				status = 'unconfirmed' WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
				mysql_query($sql);
				echo "<script> alert('Subject successfully unconfirmed.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
			} else if ($action=="Cancel Payment") {
				$sql = "UPDATE student_status SET
				status = 'assessed' WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
				mysql_query($sql);
				echo "<script> alert('Payment successfully cancelled.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
			} else if ($action=="Cancel Assessment") {
				$sql = "UPDATE student_status SET
				status = 'confirmed' WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
				mysql_query($sql);
				echo "<script> alert('Assessment successfully cancelled.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
			} else if ($action=="Cancel Enrollment") {
				$sql = "UPDATE student_status SET
				status = 'paid' WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
				mysql_query($sql);
				echo "<script> alert('Enrollment successfully cancelled.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
			} else if ($action=="Remove") {
				$sql = "DELETE FROM student_status WHERE student_number = '$stud_num' && section_label = '$sec_id' && course_code = '$sub_id'";
				mysql_query($sql);
				header ("Location: cso_enroll_student.php?id=$stud_num");
				//echo "<script> alert('Subject successfully removed.'); window.location.href = 'cso_enroll_student.php?id=$stud_num';</script>";
                
			}
?>