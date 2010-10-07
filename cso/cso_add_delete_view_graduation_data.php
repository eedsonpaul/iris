<?php
//File: CSO Student Graduation Data
//Version 1: Date: October 06, 2010
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
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'][0];
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
		
		oStringMask = new Mask("####-##-##");
		oStringMask.attach(document.csoform.date_graduated);
		
		oStringMask = new Mask("####");
		oStringMask.attach(document.csoform.specify_academic_year);
		
	}
</script>

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
    <p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
<?php
	$student_ID = $_GET['id'];
	//session_start();
	$_SESSION['student_number'] = $student_ID;
	include("connect_to_database.php");
	$date_grad = "";
	$date = "";
	$ay_grad = "";
	$sem_grad = "";
	$gwa = "";
	$honor = "";
	$first_name = "";
	$last_name = "";
	$middle_name = "";
	$degree = "";
	
	include("cso_date_converter.php");
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$date_grad = $row['date_graduated'];
		$ay_grad = $row['academic_year_graduated'];
		$sem_grad = $row['semester_graduated'];
		$gwa = $row['gwa_graduated'];
		$honor = $row['honor_received'];
		$course = $row['course_graduated'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$middle_name = $row['middle_name'];
		
		$newdate = new dateConverter();
		$date = $newdate->dateConvert($date_grad);
	}
	
	$query = "SELECT * from semester WHERE semester_id = '$sem_grad'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$sem = $row['semester_type'];
	}
	
	$query = "SELECT * from degree_program WHERE degree_program_id = '$course'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$degree = $row['degree_name'];
	}

?>
  <p align="center" class="head"><strong>Input Graduation Details</strong></p>
  <table width="680" border="0" align="center" class="normaltext">
    <tr>
      <td colspan="8"><div align="center" class="headfont"><strong>GRADUATION DATA OF STUDENT</strong></div></td>
    </tr>
    <tr>
      <th width="124"><div align="center">Date Graduated</div></th>
      <th width="68"><div align="center">AY</div></th>
      <th width="54"><div align="center">Sem</div></th>
      <th width="168"><div align="center">Course Graduated</div></th>
      <th width="63"><div align="center">GWA</div></th>
      <th width="107"><div align="center">Award/s Received</div></th>
      <th width="44"><div align="center">Action</div></th>
    </tr>
<?php
	if($ay_grad!=0) {
?>
    <tr>
      <td width="124"><div align="center" class="style2"><?php echo $date;?></div></td>
      <td width="50"><div align="center" class="style2"><?php echo $ay_grad;?></div></td>
      <td width="60"><div align="center" class="style2"><?php echo $sem;?></div></td>
      <td width="168"><div align="center" class="style2"><?php echo $degree;?></div></td>
      <td width="63"><div align="center" class="style2"><?php echo $gwa;?></div></td>
      <td width="107"><div align="center" class="style2"><?php echo $honor;?></div></td>
      <td width="44"><div align="center" class="style2"><a href="cso_process_graduation_data.php?action=DELETE&id=<?php echo $student_ID;?>">DELETE</a></div></td>
    </tr>
<?php 
	} else {
?>
    <tr>
      <td width="124"><div align="center" class="style2"></div></td>
      <td width="50"><div align="center" class="style2"></div></td>
      <td width="60"><div align="center" class="style2"></div></td>
      <td width="168"><div align="center" class="style2"></div></td>
      <td width="63"><div align="center" class="style2"></div></td>
      <td width="107"><div align="center" class="style2"></div></td>
      <td width="44"><div align="center" class="style2"></div></td>
    </tr>
<?php } ?>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td class="tab"><p class="style1">To specify the graduation data of the student, enter information on the fields below and click on the Save button. The latest course based on the student's latest record will be displayed on the Course Graduated field. To change the degree program, just select the correct course from the list. To edit the graduation data on the list above, just specify the correct degree program date of graduation then enter the new values in the fields and click Save. The previous data will just be overwritten.</p>
      </td>
    </tr>
  </table>
  <form action="cso_process_graduation_data.php?id=<?php echo $student_ID;?>&action=ADD" method="post" name = "csoform">
    <table width="563" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student ID:</div></td>
        <td width="12">&nbsp;</td>
        <td width="356"><input type="text" name="student_id" id="student_id" value="<?php echo $student_ID;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Student Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" size="30" name="student_name" id="student_name" value="<?php echo $first_name.' '.$middle_name[0].'. '.$last_name;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Course:</div></td>
        <td>*</td>
        <td><label>
          <select name="course" id="course">
           <?php 
		 	$query = "SELECT * from degree_program";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $degree_program_id;?>"><?php echo $degree_name;?></option>
			<?php }
			?>
          </select>
          </label> 
		</td>
      </tr>
      <tr>
        <td><div align="right">Date Graduated:</div></td>
        <td>*</td>
        <td><input type="text" name="date_graduated" id="date_graduated" value="<?php echo $date_grad;?>">(yyyy-mm-dd)</td>
      </tr>
      <tr>
        <td><div align="right">G.W.A.:</div></td>
        <td>*</td>
        <td><input type="text" name="gwa" id="gwa" value="<?php echo $gwa;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Honor Received:</div></td>
        <td>*</td>
        <td><input name="honor_received" type="text" id="honor_received" size="45" value="<?php echo $honor;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Specify Academic Year:</div></td>
        <td>*</td>
        <td><input type="text" name="specify_academic_year" id="specify_academic_year" value="<?php echo $ay_grad;?>">(yyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Specify Semester:</div></td>
        <td>*</td>
        <td><label>
					<select name="semester" id="semester">
					   <?php
					   		if($sem=="") {
								$sem = -1;
							} 
							$query = "SELECT * from semester WHERE semester_id = '$sem'";
							$result = mysql_query($query);
							while ($row = mysql_fetch_array($result)) {
								extract($row);
								echo "<option value='$semester_id' selected>$semester_type</option>";
							}
							$query = "SELECT * from semester WHERE semester_id != '$sem'";
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
  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("csoform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("date_graduated","req","Required Date Graduated.");
    frmvalidator.addValidation("specify_academic_year","req","Academic Year required.");
 
  </script>
  <p>&nbsp;</p>
</div>

<?php
	require_once 'cso_footer.php';
?>
