<?php
//File: CSO View Student Schedule
//Version 1: Date: October 07, 2010
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
	$student_id = $_POST['student_id'];
	$fname = '';
	$lname = '';
	$mname = ' ';
	$degree_id = '';
	$degree  = '';
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$student_id'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 
		    'cso_search_student_schedule.php';</script>";
	} else {
	$sql = "SELECT * from student WHERE student_number = '$student_id'";
	$result = mysql_query($sql);
	while ($faculty = mysql_fetch_array($result)) {
		$fname = $faculty['first_name'];
		$lname = $faculty['last_name'];
		$mname = $faculty['middle_name'];
		$degree_id = $faculty['degree_program'];
	}
	
	$res2= mysql_query("SELECT * FROM degree_program WHERE degree_program_id ='$degree_id'");
	$data2 = mysql_fetch_array($res2);
	$degree = $data2['degree_name'];
?>
	<p><a href='javascript:history.go(-1)'>Back</a></p> 
  	<p class="head"><strong>View Schedule</strong></p>
  	<div id="headlabel">
  	<p>
    	<b>Student Number :</b> &nbsp; <?php echo $student_id;?><br>
      	<b>Name &nbsp; :</b> &nbsp; <?php echo $lname.', '.$fname.' '.$mname[0].'.';?><br>
      	<b>Degree Program :</b> &nbsp; <?php echo $degree;?><br>
  	</div>
  <p><center>
    <strong><?php echo $_SESSION['semester'];?>, <?php echo $_SESSION['academic_year'];?></</strong>
  </center>
  </p>
  <table width="650" border="0" align="center">
    <tr><form action="" method="post">
      <!--<td width="314"><div align="center" class="headfont"><b>View Schedule in Tabular Form</b></div></td>-->
    </form>
    </tr>
  </table>
  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="700" border="0" align="center" class="tab">
      <tr>
      	<td></td>
        <th width="82" height="30" align="center" valign="middle"><div align="center"><strong>Subject Name</strong></div></td>
        <th width="81" align="center" valign="middle"><div align="center"><strong>Section</strong></div></td>
        <th width="51" align="center" valign="middle"><div align="center"><strong>Units</strong></div></td>
        <th width="167" align="center" valign="middle"><div align="center"><strong> Schedule</strong></div></td>
      </tr>
<?php
	include("cso_student_schedule_class.php");
	$schedule = new studentSchedule();
	$schedule->viewStudentSchedule($student_id);
	
?>
      <tr>
        <td><div align="right"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
      </tr>
    </table>
    <p>
    <center>
    </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php }
//Page Footer
	require_once 'cso_footer.php';
?>

