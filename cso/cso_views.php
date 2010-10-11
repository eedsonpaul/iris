<?php
	//session_start();
	
	class Query {
		
		function viewSearchResults(){
			include("connect_to_database.php");
			$count = 0;
			$searchterm = $_POST['search_name'];
			$degree = "";
			
			if($searchterm) {
				$sql="select * from student where student_number = '$searchterm' || last_name = '$searchterm' || first_name = '$searchterm'";
				$res=mysql_query($sql);
				while($row=mysql_fetch_array($res)){
					$_SESSION['stud_num'] = $row['student_number']; 
					$degree_id = $row['degree_program'];
					echo "<tr>";
					echo "<td><div align='center' class=normaltext></div></td>";
					echo "<td><div align='center' class=normaltext><a href='cso_view_student_individual_menus.php?id=".$row['student_number']."'>".$row['student_number']."</a></div></td>";
					echo "<td width='123' align=center class=normaltext><a href='cso_view_student_individual_menus.php?id=".$row['student_number']."'>".$row['first_name']." ".$row['last_name']."</a></td>";
									
					$sql2 = "select * from degree_program where degree_program_id = '$degree_id'";
					$res2 = mysql_query($sql2);
					while($row=mysql_fetch_array($res2)){
						$degree = $row['degree_name'];
					}
					echo "<td><div align='center' class=normaltext>".$degree."</div></td>";
					echo "<td><div align='center' class=normaltext>UP CEBU</div></td>";
					$count++;
				}
				if($count==0) {
					echo "<tr><td colspan=9><br><center><b>NO RECORD FOUND!</b></center></td></tr>";
				}
			} else {
				echo "<tr><td colspan=9><br><center><b>Please enter search term.</b></center></td></tr>";
			}
			
		}
			
			
			function viewStudentRegistration($stud_num) {
				$_SESSION['stud_num'] = $stud_num;
				$unit_confirm = 0;
				$unit_enrolled = 0;
				$count = 0;
				$st = "";
				$stat = "";
				$action = "";
				$sql = "select * from student_status where student_number = '$stud_num'";
				$res = mysql_query($sql);
				
				while($row = mysql_fetch_array($res)){
					$subj_id = $row['course_code'];
					$sect_lab = $row['section_label'];
					$stat = $row['status'];
					
					$sql = "select * from section_schedules where course_code = '$subj_id' && section_label = '$sect_lab'";
					$res3 = mysql_query($sql);
					while($row = mysql_fetch_array($res3)){
						$start = $row['start_time'];
						$end = $row['end_time'];
						$day = $row['day_of_the_week'];
					}
								
					$sql="select * from subject where course_code = '$subj_id'";
					$res2=mysql_query($sql);
						while($row = mysql_fetch_array($res2)){
							$subj_name = $row['subject_title'];
							$unit = $row['units'];
						}
				
						if ($stat=="unconfirmed") {
							$action = "Confirm";
							$st = "Unconfirmed";
						} else if ($stat=="confirmed") {
							$action = "Unconfirm";
							$st = "Confirmed";
						} else if ($stat=="paid") {
							$action = "Cancel Payment";
							$st = "Paid";
						} else if ($stat=="assessed") {
							$action = "Cancel Assessment";
							$st = "Assessed";
						} else if ($stat=="enrolled") {
							$action = "Cancel Enrollment";
							$st = "Officially Enrolled";
						} else if ($stat=='waitlisted') {
							$action = "Confirm";
							$st = "Waitlisted";
						}
				
						$_SESSION['sub_id'] = $subj_id;
						$_SESSION['sec_lab'] = $sect_lab;
						$_SESSION['action'] = $action;
						
					echo "<tr>";
        			echo "<td>&nbsp;</td>";
        			echo "<td><div align='center' class=normaltext>".strtoupper($subj_id)."</div></td>";
        			echo "<td width='75'><div align='center' class=normaltext>".$sect_lab."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$unit."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$day." ".$start." - ".$end."</div></td>";
        			echo "<td width='127'><div align='center' class=normaltext>".$st."</div></td>";
					
					if ($action=="Cancel Enrollment" || $action=="Cancel Assessment" || $action=="Cancel Payment" || $action=="Unconfirm") {
        				echo "<td><div align='center' class='headfont'><b><a href='cso_confirm_subject.php?id=$subj_id&lab=$sect_lab&act=$action'>".$action."</a></b></div></td>";
					} else {
						echo "<td><div align='center' class='headfont'><b><a href='cso_confirm_subject.php?id=$subj_id&lab=$sect_lab&act=$action'>".$action."</a> |  <a href='cso_confirm_subject.php?id=$subj_id&lab=$sect_lab&act=Remove' target='_self' onclick='return getconfirm('Are you sure you want to remove this subject?')'; title='Remove'>  Remove </b></div></td>";
					}
      				echo "</tr>";
					
					$count++;
					if($stat=="confirmed"){
						$unit_confirm = $unit_confirm + $unit;
					} else if($stat=="enrolled") {
						$unit_enrolled = $unit_enrolled + $unit;
					}
				}
					if($stat=="confirmed"){
						return $unit_confirm;
					} else if($stat=="enrolled") {
						return $unit_enrolled;
					}
			}
				
				
				function viewStudentMenus($studnum) {
					echo "<table width='450' border='0' align='center' cellpadding='0' cellspacing='0' class=normaltext>
						<tr height='25'>
						 <td><a href='cso_generate_password_change_student_login_account.php?c=NOT&p=NO&id=".$studnum."'>Login Account</a></td>
						 <td><a href='cso_add_student_accountability.php?action=ADD&id=".$studnum."'>Accountability</a></td>
						 <td><a href='cso_edit_enrolldata1.php'>Enrollment Info</a></td>
						</tr>
						<tr height='25'>
						 <td><a href='cso_edit_student_personal_enrollment_data.php?action=NOT&id=".$studnum."'>Personal Data</a></td>
						 <td><a href='cso_view_student_grades.php?id=".$studnum."'>Grade Summary</a></td>
						 <td>Study Plan</td>
						</tr>
						<tr height='25'>
						 <td><a href='cso_enroll_student.php?id=".$studnum."'>Enroll</a></td>
						 <td<a href='cso_edit_view_student_course.php?c=NOT&id=".$studnum."&change=NO'>Course</a></td>
						 <td><a href='cso_add_delete_view_graduation_data.php?id=".$studnum."'>Graduation Data</a></td>
						</tr>
						<tr height='25'>
						 <td><a href='cso_view_student_scholarship.php?id=".$studnum."'>Scholarship</a></td>
						 <td><a href='cso_view_student_stfap_bracket.php?id=".$studnum."'>STFAP Bracket</a></td>
						 <td>Adviser</td>
						</tr>
						<tr height='25'>
						 <td><a href='cso_edit_maximum_units.php?id=".$studnum."'>Edit Max Units</a></td>
						 <td><a href='cso_edit_student_number.php?id=".$studnum."'>Edit Student No.</a></td>
						 <td><a href='cso_process_delete_student_record.php?id=".$studnum."'>Delete Record/Account</a></td>
						</tr>			  						
						</table>";
				
				}
			
	}

?>
