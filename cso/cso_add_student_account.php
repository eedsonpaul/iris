<?php
	require_once 'cso_header.php';
?>
<?php
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	session_start();
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
<div class="main">
<div id="navigation">
<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
  <ul>
	  <li>
          <a href="cso.php"><center>CSO FUNCTIONS</center></a></li>
    <?php 
	$emp_id = "101135299";
	?>
        <li><a href="cso_personal_data_employee_login.php">PERSONAL DATA/EMPLOYEE LOGIN</a>
         </ul>

	<ul>
	<li><a href="cso_students_concerns.php">STUDENT'S CONCERNS</a>
	</li>
		<li><a href="cso_subject_module.php">SUBJECT</a>
	</li>
    
	<li><a href="cso_degree_programs.php">DEGREE PROGRAMS</a>
	</li>
	<li> <a href="cso_grades_menu.php">GRADES</a>
	</li>
	<li> <a href="cso_classes_menu.php">CLASSES</a>
		</li>
    </li>
	</ul>
	<ul>
	</ul>
	<ul>
	<li> <a href="#">REGISTRATION</a>
			<ul> <a href="cso_reports_utilities.php">&nbsp;&nbsp;&nbsp;REPORTS/UTILITIES</a>
			</ul>

			<ul> <a href="cso_preenlistment_module.php">&nbsp;&nbsp;&nbsp;Pre-enlistment Module</a>
			</ul>

			<ul> <a href="cso_confirmation_module.php">&nbsp;&nbsp;&nbsp;Confirmation Module</a>
			</ul>
            
            <ul>
            	<a href="cso_general_registration.php">&nbsp;&nbsp;&nbsp;General Registration Module</a>
            </ul>
	</li>
	</ul>
</div>
<div id="contentcolumn1">
    <p class="head"><strong>Add Student Record</strong></p>
  <p class="headfont"><strong>STUDENT LOGIN ACCOUNT</strong></p>
  <table width="250" border="1" align="center">
    <tr>
      <td><div align="center"><strong>NOTICE</strong></div></td>
    </tr>
    <tr>
      <td class="notice"><ul>
          <li>fields with * should be filled up</li>
        <li>do not use apostrophe (')</li>
      </ul></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
	$student_ID = $_GET['id'];
	include("connect_to_database.php");
	
	$pass = "";
	$query = "SELECT password from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			extract($row);
			$pass = $password;
	}
  ?>
  <form action="cso_process_add_student_record.php?action=ADD STUDENT&id=<?php echo $student_ID;?>" method="post">
    <table width="494" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student Number:</div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><input type="text" name="student_id" id="student_id" value="<?php echo $student_ID;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td>*</td>
        <td><input type="text" name="last_name" id="last_name"></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td>*</td>
        <td><input type="text" name="first_name" id="first_name"></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td>*</td>
        <td><input type="text" name="middle_name" id="middle_name"></td>
      </tr>
      <tr>
        <td><div align="right">Gender:</div></td>
        <td>*</td>
        <td><select name="gender" id="gender">
          <option value="Female">Female</option>
          <option value="Male">Male</option>
        </select>        </td>
      </tr>
	  <tr>
        <td><div align="right">Course:</div></td>
        <td>*</td>
        <td colspan="2"><label>
          <select name="course" id="course">
           <?php 
		 	$query = "SELECT * from degree_program";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $degree_program_id;?>"><?php echo $degree_name;?></option>
			<?php }
			?>
          </select>
          </label>
		  </td>
      </tr>
      <tr>
        <td><div align="right">Login Expiration:</div></td>
        <td>*</td>
        <td><input type="text" name="login_expiration" id="login_expiration">
        (yyyymmdd)</td>
      </tr>
      <tr>
        <td><div align="right">Entry A.Y.:</div></td>
        <td>*</td>
        <td><input type="text" name="entry_academic_year" id="entry_academic_year">(end year:yyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Entry Semester:</div></td>
        <td>*</td>
        <td><label>
          <select name="entry_semester" id="entry_semester">
           <?php 
		 	$query = "SELECT * from semester";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $semester_id;?>"><?php echo $semester_type;?></option>
			<?php }
			?>
          </select>
          </label></td>
      </tr>
      <tr>
        <td><div align="right">Citizenship:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="citizenship" id="citizenship"></td>
      </tr>
      <tr>
        <td><div align="right">If citizenship is foreign, select type:</div></td>
        <td></td>
		<td><select name="foreign_type" id="foreign_type">
	  <option value="Filipino"></option>
          <option value="Non-Resident Alien">Non-Resident Alien</option>
          <option value="Resident Alien">Resident Alien</option>
        </select>        </td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_student_record" id="add_student_record" value="ADD">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>

<?php
	require_once 'cso_footer.php';
?>
