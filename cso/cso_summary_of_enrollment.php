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
	
	<!--if students per class, mao ni -->
	<div id="right_side">

		<p><a href='javascript:history.go(-1)'>Back</a></p>
		<p>
	    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
	      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
	      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
	        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
		</p>
		<p>&nbsp;</p>

		<p class="head"><strong>ENROLLMENT SUMMARY</strong></p>
		<p>&nbsp;</p>
		<ul>
			<li><a href=cso_summary_of_enrollment_ways.php?by=class>by CLASS and GENDER</a></li>
			<li><a href=cso_summary_of_enrollment_ways.php?by=course>by COURSE and GENDER</a></li>
			<li><a href=cso_summary_of_enrollment_ways.php?by=courseAndYearLevel>by COURSE, YEAR LEVEL and GENDER</a></li>
		</ul>
		<p>&nbsp;</p>	
	</div>
	
<?php
	require_once 'cso_footer.php';
?>