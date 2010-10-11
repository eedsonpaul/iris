<?php
//File: CSO Homepage
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
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
  <?php
	$cur_sem_id = " ";
	$cur_ay_id = " ";
	$cur_sem = " ";
	
	$sql = "SELECT * FROM current_semester_id order by current_id";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)) {
		$cur_sem_id = $row['semester_id'];
		$cur_ay_id = $row['academic_year'];
	}
	
	$sql = "SELECT * FROM semester WHERE semester_id = '$cur_sem_id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)) {
		$cur_sem = $row['semester_type'];
	}
	$end_ay = $cur_ay_id + 1;
	$_SESSION['semester'] = $cur_sem;
	$_SESSION['academic_year'] = $cur_ay_id.' - '.$end_ay;
  ?>
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
</div>

<?php
//Page Footer
	require_once 'cso_footer.php';
?>
