<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Grades Module</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 0px;
	margin-top: 0px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
</style>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="mblogout.gif" width="121" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>
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
    <p class="headfont">&nbsp;</p>
  <form action="" method="post">
    <p>
    <center>
  <table width="586" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="268" height="256"><table width="235" border="0" cellpadding="0" cellspacing="0">
              <tr>
                  <td><div align="center"><strong>..::.. SELECT ACTION ..::..</strong></div></td>
              </tr>
                <tr>
                  <td height="181"><ul>
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
            <td width="312"><table width="298" height="311" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="298" height="25"><div align="center"><strong>..::.. SELECT ACTION ..::..</strong></div></td>
              </tr>
              <tr>
                <td height="250"><ul>
                  <li><strong>Reports / Views
                    </strong>
                    <ul>
                      <li>Student's True Copy of Grades</li>
                      <li>Print Gradesheets</li>
                      <li>List of US and CS</li>
                      <li>List w/ Academic Standing</li>
                      </ul>
                  </li>
                  <li><strong>Copy of Grades per Semester</strong></li>
                  <ul>
                    <li>All Students of this College</li>
                    <li>By Division</li>
                    <li>By First Letter of Family Name</li>
                    <li>By Specific STudent</li>
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

<div id="footer"><a href="http://www.upv.edu.ph/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image13','','foothover.gif',0)"><img src="foot.gif" name="Image13" width="1024" height="144" border="0"></a><img src="bgbordertop.gif" width="1024" height="12">
  <center>
  <a href="http://www.google.com">LINK 1</a> | <a href="http://www.google.com">LINK 2</a> | <a href="http://www.google.com">LINK 3</a>| <a href="http://www.google.com">LINK 3</a>| <a href="http://www.google.com">LINK 4</a><br>
  Copyright &copy; 2010-2012. All Rights Reserved. | <a href="http://www.google.com">Contact Chief Architect</a>.<br>
  Office of the University Registrar, University of the Philippines Visayas, Miagao, Iloilo, Philippines, 5023&nbsp;
    
    <br>
    Phone/Fax: +63 (33) 315 8556 &nbsp;|&nbsp; E-mail: our_upvisayas@yahoo.com&nbsp; 
    <br>
    
    <img src="bgborderbot.gif" width="1024" height="16">
</div>
</div>
</body>
</html>
