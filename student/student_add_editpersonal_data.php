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

-->
<div class="main">

<?php
	require_once 'student_navigation.php';
?>
	
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