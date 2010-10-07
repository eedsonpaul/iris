<?php 
  require_once 'accounting_header.php';
?>

<div class="main">
	<div id="navigation">
		
	  <ul>
			<li><a href="accountingAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a></li>
			<li><a href="viewClearedAccounts.php">View Already Cleared</a></li>
            <li><a href="generateSLB.php">Generate Student Accountabilities</a></li>
			<li><a href="accounting.php">Return</a></li>
		</ul>

<br>
	</div>

	<div id="right_side">
    <br><br><br><br><br><br><br><br><br><br><br>
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
		<input type="submit" value="Save" />&nbsp;
		<input type=button value="Back" onClick="history.go(-1)">
		</td>
	</tr>
	</table>
</form>
</div>
</body>
</html>

<?php 
  require_once 'cashier_footer.php';
?>
