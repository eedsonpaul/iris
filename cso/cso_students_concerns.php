<?php
//File: CSO Students Concerns Page
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

<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
	<li><a href="cso_add_student_record.php">Add Student Record</a></li>
            <li><a href="cso_student_record_management.php">Student Record Management</a></li>
            <li><a href="cso_students_accountabilities_module.php?action=NA">Students' Accountabilities Module</a></li>
            <li><a href="cso_students_scholarship_module.php">Students' Scholarships Module</a></li>
            <li><a href="cso_generate_password_change_student_login.php">Generate Password/Change Student Login</a></li>
            <li><a href="cso_search_edit_student_personal_enrollment_data.php">Edit Student Personal/Enrollment Data</a></li>
            <li><a href="cso_change_students_degree_program.php">Change Student's Degree Program</a></li>
</div>

<?php
//Page Footer
	require_once 'cso_footer.php';
?>

