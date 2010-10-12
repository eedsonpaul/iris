<?php

	  
	require_once '../student/student_sub_header.php';

    $student_number = $_SESSION['student_number'];	 
	echo "ADD SUBJECT HERE";
?>

<div id="container">

   <form name="form1" method="post" action="student_show_subject.php">
   <p>Subject: <input type="text" name="subject"  id="subject" />
   <input type="submit" name="search" value="Search">
   </form>
		<font size="2" color="red">
		<table width='57.9%' align='center border='1'>
		<tr>
		<th width='50'><font size="1">SUBJECT </font></th>
		<th width='50'><font size="1">CLASS TYPE</th>
		<th width='50'><font size="1">SECTION</th>
		<th width='50'><font size="1">DAY</th>
		<th width='50'><font size="1">START</th>
		<th width='50'><font size="1">END</th>
		<th width='50'><font size="1">ROOM</th>
		<th width='50'><font size="1">SLOTS/AVAILABLE/CONFIRMED/WAITLISTED</th>
		<th width='50'><font size="1"></th>
		</tr>
		</table></font>
</div>

