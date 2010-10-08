<?php 
  require_once 'cashier_header.php';
?>
<div class="main">
<div id="navigation">
Employee ID : <?php echo $_SESSION['employee_id']?><br>
<?php $query_employee = "SELECT * FROM employee WHERE employee_id ='".$_SESSION['employee_id']."';";
$employee = mysql_query($query_employee);
$employee_last_name = mysql_result($employee,0,"last_name");
$employee_first_name = mysql_result($employee,0,"first_name");
$employee_middle_name = mysql_result($employee,0,"middle_name");?>

Name   :  <?php echo $employee_last_name.", ". $employee_first_name." ".$employee_middle_name;?><br>
Designation :  <br>
Unit:  <br>
<br>
<br>
<center><h1>CASH OFFICE</h1></center>
<center>
<ul>
	<br>
	<li><a href="../admin_useraccount.php?userid=<?php echo $_SESSION['employee_id']?>">Edit Employee Profile</a></li>
	<br>
	<li><a href="cashierSAM.php">Students' Accountability Module</a></li>
	<li><a href="cashierEM.php">Enrollment Module</a></li>
</ul>
</center>
<br>
</div>

<?php 
  require_once 'cashier_footer.php';
?>