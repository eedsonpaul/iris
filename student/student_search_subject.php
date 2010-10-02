

<?php


require 'dbconnect.php';
	session_start();
	
    $student_number = $_SESSION['student_number'];	 
	echo "ADD SUBJECT HERE";

?>


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
		</tr>
		</table></font>
</div>
</body>
</html>

