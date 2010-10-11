<?php 
  require_once 'accounting_header.php';
?>

	<div id="navigation">
		
		
		<center>
	  <ul>
	<br>
	<li><a href="../admin_useraccount.php?editlogin=<?php echo $_SESSION['employee_id'] ?>">Edit Login Details</a></li>
	<li><a href="../admin_useraccount.php?userid=<?php echo $_SESSION['employee_id']?>">Edit Employee Profile</a></li>
	<br>
			<li><a href="accountingSAM.php">Students' Accountability Module</a></li>
			<li><a href="accountingEM.php">Enrollment Module</a></li>
            <li><a href="accountingCRM.php">Cash Report Module</a></li>
			<li><a href="accountingForm5.php">View Temporary Form 5</a></li>
			</ul>
		</center>
	<br>
	</div>

<?php 
  require_once 'cashier_footer.php';
?>

