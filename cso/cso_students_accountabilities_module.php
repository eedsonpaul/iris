<?php
//File: CSO Students Accountabilities Module Page
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

<script language="JavaScript">

	function init(){
		document.csoform.reset();
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.csoform.search_subject);
		
	}
</script>



<div id="right_side">
	<p><a href='javascript:history.go(-1)'>Back</a></p>
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>Student's Accountabilities</strong></p>

  <p class="headfont"><strong><?php echo $_SESSION['semester'];?>, <?php echo $_SESSION['academic_year'];?></strong></p>
  <p>
    <center>
    </center>
  </p>
  <table width="750" border="0" align="center">
    <tr>
      <form action="cso_students_accountabilities_module.php?action=SEARCH" method="post" name="csoform">
        <td width="750"><div align="center" class="normaltext"><strong>Search by Student Number:
        </strong>
          <input name="search_subject" type="text" id="search_subject" size="50">
                  <input type="submit" name="search_subject_button" id="search_subject_button" value="Search">
        </div></td>
      </form>
    </tr>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td height="50"class="tab"><p align="left">
        <center>
          <strong> <a href="cso_students_accountabilities_module.php?action=NA">ALL</a> </strong>
        </center>
      </p></td>
    </tr>
  </table>
  <p class="head">&nbsp;</p>
  <p><center>
  </center>
  </p>
  <form action="" method="post">
    <table width="690" border="1" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <th width="100" height="36"><div align="center" class="style1">Student Number</div></td>
        <th width="128"><div align="center" class="style1">Student Name</div></td>
        <th width="100"><div align="center" class="style1">Accountability</div></td>
        <th width="115"><div align="center"><strong>Details</strong></div></td>
        <th width="75"><div align="center"><strong>Amount Due</strong></div></td>
        <th width="119"><div align="center"><strong>Date / A.Y. / Semester Incurred</strong></div></td>
		<th width="80">Action</th>
      </tr>
      	<?php
		include("cso_accountability.php");
		include("connect_to_database.php");
		$action = $_GET['action'];
		if($action=="NA") {
			$account = new Accountability();
			$account->viewAccountability();
		} else if($action=="SEARCH") {
			$account = new Accountability();
			$account->searchStudentAccountability($action);
		} else if($action=="GET") {
			$account = new Accountability();
			$account->searchStudentAccountability($action);
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
//Page Footer
	require_once 'cso_footer.php';
?>

