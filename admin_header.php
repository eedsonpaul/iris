<?php session_start(); ?>
<html>
<head>
  <?php if (isset($_SESSION['employee_id']))
        /*and  isset($_SESSION['access_level_id']) == 3)*/ { ?>
    <title>Admin | UP Cebu IRIS</title>
  <?php } else { ?>
    <title>Welcome to UP Cebu IRIS!</title>
  <?php } ?>
  <link rel="icon" href="img/seal2.png" type="image/x-icon">
  
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  
  <style type="text/css">
  @import url("css/admin.css");
  </style>
  
  <script language="JavaScript" src="masks.js" type="text/JavaScript"></script>

  <script language="JavaScript">

	  function init(){
		  document.loginform.reset();
		
		  oStringMask = new Mask("#########");
		  oStringMask.attach(document.loginform.student_number);
		  
		  oStringMask = new Mask("yyyy-mm-dd");
		  oStringMask.attach(document.loginform.birthdate);
		  
		  oStringMask = new Mask("(###)###-####");
		  oStringMask.attach(document.loginform.contact_number);
		
	  }
  </script>
</head>

<body onLoad="init();">
  <div id="banner">
    <?php if (!isset($_SESSION['employee_id'])) { ?>
      <a href="index.php"><img src="img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } else { ?>
      <a href="index.php?action=Logs"><img src="img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } ?>
  </div>

  <div id="menu">
    <?php if (isset($_SESSION['employee_id'])) { ?>
      <?php if ($_SESSION['access_level_id'] != 3) { ?>
        <img src="img/mb1.1.jpg" width="140" height="30"><a href="index.php"><img src="img/mbhome.jpg" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><a href="admin_transact_user.php?action=Logout"><img src="img/mblogout.gif" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><img src="img/mb1.3.jpg" width="502" height="30">
      <?php } else { ?>
        <img src="img/mb1.1.jpg" width="140" height="30"><a href="index.php?action=Logs"><img src="img/mbhome.jpg" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><a href="admin_transact_user.php?action=Logout"><img src="img/mblogout.gif" width="121" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><img src="img/mb1.3.jpg" width="502" height="30">
      <?php } ?>
    <?php } else { ?>
      <img src="img/mb1.1.jpg" width="140" height="30"><a href="index.php"><img src="img/mbhome.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="33" height="30"><a href="login.php?action=Staff"><img src="img/mbfaculty.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="39" height="30" border="0"><a href="login.php?action=Student"><img src="img/mbstudent.jpg" width="123" height="30" border="0"></a><img src="img/mb1.2.jpg" width="39" height="30"><img src="img/mb1.3.jpg" width="330" height="30">
    <?php } ?>
      <img src="img/mb1.4.gif" width="950" height="33">
  </div>
