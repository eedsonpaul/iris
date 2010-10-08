<?php
//File: CSO View All Students With Confirmed Subjects But Not Officially Enrolled Page
//Version 1: Date: October 05, 2010
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
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <center><p class="head"><b>List of All Students With Confirmed Subjects But Not Officially Enrolled</b></p></center>
	<p>&nbsp;</p>
	<form action="" method="post">
		<table width="550" border="0" align="center" class="tab">
			<tr>
				<th width="85" height="36"><div align="center"><strong>Student Number</strong></div></td>
				<th width="105"><div align="center"><strong>Student Name</strong></div></td>
				<th width="71"><div align="center"><strong>Degree Program</strong></div></td>
			</tr>
        <?php
			include("cso_student_lists_class.php");
			$students = new studentLists();
			$students->viewStudentsConfirmedButNotOfficiallyEnrolled();			
		?>
		</table>
    <p>
      <center>
      </center>
    </p>
	</form>
	<p>&nbsp;</p>
</div>
<?php
//Page Footer
	require_once 'cso_footer.php';
?>

