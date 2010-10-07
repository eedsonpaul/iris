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
  <p class="head"><strong>Student Record Management</strong></p>
  <p class="head">&nbsp;</p>
  <table width="650" border="0" align="center">
      <?php $count = 0;
	include("cso_views.php");
			if($count==1) {
	?>
    <tr>
      <td><div align="center">Check/Fill-up field(s) below to filter the search results</div></td>
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
  <table width="650" border="0" align="center">
    <tr>
    <?php $count = 0;
			if($count==1) {
	?>
      <td height="50" class="normaltext"><p align="left"><strong><center>
        ALL | A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
      </center></strong></p>      </td>
       
    </tr>
  </table>
  <p><center>
    <strong><div class="normaltext">    Search Result(s)    </div></strong>
  </center>
  </p>
  <form action="" method="post">
    <table width="796" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <td width="32">&nbsp;</td>
        <th width="60" height="36"><div align="center" class="normaltext"><strong>ID</strong></div></th>
        <th width="123"><div align="center" class="normaltext"><strong>Name</strong></div></th>
        <th width="86"><div align="center" class="normaltext"><strong>Course</strong></div></th>
        <th width="81"><div align="center" class="normaltext"><strong>Campus</strong></div></th>
        <td width="111">&nbsp;</th>
        <td width="105">&nbsp;</th>
        <td width="99">&nbsp;</th>
      <td width="99">&nbsp;</th>      </tr>
      <?php 
		}
	?>
      <?php
	  	$count = 0;
		if ($count==1) { 
	  ?>
      <tr>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td width="123">&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td width="111"><div align="center">
          <table width="101" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="95">Login Account</td>
            </tr>
            <tr>
              <td>Accountability</td>
            </tr>
            <tr>
              <td>Enrollment Info</td>
            </tr>
            <tr>
              <td>Personal Data</td>
            </tr>
            <tr>
              <td>Student Directory</td>
            </tr>
          </table>
        </div></td>
        <td><table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="95">Grades/Sched</td>
          </tr>
          <tr>
            <td>Grade Summary</td>
          </tr>
          <tr>
            <td>Study Plan</td>
          </tr>
          <tr>
            <td><a href="cso_enroll_student.php">Enroll</a></td>
          </tr>
          <tr>
            <td><a href="cso_edit_view_student_course.php">Course</a></td>
          </tr>
        </table></td>
        <td width="99"><table width="89" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="89"><a href="cso_add_delete_view_graduation_data.php">Graduation Data</a></td>
          </tr>
          <tr>
            <td>Scholarship</td>
          </tr>
          <tr>
            <td>STFAP Bracket</td>
          </tr>
          <tr>
            <td>Adviser</td>
          </tr>
          
        </table></td>
        <td width="99"><table width="89" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>Edit Academic Standing</td>
          </tr>
          <tr>
            <td width="99">Edit Yr. Level &amp; Max. Units</td>
          </tr>
          <tr>
            <td>Edit Student #</td>
          </tr>
          <tr>
            <td>Delete Record/Account</td>
          </tr>
          
        </table></td>
      </tr>
      
      <?php
	  	$query = new Query();
		$query->viewSearchResults();
	  ?>
      <?php }?>
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
