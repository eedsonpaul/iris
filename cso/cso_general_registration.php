<?php
//File: CSO General Registration
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
<div class="main">
	<div id="navigation">
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
    
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
	  <p class="head"><strong>General Registration</strong></p>
  <p class="headfont">&nbsp;</p>
    <table width="494" border="0" align="center">
      <tr>
        <td colspan="2"><div align="center" class="normaltext"><strong>ENROLL STUDENT</strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <form action=" cso_enroll_student.php" method="get">
      <tr>
        <td colspan="2"><div align="right" class="normaltext">Enter Student Number:</div></td>
        <td width="11">&nbsp;</td>
        <td width="261"><input type="text" name="id" id="id"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td><label>
          <div align="center">
            <input type="submit" name="enroll" id="enroll" value="GO">
            </div>
        </label></td>
      </tr>
      </form>
      <form action="cso_enroll_student.php" method="get">
      <tr>
        <td colspan="2"><div align="center" class="normaltext"><strong>STAMP REGISTERED</strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="right" class="normaltext">Enter Student Number</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="id" id="id"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <label>
          <input type="submit" name="stamp_registered" id="stamp_registered" value="GO">
          </label>
        </div></td>
      </tr>
      <tr>
        <td colspan="2" class="normaltext"><strong>SELECT ACTION</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="120">&nbsp;</td>
        <td colspan="3" class="normaltext"><a href="cso_view_available_classes.php">View Available Subject</a>
        	<br /><a href="cso_search_student_schedule.php">View Student Schedule</a>
            <br /><a href="cso_select_building.php">View Room Utilization</a>
            <br /><a href="cso_search_faculty.php">View Faculty Schedule</a>
            <br />View Class List
            <br />View Officially Enrolled Students
            <br /><a href="cso_view_students_confirmed_not_enrolled.php">View All Unenrolled With Confirmed Subjects</a>
            <br /><a href="cso_edit_class_restrictions_search.php">Edit Class Restrictions</a></td>
        </tr>
      </form>
    </table>
<p>
      <center>
        </a>
      </center>
    </p>
  <p>&nbsp;</p>
</div>
<?php
	require_once 'cso_footer.php';
?>