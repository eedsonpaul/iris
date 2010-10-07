<?php
//File: CSO Grades Module Page
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
<div class="main">
	<div id="navigation">
    <ul>
	  	<li><a href="cso.php"><center>CSO FUNCTIONS</center></a></li>
        <li><a href="cso_personal_data_employee_login.php">PERSONAL DATA/EMPLOYEE LOGIN</a></li>
	</ul>

	<ul>
		<li><a href="cso_students_concerns.php">STUDENT'S CONCERNS</a></li>
		<li><a href="cso_subject_module.php">SUBJECT</a></li>
    	<li><a href="cso_degree_programs.php">DEGREE PROGRAMS</a></li>
		<li> <a href="cso_grades_menu.php">GRADES</a></li>
		<li> <a href="cso_classes_menu.php">CLASSES</a></li>
	</ul>
	<ul>
		<li> <a href="#">REGISTRATION</a>
			<ul> <a href="cso_reports_utilities.php">&nbsp;&nbsp;&nbsp;REPORTS/UTILITIES</a></ul>
			<ul> <a href="cso_preenlistment_module.php">&nbsp;&nbsp;&nbsp;Pre-enlistment Module</a></ul>
			<ul> <a href="cso_confirmation_module.php">&nbsp;&nbsp;&nbsp;Confirmation Module</a></ul>
            <ul><a href="cso_general_registration.php">&nbsp;&nbsp;&nbsp;General Registration Module</a></ul>
		</li>
	</ul>
	</div>
    
<div id="right_side">
	<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
    <p class="headfont">&nbsp;</p>
  <form action="" method="post">
    <p>
    <center>
  <table width="586" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" class="tab2">
          <tr>
            <td width="268" height="256"><table width="235" border="0" cellpadding="0" cellspacing="0">
              <tr>
                  <td><div align="center" class="tab2"><strong>..::.. SELECT ACTION ..::..</strong></div></td>
              </tr>
                <tr>
                  <td height="181" class="tab2"><ul>
                    <li><strong>Input Grades
                      </strong>
                      <ul>
                        <li>per Student</li>
                        <li>per Class</li>
                      </ul>
                    </li>
                    <li><strong>Change Grades</strong>
                      <ul>
                        <li><a href="cso_remove_inc_4.php?action=INC">Remove INC</a></li>
                        <li><a href="cso_remove_inc_4.php?action=4.0">Remove 4.0</a></li>
                      </ul>
                    </li>
                  </ul></td>
              </tr>
                <tr>
                  <td height="100">&nbsp;</td>
              </tr>

              </table></td>
            <td width="312"><table width="298" height="311" border="0" align="center" cellpadding="0" cellspacing="0" class="tab2">
              <tr>
                <td width="298" height="25"><div align="center" class="tab2"><strong>..::.. SELECT ACTION ..::..</strong></div></td>
              </tr>
              <tr>
                <td height="250" class="tab2"><ul>
                  <li><strong>Reports / Views
                    </strong>
                    <ul>
                      <li>Student's True Copy of Grades</li>
                      <li>Print Gradesheets</li>
                      <li>List of US and CS</li>
                      <li><a href='cso_view_list_with_academic_standing.php'>List w/ Academic Standing</a></li>
                      </ul>
                  </li>
                  <li><strong>Copy of Grades per Semester</strong></li>
                  <ul>
                    <li>All Students of this College</li>
                    <li>By Division</li>
                    <li>By First Letter of Family Name</li>
                    <li>By Specific Student</li>
                  </ul>
                </ul></td>
              </tr>
              <tr>
                <td height="36">&nbsp;</td>
              </tr>

            </table></td>
          </tr>
      </table>
    </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>

<?php
//Page Footer
	require_once 'cso_footer.php';
?>
