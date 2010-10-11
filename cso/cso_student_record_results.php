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
  <p class="head"><strong>Student Record Management</strong></p>
  <p class="head">&nbsp;</p>
  <table width="650" border="0" align="center">
    <?php
		$count = 0;
		include("cso_views.php");
			if($count==1) {
	?>
    <tr>
      <td><div align="center" class="normaltext">Check/Fill-up field(s) below to filter the search results</div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>sort results by course</strong> by this course 
          <input type="text" name="this_course" id="this_course"> 
          by this unit 
          <input type="text" name="this_unit" id="this_unit"> 
          by this degree level (G/U) 
          <input type="text" name="this_degree_level" id="this_degree_level">
      </div></td>
    </tr>
    <?php
	}
	?>
        <tr><form action="cso_student_record_results.php" method="post">
      <td width="624"><div align="center" class="normaltext">Search by ID / Lastname: 
        <input name="search_name" type="text" id="search_name" size="50">
        <input type="submit" name="search" id="search" value="GO">
      </div></td></form>
    </tr>
  </table>
  <p><center>
    <strong>    Search Result(s)    </strong>
  </center>
  </p>
  <br>
  <form action="" method="post">
    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <td width="10">&nbsp;</td>
        <th width="60" height="36"><div align="center" class="normaltext"><strong>ID</strong></div></th>
        <th width="100"><div align="center" class="normaltext"><strong>Name</strong></div></th>
        <th width="120"><div align="center" class="normaltext"><strong>Course</strong></div></th>
        <th width="81"><div align="center" class="normaltext"><strong>Campus</strong></div></th>
		</tr>
      <?php
	  	$query = new Query();
		$query->viewSearchResults();
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
