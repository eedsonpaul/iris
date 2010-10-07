<?php
//File: CSO Student Grades Page
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
<?php
	$stud_num = $_GET['id'];
	$first_name = "";
	$last_name = "";
	$middle_name = " ";
	$degree_id = "";
	$degree = "";
	$name = "";
	$ay = "";
	
	$query = "SELECT * FROM student WHERE student_number = '$stud_num'";
	$result = mysql_query($query);
	while($student = mysql_fetch_array($result)) {
		$first_name = $student['first_name'];
		$last_name = $student['last_name'];
		$middle_name = $student['middle_name'];
		$degree_id = $student['degree_program'];
	}
	
	$name = $last_name.", ".$first_name." ".$middle_name[0];
	 
	$query = "SELECT * FROM degree_program WHERE degree_program_id = '$degree_id'";
	$result = mysql_query($query);
	while($deg = mysql_fetch_array($result)) {
		$degree = $deg['degree_name'];
	}
?>
<div id="whole">
	<p><a href='javascript:history.go(-1)'>&larr;Back</a></p>
    <table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="133" class="normaltext"><div align="right"><b>Student Number</b></div></td>
        <td width="10"><div align="center"><b>:</b></div></td>
        <td width="207" class="tab"><?php echo $stud_num; ?></td>
      </tr>
      <tr>
        <td><div align="right" class="normaltext"><b>Name </b></div></td>
        <td><div align="center"><b>:</b></div></td>
        <td class="tab"><?php echo $name; ?></td>
      </tr>
      <tr>
        <td><div align="right" class="normaltext"><b>Degree Program</b></div></td>
        <td><div align="center"><b>:</b></div></td>
        <td class="tab"><?php echo $degree; ?></td>
      </tr>
    </table>
    <p align="center" class="head"><b>VIEW GRADES</b><br>
    </p>

	<form action="" method="post">
		<table width="800" border="0" align="center" class="tab">
			<tr>
			  <th width="30">              
				<div align="center">#</div>
			  <th width="119" height="36"><div align="center"><strong>Academic Year</strong></div></td>
				<th width="104"><div align="center"><strong>Semester</strong></div></td>
				<th width="148"><div align="center"><strong>Previous Semester <br />Class Standing</strong></div></td>
				<th width="143"><div align="center"><strong>Current Semester <br />
				  Class Standing</strong></div>
				<th width="134">        <div align="center">G.W.A</div>
				<th width="92"><div align="center"><strong>Action</strong></div></td>      	</tr>
      
        <?php
			include("connect_to_database.php");
			$count = 1;
			//$semester = $_SESSION['current_semester'];
			//$academic_year = $_SESSION['current_year'];
			$ay = "";
			$sem = "";
			$standing = "";
			$semname = "";
			$grades = 0;	
			$query = "SELECT * FROM grade WHERE student_number = '$stud_num' order by academic_year";
			$result = mysql_query($query);
			while($grade = mysql_fetch_array($result)) {
				$ay = $grade['academic_year'];
				$sem = $grade['semester'];
				$standing = $grade['remarks'];
				$igrade = $grade['initial_grade'];
				
				$query = "SELECT * FROM semester WHERE semester_id = '$sem'";
				$result = mysql_query($query);
				while($sems = mysql_fetch_array($result)) {
					$semname = $sems['semester_type'];
				}
		?>
			<tr>
			  <td><center><?php echo $count;?>.</center></td>
				<td><div align="center"><?php echo $start = ($ay-1).' - '.$ay;?></div></td>
				<td><div align="center"><?php echo $semname;?></div></td>
				<td><div align="center"><?php if($count==1){ echo 'N/A'; } else { echo "Previous";}?></div></td>
				<td><div align="center"><?php echo "Current";?></div></td>
				<td><div align="center"><?php echo number_format(($grades = ($grades + $igrade)/$count), 2, '.', '');?></div></td>
				<td><div align="center"><a href="cso_view_student_grade_ind.php?id=<?php echo $stud_num;?>&sem=<?php echo $sem;?>&ay=<?php echo $ay;?>">VIEW</a></div></td>
			</tr>
		<?php $count++;} ?>
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

