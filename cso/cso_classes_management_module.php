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
		<p class="head"><strong>Classes Management Module</strong></p>
		<!-- <p class="headfont"><strong>Add Class</strong></p> --> 
		<p>&nbsp;</p>
		<form action="cso_process_look_for_class.php?" method="get">
			<table width=75% border="0" align="center">
				<tr>
					<td align=right><strong>Look for: &nbsp; </strong></td>
					<td  width=150><input type="text" name="class" id="class"></td>
					<td><input type="submit" value="SUBMIT"></td>
				</tr>
			</table>
		</form>

	</div>

<?php
	//Page Footer
	require_once 'cso_footer.php';
?>

