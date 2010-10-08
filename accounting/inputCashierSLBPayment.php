<?php 
  require_once 'cashier_header.php';
?>
<div class="main">
<div id="navigation">
Employee ID : <?php echo $_SESSION['employee_id']?><br>
<?php 
$query_employee = "SELECT * FROM employee WHERE employee_id ='".$_SESSION['employee_id']."';";
$employee = mysql_query($query_employee);
$employee_last_name = mysql_result($employee,0,"last_name");
$employee_first_name = mysql_result($employee,0,"first_name");
$employee_middle_name = mysql_result($employee,0,"middle_name");
$designation_id = mysql_result($employee,0,"designation_id");
$unit_id = mysql_result($employee,0,"unit_id");

$query_designation = "SELECT * FROM designation WHERE designation_id=$designation_id;";
$result_designation = mysql_query($query_designation);
$designation = mysql_result($result_designation,0,"designation");

$query_unit = "SELECT * FROM unit WHERE unit_id = $unit_id;";
$result_unit=mysql_query($query_unit);
$unit = mysql_result($result_unit,0,"unit_name");
?>
Name   :  <?php echo $employee_last_name.", ". $employee_first_name." ".$employee_middle_name;?><br>
Designation : <?php echo $designation ?><br>
Unit:  <?php echo $unit ?><br>
<center>
<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acct_inputSLBPayment();
?>
	<br><br><td width="51"><a href="cashierSAM.php"><input type=button value="Back"></a></td>
</center>
<br>
<br>
<br>
</body>
</html>
</div>
<?php 
  require_once 'cashier_footer.php';
?>