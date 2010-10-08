<?php
//File: CSO View Available Classes Page
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
    <center><p class="head"><b>View Available Classes</b></p></center>
<!--
  <table width="650" border="0" align="center">
  	<tr><center><b><p class="head"><b>View Available Classess</b></p></b></center></tr>
    <tr><form action="" method="post">
      <td width="624"><div align="center" class="headfont"><strong>Look for</strong> 
        <input name="search_subject" type="text" id="search_subject" size="50">
        <input type="submit" name="search_subject_button" id="search_subject_button" value="Submit">
      </div></td></form>
    </tr>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td height="50"class="tab"><p align="left"><strong><center>
        ALL | A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
      </center></strong></p>      </td>
    </tr>
  </table>
-->
	<table width="703" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="275" class="normaltext"><p align="left"><strong>Legend:</strong><br />
              <strong>A</strong> = Available<br />
              <strong>S</strong> = Slots Alloted<br />
              <strong>PE</strong> = Count of Pre-enlisted Students<br />
              <strong>C</strong> = Count of Confirmed Students<br />
              <strong>E</strong> = Count of Officially Enrolled Students<br />
              <strong>W </strong>= Count of Waitlisted Students</p></td>
			<td width="145">&nbsp;</td>
			<td width="163">&nbsp;</td>
			<td width="160">&nbsp;</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<form action="" method="post">
		<table width="675" border="0" align="center" class="tab">
			<tr>
				<th width="85" height="36"><div align="center"><strong>Subject</strong></div></td>
				<th width="105"><div align="center"><strong>Section</strong></div></td>
				<th width="71"><div align="center"><strong>Units</strong></div></td>
				<th width="174"><div align="center"><strong>Schedule</strong></div>
				<th width="128">        <div align="center">S / A / W / C / E</div>
				<th width="86"><div align="center"><strong>Room</strong></div></td>      	</tr>
      
        <?php
			include("connect_to_database.php");
			$unit = 0;
			$count = 0;
			//$semester = $_SESSION['current_semester'];
			//$academic_year = $_SESSION['current_year'];
			
			$sql = "select * from section order by course_code";
			$res = mysql_query($sql);
				
			while($row = mysql_fetch_array($res)){
				$subj_id = $row['course_code'];
				$sect_lab = $row['section_label'];
				$room = $row['room_id'];
				$class = $row['class_type'];
				$total = $row['total_slots'];
				$avail = $row['available_slots'];
				$waitlist = $row['waitlist_count'];
				$confirm = $row['confirmed_count'];
				$enrolled = $row['enrolled_count'];
					
				$sql = "select * from section_schedules where course_code = '$subj_id' && section_label = '$sect_lab'";
				$res3 = mysql_query($sql);
				while($row = mysql_fetch_array($res3)){
					$start = $row['start_time'];
					$end = $row['end_time'];
					$day = $row['day_of_the_week'];
				}
								
				$sql="select * from subject where course_code = '$subj_id'";
				$res2=mysql_query($sql);
			
				while($row = mysql_fetch_array($res2)){
					$subj_name = $row['subject_title'];
					$unit = $row['units'];
					$lab_fee = $row['lab_fee'];
				}   
		?>
			<tr>
				<td><div align="left"><?php echo strtoupper($subj_id);?></div></td>
				<td><div align="center"><?php echo strtoupper($sect_lab);?></div></td>
				<td><div align="center"><?php echo $unit;?></div></td>
				<td><div align="center"><?php echo $day.' '.$start.' - '.$end;?></div></td>
				<td><div align="center"><?php echo $total.' / '.$avail.' / '.$waitlist.' / '.$confirm.' / '.$enrolled;?></div></td>
				<td><div align="center"><?php echo $room;?></div></td>
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

