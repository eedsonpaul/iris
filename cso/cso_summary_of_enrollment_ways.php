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
		$action = $_GET['by'];
			
		if ($action == 'class') echo byClass();
		else if ($action == 'course') echo byCourse();
		else if ($action == 'courseAndYearLevel') echo byCourseAndYearLevel ();
		
	?>
</body>
</html>
	
<?php
		
	function byClass() {
		
		$prog_array = mysql_query("SELECT * FROM degree_program");
		while ($programs = mysql_fetch_array($prog_array)) {
			extract($programs);
			echo "<p class=headfont><u>".strtoupper($degree_name)."</u></p>";
			echo "<p class=notice><u>ENROLLMENT BY CLASS</u><br/></p>";
			
			print "<center><table width=800>
				<tr bgcolor = #A2A2A2>
					<td>#</td>
					<td>COURSE CODE</td>
					<td>SECTION</td>
					<td>MALE</td>
					<td>FEMALE</td>
					<td>TOTAL</td>
				</tr>";
				
			$offered_subjects = mysql_query("SELECT * FROM offered_subjects a, section b WHERE a.degree_program_id=$degree_program_id AND a.course_code = b.course_code ");
			$count=1;
			$rowclass=0;
			while ($offered_classes=mysql_fetch_array($offered_subjects)) {
				extract($offered_classes);
				echo "<tr class=row" .$rowclass ."><td>".$count ."</td>" ;
				$rowclass = 1 - $rowclass;
				$count++;
				
				echo "<td>" .strtoupper($course_code)."</td>"."<td>" .strtoupper($section_label)."</td>";
				
				//get male students from the said class
				$males = sprintf("SELECT a.student_number, b.gender FROM student_status a, student b WHERE section_label='%s' AND course_code='%s' AND a.student_number=b.student_number  AND b.gender='%s' ",
					mysql_real_escape_string($section_label),
					mysql_real_escape_string($course_code),
					mysql_real_escape_string('male'));
				//check if students are enrolled.
				$male_count = countStudents($males);
				
				//get female students from the said class
				$females = sprintf("SELECT a.student_number, b.gender FROM student_status a, student b WHERE section_label='%s' AND course_code='%s' AND a.student_number=b.student_number  AND b.gender='%s' ",
					mysql_real_escape_string($section_label),
					mysql_real_escape_string($course_code),
					mysql_real_escape_string('female'));
				$female_count = countStudents($females);
				
				$total = $female_count + $male_count;
				echo "<td>" .$male_count ."</td>";
				echo "<td>" .$female_count."</td>";
				echo "<td>" .$total ."</td></tr>";
			}
			
			print "</table></center><br/><br/>";
			
		}
	}
	
	function byCourse () {
		echo "<p class=headfont><u>ENROLLMENT by COURSE</u><br/><br/></p>";
		
		$prog_array = mysql_query("SELECT * FROM degree_program");
		echo "<center><table width=800><tr bgcolor=#A2A2A2>
			<td width=50>#</td>
			<td width=300>DEGREE PROGRAM</td>
			<td width=100>MALE</td>
			<td width=100>FEMALE</td>
			<td width=100>TOTAL</td>
			</tr>";
		
		$count=1;
		$rowclass=0;
		while ($progs = mysql_fetch_array($prog_array)) {
			extract($progs);
			
			$males = sprintf("SELECT * FROM student WHERE gender='%s' AND degree_program_id='%s' ",
					mysql_real_escape_string('male'),
					mysql_real_escape_string($degree_program_id));
			$females = sprintf("SELECT * FROM student WHERE gender='%s' AND degree_program_id='%s' ",
					mysql_real_escape_string('female'),
					mysql_real_escape_string($degree_program_id));
			
			$male_count = countStudents($males);
			$female_count=countStudents($females);
			
			$total = $female_count + $male_count;
			
			echo "<tr class=row" .$rowclass .">".
				"<td>" .$count ."</td>".
				"<td>" .$degree_name ."</td>".
				"<td>" .$male_count . "</td>".
				"<td>" .$female_count. "</td>".
				"<td>" .$total ."</td></tr>";
				
			$rowclass = 1 - $rowclass;
			$count++;
		}
		echo "</table></center>";
	
	}
	
	function byCourseAndYearLevel () {		
		echo "<p class=headfont><u>ENROLLMENT by COURSE and YEAR LEVEL</u><br/><br/></p>";
		
		echo "<center><table width=100%>
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
	}
	
?>