<?php
//File: CSO Edit Student Number
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

<?php
	$student_ID = $_GET['id'];
	//session_start();
	$_SESSION['student_number'] = $student_ID;
	include("connect_to_database.php");
	
	$pass = "";
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_change_students_degree_program.php';</script>";
	} else {
  ?>
  <script language="JavaScript">

	  function init(){
		  document.csoform.reset();
		
		  oStringMask = new Mask("#########");
		  oStringMask.attach(document.csoform.student_id);

		
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
    <p class="head"><strong></strong></p>
  <p class="headfont"><strong>Edit Student Number</strong></p>
  <p>&nbsp;</p>
  <?php
	
	$pass = "";
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			extract($row);
			$pass = $password;
	}
  ?>
  <form action="cso_process_edit_student_number.php?action=EDIT STUDENT NUMBER&id=<?php echo $student_ID;?>" method="post" name="csoform">
    <table width="494" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student ID:</div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><input type="text" name="student_id" id="student_id " value="<?php echo $student_ID;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td>*</td>
        <td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>" disabled></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td>*</td>
        <td><input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" disabled></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td>*</td>
        <td><input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name;?>" disabled></td>
      </tr>
      </table>
    <p>
      <center><input type="submit" name="edit_student_number" id="edit_student_number" value="UPDATE">
      </center>
    </p>
  </form>
  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("csoform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("student_id","req","Student Number required.");
	frmvalidator.addValidation("student_id","minlen=9");

	
  </script>
  <p>&nbsp;</p>
</div>
<?php } 

	require_once 'cso_footer.php';
?>
