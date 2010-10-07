<?php
	require_once '../admin_db_connect.php';
	session_start(); 
?>

<html>
<head>



  <?php if (isset($_SESSION['employee_id']))
        /*and  isset($_SESSION['access_level_id']) == 3)*/ { ?>
    <title><?php echo $_SESSION['access_level_id']; ?> | UP Cebu IRIS</title>
  <?php } else { ?>
    <title>Welcome to UP Cebu IRIS!</title>
  <?php } ?>
  <link rel="icon" href="img/seal2.png" type="image/x-icon">
  
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  
  <style type="text/css">
  @import url("student.css");
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
<!-- end here -->

<?php 
	 /*
	 require 'dbconnect.php';
	 session_start();
	 */
	 $student_number = $_SESSION['student_number'];	 
?>

<div class="main">

<?php
	require_once 'student_navigation.php';
	
?>


<div id="right_side">

  <p align="center"><strong>Change this Student&rsquo;s Record/Log-in Account</strong></p>
  <?php
	 $res=mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
	 stfap_bracket_id,scholarship_id,password,security_question,answer from student where student_number=$student_number");
	 
	 while($row = mysql_fetch_array($res)){		
		echo "Student ID:".$row['student_number'];
		echo "<br>Name:".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
		echo "<br>Degree Program:".$row['degree_program'];
		echo "<br>Year Level:".$row['year_level'];
		echo "<br>STFAP Bracket:".$row['stfap_bracket_id'];
		echo "<br>Scholarship:".$row['scholarship_id'];
		
		$question = $row['security_question'];
		$answer = $row['answer'];
		$password = $row['password'];
	 }
  ?>
 <form name="form1" method="post" action="student_update_login.php">
  <p>
    Password:*
    <input type="password" name="password"  id="textfield52" />
    <br>
    Re-type Password:*
    <input type="password" name="password2" id="textfield53" />
  </p>
  <p>If you forget your password&hellip;.<br>
    Security Question: 
      <select name="question">
		 <option>What was the name of your first school?</option>
		 <option>What is your favortie past-time?</option>
		 <option>Who is your favorite teacher?</option>
		 <option>What is your father's middle name?</option>
		 <option>What is your mother's middle name?</option>
		 <option>What is your pet's name?</option>
		 <option>Who was your childhood hero?</option>
		 <option>What is your bestfriend's name?</option>
		 <option>Where is your home town?</option>
      </select>
  </p>
  <p>Answer:*</p>
  <p>
    <textarea name="answer"  cols="30" rows="2" wrap="virtual" ></textarea>
  </p>
  <p>&nbsp;</p>
   <input type="submit" name="Update" value="update">
  </form>
</div>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("form1");
    
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("password","req","Password field requires input.");  
  frmvalidator.addValidation("password2","req","Password verification field requires input.");
  frmvalidator.addValidation("answer","req","Answer field requires input.");


  frmvalidator.setAddnlValidationFunction("passValidate");
  
</script>

</div>

<?php
	require_once 'student_footer.php';
?>
