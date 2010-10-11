<?php
//File: CSO Degree Programs
//Version 2: Revision Date: October 5, 2010
//Version 1: Date: September 19, 2010
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


	
	<!--if students per class, mao ni -->
	<div id="right_side">

		<p><a href='javascript:history.go(-1)'>Back</a></p>
		<p>
	    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
	      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
	      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
	        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
		</p>
		<p>&nbsp;</p>

		<p class="head"><strong>LIST OF STUDENTS PER CLASS</strong></p>
		<p>&nbsp;</p>
				
		<center><table width=700 class=tab><tr>
			<th align=center width=220>FACULTY</th>
			<th align=center width=150>CLASS</th>
			<th align=center width=150>SCHEDULE</th>
			<th align=center width=80>POPULATION</th>
			<th align=center width=100></th>
		</tr>
		<?php
			$faculty_array = mysql_query("SELECT * FROM faculty");
			while ($faculty_ids = mysql_fetch_array($faculty_array)) {
				$employee_id = $faculty_ids['employee_id'];
				
				$loop=0;
				$teacher_array = mysql_query("SELECT * FROM employee WHERE employee_id='$employee_id' ORDER BY last_name ASC");
				if (mysql_num_rows($teacher_array) != 0) {
					while ($teachers = mysql_fetch_array($teacher_array)) {
						extract($teachers);
											
						$class_array = mysql_query ("SELECT * FROM section WHERE employee_id='$employee_id' ORDER BY course_code ASC");
						if (mysql_num_rows($class_array) != 0) {
							while ($classes = mysql_fetch_array($class_array)) {
								extract($classes);
														
								if ($loop == 0) echo "<tr><td >" .$last_name. ", " .$first_name. " " .$middle_name ."</td>";
								else echo "<tr><td width=10></td>";
								$loop++;
								
								if ($dissolved != 1) {
									echo "<td >" .$course_code. " " .$section_label ." (" .$class_type .")</td>";
									
									$sched = mysql_query("SELECT * FROM section_schedules WHERE course_code='$course_code' and section_label='$section_label' ");
									$sched_info = mysql_fetch_array($sched);
									extract($sched_info);
									
									$sql= mysql_query("SELECT b.building_name FROM room a, building b WHERE a.room_id='$room_id' AND a.building_id=b.building_id");
									$room = mysql_fetch_array($sql);
									
									echo "<td >" .$day_of_the_week. " " .$start_time. " - " .$end_time ."<br>" .$room['building_name']. " " .$room_id ."</td>";
									echo "<td >" .$enrolled_count. "</td>";
									echo "<td><a href=\"cso_view_classlist.php?class=". $course_code ."&section=" .$section_label ."\">View Classlist</a></td></tr>";
								}						
							} echo "</table></center>";
						}
					}
				} else echo "</table></center><p><center><b>NO RECORD FOUND! <b></center></p>";
			}
		?>
		
		<p>&nbsp;</p>	
	</div>
	
<?php
	require_once 'cso_footer.php';
?>