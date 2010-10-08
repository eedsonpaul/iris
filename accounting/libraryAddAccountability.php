<?php 
  require_once 'library_header.php';
?>

<div class="main">
<center><h1>ADD ACCOUNTABILITY</h1></center>
<p>&nbsp;</p>
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
<form action="addLibraryAccountability.php?student_number=<?php echo $student_number; ?>" method="post">
	<tr>
		<td>Accountability:</td>
		<td>
		<input type="hidden" name="accountability_type" onfocus="this.blur()" readonly value="2">Book</option>
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
		<option value="2009">2009-2010</option>
		<option value="2010">2010-2011</option>
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
		<center> 
		<input type="submit" value="Save" />&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=button value="Back" onClick="history.go(-1)"></center>
		</td>
	</tr>
	</table>
</form>
</body>
</html>
</div>

<?php 
  require_once 'cashier_footer.php';
?>

