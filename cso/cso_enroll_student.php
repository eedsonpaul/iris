<?php
//File: CSO Enroll Student
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
  <p class="head"><strong>General Registration</strong></p>
  <p class="head"><strong>Semester goes here</strong></p>
  <p class="head">&nbsp;</p>
  <?php
  	include("connect_to_database.php");
	include("sql_queries.php");
	include("cso_views.php");
	
	$stud_num = $_GET['id'];
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$stud_num'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 
		    'cso_general_registration.php';</script>";
	} else {
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from student WHERE student_number = '$stud_num'");
	while ($row = mysql_fetch_array($result)) {
			$first_name = $row['first_name'];
			$middle_name = $row['middle_name'];
			$last_name = $row['last_name'];
			$year_level = $row['year_level'];
			$academic_standing = $row['academic_standing'];
			$student_number = $row['student_number'];
	}
  ?>
  <table width="750" border="0" align="center" class="tab2">
    <tr>
      <td><div align="center">
        <table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="115" class="tab2"><strong>STUDENT NAME</strong></td>
            <td width="10" class="tab2"><strong>:</strong></td>
            <td width="155" class="tab2"><?php echo $first_name." ".$middle_name[0].". ".$last_name;?></td>
            <td width="130" class="tab2"><div align="right"><strong>DEGREE PROGRAM</strong></div></td>
            <td width="13" class="tab2"><strong>:</strong></td>
            <td width="125" class="tab2">BSCS</td>
            <td width="225" class="tab2"><div align="left"><a href="cso_view_form5.php?id=<?php echo $stud_num;?>">Print Form 5</a></div></td>
          </tr>
          <tr>
            <td class="tab2"><strong>STUDENT NUMBER</strong></td>
            <td class="tab2"><strong>:</strong></td>
            <td class="tab2"><?php $stud_num = $student_number; echo $student_number;?></td>
            <td class="tab2"><div align="right"><strong>YEAR LEVEL</strong></div></td>
            <td class="tab2"><strong>:</strong></td>
            <td class="tab2"><?php echo $year_level;?></td>
            <td class="tab2"><div align="left">View Study Plan</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="right" class="tab2"><strong>ACADEMIC STANDING</strong></div></td>
            <td class="tab2"><strong>:</strong></td>
            <td class="tab2"><?php echo $academic_standing;?></td>
            <td class="tab2"><div align="left">View Grade Summary</div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
    </tr>
    <tr><form action="" method="post">
      <td width="798"><div align="center"></div></td></form>
    </tr>
  </table>
  <p><center>
  </center>
  </p>
<?php
    $_SESSION['student_number'] = $stud_num;?>
  <form action="" method="post">
    <table width="680" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <td width="5">&nbsp;</td>
        <th width="103" height="36"><div align="center" class="style1">Subject</div></th>
        <th width="75"><div align="center" class="style1">Section</div></th>
        <th width="58"><div align="center" class="style1">Units</div></th>
        <th width="201"><div align="center" class="style1">Schedule</div></th>
        <th width="127"><div align="center"><strong>Status</strong></div></th>
        <th width="120"><div align="center"><strong>Action</strong></div></th>
      </tr>
       <?php
	  	$query = new Query();
		$units = $query->viewStudentRegistration($stud_num);
	  ?>
    </table>
    <p>
      <center>
        <table width="703" border="0" cellpadding="0" cellspacing="0" class="tab2" align="center">
          <tr>
            <td width="202" class="tab2">Total Units Earned:</td>
            <td width="178" class="tab2">Total Units Confirmed: <?php echo $units;?></td>
            <td width="163" class="tab2">&nbsp;</td>
            <td width="160" class="tab2"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5" class="tab2"><a href="cso_view_form5.php?id=<?php echo $stud_num;?>">Print Paid Form5 Here</a></td>
              </tr>
              <tr>
                <td height="5" class="tab2">View Assessment Here</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><div align="center">
              <a href=""><input type="submit" name="add_student_subject" id="add_student_subject" value="ADD SUBJECT" onclick="addSubject();"></a>
            </div></td>
            <td><div align="center">
              <a href="cso_students_accountabilities_module.php?id=<?php echo $stud_num;?>&action=GET"><input type="submit" name="check_accountability" id="check_accountability" value="CHECK ACCOUNTABILITY"></a>
            </div></td>
            <td><div align="center">
              <a href=""><input type="submit" name="edit_enrollment_data" id="edit_enrollment_data" value="EDIT ENROLLMENT DATA"></a>
            </div></td>
          </tr>
        </table>
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<script type="text/javascript">
	function addSubject(){
		window.open("../student/student_search_subject.php", "info", "width=600,scrollbars=0,resizable=0");
	}
		
</script>
<?php }
	require_once 'cso_footer.php';
?>

