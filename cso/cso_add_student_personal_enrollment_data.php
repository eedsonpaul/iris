<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Edit Student Personal/Enrollment Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 0px;
	margin-top: 0px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
</style>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="mblogout.gif" width="121" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>

<?php
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
<div id="navigation">
<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
<div id="contentcolumn1">
    <p class="headfont"><strong>CHANGE PERSONAL DATA</strong></p>
  <p class="head"><strong>PERSONAL INFORMATION</strong></p>
    <table width="250" border="1" align="center">
      <tr>
        <td><div align="center"><strong>NOTICE</strong></div></td>
      </tr>
      <tr>
        <td class="notice"><ul>
          <li>fields with * should be filled up</li>
          <li>do not use apostrophe (')</li>
        </ul></td>
      </tr>
    </table>
  <p>&nbsp;</p>
  <?php
	$student_number = $_GET['id'];
  ?>
  <form action="cso_process_add_student_record.php?action=ADD PERSONAL INFO&id=<?php echo $student_number;?>" method="post">
    <table width="494" border="0" align="center" class="tab">
     <tr>
        <td width="180"><div align="right">Student ID:</div></td>
        <td width="19">&nbsp;</td>
        <td colspan="2"><strong><?php echo $student_number;?></strong></td>
      </tr>
   <?php $connect = mysql_connect("localhost","root", "");
		mysql_select_db("db_softeng2010");
		$query = "SELECT *from cso_student_login_info WHERE student_number = '$student_number'";
		$result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
			extract($row);
	?> 
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td>*</td>
        <td colspan="2"><input name="last_name" type="text" id="last_name" value="<?php echo $last_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Maiden Name::</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="maiden_name" id="maiden_name"></td>
      </tr>
      <tr>
        <td><div align="right">Gender:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="gender" id="gender" value="<?php echo $gender;?>"></td>
      </tr>
      <?php } ?>
      <tr>
        <td><div align="right">Civil Status:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="civil_status" id="civil_status"></td>
      </tr>
      <tr>
        <td><div align="right">Birthdate:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="birthdate" id="birthdate"></td>
      </tr>
      <tr>
        <td><div align="right">LandLine/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="phone_no" id="phone_no"></td>
      </tr>
      <tr>
        <td><div align="right">Email Address:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="email_address" id="email_address"></td>
      </tr>
      <tr>
        <td><div align="right">Father's Name:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="last_name10" id="last_name10"></td>
      </tr>
      <tr>
        <td><div align="right">Mother's Name:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="last_name11" id="last_name11"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>PARENT'S ADDRESS</strong></div></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_house_no" id="parents_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_street" id="parents_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="parents_brgy" id="parents_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="paretns_city" id="paretns_city"></td>
      </tr>
      <tr>
        <td><div align="right">Landline/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_phone_no" id="parents_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>YOUR PRESENT ADDRESS</strong></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_house_no" id="present_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_street" id="present_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="present_brgy" id="present_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="present_city" id="present_city"></td>
      </tr>
      <tr>
        <td><div align="right">Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_phone_no" id="present_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>YOUR HOME/PROVINCE ADDRESS</strong></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_house_no" id="home_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_street" id="home_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="home_brgy" id="home_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="home_city" id="home_city"></td>
      </tr>
      <tr>
        <td><div align="right">Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_phone_no" id="home_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>PERSON TO CONTACT IN CASE OF EMERGENCY</strong></td>
      </tr>
      <tr>
        <td><div align="right">Contact Person/Guardian's Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_name" id="contact_person_name"></td>
      </tr>
      <tr>
        <td><div align="right">Landline/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_phone_no" id="contact_person_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_house_no" id="contact_person_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_street" id="contact_person_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_brgy" id="contact_person_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_city" id="contact_person_city"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right">
          <input type="submit" name="update" id="update" value="UPDATE">
        </div></td>
        <td>&nbsp;</td>
        <td width="137"><div align="center">
          
        </div></td>
        <td width="140"><td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
