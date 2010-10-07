<?php
//File: CSO Student Login Account Page
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
    
  <?php
	
	include("connect_to_database.php");
	
	$change = $_GET['c'];
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
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 
		    'cso_generate_password_change_student_login.php';</script>";
	} else {
  ?>
  
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="head"><strong>Student Record</strong></p>
	<p class="headfont"><strong>CHANGE STUDENT LOGIN ACCOUNT</strong></p>
	
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
	
	<form action="cso_process_add_student_record.php?action=ADD LOGIN ACCOUNT&id=<?php echo $student_ID;?>" method="post">
		<table width="494" border="0" align="center" class="tab">
			<tr>
				<td width="181"><div align="right">Student ID:</div></td>
				<td width="12">&nbsp;</td>
				<td width="287"><strong><input type="text" name="last_name" id="last_name" value="<?php echo $student_ID;?>" readonly></strong></td>
			</tr>
		
		<?php
	  		$lname = "";
			$fname = "";
			$mname = "";
			$gender = "";
			$log = "";
			$entryay = "";
			$entrysem = "";
			$pass = "";
	  		$query = "SELECT * from student WHERE student_number = '$student_ID'";
			$result = mysql_query($query);
			
			while ($row = mysql_fetch_array($result)) {
				$lname = $row['last_name'];
				$fname = $row['first_name'];
				$mname = $row['middle_name'];
				$gender = $row['gender'];
				$log = $row['login_expiration'];
				$entryay = $row['entry_academic_year'];
				$entrysem = $row['entry_semester'];
				$pass = $row['password'];
			}
		?>
			<tr>
				<td><div align="right">Last Name:</div></td>
				<td>*</td>
				<td><input type="text" name="last_name" id="last_name" value="<?php echo $lname;?>" readonly></td>
			</tr>
			<tr>
				<td><div align="right">First Name:</div></td>
				<td>*</td>
				<td><input type="text" name="first_name" id="first_name" value="<?php echo $fname;?>" readonly></td>
			</tr>
			<tr>
				<td><div align="right">Middle Name:</div></td>
				<td>*</td>
				<td><input type="text" name="middle_name" id="middle_name" value="<?php echo $mname;?>" readonly></td>
			</tr>
			<tr>
				<td><div align="right">Gender:</div></td>
				<td>*</td>
				<td><select name="gender" id="gender" disabled>
					<?php if($gender=="Female") {?>
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
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><div align="right">Login Expiration:</div></td>
				<td>*</td>
				<td><input type="text" name="login_expiration" id="login_expiration" value="<?php echo $log;?>" readonly>
					(yyyymmdd)</td>
			</tr>
			<tr>
				<td><div align="right">Entry A.Y.:</div></td>
				<td>*</td>
				<td><input type="text" name="entry_academic_year" id="entry_academic_year" value="<?php echo $entryay;?>" readonly>(end year:yyyy)</td>
			</tr>
			<tr>
				<td><div align="right">Entry Semester:</div></td>
				<td>*</td>
				<td><input type="text" name="entry_semester" id="entry_semester" value="<?php echo $entrysem;?>" readonly></td>
			</tr>
			<tr>
				<td><div align="right">Password:</div></td>
				<td>*</td>
				<td><input type="password" name="password" id="password" value="<?php echo $pass;?>"></td>
			</tr>
			<tr>
				<td><div align="right">Retyped Password:</div></td>
				<td>*</td>
				<td><input type="password" name="repassword" id="repassword" value="<?php echo $pass;?>"></td>
			</tr>
			<tr>
				<td><div align="right"></div></td>
				<td colspan="2"><a href="cso_process_generate_new_password.php?action=STUDENT&id=<?php echo $student_ID;?>"><strong>Click Here to Generate New Password</strong></a></td>
			</tr>
			<tr>
				<td><div align="right"></div></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
    <p>
      <center><input type="submit" name="update_student_login" id="update_student_login" value="UPDATE"></center>
    </p>
	</form>
	<p>&nbsp;</p>
</div>

<?php }

//Page Footer
	require_once 'cso_footer.php';
?>

