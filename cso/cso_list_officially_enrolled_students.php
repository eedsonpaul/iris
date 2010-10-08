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
		OFFICIALLY ENROLLED STUDENTS<br/>
		UNDERGRADUATE<br/>
		U.P. CEBU COLLEGE<br/>
		Current Sem AY<br/>
	</p>
	<br/><br/>
	
	<?php
		function checkEnrolledSubjects ($student_number) {
		
			$check_array = mysql_query("SELECT status FROM student_status WHERE student_number=$student_number ");
			$status_count = mysql_num_rows($check_array);
			if ($status_count == 0) return 0;
			while ($check_all = mysql_fetch_array($check_array)) {
				extract($check_all);
				if ($status != 'enrolled') return 0;
			}
			return 1;
		}
	?>
	<!-- BODY for UNDERGRADUATE-->
	<center><table width=1120 align=center valign=center>
		<tr>
			<th width=50>COUNT</th>
			<th width=150>STUDENT NUMBER</th>
			<th width=250>NAME</th>
			<th width=70>GENDER</th>
			<th width=250>COURSE</th>
			<th width=100>YEAR LEVEL</th>
			<th width=100>NATIONALITY</th>
			<th width=150>REGISTRATION STATUS</th>			
		</tr>
		<?php
			include ('connect_to_database.php');
			// $deg_level = ('undergraduate', 'graduate');
			
			// foreach ($deg_level) {
				echo "<tr>";
				$count = 1;
				$students = mysql_query("SELECT *,d.degree_name FROM student a, degree_program d WHERE a.degree_level='undergraduate' AND a.degree_program_id=d.degree_program_id ORDER BY a.last_name ASC");
				while ($student_ids = mysql_fetch_array($students)) {
					extract($student_ids);
					
					$enrolled_all = checkEnrolledSubjects($student_number);
					
					if ($enrolled_all == 1) {
						echo "<td align=center valign=center>" .$count  ."</td>". 
							"<td align=center valign=center>" .$student_number ."</td>".
							"<td align=center valign=center>" .$last_name .", " .$first_name ." " .$middle_name ."</td>".
							"<td align=center valign=center>" .$gender ."</td>".
							"<td align=center valign=center>" .$degree_name ."</td>".
							"<td align=center valign=center>" .$year_level ."</td>".
							"<td align=center valign=center>" .$foreign_info ."</td>".
							"<td align=center valign=center>" .$registration_stat ."</td></tr>";
						$count++;
					}		
				}
			// }

		?>
		</table></center>
	</table>

</body>
</html>
	
	