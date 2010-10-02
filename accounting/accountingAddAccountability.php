<?php
	session_start();
?>
<center>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Welcome to UP Cebu IRIS!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 0px;
	margin-top: 0px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
</style>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="950" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="657" height="30"><img src="mb1.4.gif" width="950" height="33"></p>
</div>
<body>

<center>
<?php
	include('connect.php');
	$student_number = $_GET['student_number'];
	$query_name = "SELECT last_name, first_name, middle_name, degree_program FROM student WHERE student_number = $student_number;";
	$name = mysql_query($query_name);
	$last_name = mysql_result($name,0,"last_name");
	$first_name = mysql_result($name,0,"first_name");
	$middle_name = mysql_result($name,0,"middle_name");
	$degree_program = mysql_result($name,0,"degree_program");
	
	echo "<table>";
	echo "<tr>";
	echo "<td>Student Number:</td><td>".$student_number."</td></tr>";
	echo "<tr><td>Name: </td><td>".$last_name.", ".$first_name." ".$middle_name."</td></tr>";
	echo "<tr><td>Degree Program: </td><td>".$degree_program."</td></tr>";
?>
<form action="addAccountability.php?student_number=<?php echo $student_number; ?>" method="post">
	<td>Accountability:</td>
		<td>
		<select name="accountability_type">
		<option value="1"> Scholarship</option>
		<option value="3"> Underassessment/ Lab Fees</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Accountability Details:</td>
		<td><input type="text" name="details"> </td>
	</tr>
	<tr>
		<td>Amount Due:</td>
		<td><input type="text" name="amount_due"></td>
	</tr>
<tr>
		<td>Academic Year Incurred:</td>
		<td>
		<select name="year_incurred">
		<option value="2010">2009-2010</option>
		<option value="2011">2010-2011</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Semester Incurred:</td>
		<td><select name="semester_incurred">
		<option value="1">first semester</option>
		<option value="2">second semester</option>
		<option value="3">first trimester</option>
		<option value="4">second trimester</option>
		<option value="5">third trimester</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>
		<input type="submit" value="Save" />&nbsp;
		<input type=button value="Back" onClick="history.go(-1)">
		</td>
	</tr>
	</table>
</form>
</body>
</html>


