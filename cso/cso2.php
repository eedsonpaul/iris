<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 5px;
	margin-top: 5px;
   }
.style4 {color: #9D7E22}
</style>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>
<center>
<div id="headlabel">
	<p>
    	<b>Employee ID :</b> &nbsp; 101135299 <br>
      	<b>Name &nbsp; :</b> &nbsp; OMPAD, ANECITA T <br>
      	<b>Designation :</b> &nbsp; Clerk IV <br>
        <b>Unit: </b>
 	</p>
</div>
<div id="navigation">
<table cellpadding="0" cellspacing="0">
<tr><center>
	<td colspan="2">
		<div align="center">
		  <ul>
		        <li>
		          <a href="#">CSO FUNCTIONS</a></li>
		    <?php 
			$emp_id = "101135299";
		?>
		        <li><a href="#">PERSONAL DATA/EMPLOYEES LOGIN</a>
		                <ul>
		                    <li><a href="cso_add_employee_login_info.phpid<?php echo $emp_id;?>">Edit My Login Data</a></li>
		                  <li><a href="cso_add_employee_record.php?action=EDIT&id<?php echo $emp_id;?>">Edit My Personal Data</a></li>
		                  <li><a href="cso_add_employee_login_info.phpid<?php echo $emp_id;?>">Edit My Login Data</a></li>
                  </ul>
              </ul>
		  </div></td>
	</center></tr>
<tr>
	<td>
	<ul>
	<li><a href="#">STUDENT'S CONCERNS</a>
		<ul>
        	<li><a href="cso_add_student_record.php">Add Student Record</a></li>
            <li><a href="cso_student_record_management.php">Student Record Management</a></li>
            <li><a href="cso_students_accountabilities_module.php">Students' Accountabilities Module</a></li>
            <li><a href="cso_students_scholarship_module.php">Students' Scholarships Module</a></li>
            <li><a href="cso_generate_password_change_student_login.php">Generate Password/Change Student Login</a></li>
            <li><a href="cso_edit_student_personal_enrollment_data.php">Edit Student Personal/Enrollment Data</a></li>
            <li><a href="cso_change_students_degree_program.php">Change Student's Degree Program</a></li>
      	</ul>
	</li>
		<li><a href="#">SUBJECT</a>
		<ul>
        	<li><a href="cso_subject_management_module.php">Subject Management Module</a></li>
        </ul>
	</li>
    
	<li><a href="#">DEGREE PROGRAMS</a>
		<ul>
        	<li><a href="cso_degree_programs_management_module.php">Degree Programs Management Module</a></li>
		</ul>
	</li>
	<li> <a href="#">GRADES</a>
		<ul>
	        <li><a href="cso_grades_module.php">Grades Module</a></li>
            <li><a href="cso_list_faculty_with_submitted_grades.php">List of Faculty with Submitted Grades</a></li>
            <li><a href="cso_populate_classlist.php">Populate Classlist</a></li>
		</ul>
	</li>
	<li> <a href="#">CLASSES</a>
		<ul>
	        <li><a href="cso_classes_management_module.php">Classes Management Module</a></li>
            <li><a href="cso_view_room_utilization.php">View Room Utilization</a></li>
            <li><a href="cso_view_faculty_schedule.php">View Faculty Schedule</a></li>
		</ul>
		</li>
    </li>
	</ul>
	<ul>
	</ul></td>
	<td valign="top">
	<ul>
	<li> <a href="student_View accountabilities.html">REGISTRATION</a>
			<ul> <a href="#">&nbsp;&nbsp;&nbsp;REPORTS/UTILITIES</a>
	        	<li><a href="cso_summary_of_enrollment.php">&nbsp;&nbsp;&nbsp;Summary of Enrollment</a></li>
                <li><a href="cso_summary_of_enrollment.php">&nbsp;&nbsp;&nbsp;Print Student Directory</a></li>
                <li><a href="cso_list_students_with_residency.php">&nbsp;&nbsp;&nbsp;List of Students with Residency</a></li>
                <li><a href="cso_list_officially_enrolled_students.php">&nbsp;&nbsp;&nbsp;List of officially enrolled students</a></li>
                <li><a href="cso_list_students_per_course.php">&nbsp;&nbsp;&nbsp;List of Students per Course</a></li>
                <li><a href="cso_print_classlist.php">&nbsp;&nbsp;&nbsp;Print Classlist</a></li>
                <li><a href="cso_overall_enrollment_summary.php">&nbsp;&nbsp;&nbsp;Over-all Enrollment Summary</a></li>
			</ul>

			<ul> <a href="#">&nbsp;&nbsp;&nbsp;Pre-enlistment Module</a>
	        	<li><a href="cso_classes_status.php">&nbsp;&nbsp;&nbsp;Classes Status</a></li>
                <li><a href="cso_list_preregistered_students.php">&nbsp;&nbsp;&nbsp;List of Pre-registered Students</a></li>
                <li><a href="cso_preenlistment_results.php">&nbsp;&nbsp;&nbsp;Pre-Enlistment Results</a></li>
			</ul>

			<ul> <a href="#">&nbsp;&nbsp;&nbsp;Confirmation Module</a>
	        	<li><a href="cso_list_students_with_confirmed_subjects.php">&nbsp;&nbsp;&nbsp;List of Students with Confirmed Subjects</a></li>
                <li><a href="cso_classes_status.php">&nbsp;&nbsp;&nbsp;Classes Status</a></li>
                <li><a href="cso_confirmation_results.php">&nbsp;&nbsp;&nbsp;Confirmation Results</a></li>
			</ul>
            
            <ul>
            	<li><a href="cso_general_registration.php">General Registration Module</a></li>
            </ul>
	</li>
	</ul>	</td>
	<td></td>
</tr>
</table>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><img src="foot.gif" width="1024" height="162"></p>
</div>
</body>
</html>
