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
	
	<!-- BODY -->
	<?php
	
		include ('connect_to_database.php');
		include ('cso_enrollment_functions.php');
		
		$program_array = mysql_query("SELECT * FROM degree_program");
		while ($programs = mysql_fetch_array($program_array))  {
			$prog_id = $programs['degree_program_id'];

			$stud_array = mysql_query("SELECT * FROM student WHERE degree_program_id='$prog_id' ORDER BY last_name asc");
			$count=1;
			
			echo "<ul><p class=headdata><u><b>" .$programs['degree_name'] ."</b></u></p>";
			while ($students= mysql_fetch_array($stud_array)) {
				extract($students);
				$enrolled = checkEnrolledSubjects($student_number);
				if ($enrolled == 1) {
					echo	"<li>&nbsp; &nbsp;" .$count ." . &nbsp;" .$last_name. ", " .$first_name. " " .$middle_name. "</li>";
					$count++;
				}
			}			
			echo "</ul><br/>";
		}
	?>
</body>
</html>
