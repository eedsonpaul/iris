<?php
//File: CSO Homepage
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
		
		oStringMask = new Mask("########");
		oStringMask.attach(document.csoform.exact_date_incurred);
		
		oStringMask = new Mask("####");
		oStringMask.attach(document.csoform.academic_year_incurred);
		
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
    <?php 
		$student_id = $_GET['id'];
		$act = $_GET['action'];
				
		$accountability = "";
		$acct_details = "";
		$amt_due = "";
		$ay_incurred = "";
		$sem_incurred = "";
		$date = "";
		if($act=="ADD") {
			$button_name = "ADD";
			$path = "cso_process_add_accountability.php?id=$student_id";
		} else if($act=="EDIT") {
			$button_name = "UPDATE";
			$acc_id = $_GET['acct'];
						
			$sqll = "SELECT * from accountability WHERE student_number = '$student_id' && accountability_id = '$acc_id'";
			$result2 = mysql_query($sqll);
        		while ($row = mysql_fetch_array($result2)) {
				$acct_details = $row['details'];
				$amt_due = $row['amount_due'];
				$ay_incurred = $row['year_incurred'];
				$date = $row['date_added'];
				$acct_id = $row['accountability_type_id'];
				$sem_inc = $row['semester_incurred'];
			}

			$path = "cso_process_edit_accountability.php?id=$student_id&acc_id=$acc_id";
		}
	?>
  <p class="head"><strong>Student Accountabilities</strong></p>
    <form action="<?php echo $path;?>" method="post" name ="csoform">
    <table width="494" border="0" align="center" class="tab">
      
	  <?php 
	  	include("connect_to_database.php");


		$sql = "SELECT * from student WHERE student_number = '$student_id'";
		$result = mysql_query($sql);
		$mid_name = "";
        	while ($row = mysql_fetch_array($result)) {
			extract($row);
			$mid_name = $middle_name;
		}

		
		?> 
      <tr>
        <td width="181"><div align="right">Student Number:</div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><?php echo $student_id;?></td>
      </tr>
	<tr>
        <td width="181"><div align="right">Student Name:</div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><?php echo $first_name.' '.$mid_name[0].'. '.$last_name;?></td>
      </tr>
      <tr>
        <td><div align="right">Accountability:</div></td>
        <td>&nbsp;</td>
        <td>
	<label>
          <select name="accountability" id="accountability">
		<?php
			if($act=="ADD") {
		?>
		<option value="-1">Choose Accountability..</option>
           <?php 
		 	$query = "SELECT * from accountability_type WHERE accountability_type_id = 5 || accountability_type_id = 6";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $accountability_type_id;?>"><?php echo $accountability_type;?></option>
			<?php }
			} else if($act=="EDIT") {
				$query = "SELECT * from accountability_type WHERE accountability_type_id = '$acct_id'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);

            echo "<option value='$accountability_type_id' selected>$accountability_type</option>";
			}

			$query = "SELECT * from accountability_type WHERE accountability_type_id = 5 || accountability_type_id = 6";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);

            echo "<option value='$accountability_type_id'>$accountability_type</option>";
			}
			}
			?>
          </select>
          </label></td>
      </tr>
      <tr>
        <td><div align="right">Accountability Details:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="accountability_details" id="accountability_details" value="<?php echo $acct_details;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Academic Year Incurred: *</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="academic_year_incurred" id="academic_year_incurred" value="<?php echo $ay_incurred;?>"></>
		(yyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Semester Incurred:</div></td>
        <td>&nbsp;</td>
        <td><label>
          <select name="semester_incurred" id="semester_incurred">
		<option value="-1">Choose Semester..</option>
           <?php 
		 	$query = "SELECT * from semester WHERE semester_id = '$sem_inc'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				 echo "<option value='$semester_id' selected>$semester_type</option>";			
			
			 }

			
			$query = "SELECT * from semester WHERE semester_id != '$sem_inc'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);

            			echo "<option value='$semester_id'>$semester_type</option>";
				}
			?>
          </select>
          </label></td>
      </tr>
      <tr>
        <td><div align="right">Exact Date Incurred: *</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="exact_date_incurred" id="exact_date_incurred" value="<?php echo $date;?>"></>
        (yyyymmdd)</td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_student_accountability" id="add_student_accountability" value="<?php echo $button_name;?>">
      </center>
    </p>
  </form>
  
  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("csoform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("academic_year_incurred","req","Academic Year required.");
 
  </script>
  
  <p>&nbsp;</p>
</div>

<?php
	require_once 'cso_footer.php';
?>


