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

<br>
<center>
<ul>
	<li><a href="cashierSLBPayment.php">Input SLB Payment</a></li>
	<li><a href="cashierScholarshipPayment.php">Input Scholarship Payment</a></li>
	<li><a href="cashierOthersPayment.php">Input Others Payment</a></li>
</ul>
</center>
<br>
<br>
<br>
</div>
<center>
 <td width="55"><a href="cashier.php"><input type="submit" value='Back'></a></td>
 </center>
<?php 
  require_once 'cashier_footer.php';
?>
