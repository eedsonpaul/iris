<?php 
  require_once 'library_header.php';
?>
<div class="main">
<center><h1>EDIT ACCOUNTABILITY</h1></center>

<body>

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
<form action="editLibraryAccountability.php?id=<?php echo $id;?>" method="post">
	<input type="hidden" name="accountability_id" value="<?php echo $id; ?>"/>
	<input type="hidden" name="student_number" value="<?php echo $student_number; ?>"/>
<table>
	<tr>
		<td>Student Number:</td>
		<td><?php echo $student_number; ?>
		</td>
	</tr>
	<tr>
		<td>Accountability:</td>
		<td>
		<input type="hidden" name="accountability_type" onFocus="this.blur()" readonly value="2">Book</option>
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
		<td>Academic Year Incurred:</td>
		<td>
		<select name="year_incurred">
		<?php
		if($year_incurred==2010){
			echo "<option value=\"2010\">2010-2011</option>";
			echo "<option value=\"2011\">2011-2012</option>";
		}
		else if($year_incurred == 2011){
			echo "<option value=\"2011\">2011-2012</option>";
			echo "<option value=\"2010\">2010-2011</option>";
		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Semester Incurred:</td>
		<td>
		<select name="semester_incurred">
		<?php
		if($semester_incurred == 0){
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"1\">first semester</option>";
			echo	"<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 1){
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 2){
			echo	"<option value=\"2\">second semester</option>";
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 3){
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 4){
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 5){
			echo "<option value=\"5\">third trimester</option>";
			echo "<option value=\"0\">summer</option";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
		}
		?>
		</select>
		</td>
	</tr>
	</table>
<table width="393">
  <tr>
    <td width="113">&nbsp;</td>
    <td width="95"><input type="submit" value="Save" /></td>
    <td width="169"><input type=button value="Back" onClick="history.go(-1)"></td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
</body>
</html>

<?php 
  require_once 'cashier_footer.php';
?>