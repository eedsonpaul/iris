<?php
	require_once 'cso_header.php';
?>
<?php
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
    
<div id="right_side">
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="head"><strong>Add Student Record</strong></p>
	<p class="headfont"><strong>STUDENT LOGIN ACCOUNT</strong></p>
	<table width="250" border="1" align="center">
		<tr>
		<td><div align="center" class="normaltext"><strong>NOTICE</strong></div></td>
		</tr>
		<tr>
			<td class="notice"><ul>
				<li>fields with * should be filled up</li>
				<li>do not use apostrophe (')</li>
				</ul>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	
	<?php
		$student_ID = $_GET['id'];
		include("connect_to_database.php");
		
		$pass = "";
		$query = "SELECT password from student WHERE student_number = '$student_ID'";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
				extract($row);
				$pass = $password;
		}
	?>
	<form action="cso_process_add_student_record.php?action=ADD STUDENT&id=<?php echo $student_ID;?>" method="post" name="csoform">
		<table width="494" border="0" align="center" class="tab">
			<tr>
				<td width="181"><div align="right">Student Number:</div></td>
				<td width="12">&nbsp;</td>
				<td width="287"><input type="text" name="student_id" id="student_id" value="<?php echo $student_ID;?>"></td>
			</tr>
			<tr>
				<td><div align="right">Last Name:</div></td>
				<td>*</td>
				<td><input type="text" name="last_name" id="last_name"></td>
			</tr>
			<tr>
				<td><div align="right">First Name:</div></td>
				<td>*</td>
				<td><input type="text" name="first_name" id="first_name"></td>
			</tr>
			<tr>
				<td><div align="right">Middle Name:</div></td>
				<td>*</td>
				<td><input type="text" name="middle_name" id="middle_name"></td>
			</tr>
			<tr>
				<td><div align="right">Gender:</div></td>
				<td>*</td>
				<td><select name="gender" id="gender">
					<option value="Female">Female</option>
					<option value="Male">Male</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><div align="right">Course:</div></td>
				<td>*</td>
				<td colspan="2"><label>
					<select name="course" id="course">
					<?php 
						$query = "SELECT * from degree_program";
						$result = mysql_query($query);
						while ($row = mysql_fetch_array($result)) {
							extract($row);
					?>
						<option value="<?php echo $degree_program_id;?>"><?php echo $degree_name;?></option>
					<?php } ?>
					</select>
					</label>
				</td>
			</tr>
			<tr>
				<td><div align="right">Login Expiration:</div></td>
				<td>*</td>
				<td><input type="text" name="login_expiration" id="login_expiration">
					(yyyymmdd)</td>
			</tr>
			<tr>
				<td><div align="right">Entry A.Y.:</div></td>
				<td>*</td>
				<td><input type="text" name="entry_academic_year" id="entry_academic_year">(end year:yyyy)</td>
			</tr>
			<tr>
				<td><div align="right">Entry Semester:</div></td>
				<td>*</td>
				<td><label>
					<select name="entry_semester" id="entry_semester">
					   <?php 
							$query = "SELECT * from semester";
							$result = mysql_query($query);
							while ($row = mysql_fetch_array($result)) {
								extract($row);
						?>
							<option value="<?php echo $semester_id;?>"><?php echo $semester_type;?></option>
						<?php } ?>
					</select>
					</label></td>
			</tr>
			<tr>
				<td><div align="right"></div></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
    <p>
		<center><input type="submit" name="add_student_record" id="add_student_record" value="ADD">
		</center>
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
	frmvalidator.addValidation("login_expiration","minlen=8");
	frmvalidator.addValidation("entry_academic_year","req","Enter Academic Year.");
	frmvalidator.addValidation("entry_academic_year","minlen=4");
 
  </script>
	<p>&nbsp;</p>
</div>

<?php
	require_once 'cso_footer.php';
?>
