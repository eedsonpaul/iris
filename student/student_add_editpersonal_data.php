<?php
	require_once 'student_header.php';
?>
<!--
<?php 
	/*
	 require 'dbconnect.php';
	 session_start();
	*/
	$student_number = $_SESSION['student_number'];	 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 5px;
	margin-top: 5px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
.style4 {color: #FF0000}
</style>
</head>

<body>
<div id="container">
<p><img src="images/banner.gif" width="1024" height="163">
<img src="images/mb1.1.jpg" width="140" height="30"><a href="../admin_transact_user.php?action=Logout"><img src="images/mblogout.gif" width="121" height="30" border="0"></a><img src="images/mb1.2.jpg" width="33" height="30"><img src="images/mb1.3.jpg" width="730" height="30"><img src="images/mb1.4.gif" width="1024" height="33"></p>
-->
<div class="main">
	<div id="navigation">
	<ul>
	  <li> <a href="#"> PERSONAL DATA </a>

		<ul>
			<ul>
			  <li><a href="student.php">student profile </a><a href="student_edit_login_account.php">Edit login account</a></li>
			</ul>
			<li><a href="student_add_editpersonal_data.php">add/edit personal data</a></li>
		  </ul>
		</li>
		
		<li> <a href="#">registration</a>

		  <ul>
			<li> <a href="student_View accountabilities.php">View accountabilities </a></li>
			<li><a href="student_view study plan.php">view study plan </a>
			  <ul>
				<ul>
				  <li><a href="student_view Grades per semester.php">view grades</a></li>
				</ul>
			  </ul>
			</li>
		  </ul>
		</li>
		
		<li>
		  <ul>
			<li><a href="student_confirm subject here.php">edit subject here </a></li>
		  </ul>
		</li>
	  </ul>
	</div>
	
	<div id="right_side">															   
	<form name="form1" method="post" action="student_edit enrollment data here.php">



	  <p>Enrollment Information&hellip;.<br><br>
		Select Academic Year: 
		  <select name="academic_year">
			 <option>S.Y. 2010-2011</option>
			 <option>S.Y. 2011-2012</option>
		  </select><br>
		Select Semester:
		 <select name="semester">
			 <option>First Semester</option>
			 <option>Second Semester</option>
			 <option>Summer Semester</option>
		  </select><br>
	  </p>
	  <p>&nbsp;</p>
	   <input type="submit" name="continue" value="Continue">
	  </form>

	</div>
	</div>
</div>

<?php
	require_once 'student_footer.php';
?>