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
	
	<p class=headdata>
		OFFICIALLY ENROLLED STUDENTS<br/>
		UNDERGRADUATE<br/>
		U.P. CEBU COLLEGE<br/>
		Current Sem AY<br/>
	</p>
	<br/><br/>
	
	<!-- BODY for UNDERGRADUATE-->
	<table class=noborder>
		<?php
			$count=1;
				
			$student_array = mysql_query("SELECT a.student_number, b.last_name, b.first_name, b.middle_name FROM student_status a, student b
					WHERE course_code='$course_code' AND section_label='$section_label' AND status='$status' AND a.student_number=b.student_number ORDER BY last_name ASC ");
			while ($student_ids = mysql_fetch_array($student_array)) {
				extract($student_ids);
				
				echo "<tr><td width=25></td><td>" .$count .".&nbsp;</td>";
				$count++;
				echo "<td>" .$last_name. ", " .$first_name." " .$middle_name ."</td></tr>";

			}
		?>
	</table>

</body>
</html>
	
	