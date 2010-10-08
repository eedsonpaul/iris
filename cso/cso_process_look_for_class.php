<?php
//File: CSO Classes Management Module
//Version 1: Date: September 23, 2010
//By: Stefany Marie Serino
//CSO TEAM

	require_once 'cso_header.php';
	
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	//session_start();
	if ($_SESSION['employee_id'] == NULL) header("Location: index.php");
	$employee_id = $_SESSION['employee_id'];
	$access_level_id = $_SESSION['access_level_id'];
	$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$employee_id'");
	$data = mysql_fetch_array($res);
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'][0].'.';
	$unit_id = $data['unit_id'];
	$designation_id = $data['designation_id'];
	$res2= mysql_query("SELECT designation FROM designation WHERE designation_id='$designation_id'");
	$data2 = mysql_fetch_array($res2);
	$designation = $data2['designation'];
	$res1 = mysql_query("SELECT unit_name FROM unit WHERE unit_id='$unit_id'");
	$data1 = mysql_fetch_array($res1);
	$unit = $data1['unit_name'];
?>

	
	<div id="right_side">
		<p><a href='javascript:history.go(-1)'>Back</a></p>
		<p>
			<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
			<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
			<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
			<b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
		</p>
		<p class="head"><strong>Classes Management Module</strong></p>
		<!-- <p class="headfont"><strong>Add Class</strong></p> --> 
		<p>&nbsp;</p>
		<form action="cso_process_look_for_class.php" method="post">
			<table width=75% border="0" align="center">
				<tr>
					<td align=right><strong>Look for: &nbsp; </strong></td>
					<td width=150><input type="text" name="class_name" id="class_name"></td>
					<td><input type="submit" name="look_for_class" id="look_for_class" value="SUBMIT"></td>
				</tr>
			</table>
		</form>
		

		
		<?php
			include("connect_to_database.php");
			$class_name = $_POST['class_name'];
			$class_array = mysql_query ("SELECT * FROM subject WHERE course_code LIKE '%$class_name%' ");
			$count = 1;
			
			echo	"<table width= 710 class=tab><tr>
			<th align=center  valign=middle width=20><strong>#</strong></th>
			<th align=center  valign=middle width=80><strong>COURSE CODE</strong></th>
			<th align=center  valign=middle width=140><strong>SUBJECT</strong></th>
			<th align=center  valign=middle width=50><strong>SECTION</strong></th>
			<th align=center  valign=middle width=30><strong>UNITS</strong></th>
			<th align=center  valign=middle width=110><strong>A/ T/ C/ E/ W</strong></th>
			<th align=center  valign=middle width=160><strong>SCHEDULE</strong></th>
			<th align=center  valign=middle width=120><strong>ACTION</strong></th>
			</tr>";

			$c=0;
			
			while ($list = mysql_fetch_array($class_array)) {
				$course_code = $list['course_code'];
				$subj_title = $list['subject_title'];
				$units = $list['units'];

				$section_array = mysql_query("SELECT * FROM section where course_code='$course_code' ");
				while ($section_list = mysql_fetch_array($section_array)) {
					
					$section = $section_list['section_label'];
					$available = $section_list['available_slots'];
					$allotted = $section_list['total_slots'];
					$confirmed = $section_list['confirmed_count'];
					$enrolled = $section_list['enrolled_count'];
					$waitlisted = $section_list['waitlist_count'];
					$type = $section_list['class_type'];
					$dissolved = $section_list['dissolved'];

					echo "<tr><td align=center wdith=20>". $count. "</td>";
					$count++;
					
					echo "<td align=center width=80>" .$course_code. "</td>".
							"<td align=center width=140>" .$subj_title. "</td>".
							"<td align=center width=50>" .$section. "</td>".
							"<td align=center width=30>" .$units. "</td>".
							"<td align=center width=110>" .$available. " /"
														 .$allotted. " /"
														 .$confirmed. " /"
														 .$enrolled. " /"
														 .$waitlisted. "</td>";

					$sched = mysql_query("SELECT * FROM section_schedules WHERE course_code='$course_code' and section_label='$section' ");
					$sched_info = mysql_fetch_array($sched);
					
					$day = $sched_info['day_of_the_week'];
					$start = $sched_info['start_time'];
					$end = $sched_info['end_time'];

					$room_id = $section_list['room_id'];
					$r = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE room_id='$room_id' "));

					$bldg_id = $r['building_id'];
					$b = mysql_fetch_array(mysql_query("SELECT * FROM building WHERE building_id='$bldg_id' "));
					$bldg = $b['building_name'];

					$faculty_id = $section_list['employee_id'];
					$q = mysql_fetch_array(mysql_query("SELECT * FROM employee WHERE employee_id='$faculty_id' "));
					$faculty_last_name = $q['last_name'];
					$faculty_first_name = $q['first_name'];

					echo "<td width=160>" 	.$day. " "
										.$start. " - " .$end. "<br>"
										.$type. " " 
										.$bldg. " " .$room_id. "<br>"
										.$faculty_first_name. " ";
										
										if ($dissolved == 1) echo $faculty_last_name. "</td><td align=center width=120><b>Dissolved</b></td></tr>";
										else if ($dissolved == 0) echo $faculty_last_name. "</td><td align=center width=120><a href='cso_view_list.php?class=$course_code&section=$section''>LIST</a> | <a href='cso_process_dissolve_class.php?id=$course_code&sec=$section'>DISSOLVE</a> | <a href='cso_edit_class.php?id=$course_code&sec=$section'>EDIT</a></td></tr>";						
				}
				$c++;
			}

			if ($c == 0) echo "<tr height=30></tr><tr><td colspan=8 align=center><strong>NO RECORD FOUND!</strong></td></tr>";
			echo "</table>";
		?>
		
		<p>&nbsp;</p>	
		<p>
			<strong>LEGEND:</strong><br>
			&nbsp; <strong>A</strong> = Available Slots<br>
			&nbsp; <strong>T</strong> = Total Slots<br>
			&nbsp; <strong>C</strong> = Confirmed<br>
			&nbsp; <strong>E</strong> = Enrolled<br>
			&nbsp; <strong>W</strong> = Waitlisted<br>
		</p>
	</div>

<?php
	//Page Footer
	require_once 'cso_footer.php';
?>
