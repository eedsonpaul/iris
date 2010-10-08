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
	
	<!-- BODY -->
	<?php
	
		include ('connect_to_database.php');
		//if needed na ang current sem and year add lang sa query >> "WHERE semester=current sem AND academic_year=current AY
		$student_array= mysql_query("SELECT * FROM student ORDER BY last_name ASC");
		
		echo "<center><table width = 800>
			<tr>
				<th align=left>Name</th>
				<th align=left>Academic Standing</th>
			</tr>";
			
		while ($students = mysql_fetch_array($student_array)) {
			extract($students);
			echo "<tr>".
				"<td>" .$last_name. ", ".$first_name. " " .$middle_name. "</td>".
				"<td>" .$academic_standing ."</td></tr>";
		}
		
		echo "</table></center><br/><br/>";
	?>
	
	</table></center>
	<p>&nbsp;</p>

</body>
</html>