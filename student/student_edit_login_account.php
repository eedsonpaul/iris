<?php
	require_once 'student_header.php';
	$student_number = $_SESSION['student_number'];	 
	require_once 'query_student.php';
	require_once 'student_navigation.php';
?>

<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>

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
    <input type="password" name="password1"  id="textfield52" />
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
  <p>Answer:*
    <input type="text" name="answer" value= <?php echo getAnswer($student_number); ?> >
  </p>
  <p>&nbsp;</p>
   <input type="submit" name="Update" value="update">
  </form>
</div>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("form1");
    
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("password1","req","Password field requires input.");  
  frmvalidator.addValidation("password2","req","Password verification field requires input.");
  frmvalidator.addValidation("answer","req","Answer field requires input.");
  
</script>

</div>

<?php
  require_once '../admin_footer.php';
?>
