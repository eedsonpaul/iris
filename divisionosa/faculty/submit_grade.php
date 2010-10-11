<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	require_once '../cssandstuff/dbconnect.php';
	$query3 = "SELECT * from section WHERE course_code = 'cmsc11'";
	$result3 = mysql_query($query3);
	print(mysql_numrows($result3));
	$query = "select * from student_status WHERE student_number = '201000000' AND status='confirmed';";
	$result = mysql_query($query);
	print(mysql_numrows($result));
?>

<br/><br/>
<?php require_once '../../admin_footer.php' ?>