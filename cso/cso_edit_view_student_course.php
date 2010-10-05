<?php
//File: CSO Student Course
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
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_change_students_degree_program.php';</script>";
	} else {
  ?>
<div id="contentcolumn1">
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>Select Degree Program</strong></p>
  <table width="650" border="0" align="center">
    <tr>
      <td colspan="6"><div align="center">COURSE OF STUDENT</div></td>
    </tr>
    <tr>
      <td width="188"><div align="center">Course</div></td>
      <td width="94"><div align="center">Unit/Campus</div></td>
      <td width="108"><div align="center">AY Shifted</div></td>
      <td width="95"><div align="center">Sem Shifted</div></td>
      <td width="93"><div align="center">Encoded By</div></td>
      <td width="46"><div align="center">Action</div></td>
    </tr>
    <tr>
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
  <?php
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
	}
			
	?>
  <p>&nbsp;</p>
  <form action="cso_process_add_student_record.php?action=ADD COURSE&id=<?php echo $student_ID;?>" method="post">
    <table width="506" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student ID:</div></td>
        <td width="12">&nbsp;</td>
        <td width="299"><input type="text" name="student_id" id="student_id" value="<?php echo $student_ID;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Student Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="student_name" id="student_name" value="<?php echo $last_name.", ".$first_name;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Current Course:</div></td>
        <td>&nbsp;</td>
        <td><?php 
			if($change=="SAME") { 
			$degree_program_ID = "";
			$query = "SELECT * from students_degree WHERE student_number = '$student_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				$degree_program_ID = $degree_program_id;
				}
			$query = "SELECT * from degree_program WHERE degree_program_id = '$degree_program_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				$prog_name = $degree_name;
				}?><input name="current_course" type="text" id="current_course" value="<?php echo $prog_name;?>" size="30"><?php } else if($change=="NOT"){?> 
          <label>
          <select name="course_list" id="course_list">
            <option value="0">Choose Course</option>
           <?php 
		 	$query = "SELECT * from degree_program";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $degree_program_id;?>"><?php echo $degree_name;?></option>
          </select>
          </label><?php }
		  }?>
        <a href="cso_edit_view_student_course.php?c=NOT&id=<?php echo $student_ID;?>">Click Here to Change</a></td>
      </tr>
      <tr>
        <td><div align="right">Start A.Y:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="start_ay" id="start_ay"> 
          (yyyyyyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Start Semester::</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="start_semester" id="start_semester"></td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="edit_view_student_course" id="edit_view_student_course" value="UPDATE Student's Course">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php } 

	require_once 'cso_footer.php';
?>

