<?php
//File: CSO Student Record Management Page
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

<div id="right_side">
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
	<p class="head"><strong>Student Record Management</strong></p>
	<p class="head">&nbsp;</p>
	<?php
		$student_number = $_GET['id'];
		$sql="select * from student where student_number = '$student_number'";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res)){
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$middle_name = $row['middle_name'];
		}
	?>
	<p>
    	<strong>Student Number: </strong><?php echo $student_number;?>
    	<br /><strong>Student Name: </strong><?php echo $last_name.', '.$first_name.' '.$middle_name[0].'.';?>
	</p>
	<p><div class="normaltext"><b><center>
		Actions:
	</center></b></div></p>
	<p>
      <?php
	  	require_once 'cso_views.php';
	  	$query = new Query();
		$query->viewStudentMenus($student_number);
	  ?>

	</p>
    <p>
      <center>
      </center>
    </p>
	</form>
	<p>&nbsp;</p>
</div>
<?php
	require_once 'cso_footer.php';
?>
