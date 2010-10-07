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
		
		$prog_array = mysql_query("SELECT * FROM degree_program ORDER BY unit_id ASC");
		
		while ($programs = mysql_fetch_array($prog_array)) {
			extract($programs);
			
			echo "<p class=superheadfont><u>".$degree_name ."</u></p>";
			
			echo "<center><table width=900>
				<tr>
					<th width=150>COURSE CODE</th>
					<th width=600>Subject Title</th>
					<th width=150>UNITS</th>
				</tr>";
			
			$code_array = mysql_query("SELECT * FROM offered_subjects WHERE degree_program_id='$degree_program_id' ");
			while ($code_ids = mysql_fetch_array($code_array)) {
				extract($code_ids);

				$subject_array = mysql_query("SELECT * FROM subject WHERE course_code='$course_code' ORDER BY course_code ASC");
				while ($subjects = mysql_fetch_array($subject_array)) {
					extract($subjects);
					echo " <tr>".
								"<td align=center>".$course_code,"</td>".
								"<td align=center>".$subject_title,"</td>".
								"<td align=center>".$units,"</td></tr>";
				}
			}
			
			echo "</table></center><br/><br/>";
		}
		
	?>
</body>
</html>
	
	