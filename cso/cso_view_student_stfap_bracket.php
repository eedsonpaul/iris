<?php
//File: CSO Classes Management Module
//Version 1: Date: September 23, 2010
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


	
	<div id="right_side">
		<p><a href='javascript:history.go(-1)'>Back</a></p>
		<p>
			<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
			<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
			<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
			<b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
		</p>
		<p class="headfont">&nbsp;</p>
		<p class="head"><strong>Student Scholarship</strong></p>
		<table width="494" border="0" align="center" class="normaltext">
			<?php
				$student_id = $_GET['id'];
				include("connect_to_database.php");
				$sql = "SELECT * from student WHERE student_number = $student_id";
				$result = mysql_query($sql);
				$mid_name = "";
				while ($row = mysql_fetch_array($result)) {
					extract($row);
					$mid_name = $middle_name;
			?> 
		<tr>
			<td width="181"><div align="right"><b>Student Number:</b></div></td>
			<td width="12">&nbsp;</td>
			<td width="287"><?php echo $student_id;?></td>
		</tr>
		<tr>
			<td width="181"><div align="right"><b>Student Name:</b></div></td>
			<td width="12">&nbsp;</td>
			<td width="287"><?php echo $first_name.' '.$mid_name[0].'. '.$last_name;?></td>
		</tr>
		<tr>
			<td width="181"><div align="right"><b>STFAP Bracket:</b></div></td>
			<td width="12">&nbsp;</td>
			<td width="287">
				<?php
					$q = mysql_query("SELECT * FROM stfap WHERE stfap_bracket_id='$stfap_bracket_id' ");
					$s = mysql_fetch_array($q);
					echo $s['stfap_bracket']; 
				?></td>
		</tr>

			<?php 
				} 
			?>

		</table>
		<p>&nbsp;</p>
	</div>

<?php
	//Page Footer
	require_once 'cso_footer.php';
?>