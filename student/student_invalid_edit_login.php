<?php 
	 require 'dbconnect.php';
	 session_start();
	 $student_number = $_SESSION['student_number'];	 
	 $error = $_GET['error'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>University of the Philippines - Integrated Registration Information System</title>
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
<img src="images/mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="images/mblogout.gif" width="121" height="30" border="0"></a><img src="images/mb1.2.jpg" width="33" height="30"><img src="images/mb1.3.jpg" width="730" height="30"><img src="images/mb1.4.gif" width="1024" height="33"></p>
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
  		      <li><a href="student_view Grades per semester.php">view Grades per semester </a></li>
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
<div id="contentcolumn1">
  <p>UPDATE NOT SUCCESSFUL!</p><?php echo $error; ?>
  <p align="center"><strong>Change this Student&rsquo;s Record/Log-in Account</strong></p>
  <?php
	 $res=mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
	 stfap_bracket_id,scholarship_id from student where student_number=$student_number");
	 
	 while($row = mysql_fetch_array($res)){		
		echo "Student ID:".$row['student_number'];
		echo "<br>Name:".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
		echo "<br>Degree Program:".$row['degree_program'];
		echo "<br>Year Level:".$row['year_level'];
		echo "<br>STFAP Bracket:".$row['stfap_bracket_id'];
		echo "<br>Scholarship:".$row['scholarship_id'];
				
	 }
  ?>
 <form name="form1" method="post" action="student_update_login.php">
  <p>
    Password:*
    <input type="password" name="password" id="textfield52" />
    <br>
    Re-type Password:*
    <input type="password" name="retype" id="textfield53" />
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
    <textarea name="answer" cols="30" rows="2" wrap="virtual"></textarea>
  </p>
  <p>&nbsp;</p>
   <input type="submit" name="Update" value="update">
  </form>
</div>
</div>
</body>
</html>
