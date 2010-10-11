<?php
//File: CSO Remove INC/4.0 Results Page
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
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>REMOVE INC/4.0</strong></p>
  <p class="head"><strong>Search Results</strong></p>
  <p class="head">&nbsp;</p>
  
  <p><center>
  </center>
  </p>
  <form action="" method="post">
    <table width="690" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <th width="305" height="36"><div align="center" class="style1">Student</div></th>
        <th width="296">Subject</th>
	<th width="200">Grade</th>
        <th width="177"><div align="center"><strong>Action</strong></div></th>
      </tr>
      <?php
	  	$act = $_GET['action'];
	  	include ("cso_remove_inc_4.0_grade.php");
		$query = new editGrades();
		
		if ($act=="INC") {
			$query->removeINC();
		} else if($act=="4.0") {
			$query->remove4();
		}
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