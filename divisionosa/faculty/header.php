<?php
	session_start();
	///iris/admin_transact_user.php?action=Logout
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Staff Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("../cssandstuff/default.css");

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

<div id="fixcontent">
<body>
<p><img src="../cssandstuff/banner.jpg" width="1024" height="163">
<img src="../cssandstuff/mb1.1.jpg" width="140" height="30"><a href="../index.htm"></a><a href="/iris/admin_transact_user.php?action=Logout"><img src="../cssandstuff/mblogout.gif" width="121" height="30" border="0"></a><img src="../cssandstuff/mb1.2.jpg" width="33" height="30"><img src="../cssandstuff/mb1.3.jpg" width="730" height="30"><img src="../cssandstuff/mb1.4.gif" width="1024" height="33"></p>
<div id="navigation">
  <ul>
    <li> <a href="#"> PERSONAL DATA </a>
        <ul>
          <li><a href="faculty.php">Staff Profile </a></li>
          <li><a href="#">Edit login account</a></li>
          <li><a href="editpersonaldata_faculty.php">edit personal data</a></li>
        </ul>
    </li>
    <li> <a href="#">ACADEMIC CONCERNS</a>
        <ul>
          <li><a href="student_grade_mgnt.php">student grade management</a></li>
          <li><a href="view_schedule.php">View my Schedule</a></li>
        </ul>
    </li>
    <li> <a href="#">for advising</a>
        <ul>
          <li><a href="student_record_mngt.php">Student Record Management</a></li>
          <li><a href="gen_reg.php">General Registration Module</a></li>
          <li><a href="view_subject_offerings.php">View Course offerings</a></li>
        </ul>
    </li>
  </ul>
</div>
<div id="contentcolumn1">
<A href="javascript: history.back();">Back</A>