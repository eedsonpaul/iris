<?php
//File: CSO Degree Programs
//Version 2: Revision Date: October 5, 2010
//Version 1: Date: September 19, 2010
//By: Stefany Marie Serino
//CSO TEAM

	require_once 'cso_header.php';
	
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	//session_start();
	if ($_SESSION['employee_id'] == NULL) header("Location: index.php");
	$employee_id = $_SESSION['employee_id'];
	$access_level_id = $_SESSION['access_level_id'];
	$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$employee_id'");
	$data = mysql_fetch_array($res);
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'][0].'.';
	$unit_id = $data['unit_id'];
	$designation_id = $data['designation_id'];
	$res2= mysql_query("SELECT designation FROM designation WHERE designation_id='$designation_id'");
	$data2 = mysql_fetch_array($res2);
	$designation = $data2['designation'];
	$res1 = mysql_query("SELECT unit_name FROM unit WHERE unit_id='$unit_id'");
	$data1 = mysql_fetch_array($res1);
	$unit = $data1['unit_name'];
?>
<div class="main">
	<div id="navigation">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <ul>
	  	<li><a href="cso.php"><center>CSO FUNCTIONS</center></a></li>
        <li><a href="cso_personal_data_employee_login.php">PERSONAL DATA/EMPLOYEE LOGIN</a></li>
	</ul>

	<ul>
		<li><a href="cso_students_concerns.php">STUDENT'S CONCERNS</a></li>
		<li><a href="cso_subject_module.php">SUBJECT</a></li>
    	<li><a href="cso_degree_programs.php">DEGREE PROGRAMS</a></li>
		<li> <a href="cso_grades_menu.php">GRADES</a></li>
		<li> <a href="cso_classes_menu.php">CLASSES</a></li>
	</ul>
	<ul>
		<li> <a href="#">REGISTRATION</a>
			<ul> <a href="cso_reports_utilities.php">&nbsp;&nbsp;&nbsp;REPORTS/UTILITIES</a></ul>
			<ul> <a href="cso_preenlistment_module.php">&nbsp;&nbsp;&nbsp;Pre-enlistment Module</a></ul>
			<ul> <a href="cso_confirmation_module.php">&nbsp;&nbsp;&nbsp;Confirmation Module</a></ul>
            <ul><a href="cso_general_registration.php">&nbsp;&nbsp;&nbsp;General Registration Module</a></ul>
		</li>
	</ul>
	</div>
	<!-- end of navigation div -->

	<!-- wala pa ni sa right niya na format -->
	<div id="right_side">
		<p><a href='javascript:history.go(-1)'>Back</a></p>
		<p>&nbsp;</p>
		<p class="head"><strong>Degree Programs per Division</strong></p>
		<p>&nbsp;</p>

		<?php
			$unit_array = mysql_query("SELECT * FROM unit ORDER BY unit_id ASC");
			echo "<center><table width=710><tr>
				<th align=center  valign=middle width=230>Division</th>
				<th align=center  valign=middle width=110>Degree Level</th>
				<th align=center  valign=middle width=120>Program Code</th>
				<th align=center  valign=middle width=250>Degree Program</th>
				</tr>";

			while ($units = mysql_fetch_array($unit_array)) {
				extract($units);
				$loop=0;

				$prog_array = mysql_query("SELECT * FROM degree_program WHERE unit_id='$unit_id' ORDER BY degree_level ASC ");
				while ($prog_ids = mysql_fetch_array($prog_array)) {
					extract($prog_ids);
					if ($loop == 0) echo "<tr><td align=center width=230>".$unit_name."</td>";
					else echo "<tr><td align=center width=230></td>";
					$loop++;

					echo "<td align=center width=110>".$degree_level."</td>";
					echo "<td align=center width=130>".$program_code,"</td>";
					echo "<td align=center width=250>".$degree_name,"</td></tr>";
				}
			}

			echo "</table></center>";
		?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
	
<?php
	require_once 'cso_footer.php';
?>
