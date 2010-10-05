<?php
//File: CSO Classes Management Module
//Version 1: Date: September 23, 2010
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

<div class="main">
	<div id="navigation">
		<p>
			<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
			<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
			<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
			<b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
		</p>
		
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
	<!-- end of div navigation -->
	
	<div id="right_side">
		<p><center><a href='javascript:history.go(-1)'>Back</a></center></p>
		<p>&nbsp;</p>
		<p class="head"><strong>Student Record</strong></p>
		<p class="head"><strong>PERSONAL DATA</strong></p>

		<table width="250" border="1" align="center">
			<tr>
				<td><div align="center"><strong>NOTICE</strong></div></td>
			</tr>
			<tr>
				<td class="notice">
					<ul>
						<li>fields with * should be filled up</li>
						<li>do not use apostrophe (')</li>
					</ul>
				</td>
			</tr>
		</table>
		<p>&nbsp;</p>
		<?php
			$student_id = $_GET['id'];
		?>

		<form action="cso_process_add_student_record.php?action=ADD PERSONAL INFO&id=<?php echo $student_id;?>&update=1" method="post" name="csoform">
			<table width="542" border="0" align="center" class="tab">
				<tr>
					<td width="199"><div align="right"></div></td>
					<td width="12">&nbsp;</td>
					<td width="317">&nbsp;</td>
				</tr>
				<?php 
					include("connect_to_database.php");
					$query = "SELECT * from student WHERE student_number = '$student_id' ";
					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result)) {
						extract($row);
				?>
				<tr>
					<td><div align="right">Gender:</div></td>
					<td>*</td>
					<td><select name="gender" id="gender">
						<option value="<?php echo $gender; ?>">Female</option>
						<?php
							if ($gender == 'Female') { echo "<option value=\"Male\">Male</option>"; }
							if ($gender == 'Male') { echo "<option value=\"Female\">Female</option>"; }
						?>
					</select></td>
				</tr>
				<tr>
					<td><div align="right">Email Address:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="email_address" id="email_address" value="<?php echo $email_address; ?>" ></td>
				</tr>
				<tr>
					<td><div align="right">Civil Status:</div></td>
					<td>&nbsp;</td>
					<td><select name="civil_status" id="civil_status">
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Divorced">Divorced</option>
					</select></td>
				</tr>
				<tr>
					<td><div align="right">Birth Date:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Contact Number:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="phone_no" id="phone_no" value="<?php echo $contact_number; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Father's Name:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="fathers_name" id="fathers_name"  value="<?php echo $father_name; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Mother's Name:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="mothers_name" id="mothers_name" value="<?php echo $mother_name; ?>"></td>
				</tr>
				<tr><td height=20></td></tr>
				<tr>
					<td><div align="right"><b>PRESENT ADDRESS</b></div></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right">Street:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="present_street" id="present_street" value="<?php echo $present_street; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Barangay:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="present_brgy" id="present_brgy" value="<?php echo $present_barangay; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">City/Municipality:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="present_city" id="present_city" value="<?php echo $present_city_municipality; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Present Contact Number:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="present_phone_no" id="present_phone_no" value="<?php echo $present_contact_number; ?>"></td>
				</tr>
				<tr><td height=20></td></tr>
				<tr>
					<td><div align="right"><b>HOME ADDRESS</b></div></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right">House Number:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="home_house_no" id="home_house_no" value="<?php echo $home_house_number; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Street:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="home_street" id="home_street" value="<?php echo $home_street; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Barangay:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="home_brgy" id="home_brgy" value="<?php echo $home_barangay; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">City/Municipality:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="home_city" id="home_city" value="<?php echo $home_city_municipality; ?>"></td>
				</tr>
				<tr><td height=20></td></tr>
				<tr>
					<td><div align="right"><b>GUARDIAN'S ADDRESS</b></div></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><div align="right">House Number:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="contact_person_house_no" id="contact_person_house_no" value="<?php echo $guardian_house_number; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Street:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="contact_person_street" id="contact_person_street" value="<?php echo $guardian_street; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Barangay:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="contact_person_brgy" id="contact_person_brgy" value="<?php echo $guardian_barangay; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">City/Municipality:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="contact_person_city" id="contact_person_city" value="<?php echo $guardian_city_municipality; ?>"></td>
				</tr>
				<tr>
					<td><div align="right">Guardian's Contact Number:</div></td>
					<td>&nbsp;</td>
					<td><input type="text" name="contact_person_phone_no" id="contact_person_phone_no" value="<?php echo $guardian_contact_number; ?>"></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p><center><input type="submit" name="add_student_record" id="add_student_record" value="UPDATE"></center></p>
		</form>

		<script language="JavaScript" type="text/javascript">
			var frmvalidator  = new Validator("csoform");
			frmvalidator.EnableMsgsTogether();
			frmvalidator.addValidation("security_question","dontselect=0");
			frmvalidator.addValidation("answer","req","Please enter an Answer.");
		</script>

		<p>&nbsp;</p>
	</div>

<?php
	//Page Footer
	require_once 'cso_footer.php';
?>
