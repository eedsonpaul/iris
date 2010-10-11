<?php
	require_once '../admin_db_connect.php';
  require_once '../admin_http.php';
	session_start(); 
	if($_SESSION['access_level_id']!= 1 and $_SESSION['access_level_id'] != 3) 
	  redirect('../error.php');
?>

<html>
<head>
  <?php if ($_SESSION['access_level_id'] == 1 ) { ?>
    <title>Student | UP Cebu IRIS</title>
  <?php } else if ($_SESSION['access_level_id'] == 3 ) { 
    $_SESSION['student_number'] = $_GET['id'];
  ?>
    <title>Admin &raquo; Student | UP Cebu IRIS </title>
  <?php } ?>
  <link rel="icon" href="../img/seal2.png" type="image/x-icon">
  
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  
  <style type="text/css">
  @import url("../css/student.css");
  </style>
  
<script language="JavaScript" src="masks.js" type="text/JavaScript"></script>
<script language="JavaScript" src="jquery-1.4.2.min.js" type="text/JavaScript"></script>
<script language="JavaScript">

	function init(){
		document.loginform.reset();
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.loginform.student_number);
		
	}
</script>

</head>

<body onLoad="init();">
  <div id="banner">
    <?php if (!isset($_SESSION['employee_id'])) { ?>
      <a href="index.php"><img src="../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } else { ?>
      <a href="index.php?action=Logs"><img src="../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } ?>
  </div>
  </div>

  <div id="stud_menu">
    <?php if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number'])) { ?>
      <img src="../img/mb1.1.jpg" width="140" height="30"><a href="student.php"><img src="../img/mbhome.jpg" width="121" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><a href="../admin_transact_user.php?action=Logout"><img src="../img/mblogout.gif" width="121" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><img src="../img/mb1.3.jpg" width="502" height="30">
    <?php } else { ?>
      <img src="../img/mb1.1.jpg" width="140" height="30"><a href="login.php?action=Admin"><img src="../img/mbadmin.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><a href="login.php?action=Employee"><img src="../img/mbfaculty.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="39" height="30" border="0"><a href="login.php?action=Student"><img src="../img/mbstudent.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="39" height="30"><img src="../img/mb1.3.jpg" width="330" height="30">
  <?php } ?>
      <img src="../img/mb1.4.gif" width="950" height="33">
  </div>

  <div class="main">
    <?php if ($_SESSION['access_level_id'] == 3) { ?>
    <div id="for_admin">      
    <div id="admin_nav" class="left">
        <a href="../index.php?action=Logs"><span class="left">&larr;Back to Admin Account</span></a>
    </div>

    <div id="admin_nav" class="right">
      <?php
      if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
      {
        echo '<a href="../index.php?action=SearchAcct">Search Account &raquo;';
        echo '</a>';
        if ($_SESSION['access_level_id'] == 3) {
          echo ' | <a href="../index.php?action=Logs">Logs</a> | ';
          echo ' <a href="../admin_panel.php">' . $_SESSION['username'];
        }
        echo '</a>';
      }
      ?>
    </div>
    </div><br/>      
    <?php } ?>
  
