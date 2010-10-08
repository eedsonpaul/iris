<?php
//File: CSO Subject Management Module
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
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p> 

  <table width="650" border="0" align="center">
    <tr><form action="" method="post">
      <td width="624"><div align="center"><strong>Look for</strong> 
        <input name="search_subject" type="text" id="search_subject" size="50">
        <input type="submit" name="search_subject_button" id="search_subject_button" value="Submit">
      </div></td></form>
    </tr>
  </table>

  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="680" border="0" align="center" class="tab">
      <tr>
        <th width="75" height="36"><div align="center"><strong>Subject Rcode</strong></div></td>
        <th width="200"><div align="center"><strong>Subject Name / Title</strong></div></td>
        <th width="46"><div align="center"><strong>Units</strong></div></td>
        <th width="86"><div align="center"><strong>Minimum Year Level</strong></div></td>
        <th width="81"><div align="center"><strong>Degree Level</strong></div></td>
        <th width="87"><div align="center"><strong>Pre-requisites</strong></div></td>
      
        <?php
		include("connect_to_database.php");
		$query = "SELECT *from subject";
		$result = mysql_query($query);
        	while ($row = mysql_fetch_array($result)) {
				extract($row);       
	?>
      <tr>
        <td><div align="right"><strong><?php echo strtoupper($course_code);?></strong></div></td>
        <td><strong><?php echo $subject_title;?></strong><br>
        <strong>Full Name:</strong> <?php extract($row); echo $subject_title;?><br>
        <strong>Title:</strong> <?php extract($row); echo $subject_title;?><br>
        <strong>Credited?:</strong> true<br>
        <strong>Numeric Grades?:</strong> true<br>
        <strong>Repeatable To:</strong> <?php extract($row); //echo $repeatable_to;?><br>
        <strong>Date Proposed:</strong> <?php extract($row); echo $date_proposed;?><br>
        <strong>Date Approved:</strong> <?php extract($row); echo $date_approved;?><br>
        <strong>Date First Implemented:</strong> <?php extract($row); echo $date_first_implemented;?><br>
        <strong>Date Revision Implemented:</strong> <?php extract($row); echo $date_revision_implemented;?><br>
        <strong>Date Abolished in Offerings:</strong> <br>
        <strong>Unit In-charged:</strong> <?php extract($row); //echo //$unit_in_charge;?><br>
        <strong>Laboratory Fee:</strong> <?php extract($row); //echo //$laboratory_fee;?><br>
        <strong>RGEP/NSTP/P.E. Name:</strong> <br>
        <strong>Description:</strong> </td>
        <td><div align="center"><?php extract($row); echo $units;?></div></td>
        <td><div align="center"><?php extract($row); //echo //$minimum_year_level;?></div></td>
        <td><div align="center"><?php extract($row); echo $degree_level;?></div></td>
        <td><div align="center"><b>
		<?php
			$query1 = "SELECT prereq_course_code from prerequisite WHERE course_code = '$course_code'";
			$result1 = mysql_query($query1);
			$count = 0;
        		while ($row = mysql_fetch_array($result1)) {
				//echo $row['prereq_course_code'].',';
				$count++;
			} 
			
			if($count!=0) {
				if($count>1) {
				$query1 = "SELECT prereq_course_code from prerequisite WHERE course_code = '$course_code'";
				$result1 = mysql_query($query1);
        				while ($row = mysql_fetch_array($result1)) {
						echo strtoupper($row['prereq_course_code']).',';	
					}
				} else {
					$query1 = "SELECT prereq_course_code from prerequisite WHERE course_code = '$course_code'";
					$result1 = mysql_query($query1);
        				while ($row = mysql_fetch_array($result1)) {
						echo strtoupper($row['prereq_course_code']);	
					}
				}	
			}
		?>
	</b></div></td>
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

