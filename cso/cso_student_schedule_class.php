<?php
	//session_start();
	
	class studentSchedule {
			
			
			function viewStudentSchedule($stud_num) {
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
				
						$_SESSION['sub_id'] = $subj_id;
						$_SESSION['sec_lab'] = $sect_lab;
						$_SESSION['action'] = $action;
						
					echo "<tr>";
        			echo "<td>&nbsp;</td>";
        			echo "<td><div align='center' class=normaltext>".strtoupper($subj_id)."</div></td>";
        			echo "<td width='75'><div align='center' class=normaltext>".$sect_lab."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$unit."</div></td>";
        			echo "<td><div align='center' class=normaltext>".$day." ".$start." - ".$end."</div></td>";
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
