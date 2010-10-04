<?php
	require_once 'student_header.php';
	 $student_number = $_SESSION['student_number'];	 
?>

<div class = "main">

<?php
	require_once 'student_navigation.php';
?>

<div id="right_side">
  <p>UPDATE SUCCESSFUL!</p>
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

<?php
	require_once 'student_footer.php';
?>