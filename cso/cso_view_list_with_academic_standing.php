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
	<center><table width = 800><tr bgcolor=#A2A2A2>
		<th align=left>Name</th>
		<th align=left>Academic Standing</th>
	</tr>

	<!-- BODY -->
	<?php
	
		include ('connect_to_database.php');
		$rowclass=0;
		//if needed na ang current sem and year add lang sa query >> "WHERE semester=current sem AND academic_year=current AY
		$student_array= mysql_query("SELECT * FROM student ORDER BY last_name ASC");
		while ($students = mysql_fetch_array($student_array)) {
			extract($students);
			echo "<tr class=row".$rowclass ."><td>" .$last_name. ", ".$first_name. " " .$middle_name. "</td>".
				"<td>" .$academic_standing ."</td></tr>";
			$rowclass = 1 - $rowclass;
		}
		
		echo "</table></center><br/><br/>";
	?>
	
	</table></center>
	<p>&nbsp;</p>

</body>
</html>