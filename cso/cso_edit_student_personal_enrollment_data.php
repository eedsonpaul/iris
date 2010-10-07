<?php
//File: CSO Student Info
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

  <?php

	include("connect_to_database.php");
	
	$change = $_GET['action'];
	if($change=="NOT") {
		$student_ID = $_GET['id'];
	} else if($change=="NA"){
		$student_ID = $_POST['student_id'];
	}
	$pass = "";
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_search_edit_student_personal_enrollment_data.php';</script>";
	} else {
  ?>
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
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
  <form action="" method="post">
    <table width="494" border="0" align="center" class="tab">
     <tr>
        <td width="180"><div align="right">Student ID:</div></td>
        <td width="19">&nbsp;</td>
        <td colspan="2"><strong><?php echo $student_ID;?></strong></td>
      </tr>
   <?php 
   		//include("connect_to_database.php");
		$query = "SELECT *from student WHERE student_number = '$student_ID'";
		$result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
				$maiden_name = "";
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
			$middle_name = $row['middle_name'];
			$civil_status = $row['civil_status'];
			$gender = $row['gender'];
			$birthdate = $row['birthdate'];
				
		}
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
        <td><div align="right">Gender:</div></td>
        <td>*</td>
        <td colspan="2"><select name="gender" id="gender">
        	<?php if($gender=="Female") {
			?>
          	<option value="Female" selected>Female</option>
          	<option value="Male">Male</option>
            <?php 
			} else if($gender=="Male") {
			?>
            <option value="Female">Female</option>
          	<option value="Male" selected>Male</option>
            <?php } else {?>
            <option value="Female">Female</option>
          	<option value="Male">Male</option>
            <?php } ?></select></td>
      </tr>
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
        <td colspan="2"><input type="text" name="fathers_name" id="fathers_name"></td>
      </tr>
      <tr>
        <td><div align="right">Mother's Name:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="mothers_name" id="mothers_name"></td>
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
          <input type="submit" name="update_personal_enrollment_data" id="update_personal_enrollment_data" value="UPDATE">
        </div></td>
        <td>&nbsp;</td>
        <td width="137"><div align="center">
          <a href ="cso_edit_student_personal_enrollment_data.php?action=NOT&id=<?php echo $student_ID;?>"><input type="submit" name="reset_personal_enrollment_data2" id="reset_personal_enrollment_data2" value="RESET"></a>
        </div></td>
        <td width="140"><a href="cso_students_concerns.php"><input type="submit" name="cancel_personal_enrollment_data3" id="cancel_personal_enrollment_data3" value="CANCEL"></a></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp;</p>
</div>
<?php }

	require_once 'cso_footer.php';
?>
