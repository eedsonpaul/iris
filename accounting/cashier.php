<?php 
  require_once 'cashier_header.php';
?>
<div id="navigation">
<br>
<br>
<center><h1>CASH OFFICE</h1></center>
<center>
<ul>
	<br>
	<li><a href="../admin_useraccount.php?editlogin=<?php echo $_SESSION['employee_id'] ?>">Edit Login Details</a></li>
	<li><a href="../admin_useraccount.php?userid=<?php echo $_SESSION['employee_id']?>">Edit Employee Profile</a></li>
	<br>
	<li><a href="cashierSAM.php">Students' Accountability Module</a></li>
	<li><a href="cashierEM.php">Enrollment Module</a></li>
</ul>
</center>
<br>
</div>

<?php
  require_once '../admin_footer.php';
?>
