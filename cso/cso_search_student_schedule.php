<?php
//File: CSO Search Student Schedule
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
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
	  <p class="head"><strong>Student Schedule</strong></p>
    <p class="headfont"><strong>Search</strong></p>
    <p>&nbsp;</p>
  <form action="cso_student_schedule_view.php" method="post" name="csoform">
    <table width="494" border="0" align="center">
      <tr>
        <td width="181"><div align="right" class="normaltext"><strong>Enter Student Number:</strong></div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><input type="text" name="student_id" id="student_id"></td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_student_record" id="add_student_record" value="ADD"></center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>

<?php
	require_once 'cso_footer.php';
?>