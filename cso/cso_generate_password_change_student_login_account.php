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
<script language="JavaScript">

	function init(){
		document.csoform.reset();
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.csoform.student_id);
		
		oStringMask = new Mask("########");
		oStringMask.attach(document.csoform.login_expiration);
		
		oStringMask = new Mask("####");
		oStringMask.attach(document.csoform.entry_academic_year);
	
	}
</script>
    
  <?php
	
	include("connect_to_database.php");
	
	$change = $_GET['c'];
	if($change=="NOT") {
		$student_ID = $_GET['id'];
	} else if($change=="NA"){
		$student_ID = $_POST['student_id'];
	}
	$pass = $_GET['p'];

	if($pass=="NO"){
		$pass = "";
		$_SESSION['student_password'] = $pass;
	} else if($pass=="CHANGE"){
		
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
	<p><a href='javascript:history.go(-1)'>Back</a></p>
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
	
	<form action="cso_process_add_student_record.php?action=ADD LOGIN ACCOUNT&id=<?php echo $student_ID;?>" method="post" name="csoform">
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
				<td><input type="text" name="login_expiration" id="login_expiration" value="<?php echo $log;?>">
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
				<td><label>
          <select name="semester_incurred" id="semester_incurred" disabled>
           <?php 
		 	$query = "SELECT * from semester WHERE semester_id = '$entrysem'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				 echo "<option value='$semester_id' selected>$semester_type</option>";			
			
			 }

			
			$query = "SELECT * from semester WHERE semester_id != '$entrysem'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);

            			echo "<option value='$semester_id'>$semester_type</option>";
				}
			?>
          </select>
          </label></td>
			</tr>
			<tr>
				<td><div align="right">Password:</div></td>
				<td>*</td>
				<td><input type="text" name="password" id="password" value="<?php echo $_SESSION['student_password'];?>"></td>
			</tr>
			<tr>
				<td><div align="right"></div></td>
				<td colspan="2"><a href="cso_process_generate_new_password.php?id=<?php echo $student_ID;?>"><strong>Click Here to Generate New Password</strong></a></td>
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
	<script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("csoform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("last_name","req","Enter Last Name.");
    frmvalidator.addValidation("last_name","alpha_s", "Last Name contains invalid characters.");
	frmvalidator.addValidation("first_name","req","Enter First Name.");
	frmvalidator.addValidation("first_name","alpha_s","First Name contains invalid characters.");
	frmvalidator.addValidation("middle_name","req","Enter Middle Name.");
	frmvalidator.addValidation("middle_name","alpha_s","Middle Name contains invalid characters.");
	frmvalidator.addValidation("login_expiration","req","Enter Login Expiration.");
	frmvalidator.addValidation("entry_academic_year","req","Enter Academic Year.");
 
  </script>

	<p>&nbsp;</p>
</div>

<?php }

//Page Footer
	require_once 'cso_footer.php';
?>

