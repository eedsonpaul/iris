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
<script language="JavaScript">

	function init(){
		document.csoform.reset();
		document.formcso.reset();
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.csoform.id);
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.formcso.id);
	
		
	}
</script>
    
<div id="right_side">
	<p><a href='javascript:history.go(-1)'>Back</a></p>
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
      <form action=" cso_enroll_student.php" method="get" name="csoform">
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
      <form action="cso_enroll_student.php" method="get" name="formcso">
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
            <br /><a href="cso_print_classlist.php">View Class List</a>
            <br /><a href="cso_list_officially_enrolled_students.php">View Officially Enrolled Students</a>
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