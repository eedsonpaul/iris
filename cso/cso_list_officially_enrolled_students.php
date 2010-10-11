<?php
//File: CSO Degree Programs
//Version 2: Revision Date: October 6, 2010
//Version 1: Date: September 19, 2010
//By: Stefany Marie Serino
//CSO TEAM	
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
	
	<?php
	include ('connect_to_database.php');
	include ('cso_enrollment_functions.php');
	
	$deg_level = array('undergraduate', 'graduate');
	foreach ($deg_level as $degree_level) {
	?>
	<p class=headdata>
		OFFICIALLY ENROLLED STUDENTS<br/>
		<?php echo strtoupper($degree_level) ?><br/>
		U.P. CEBU COLLEGE<br/>
	</p>
	
	<?php
		$rowclass=0;
		$count = 1;
		$nationality = "";
		$students = sprintf("SELECT *,d.degree_name FROM student a, degree_program d WHERE a.degree_level='%s' AND a.degree_program_id=d.degree_program_id ORDER BY a.last_name ASC",
					mysql_real_escape_string($degree_level));
		$enrolled_ids = enrolledStudents($students);
		
		if ($enrolled_ids == NULL) { 
	?>
		<center><strong>NO STUDENT CURRENTLY ENROLLED!</strong></center>
	<?php
		} else {
	?>
		<center><table width=100% align=center valign=center>
		<tr bgcolor=#A2A2A2>
			<th width=50>COUNT</th>
			<th width=150>STUDENT NUMBER</th>
			<th width=200>NAME</th>
			<th width=70>GENDER</th>
			<th width=250>COURSE</th>
			<th width=80>YEAR LEVEL</th>
			<th width=100>NATIONALITY</th>
			<th width=150>REGISTRATION STATUS</th>			
		</tr>
	<?php
			foreach ($enrolled_ids as $students) {
	?>
			<tr class=row<?php echo $rowclass ?>>
				<td align=center valign=center><?php echo $students["count"] ?></td>
				<td align=center valign=center><?php echo $students["student_number"] ?> </td>
				<td align=center valign=center><?php echo $students["last_name"] .", " .$students["first_name"] ." " .$students["middle_name"] ?></td>
				<td align=center valign=center><?php echo $students["gender"] ?></td>
				<td align=center valign=center><?php echo $students["degree_name"] ?></td>
				<td align=center valign=center><?php echo $students["year_level"] ?></td>
				<td align=center valign=center><?php echo $students["citizenship"];?></td>
				<td align=center valign=center><?php echo $students["registration_stat"] ?></td>
			</tr>
	<?php
				$count++;
				$rowclass = 1 - $rowclass;
			}
		}
	?>
		</table></center><br/><br/><br/>
	<?php 
	} 
	?>
</body>
</html>
	
	