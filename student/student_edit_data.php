<?php
	require_once 'student_header.php';
	$student_number = $_SESSION['student_number'];	 
	 $message = $_GET['message'];
	require_once 'student_navigation.php';
?>
	
	<div id="right_side">															   
	<form name="form1" method="post" action="student_edit_enrolldata1.php">
	<strong><?php echo $message; ?></strong><br><br>

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
  require_once '../admin_footer.php';
?>
