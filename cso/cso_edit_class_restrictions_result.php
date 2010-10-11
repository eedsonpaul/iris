<?php
//File: CSO Edit Class Restrictions Results Page
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	require_once 'cso_header.php';
	
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
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
	<p><a href="javascript:history.go(-1)"><b>Back</b></a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>EDIT CLASS RESTRICTIONS</strong></p>
  <p class="head"><strong>Search Results</strong></p>
  <p class="head">&nbsp;</p>
  
  <p><center>
  </center>
  </p>
  	<table width="703" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="300" class="normaltext"><p align="left"><strong>Legend:</strong><br />
              <strong>A</strong> = Available<br />
              <strong>S</strong> = Slots Alloted<br />
              <strong>C</strong> = Count of Confirmed Students<br />
              <strong>E</strong> = Count of Officially Enrolled Students<br />
              <strong>W </strong>= Count of Waitlisted Students</p></td>
			<td width="145">&nbsp;</td>
			<td width="163">&nbsp;</td>
			<td width="160">&nbsp;</td>
		</tr>
	</table>
  <form action="" method="post">
  <?php
  	
  ?>
    <table width="675" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
         <th width="100"><div align="center" class="style1">SUBJECT</div></th>
        <th width="50"><div align="center" class="style1">SECTION</div></th>
        <th width="75"><div align="center" class="style1">UNITS</div></th>
        <th width="174"><div align="center"><strong>SCHEDULE</strong></div></th>
        <th width="150"><div align="center"><strong>A/S/PE/C/E/W</strong></div></th>
        <th width="86"><div align="center"><strong>ROOM</strong></div></th>
        <th width="50"><div align="center"><strong>Action</strong></div></th>
      </tr>
      <?php
	  	include ("cso_process_edit_class_restrictions.php");
		$query = new classRestrictions();
		
			$query->editClassRestrictions();
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
	require_once 'cso_footer.php';
?>