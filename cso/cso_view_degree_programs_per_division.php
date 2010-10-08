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
	
		include('connect_to_database.php');
		
		$units_array = mysql_query("SELECT unit_name, unit_id FROM unit");
		while ($units = mysql_fetch_array($units_array)) {
			extract($units);
			
			echo "<p class=superheadfont><u>" .$unit_name ."</u></p>";
			echo "<center><table width=1050>
				<tr bgcolor=#D5D5D5>
					<th width=250>degree name</th>
					<th width=100>degree level</th>
					<th width=100 >program code</th>
					<th width=120>major</th>
					<th width=120>minor</th>
					<th width=100>date proposed</th>
					<th width=100>date revised</th>
					<th width=80>required units</th>
					<th width=80>required years</th>
				</tr>";
			
			$prog_array = mysql_query("SELECT * FROM degree_program WHERE unit_id=$unit_id ORDER BY degree_level DESC");
			while ($programs = mysql_fetch_array($prog_array)) {
				extract($programs);
				echo "<tr align=center valign=center>".
					"<td>" .$degree_name ."</td>".
					"<td>" .$degree_level."</td>".
					"<td>" .$program_code ."</td>".
					"<td>" .$major."</td>".
					"<td>" .$minor ."</td>".
					"<td>" .$date_proposed."</td>".
					"<td>" .$date_revised."</td>".
					"<td>" .$required_units."</td>".
					"<td>" .$required_years."</td></tr>";
			}
			
			echo "</table></center><br/><br/><br/>";
		}
	?>
</body>
</html>