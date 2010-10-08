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

<?php
	include("connect_to_database.php");
	
	$change = $_GET['c'];
	$edit = $_GET['change'];
	$entry_ay = '';
	$entry_sem = '';
	$encoded = '';
	$prog_name = '';
	$sem = '';
	$employee = '';
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
	
	$degree_program_ID = "";
	$query = "SELECT * from students_degree WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		extract($row);
		$degree_program_ID = $degree_program_id;
		extract($row);
		$entry_ay = $entry_academic_year;
		extract($row);
		$entry_sem = $entry_semester;
		extract($row);
		$encoded = $last_updated_by;
		
		$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$encoded'");
		$data = mysql_fetch_array($res);
		$employee = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'];
	}
	$length=strlen($entry_ay);
	$start_ay = substr($entry_ay, 0, 4);
	$end_ay = substr($entry_ay, 4, $length-4);
	$ay = $start_ay." - ".$end_ay;
	
	$query = "SELECT * from degree_program WHERE degree_program_id = '$degree_program_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		extract($row);
		$prog_name = $degree_name;
	}
	
	$query = "SELECT * from semester WHERE semester_id = '$entry_sem'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		extract($row);
		$sem = $semester_type;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_change_students_degree_program.php';</script>";
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
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>Select Degree Program</strong></p>
  <table width="650" border="0" align="center" class="tab">
    <tr>
      <td colspan="6"><div align="center" class="head"><b>COURSE OF STUDENT</b></div></td>
    </tr>
    <tr>
      <th width="188"><div align="center"><b>Course</b></div></td>
      <th width="94"><div align="center"><b>Unit/Campus</b></div></td>
      <th width="108"><div align="center"><b>AY Shifted</b></div></td>
      <th width="95"><div align="center"><b>Sem Shifted</b></div></td>
      <th width="93"><div align="center"><b>Encoded By</b></div></td>
      <th width="46"><div align="center"><b>Action</b></div></td>
    </tr>
<?php
	if($prog_name!="") {
?>
    <tr>
      <td><div align="center"><?php echo $prog_name;?></div></td>
      <td><div align="center"><?php echo 'UNIT';?></div></td>
      <td><div align="center"><?php echo $ay?></div></td>
      <td><div align="center"><?php echo $sem;?></div></td>
      <td><div align="center"><?php echo $employee;?></div></td>
      <td><div align="center"><a href="cso_process_delete_student_course.php?id=<?php echo $student_ID;?>">DELETE</a></div></td>
    </tr>
<?php
	} else {
?>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
<?php } 
?>
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
  <form action="cso_process_add_student_record.php?action=ADD COURSE&id=<?php echo $student_ID;?>" method="post" name="csoform">
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
			if($edit=="NO") { 
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
				}?><input name="course" type="text" id="course" value="<?php echo $prog_name;?>" size="25" readonly="readonly">
				  <a href="cso_edit_view_student_course.php?c=NOT&id=<?php echo $student_ID;?>&change=YES">Click Here to Change</a>
				<?php } else if($edit=="YES"){?> 
          <label>
          <select name="course" id="course">
           <?php 
		   $query = "SELECT * from degree_program WHERE degree_program_id = '$degree_program_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				$degree = $degree_name;
				$degree_id = $degree_program_id;
				echo "<option value='$degree_id' selected>$degree</option>";
			}
		   
		 	$query = "SELECT * from degree_program WHERE degree_program_id != '$degree_program_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			echo "<option value='$degree_program_id'>$degree_name</option>";
			}
			?>
          </select>
          </label><?php 
		  }?>
		</td>
      </tr>
      <tr>
        <td><div align="right">Start A.Y:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="start_ay" id="start_ay" value="<?php echo $entry_ay;?>"> 
          (yyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Start Semester:</div></td>
        <td>&nbsp;</td>
        <td>
		<?php 
			if($edit=="NO") { 
			?><input type="text" name="start_semester" id="start_semester" value="<?php echo $sem?>" readonly>
			<?php } else if($edit=="YES"){?> 
          <label>
          <select name="start_semester" id="start_semester">
           <?php 
		   $query = "SELECT * from semester WHERE semester_id = '$entry_sem'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				echo "<option value='$semester_id' selected>$semester_type</option>";
			}
		   	$query = "SELECT * from semester WHERE semester_id != '$entry_sem'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				echo "<option value='$semester_id'>$semester_type</option>";
			}
			?>
          </select>
          </label><?php 
		  }?></td>
      </tr>
    </table>
    <p><?php if($edit=="YES") { ?>
      <center><input type="submit" name="edit_view_student_course" id="edit_view_student_course" value="UPDATE Student's Course">
      </center>
<?php } ?>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php } 

	require_once 'cso_footer.php';
?>

