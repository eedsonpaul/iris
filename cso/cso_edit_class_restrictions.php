<?php
//File: CSO Edit Class Restictions
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
	$subject_code = $_GET['id'];
	$section_lab = $_GET['sec'];
	
	//session_start();
	$_SESSION['student_number'] = $student_ID;
	include("connect_to_database.php");
	
	$count = 0;
	$query = "SELECT * from section WHERE course_code = '$subject_code' && section_label = '$section_lab'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Class does not exist. Please input another student number.'); window.location.href = 'cso_change_students_degree_program.php';</script>";
	} else {
  ?>
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>  
  <p class="head"><strong></strong></p>
  <p class="headfont"><strong>Edit Class Restrictions</strong></p>
  <p>&nbsp;</p>
  <?php
	$room = '';
	$class = '';
	$total_slots = '';
	$query = "SELECT * from section WHERE course_code = '$subject_code' && section_label = '$section_lab'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			extract($row);
			$room = $room_id;
			extract($row);
			$class = $class_type;
			extract($row);
			$total_slots = $total_slots;
	}
  ?>
  <form action="cso_process_edit_maximum_slots.php?id=<?php echo $subject_code;?>&sec=<?php echo $section_lab;?>" method="post">
    <table width="494" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Subject:</div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><?php echo $subject_code;?></td>
      </tr>
      <tr>
        <td><div align="right">Section:</div></td>
        <td>*</td>
        <td><input type="text" name="section" id="section" value="<?php echo $section_lab;?>" disabled></td>
      </tr>
      <tr>
        <td><div align="right">Room:</div></td>
        <td>*</td>
        <td><input type="text" name="room" id="room" value="<?php echo $room;?>" disabled></td>
      </tr>
      <tr>
        <td><div align="right">Class Type:</div></td>
        <td>*</td>
        <td><input type="text" name="class_type" id="class_type" value="<?php echo $class;?>" disabled></td>
      </tr>
      <tr>
        <td><div align="right">Original Maximum Slots:</div></td>
        <td>*</td>
        <td><input type="text" name="orig_max_units" id="orig_max_units" value="<?php echo $total_slots;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">New Maximum Slots:</div></td>
        <td>*</td>
        <td><input type="text" name="new_max_slots" id="new_max_slots" value=""></td>
      </tr>
      </table>
    <p>
      <center><input type="submit" name="edit_maximum_slots" id="edit_maximum_slots" value="UPDATE">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php } 
	require_once 'cso_footer.php';
?>
