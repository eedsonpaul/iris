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
		
		.row0 {
			background-color: #ffffff;
		}

		.row1 {
			background-color:#D3DCE3;
		}
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
		<u>current semester, A.Y. current academic year</u></b><br/>
		AS OF <?php echo date("D M d H:i:s T Y"); ?>
	</p>
	<br/><br/><br/><br/>
	
	<p class=headdata>
		ENROLLMENT DATA<br/>
		U.P. CEBU COLLEGE<br/>
		Current Sem AY<br/>
	</p>
	<br/><br/>
	
	<!-- BODY -->
	<?php

		include ('connect_to_database.php');
		
		echo "<center><table width=100%>
			<tr rowspan=2 bgcolor=#D5D5D5>
				<th>course</th>
				<th colspan=3>FIRST YEAR</th>
				<th colspan=3>SECOND YEAR</th>
				<th colspan=3>THIRD YEAR</th>
				<th colspan=3>FOURTH YEAR</th>
				<th colspan=3>TOTAL</th>
			</tr>
			<tr bgcolor=#D5D5D5>
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
				$males = mysql_query("SELECT * FROM student WHERE year_level=$year_level AND gender='male' AND degree_program_id=$degree_program_id ");
				if (!$males) die(mysql_error());
				$male_count = mysql_num_rows($males);
				echo "<td>" .$male_count ."</td>";
				$all_male_count+=$male_count;
				
				$females = mysql_query("SELECT * FROM student WHERE year_level=$year_level AND gender='female'  AND degree_program_id=$degree_program_id ");
				if (!$females) die(mysql_error());
				$female_count = mysql_num_rows($females);
				echo "<td>" .$female_count ."</td>";
				$all_female_count+=$female_count;
				
				$total = $male_count + $female_count;
				echo "<td>". $total ."</td>";
				
				$year_level++;
			}
			
			$all_count = $all_male_count + $all_female_count;
			echo "<td>" .$all_male_count ."</td><td>" .$all_female_count ."</td><td>" .$all_count ."</td></tr>";
		}	
		echo "</table></center>";
	?>
</body>
</html>
	
	