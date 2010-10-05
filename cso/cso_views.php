<?php
	//session_start();
	
	class Query{
		
		function viewSearchResults(){
			include("connect_to_database.php");
			$count = 0;
			$searchterm = $_POST['search_name'];
			if($searchterm) {
			$sql="select * from student where student_number = '$searchterm' || last_name = '$searchterm' || first_name = '$searchterm'";
			$res=mysql_query($sql);
			while($row=mysql_fetch_array($res)){
				$_SESSION['stud_num'] = $row['student_number']; 
				echo "<tr>";
        		echo "<td><div align='center' class=normaltext></div></td>";
        		echo "<td><div align='center' class=normaltext>".$row['student_number']."</div></td>";
        		echo "<td width='123' class=normaltext>".$row['first_name']." ".$row['last_name']."</td>";
        		echo "<td><div align='center' class=normaltext>".$row['unit_id']."</div></td>";
        		echo "<td><div align='center' class=normaltext>UP CEBU</div></td>
       			<td width='111'><div align='center' class=normaltext>
          		<table width='101' border='0' align='center' cellpadding='0' cellspacing='0' class=normaltext>
            	<tr>
              	<td width='95' class=normaltext><a href='cso_generate_password_change_student_login_account.php?c=NOT&id=".$row['student_number']."'>Login Account</a></td>
            	</tr>
            	<tr>
              	<td class=normaltext><a href='cso_add_student_accountability.php?action=ADD&id=".$row['student_number']."'>Accountability</a></td>
            	</tr>
            	<tr>
              	<td class=normaltext>Enrollment Info</td>
            	</tr>
            	<tr>";
            	echo "<td class=normaltext><a href='cso_student_personal_data.php?id=".$row['student_number']."'>Personal Data</a></td>";
          		echo "</tr>
            	<tr>
              	<td class=normaltext>Student Directory</td>
            	</tr>
          		</table>
        		</div></td>
        		<td><table width='95' border='0' align='center' cellpadding='0' cellspacing='0'>
          		<tr>
            	<td width='95' class=normaltext>Grades/Sched</td>
          		</tr>
          		<tr>
            	<td class=normaltext>Grade Summary</td>
          		</tr>
          		<tr>
            	<td class=normaltext>Study Plan</td>
          		</tr>
          		<tr>";
            	echo "<td class=normaltext><a href='cso_enroll_student.php?id=".$row['student_number']."'>Enroll</a></td>";
          		echo "</tr>
          		<tr>";
            	echo "<td class=normaltext><a href='cso_edit_view_student_course.php?c=NOT&id=".$row['student_number']."'>Course</a></td>";
          		echo "</tr>
        		</table></td>
        		<td width='99'><table width='89' border='0' align='center' cellpadding='0' cellspacing='0'>
          		<tr>";
            	echo "<td width='89' class=normaltext><a href='cso_add_delete_view_graduation_data.php?id=".$row['student_number']."'>Graduation Data</a></td>";
          		echo "</tr>
          		<tr>";
				echo "<td class=normaltext><a href='cso_view_student_scholarship.php?id=".$row['student_number']."'>Scholarship</a></td>";
          		echo "</tr>
				<tr>";
            	echo "<td class=normaltext><a href='cso_view_student_stfap_bracket.php?id=".$row['student_number']."'>STFAP Bracket</a></td>";
          		echo "</tr>
          		<tr>
            	<td class=normaltext>Adviser</td>
          		</tr>";
          
        		echo "</table></td>
				<td width='99'><table width='89' border='0' align='center' cellpadding='0' cellspacing='0'>
          		<tr>
            	<td class=normaltext>Edit Academic Standing</td>
          		</tr>
          		<tr>
            	<td width='99' class=normaltext><a href='cso_edit_maximum_units.php?id=".$row['student_number']."'>Edit Max. Units</a></td>
          		</tr>
          		<tr>";
            	echo "<td class=normaltext><a href='cso_edit_student_number.php?id=".$row['student_number']."'>Edit Student #</a></td>";
          		echo "</tr>
          			<tr>";
           	 	echo "<td class=normaltext><a href='cso_process_delete_student_record.php?id=".$row['student_number']."'>Delete Record/Account</a></td>";
          		echo "</tr>";
          
        		echo "</table></td>";
      			echo "</tr>";
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
				$count = 0;
				$st = "";
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
        			echo "<td><div align='center' class=normaltext>".$subj_id."</div></td>";
        			echo "<td width='75'><div align='center' class=normaltext>".$sect_lab."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$unit."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$day." ".$start."-".$end."</div></td>";
        			echo "<td width='127'><div align='center' class=normaltext>".$st."</div></td>";
        			echo "<td><div align='center' class='headfont'><b><a href='cso_confirm_subject.php?id=$subj_id&lab=$sect_lab&act=$action'>".$action."</a> |  <a href='cso_confirm_subject.php?id=$subj_id&lab=$sect_lab&act=Remove' target='_self' onclick='return getconfirm('Are you sure you want to remove this subject?')'; title='Remove'>  Remove </b></div></td>";
      				echo "</tr>";
					
					$count++;
					if($st=="Confirmed"){
					$unit_confirm = $unit_confirm + $unit;
					}
					
				}
						
					return $unit_confirm;
				}
			
		
		}

?>
