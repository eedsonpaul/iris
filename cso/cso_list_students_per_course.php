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
	<br/><br/><br/><br/>
	
	<!-- BODY -->

		<?php
		
			include ('connect_to_database.php');
			
			$program_array = mysql_query("SELECT * FROM degree_program");
			while ($programs = mysql_fetch_array($program_array))  {
				$prog_id = $programs['degree_program_id'];

				$stud_array = mysql_query("SELECT * FROM student WHERE degree_program_id='$prog_id' ORDER BY last_name asc");
				$count=1;
				
				echo "<ul><p class=headdata><u><b>" .$programs['degree_name'] ."</b></u></p>";
				while ($students= mysql_fetch_array($stud_array)) {
					extract($students);
					echo	"<li>&nbsp; &nbsp;" .$count ." . &nbsp;" .$last_name. ", " .$first_name. " " .$middle_name. "</li>";
					$count++;
				}
				
			echo "</ul><br/>";
			}
		?>

</body>
</html>
