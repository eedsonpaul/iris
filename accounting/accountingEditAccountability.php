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
<p>&nbsp;</p>
<center>
<?php
	include('connect.php');
	$id = $_GET['id'];
	$query = "Select * from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	
	$student_number = mysql_result($result,0,"student_number");
    $year_incurred = mysql_result($result,0,"year_incurred");
    $semester_incurred = mysql_result($result,0,"semester_incurred");
	$details = mysql_result($result,0,"details");
	$date_added = mysql_result($result,0,"date_added");
    $amount_due = mysql_result($result,0,"amount_due");
	//$id = mysql_result($result,0,"accountability_type_id");

?>

<html>
<head>
	<title>Edit Accountability</title>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="Content-Script-Type" content="text/javascript"> 
<form action="editAccountability.php?id=<?php echo $id;?>" method="post">
	<input type="hidden" name="accountability_id" value="<?php echo $id; ?>"/>
<table>
	<tr>
		<td>Student Number:</td>
		<td><input type="text" name="student_number" onFocus="this.blur()" readonly value="<?php echo $student_number; ?>">
		</td>
	</tr>
	<tr>
		<td>Accountability:</td>
		<td>
		<select name="accountability_type">
		<option value="1"> Scholarship</option>
		<option value="3"> Others</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Accountability Details:</td>
		<td><input type="text" name="details" value="<?php echo $details; ?>"> </td>
	</tr>
	<tr>
		<td>Amount Due:</td>
		<td><input type="text" name="amount_due" value="<?php echo $amount_due; ?>" ></td>
	</tr>
	<tr>
		<?php
			if($year_incurred == 2010){ $year = '2010-2011';}
			if($year_incurred == 2011){ $year = '2011-2012';}
		?>
		<td>Academic Year Incurred:</td>
		<td>
		<select name="year_incurred" value="<?php echo $year_incurred; ?>">
		<option value="<?php $year_incurred; ?>" select><?php echo $year; ?></option>
		<?php
		if($year_incurred==2010){
			echo "<option value=\"2011\">2011-2012</option>";
		}
		else{
			echo "<option value=\"2010\">2010-2011</option>";
		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<?php 
			if($semester_incurred == 1){ $semester = 'first semester';}
			if($semester_incurred == 2){ $semester = 'second semester';}
			if($semester_incurred == 3){ $semester = 'first trimester';}
			if($semester_incurred == 4){ $semester = 'second trimester';}
			if($semester_incurred == 5){ $semester = 'third trimester';}
		?>	
		<td>Semester Incurred:</td>
		<td><select name="semester_incurred" value="<?php echo $semester_incurred; ?>">
		<option id="<?php $semester_incurred; ?>" select><?php echo $semester; ?></option>
		<?php
		if($semester_incurred == 1){
			echo	"<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 2){
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 3){
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 4){
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 5){
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
		}
		?>
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
<option id="<?php $returned_value; ?>" select><?php $returned_value; ?></option></select>		
