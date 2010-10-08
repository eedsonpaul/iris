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
<p>&nbsp;</p>
<center>
<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acctg_feeAssessment();
	
		
?>
<br>
<br>
<br>
<br>
</div>
<?php 
  require_once 'cashier_footer.php';
?>