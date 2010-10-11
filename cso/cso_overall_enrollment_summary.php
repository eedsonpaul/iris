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
	
	<p class=headdata>
		ENROLLMENT DATA<br/>
		U.P. CEBU COLLEGE<br/>
	</p>
	<br/><br/>
	
	<!-- BODY -->
	<?php

		include ('connect_to_database.php');
		include ('cso_enrollment_functions.php');
	?>
	<center><table width=100%>
	<tr rowspan=2 bgcolor=#A2A2A2>
		<th>course</th>
		<th colspan=3>FIRST YEAR</th>
		<th colspan=3>SECOND YEAR</th>
		<th colspan=3>THIRD YEAR</th>
		<th colspan=3>FOURTH YEAR</th>
		<th colspan=3>TOTAL</th>
	</tr>
	<tr bgcolor=#A2A2A2 align=center valign=center>
		<td></td>
		<td>Male</td>
		<td>Female</td>
		<td>Total</td>
		<td>Male</td>
		<td>Female</td>
		<td>Total</td>
		<td>Male</td>
		<td>Female</td>
		<td>Total</td>
		<td>Male</td>
		<td>Female</td>
		<td>Total</td>
		<td>Male</td>
		<td>Female</td>
		<td>Total</td>
	</tr>";
	
	<?php	
		$rowclass=0;
		$prog_array = mysql_query("SELECT degree_name, degree_program_id FROM degree_program");
		while ($courses = mysql_fetch_array($prog_array)) {
			extract($courses);
			echo "<tr class=row" .$rowclass ."><td>".$degree_name ."</td>" ;
			$rowclass = 1 - $rowclass;
			
			$year_level = 1;
			$all_male_count=0;
			$all_female_count=0;
			
			while ($year_level <= 4) {
			
				$males = sprintf("SELECT * FROM student WHERE year_level='%s' AND gender='%s' AND degree_program_id='%s' ",
					mysql_real_escape_string($year_level),
					mysql_real_escape_string('male'),
					mysql_real_escape_string($degree_program_id));
				$male_count = countStudents($males);
				$all_male_count+=$male_count;
				
				$females = sprintf("SELECT * FROM student WHERE year_level='%s' AND gender='%s' AND degree_program_id='%s' ",
					mysql_real_escape_string($year_level),
					mysql_real_escape_string('female'),
					mysql_real_escape_string($degree_program_id));
				$female_count = countStudents($females);
				$all_female_count+=$female_count;
				
				$total = $male_count + $female_count;
				
				echo "<td align=center valign=center>" .$male_count ."</td>";
				echo "<td align=center valign=center>" .$female_count ."</td>";
				echo "<td align=center valign=center>". $total ."</td>";
				$year_level++;
			}
			
			$all_count = $all_male_count + $all_female_count;
			echo "<td align=center valign=center>" .$all_male_count ."</td><td align=center valign=center>" .$all_female_count ."</td><td align=center valign=center>" .$all_count ."</td></tr>";
		}	
		echo "</table></center>";
	?>
</body>
</html>
	
	