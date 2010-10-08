<?php session_start(); ?>
<?php
	require_once '../cssandstuff/http.php';
	if($_SESSION['access_level_id']!=3 and $_SESSION['access_level_id'] != 2) 
	  redirect('../../error.php');
	$emp_id = $_SESSION['employee_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Faculty | UP Cebu IRIS</title>
<link rel="icon" href="../../img/seal2.png" type="image/x-icon">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("../cssandstuff/default.css");
</style>
</head>

<body onLoad="init();">
  <div id="banner">
    <?php if (!isset($_SESSION['employee_id'])) { ?>
      <a href="index.php"><img src="../../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } else { ?>
      <a href="index.php?action=Logs"><img src="../../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } ?>
  </div>

  <div id="osa_menu">
    <?php if (isset($_SESSION['employee_id'])) { ?>
      <img src="img/mb1.1.jpg" width="140" height="30"><a href="index.php?action=Logs"><img src="img/mbhome.jpg" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><a href="../../admin_transact_user.php?action=Logout"><img src="img/mblogout.gif" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><img src="img/mb1.3.jpg" width="502" height="30">
    <?php } else { ?>
      <img src="img/mb1.1.jpg" width="140" height="30"><a href="login.php?action=Admin"><img src="img/mbadmin.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><a href="login.php?action=Employee"><img src="img/mbfaculty.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="39" height="30" border="0"><a href="login.php?action=Student"><img src="img/mbstudent.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="39" height="30"><img src="img/mb1.3.jpg" width="330" height="30">
  <?php } ?>
      <img src="img/mb1.4.gif" width="950" height="33">
  </div>
  
  <div class="main">
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
