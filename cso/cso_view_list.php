<?php
//File: CSO Degree Programs
//Version 2: Revision Date: October 6, 2010
//Version 1: Date: September 19, 2010
//By: Stefany Marie Serino
//CSO TEAM

	include ('connect_to_database.php');
	
	$course_code = $_GET['class'];
	$section_label = $_GET['section'];
	
	$sched = mysql_query("SELECT * FROM section_schedules WHERE course_code='$course_code' and section_label='$section_label' ");
	$sched_info = mysql_fetch_array($sched);
	extract($sched_info);
	
	$class = mysql_query("SELECT * FROM section WHERE course_code='$course_code' and section_label='$section_label' ");
	$class_info = mysql_fetch_array($class);	
	extract($class_info);
	
	$faculty = mysql_query("SELECT * FROM employee WHERE employee_id=$employee_id ");
	$assigned = mysql_num_rows($faculty);	
	if ($assigned != 0) {
		$faculty_info = mysql_fetch_array($faculty);
		extract($faculty_info);
	}
	
?>
<html>
<head>
	<title>CSO</title>
	<style type="text/css">
		@import url("documents.css");
		.row0 { background-color: #EAEAEA; }
		.row1 { background-color:#FFFFFF;	}	
  </style>
</head>

  <p><a href="javascript:history.go(-1)"><b>BACK</b></a></p>
<body>
	<!-- HEADER -->
	<p align=center><img src="up_logo.jpg" width=80 height=80></p>
	<p class=headfont>
		UNIVERSITY OF THE PHILIPPINES VISAYAS CEBU COLLEGE
		<br/><br/>
	</p>
	
	<p class=notice>
		<b>REPORT<br/>
		<u><?php session_start(); echo $_SESSION['semester'];?>, <?php echo $_SESSION['academic_year'];?></u></b><br/>
		AS OF <?php echo date("D M d H:i:s T Y"); ?>
	</p>
	<br/><br/><br/><br/>
	
	<!-- BODY -->
	<p class=headdata>
		<!-- ABOUT THE CLASS -->
		<b>Faculty : </b>&nbsp; <?php 
			if ($assigned == 0) echo "TBA";
			else echo $last_name. ", " .$first_name." " .$middle_name; ?>
		<br/>
		<b>Class : </b>&nbsp; <?php echo $course_code; ?> <br/>
		<b>Section : </b>&nbsp; <?php echo $section_label; ?> <br/>
		<b>Schedule : </b>&nbsp; <?php echo $day_of_the_week. " " .$start_time ." - " .$end_time; ?> <br/>
		<br/><br/>
		
		<!-- LIST OF STUDENTS -->
		<table width='650'>
			<tr bgcolor=#A2A2A2>
				<th width=50>#</th>
				<th width=100>Student Number</th>
				<th width=300>Student Name</th>
				<th width=200>Status</th>
			</tr>
			<?php
				$count=1;
					
				$student_array = mysql_query("SELECT a.student_number, a.status, b.last_name, b.first_name, b.middle_name FROM student_status a, student b
						WHERE course_code='$course_code' AND section_label='$section_label' AND a.student_number=b.student_number ORDER BY last_name ASC ");
				if (mysql_num_rows($student_array) == 0) echo "<tr colspan=4 align=center><b>NO RECORD FOUND!</b></tr>";
				else {
					while ($student_ids = mysql_fetch_array($student_array)) {
						extract($student_ids);
						echo "<tr>";
						echo "<td>" .$count . ". &nbsp;</td>";
						echo"<td><center>".$student_number."</center></td>";
						$count++;
						echo "<td><center>".$last_name. ", " .$first_name." " .$middle_name ."</center></td>";
						echo "<td><center>". strtoupper($status)."</center></td>";
						echo "</tr>";
					}
				}	

			?>
		</table>
	</p>
	
</body>
</html>