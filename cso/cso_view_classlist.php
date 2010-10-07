<?php
//File: CSO Degree Programs
//Version 2: Revision Date: October 6, 2010
//Version 1: Date: September 19, 2010
//By: Stefany Marie Serino
//CSO TEAM

	include ('connect_to_database.php');
	
	$course_code = $_GET['class'];
	$section_label = $_GET['section'];
	$status = 'enrolled';
	
	$sched = mysql_query("SELECT * FROM section_schedules WHERE course_code='$course_code' and section_label='$section_label' ");
	$sched_info = mysql_fetch_array($sched);
	extract($sched_info);
	
	$class = mysql_query("SELECT * FROM section WHERE course_code='$course_code' and section_label='$section_label' ");
	$class_info = mysql_fetch_array($class);	
	extract($class_info);
	
	$faculty = mysql_query("SELECT * FROM employee WHERE employee_id=$employee_id ");
	$faculty_info = mysql_fetch_array($faculty);	
	extract($faculty_info);
	
?>
<html>
<head>
	<title>CSO</title>
	<style type="text/css">
		@import url("documents.css");
  </style>
</head>

  <p><a href="javascript:history.go(-1)"><b>BACK</b></a></p>
<body>
	<!-- HEADER -->
	<p align=center>UP LOGO HERE</p>
	<p class=headfont>
		UNIVERSITY OF THE PHILIPPINES VISAYAS CEBU COLLEGE
		<br/><br/>
	</p>
	
	<p class=notice>
		<b>REPORT<br/>
		<u>current semester, A.Y. current academic year</u></b><br/>
		as of day  month date time pht year
	</p>
	<br/><br/>
	
	<!-- BODY -->
	<p class=headdata>
		<!-- ABOUT THE CLASS -->
		<b>Faculty : </b>&nbsp; <?php echo $last_name. ", " .$first_name." " .$middle_name; ?>  <br/>
		<b>Class : </b>&nbsp; <?php echo $course_code; ?> <br/>
		<b>Section : </b>&nbsp; <?php echo $section_label; ?> <br/>
		<b>Schedule : </b>&nbsp; <?php echo $day_of_the_week. " " .$start_time ." - " .$end_time; ?> <br/>
		<br/><br/>
		
		<!-- LIST OF STUDENTS -->
		<table class=noborder>
			<?php
				$count=1;
					
				$student_array = mysql_query("SELECT a.student_number, b.last_name, b.first_name, b.middle_name FROM student_status a, student b
						WHERE course_code='$course_code' AND section_label='$section_label' AND status='$status' AND a.student_number=b.student_number ORDER BY last_name ASC ");
				echo "<ul>";
				while ($student_ids = mysql_fetch_array($student_array)) {
					extract($student_ids);
					
					echo "<li>" .$count . ". &nbsp; ";
					$count++;
					echo $last_name. ", " .$first_name." " .$middle_name ."</li>";
				}
				echo "</ul>";
			?>
		</table>
	</p>
	
</body>
</html>