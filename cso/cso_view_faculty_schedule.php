<?php
//File: CSO View Faculty Schedule
//Version 1: Date: October 05, 2010
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


    
<div id="right_side">
<?php
	$emp_id = $_GET['id'];
	$fname = '';
	$lname = '';
	$mname = ' ';
	$desig_id = '';
	$unit_id1  = '';
			
	$sql = "SELECT * from employee WHERE employee_id = '$emp_id'";
	$result = mysql_query($sql);
	while ($faculty = mysql_fetch_array($result)) {
		$fname = $faculty['first_name'];
		$lname = $faculty['last_name'];
		$mname = $faculty['middle_name'];
		$desig_id = $faculty['designation_id'];
		$unit_id1  = $faculty['unit_id'];
	}
	$res2= mysql_query("SELECT designation FROM designation WHERE designation_id='$desig_id'");
	$data2 = mysql_fetch_array($res2);
	$desig = $data2['designation'];
	$res1 = mysql_query("SELECT unit_name FROM unit WHERE unit_id='$unit_id1'");
	$data1 = mysql_fetch_array($res1);
	$unit_name = $data1['unit_name'];
?>
	<p><a href='javascript:history.go(-1)'>Back</a></p> 
  	<p class="head"><strong>Faculty Schedule</strong></p>
  	<div id="headlabel">
  	<p>
    	<b>Employee ID :</b> &nbsp; <?php echo $emp_id;?><br>
      	<b>Name &nbsp; :</b> &nbsp; <?php echo $lname.', '.$fname.' '.$mname;?><br>
      	<b>Unit :</b> &nbsp; <?php echo $unit_name;?><br>
        <b>Designation: </b> <?php echo $desig;?></p>
  	</div>
  <p><center>
    <strong>Semester Here, Academic Year Here</strong>
  </center>
  </p>
  <table width="650" border="0" align="center">
    <tr><form action="" method="post">
      <td width="314"><div align="center" class="headfont"><b>View Schedule in Tabular Form</b></div></td>
    </form>
    </tr>
  </table>
  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="700" border="0" align="center" class="tab">
      <tr>
        <th width="82" height="30" align="center" valign="middle"><div align="center"><strong>Class Name</strong></div></td>
        <th width="81" align="center" valign="middle"><div align="center"><strong>Section</strong></div></td>
        <th width="167" align="center" valign="middle"><div align="center"><strong>Day / Time / Class Type / Room</strong></div></td>
        <th width="51" align="center" valign="middle"><div align="center"><strong>Units</strong></div></td>
        <th width="122" align="center" valign="middle"><div align="center"><strong># of Enrolled Students</strong></div></td>
      </tr>
<?php
	include("cso_view_search_faculty_results.php");
	$schedule = new facultyResults();
	$total = $schedule->viewFacultySchedule($emp_id);
	
?>
      <tr>
        <td><div align="right"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
      </tr>
    </table>
    <p>
    <center>
        <p><strong><center>Total Units: <?php echo $total;?></center></strong></p>
        <p>&nbsp;
      </p>
    </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php
//Page Footer
	require_once 'cso_footer.php';
?>

