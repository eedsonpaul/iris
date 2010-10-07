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
		ENROLLMENT DATA<br/>
		UNDERGRADUATE STUDENTS<br/>
		U.P. CEBU COLLEGE<br/>
		Current Sem AY<br/>
	</p>
	<br/><br/>
	
	<!-- BODY -->
	<?php

		include ('connect_to_database.php');
		
		echo "<center><table width=100%>
			<tr rowspan=2>
				<th>course</th>
				<th colspan=3>FIRST YEAR</th>
				<th colspan=3>SECOND YEAR</th>
				<th colspan=3>THIRD YEAR</th>
				<th colspan=3>FOURTH YEAR</th>
				<th colspan=3>RESIDENCY</th>
				<th colspan=3>TOTAL</th>
			</tr>
			<tr>
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
				<td>Male</td>
				<td>Female</td>
				<td>Total</td>
			</tr>";
		
		$prog_array = mysql_query("SELECT degree_name FROM degree_program");
		while ($courses = mysql_fetch_array($prog_array)) {
			extract($courses);
			
		}			
		echo "</table></center>";
	?>
</body>
</html>
	
	