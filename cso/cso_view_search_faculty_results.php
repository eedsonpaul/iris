<?php
//File: CSO View Faculty Schedule Search Results
//Version 2: Date: October 08, 2010
//Version 1: Date: October 06, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	//displays faculty search results
	class facultyResults {
		function viewFaculty() {
			$flast_name = $_POST['last_name'];
			$lname = '';
			$mname = ' ';
			$emp_id = '';
			
			$sql = "SELECT * from employee WHERE (last_name LIKE 'flast_name%' && access_level_id = 2) || (last_name = 'flast_name' && access_level_id = 2)";
			$result = mysql_query($sql);
			while ($faculty = mysql_fetch_array($result)) {
				$fname = $faculty['first_name'];
				$lname = $faculty['last_name'];
				$mname = $faculty['middle_name'];
				$emp_id = $faculty['employee_id'];
				
				    echo "<tr>
							<td height=36><center>".$emp_id."</center></d>
							<td><center>".$fname." ".$mname[0].". ".$lname."</center></td>
							<td><center><a href='cso_view_faculty_schedule.php?id=".$emp_id."'>VIEW</a></center></td>
						</tr>";
			}
		}
		
		//displays the schedule of the faculty searched
		function viewFacultySchedule($emp_id) {
			$sql = "select * from section WHERE employee_id = '$emp_id'";
			$res = mysql_query($sql);
			$units = 0;	
			while($row = mysql_fetch_array($res)){
				$subj_id = $row['course_code'];
				$sect_lab = $row['section_label'];
				$room = $row['room_id'];
				$class = $row['class_type'];
				$total = $row['total_slots'];
				$avail = $row['available_slots'];
				$waitlist = $row['waitlist_count'];
				$confirm = $row['confirmed_count'];
				$enrolled = $row['enrolled_count'];
				$class = $row['class_type'];
				
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
					$unit = $row['units'];
				} 
				echo "<tr>
					<td><div align=right>".strtoupper($subj_id)."</div></td>
					<td><div align=center>".$sect_lab."</div></td>
					<td><div align=center>".$day." / ".$start." - ".$end." / ".$class." / ".$room."</div></td>
					<td><div align=center>".$unit."</div></td>
					<td><div align=center>".$enrolled."</div></td>
				</tr>";
				
				$units = $units + $unit;
			}
			
			return $units;
		}
	}
?>