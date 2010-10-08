<?php
//File: CSO Garduation Data
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	require_once 'cso_header.php';
	
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	session_start();
	if ($_SESSION['employee_id'] == NULL) header("Location: index.php");
	$employee_id = $_SESSION['employee_id'];
	$access_level_id = $_SESSION['access_level_id'];
	$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$employee_id'");
	$data = mysql_fetch_array($res);
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'];
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
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>SELECT DEGREE PROGRAM</strong></p>
  <table width="750" border="0" align="center">
    <tr>
      <td colspan="8"><div align="center"><strong>COURSE OF STUDENT</strong></div></td>
    </tr>
    <tr>
      <td width="136"><div align="center">Date Graduated</div></td>
      <td width="63"><div align="center">AY</div></td>
      <td width="60"><div align="center">Sem</div></td>
      <td width="187"><div align="center">Course Graduated</div></td>
      <td width="64"><div align="center">GWA</div></td>
      <td width="108"><div align="center">Award/s Received</div></td>
      <td width="47"><div align="center">Details</div></td>
      <td width="51"><div align="center">Action</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td class="tab"><p>The latest course based on the student's latest record that will be used in the OTR and the other records of the student is on the topmost course entry in the list. Other previous course(s) of the student will also be displayed on the list with the corresponding AY and Semester the student started with the degree program.</p>
      <p>To specify the course of the student, enter required information on the fields below and click the Save button. Be sure to select the correct degree program. Indicate whether the student belongs to the OLD or NEW curriculum. Check the revision date of the program after the programme on the choices below.</p>
      <p>Just click on the link opposite the degree program item to change the entry and select the correct course from the list. To edit an entry on the above list, just specify the correct degree or AY and sem then enter new values in other fields and click Save. The previous data will just be overwritten.</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="563" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student ID:</div></td>
        <td width="12">&nbsp;</td>
        <td width="356"><input type="text" name="student_id" id="student_id"></td>
      </tr>
      <tr>
        <td><div align="right">Student Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="student_name" id="student_name"></td>
      </tr>
      <tr>
        <td><div align="right">Course:</div></td>
        <td>&nbsp;</td>
        <td><input name="course" type="text" id="course" size="30"> 
        Click Here to Change</td>
      </tr>
      <tr>
        <td><div align="right">Date Graduated:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_graduated" id="date_graduated"></td>
      </tr>
      <tr>
        <td><div align="right">G.W.A.::</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="gwa" id="gwa"></td>
      </tr>
      <tr>
        <td><div align="right">Honor Received:</div></td>
        <td>&nbsp;</td>
        <td><input name="honor_received" type="text" id="honor_received" size="45"></td>
      </tr>
      <tr>
        <td><div align="right">Specify Academic Year:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="specify_academic_year" id="specify_academic_year"></td>
      </tr>
      <tr>
        <td><div align="right">Specify Semester:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="specify_semester" id="specify_semester"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="graduation_details" id="graduation_details" value="SAVE Student's Graduation Data">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php
	require_once 'cso_footer.php';
?>
