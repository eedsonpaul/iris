<?php
//File: CSO View Room Utilization
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
<?php
	$room = $_GET['id'];
	
	$building = $_GET['bd'];
	$building_name = "";
	
	$sql = "select * from building WHERE building_id = '$building'";
	$res = mysql_query($sql);
				
	while($row = mysql_fetch_array($res)){
		$building_name = $row['building_name'];
	}	
?>
    <center>
      <p class="head"><b>View Room Utilization</b></p>
      <p class="normaltext"><center><b><?php echo $building_name.' Room '.$room;?></b></center></p>
  </center>
<p>&nbsp;</p>
	<form action="" method="post">
		<table width="510" border="0" align="center" class="tab">
			<tr>
				<th width="85" height="36"><div align="center"><strong>Subject</strong></div></td>
				<th width="105"><div align="center"><strong>Section</strong></div></td>
				<th width="174"><div align="center"><strong>Day</strong></div>
				<th width="128">        <div align="center">Time</div>				</tr>
      
        <?php
			include("connect_to_database.php");
			$unit = 0;
			$count = 0;
			//$semester = $_SESSION['current_semester'];
			//$academic_year = $_SESSION['current_year'];
			
			$sql = "select * from section WHERE room_id = '$room'";
			$res = mysql_query($sql);
				
			while($row = mysql_fetch_array($res)){
				$subj_id = $row['course_code'];
				$sect_lab = $row['section_label'];
					
				$sql = "select * from section_schedules where course_code = '$subj_id' && section_label = '$sect_lab'";
				$res3 = mysql_query($sql);
				while($row = mysql_fetch_array($res3)){
					$start = $row['start_time'];
					$end = $row['end_time'];
					$day = $row['day_of_the_week'];
				}  
		?>
			<tr>
				<td><div align="left"><?php echo strtoupper($subj_id);?></div></td>
				<td><div align="center"><?php echo strtoupper($sect_lab);?></div></td>
				<td><div align="center"><?php echo $day;?></div></td>
				<td><div align="center"><?php echo $start.' - '.$end;?></div></td>
			</tr>
		<?php } ?>
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

